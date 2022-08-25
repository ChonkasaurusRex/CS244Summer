<?php
    function signup(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $sep='|';
            $str=$_POST['fn'].$sep.$_POST['ln'].$sep.$_POST['em'].$sep.$_POST['age'].$sep.$_POST['gn'].$sep.$_POST['add'].$sep.$_POST['pph'].$sep.$_POST['cph'].$sep.$_POST['ail'].$sep."\n";
            $filename='../Invoices/SignUp.txt';
            $file=fopen($filename, 'a+') or die ('File Inaccesible');
            fwrite($file, $str);
            fclose($file);
            header("Location: ../Frontend/signupmsg.html");
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/lgin.css">
<link rel="stylesheet" type="text/css" href="../Frontend/nav.css">
    <div id="nav-placeholder"></div>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
    $.get("../Frontend/nav.html", function(data){
        $("#nav-placeholder").replaceWith(data);
    });
    </script>
<html>
    <body>
        <br><br><br><br>
        <div class="lgn">
            <br>
            <h1>Sign Up</h1>
            <form method="POST" name="add" action="<?php signup(); ?>">
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
                <input type="submit" name="submit" value="Sign Up"><br><br>
            </form>
        </div>
    </div>
    </body>
</html>