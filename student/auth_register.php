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
    <title>Register Cover | Origin Overseas - PTE tutors </title>
    
    <title>Student Registeration | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Student Registeration Page">
    <meta name="keywords" content="Student Registeration, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
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
        <div class="form-form" style="margin-top: 50px">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Get started with a <span class="brand-name">free account</span></h1>
                        <p class="signup-link">Already have an account? <a href="auth_login.php">Log in</a></p>
                        <form class="text-left" method="POST" action="">
                            <div class="form">

                                
                                <div id="username-field" class="field-wrapper input d-inline-block" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="Blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy=    "7" r="4"></circle></svg>
                                    <input id="username" name="firstName" type="text" class="form-control d-inline-block" style="width: 47%;margin-left: 5px" required="" pattern="[A-Za-z]{0,20}" placeholder="First Name">
                                    <input id="username" name="lastName" type="text" class="form-control d-inline-block" style="width: 47%;float: right;margin-left: 5px" pattern="[A-Za-z]{0,20}" required="" placeholder="Last Name">
                                </div>
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    <input id="mobileNo" name="mobileNo" type="text" size="10" maxlength="10" pattern="[1-9]{1}[0-9]{9}" required="" placeholder="Mobile Number">
                                    <span id="phone_error" style="display: none;margin-top: 5px;">Mobile No. already registered</span>
                                </div>
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email"  required="" placeholder="Email">
                                    <span id="email_error" style="display: none;margin-top: 5px;">Email already registered</span>
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" minlength="6"  required="" placeholder="Password">
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
                                        <input type="submit" class="btn btn-primary text-center" style="border-radius: 4px;margin-left: 0px;padding: 5px 15px 5px 15px;font-weight: normal;" name="submit" value="Get Started!">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="terms-conditions">© 2020 All Rights Reserved. <a href="index.php">Origin Overseas - PTE tutors</a><a href="javascript:void(0);"> Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>
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

</body>
</html>
<script type="text/javascript">
    $("#email").on("keyup focusin focusout", function () {
            email();
        });
     function email(){
            var email = $("#email").val();
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {email: email},
                success: function (response) {
                    if(response == '1')
                    {
                        $("#email_error").css("display","block");
                        $("#email_error").css("color","red");
                        $("#submit").attr("disabled",true);
                        email_error = false;
                        return false;
                    }
                    else
                    {
                        $("#email_error").css("display","none");
                        $("#submit").attr("disabled",false);
                    }
                }
            });
        }
        $("#mobileNo").on("keyup focusin focusout", function () {
            mobileNo();
        });
        function mobileNo(){
            var mobileNo = $("#mobileNo").val();
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {mobileno: mobileNo},
                success: function (response) {
                    if(response == 1)
                    {
                        $("#phone_error").css("display","block");
                        $("#phone_error").css("color","red");
                        $("#submit").attr("disabled",true);
                        phone_error = false;
                        return false;
                    }
                    else
                    {
                        $("#phone_error").css("display","none");
                        $("#submit").attr("disabled",false);
                    }
                }
            });
        }
</script>
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
<?php
    
if (isset($_POST['submit'])) {

    include_once '../database/dbh.inc.php';

    $firstName = trim(mysqli_real_escape_string($conn, $_POST['firstName']));
    $lastName =  trim(mysqli_real_escape_string($conn, $_POST['lastName']));
    $mobileNo =  trim(mysqli_real_escape_string($conn, $_POST['mobileNo']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    
    $sql="SELECT * FROM student WHERE email='$email' || mobileNo='$mobileNo' ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
    }else{
        $joinDate = date("Y-m-d");
        $dateCreate = date_create($joinDate);
        $addDate = date_add($dateCreate,date_interval_create_from_date_string("90 days"));
        $endDate = date_format($addDate,"Y-m-d");
        $sql = "INSERT INTO student (firstName, lastName, mobileNo, email, password,profileImg,status,joinDate,endDate) VALUES ('$firstName','$lastName',$mobileNo,'$email','$password','noprofile.jpg',1,'$joinDate','$endDate');";
        mysqli_query($conn, $sql);
        ?>
        <script type="text/javascript">
            window.location = "auth_login.php?signup=success";
        </script>
        <?php
        // header("location: ");
    }
}

?>