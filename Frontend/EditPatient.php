<?php include "../FileHandling/CRUDReceptionist.php"; include "../Frontend/ReceptionistSideMenu.html"; ?>
<?php
    function CallFunc1(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            UpdateUser($_POST['old'],$_POST['new'],$_POST['pid']);
        }
    }
    function CallFunc2(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            DeleteUser($_POST['pid']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Edit Patients</h1>
            <h3 style="color:black;"> Update Patient Info</h3>
            <form action="<?php CallFunc1(); ?>" method="post">
                PatientID: <input type="text" name="pid">
                <br><br>
                Info To Be Replaced: <input type="text" name="old">
                <br><br>
                New Info: <input type="text" name="new">
                <br><br>
                <input type="submit" name="submit" value="Update"><br><br>
            </form>
            <h3 style="color:black;"> Delete Patient</h3>
            <form action="<?php CallFunc2(); ?>" method="post">
                PatientID: <input type="text" name="pid">
                <br><br>
                <input type="submit" name="submit" value="Delete"><br><br>
            </form>
        </div>
    </div>
</html>