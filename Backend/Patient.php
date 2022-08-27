<?php
    include "../Frontend/TopNav.html";
    require "UserInfo.php";
    require "User.php";
    require "Custodian.php";
    require "PatientInfo.php";
    require "PatApp.php";
    class Patient extends UserInfo implements User{
        private $Age;
        private $Gender;
        private $Ailment;
        private $PersonalPhone;
        private $CustodianPhone;
        private $Address;
        use Custodian{
            Custodian::__construct as cus;
        }
        use PatApp{
            PatApp::__construct as patapp;
        }
        use Information;
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
        public function SetCustodian($pid,$ppass){
            $this->cus($pid,$ppass);
        }
        public function SetPatApp($dfn,$dln,$day,$tm){
            $this->patapp($dfn,$dln,$day,$tm);
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
        public function getage(){
            return $this->Age;
        }
        public function getgen(){
            return $this->Gender;
        }
        public function getpph(){
            return $this->PersonalPhone;
        }
        public function getcph(){
            return $this->CustodianPhone;
        }
        public function getadd(){
            return $this->Address;
        }
        public function getail(){
            return $this->Ailment;
        }
    }
?>