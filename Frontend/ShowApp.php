<?php include "../FileHandling/CRUDPatient.php"; include "../Frontend/PatientSideMenu.html"; ?>
<?php
    function AppNot(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $sep='|';
            $str=$_SESSION['docid'].$sep.$_POST['day'].$sep.$_POST['time'].$sep.$_SESSION['ID']."\n";
            $filename='../Invoices/AppReq.txt';
            $file=fopen($filename, 'a+') or die ('File Inaccesible');
            fwrite($file, $str);
            fclose($file);
            header("Location: ../Frontend/ReserveMsg.html");
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Requested Doctor's Available Appointments</h1>
            <?php CheckApp($_SESSION['docid']); ?><br><br>
            <h2>Please Enter Desired Day and Time:<br>(Note:Each Appointment is 30 Minutes. The Displayed Times Are The Start Times)<br></h2>
            <form action="<?php AppNot(); ?>" method="POST">
                Input Day:
                <input type="text" name="day" id="day"><br><br>
                Input Time:
                <input type="text" name="time" id="time"><br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>