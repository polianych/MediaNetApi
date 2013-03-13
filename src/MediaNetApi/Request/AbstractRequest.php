<?php

namespace TuneHog\MediaNetApi\Request;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use Zend\Http\Request as ZendRequest;

abstract class AbstractRequest extends ZendRequest
{

    abstract function getMediaNetMethod();

    public function fromArray($data)
    {
        foreach ($data as $key => $value) {
            $key = "set{$key}";
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }
    }

}