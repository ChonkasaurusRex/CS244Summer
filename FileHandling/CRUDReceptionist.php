<?php
    session_start();
    include "../Backend/Receptionist.php";
    include "../Backend/SignUpInfo.php";

    function AutomateID($filename,$DefualtID){
        $str=$DefualtID."|";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        fwrite($file, $str);
        fclose($file);
    }
    function ReadPrevID($filename){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $incrid=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(empty($line)){
                break;
            }
            $incrid=intval($Arrline[0]);
        }
        fclose($file);
        return $incrid+1;
    }
    function RemoveNot($filename){
        $crl = file($filename);
        $crl[0] = "";
        file_put_contents($filename,$crl);
    }
    function GeneratePass($id,$fn){
        $pass='|'.$fn.$id.'|';
        return $pass;
    }
    function ReadDefID(){
        $filename="../Invoices/Patient.txt";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $val="";
        while(!feof($file,)){
            $line=fgets($file);
            if(empty($line)){
                break;
            }
            $Arrline=explode($seperator,$line);
            $val=$Arrline[0];
        }
        fclose($file);
        return $val;
    }
    function AddPatient($credentials1,$credentials2,$fn=""){
        $filename="../Invoices/Patient.txt";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        AutomateID($filename,ReadPrevID($filename));
        fwrite($file,$credentials1.GeneratePass(ReadDefID(),$fn).$credentials2."\n");
        fclose($file);
        RemoveNot("../Invoices/SignUp.txt");
    }
    function CheckLastLine($filename,$id){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $max=-9999999;
        while(!feof($file,)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(intval($Arrline[0])>$max && !empty($Arrline[0])){
                $max=intval($Arrline[0]);
            }
        }
        fclose($file);
        if($max==$id){
            return true;
        }
    }
    function DeleteEmpty($filename){
        $str=file_get_contents($filename);
        $str = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $str);
        file_put_contents($filename,$str);
    }
    function UpdateUser($old,$new,$id){
        $filename="../Invoices/Patient.txt";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $ct=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($id==$Arrline[0]){
                $liner=preg_replace('/'.$old.'/',$new,$line,1);
                $crl = file( $filename, FILE_IGNORE_NEW_LINES );
                $crl[$ct] = $liner;
                file_put_contents($filename, implode("\n", $crl));
                if(CheckLastLine($filename,$id)!=true){
                   file_put_contents($filename, implode("\n", $crl));
                }
                break;
            }
            $ct++;
        }
        fwrite($file,"\n");
        fclose($file);
        DeleteEmpty($filename);
    }
    function DeleteUser($id){
        $filename="../Invoices/Patient.txt";
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        $ct=0;
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if($id==$Arrline[0]){
                $crl = file( $filename );
                $crl[$ct] = "";
                file_put_contents($filename,$crl);
                break;
            }
            $ct++;
        }
        fclose($file);
    }
    function ViewPatients(){
        $filename='../Invoices/Patient.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        while(!feof($file)){
            $line=fgets($file);
            echo $line."<br><br>";
        }
        fclose($file);
    }
    function SignUpRecNot(){
        $filename='../Invoices/SignUp.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(9,$Arrline)){
                $sp=new SignUpInfo($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5],$Arrline[6],$Arrline[7],$Arrline[8],$Arrline[9]);
            }
            if(empty($line)==false){
                $sp->ShowAllInfo();
                echo "<br>";
            }
        }
        fclose($file);
    }
    function AppRecNot(){
        $filename='../Invoices/AppReq.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        while(!feof($file)){
            $line=fgets($file);
            echo $line."<br>";
        }
        fclose($file);
    }
    function AddApp($credentials,$cred2){
        $file=fopen("../Invoices/DocApp.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$credentials."\n");
        fclose($file);
        $file=fopen("../Invoices/CusPat.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$cred2."\n");
        fclose($file);
        RemoveNot("../Invoices/AppReq.txt");
    }
    function WriteMeetingCus($pid,$did,$day,$time){
        $str=$pid.'|'.$did.'|'.$day.'|'.$time.'|';
        $file=fopen("../Invoices/CusMeetings.txt", 'a+') or die ('File Inaccesible');
        fwrite($file,$str."\n");
        fclose($file);
        RemoveNot("../Invoices/MeetNot.txt");
    }
    function ScheduleMeeting($pid,$day,$time,$did){
        $filename='../Invoices/MeetNot.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$pid){
                    WriteMeetingCus($pid,$did,$day,$time);
                }
            }
        }
        fclose($file);
    }
    function ShowMeetNot(){
        $filename='../Invoices/MeetNot.txt';
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
    function CheckCus($pid,$msg){
        $filename='../Invoices/CusPat.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$pid){
                    SendMSG($pid,$msg);
                }
            }
        }
        fclose($file);
    }
    function CheckMsg(Receptionist $rp){
        $filename='../Invoices/RecMsg.txt';
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            if(array_key_exists(1,$Arrline)){
                if($Arrline[0]==$rp->gethospid()){
                    echo $Arrline[1]."<br>";
                }
            }
        }
        fclose($file);
    }

    $id_value = $_SESSION['ID'];
    $filename='../Invoices/Receptionist.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $rp=new Receptionist($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4]);
        }
    }
    fclose($file);
?>