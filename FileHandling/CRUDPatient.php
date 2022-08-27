<?php
    session_start();
    include "../Backend/Patient.php";
    function GenerateApp($day,$time){
        $times=array("9.00","9.30","10.00","10.30","11.00","11.30","12.00","12.30","13.00","13.30","14.00","14.30");
        $days=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        foreach($days as $val){
            echo "<br><br>".$val."<br>";
            foreach($times as $x){
                if($time!=$x){
                    echo $x." | ";
                }
            }
        }
    }
    function CheckApp($docid){
        $filename='../Invoices/DocApp.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$docid){
                if(array_key_exists(4,$Arrline)){
                    GenerateApp($Arrline[1],$Arrline[2]);
                }
            }
        }
        fclose($file);
    }
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
        echo "<img src='$img' alt='No Photo ID Available'>";
    }
    function GetDocLName($id){
        $filename='../Invoices/Doctor.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(2,$Arrline)){
                if($Arrline[0]==$id){
                    return $Arrline[2];
                }
            }
        }
        fclose($file);
    }
    function GetDocFName($id){
        $filename='../Invoices/Doctor.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(2,$Arrline)){
                if($Arrline[0]==$id){
                    return $Arrline[1];
                }
            }
        }
        fclose($file);
    }
    function ShowApp(Patient $pt){
        $filename='../Invoices/DocApp.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(3,$Arrline)){
                if($Arrline[3]==$pt->gethospid()){
                    $pt->SetPatApp(GetDocFName($Arrline[0]),GetDocLName($Arrline[0]),$Arrline[1],$Arrline[2]);
                    $pt->ShowAllApp();
                    echo "<hr><br>";
                }
            }
        }
        fclose($file);
    }
    function CusMeet($pid){
        $filename='../Invoices/CusMeetings.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(3,$Arrline)){
                if($Arrline[0]==$pid){
                    echo $line."<br>";
                }
            }
        }
        fclose($file);
    }
    function SearchCus(Patient $pt){
        $filename='../Invoices/CusPat.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$pt->gethospid()){
                    CusMeet($pt->gethospid());
                }
            }
        }
        fclose($file);
    }
    function SendMSG($rid,$msg){
        $str=$rid.'|'.$msg.'|';
        $file=fopen("../Invoices/RecMsg.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$str."\n");
        fclose($file);
    }
    function CheckCus(Patient $pt,$rid,$msg){
        $filename='../Invoices/CusMsg.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$pt->gethospid()){
                    SendMSG($rid,$msg);
                }
            }
        }
        fclose($file);
    }
    function CheckMsg(Patient $pt){
        $filename='../Invoices/CusMsg.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$pt->gethospid()){
                    echo $Arrline[1]."<br>";
                }
            }
        }
        fclose($file);
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