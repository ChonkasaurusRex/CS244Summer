<?php include "../FileHandling/CRUDPatient.php"; include "../Frontend/PatientSideMenu.html"; ?>
<?php
    function CallFunc(Patient $pt){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            CheckCus($pt,$_POST['rid'],$_POST['msg']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Receptionist Messages</h1>
            <h3 style="color:black;">Show Message</h3>
            <?php CheckMsg($pt); ?><br>
            <h3 style="color:black;">Send Message to Receptionist</h3>
            <form action="<?php CallFunc($pt); ?>" method="POST">
                ReceptionistID: <input type="text" name="rid"><br><br>
                Add Message:<br><br>
                <textarea rows="5" cols="60" name="msg"></textarea><br><br>
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
</html>