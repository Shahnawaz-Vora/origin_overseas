<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
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
    $section = "reading";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Create Test-Reading: Multiple-choice, choose single answer | Origin Overseas - PTE tutors </title>
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
                                 <li class="breadcrumb-item active" aria-current="page"><span>Reading: Multiple-choice, choose single answer </span></li>
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
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing"><br>
                                                    <h4><center><b>Multiple-choice, choose single answer</b> : Question <?php echo $question_no; ?></center></h4><br>
                                                    <div class="info">
                                                        <h6 class="pl-2">Question:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                   <textarea rows="4" class="form-control" id="question" name="question" required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                   <textarea rows="7" class="form-control" id="question_text" name="question_text" required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">No. of Options:</h6><br>
                                                        <div class="row" style="margin-top: -55px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <select name="options" id="options" onchange="change();" class="form-control custom-control mt-2" required="">
                                                                        <option value="" selected="" disabled="">--Select Option--</option> 
                                                                        <option value=1>1</option>
                                                                        <option value=2>2</option>
                                                                        <option value=3>3</option>
                                                                        <option value=4>4</option>
                                                                        <option value=5>5</option>
                                                                        <option value=6>6</option>
                                                                        <option value=7>7</option>
                                                                        <option value=8>8</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info">
                                                        <h6 class="pl-2" style="display: none;" id="option_text">Option:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                    
                                                                    <div class="col-md-12" style="display: none;" id="option1" >
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="0" id="radio1" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                             <input  name="option1" class="form-control" id="opt1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option2">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 2</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="1" id="radio2" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                            
                                                                             <input  name="option2" class="form-control" id="opt2">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option3">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 3</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="2" id="radio3" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                            
                                                                             <input  name="option3" class="form-control" id="opt3">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option4">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 4</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="3" id="radio4" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                            
                                                                             <input  name="option4" class="form-control" id="opt4">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" >
                                                                    <div class="col-md-12" style="display: none;" id="option5">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 5</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="4" id="radio5" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                      
                                                                             <input  name="option5" class="form-control" id="opt5">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option6">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 6</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="5" id="radio6" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                            
                                                                             <input  name="option6" class="form-control" id="opt6">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option7">
                                                                        <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 7</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="6" id="radio7" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                           
                                                                             <input  name="option7" class="form-control" id="opt7">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option8">
                                                                        <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 8</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="radio" name="radio" value="7" id="radio8" class="mr-4 form-control" style="width: 25px;box-shadow: none;">
                                                                           
                                                                             <input  name="option8" class="form-control" id="opt8">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="test_no" value="<?php echo $test_no; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group" align="center">
                                            <button class="btn btn-primary btn-rounded" name="submit" id="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">NEXT</button>
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
    <script type="text/javascript">

        var options;
        $("#options").change(function(){
            options = $("#options").val();
        });
       
        $('#general-info').submit(function (e) {
            for(var i=1;i<=options;i++){
                 var index = 'opt'+i;
                x = document.getElementById(index).value;
                if(x == ""){
                    Snackbar.show({ text: 'Please Fill Options, it cant be Empty!', duration: 2000, });
                    return false;
                }
            }

             var allAns = [];
            for (var i = 1; i <= options; i++) {
                var push= $("input[id=opt"+i+"]").val();
                allAns.push(push);
            }
            var sorted_arr = allAns.sort();
            for (var i = 0; i < allAns.length - 1; i++) {
                if(sorted_arr[i + 1] != ""){
                    if (sorted_arr[i + 1] == sorted_arr[i]) {
                        Snackbar.show({ text: 'There is Same Options, please enter Diffrent Options!', duration: 2000, });
                        return false;
                    }
                }
            }
            
            var radios = document.getElementsByTagName('input');
            var value=-1;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].type === 'radio' && radios[i].checked && radios[i].value < options) {
                    value = radios[i].value;       
                }
            }

            if (value == -1) {
                Snackbar.show({ text: 'Please select Answer ! It cant be Empty.', duration: 2000, });
                return false;
            }
            
            
        });
    </script>
    <script src="../../assets/js/custom.js"></script>
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
        $type = "single-answer";
        $test_no = $_POST['test_no'];
        $question = trim(addslashes(mysqli_real_escape_string($conn, $_POST['question'])));
        $question_text = trim(addslashes(mysqli_real_escape_string($conn, $_POST['question_text'])));
        $modify_date = date("Y/m/d");
        if($_GET['question_no'] == 1)
        {
         $sql = mysqli_query($conn , "INSERT INTO manage_section_test(test_no,modify_date) VALUES('$test_no','$modify_date')");
        }
        $options = trim(addslashes(mysqli_real_escape_string($conn, $_POST['options'])));
        $radio = trim(addslashes(mysqli_real_escape_string($conn, $_POST['radio'])));
        $question_no = $_GET['question_no'];
        $tot_options = 0;
        $option = [];
        for ($i=1; $i <= 8; $i++) {
            $index = 'option'.$i;
            if ($i <= $options) {
                if ($_POST[$index] != "") {
                    array_push($option,trim(addslashes($_POST[$index])));
                    $tot_options +=1;
                }
                else{
                    array_push($option,'');
                }    
            }else{
                array_push($option,'');
            }
        }
        if ($tot_options != $options) {
            ?>
            <script type="text/javascript">    
            window.location.href = "reading_single_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no ?>&missing=1";
            </script>
            <?php
        }
        $answer =addslashes($option[$radio]);
        if ($answer == null || $answer == "")
        {
            ?>
            <script type="text/javascript">    
            window.location.href = "reading_single_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no ?>&missing=1";
            </script>
            <?php
        }else{
            $sql = mysqli_query($conn, "INSERT INTO section_test(test_no,question_no,type,answer,question, questionText, option1, option2, option3, option4, option5, option6, option7, option8, modify_date,section) VALUES ('$test_no','$question_no','$type','$answer','$question', '$question_text', '$option[0]', '$option[1]', '$option[2]', '$option[3]', '$option[4]', '$option[5]', '$option[6]', '$option[7]', '$modify_date','$section')");
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
                if($question_no <= 2)
                {
                    ?><script>location.replace("reading_single_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no ?>&question=success");</script><?php
                }
                else
                {
                    ?><script>location.replace("reading_multiple_answer.php?testno=<?php echo $test_no; ?>&question_no=1&question=success");</script><?php    
                }
            }
            else
            {
                ?><script type="text/javascript">location.href = "reading_single_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no;?>&error=1";</script><?php
            }
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
if(isset($_GET['missing']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is missing Answers, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("missing");
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