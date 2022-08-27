<?php include "../FileHandling/CRUDDoctor.php"; include "../Frontend/DoctorSideMenu.html"; ?>
<?php
    function CallFunc(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            WriteComments($_POST['pid'],$_POST['comment']);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Comments</h1>
            <form action="<?php CallFunc(); ?>" method="post">
                PatientID: <input type="text" name="pid" id="pid"><br><br>
                Add Comment:<br><br>
                <textarea rows="5" cols="60" name="comment"></textarea><br>
                <br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>