<?php
    include "../Frontend/TopNav.html";
    require "UserInfo.php";
    require "User.php";
    class QualityManager extends UserInfo implements User{
        public function __construct($hid,$fn,$ln,$em,$pass)
        {
            parent::__construct($hid,$fn,$ln,$em,$pass);
        }
        public function ShowProfile(){
            echo parent::gethospid()."<br>";
            echo parent::getfn()."<br>";
            echo parent::getln()."<br>";
            echo parent::getem()."<br>";
        }
    }
?>