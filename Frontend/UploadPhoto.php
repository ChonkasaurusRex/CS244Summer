<?php include "../FileHandling/CRUDReceptionist.php"; include "../Frontend/ReceptionistSideMenu.html"; ?>
<?php
    function sds(){
        if(isset($_POST['name'])){
            $dir="../Invoices/PhotoIDs/";
            $file=$dir.basename($_FILES['img']["name"]);
            $upverify=1;
            $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["img"]["tmp_name"]);
                if($check !== false) {
                    $_SESSION['msg']="File is an image - " . $check["mime"] . ".";
                    $upverify = 1;
                } else {
                    $_SESSION['msg']= "File is not an image.";
                    $upverify = 0;
                }
            }
            if (file_exists($file)) {
                $_SESSION['msg']= "Sorry, file already exists.";
                $upverify = 0;
            }
            if($imageFileType != "jpg") {
                $_SESSION['msg']= "Only JPG is allowed.";
                $upverify = 0;
            }
            
            $var=$_POST['name'];
            $val=explode(".",basename($_FILES["img"]["name"]));
            $newfilename=$dir.str_replace($val[0], $var, basename($_FILES["img"]["name"]));
            if($upverify == 0) {
                $_SESSION['msg']= "File was not uploaded. Try Again";
            }
            else{
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $newfilename)) {
                    $_SESSION['msg']= "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
                } else {
                    $_SESSION['msg']= "Sorry, there was an error uploading your file.";
                }
            }
            //header("Location: ../Frontend/UploadPhoto.php");
        }
    }
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/profile.css">
<html>
    <div id="mn">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
        <form action="<?php sds(); ?>" method="POST" enctype="multipart/form-data">
            Enter ID of Patient:
            <input type="text" name="name" id="name"><br><br>
            Select image to upload:
            <input type="file" name="img" id="img">
            <input type="submit" value="Upload Image" name="submit"><br>
            <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>
        </form>
    </div>
</html>