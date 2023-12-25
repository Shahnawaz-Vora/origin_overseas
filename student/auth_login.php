<?php
    if (isset($_COOKIE['studentId'])) {
        header("location: index.php");
        $studentId = $_COOKIE['studentId'];
    }
    include_once '../database/dbh.inc.php';
    error_reporting(0);
?>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login Cover | Origin Overseas - PTE tutors </title>
    <title>Student Login | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Student Login Page">
    <meta name="keywords" content="Student Login, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="form">
    <div class="form-container">
        <div class="form-form" style="margin-top: 70px">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Log In to <a href="../index.php"><br><span class="brand-name">Origin Overseas</span></a></h1><br>
                        <p class="signup-link">New Here? <a href="auth_register.php">Create an account</a></p>
                        <form class="text-left" method="POST" action="login.php">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Email or Mobile No.">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <input type="submit" class="btn btn-primary text-center" style="border-radius: 4px;margin-left: 0px;padding: 5px 15px 5px 15px;font-weight: normal;" name="submit" value="Log in">
                                    </div>
                                    
                                </div>
                                <div class="field-wrapper mt-5">
                                    <a href="auth_pass_recovery.php" class="forgot-pass-link">Forgot Password?</a>
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
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
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
if(isset($_GET['reset_error']))
{   
    ?><script type="text/javascript">
     Snackbar.show({ text: 'There is some error! Please Try Again later.', duration: 4000, pos: 'bottom-right' });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("reset_error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['link_expire']))
{   
    ?><script type="text/javascript">
     Snackbar.show({ text: 'You Reset Password once or link is expired.', duration: 4000, pos: 'bottom-right' });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("reset_error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['reset_success']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Password Reset Successfully', duration: 4000, pos: 'bottom-right' });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("reset_success");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['signup']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Signup Successfully', duration: 4000, pos: 'bottom-right' });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("signup");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['wrong']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Wrong Username or Password', duration: 4000, pos: 'bottom-right' });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("wrong");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['deactivated']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Your account is disabled. Please Contact us for more details', duration: 4000, pos: 'bottom-right' });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("deactivated");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>