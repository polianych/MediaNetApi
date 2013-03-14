<?php

namespace MediaNetApi\Request\Track;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Request\AbstractRequest;

class Get extends AbstractRequest {

    private $mediaNetMethod = 'track.get';
    protected $cc;
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

    public function getCc()
    {
        return $this->cc;
    }

    public function setCc($cc)
    {
        $this->cc = $cc;
        $this->getQuery()->set('cc', $cc);
        return $this;
    }

}
