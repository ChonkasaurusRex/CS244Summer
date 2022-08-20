<?php
    class PatientController{
        public function CallPatientFuncs(){
            include "../Frontend/PatientValidation.php";
        }
    }
    $pt=new PatientController();
    $pt->CallPatientFuncs();
?>