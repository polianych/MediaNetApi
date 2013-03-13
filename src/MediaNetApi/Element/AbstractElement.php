<?php

namespace MediaNetApi\Element;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
abstract class AbstractElement
{

    public function __construct($options = array())
    {
        if (is_array($options)) {
            $this->fromArray($options);
        }
    }

    public function fromArray($data)
    {
        foreach ($data as $key => $value) {
            $key = "set{$key}";
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }
    }

    public function toArray()
    {
        $array = array();
        foreach ($this as $key => $value) {
            if (is_object($value)) {
                $value = $value->toArray();
            } elseif (is_array($value)) {
                $arrayValue = $value;
                foreach ($arrayValue as $arrayValueKey => $item) {
                    if (is_object($item)) {
                        $arrayValue[$arrayValueKey] = $item->toArray();
                    }
                }
                $value = $arrayValue;
            }
            if (!is_null($value)) {
                $array[ucfirst($key)] = $value;
            }
        }
        return $array;
    }

}
