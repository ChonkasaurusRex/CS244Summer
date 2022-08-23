<?php session_start(); ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="nav.css">
<link rel="stylesheet" type="text/css" href="lgin.css">
<html>
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <div id="nav-placeholder"></div>
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script>
            $.get("nav.html", function(data){
                $("#nav-placeholder").replaceWith(data);
            });
        </script>
    </head>
    <?php
        //This checks if email isn't inputted
        function ifempty(&$EmError){
            if (empty($_POST['email'])) {
                $EmError = "";
                return true;
            }
        }
        //This searches for email in txt files
        function SearchEm($file,$sendEM){
            $filetype=fopen($file,'a+') or die ('File Inaccesible');
            $seperator="|";
            $i=0;
            while(!feof($filetype)){
                $line=fgets($filetype);
                $Arrline=explode($seperator,$line);
                if(array_key_exists(3,$Arrline)){
                    if($Arrline[3]==$sendEM){
                        fclose($filetype);
                        return true;
                    }
                }
            }
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $sendEM=$_POST['email'];
        }
        else{
            $sendEM="";
        }
    ?>
    <body>
        <hr id="navsep"></hr>
        <div class="lgn">
            <!--This redirects to another page if email is found, or displays error message if it isn't found-->
            <form method="post" action="<?php if(SearchEm("../Invoices/Patient.txt",$sendEM)==true){
                header("Location: ../Backend/SendEmail.php");
                $_SESSION['email'] = $sendEM;
            } ?>">
            <h1 id="ln">Reset Password</h1>
            <hr class="lnsep"></hr>
            <p class="info">Please Enter Your Email</p>
            <div class="form">
                E-mail: <input type="text" name="email">
                
                <br><br>
                <input type="submit" name="submit" value="Confirm" class="lnbutton"><br><br>
                </form>
            </div>
        </div>
    </body>
</html>