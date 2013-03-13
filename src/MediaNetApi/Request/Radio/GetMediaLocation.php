<?php

namespace MediaNetApi\Request\Radio;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Request\AbstractRequest;
use MediaNetApi\Element\User;

class GetMediaLocation extends AbstractRequest {

    private $mediaNetMethod = 'Radio.GetMediaLocation';
    protected $protocol;
    protected $AssetCode;
    protected $TrackId;
    protected $UserIp;
    protected $cc;

    public function __construct($getData = null)
    {
        $this->getQuery()->set('method', $this->getMediaNetMethod());
        if (is_array($getData)) {
            $this->fromArray($getData);
        }
    }

    public function getMediaNetMethod()
    {
        return $this->mediaNetMethod;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        $this->getQuery()->set('protocol', $protocol);
        return $this;
    }

    public function getAssetCode()
    {
        return $this->AssetCode;
    }

    public function setAssetCode($AssetCode)
    {
        $this->AssetCode = $AssetCode;
        $this->getQuery()->set('AssetCode', $AssetCode);
        return $this;
    }

    public function getTrackId()
    {
        return $this->TrackId;
    }

    public function setTrackId($TrackId)
    {
        $this->TrackId = $TrackId;
        $this->getQuery()->set('TrackId', $TrackId);
        return $this;
    }

    public function getUserIp()
    {
        return $this->UserIp;
    }

    public function setUserIp($UserIp)
    {
        $this->UserIp = $UserIp;
        $this->getQuery()->set('UserIp', $UserIp);
        return $this;
    }

}
