<?php include "../FileHandling/CRUDQM.php"; include "../Frontend/QMSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Profile</h1>
            <?php $qm->ShowProfile(); ?>
        </div>
    </div>
</html>