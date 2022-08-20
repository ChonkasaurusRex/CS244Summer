<?php
    class ReceptionistController{
        public function CallReceptionistFuncs(){
            include "../Frontend/ReceptionistProfile.php";
        }
    }
    $rp=new ReceptionistController();
    $rp->CallReceptionistFuncs();
?>