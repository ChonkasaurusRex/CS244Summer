<?php
    include "../Frontend/TopNav.html";
    require "UserInfo.php";
    require "User.php";
    require "PatientInfo.php";
    class Receptionist extends UserInfo implements User{
        use Information{
            Information::__construct as info;
        }
        public function __construct($hid,$fn,$ln,$em,$pass)
        {
            parent::__construct($hid,$fn,$ln,$em,$pass);
        }
        public function SetInfo($info){
            $this->info($info);
        }
        public function ShowProfile(){
            echo parent::gethospid()."<br>";
            echo parent::getfn()."<br>";
            echo parent::getln()."<br>";
            echo parent::getem()."<br>";
        }
    }
?>