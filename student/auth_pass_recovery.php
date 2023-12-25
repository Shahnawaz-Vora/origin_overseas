<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FQKPT0PS9K"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FQKPT0PS9K');
    // stop right click
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php
include_once '../database/dbh.inc.php';

if(isset($_POST['submit']))
{
    $email=trim($_POST["email"]);
    $query=mysqli_query($conn,"select * from student where email='$email' and status=1");
    $row=mysqli_fetch_assoc($query);
    $basename = basename($_SERVER['HTTP_REFERER']);
    $basename_replace = str_replace($basename, "reset_password.php", $_SERVER['HTTP_REFERER']);
    $str_code = rand(100000,10000000);
    $reset_code = str_shuffle("abcdefghijklmnopqrstuvwxyz".$str_code);
    $url = $basename_replace."?resetLink=".$reset_code;
    require '../PHPMailer-master/PHPMailerAutoload.php';
    if(mysqli_num_rows($query) > 0)
    {
        $mail = new PHPMailer();
      
        //Enable SMTP debugging.
        $mail->SMTPDebug = 0;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = TRUE;
        //Provide username and password
        $mail->Username = "uzack72@gmail.com";
        $mail->Password = "fshanu00";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "false";
        $mail->Port = 587;
        //Set TCP port to connect to
          
        $mail->From = "uzack72@gmail.com";
        $mail->FromName = "Origin Overseas";
          
        $mail->addAddress($row["email"]);
         
        $mail->isHTML(true);
         
        $mail->Subject = "Reset Password Link";
        $mail->Body = "For reset password, click on the given link:<b>".$url."</b>";
        $mail->AltBody = "This is the plain text version of the email content";
        if(!$mail->send())
        {
           $message = $mail->ErrorInfo;
           echo '<script>alert("'.$message.'");</script>';
        }
        else
        {
            $sqlUpdate = "update student set reset_code='$reset_code' where email='$email'";
            $resultUpdate = mysqli_query($conn,$sqlUpdate);
            if($resultUpdate)
            {
                echo "<script type='text/javascript'>location.href = 'auth_pass_recovery.php?success=1'</script>";
            }
            else
            {
                echo "<script>alert('oops something went wrong....');";
            }
        }
    }
    else
    {
        ?><script type="text/javascript">location.href = 'auth_pass_recovery.php?error=0'</script><?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Password Recovery Cover | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">
</head>
<body class="form">
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link">Enter your email and instructions will sent to you!</p>
                        <form class="text-left" action="auth_pass_recovery.php" method="post">
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" value="" placeholder="Email">
                                    <span class="text-danger font-weight-bold mt-1 ml-1" style="display: none;font-size: 1em;" id="email_error">Account not found</span>
                                    <span class="text-success font-weight-bold mt-1 ml-1" style="display: none;font-size: 1em;" id="success_message">Password reset link send to your email.</span>
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="submit" class="btn btn-primary" value="">Reset</button>
                                    </div>                                    
                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions">© 2020 All Rights Reserved. <a href="#">Origin Overseas - PTE tutors</a><a href="javascript:void(0);"> Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/authentication/form-1.js"></script>
    <script type="text/javascript">
        $(window).on('keydown',function(event){
            if(event.keyCode==123)
            {
                return false;
            }
            else if(event.ctrlKey && event.shiftKey && event.keyCode==73)
            {
                return false;  //Prevent from ctrl+shift+i
            }
            else if(event.ctrlKey && event.keyCode==73)
            {
                return false;  //Prevent from ctrl+shift+i
            }
        });
    </script>
</body>
</html>
<?php
if(isset($_GET['error']))
{   
    ?><script type="text/javascript">
    document.getElementById("email_error").style.display = 'block';
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
else
{
    ?><script type="text/javascript">
        document.getElementById("email_error").style.display = 'none';
    </script><?php
}
if(isset($_GET['success']))
{   
    ?><script type="text/javascript">
    document.getElementById("success_message").style.display = 'block';
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
else
{
    ?><script type="text/javascript">
        document.getElementById("success_message").style.display = 'none';
    </script><?php
}
?>