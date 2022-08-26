<?php
    session_start();
    include "../Backend/Patient.php";

    function SetCustodian(Patient $pt,$pid){
        $filename='../Invoices/Custodian.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$pid){
                $pt->SetCustodian($Arrline[0],$Arrline[1]);
            }
        }
        fclose($file);
    }

    function CheckCusPat(Patient $pt){
        $filename='../Invoices/CusPat.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$pt->gethospid()){
                SetCustodian($pt,$Arrline[1]);
            }
        }
        fclose($file);
    }

    function CheckAge(Patient $pt){
        if($pt->getage()<16){
            CheckCusPat($pt);
            header("Location: ../Frontend/CustodianSignin.php");
        }
        else{
            header("Location: ../Frontend/PatientProfile.php");
        }
    }
    function ShowPhoto(Patient $pt){
        $img=strval("../Invoices/PhotoIDs/".$pt->gethospid().".jpg");
        echo "<img src='$img' alt='img'>";
    }
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