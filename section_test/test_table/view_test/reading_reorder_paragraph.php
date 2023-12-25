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
        $sql = mysqli_query($conn , "select * from section_test where id='$id'");
        $row = mysqli_fetch_assoc($sql);
        $studentId= $_COOKIE['studentId'];
        $test_no = $row['test_no'];
        $question_no = $row['question_no']+4;
        $user_sql = mysqli_query($conn , "SELECT * from section_user_test WHERE studentId='$studentId' AND test_no='$test_no' AND section='reading' AND type='reorder-paragraph' AND question_no='$question_no' ");
        $user_row = mysqli_fetch_assoc($user_sql);
    }
    else
    {
        ?><script type="text/javascript">location.replace("../test_results.php");</script><?php
    }
    $section = "reading";
    $question_no = $row['question_no'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reading: Reorder Paragraph | Origin Overseas - PTE tutors </title>
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
    <style type="text/css">
        .textbox{
            border-radius: 5px;
            border: solid #bfc9d4 1px;
            box-shadow: none;
            width: 40px;
            height: 40px;
            max-height: 40px;
            max-width: 40px;
            margin-right: 3px;
            text-align: center;
        }
        .form-control{
            margin-left: 5px;
        }
        .ml{
            margin-left: 55px
        }
    </style>
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
                                <li class="breadcrumb-item" aria-current="page"><a href="../view_test.php?test_no=<?php echo $test_no; ?>"><?php $test_name = mysqli_fetch_assoc(mysqli_query($conn , "SELECT test_name from manage_section_test where test_no='$test_no' ")); echo $test_name['test_name'] ; ?></a></li>
                                <li class="breadcrumb-item"> <a href="../view_test_table.php?section=reading&testno=<?php echo $row['test_no']; ?>&type=reorder-paragraph"> Reading: Reorder Paragraph </a> </li>
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
                            <?php include_once("breadcrumb.php "); ?>      
                            <form id="general-info" class="section general-info">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing">
                                                    <br><h4><center><b>Reorder Paragraph</b> : Question <?php echo $question_no; ?></center></h4><br>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" style="margin-top: 0px">
                                                    <?php
                                                    $tot_opt = 0;
                                                    for ($cou=1; $cou <= 8; $cou++) { 
                                                        $opt = "option".$cou;
                                                        if (isset($row[$opt]) && $row[$opt]!= "" && $row[$opt]!=" ") {
                                                            $tot_opt++;    
                                                        }
                                                    }
                                                    $answer = explode("/*/", $row['answer']);
                                                    $user_answer = explode("/*/", $user_row['answer']);
                                                     
                                                    ?>
                                                    <div class="info">
                                                        <h6 class="pl-2">Model Answer:</h6><br>
                                                        <div class="row" style="display:none;margin-top: -45px">
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
                                                    <div class="info" style="margin-top:-45px">
                                                        <h6 class="pl-2" style="display: none;" id="option_text">Option:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                     <div class="col-md-12" style="display: none;" id="option1" >
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Paragraph 1</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text1" disabled="true" style="color:black;" id="text1" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[0])) { echo $answer[0] ;} ?>">
                                                                              <textarea type="text" name="option1" disabled="true" style="color:black;" class="form-control" rows=3 id="opt1"><?php if (isset($row['option1'])) {echo stripcslashes($row['option1']);}?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option2">
                                                                        <div class="form-group">
                                                                            <label for="option2" class="ml">Paragraph 2</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text2" disabled="true" style="color:black;" id="text2" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[1])) { echo $answer[1] ;} ?>">
                                                                             <textarea type="text"  name="option2" disabled="true" style="color:black;" class="form-control" rows=3 id="opt2"><?php if (isset($row['option2'])) {echo stripcslashes($row['option2']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option3">
                                                                        <div class="form-group">
                                                                            <label for="option3" class="ml">Paragraph 3</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text3" disabled="true" style="color:black;" id="text3" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[2])) { echo $answer[2] ;} ?>">
                                                                             <textarea type="text"  name="option3" disabled="true" style="color:black;" class="form-control" rows=3 id="opt3"><?php if (isset($row['option3'])) {echo stripcslashes($row['option3']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option4">
                                                                        <div class="form-group">
                                                                            <label for="option4" class="ml">Paragraph 4</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text4" disabled="true" style="color:black;" id="text4" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[3])) { echo $answer[3] ;} ?>">
                                                                             <textarea type="text"  name="option4" disabled="true" style="color:black;" class="form-control" rows=3 id="opt4"><?php if (isset($row['option4'])) {echo stripcslashes($row['option4']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" >
                                                                    <div class="col-md-12" style="display: none;" id="option5">
                                                                        <div class="form-group">
                                                                            <label for="option5" class="ml">Paragraph 5</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text5" disabled="true" style="color:black;" id="text5" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[4])) { echo $answer[4] ;} ?>">
                                                                             <textarea type="text"  name="option5" disabled="true" style="color:black;" class="form-control" rows=3 id="opt5"><?php if (isset($row['option5'])) {echo stripcslashes($row['option5']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option6">
                                                                        <div class="form-group">
                                                                            <label for="option6" class="ml">Paragraph 6</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text6" disabled="true" style="color:black;" id="text6" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[5])) { echo $answer[5] ;} ?>">
                                                                             <textarea type="text"  name="option6" disabled="true" style="color:black;" class="form-control" rows=3 id="opt6"><?php if (isset($row['option6'])) {echo stripcslashes($row['option6']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option7">
                                                                        <div class="form-group">
                                                                            <label for="option7" class="ml">Paragraph 7</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text7" disabled="true" style="color:black;" id="text7" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[6])) { echo $answer[6] ;} ?>">
                                                                             <textarea type="text"  name="option7" disabled="true" style="color:black;" class="form-control" rows=3 id="opt7"><?php if (isset($row['option7'])) {echo stripcslashes($row['option7']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option8">
                                                                        <div class="form-group">
                                                                            <label for="option8" class="ml">Paragraph 8</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text8" disabled="true" style="color:black;" id="text8" class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($answer[7])) { echo $answer[7] ;} ?>">
                                                                             <textarea type="text"  name="option8" disabled="true" style="color:black;" class="form-control" rows=3 id="opt8"><?php if (isset($row['option8'])) {echo stripcslashes($row['option8']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- user Answer -->
                                                    <div class="info">
                                                        <h6 class="pl-2" <?php if(count($answer)>1){}else{echo' style="display: none;"';}?> >Your Answers:</h6><br>
                                                        <div class="row" style="margin-top: -35px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                     <div class="col-md-12" <?php if(count($answer)+1>1){}else{echo' style="display: none;"';}?>   >
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Paragraph 1</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text1" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[0])) { echo $user_answer[0] ;} ?>">
                                                                              <textarea type="text" name="option1" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option1'])) {echo stripcslashes($row['option1']);}?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" <?php if(count($answer)+1>2){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option2" class="ml">Paragraph 2</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text2" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[1])) { echo $user_answer[1] ;} ?>">
                                                                             <textarea type="text"  name="option2" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option2'])) {echo stripcslashes($row['option2']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" <?php if(count($answer)+1>3){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option3" class="ml">Paragraph 3</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text3" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[2])) { echo $user_answer[2] ;} ?>">
                                                                             <textarea type="text"  name="option3" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option3'])) {echo stripcslashes($row['option3']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" <?php if(count($answer)+1>4){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option4" class="ml">Paragraph 4</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text4" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[3])) { echo $user_answer[3] ;} ?>">
                                                                             <textarea type="text"  name="option4" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option4'])) {echo stripcslashes($row['option4']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" >
                                                                    <div class="col-md-12" <?php if(count($answer)+1>5){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option5" class="ml">Paragraph 5</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text5" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[4])) { echo $user_answer[4] ;} ?>">
                                                                             <textarea type="text"  name="option5" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option5'])) {echo stripcslashes($row['option5']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" <?php if(count($answer)+1>6){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option6" class="ml">Paragraph 6</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text6" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[5])) { echo $user_answer[5] ;} ?>">
                                                                             <textarea type="text"  name="option6" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option6'])) {echo stripcslashes($row['option6']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" <?php if(count($answer)+1>7){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option7" class="ml">Paragraph 7</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text7" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[6])) { echo $user_answer[6] ;} ?>">
                                                                             <textarea type="text"  name="option7" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option7'])) {echo stripcslashes($row['option7']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" <?php if(count($answer)+1>8){}else{echo' style="display: none;"';}?>  >
                                                                        <div class="form-group">
                                                                            <label for="option8" class="ml">Paragraph 8</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text8" disabled="true" style="color:black;"  class="textbox" maxlength="1" pattern="\d{1,8}" value="<?php if (isset($user_answer[7])) { echo $user_answer[7] ;} ?>">
                                                                             <textarea type="text"  name="option8" disabled="true" style="color:black;" class="form-control" rows=3 ><?php if (isset($row['option8'])) {echo stripcslashes($row['option8']);}?></textarea>
                                                                         </div>
                                                                        </div>
                                                                    </div>
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
    <script src="../../../bootstrap/js/popper.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
            change();
        });
    </script>
    <script type="text/javascript">
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
    <!--  END CUSTOM SCRIPTS FILE  -->
    <script type="text/javascript">
        $("#prev").click(function(event) {
            <?php
                if($question_no == 1)
                {
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='multiple-answers' and question_no='2'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_multiple_answer.php?question=<?php echo $id; ?>");
                    <?php
                }
                else
                {
                    $question_prev=$row['question_no']-1;
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='reorder-paragraph' and question_no='$question_prev'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_reorder_paragraph.php?question=<?php echo $id; ?>");
                    <?php
                }
            ?>
        });
        $("#next").click(function(event) {
            <?php
                if($question_no == 3)
                {
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='fill-in-the-blanks' and question_no='1'");
                    $row6= mysqli_fetch_assoc($sql6);  
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_fill_in_the_blanks.php?question=<?php echo $id; ?>"); <?php
                }
                else
                {
                    $question_next=$row['question_no']+1;
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='reorder-paragraph' and question_no='$question_next'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_reorder_paragraph.php?question=<?php echo $id; ?>");
                    <?php
                }
            ?>
        });
    </script>
</body>
</html>