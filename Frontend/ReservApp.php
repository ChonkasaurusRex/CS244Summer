<?php include "../FileHandling/CRUDPatient.php"; include "../Frontend/PatientSideMenu.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Profile</h1>
            <?php $pt->ShowProfile(); ?>
        </div>
    </div>
</html>