<?php 
    include "../FileHandling/CRUDReceptionist.php";
    include "../Frontend/ReceptionistSideMenu.html";
    function CallFunc(){
        $s="|";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $cred=$_POST['did'].$s.$_POST['day'].$s.$_POST['tm'].$s.$_POST['pid'].$s;
            $cred2=$_POST['pid'].$s.$_POST['did'].$s;
            AddApp($cred,$cred2);
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <body>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <div id="adm">
            <br>
            <h1>Add New Patient</h1>
            <form method="POST" name="add" action="<?php CallFunc(); ?>">
                Doctor's ID: <input type="text" name="did">
                <br><br>
                Day: <input type="text" name="day">
                <br><br>
                Time: <input type="text" name="tm">
                <br><br>
                Patient's ID: <input type="text" name="pid">
                <br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>