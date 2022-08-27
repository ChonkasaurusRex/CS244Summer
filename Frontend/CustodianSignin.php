<?php session_start(); include "TopNav.html"; ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="lgin.css">
<html>
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script>
    //This function shows/hides passwords
    function myFunction() {
        var x = document.getElementById("inp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
    <body>
        <?php
            //This calls a functions to validate inputs from user
            $red=true;
            $ID=$Pass="";
            $IDerr=$Passerr="";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['ID'])) {
                    $IDerr = "ID is required";
                }else {
                    $ID=test_input($_POST['ID']);
                    if (!filter_var($ID, FILTER_VALIDATE_INT)) {
                       $IDerr = "Only numbers allowed";
                    }
                }

                if (empty($_POST['pass'])) {
                    $Passerr = "Password is required";
                    
                } else {
                    $Pass=test_input($_POST['pass']);
                }
                if($IDerr=="" && $Passerr==""){
                    $red=true;
                }
                else{
                    $red=false;
                }
            }
            //Validation Function
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            //Searches for inputted id, email and password in the associated text files, then returns true if found
            function checkuser($file){
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    if(isset($_POST['ID']) && isset($_POST['pass'])){
                        $IDcheck=$_POST['ID'];
                        $Passcheck=$_POST['pass'];
                        $ct=0;
                        $Err=2;
                        $filetype=fopen($file,'a+') or die ('File Inaccesible');
                        $seperator="|";
                        while(!feof($filetype)){
                            $line=fgets($filetype);
                            $Arrline=explode($seperator,$line);
                            if($Arrline[0]==$IDcheck){
                                ++$ct;
                                fclose($filetype);
                                break;
                            }
                        }
                        $filetype=fopen($file,'a+') or die ('File Inaccesible');
                        $seperator="|";
                        while(!feof($filetype)){
                            $line=fgets($filetype);
                            $Arrline=explode($seperator,$line);
                            if(array_key_exists(4,$Arrline)){
                                if($Arrline[4]==$Passcheck){
                                    ++$ct;
                                    fclose($filetype);
                                    break;
                                }
                            }
                        }
                        if($ct==2){
                            return $IDcheck;
                        }
                        $Err=2;
                        return $Err;
                        fclose($filetype);
                    }
                }
            }
        ?>
        <?php
            //Calls the search function with the text file depending on the user type
            $intype=filter_input(INPUT_POST, 'login', FILTER_UNSAFE_RAW);
            $utype=0;
            $uval="";
            if(checkuser('../Invoices/Custodian.txt') == 3 && $_POST['ID'] != ""){
                $IDerr="Paramaters Invalid";
            }
            else{
                $utype=checkuser('../Invoices/Custodian.txt');
                $uval="p";
            }
        ?>
        <hr id="navsep"></hr>
        <div class="lgn">
            <h1 id="ln">Custodian Sign In</h1>
            <hr class="lnsep"></hr><br>
            <!--This chekcs the user type and redirects to their page after all validation is complete-->
            <form method="post" action="<?php if($red==true && $uval=="p"){
                if(isset($_POST['ID']) && isset($_POST['pass'])){header("Location: ../Frontend/PatientProfile.php");}
            }
            elseif ($red==false){
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
            } ?>">
            <div class="form">
                Personal ID: <input type="text" name="ID" value="<?php echo $ID;?>">
                <span class="error">* <?php echo $IDerr;?></span>
                <br><br>
                Password: <input id="inp" type="password" name="pass" value="<?php echo $Pass;?>">
                <span class="error"><?php echo $Passerr;?></span>
                <br><br>
                <input type="checkbox" onclick="myFunction()">Show Password<br><br> <!--Calls JS function to show and hide password-->
                <input type="submit" name="submit" value="Sign In" class="lnbutton"><br><br>
                <a class="fp" href="http://localhost/CS244Summer/Frontend/EmNewPass.php">Forgot Password?<br><br>
                </form>
            </div>
        </div>
    </body>
</html>