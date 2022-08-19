<?php
    class PatientController{
        public function CallPatientFuncs(){
            include "../Frontend/PatientProfile.php";
        }
    }
    $pt=new PatientController();
    $pt->CallPatientFuncs();
?>