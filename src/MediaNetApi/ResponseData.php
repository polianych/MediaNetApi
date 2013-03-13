<?php

namespace MediaNetApi;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
class ResponseData extends \ArrayObject
{

    public function __construct($data = array())
    {
        foreach ($data AS $name => $value) {
            $this->$name = $value;
        }
    }

    public function __get($varname)
    {
        if ($this->offsetExists($varname)) {
            return $this->offsetGet($varname);
        }
        return null;
    }

    public function __set($name, $value)
    {
        if (is_array($value)) {
            $value = new static($value);
        }
        $this->offsetSet($name, $value);
    }

    public function __isset($varname)
    {
        return $this->offsetExists($varname);
    }

    public function __unset($name)
    {
        $this->offsetUnset($name);
    }

}