<?php

namespace MediaNetApi\Request\Track;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Request\AbstractRequest;

class GetLocations extends AbstractRequest {

    private $mediaNetMethod = 'track.getLocations';
    protected $mnetIds;
    protected $rights;

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

    public function getMnetIds()
    {
        return $this->mnetIds;
    }

    public function setMnetIds($mnetIds)
    {
        $this->mnetIds = $mnetIds;
        $this->getQuery()->set('mnetIds', $mnetIds);
        return $this;
    }

    public function getRights()
    {
        return $this->rights;
    }

    public function setRights($rights)
    {
        $this->rights = $rights;
        $this->getQuery()->set('rights', $rights);
        return $this;
    }

}
