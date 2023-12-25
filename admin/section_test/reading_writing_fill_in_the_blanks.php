<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
    include_once("../../database/dbh.inc.php");
    if(isset($_GET['testno']))
    {
        $test_no = $_GET['testno'];
        $modify_date = date("Y/m/d");
        // $sql = mysqli_query($conn , "INSERT INTO manage_test(test_no,modify_date) VALUES('$test_no','$modify_date')");
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
    <title>Create Test-Reading and Writing: Fill in the Blanks | Origin Overseas - PTE tutors </title>
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
                                 <li class="breadcrumb-item active" aria-current="page"><span>Reading and Writing: Fill in the Blanks </span></li>
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
                                                    <h4><center><b>Reading and Writing Fill in the Blanks</b> : Question <?php echo $question_no; ?></center></h4>
                                                    <div class="info">
                                                        <h6 class="">
                                                       Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                   <div class="form-control" style="height: 200px;overflow-y: scroll;text-align: left" contenteditable=true id="question"  required="">
                    
                                                                    </div>
                                                                </div>
                                                                <button type="button" onclick="addText(event)" style="list-style: none;cursor:pointer;width: 165px;margin: 3px" class="btn btn-outline-dark d-inline-block" ><center>Add Answer Box</center></button>

                                                                <button type="button" onclick="deleteText(event)" style="list-style: none;cursor:pointer;width: 165px;margin: 3px" class=" d-inline-block btn btn-outline-danger"><center>Delete Answer box</center></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row no-gutters" style="display: none;">
                                                    <div class="col-xl-3 mt-4">
                                                        Select Options : 
                                                    </div>
                                                    <div class="col-xl-9">
                                                        <div class="form-group">
                                                            <select name="options" id="options" class="form-control custom-control mt-2" onchange="change();">
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
                                                
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="info" style="display: none" id="option1">
                                                        <h6 class="">Dropdown 1:</h6>
                                                        <div class="row ">
                                                            <div class="col-md-11 mx-auto " style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3"> 
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="radio" name="radio1" value="1" id="radio11" class=" textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input type="text"  name="option11" class="text1" id="opt11">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input type="radio" name="radio1" value="2" id="radio12" class=" textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input type="text"  name="option12" class="text1" id="opt12">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input type="radio" name="radio1" value="3" id="radio13" class=" textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input type="text"  name="option13" class="text1" id="opt13">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input type="radio" name="radio1" value="4" id="radio14" class=" textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input type="text"  name="option14" class="text1" id="opt14">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option2">
                                                        <h6 class="">Dropdown 2:</h6>
                                                         <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio2" value="1" id="radio21" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option21" class="text2" id="opt21">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio2" value="2" id="radio22" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option22" class="text2" id="opt22">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio2" value="3" id="radio23" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option23" class="text2" id="opt23">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio2" value="4" id="radio24" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option24" class="text2" id="opt24">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option3">
                                                        <h6 class="">Dropdown 3:</h6>
                                                          <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio3" value="1" id="radio31" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option31" class="text3" id="opt31">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio3" value="2" id="radio32" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option32" class="text3" id="opt32">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio3" value="3" id="radio33" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option33" class="text3" id="opt33">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio3" value="4" id="radio34" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option34" class="text3" id="opt34">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option4">
                                                        <h6 class="">Dropdown 4:</h6>
                                                         <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio4"  value="1" id="radio41" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option41" class="text4" id="opt41">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio4"  value="2" id="radio42" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option42" class="text4" id="opt42">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio4"  value="3" id="radio43" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option43" class="text4" id="opt43">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio4"  value="4" id="radio44" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option44" class="text4" id="opt44">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option5">
                                                        <h6 class="">Dropdown 5:</h6>
                                                         <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio5"  value="1" id="radio51" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option51" class="text5" id="opt51">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio5"  value="2" id="radio52" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option52" class="text5" id="opt52">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio5"  value="3" id="radio53" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option53" class="text5" id="opt53">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio5"  value="4" id="radio54" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option54" class="text5" id="opt54">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option6">
                                                        <h6 class="">Dropdown 6:</h6>
                                                         <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio6"  value="1" id="radio61" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option61" class="text6" id="opt61">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio6"  value="2" id="radio62" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option62" class="text6" id="opt62">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio6"  value="3" id="radio63" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option63" class="text6" id="opt63">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio6"  value="4" id="radio64" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option64" class="text6" id="opt64">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option7">
                                                        <h6 class="">Dropdown 7:</h6>
                                                         <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio7"  value="1" id="radio71" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option71" class="text7" id="opt71">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio7"  value="2" id="radio72" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option72" class="text7" id="opt72">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio7"  value="3" id="radio73" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option73" class="text7" id="opt73">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio7"  value="4" id="radio74" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option74" class="text7" id="opt74">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info"  style="display: none;margin-top:-10px" id="option8">
                                                        <h6 class="">Dropdown 8:</h6>
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto" style="margin-top: -20px">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio8"  value="1" id="radio81" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option81" class="text8" id="opt81">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                           <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 2</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio8"  value="2" id="radio82" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option82" class="text8" id="opt82">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                             <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 3</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio8"  value="3" id="radio83" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option83" class="text8" id="opt83">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                               <div class="form-group">
                                                                          
                                                                            <label for="option1" class="ml-5">Option 4</label>

                                                                            <div class="btn-group w-100">
                                                                            <input  type="radio" name="radio8"  value="4" id="radio84" class="textbox mr-4" style="width: 25px;box-shadow: none;">
                                                                             <input  type="text"  name="option84" class="text8" id="opt84">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <input type="hidden" name="question_text" id="question_text" >
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
                                            <?php 
                                            if($_GET['question_no'] == 6)
                                            {
                                                echo '<button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Submit</button>';
                                            }
                                            else
                                            {
                                                echo '<button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Next</button>';
                                            }
                                            ?>
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

 function placeCaretAtEnd(el) {
            el.focus();
            if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
                var range = document.createRange();
                range.selectNodeContents(el);
                range.collapse(false);
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (typeof document.body.createTextRange != "undefined") {
                var textRange = document.body.createTextRange();
                textRange.moveToElementText(el);
                textRange.collapse(false);
                textRange.select();
            }
        }
        var span = 0;
        function addText(event) {
            if (span < 8) {
                span+=1;
                var element = document.createElement("div");
                element.classList.add("d-inline-block");
                element.id = span;
                element.setAttribute("contenteditable", false);
                element.appendChild(document.createTextNode('<span class="replace"></span>'));
                document.getElementById('question').appendChild(element);
                document.getElementById('options').value = span;
                change();
                placeCaretAtEnd( document.querySelector('#question') );
            }else{
                Snackbar.show({ text: 'Cant Add More Answer Then This!', duration: 2000, });
                var temp = document.getElementById('question').innerHTML;
               
            }
        }
  
        function deleteText(event) {
            if (span > 0) {
                document.getElementById(span).remove();
                span-=1;
                document.getElementById('options').value = span;
                change();
                placeCaretAtEnd( document.querySelector('#question') );
            }else{
                Snackbar.show({ text: 'There is nothing to Delete.', duration: 2000, });
            }
        }

        var span_counter = -1;
        setInterval(function(){
            let spans = question.getElementsByClassName('d-inline-block');
            var cou=0;
            for (let input of spans) {
                cou+=1;
            }
            span_counter = cou;
            if (span_counter >= 0) {      
                document.getElementById('options').value = span_counter;
                change();
            }
            span = span_counter;
        }, 100);
   </script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#general-info').submit(function (e) {
           
                for(var j=1;j<=span;j++){
                    for(var i=1;i<=4;i++){
                        var index = 'opt'+j+i;
                        x = document.getElementById(index).value;
                        if(x == ""){
                            Snackbar.show({ text: 'Please Fill Options, it cant be Empty!', duration: 2000, });
                            return false;
                        }
                    }
                }

                for(i=1;i<=span;i++){
                    if(! $("input[name=radio"+i+"]:checked").val()){
                        Snackbar.show({ text: 'Please Select One option from Each Dropdown!', duration: 2000, });
                        return false;
                    }
                }
            for(k=1;k<=span;k++)
            {
              var allTextBoxes1 = [];
               
                    for(var i=1;i<=4;i++){
                    var push= $("input[id=opt"+k+i+"]").val();
                    allTextBoxes1.push(push);
                    }
                
                var sorted_arr1 = allTextBoxes1.sort();
                for (var i = 0; i < allTextBoxes1.length - 1; i++) {
                    if(sorted_arr1[i + 1] != ""){
                        if (sorted_arr1[i + 1] == sorted_arr1[i]) {
                            Snackbar.show({ text: 'Options cannot be same in Dropdown '+ k, duration: 2000, });
                            return false;
                        }
                    }
                }
            }
              
              document.getElementById('question_text').value = document.getElementById('question').innerHTML;  

            });     
            document.querySelector("div[contenteditable]").addEventListener("paste", function(e) {
                e.preventDefault();
            var text = e.clipboardData.getData("text/plain");
            document.execCommand("insertHTML", false, text);
            });
        });
    </script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../plugins/dropify/dropify.min.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../../plugins/tagInput require=""/tags-input.js"></script> -->
    <script src="../../assets/js/users/account-settings.js"></script>
       <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        include_once '../../database/dbh.inc.php';
        $type = "reading-and-writing-fill-in-the-blanks";
        $test_no = trim($_POST['test_no']);
        $question_text = trim(mysqli_real_escape_string($conn, $_POST['question_text']));
        $options = trim(addslashes(mysqli_real_escape_string($conn, $_POST['options'])));
        $modify_date = date("Y/m/d");
        $question_no = $_GET['question_no'];  
        $find = [];
        $set   = [];
        for ($i=1; $i<= $options ; $i++) { 
            $f = '<div class=\"d-inline-block\" id=\"'.$i.'\" contenteditable=\"false\">&lt;span class=\"replace\"&gt;&lt;/span&gt;</div>';
            array_push($find, $f);
            array_push($set, '<span id=\"replace\"></span>');    
           }
       
        $question_text_replaced =  str_replace($find, $set, $question_text);

        $tot_options = 0;
        $option = [];
        // $answer = addslashes(mysqli_real_escape_string($conn, $_POST['radio1']));
        for ($i=1; $i <= 8; $i++) {
            if ($i <= $options) {
                $index = 'option'.$i;
                $index1 = $index."1";
                $index2 = $index."2";
                $index3 = $index."3";
                $index4 = $index."4";
                if ($_POST[$index1] != "" && $_POST[$index2] != "" && $_POST[$index3] != "" && $_POST[$index4] != "" ) {
                    $push = $_POST[$index1]."/*/".$_POST[$index2]."/*/".$_POST[$index3]."/*/".$_POST[$index4];
                    array_push($option,$push);
                    // $tot_options +=1;
                    $radio = 'radio'.$i;
                    $ans = $_POST[$radio];
                    if ($i == 1) {
                        if ($ans == 1) {
                            $answer = trim(addslashes($_POST[$index1]));
                        }
                        if ($ans == 2) {
                            $answer = trim(addslashes($_POST[$index2]));
                        }
                        if ($ans == 3) {
                            $answer = trim(addslashes($_POST[$index3]));
                        }
                        if ($ans == 4) {
                            $answer = trim(addslashes($_POST[$index4]));
                        }
                    }else{
                        if ($ans == 1) {
                            $answer = $answer."/*/".trim(addslashes($_POST[$index1]));
                        }
                        if ($ans == 2) {
                            $answer = $answer."/*/".trim(addslashes($_POST[$index2]));
                        }
                        if ($ans == 3) {
                            $answer = $answer."/*/".trim(addslashes($_POST[$index3]));
                        }
                        if ($ans == 4) {
                            $answer = $answer."/*/".trim(addslashes($_POST[$index4]));
                        }
                    }
                }else{
                    array_push($option,'');
                }
            }else{
                array_push($option,'');
            }
        }
        
        $sql = mysqli_query($conn, "INSERT INTO section_test(test_no,question_no,type,answer,questionText,option1, option2, option3, option4, option5, option6, option7, option8, modify_date,section) VALUES ('$test_no','$question_no','$type','$answer', '$question_text_replaced', '$option[0]', '$option[1]', '$option[2]', '$option[3]', '$option[4]', '$option[5]', '$option[6]', '$option[7]', '$modify_date','$section') ");
        if ($sql == true) {
            $tot_question = mysqli_query($conn , "SELECT total_question_entered FROM manage_section_test WHERE test_no='$test_no' ");
            $row = mysqli_fetch_assoc($tot_question);
            $totques = $row['total_question_entered'] + 1;
            $sql = mysqli_query($conn,"update manage_section_test set modify_date='$modify_date',total_question_entered='$totques' where test_no='$test_no' ");
            $question_no += 1;
            if($question_no <= 6)
            {
                ?><script>location.replace("reading_writing_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no ?>&question=success");</script><?php
            }
            else
            {
                $sql = mysqli_query($conn , "SELECT * from section_test where test_no='$test_no'"); 
                if(mysqli_num_rows($sql) == 18)
                {
                    $sql = mysqli_query($conn,"update manage_section_test set status=1 where total_question_entered=18");
                    session_destroy();
                    ?><script>location.href = "../manage_section_test_table.php"; </script><?php
                }
                else
                {
                    $sql = mysqli_query($conn,"update manage_section_test set status=0"); 
                    session_destroy();
                    ?><script>location.href = "../manage_section_test_table.php"; </script><?php
                }
            }
        }
        else
        {
            ?><script type="text/javascript">location.href = "reading_writing_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no;?>&error=1";</script><?php
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