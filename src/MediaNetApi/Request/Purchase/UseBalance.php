<?php

namespace MediaNetApi\Request\Purchase;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Request\AbstractRequest;
use MediaNetApi\Element\User;
use MediaNetApi\Element\LineItem;

class UseBalance extends AbstractRequest
{

    private $mediaNetMethod = 'purchase.useBalance';
    //GET fields
    protected $UserIp;
    protected $cc;
    //POST fields
    protected $TotalCharge;
    protected $Items = array();
    protected $User;

    public function __construct(array $getData = null, array $postData = null)
    {

        $this->getQuery()->set('method', $this->getMediaNetMethod());
        $this->setMethod(self::METHOD_POST);
        $this->fromArray($getData);
        $this->fromArray($postData);
    }

    public function getMediaNetMethod()
    {
        return $this->mediaNetMethod;
    }

    public function getUserIp()
    {
        return $this->UserIp;
    }

    public function setUserIp($UserIp)
    {
        $this->getQuery()->set('UserIp', $UserIp);
        $this->UserIp = $UserIp;
        return $this;
    }

    public function getTotalCharge()
    {
        return $this->TotalCharge;
    }

    public function setTotalCharge($TotalCharge)
    {
        $this->getPost()->set('TotalCharge', $TotalCharge);
        $this->TotalCharge = $TotalCharge;
        return $this;
    }

    public function getItems()
    {
        return $this->Items;
    }

    public function addItem(LineItem $LineItem)
    {
        $this->Items[] = $LineItem;
        $ItemsArray = array();
        foreach ($this->Items as $Item) {
            $ItemsArray[] = $Item->toArray();
        }
        $this->getPost()->set('Items', $ItemsArray);
        return $this;
    }

    public function setItems(array $Items)
    {
        foreach ($Items as $ItemData) {
            $Item = new LineItem($ItemData);
            $this->addItem($Item);
        }
        return $this;
    }

    public function getUser()
    {
        return $this->User;
    }

    public function setUser($User)
    {
        if (!($User instanceof User)) {
            $User = new User($User);
        }
        $this->User = $User;
        $this->getPost()->set('User', $User->toArray());
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
