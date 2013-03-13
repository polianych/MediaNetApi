MediaNetApi
===========
MediaNet API support for ZF2 application
Introduction
------------
This module currently supports the following calls with API version [2011-10-07]
* track.get
* track.getLocations
* search.getGeoLocation
* purchase.useBalance
* Radio.GetMediaLocation

Please see: [API Docs](http://www.mndigital.com/MN_Open_API/MN_Open_API_Implementation_Guide_PartTwo.pdf)

Requirements
------------

The dependencies for SpeckCommerce are set up as Git submodules so you should not hav

* PHP 5.3.3+
* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)


Contributors
------------

* [Alexey Poliakov] (https://github.com/polianych) (aka polianych)

Install
--------
1. Add <pre>"polianych/media-net-api": "dev-master"</pre> to your composer.json file and run php composer.phar update.
2. Add 'MediaNetApi' to your config/application.config.php file under the modules key.
    
Configuration
-------------
Add this section to your application config
<pre>
...
'medianet_api' => array(
        'base_url' => 'https://api.mndigital.com',
        'api_key' => 'wsQdZA8EDdruT4CV62Fi48JSl',
        'secret' => 'PLJuvKAoi65',
        'format' => 'json', //Currently supports only JSON format
        'cc' => 'gb',
    ),
...
</pre>

Example Usage
-------------
Retrieve by MediaNetID (mnetid) the metadata about a specific track, including artist and album info, etc.
<pre>
$mediaNet = $this->getServiceLocator()->get('MediaNetApi');
$request = new MediaNetApi\Request\Track\Get();
$request->setMnetId($mnetId);
//Returns ArrayObject of MediaNet API response or Zend Response if second param true
$result = $mediaNet->send($request);
</pre>
