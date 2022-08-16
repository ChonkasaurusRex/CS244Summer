<?php
    class Patient{
        private $HospID;
        private $Email;
        private $FName;
        private $LName;
        private $Age;
        private $Gender;
        private $Ailment;
        private $PersonalPhone;
        private $CustodianPhone;
        private $Address;
        private $Pass;
        public function __construct($hid,$fn,$ln,$age,$gen,$add,$em,$pph,$cph,$ail,$pass)
        {
            $this->HospID=$hid;
            $this->Email=$em;
            $this->FName=$fn;
            $this->LName=$ln;
            $this->Age=$age;
            $this->Gender=$gen;
            $this->Ailment=$ail;
            $this->PersonalPhone=$pph;
            $this->CustodianPhone=$cph;
            $this->Address=$add;
            $this->Pass=$pass;
        }
        public function ShowProfile(){
            echo $this->HospID;
            echo $this->FName;
            echo $this->LName;
            echo $this->Age;
            echo $this->Gender;
            echo $this->Address;
            echo $this->Email;
            echo $this->PersonalPhone;
            echo $this->CustodianPhone;
            echo $this->Ailment;
        }
    }
?>