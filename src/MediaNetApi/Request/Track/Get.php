<?php

namespace MediaNetApi\Request\Track;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Request\AbstractRequest;

class Get extends AbstractRequest
{

    private $mediaNetMethod = 'track.get';
    protected $mnetId;

    public function __construct($getData)
    {
        $this->getQuery()->set('method', $this->getMediaNetMethod());
        $this->fromArray($getData);
    }

    public function getMediaNetMethod()
    {
        return $this->mediaNetMethod;
    }

    public function getMnetId()
    {
        return $this->mnetId;
    }

    public function setMnetId($mnetId)
    {
        $this->mnetId = $mnetId;
        $this->getQuery()->set('mnetId', $mnetId);
        return $this;
    }

}
