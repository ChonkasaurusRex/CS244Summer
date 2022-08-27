<?php include "../FileHandling/CRUDDoctor.php"; include "../Frontend/DoctorSideMenu.html"; ?>
<?php
    function CallFunc(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            SendMSG($_POST['pid'],$_POST['msg']);
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
            <h3 style="color:black;">Show Message</h3>
            <?php CheckMsg(); ?><br>
            <h3 style="color:black;">Send Message to Receptionist</h3>
            <form action="<?php CallFunc(); ?>" method="POST">
                PatientID: <input type="text" name="pid"><br><br>
                Add Message:<br><br>
                <textarea rows="5" cols="60" name="msg"></textarea><br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>