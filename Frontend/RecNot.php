<?php include "../FileHandling/CRUDReceptionist.php"; include "../Frontend/ReceptionistSideMenu.html"; ?>
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
        </div>
    </div>
</html>