<?php
    trait Custodian{
        private $PersonalID;
        private $PersonalPass;
        public function __construct($pid="N/A",$ppass="N/A"){
            $this->PersonalID=$pid;
            $this->PersonalPass=$ppass;
        }
        public function getpid(){
            return $this->PersonalID;
        }
        public function getppass(){
            return $this->PersonalPass;
        }
    }
?>