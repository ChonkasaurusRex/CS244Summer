<?php include "../FileHandling/CRUDReceptionist.php"; include "../Frontend/ReceptionistSideMenu.html"; ?>
<?php
    function CallFunc(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            ScheduleMeeting($_POST['pid'],$_POST['day'],$_POST['time'],$_POST['did']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Schedule Meetings</h1>
            <form action="<?php CallFunc(); ?>" method="post">
                PatientID: <input type="text" name="pid">
                <br><br>
                DoctorID: <input type="text" name="did">
                <br><br>
                Meeting Day: <input type="text" name="day">
                <br><br>
                Meeting Time: <input type="text" name="time">
                <br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>