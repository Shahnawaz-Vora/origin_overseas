<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../../../student/auth_login.php");
    }
    include_once '../../../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
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
<?php 
    include_once("../../../database/dbh.inc.php");
    if(isset($_GET['question']))
    {
        $id = $_GET['question'];
        $sql = mysqli_query($conn , "select * from test where id='$id'");
        $row = mysqli_fetch_assoc($sql);
        $studentId= $_COOKIE['studentId'];
        $test_no = $row['test_no'];
        $question_no = $row['question_no']+74;
        $user_sql = mysqli_query($conn , "SELECT * from user_test WHERE studentId='$studentId' AND test_no='$test_no' AND section='listening' AND type='highlight-incorrect-words' AND question_no='$question_no' ");
        $user_row = mysqli_fetch_assoc($user_sql);
    }
    else
    {
        ?><script type="text/javascript">location.replace("../test_results.php");</script><?php
    }
    $section = "listening";
    $question_no = $row['question_no'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Listening: Highlight Incorrect Words | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
      <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../../assets/js/loader.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../../../plugins/dropify/dropify.min.css">
    <link href="../../../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
     <link href="../../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../../plugins/animate/animate.css">
    <link href="../../../assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/css/step.css">
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body>
    <script src="../../../assets/js/libs/jquery-3.1.1.min.js"></script>
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
                                <li class="breadcrumb-item" aria-current="page"><a href="../test_results.php"> Analyze Test </a></li>
                                <li class="breadcrumb-item" aria-current="page"> <span> View Tests </span> </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="../view_test.php?test_no=<?php echo $test_no; ?>"><?php $test_name = mysqli_fetch_assoc(mysqli_query($conn , "SELECT test_name from manage_test where test_no='$test_no' ")); echo $test_name['test_name'] ; ?></a></li>
                                <li class="breadcrumb-item"> <a href="../view_test_table.php?section=listening&testno=<?php echo $row['test_no']; ?>&type=highlight-incorrect-words"> Listening: Highlight Incorrect Words </a> </li>
                                <li class="breadcrumb-item active"> <span> Question: <?php echo $question_no ; ?> </span> </li>
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
                        <div class="col-lg-12 col-12 layout-spacing" >  
                            <?php include_once("breadcrumb.php "); ?>>             
                            <form id="general-info" class="section general-info">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing" >
                                                    <br><h4><center><b>Highlight Incorrect Words</b> : Question <?php echo $question_no; ?></center></h4><br>
                                                    <div class="info">
                                                        <h6 class="pl-2">Audio:</h6>
                                                        <div class="row" style="margin-top:-30px">
                                                            <div class="col-lg-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-lg-12 col-md-4">
                                                                        <div class="upload uploadimg" style="border:none;">
                                                                            <?php 
                                                                                if(file_exists("../../../database/audio/".$row['audio']))
                                                                                {
                                                                                    echo "<audio controls height=250 width=250 id='imgshow' src=../../../database/audio/".$row['audio']."></audio>";
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" style="margin-top: -25px">
                                                 
                                                    <div class="info">
                                                        <h6 class="pl-2">Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" disabled="true" style="color:black;" cols="10" class="form-control" name="question_text" required=""><?php echo $row['questionText']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">Transcript:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" disabled="true" style="color:black;" cols="10" class="form-control" name="transcript" required=""><?php echo $row['transcript']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $tot_opt = 0;
                                                    for ($cou=1; $cou <= 8; $cou++) { 
                                                        $opt = "option".$cou;
                                                        if (isset($row[$opt]) && $row[$opt]!= "" && $row[$opt]!=" ") {
                                                            $tot_opt++;    
                                                        }
                                                    }
                                                    $answer = explode("/*/", $row['answer']); 
                                                    ?>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">No. of Answers:</h6>
                                                        <div class="row" style="margin-top: -55px;display:none">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <select name="options" disabled="true" style="color:black;" id="options" onchange="change();" class="form-control custom-control mt-2" required="">
                                                                            <option value="" disabled="">--Select Option--</option> 
                                                                            <option value=1 <?php if ($tot_opt == 1) {echo 'selected=""';}?>>1</option>
                                                                            <option value=2 <?php if ($tot_opt == 2) {echo 'selected=""';}?>>2</option>
                                                                            <option value=3 <?php if ($tot_opt == 3) {echo 'selected=""';}?>>3</option>
                                                                            <option value=4 <?php if ($tot_opt == 4) {echo 'selected=""';}?>>4</option>
                                                                            <option value=5 <?php if ($tot_opt == 5) {echo 'selected=""';}?>>5</option>
                                                                            <option value=6 <?php if ($tot_opt == 6) {echo 'selected=""';}?>>6</option>
                                                                            <option value=7 <?php if ($tot_opt == 7) {echo 'selected=""';}?>>7</option>
                                                                            <option value=8 <?php if ($tot_opt == 8) {echo 'selected=""';}?>>8</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info">
                                                        <h6 class="pl-2" style="display: none;" id="option_text">Option:</h6>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                    <div class="col-md-3" style="display: none;" id="option1" >
                                                                        <div class="form-group">
                                                                            <label for="option1">Option1</label>
                                                                             <input type="text" id="opt1" disabled="true" style="color:black;" name="option1" class="form-control" value="<?php if (isset($row['option1'])) {echo stripcslashes($row['option1']);}?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option2">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 2</label>
                                                                             <input type="text" id="opt2" disabled="true" style="color:black;" name="option2" class="form-control" value="<?php if (isset($row['option2'])) {echo stripcslashes($row['option2']);}?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option3">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 3</label>
                                                                             <input type="text" id="opt3" disabled="true" style="color:black;" name="option3" class="form-control" value="<?php if (isset($row['option3'])) {echo stripcslashes($row['option3']);}?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option4">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 4</label>
                                                                             <input type="text" id="opt4" disabled="true" style="color:black;" name="option4" class="form-control" value="<?php if (isset($row['option4'])) {echo stripcslashes($row['option4']);}?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" >
                                                                    <div class="col-md-3" style="display: none;" id="option5">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 5</label>
                                                                             <input type="text" id="opt5" disabled="true" style="color:black;" name="option5" class="form-control" value="<?php if (isset($row['option5'])) {echo stripcslashes($row['option5']);}?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option6">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 6</label>
                                                                             <input type="text" id="opt6" disabled="true" style="color:black;" name="option6" class="form-control" value="<?php if (isset($row['option6'])) {echo stripcslashes($row['option6']);}?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option7">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 7</label>
                                                                             <input type="text" id="opt7" disabled="true" style="color:black;" name="option7" class="form-control" value="<?php if (isset($row['option7'])) {echo stripcslashes($row['option7']);}?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option8">
                                                                        <div class="form-group">
                                                                            <label for="option1">Option 8</label>
                                                                             <input type="text" id="opt8" disabled="true" style="color:black;" name="option8" class="form-control" value="<?php if (isset($row['option8'])) {echo stripcslashes($row['option8']);}?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="info">
                                                        <h6 class="pl-2">Your Selections:</h6>
                                                        <div class="row" style="margin-top: -10px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                    <?php
                                                                    $user_answer=explode('/*/',$user_row['answer']);
                                                                    foreach ($user_answer as $i => $key) {
                                                                        echo '
                                                                        <div class="col-md-3 no-gutters">
                                                                            <div class="form-group no-gutters">
                                                                                <div class="w-100">
                                                                                    <input disabled="true" style="color:black;" type="text" name="option1" class="form-control"  value="'.$key.'">
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                    }
                                                                    ?>   
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px" disabled=true;>
                                                        <h6 class="pl-2">
                                                        Marks:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <input disabled="true" style="color:black;" class="form-control" required="" value="<?php echo stripslashes($user_row['marks']); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info text-center" style="margin-top: -15px">
                                                        <button type="button" class="btn btn-danger" id="prev"><a>Prev</a></button>
                                                        <button type="button" class="btn btn-primary" id="next"><a>Next</a></button>
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
    <script src="../../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../../bootstrap/js/popper.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
            change();
        });
        var options;
        $("#options").change(function(){
            options = $("#options").val();
        });
    </script>
    <script src="../../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../../plugins/dropify/dropify.min.js"></script>
    <script src="../../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../../../plugins/tagInput/tags-input.js"></script> -->
    <script src="../../../assets/js/users/account-settings.js"></script>
    <script src="../../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../../assets/js/components/notification/custom-snackbar.js"></script>
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
    <script type="text/javascript">
        $("#prev").click(function(event) {
            <?php
                if($question_no == 1)
                {
                    $sql6 = mysqli_query($conn , "select id from test where test_no='$test_no' and section='listening' and type='select-missing-word' and question_no='2'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("listening_select_missing_word.php?question=<?php echo $id; ?>");
                    <?php
                }
                else
                {
                    $question_prev=$row['question_no']-1;
                    $sql6 = mysqli_query($conn , "select id from test where test_no='$test_no' and section='listening' and type='highlight-incorrect-words' and question_no='$question_prev'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("listening_highlight_incorrect_words.php?question=<?php echo $id; ?>");
                    <?php
                }
            ?>
        });
        $("#next").click(function(event) {
            <?php
                if($question_no == 3)
                {
                    $sql6 = mysqli_query($conn , "select id from test where test_no='$test_no' and section='listening' and type='write-from-dictation' and question_no='1'");
                    $row6= mysqli_fetch_assoc($sql6);  
                    $id= $row6['id'];
                    ?>
                    location.replace("listening_write_from_dictation.php?question=<?php echo $id; ?>"); <?php
                }
                else
                {
                    $question_next=$row['question_no']+1;
                    $sql6 = mysqli_query($conn , "select id from test where test_no='$test_no' and section='listening' and type='highlight-incorrect-words' and question_no='$question_next'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("listening_highlight_incorrect_words.php?question=<?php echo $id; ?>");
                    <?php
                }
            ?>
        });
    </script>
</body>
</html>