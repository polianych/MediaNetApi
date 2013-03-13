<?php

namespace MediaNetApi\Element;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */
use MediaNetApi\Element\AbstractElement;

class LineItem extends AbstractElement
{

    protected $MnetId;
    protected $ItemType;
    protected $Format;
    protected $Price;
    protected $Tax;

    public function getMnetId()
    {
        return $this->MnetId;
    }

    public function setMnetId($MnetId)
    {
        $this->MnetId = $MnetId;
        return $this;
    }

    public function getItemType()
    {
        return $this->ItemType;
    }

    public function setItemType($ItemType)
    {
        $this->ItemType = $ItemType;
        return $this;
    }

    public function getFormat()
    {
        return $this->Format;
    }

    public function setFormat($Format)
    {
        $this->Format = $Format;
        return $this;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
        return $this;
    }

    public function getTax()
    {
        return $this->Tax;
    }

    public function setTax($Tax)
    {
        $this->Tax = $Tax;
        return $this;
    }

}
