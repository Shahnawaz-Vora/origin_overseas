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
if(isset($_GET['resetLink']))
{
    $reset_code=$_GET['resetLink']; 
}
else
{
    header('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Account Password Recovery | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Password Recovery Page">
    <meta name="keywords" content="Password Recovery, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
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
                        <h1 class="">Reset Password</h1><br><br>
                        <form class="text-left" action="reset_password.php" method="post">
                            <div class="form">
                                <div id="password-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" autocomplete="off" name="password" type="password" required="" minlength="6" value="" placeholder="New Password">
                                </div>
                                <div id="cpassword-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="cpassword" name="cpassword" type="password" required="" value="" minlength="6" autocomplete="off" placeholder="Confirm Password">
                                    <span id="match_error" class="text-danger font-weight-bold mt-1 ml-1" style="display: none;font-size: 1em;">Password Not Match</span>
                                </div>
                                <input type="hidden" name="reset_code" value="<?php echo $reset_code ?>">
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper"><br>
                                        <button type="submit" name="submit" class="btn btn-primary" id="submit" value="" disabled="">Reset</button>
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
<script type="text/javascript">
    $("#password, #cpassword").on("keyup", function () {
        password();
    });
    function password(){
        var password=$("#password").val();
        var cpassword=$("#cpassword").val();
        if(password != cpassword)
        {
            $("#match_error").css('display','block');
            $("#match_error").css('color','red');
            $("#submit").prop("disabled",true);
        }
        else
        {
            $("#match_error").css('display','none');
            $("#submit").prop("disabled",false);
        }
    }
</script>
<?php
if(isset($_POST['submit']))
{
    $reset_code = trim(mysqli_escape_string($conn, $_POST['reset_code']));
    $password = trim(mysqli_escape_string($conn, $_POST['password']));
    $cpassword = trim(mysqli_escape_string($conn, $_POST['cpassword']));
    $sql = "select * from student where reset_code='$reset_code'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $passUpdate = "update student set password = '$password' where reset_code='$reset_code'";
        $resultUpdate = mysqli_query($conn,$passUpdate);
        if($resultUpdate == true)
        {
            $sql1 = mysqli_query($conn,"update student set reset_code='' ");
            if(mysqli_num_rows($sql1)>0)
            {
                ?><script type="text/javascript">
                    location.replace("auth_login.php?reset_success=1");
                </script><?php
            }
            else
            {
                ?><script type="text/javascript">
                    location.replace("auth_login.php?reset_error=1)";
                </script><?php
            }    
        }
        else
        {
            ?><script type="text/javascript">
                location.replace("auth_login.php?reset_error=1)";
            </script><?php
        }
    }
    else
    {
        ?><script type="text/javascript">
            location.replace("auth_login.php?link_expire=1");
        </script><?php
    }
}
?>