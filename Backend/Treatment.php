<?php
    trait Treatment{
        private $TreatmentId;
        private $TreatmentName;
        private $PatientID;
        function __construct($tid,$tn,$PatientID){
            $this->TreatmentId=$tid;
            $this->TreatmentName=$tn;
            $this->PatientID=$PatientID;
        }
        public function gettid(){
            return $this->TreatmentId;
        }
        public function gettn(){
            return $this->TreatmentName;
        }
        public function getpid(){
            return $this->PatientID;
        }
    }
?>