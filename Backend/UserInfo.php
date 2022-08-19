<?php
    class UserInfo{
        private $HospID;
        private $Email;
        private $FName;
        private $LName;
        private $Pass;
        public function __construct($hid,$fn,$ln,$em,$pass){
            $this->HospID=$hid;
            $this->Email=$em;
            $this->FName=$fn;
            $this->LName=$ln;
            $this->Pass=$pass;
        }
        public function gethospid(){
            return $this->HospID;
        }
        public function getem(){
            return $this->Email;
        }
        public function getfn(){
            return $this->FName;
        }
        public function getln(){
            return $this->LName;
        }
    }
?>