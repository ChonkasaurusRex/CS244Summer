<?php
    session_start();
    include "../Backend/Doctor.php";
    
    function ShowPatientName($id){
        $filename='../Invoices/Patient.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$id){
                return $Arrline[1]." ".$Arrline[2];
            }
        }
        fclose($file);
    }
    function CheckApt(Doctor $doc){
        $filename='../Invoices/DocApp.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($Arrline[0]==$doc->gethospid()){
                $doc->setApp($Arrline[1],$Arrline[2],ShowPatientName($Arrline[3]));
                echo $doc->getDay()."<br>";
                echo $doc->getAptT()."<br>";
                echo $doc->getRP()."<br>";
            }
        }
        fclose($file);
    }
    function WriteTreatment($trname,$pid,$docid){
        $str=$docid.'|'.$pid.'|'.$trname.'|'."N/A".'|';
        $file=fopen("../Invoices/PatTreat.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$str."\n");
        fclose($file);
    }
    function AddTreatment($pid,$tid,Doctor $doc){
        $filename='../Invoices/Treatments.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$tid){
                    $doc->setTreat($tid,$Arrline[1],$pid);
                    WriteTreatment($Arrline[1],$pid,$doc->gethospid());
                }
            }
        }
        fclose($file);
    }
    function SearchTreatID($tid){
        $filename='../Invoices/Treatments.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$tid){
                    return $Arrline[1];
                }
            }
        }
        fclose($file);
    }
    function DeleteEmpty($filename){
        $str=file_get_contents($filename);
        $str = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $str);
        file_put_contents($filename,$str);
    }
    function EditTreatment(Doctor $doc,$pid,$tid){
        $filename="../Invoices/PatTreat.txt";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $ct=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(3,$Arrline)){
                if($Arrline[0]==$doc->gethospid() && $Arrline[1]==$pid){
                    if($Arrline[3]!="Approved"){
                        $liner=preg_replace('/'.$Arrline[2].'/',SearchTreatID($tid),$line,1);
                        $crl = file( $filename, FILE_IGNORE_NEW_LINES );
                        $crl[$ct] = $liner;
                        file_put_contents($filename, implode("\n", $crl));
                        break;
                    }
                    else{
                        break;
                    }
                    $ct++;
                }
            }
        }
        fwrite($file,"\n");
        fclose($file);
        DeleteEmpty($filename);
    }
    function WriteMeeting($pid,$did,$day,$time){
        $str=$pid.'|'.$did.'|'.$day.'|'.$time.'|';
        $file=fopen("../Invoices/MeetNot.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$str."\n");
        fclose($file);
    }
    function WriteComments($pid,$comment){
        $str=$pid.'|'.$comment.'|';
        $file=fopen("../Invoices/Comments.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$str."\n");
        fclose($file);
    }
    function ShowCusMeetings(){
        $filename='../Invoices/CusMeetings.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        while(!feof($file)){
            $line=fgets($file);
            echo $line."<br>";
        }
        fclose($file);
    }
    function SendMSG($pid,$msg){
        $str=$pid.'|'.$msg.'|';
        $file=fopen("../Invoices/CusMsg.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$str."\n");
        fclose($file);
    }
    function CheckMsg(){
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