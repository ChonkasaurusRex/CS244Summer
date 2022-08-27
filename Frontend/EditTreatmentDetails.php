<?php include "../FileHandling/CRUDDoctor.php"; include "../Frontend/DoctorSideMenu.html"; ?>
<?php
    function CallFunc(Doctor $doc){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            EditTreatment($doc,$_POST['userId'],$_POST['treatId']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Edit Treatments</h1>
            <form action="<?php CallFunc($doc); ?>" method="post">
                PatientID: <input type="text" name="userId">
                <br><br>
                New TreatmentID: <input type="text" name="treatId">
                <br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>