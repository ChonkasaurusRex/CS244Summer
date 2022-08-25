<?php
    include "../Backend/SignUpNot.php";
    Class SignUpInfo implements SignUpNot{
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
        public function ShowAllInfo(){
            echo $this->getfn()."<br>";
            echo $this->getln()."<br>";
            echo $this->getem()."<br>";
            echo $this->getage()."<br>";
            echo $this->getgen()."<br>";
            echo $this->getadd()."<br>";
            echo $this->getpph()."<br>";
            echo $this->getcph()."<br>";
            echo $this->getail()."<br>";
        }
    }
    $filename='../Invoices/SignUp.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if(array_key_exists(9,$Arrline)){
            $sp=new SignUpInfo($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5],$Arrline[6],$Arrline[7],$Arrline[8],$Arrline[9]);
        }
        if(empty($line)==false){
            $sp->ShowAllInfo();
            echo "<br>";
        }
    }
    fclose($file);
?>