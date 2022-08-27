<?php
    trait PatApp{
        private $docfn;
        private $docln;
        private $day;
        private $time;
        public function __construct($dfn,$dln,$day,$tm){
            $this->docfn=$dfn;
            $this->docln=$dln;
            $this->day=$day;
            $this->time=$tm;
        }
        public function getdfn(){
            return $this->docfn;
        }
        public function getdln(){
            return $this->docln;
        }
        public function getday(){
            return $this->day;
        }
        public function gettm(){
            return $this->time;
        }
        public function ShowAllApp(){
            echo "DR. ".$this->getdfn()." ";
            echo $this->getdln()."<br>";
            echo $this->getday().",";
            echo $this->gettm();
        }
    }
?>