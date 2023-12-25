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
        $question_no = $row['question_no']+12;
        $user_sql = mysqli_query($conn , "SELECT * from section_user_test WHERE studentId='$studentId' AND test_no='$test_no' AND section='reading' AND type='reading-and-writing-fill-in-the-blanks' AND question_no='$question_no' ");
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
    <title>Reading and Writing: Fill in the Blanks | Origin Overseas - PTE tutors </title>
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
    <link href="../../../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/css/step.css">
    <!--  END CUSTOM STYLE FILE  -->
    <style type="text/css">
        .text1{
           box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;

        }.text2{
         
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }.text3{
            box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }.text4{
           box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }.text5{
           box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }.text6{
           box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }.text7{
           box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }.text8{
           box-shadow: none;
            margin-right: 3px;
            text-align: left;
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .textbox{
            margin-top: 5px;
            box-shadow: none;
            width: 30px;
            height: 30px;
            max-height: 30px;
            max-width: 30px;
            margin-right: 3px;
            text-align: left;
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
                                <li class="breadcrumb-item"> <a href="../view_test_table.php?section=reading&testno=<?php echo $row['test_no']; ?>&type=reading-and-writing-fill-in-the-blanks"> Reading: Reading and Writing Fill in the Blanks </a> </li>
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
                                                    <br><h4><center><b>Reading and Writing Fill in the Blanks</b> : Question <?php echo $question_no; ?></center></h4><br>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" style="margin-top: 0px">
                                                    <div class="info">
                                                        <h6 class="">
                                                       Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group container">
                                                                    <p class="paragraph" id="questionText" style="margin-top: 0px;font-size: 1.2em;;line-height: 2.2em" align=justify><?php echo stripslashes($row['questionText']); ?></p>
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
                                                    $user_answer = explode("/*/", $user_row['answer']);
                                                    ?>
                                                    <div class="row no-gutters" style="display: none;">
                                                        <div class="col-xl-3 mt-4">
                                                            Select Options : 
                                                        </div>
                                                        <div class="col-xl-9">
                                                            <div class="form-group">
                                                                <select name="options" id="options" class="form-control custom-control mt-2" onchange="change();">
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
                                                    <?php
                                                        $answer = explode("/*/", $row['answer']); 
                                                        if (isset($row['option1']) && $row['option1']!=" " && $row['option1']!="") {
                                                            $option1 = explode('/*/', $row['option1']);
                                                        }
                                                        if (isset($row['option2']) && $row['option2']!=" " && $row['option2']!="") {
                                                            $option2 = explode('/*/', $row['option2']);
                                                        }
                                                        if (isset($row['option3']) && $row['option3']!=" " && $row['option3']!="") {
                                                            $option3 = explode('/*/', $row['option3']);
                                                        }
                                                        if (isset($row['option4']) && $row['option4']!=" " && $row['option4']!="") {
                                                            $option4 = explode('/*/', $row['option4']);
                                                        }
                                                        if (isset($row['option5']) && $row['option5']!=" " && $row['option5']!="") {
                                                            $option5 = explode('/*/', $row['option5']);
                                                        }
                                                        if (isset($row['option6']) && $row['option6']!=" " && $row['option6']!="") {
                                                            $option6 = explode('/*/', $row['option6']);
                                                        }
                                                        if (isset($row['option7']) && $row['option7']!=" " && $row['option7']!="") {
                                                            $option7 = explode('/*/', $row['option7']);
                                                        }
                                                        if (isset($row['option8']) && $row['option8']!=" " && $row['option8']!="") {
                                                            $option8 = explode('/*/', $row['option8']);
                                                        }
                                                    ?>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                        <div class="info" style="display: none" id="option1">
                                                            <h6 class="">Options of 1:</h6>
                                                            <div class="row ">
                                                                <div class="col-md-11 mx-auto " style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3"> 
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>
                                                                                <div class="btn-group w-100">
                                                                                <input type="radio" disabled="true" name="radio1" value="1" id="radio11" class=" textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[0])) { if ($answer[0] == $option1[0]) { echo 'checked=""'; } } ?>>
                                                                                 <input type="text" disabled="true" style="color:black;" name="option11" class="text1" id="opt11" value="<?php if (isset($option1)) { echo $option1[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input type="radio" disabled="true" name="radio1" value="2" id="radio12" class=" textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[0])) { if ($answer[0] == $option1[1]) { echo 'checked=""'; } } ?>>
                                                                                 <input type="text" disabled="true" style="color:black;" name="option12" class="text1" id="opt12" value="<?php if (isset($option1)) { echo $option1[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input type="radio" disabled="true" name="radio1" value="3" id="radio13" class=" textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[0])) { if ($answer[0] == $option1[2]) { echo 'checked=""'; } } ?>>
                                                                                 <input type="text" disabled="true" style="color:black;" name="option13" class="text1" id="opt13" value="<?php if (isset($option1)) { echo $option1[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input type="radio" disabled="true" name="radio1" value="4" id="radio14" class=" textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[0])) { if ($answer[0] == $option1[3]) { echo 'checked=""'; } } ?>>
                                                                                 <input type="text" disabled="true" style="color:black;" name="option14" class="text1" id="opt14" value="<?php if (isset($option1)) { echo $option1[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option2">
                                                            <h6 class="">Options of 2:</h6>
                                                             <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio2" value="1" id="radio21" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[1])) { if ($answer[1] == $option2[0]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option21" class="text2" id="opt21" value="<?php if (isset($option2)) { echo $option2[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio2" value="2" id="radio22" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[1])) { if ($answer[1] == $option2[1]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option22" class="text2" id="opt22" value="<?php if (isset($option2)) { echo $option2[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio2" value="3" id="radio23" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[1])) { if ($answer[1] == $option2[2]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option23" class="text2" id="opt23" value="<?php if (isset($option2)) { echo $option2[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio2" value="4" id="radio24" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[1])) { if ($answer[1] == $option2[3]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option24" class="text2" id="opt24" value="<?php if (isset($option2)) { echo $option2[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option3">
                                                            <h6 class="">Options of 3:</h6>
                                                              <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio3" value="1" id="radio31" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[2])) { if ($answer[2] == $option3[0]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option31" class="text3" id="opt31" value="<?php if (isset($option3)) { echo $option3[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio3" value="2" id="radio32" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[2])) { if ($answer[2] == $option3[1]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option32" class="text3" id="opt32" value="<?php if (isset($option3)) { echo $option3[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio3" value="3" id="radio33" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[2])) { if ($answer[2] == $option3[2]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option33" class="text3" id="opt33" value="<?php if (isset($option3)) { echo $option3[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio3" value="4" id="radio34" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[2])) { if ($answer[2] == $option3[3]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option34" class="text3" id="opt34" value="<?php if (isset($option3)) { echo $option3[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option4">
                                                            <h6 class="">Options of 4:</h6>
                                                             <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio4"  value="1" id="radio41" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[3])) { if ($answer[3] == $option4[0]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option41" class="text4" id="opt41" value="<?php if (isset($option4)) { echo $option4[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio4"  value="2" id="radio42" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[3])) { if ($answer[3] == $option4[1]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option42" class="text4" id="opt42" value="<?php if (isset($option4)) { echo $option4[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio4"  value="3" id="radio43" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[3])) { if ($answer[3] == $option4[2]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option43" class="text4" id="opt43" value="<?php if (isset($option4)) { echo $option4[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio4"  value="4" id="radio44" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[3])) { if ($answer[3] == $option4[3]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option44" class="text4" id="opt44" value="<?php if (isset($option4)) { echo $option4[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option5">
                                                            <h6 class="">Options of 5:</h6>
                                                             <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio5"  value="1" id="radio51" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[4])) { if ($answer[4] == $option5[0]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option51" class="text5" id="opt51" value="<?php if (isset($option5)) { echo $option5[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio5"  value="2" id="radio52" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[4])) { if ($answer[4] == $option5[1]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option52" class="text5" id="opt52" value="<?php if (isset($option5)) { echo $option5[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio5"  value="3" id="radio53" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[4])) { if ($answer[4] == $option5[2]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option53" class="text5" id="opt53" value="<?php if (isset($option5)) { echo $option5[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio5"  value="4" id="radio54" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[4])) { if ($answer[4] == $option5[3]) { echo 'checked=""'; } } ?> >
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option54" class="text5" id="opt54" value="<?php if (isset($option5)) { echo $option5[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option6">
                                                            <h6 class="">Options of 6:</h6>
                                                             <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio6"  value="1" id="radio61" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[5])) { if ($answer[5] == $option6[0]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option61" class="text6" id="opt61" value="<?php if (isset($option6)) { echo $option6[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio6"  value="2" id="radio62" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[5])) { if ($answer[5] == $option6[1]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option62" class="text6" id="opt62" value="<?php if (isset($option6)) { echo $option6[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio6"  value="3" id="radio63" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[5])) { if ($answer[5] == $option6[2]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option63" class="text6" id="opt63" value="<?php if (isset($option6)) { echo $option6[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio6"  value="4" id="radio64" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[5])) { if ($answer[5] == $option6[3]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option64" class="text6" id="opt64" value="<?php if (isset($option6)) { echo $option6[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option7">
                                                            <h6 class="">Options of 7:</h6>
                                                             <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio7"  value="1" id="radio71" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[6])) { if ($answer[6] == $option7[0]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option71" class="text7" id="opt71" value="<?php if (isset($option7)) { echo $option7[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio7"  value="2" id="radio72" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[6])) { if ($answer[6] == $option7[1]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option72" class="text7" id="opt72" value="<?php if (isset($option7)) { echo $option7[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio7"  value="3" id="radio73" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[6])) { if ($answer[6] == $option7[2]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option73" class="text7" id="opt73" value="<?php if (isset($option7)) { echo $option7[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio7"  value="4" id="radio74" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[6])) { if ($answer[6] == $option7[3]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option74" class="text7" id="opt74" value="<?php if (isset($option7)) { echo $option7[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="info"  style="display: none;margin-top:-10px" id="option8">
                                                            <h6 class="">Options of 8:</h6>
                                                            <div class="row">
                                                                <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                                <label for="option1" class="ml-2">Option 1</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio8"  value="1" id="radio81" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[7])) { if ($answer[7] == $option8[0]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option81" class="text8" id="opt81" value="<?php if (isset($option8)) { echo $option8[0]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                               <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 2</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio8"  value="2" id="radio82" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[7])) { if ($answer[7] == $option8[1]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option82" class="text8" id="opt82" value="<?php if (isset($option8)) { echo $option8[1]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                 <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 3</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio8"  value="3" id="radio83" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[7])) { if ($answer[7] == $option8[2]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option83" class="text8" id="opt83" value="<?php if (isset($option8)) { echo $option8[2]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                                   <div class="form-group">
                                                                              
                                                                                <label for="option1" class="ml-5">Option 4</label>

                                                                                <div class="btn-group w-100">
                                                                                <input  type="radio" disabled="true" name="radio8"  value="4" id="radio84" class="textbox mr-4" style="width: 25px;box-shadow: none;" <?php if (isset($answer[7])) { if ($answer[7] == $option8[3]) { echo 'checked=""'; } } ?>>
                                                                                 <input  type="text" disabled="true" style="color:black;"  name="option84" class="text8" id="opt84" value="<?php if (isset($option8)) { echo $option8[3]; } ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                         <input type="hidden" name="question_text" id="question_text" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- user answer -->
                                                    <?php
                                                        $user_answer = explode("/*/", $user_row['answer']);
                                                    ?>
                                                    <div class="info">
                                                        <h6 class="pl-2">Your Answers:</h6><br>
                                                        <div class="row" style="margin-top: -35px">
                                                            <div class="col-md-11 mx-auto" >
                                                                 <div class="row" >
                                                                    <div class="col-md-3" <?php if(count($answer)+1>1){}else{echo' style="display: none;"';}?> >
                                                                         <div class="form-group">
                                                                            <label for="option1" class="ml-2">Answer 1</label>
                                                                            <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option1" class="form-control"  value="<?php if (isset($user_answer[0])) {echo stripcslashes($user_answer[0]);}?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" <?php if(count($answer)+1>2){}else{echo' style="display: none;"';}?>>
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 5px;">Answer 2</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option2" class="form-control" value="<?php if (isset($user_answer[1])) {echo stripcslashes($user_answer[1]);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" <?php if(count($answer)+1>3){}else{echo' style="display: none;"';}?>>
                                                                         <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 5px;">Answer 3</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option3" class="form-control" value="<?php if (isset($user_answer[2])) {echo stripcslashes($user_answer[2]);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" <?php if(count($answer)+1>4){}else{echo' style="display: none;"';}?>>
                                                                         <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 5px;">Answer 4</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option4" class="form-control" value="<?php if (isset($user_answer[3])) {echo stripcslashes($user_answer[3]);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                     <div class="row" >
                                                                        <div class="col-md-3" <?php if(count($answer)+1>5){}else{echo' style="display: none;"';}?>>
                                                                           <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 5px;">Answer 5</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option5" class="form-control" value="<?php if (isset($user_answer[4])) {echo stripcslashes($user_answer[4]);}?>">
                                                                         </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3" <?php if(count($answer)+1>6){}else{echo' style="display: none;"';}?>>
                                                                           <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 5px;">Answer 6</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option6" class="form-control" value="<?php if (isset($user_answer[5])) {echo stripcslashes($user_answer[5]);}?>">
                                                                         </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3" <?php if(count($answer)+1>7){}else{echo' style="display: none;"';}?>>
                                                                            <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 5px;">Answer 7</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option7" class="form-control" value="<?php if (isset($user_answer[6])) {echo stripcslashes($user_answer[6]);}?>">
                                                                         </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3" <?php if(count($answer)+1>8){}else{echo' style="display: none;"';}?>>
                                                                           <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 5px;">Answer 8</label>
                                                                             <div class="btn-group w-100">
                                                                             <input disabled="true" style="color:black;" type="text" name="option8" class="form-control" value="<?php if (isset($user_answer[7])) {echo stripcslashes($user_answer[7]);}?>">
                                                                         </div>
                                                                        </div>
                                                                        <input disabled="true" style="color:black;" type="hidden" name="question_text" >
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
        <?php
        $arry = [];
        for($i=1; $i<=8 ; $i++)
        {
            $option = "option".$i;
            if ($row[$option] != '' || $row[$option] != null) {
                $options = explode("/*/", $row['option'.$i]);
                array_push($arry, $options);
            }

        }
    ?>
    var userAns = [];
    var span = $("#questionText span").length;
    $(function() {
        if (span >= 1) {
            $("#questionText span").eq(0).html('<select disabled=true id="ans1"><?php
                if (isset($arry[0])) {
                    echo "<option disabled=true selected value=>---select---</option>";
                    for($j=0;$j<4;$j++){
                        echo "<option value=".$arry[0][$j].">".$arry[0][$j]."</option>";
                    }
                }
            ?></select>');
            if (span >= 2) {
                $("#questionText span").eq(1).html('<select disabled=true id="ans2"><?php
                    if (isset($arry[1])) {
                        echo "<option disabled=true selected value=>---select---</option>";
                        for($j=0;$j<4;$j++){
                            echo "<option value=".$arry[1][$j].">".$arry[1][$j]."</option>";
                        }
                    }
                ?></select>');
                if (span >= 3) {
                    $("#questionText span").eq(2).html('<select disabled=true id="ans3"><?php
                        if (isset($arry[2])) {
                            echo "<option disabled=true selected value=>---select---</option>";
                            for($j=0;$j<4;$j++){
                                echo "<option value=".$arry[2][$j].">".$arry[2][$j]."</option>";
                            }
                        }
                    ?></select>');
                    if (span >= 4) {
                        $("#questionText span").eq(3).html('<select disabled=true id="ans4"><?php
                            if (isset($arry[3])) {
                                echo "<option disabled=true selected value=>---select---</option>";
                                for($j=0;$j<4;$j++){
                                    echo "<option value=".$arry[3][$j].">".$arry[3][$j]."</option>";
                                }
                            }
                        ?></select>');
                        if (span >= 5) {
                            $("#questionText span").eq(4).html('<select disabled=true id="ans5"><?php
                                if (isset($arry[4])) {
                                    echo "<option disabled=true selected value=>---select---</option>";
                                    for($j=0;$j<4;$j++){
                                        echo "<option value=".$arry[4][$j].">".$arry[4][$j]."</option>";
                                    }
                                }
                            ?></select>');
                            if (span >= 6) {
                                $("#questionText span").eq(5).html('<select disabled=true id="ans6"><?php
                                    if (isset($arry[5])) {
                                        echo "<option disabled=true selected value=>---select---</option>";
                                        for($j=0;$j<4;$j++){
                                            echo "<option value=".$arry[5][$j].">".$arry[5][$j]."</option>";
                                        }
                                    }
                                ?></select>');
                                if (span >= 7) {
                                    $("#questionText span").eq(6).html('<select disabled=true id="ans7"><?php
                                        if (isset($arry[6])) {
                                            echo "<option disabled=true selected value=>---select---</option>";
                                            for($j=0;$j<4;$j++){
                                                echo "<option value=".$arry[6][$j].">".$arry[6][$j]."</option>";
                                            }
                                        }
                                    ?></select>');
                                    if (span >= 8) {
                                        $("#questionText span").eq(7).html('<select disabled=true id="ans8"><?php
                                            if (isset($arry[7])) {
                                                echo "<option disabled=true selected value=>---select---</option>";
                                                for($j=0;$j<4;$j++){
                                                    echo "<option value=".$arry[7][$j].">".$arry[7][$j]."</option>";
                                                }
                                            }
                                        ?></select>');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    });
    </script>
    <script src="../../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../../plugins/dropify/dropify.min.js"></script>
    <script src="../../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../../../plugins/tagInput require=""/tags-input.js"></script> -->
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
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='fill-in-the-blanks' and question_no='5'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_fill_in_the_blanks.php?question=<?php echo $id; ?>");
                    <?php
                }
                else
                {
                    $question_prev=$row['question_no']-1;
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='reading-and-writing-fill-in-the-blanks' and question_no='$question_prev'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_writing_fill_in_the_blanks.php?question=<?php echo $id; ?>");
                    <?php
                }
            ?>
        });
        $("#next").click(function(event) {
            <?php
                if($question_no == 6)
                {
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='listening' and type='summarize-spoken-text' and question_no='1'");
                    $row6= mysqli_fetch_assoc($sql6);  
                    $id= $row6['id'];
                    ?>
                    location.replace("listening_summarize_spoken_text.php?question=<?php echo $id; ?>"); <?php
                }
                else
                {
                    $question_next=$row['question_no']+1;
                    $sql6 = mysqli_query($conn , "select id from section_test where test_no='$test_no' and section='reading' and type='reading-and-writing-fill-in-the-blanks' and question_no='$question_next'");
                    $row6= mysqli_fetch_assoc($sql6); 
                    $id= $row6['id'];
                    ?>
                    location.replace("reading_writing_fill_in_the_blanks.php?question=<?php echo $id; ?>");
                    <?php
                }
            ?>
        });
    </script>
</body>
</html>