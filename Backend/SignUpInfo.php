<?php
    Class SignUpInfo{
        private $Age;
        private $Gender;
        private $Ailment;
        private $PersonalPhone;
        private $CustodianPhone;
        private $Address;
        private $Email;
        private $FName;
        private $LName;
        public function __construct($fn,$ln,$em,$age,$gen,$add,$pph,$cph,$ail){
            $this->FName=$fn;
            $this->LName=$ln;
            $this->Email=$em;
            $this->Age=$age;
            $this->Gender=$gen;
            $this->Ailment=$ail;
            $this->PersonalPhone=$pph;
            $this->CustodianPhone=$cph;
            $this->Address=$add;
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