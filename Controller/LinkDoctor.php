<?php
    class DoctorController{
        public function CallDoctorFuncs(){
            include "../Frontend/DoctorProfile.php";
        }
    }
    $dc=new DoctorController();
    $dc->CallDoctorFuncs();
?>