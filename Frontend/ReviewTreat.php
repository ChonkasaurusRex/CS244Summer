<?php include "../FileHandling/CRUDQM.php"; include "../Frontend/QMSideMenu.html"; ?>
<?php
    function CallFunc(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            ReviewTreat($_POST['rv'],$_POST['pid']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Check Messages</h1>
            <h3 style="color:black;">Added Treatment</h3>
            <?php ShowPatTreat(); ?>
            <h3 style="color:black;">Approve or Decline</h3>
            <form action="<?php CallFunc(); ?>" method="POST">
                PatientID: <input type="text" name="pid"><br><br>
                Please Enter "Approved" or "Declined": <input type="text" name="rv"><br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>