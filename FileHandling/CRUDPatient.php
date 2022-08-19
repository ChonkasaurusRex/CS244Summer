<?php
    session_start();
    include "../Backend/Patient.php";

    //Recieve ID from login page, searches for it in patient file, then creates an object of the patient
    $id_value = $_SESSION['ID'];
    $filename='../Invoices/Patient.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $pt=new Patient($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5],$Arrline[6],$Arrline[7],$Arrline[8],$Arrline[9],$Arrline[10]);
        }
    }
    fclose($file);
?>