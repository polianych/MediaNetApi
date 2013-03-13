<?php

namespace MediaNetApi\Element;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Element\AbstractElement;

class BillingAddress extends AbstractElement
{

    protected $AddressLine1;
    protected $AddressLine2;
    protected $City;
    protected $State;
    protected $PostalCode;
    protected $Country;

    public function getAddressLine1()
    {
        return $this->AddressLine1;
    }

    public function setAddressLine1($AddressLine1)
    {
        $this->AddressLine1 = $AddressLine1;
        return $this;
    }

    public function getAddressLine2()
    {
        return $this->AddressLine2;
    }

    public function setAddressLine2($AddressLine2)
    {
        $this->AddressLine2 = $AddressLine2;
        return $this;
    }

    public function getCity()
    {
        return $this->City;
    }

    public function setCity($City)
    {
        $this->City = $City;
        return $this;
    }

    public function getState()
    {
        return $this->State;
    }

    public function setState($State)
    {
        $this->State = $State;
        return $this;
    }

    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    public function setPostalCode($PostalCode)
    {
        $this->PostalCode = $PostalCode;
        return $this;
    }

    public function getCountry()
    {
        return $this->Country;
    }

    public function setCountry($Country)
    {
        $this->Country = $Country;
    }

}

