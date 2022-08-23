<?php 
    include "../FileHandling/CRUDReceptionist.php";
    include "../Frontend/ReceptionistSideMenu.html";
    function CallFunc(){
        $cred="";
        $s="|";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $cred=$_POST['fn'].$s.$_POST['ln'].$s.$_POST['em'].$s.$_POST['pass'].$s.$_POST['age'].$s.$_POST['gn'].$s.$_POST['add'].$s.$_POST['pph'].$s.$_POST['cph'].$s.$_POST['ail'].$s;
            AddPatient($cred);
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
                First Name: <input type="text" name="fn">
                <br><br>
                Last Name: <input type="text" name="ln">
                <br><br>
                E-mail: <input type="text" name="em">
                <br><br>
                Password: <input type="text" name="pass"> <!-- Should it be generated?-->
                <br><br>
                Age: <input type="text" name="age">
                <br><br>
                Gender: <input type="text" name="gn">
                <br><br>
                Address: <input type="text" name="add">
                <br><br>
                Personal Phone: <input type="text" name="pph">
                <br><br>
                Custodian Phone: <input type="text" name="cph">
                <br><br>
                Ailment: <input type="text" name="ail">
                <br><br>
                <input type="submit" name="submit" value="Add"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>