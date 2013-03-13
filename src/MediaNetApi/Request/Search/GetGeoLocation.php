<?php

namespace MediaNetApi\Request\Search;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Request\AbstractRequest;

class GetGeoLocation extends AbstractRequest
{

    private $mediaNetMethod = 'search.getGeoLocation';

    /**
     * The IP address to look up
     * @var string
     */
    protected $ipString;

    public function __construct($getData = null)
    {
        $this->getQuery()->set('method', $this->getMediaNetMethod());
        if (!is_null($getData)) {
            $this->fromArray($getData);
        }
    }

    public function getMediaNetMethod()
    {
        return $this->mediaNetMethod;
    }

    public function getIpString()
    {
        return $this->ipString;
    }

    public function setIpString($ipString)
    {
        $this->ipString = $ipString;
        $this->getQuery()->set('addr', $ipString);
        return $this;
    }

}