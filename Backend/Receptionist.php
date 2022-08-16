<?php
    class Receptionist{
        private $name="ziad";
        public function __construct($nm)
        {
            $this->name=$nm;
        }
        public function changenm(){
            $this->name="usef";
            return $this->name;
        }
        public function __destruct()
        {
            
        }
    }
    $nm="name";
    $r=new Receptionist($nm);
    echo $r->changenm();
?>