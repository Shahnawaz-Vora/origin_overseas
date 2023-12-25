<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
    include_once("../../database/dbh.inc.php");
    if(isset($_GET['test']))
    {
        session_start();
        $_SESSION['test_id'] = uniqid();
        $modify_date = date("Y/m/d");
        $test_no = $_SESSION['test_id'];
    }
    else if(isset($_GET['testno']))
    {
        $test_no = $_GET['testno'];
        $modify_date = date("Y/m/d");
    }else{
        ?><script>location.replace("../index.php");</script><?php
    }

    $question_no = $_GET['question_no'];
    $section = "writing";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Create Test-Writing: Summarize Written Text | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
      <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../../plugins/dropify/dropify.min.css">
    <link href="../../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../plugins/animate/animate.css">
    <link href="../../assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/step.css">
    <!--  END CUSTOM STYLE FILE  -->
    <script type="text/javascript" >
       function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
</head>
<body>
     <div id="load_screen"> <div class="loader"> <div class="loaer-contdent">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once 'header.php';
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
                                <li class="breadcrumb-item"><a href="index.php">Create Test</a></li>
                                 <li class="breadcrumb-item active" aria-current="page"><span>Writing: Summarize Written Text </span></li>
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
                            <?php include_once("breadcrumb.php "); ?>              
                            <form id="general-info" class="section general-info" method="POST" action="" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                            
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing">
                                                    <h4><center><b>Summarize Written Text</b> : Question <?php echo $question_no; ?></center></h4>
                                                    <div class="info">
                                                        <h6 class="pl-2">
                                                       Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" class="form-control" name="question_text" required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">
                                                       Answer:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" class="form-control" name="answer" required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="test_no" value="<?php echo $test_no; ?>">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group" align="center">
                                            <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Next</button>
                                        </div>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <!-- <script src="../../assets/js/custom.js"></script> -->
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../plugins/dropify/dropify.min.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../../plugins/tagInput/tags-input.js"></script> -->
    <script src="../../assets/js/users/account-settings.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        include_once '../../database/dbh.inc.php';
        $type = "summarize-written-text";
        $test_no = $_POST['test_no'];
        $question_text = trim(addslashes(mysqli_real_escape_string($conn, $_POST['question_text'])));
        $answer = trim(addslashes(mysqli_real_escape_string($conn, $_POST['answer'])));
        $modify_date = date("Y/m/d");
        if($_GET['question_no'] == 1)
        {
         $sql = mysqli_query($conn , "INSERT INTO manage_section_test(test_no,modify_date) VALUES('$test_no','$modify_date')");
        }
        $question_no = $_GET['question_no'];
        $sql = mysqli_query($conn, "INSERT INTO `section_test`(`test_no`,`question_no`,`type`,`questionText`,`answer`,`modify_date`,`section`) VALUES ('$test_no','$question_no','$type','$question_text','$answer','$modify_date','$section')");
        if ($sql == true) {
            $tot_question = mysqli_query($conn , "SELECT total_question_entered FROM manage_section_test WHERE test_no='$test_no' ");
            $row = mysqli_fetch_assoc($tot_question);
            $totques = $row['total_question_entered'] + 1;
            $sql = mysqli_query($conn,"update manage_section_test set modify_date='$modify_date',total_question_entered='$totques' where test_no='$test_no' ");
            $question_no += 1;
            if(isset($_GET['test_name']) &&  isset($_GET['test_price']))
            {
                $test_name = $_GET['test_name'];
                $test_price = $_GET['test_price'];
                $sql = mysqli_query($conn, "update manage_section_test set test_name='$test_name',test_price='$test_price' where test_no='$test_no'");
            }
            if($question_no <= 3)
            {
                ?><script>location.replace("writing_written_text.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no ?>&question=success");</script><?php
            }
            else
            {
                ?><script>location.replace("writing_essay.php?testno=<?php echo $test_no; ?>&question_no=1&question=success");</script><?php    
            }
        }
        else
        {
            ?><script type="text/javascript">location.href = "writing_written_text.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no;?>&error=1";</script><?php
        }
    }
?>
<?php
if(isset($_GET['error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Some Error, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['question']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Question Inserted', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("question");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>