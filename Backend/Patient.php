<?php
    include "../Frontend/TopNav.html";
    require "UserInfo.php";
    require "User.php";
    class Patient extends UserInfo implements User{
        private $Age;
        private $Gender;
        private $Ailment;
        private $PersonalPhone;
        private $CustodianPhone;
        private $Address;
        public function __construct($hid,$fn,$ln,$em,$pass,$age,$gen,$add,$pph,$cph,$ail)
        {
            parent::__construct($hid,$fn,$ln,$em,$pass);
            $this->Age=$age;
            $this->Gender=$gen;
            $this->Ailment=$ail;
            $this->PersonalPhone=$pph;
            $this->CustodianPhone=$cph;
            $this->Address=$add;
        }
        public function ShowProfile(){
            echo parent::gethospid()."<br>";
            echo parent::getfn()."<br>";
            echo parent::getln()."<br>";
            echo parent::getem()."<br>";
            echo $this->Age."<br>";
            echo $this->Gender."<br>";
            echo $this->Address."<br>";
            echo $this->PersonalPhone."<br>";
            echo $this->CustodianPhone."<br>";
            echo $this->Ailment."<br>";
        }
    }
?>