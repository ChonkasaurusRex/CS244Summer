<?php
    class QMController{
        public function CallQMFuncs(){
            include "../Frontend/QMProfile.php";
        }
    }
    $qm=new QMController;
    $qm->CallQMFuncs();
?>