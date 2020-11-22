<?php

class User
{
    private $id;
    private $lastName;
    private $name;
    private $email;
    private $userName;
    private $password;
    private $lvl;
    private $experience;
    private $money;
    private $isAdmin;
    private $avatarId;
    private $groupId;


    public function __construct()
    {

    }


    public function __toString()
    {
        return $this->id . " / " . $this->lastName . " / " . $this->name . " / " . $this->email . " / " . $this->userName . " / " . $this->password . " / " . $this->avatarId . " / " . $this->lvl . " / " . $this->experience . " / " . $this->money . " / " . $this->groupId . " / " . $this->isAdmin;
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
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;
    }


    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


    /**
     * Get the value of lvl
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set the value of lvl
     *
     * @return  self
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
        return $this;
    }


    /**
     * Get the value of experience
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set the value of experience
     *
     * @return  self
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
        return $this;
    }


    /**
     * Get the value of money
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set the value of money
     *
     * @return  self
     */
    public function setMoney($money)
    {
        $this->money = $money;
        return $this;
    }

    
    /**
     * Get the value of isAdmin
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @return  self
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

        
    /**
     * Get the value of avatarId
     */
    public function getAvatarId()
    {
        return $this->avatarId;
    }

    /**
     * Set the value of avatarId
     *
     * @return  self
     */
    public function setAvatarId($avatarId)
    {
        $this->avatarId = $avatarId;
        return $this;
    }

    
    /**
     * Get the value of groupId
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set the value of groupId
     *
     * @return  self
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }
}
