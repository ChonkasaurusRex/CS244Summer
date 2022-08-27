<?php include "../FileHandling/CRUDQM.php"; include "../Frontend/QMSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Check Messages</h1>
            <h3 style="color:black;">Messages From Receptionist And Doctor</h3>
            <?php CheckRecMsg(); ?>
            <h3 style="color:black;">Messages From Custodian</h3>
            <?php CheckPatMsg(); ?><br><br>
        </div>
    </div>
</html>