<?php

    class Group{
        private $id;
        private $name;
        private $code;
        private $channel;
    }

    public function __construct()
    {
            $this->id = $id;
            $this->name = $name;
            $this->code = $code;
            $this->channel = $channel;
    }


    public function __toString(){
        return $this->id." / ". $this->name." / ".$this->code." / ".$this->channel;
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
         * Get the value of code
         */ 
        public function getCode()
        {
                return $this->code;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */ 
        public function setCode($code)
        {
                $this->code = $code;

                return $this;
        }

        /**
         * Get the value of channel
         */ 
        public function getChannel()
        {
                return $this->channel;
        }

        /**
         * Set the value of channel
         *
         * @return  self
         */ 
        public function setChannel($channel)
        {
                $this->channel = $channel;

                return $this;
        }

?>