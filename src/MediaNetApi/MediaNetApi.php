<?php

namespace MediaNetApi;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Http\Client\Adapter\Curl;
use Zend\Stdlib\Parameters;
use Zend\Json\Json;
use MediaNetApi\MediaNetOptions;
use MediaNetApi\ResponseData;

class MediaNetApi {

    protected $options;
    protected $client;

    public function initClient()
    {
        $client = new Client();
        $adapter = new Curl();

        $adapter->setCurlOption(CURLOPT_SSL_VERIFYHOST, false)
                ->setCurlOption(CURLOPT_SSL_VERIFYPEER, false);
        $client->setAdapter($adapter);

        $this->setClient($client);

        return $this;
    }

    public function __construct(MediaNetOptions $options)
    {
        $this->setOptions($options);
        $this->initClient();
    }

    /**
     * 
     * @return MediaNetOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions(MediaNetOptions $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * 
     * @return \Zend\Http\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * 
     * @param \Zend\Http\Request $request
     * @param boolean $returnResponse
     * @return type
     */
    public function send(Request $request = null, $returnResponse = false)
    {

        $client = $this->getClient();
        $client->setRequest($request);
        $this->prepareRequest();
        $response = $client->send();
        if ($returnResponse)
            return $response;
        return $this->decodeData($response);
    }

    /**
     * 
     * @return \MediaNetApi\MediaNetApi
     */
    protected function prepareRequest()
    {
        $client = $this->getClient();
        $request = $client->getRequest();
        $options = $this->getOptions();

        $request->getQuery()->set('format', $options->getFormat());
        if (method_exists($request, 'setCc') && !$request->getCc()) {
            $request->setCc($options->getCc());
        }
        $request->getQuery()->set('apiKey', $options->getApiKey());
        //Generating and adding signature to GET data
        $request->getQuery()->set('signature', $this->generateSignature($request));

        //Set baseUrl from config
        $request->setUri($options->getBaseUrl());
        //Medianet requirement to send POST data in application/json or application/xml
        if ($request->isPost()) {
            $postData = $request->getPost()->toArray();
            $request->setPost(new Parameters());
            $client->setRawBody(Json::encode($postData));
            $client->setEncType('application/json');
        }
        return $this;
    }

    /**
     * @param \Zend\Http\Response $response
     * @return \MediaNetApi\ResponseData
     */
    protected function decodeData(Response $response)
    {
        $type = $response->getHeaders()->get('Content-Type');

        $data = $response;
        if (stripos($type->getFieldValue(), 'application/json') !== false) {
            $data = Json::decode($response->getBody());
        }
        return new ResponseData($data);
    }

    /**
     * 
     * @param \Zend\Http\Request $request
     * @return string
     */
    protected function generateSignature(Request $request)
    {
        $signature = hash_hmac('md5', http_build_query($request->getQuery()->toArray()), $this->getOptions()->getSecret());
        return $signature;
    }

}
