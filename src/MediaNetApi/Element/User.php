<?php

namespace MediaNetApi\Element;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Element\AbstractElement;
use MediaNetApi\Element\BillingAddress;

class User extends AbstractElement
{

    protected $FirstName;
    protected $LastName;
    protected $EmailAddress;
    protected $BillingAddress;

    public function getFirstName()
    {
        return $this->FirstName;
    }

    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->LastName;
    }

    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    public function setEmailAddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;
        return $this;
    }

    public function getBillingAddress()
    {
        return $this->BillingAddress;
    }

    public function setBillingAddress($BillingAddress)
    {
        if (!($BillingAddress instanceof BillingAddress)) {
            $BillingAddress = new BillingAddress($BillingAddress);
        }
        $this->BillingAddress = $BillingAddress;
        return $this;
    }

}

