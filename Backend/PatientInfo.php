<?php
    trait Information{
        private $Info;
        public function __construct($info=" "){
            $this->Info=$info;
        }
        public function getInfo(){
            return $this->Info;
        }
    }
?>