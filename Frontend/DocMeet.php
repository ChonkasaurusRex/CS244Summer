<?php include "../FileHandling/CRUDDoctor.php"; include "../Frontend/DoctorSideMenu.html"; ?>
<?php
    function CallFunc(Doctor $doc){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            WriteMeeting($_POST['pid'],$doc->gethospid(),$_POST['day'],$_POST['time']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Meetings</h1>
            <h3 style="color:black">Upcoming Custodian Meetings</h3>
            <?php ShowCusMeetings(); ?>
            <h3 style="color:black">Schedule Custodian Meetings</h3>
            <form action="<?php CallFunc($doc); ?>" method="post">
                PatientID: <input type="text" name="pid">
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