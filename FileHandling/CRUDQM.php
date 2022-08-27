<?php
    session_start();
    include "../Backend/QualityManger.php";
    
    function ShowPatTreat(){
        $filename='../Invoices/PatTreat.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(3,$Arrline)){
                echo "PatientID: ".$Arrline[1]."<br>";
                echo "Treatment: ".$Arrline[2]."<br>";
            }
        }
        fclose($file);
    }
    function DeleteEmpty($filename){
        $str=file_get_contents($filename);
        $str = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $str);
        file_put_contents($filename,$str);
    }
    function ReviewTreat($rv,$pid){
        $filename='../Invoices/PatTreat.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $ct=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(3,$Arrline)){
                if($Arrline[1]==$pid){
                    $liner=preg_replace('/'.$Arrline[3].'/',$rv,$line,1);
                    $crl = file( $filename, FILE_IGNORE_NEW_LINES );
                    $crl[$ct] = $liner;
                    file_put_contents($filename, implode("\n", $crl));
                    break;
                }
            }
            $ct++;
        }
        fwrite($file,"\n");
        fclose($file);
        DeleteEmpty($filename);
    }
    function CheckRecMsg(){
        $filename='../Invoices/CusMsg.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                echo $Arrline[1]."<br>";
            }
        }
        fclose($file);
    }
    function CheckPatMsg(){
        $filename='../Invoices/RecMsg.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                echo $Arrline[1]."<br>";
            }
        }
        fclose($file);
    }

    $id_value = $_SESSION['ID'];
    $filename='../Invoices/QualMan.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $qm=new QualityManager($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4]);
        }
    }
    fclose($file);
?>