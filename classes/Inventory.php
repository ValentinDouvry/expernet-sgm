<?php

class Inventory
{
    private $id;
    private $isEquipped;
    private $quantity;
    private $userId;
    private $itemId;
    

    public function __construct()
    {

    }


    public function __toString()
    {
        return $this->id." / ". $this->userId." / ".$this->itemId." / ".$this->isEquipped." / ".$this->quantity;
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
    * Get the value of isEquipped
    */ 
    public function getIsEquipped()
    {
        return $this->isEquipped;
    }

    /**
    * Set the value of isEquipped
    *
    * @return  self
    */ 
    public function setIsEquipped($isEquipped)
    {
        $this->isEquipped = $isEquipped;
        return $this;
    }


    /**
    * Get the value of quantity
    */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
    * Set the value of quantity
    *
    * @return  self
    */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }


    /**
    * Get the value of userId
    */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
    * Set the value of userId
    *
    * @return  self
    */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
    * Get the value of itemId
    */ 
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set the value of itemId
     *
     * @return  self
     */ 
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
        return $this;
    }       
}
