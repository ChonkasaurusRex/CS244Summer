<?php include "../FileHandling/CRUDPatient.php"; include "../Frontend/PatientSideMenu.html"; ?>
<?php
    function IdInp(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['id'])){
                $_SESSION['docid']=$_POST['id'];
                header("Location:../Frontend/ShowApp.php");
            }
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <h1>Reserve Appointment</h1>
            <form action="<?php IdInp();"" ?>" method="POST">
                Input Doctor's ID:
                <input type="text" name="id" id="id"><br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</html>