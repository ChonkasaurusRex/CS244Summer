<?php
    session_start();
    include "../Backend/Doctor.php";
    
    function CheckApt(Doctor $doc){
        $filename='../Invoices/DocApp.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$doc->gethospid()){
                $doc->setApp($Arrline[1],$Arrline[2],$Arrline[3]);
                echo $doc->getDay()."<br>";
                echo $doc->getAptT()."<br>";
                echo $doc->getRP()."<br>";
            }
        }
        fclose($file);
    }

    $id_value = $_SESSION['ID'];
    $filename='../Invoices/Doctor.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $doc=new Doctor($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5]);
        }
    }
    fclose($file);
?>