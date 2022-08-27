<?php include "../FileHandling/CRUDReceptionist.php"; include "../Frontend/ReceptionistSideMenu.html"; ?>
<?php
    function CallFunc(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            CheckCus($_POST['pid'],$_POST['msg']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Notifications</h1>
            <h3 style="color:black;">SignUp Requests</h3>
            <?php SignUpRecNot(); ?>
            <h3 style="color:black;">Appointment Requests</h3>
            <?php AppRecNot(); ?>
            <h3 style="color:black;">Meeting Requests</h3>
            <?php ShowMeetNot(); ?>
            <h3 style="color:black;">Custodian Message</h3>
            <?php CheckMsg($rp); ?><br>
            <h3 style="color:black;">Send Message to Custodian</h3>
            <form action="<?php CallFunc(); ?>" method="POST">
                PatientID: <input type="text" name="pid"><br><br>
                Add Message:<br><br>
                <textarea rows="5" cols="60" name="msg"></textarea><br><br>
                <input type="submit" name="submit" value="submit">
            </form>
            <br><br>
        </div>
    </div>
</html>