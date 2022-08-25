<?php include "../Backend/SignUpInfo.php"; echo $sp->getail(); ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../Frontend/nav.css">
    <div id="nav-placeholder"></div>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
    $.get("../Frontend/nav.html", function(data){
        $("#nav-placeholder").replaceWith(data);
    });
    </script>
<html>
    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px;" leftmargin="0">
        <table cellspacing="0" border="0" cellpadding="0" width="100%" 
            style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
            <tr>
                <td>
                    <table style=" max-width:670px;  margin:0 auto;" width="100%" border="0"
                        align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                    style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 35px;">
                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Register Request Has Been Made</h1>
                                            <span
                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                            <p style="color:#455056; background-color: #20e277; font-size:15px;line-height:24px; margin:0;">
                                                A request to register an account has been made. The request will be checked up on by a receptionist. Please wait shortly for your request to be approved. An email will be sent to you to confirm the approval of your request . If the request has been made during the hospital's closing time, please be patient as it will be approved once it's been seen.
                                            </p>
                                            <a href="https://accounts.google.com/ServiceLogin?continue=https://mail.google.com/mail/"       target="_blank"
                                                style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Visit Email</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>