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
    if (!isset($_COOKIE['studentId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Change Password | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Change Password Page">
    <meta name="keywords" content="Change Password, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../plugins/dropify/dropify.min.css">
    <link href="../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once 'navbar.php';
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Profile Setting</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <?php
            include_once 'sidebar.php';
        ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">                
                            <form id="general-info" class="section general-info" method="POST" action="" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">

                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="info">
                                                        <br><h3 class="ml-5">Change Password</h3><br><br>
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="Old Password">Old Password :</label>
                                                                            <input type="password" name="opassword" class="form-control mb-4" pattern=".{6,20}" required="" title="Password must be 6 to 20 characters" id="opassword" placeholder="Old Password">
                                                                        </div>
                                                                    </div>                           
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">New Password :</label>
                                                                            <input type="password" name="password" class="form-control mb-4" pattern=".{6,20}" required="" title="Password must be 6 to 20 characters" required="" id="password" placeholder="New Password">
                                                                        </div>
                                                                    </div>                             
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Confirm Password :</label>
                                                                            <input type="password" name="cpassword" class="form-control" pattern=".{6,20}" required="" title="Password must be 6 to 20 characters" required="" id="cpassword" placeholder="Confirm Password">
                                                                            <span id="match_error" class="text-danger font-weight-bold mt-1 ml-1" style="display: none;font-size: 1em;">Password Not Match</span>      
                                                                        </div>
                                                                    </div>  
                                                                    
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <center><button type="submit" disabled="" name="submit" id="submit" class="btn btn-primary mt-2" >Save Changes</button></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1 ml-auto">
                    <p class="">Copyright © 2020 <a target="_blank" href="#">Origin Overseas</a>, All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
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
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../plugins/dropify/dropify.min.js"></script>
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../plugins/tagInput/tags-input.js"></script> -->
    <script src="../assets/js/users/account-settings.js"></script>
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
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
    if (isset($_POST['submit'])) {
        $opassword = trim(mysqli_escape_string($conn, $_POST['opassword']));
        $password = trim(mysqli_escape_string($conn, $_POST['password']));
        $cpassword = trim(mysqli_escape_string($conn, $_POST['cpassword']));
        $student_id = $_COOKIE['studentId'];
        $sql = "select * from student where password = '$opassword' and studentId='$student_id'";
        $run = mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0)
        {
            $sql = "update student set password = '$password' where studentId='$student_id'";
            $run = mysqli_query($conn,$sql);
            if($run == true)
            {
                ?><script>location.replace('index.php?change=1');</script><?php
            }
            else
            {
                ?><script type="text/javascript">location.replace('change_password.php?error=1')</script><?php
            }
        } 
        else
        {
            ?><script type="text/javascript">location.replace('change_password.php?wrong=1')</script><?php
        }
    }
    if(isset($_GET['wrong']))
    {   
        ?><script type="text/javascript">
        Snackbar.show({ text: 'Old Password not matched. Please Try Again!', duration: 4000, });
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("wrong");
        history.pushState(null, null, "?"+queryParams.toString());
        </script><?php
    }
    if(isset($_GET['error']))
    {   
        ?><script type="text/javascript">
        Snackbar.show({ text: 'Oupss Something went wrong. Please Try Again!', duration: 4000, });
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("error");
        history.pushState(null, null, "?"+queryParams.toString());
        </script><?php
    }

?>