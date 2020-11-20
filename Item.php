<?php
    class Item{
        private $id;
        private $name;
        private $price;
        private $imageName;
        private $categoryId;

        public __construct()
        {

        }

        public function __toString(){
            return $this->id." / ". $this->name." / ".$this->price." / ".$this->imageName." / ".$this->categoryId;
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
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of imageName
         */ 
        public function getImageName()
        {
                return $this->imageName;
        }

        /**
         * Set the value of imageName
         *
         * @return  self
         */ 
        public function setImageName($imageName)
        {
                $this->imageName = $imageName;

                return $this;
        }

        /**
         * Get the value of categoryId
         */ 
        public function getCategoryId()
        {
                return $this->categoryId;
        }

        /**
         * Set the value of categoryId
         *
         * @return  self
         */ 
        public function setCategoryId($categoryId)
        {
                $this->categoryId = $categoryId;

                return $this;
        }
    }
?>