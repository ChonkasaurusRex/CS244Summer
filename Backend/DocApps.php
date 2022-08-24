<?php
    trait DoctorAppointments{
        private $day;
        private $aptttime;
        private $reservedpatient;
        public function __construct($day,$aptt,$rp=""){
            $this->day=$day;
            $this->aptttime=$aptt;
            $this->reservedpatient=$rp;
        }
        public function getDay(){
            return $this->day;
        }
        public function getAptT(){
            return $this->aptttime;
        }
        public function getRP(){
            return $this->reservedpatient;
        }
    }
?>