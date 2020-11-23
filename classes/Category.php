<?php

class Category
{
    private $id;
    private $name;
    private $isBuyableMultiple;


    public function __construct()
    {
        
    }


    public function __toString()
    {
        return $this->id . " / " . $this->name . " / " . $this->code . " / " . $this->channel;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Get the value of name
     */
    public function getIsBuyableMultiple()
    {
        return $this->isBuyableMultiple;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setIsBuyableMultiple($isBuyableMultiple)
    {
        $this->isBuyableMultiple = $isBuyableMultiple;
        return $this;
    }
}
