<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../student/auth_login.php");
    }
    include_once '../database/dbh.inc.php';
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
if(!isset($_GET['resume']) && isset($_GET['test_no']) && isset($_GET['question']) && isset($_GET['temp']))
{
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $temp = $_GET['temp'];
    ?>
    <script type="text/javascript">
        var test_no = "<?php echo $test_no; ?>";
        var question = <?php echo $question; ?>;
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
        var temp = <?php echo $temp; ?>;
        var type='summarize-spoken-text';
        var resume = 0; 
    </script><?php
}
if(isset($_GET['resume']) && isset($_GET['question']))
{
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $temp = $_GET['temp'];
    ?>
    <script type="text/javascript">
        var test_no = "<?php echo $test_no; ?>";
        var question = <?php echo $question; ?>;
        var temp = <?php echo $temp; ?>;
        var resume = <?php echo $_GET['resume']; ?>;
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
        var type = '<?php echo $_GET['type']; ?>';
    </script><?php
}
?>
<script>
    var section = "listening";
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Listeninig Section | Origin overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-countdown.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        var hour=0;
        var min=0;
        var timeleft=0;
        var timer_resume = 1;
        var sawal = <?php echo $_GET['question']; ?>;
        if(timer_resume == 1)
        {
            $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {t:test_no,q:sawal},
                    async: false,
                    success: function (response) {
                        var obj = JSON.parse(response);
                        hour = obj.hour;
                        min= obj.min;
                        timeleft=obj.sec;
                    }
            });
        }
        <?php 
            if(isset($_GET['remaining_time'])){
                echo '
                if(hour < 0 || hour == null || min < 0 || min == null || timeleft < 0 || timeleft == null){
                    counter_update = remaining_time.split(":");
                    hour = counter_update[0];
                    min= counter_update[1];
                    timeleft=counter_update[2];
                }
                ';
            }
        ?>
    </script>
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 0px;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
    <!-- main page -->
    <?php 
        include_once('navbar.php');
    ?>
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT AREA  -->
        <div id="" class="main-content" style="margin-top: 0px;width: 100%;">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing" >

                            <!-- listening main page -->
                            <div class="statbox widget box box-shadow" id="listening" style="width: 115%;margin-top: 90px;margin-left: -92px"> 
                                <div class="widget-content widget-content-area" style="border-radius: 10px">
                                    <div class=" mt-5 text-left text-dark">
                                        <div class=" font-weight-bold text-center" style="color:black;font-size: 3em;margin-top: -40px;">Listening Section</div>

                                       <table class="table table-responsive table-bordered text-dark" align="center" style="width: 80%;margin-top:20px;border-radius: 10px;" >
                                            <tr>
                                                <th style="font-size:1.4em;color:#0169ba;padding-right: 110px;">Section</th>
                                                <th colspan="2" style="font-size:1.4em;color:#0169ba;padding-right: 350px;">Question Type</th>
                                                <th style="font-size:1.4em;color:#0169ba;padding-right: 95px;">Time Allowed</th>
                                            </tr>
                                            <tr>
                                                <td rowspan="8" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;"><b>Section 4</b></td>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Summarize Spoken Test</td>
                                                <td rowspan="8" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">30-35 minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Multiple-choice, choose multiple answer </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Fill in the blanks</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Highlight the correct summary</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Multiple-choice, choose single answer </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Select missing word </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Highlight incorrect words</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.1em;font-family: sans-serif;">Select missing word</td>
                                            </tr>
                                        </table>
                                        <div align="center" class="mt-4">
                                            <button class="btn btn-rounded btn-info" type="button" onclick="listening_section();">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listening main page end -->
     
                            <!-- listening summarize spoken text -->
                            <div class="statbox widget box box-shadow" id="p4q1" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;">   
                                <span id="response"></span>
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span>You will hear a short lecture. Write a summary for a fellow student who was not present at the lecture. You should write 50-70 words. You have 10 minutes to finish this task. Your response will be judged on the Quality of Your writing and on how well your response presents the key points presented in the lecture.</p>
                                </div>
                                <div class="row" style="margin-top: -435px" >
                                    <div class="col-xl-12 text-center mt-5">
                                       <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text1">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening1"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="margin-top: 0px">
                                            <center id="progressbarDiv1">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar1" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">
                                    <div class="tab-content" id="icon-pills-tabContent">
                                        <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                           <div class="row">
                                                <div class="col-xl-12" style="margin-top: -15px;">
                                                    <div class="form-group ">
                                                        <textarea rows="8" cols="90" class="form-control mb-2" id="text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div hidden="true">Words: <span id="wordCount">0</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row ">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">61</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listening summarize spoken text end-->

                            <!-- listening multiple answer -->
                            <div class="statbox widget box box-shadow" id="p4q2" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;">   
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Listen to the recording and answer the question by selecting all the correct responses. You will need to select more than one response.</p>
                                </div>
                                <div class="row" style="margin-top: -435px" >
                                    <div class="col-xl-12 text-center mt-5">
                                       <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text2">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening2"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="margin-top: 0px">
                                            <center id="progressbarDiv2">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar2" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                        </div>
                                        <div class="row" style="margin-top: -70px;">
                                            <div class="col-xl-12 text-center mt-5">
                                                <div class="widget-content widget-content-area">
                                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                        <div class="tab-content" id="icon-pills-tabContent2">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row ">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">64</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listening multiple answer end-->

                            <!-- fill in the blanks-->
                            <div class="statbox widget box box-shadow" id="p4q3" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;">   
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> You will hear a sentence. Type the sentence in the box below exactly as you hear it. Write as much of the sentence as you can. You will hear the sentence only once.</p> 
                                    <div class="row" style="margin-top: 0px">
                                        <div class="col-xl-12 text-center mb-3">
                                            <div class="widget-header">
                                                <div class="row layout-top-spacing" >
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4 id="counter_text3">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening3"></span></h4>
                                                    </div>                                 
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <center id="progressbarDiv3">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar3" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-bottom: 150px;">
                                        <div class="tab-content" id="icon-pills-tabContent3">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row " style="margin-top: 80px;">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">66</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fill in the blanks end-->

                            <!--highlight correct summary -->
                            <div class="statbox widget box box-shadow" id="p4q4" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Read the text and answer the multiple-choice question by selecting the correct response. Only one response is correct.</p>
                                    <div class="row" style="margin-top: 0px">
                                        <div class="col-xl-12 text-center mb-3">
                                            <div class="widget-header">
                                                <div class="row layout-top-spacing" >
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4 id="counter_text4">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening4"></span></h4>
                                                    </div>                                 
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <center id="progressbarDiv4">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar4" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                        <div class="tab-content" id="icon-pills-tabContent4">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row " style="margin-top: 80px;">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">69</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--highlight correct summary end -->

                            <!--single answer -->
                            <div class="statbox widget box box-shadow" id="p4q5" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Read the text and answer the multiple-choice question by selecting the correct response. Only one response is correct.</p>
                                    <div class="row" style="margin-top: -50px" >
                                        <div class="col-xl-12 text-center mt-5">
                                           <div class="widget-header">
                                                <div class="row layout-top-spacing" >
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4 id="counter_text5">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening5"></span></h4>
                                                    </div>                                 
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area" style="margin-top: 0px">
                                                <center id="progressbarDiv5">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar5" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                            </div>
                                            <div class="row" style="margin-top: -70px;">
                                                <div class="col-xl-12 text-center mt-5">
                                                    <div class="widget-content widget-content-area">
                                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                            <div class="tab-content" id="icon-pills-tabContent5">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row " style="margin-top: 80px;">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">71</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--select missing word -->
                            <div class="statbox widget box box-shadow" id="p4q6" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Read the text and answer the multiple-choice question by selecting the correct response. Only one response is correct.</p>
                                    <div class="row" style="margin-top: 0px">
                                        <div class="col-xl-12 text-center mb-3">
                                            <div class="widget-header">
                                                <div class="row layout-top-spacing" >
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4 id="counter_text6">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening6"></span></h4>
                                                    </div>                                 
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <center id="progressbarDiv6">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar6" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                        <div class="tab-content" id="icon-pills-tabContent6">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row " style="margin-top: 80px;">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">73</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--select missing word -->

                            <!-- highlight incorrect word -->
                            <div class="statbox widget box box-shadow" id="p4q7" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> You will hear a recording. Below is a transcription of the recording. Some words in the transcription differ from what the speaker(s) said. Please click on the words that are different.</p>
                                </div>
                                <div class="row" style="margin-top: -360px;margin-bottom: 40px;">
                                    <div class="col-xl-12 text-center mb-3">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text7">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening7"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area">
                                            <center id="progressbarDiv7">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar7" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="">
                                    <div class="tab-content" id="icon-pills-tabContent7">
                                        <div id="dummy" style="display:none;background-color: #ffeb3b;font-weight: normal;padding: 0px"></div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row " style="margin-top: 80px;">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">75</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- highlight incorrect word end-->

                            <!-- write from dictation -->
                            <div class="statbox widget box box-shadow" id="p4q8" style="width: 115%;margin-left: -92px;margin-top:-10px;display: none;"> 
                                <span id="response"></span>
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Listen to the recording and answer the question by selecting all the correct responses. You will need to select more than one response.</p>
                                </div>
                                <div class="row" style="margin-top: -435px;">
                                    <div class="col-xl-12 text-center mt-5">
                                       <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text8">Audio <span style="color: red">will Play in... </span><span id="timeleft_listening8"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="margin-top: 0px">
                                            <center id="progressbarDiv8">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar8" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">
                                    <div class="tab-content" id="icon-pills-tabContent8">
                                        <div class="tab-pane fade show active" id="icon-pills-home8" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                           <div class="row">
                                                <div class="col-xl-12 " style="margin-top: -15px;">
                                                    <div class="form-group ">
                                                        <textarea rows="8" cols="90" class="form-control mb-2" id="text1"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div hidden="true">Words: <span id="wordCount1">0</span></div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                    <div class="row " style="margin-top: 80px;">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">78</span>  of 81</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6" align="right">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-right: 25px;">
                                                <button class="mb-2 btn btn-outline-info  title-text text-dark font-weight-bold" onclick="pageInc()">Next Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--write from dictation end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--question check element-->
        <input value="43" name="question" type="hidden" id="crr_question">
    </div>     
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="../assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="../plugins/table/datatable/datatables.js"></script>  
<script src="../plugins/highlight/highlight.pack.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY STYLES -->
<script src="../assets/js/scrollspyNav.js"></script>
<script src="../plugins/countdown/jquery.countdown.min.js"></script>
<script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
</body>
</html>
<script type="text/javascript">
    var jawab="";
    var url = new URL(window.location.href);
    var crr_question = url.searchParams.get("question");
    document.getElementById("crr_question").value = crr_question;
    var q = crr_question;
    function listening_section(){
        // q++;
        non_timer=1;
        $("#crr_question").val(q); 
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
        window.history.pushState({ path: newurl }, '', newurl);
        que = q;
        document.getElementById("listening").style.display = 'none';
        if(type == 'summarize-spoken-text')
        {
            document.getElementById("p4q1").style.display = 'block';
        }
        else
        {
            document.getElementById("p4q1").style.display = 'none';
        }
        if(temp==1)
        {
            if(resume==1)
            {
                
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {listening_que: que,type: type,test_no:test_no,resume:resume},
                    success: function (response) {
                        if (type == 'summarize-spoken-text') {
                            $("#progressbarDiv1").append('<audio controls controlsList="nodownload" id="audioFile1" ><source src="../database/audio/'+response+'" type="audio/mpeg"></audio>')
                        }
                        else if (type == 'multiple-answers') {
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'block';
                            var obj = JSON.parse(response);
                            jawab = obj.ans;
                            $("#audioFile2").remove();
                            $("#progressbarDiv2").append('<audio controls controlsList="nodownload" id="audioFile2" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                            $("#icon-pills-home2").remove();
                            $("#icon-pills-tabContent2").append('<div class="tab-pane fade show active" id="icon-pills-home2" role="tabpanel" aria-labelledby="icon-pills-home-tab"><div class="col-xl-12 col-md-12 col-sm-12 col-12"><h4 id="pera" align="left" style="margin-top:-40px;margin-bottom:20px;"><b>'+obj.question+'</b></h4><p style="font-size: 1.1em" ><div class="n-chk ml-3 ml-3" align="left" id="option_block">');
                            for(i=1;i<=obj.c;i++)
                            { 
                                if(i == obj.c)
                                {
                                    for(j=1;j<=obj.c;j++)
                                    {
                                        var x = (j+9).toString(36).toUpperCase();
                                        var op = "option"+j;
                                        var res = obj[op];
                                        // alert();
                                        $("#option_block").append('<label class="new-control new-checkbox checkbox-primary" id="'+x+'"><input type="checkbox" class="new-control-input" name="checkbox" value="'+x+'"><span class="new-control-indicator">'+' '+x+'. </span><span class="text-dark" id="span2'+j+'">'+res+'</span></label></div></p></div></div>');
                                    }
                                }
                            } 
                        }
                        else if (type == "fill-in-the-blanks") {
                            var obj = JSON.parse(response)
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'none';
                            document.getElementById("p4q3").style.display = 'block';
                            jawab = obj.ans;
                            $("#audioFile3").remove();
                            $("#progressbarDiv3").append('<audio controls controlsList="nodownload" id="audioFile3" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                            $("#icon-pills-home3").remove();
                            $("#icon-pills-tabContent3").append('<div class="tab-pane fade show active" id="icon-pills-home3" role="tabpanel" aria-labelledby="icon-pills-home-tab"><div class="row" style="cursor: pointer;"><div class="col-xl-12 mb-2" style="margin-top: -30px;"><p class="paragraph text-justify" style="font-size: 1.1em;color: black;line-height: 2.2em;font-weight:lighter">'+obj.questiontext+'</p></div></div></div>');
                            var i=1;
                            function convertSpanToInput() {
                                // Insert input after span
                                $('<span id="span'+i+'" class="mx-2 d-inline-block"><input id="tmp_input'+i+'" placeholder="Answer" class="textbox d-inline-block" required="required"></span>').insertAfter($(this));
                                $(this).hide(); // Hide span
                                $(this).next().focus();
                                $('input[id=tmp_input'+i+']').css("border","solid black 0px");
                                $('input[id=tmp_input'+i+']').css("border-bottom","solid black 1px");
                                $('input[id=tmp_input'+i+']').css("border-radius","3px");
                                $("#tmp_input").blur(function() {
                                    // Set input value as span content
                                    // when focus of input is lost.
                                    // Also delete the input.
                                    var value = $(this).val();
                                    // $(this).prev().show();
                                    $(this).prev().html(value);
                                    // $(this).remove();        
                                });
                                i++;
                            }
                            $("span[id=replace]").html(convertSpanToInput);
                            $(".textbox:first").focus();
                        }
                        else if (type == "highlight-correct-summary") {
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'none';
                            document.getElementById("p4q3").style.display = 'none';
                            document.getElementById("p4q4").style.display = 'block';
                            var obj = JSON.parse(response)
                            jawab = obj.ans;
                            $("#audioFile4").remove();
                            $("#progressbarDiv4").append('<audio controls controlsList="nodownload" id="audioFile4" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                            $("#icon-pills-home4").remove();
                            $("#icon-pills-tabContent4").append('<div class="tab-pane fade show active" id="icon-pills-home4" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><p style="font-size: 1.1em" ><div class="n-chk ml-3" id="option_block4"> ') 
                            for(i=1;i<=obj.c;i++)
                            { 
                                if(i == obj.c)
                                {
                                    for(j=1;j<=obj.c;j++)
                                    {
                                        var x = (j+9).toString(36).toUpperCase();
                                        var op = "option"+j;
                                        var res = obj[op];
                                        // alert();
                                        $("#option_block4").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span4'+j+'">'+res+'</span></label><br/></div></p></div>');
                                          
                                    }
                                }
                            }
                        }
                        else if (type == "single-answer") {
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'none';
                            document.getElementById("p4q3").style.display = 'none';
                            document.getElementById("p4q4").style.display = 'none';
                            document.getElementById("p4q5").style.display = 'block';
                            var obj = JSON.parse(response)
                            jawab = obj.ans;
                            $("#audioFile5").remove();
                            $("#progressbarDiv5").append('<audio controls controlsList="nodownload" id="audioFile5" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                            $("#icon-pills-home5").remove();
                            $("#icon-pills-tabContent5").append('<div class="tab-pane fade show active" id="icon-pills-home5" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><div class="col-xl-12 col-md-12 col-sm-12 col-12"><h4 id="pera5"><b>'+obj.question+'</b></h4></div><p style="font-size: 1.1em" style="margin-top:20px;"><div class="n-chk ml-3" id="option_block5" style="margin-top:10px;"> ') 
                            for(i=1;i<=obj.c;i++)
                            { 
                                if(i == obj.c)
                                {
                                    for(j=1;j<=obj.c;j++)
                                    {
                                        var x = (j+9).toString(36).toUpperCase();
                                        var op = "option"+j;
                                        var res = obj[op];
                                        // alert();
                                        $("#option_block5").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio5" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span5'+j+'">'+res+'</span></label><br/></div></p></div>');
                                          
                                    }
                                }
                            } 
                        }
                        else if (type == "select-missing-word") {
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'none';
                            document.getElementById("p4q3").style.display = 'none';
                            document.getElementById("p4q4").style.display = 'none';
                            document.getElementById("p4q5").style.display = 'none';
                            document.getElementById("p4q6").style.display = 'block';
                            var obj = JSON.parse(response);
                            jawab = obj.ans;
                            $("#audioFile6").remove();
                            $("#progressbarDiv6").append('<audio controls controlsList="nodownload" id="audioFile6" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                            $("#icon-pills-home6").remove();
                            $("#icon-pills-tabContent6").append('<div class="tab-pane fade show active" id="icon-pills-home6" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><p style="font-size: 1.1em" ><div class="n-chk ml-3" id="option_block6"> ') 
                            for(i=1;i<=obj.c;i++)
                            { 
                                if(i == obj.c)
                                {
                                    for(j=1;j<=obj.c;j++)
                                    {
                                        var x = (j+9).toString(36).toUpperCase();
                                        var op = "option"+j;
                                        var res = obj[op];
                                        // alert();
                                        $("#option_block6").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio6" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span6'+j+'">'+res+'</span></label><br/></div></p></div>');
                                          
                                    }
                                }
                            }
                        }
                        else if (type == "highlight-incorrect-words") {
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'none';
                            document.getElementById("p4q3").style.display = 'none';
                            document.getElementById("p4q4").style.display = 'none';
                            document.getElementById("p4q5").style.display = 'none';
                            document.getElementById("p4q6").style.display = 'none';
                            document.getElementById("p4q7").style.display = 'block';
                            var obj = JSON.parse(response)
                            jawab = obj.ans;
                            $("#audioFile7").remove();
                            $("#progressbarDiv7").append('<audio controls controlsList="nodownload" id="audioFile7" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                            $("#icon-pills-home7").remove();
                            $("#icon-pills-tabContent7").append('<div class="tab-pane fade show active" id="icon-pills-home7" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><div class="row" style="cursor: pointer;"><div class="col-xl-12 mb-2" style="margin-top: -20px;"><p class="paragraph-highlight text-justify" style="font-size: 1.3em;line-height: 2;letter-spacing: auto;" id="highlight-incorrect">'+obj.questiontext+'</p></div></div>');
                            var words = $( "#highlight-incorrect" ).first().text().split( /\s+/ );
                            var text = words.join( "</span> <span>" );
                            var id = 0;
                            $( ".paragraph-highlight" ).first().html( "<span >" + text + "</span>" );
                            $( "span" ).on( "click", function() {
                            if($('#dummy').css('background-color') === $(this).css('background-color')) {
                                $(this).css("background-color", "white");
                                $(this).css("font-weight", "normal");
                                $( this ).css( "padding", "0px 0px 0px 0px" );
                                $( this ).removeAttr("id");
                            }else {
                                $(this).attr("id","selected"+id);
                                
                                $( this ).css( "background-color", "#ffeb3b" );
                                $( this ).css( "border-radius", "5px" );
                                $( this ).css( "font-weight", "bolder" );
                                $( this ).css( "padding", "0px 2px 0px 2px" );
                                id += 1;
                            }
                            });
                        }
                        else if (type == "write-from-dictation") {
                            document.getElementById("p4q1").style.display = 'none';
                            document.getElementById("p4q2").style.display = 'none';
                            document.getElementById("p4q3").style.display = 'none';
                            document.getElementById("p4q4").style.display = 'none';
                            document.getElementById("p4q5").style.display = 'none';
                            document.getElementById("p4q6").style.display = 'none';
                            document.getElementById("p4q7").style.display = 'none';
                            document.getElementById("p4q8").style.display = "block";
                            $("#audioFile8").remove();
                            $("#progressbarDiv8").append('<audio controls controlsList="nodownload" id="audioFile8" ><source src="../database/audio/'+response+'" type="audio/mpeg"></audio>')
                            document.getElementById("text1").value ="";
                            $('#wordCount1').html(0);
                        }
                    }
                });
            }
            else
            { 
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {listening_que: que,type: type,test_no:test_no},
                    success: function (response) {
                        $("#progressbarDiv1").append('<audio controls controlsList="nodownload" id="audioFile1" ><source src="../database/audio/'+response+'" type="audio/mpeg"></audio>')
                    }
                });
            }
            // $.ajax({
            //     url: 'ajax.php',
            //     type: 'POST',
            //     data: {temp:temp},
            //     success: function (response) {
            //         $("body").append(response);
            //     }
            // });
            temp="";
        }
        timer();
    }
    var wordCount = "";
    counter = function() {
        var value = $('#text').val();
        if (value.length == 0) {
            $('#wordCount').html(0);  
            return;
        }
        var regex = /\s+/gi;
        wordCount = value.trim().replace(regex, ' ').split(' ').length;
        $('#wordCount').html(wordCount); 

        };
    $(document).ready(function() {
        $('#count').click(counter);
        $('#text').change(counter);
        $('#text').keydown(counter);
        $('#text').keypress(counter);
        $('#text').keyup(counter);
        $('#text').blur(counter);
        $('#text').focus(counter);
    });

    //for write from dictation text
    var wordCount1 = "";
    counter1 = function() {
        var value1 = $('#text1').val();
        if (value1.length == 0) {
            $('#wordCount1').html(0);  
            return;
        }
        var regex1 = /\s+/gi;
        wordCount1 = value1.trim().replace(regex1, ' ').split(' ').length;
        $('#wordCount1').html(wordCount1); 

        };
    $(document).ready(function() {
        $('#count1').click(counter1);
        $('#text1').change(counter1);
        $('#text1').keydown(counter1);
        $('#text1').keypress(counter1);
        $('#text1').keyup(counter1);
        $('#text1').blur(counter1);
        $('#text1').focus(counter1);
    });
    var userans="";
    function pageInc(){
        isPaused = true;
        var remaining_time = hour+":"+min+":"+timeleft;
        window.clearInterval(downloadTimer);
        q++;
        //crr question set krna h
        $("#crr_question").val(q); 
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
        window.history.pushState({ path: newurl }, '', newurl);
        que = q -1;
        document.getElementById("question_number").innerHTML = q;
        if(que>=61 && que<=63)
        {
            summarize_spoken_text();
        }
        if(que>=64 && que<=65)
        {
            multiple_answers(); 
        }
        if(que>=66 && que<=68)
        {
            fill_in_the_blanks();
        }
        if(que>=69 && que<=70)
        {
            highlight_correct_summary();
        }
        if(que>=71 && que<=72)
        {
            single_answer();
        }
        if(que>=73 && que<=74)
        {
            select_missing_word();
        }
        if(que>=75 && que<=77)
        {
            highlight_incorrect_words();
        }
        if(que>=78 && que<=81)
        {
            write_from_dictation();
        }
        // if(que_inc >= 82)
        // {
        //     window.location.replace("reading_reorder_paragraph.php?question="+que_inc+"&test_no="+test_no);
        // }
        
        isPaused = false;
    }

    //summarize spoken_text
    function summarize_spoken_text(){    
        var remaining_time = hour+":"+min+":"+timeleft;
        type="summarize-spoken-text";
        var userans = $("#text").val();
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,word_count:wordCount},
            success: function (response) {
                if(que == 63)
                {
                    var obj = JSON.parse(response);
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'block';
                    $("#audioFile2").remove();
                    $("#progressbarDiv2").append('<audio controls controlsList="nodownload" id="audioFile2" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home2").remove();
                    $("#icon-pills-tabContent2").append('<div class="tab-pane fade show active" id="icon-pills-home2" role="tabpanel" aria-labelledby="icon-pills-home-tab"><div class="col-xl-12 col-md-12 col-sm-12 col-12"><h4 id="pera" align="left" style="margin-top:-40px;margin-bottom:20px;"><b>'+obj.question+'</b></h4><p style="font-size: 1.1em" ><div class="n-chk ml-3 ml-3" align="left" id="option_block">');
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block").append('<label class="new-control new-checkbox checkbox-primary" id="'+x+'"><input type="checkbox" class="new-control-input" name="checkbox" value="'+x+'"><span class="new-control-indicator">'+' '+x+'. </span><span class="text-dark" id="span2'+j+'">'+res+'</span></label></div></p></div></div>');
                            }
                        }
                    }  
                    window.clearInterval(downloadTimer);
                    type="multiple-answers";
                    timer();      
                } else {
                    $("#audioFile1").remove();
                    $("#progressbarDiv1").append('<audio controls controlsList="nodownload" id="audioFile1" ><source src="../database/audio/'+response+'" type="audio/mpeg"></audio>')
                    document.getElementById("text").value ="";
                    $('#wordCount').html(0);
                    window.clearInterval(downloadTimer);
                    document.getElementById("text").value ="";
                    $('#wordCount').html(0);
                    document.getElementById("counter_text1").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening1'></span>";
                    document.getElementById("counter_text1").style.display="block";
                    document.getElementById("progressbarDiv1").style.display="block";
                    document.getElementById("audioFile1").pause();
                    document.getElementById("audioFile1").currentTime = 0;
                    timeleft_listening = 3;
                    pass = 0;
                    timer();
                }
            }
        });
    }
    
    //multiple answer
    function multiple_answers(){
        var remaining_time = hour+":"+min+":"+timeleft;
        type="multiple-answers";
        option = document.getElementsByName('checkbox');
        var user_answer="";
        var userans="";
        var userAns = [];
        for(var i = 0; i < option.length; i++){
            if(option[i].checked){
                var j = i+1;
                user_answer = $("#span2"+j).html() ;
                seperator= "~~~";
                userans += user_answer + seperator;
                userAns.push(user_answer);
            }
        }
        userans = userans.replace(/~~~+$/g,"");
        var trueAns = jawab.split("/*/");

        var marks=0;
        if(userAns.length != 0){
            var intersection = userAns.filter(element => trueAns.includes(element));
            var difference = userAns.filter(element => !trueAns.includes(element));
            var tot_a = 0;
            var tot_marks = 0;
            var false_marks = 0;
            var diff = 0;
            if(intersection.length == trueAns.length && difference.length == 0) {
                marks = 45;
            } else {
                tot_a = option.length; // 5
                tot_marks = 45/trueAns.length;//4
                true_marks = intersection.length*tot_marks;//36
                false_marks = difference.length*tot_marks;//9
                diff = true_marks- false_marks;//36-9 25
                if (diff <=0 ) {
                    marks = 0; 
                }else{
                    marks = diff;
                }
            }
        }

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,marks:marks},
            success: function (response) {
                if(que == 65){
                    var obj = JSON.parse(response)
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'block';
                    jawab = obj.ans;
                    $("#audioFile3").remove();
                    $("#progressbarDiv3").append('<audio controls controlsList="nodownload" id="audioFile3" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home3").remove();
                    $("#icon-pills-tabContent3").append('<div class="tab-pane fade show active" id="icon-pills-home3" role="tabpanel" aria-labelledby="icon-pills-home-tab"><div class="row" style="cursor: pointer;"><div class="col-xl-12 mb-2" style="margin-top: -30px;"><p class="paragraph text-justify" style="font-size: 1.1em;color: black;line-height: 2.2em;font-weight:lighter">'+obj.questiontext+'</p></div></div></div>');
                    var i=1;
                    function convertSpanToInput() {
                        // Insert input after span
                        $('<span id="span'+i+'" class="mx-2 d-inline-block"><input id="tmp_input'+i+'" placeholder="Answer" class="textbox d-inline-block" required="required"></span>').insertAfter($(this));
                        $(this).hide(); // Hide span
                        $(this).next().focus();
                        $('input[id=tmp_input'+i+']').css("border","solid black 0px");
                        $('input[id=tmp_input'+i+']').css("border-bottom","solid black 1px");
                        $('input[id=tmp_input'+i+']').css("border-radius","3px");
                        $("#tmp_input").blur(function() {
                            // Set input value as span content
                            // when focus of input is lost.
                            // Also delete the input.
                            var value = $(this).val();
                            // $(this).prev().show();
                            $(this).prev().html(value);
                            // $(this).remove();        
                        });
                        i++;
                    }
                    $("span[id=replace]").html(convertSpanToInput);
                    $(".textbox:first").focus();
                    type = "fill-in-the-blanks";
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text3").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening3'></span>";
                    document.getElementById("counter_text3").style.display="block";
                    document.getElementById("progressbarDiv3").style.display="block";
                    document.getElementById("audioFile3").pause();
                    document.getElementById("audioFile3").currentTime = 0;
                    timer();      
                }
                else
                {
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'block';
                    $("#audioFile2").remove();
                    $("#progressbarDiv2").append('<audio controls controlsList="nodownload" id="audioFile2" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home2").remove();
                    $("#icon-pills-tabContent2").append('<div class="tab-pane fade show active" id="icon-pills-home2" role="tabpanel" aria-labelledby="icon-pills-home-tab"><div class="col-xl-12 col-md-12 col-sm-12 col-12"><h4 id="pera" align="left" style="margin-top:-40px;margin-bottom:20px;"><b>'+obj.question+'</b></h4><p style="font-size: 1.1em" ><div class="n-chk ml-3 ml-3" align="left" id="option_block">');
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block").append('<label class="new-control new-checkbox checkbox-primary" id="'+x+'"><input type="checkbox" class="new-control-input" name="checkbox" value="'+x+'"><span class="new-control-indicator">'+' '+x+'. </span><span class="text-dark" id="span2'+j+'">'+res+'</span></label></div></p></div></div>');
                            }
                        }
                    } 
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text2").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening2'></span>";
                    document.getElementById("counter_text2").style.display="block";
                    document.getElementById("progressbarDiv2").style.display="block";
                    document.getElementById("audioFile2").pause();
                    document.getElementById("audioFile2").currentTime = 0;
                    timer();    
                } 
            }
        });
    }

    //fill in the blanks
    function fill_in_the_blanks(){
        var remaining_time = hour+":"+min+":"+timeleft;
        type="fill-in-the-blanks";
        var userans=[];
        var option = $('.paragraph input');
        for (var i = 0; i < option.length; i++) {
            var j= i+1; 
            var ans = $('#tmp_input'+j).val();
            if (ans != "") {
                userans.push(ans); 
            }
        }
        
        var marks=0;
        if(userans.length == 0) {
            userans = "";
        }else {
            var tot_marks = 0;
            var trueAns = jawab.split("/*/");
            var intersection = userans.filter(element => trueAns.includes(element));
            var difference = userans.filter(element => !trueAns.includes(element));
            var false_marks = 0;
            var diff = 0;
            if(intersection.length == trueAns.length && difference.length == 0) {
                marks = 30;
            } else {
                tot_marks = 30/trueAns.length;
                marks = intersection.length*tot_marks;
            }
        }

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,marks:marks},
            success: function (response) {
                if(que == 68){
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'none';
                    document.getElementById("p4q4").style.display = 'block';
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile4").remove();
                    $("#progressbarDiv4").append('<audio controls controlsList="nodownload" id="audioFile4" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home4").remove();
                    $("#icon-pills-tabContent4").append('<div class="tab-pane fade show active" id="icon-pills-home4" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><p style="font-size: 1.1em" ><div class="n-chk ml-3" id="option_block4"> ') 
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block4").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span4'+j+'">'+res+'</span></label><br/></div></p></div>');
                                  
                            }
                        }
                    }
                    type="highlight-correct-summary";
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text4").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening4'></span>";
                    document.getElementById("counter_text4").style.display="block";
                    document.getElementById("progressbarDiv4").style.display="block";
                    document.getElementById("audioFile4").pause();
                    document.getElementById("audioFile4").currentTime = 0;
                    timer();              
                }
                else
                {
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'block';
                    $("#audioFile3").remove();
                    $("#progressbarDiv3").append('<audio controls controlsList="nodownload" id="audioFile3" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home3").remove();
                    $("#icon-pills-tabContent3").append('<div class="tab-pane fade show active" id="icon-pills-home3" role="tabpanel" aria-labelledby="icon-pills-home-tab"><div class="row" style="cursor: pointer;"><div class="col-xl-12 mb-2" style="margin-top: -30px;"><p class="paragraph text-justify" style="font-size: 1.1em;color: black;line-height: 2.2em;font-weight:lighter">'+obj.questiontext+'</p></div></div></div>');
                    var i=1;
                    function convertSpanToInput() {
                        // Insert input after span
                        $('<span id="span'+i+'" class="mx-2 d-inline-block"><input id="tmp_input'+i+'" placeholder="Answer" class="textbox d-inline-block" required="required"></span>').insertAfter($(this));
                        $(this).hide(); // Hide span
                        $(this).next().focus();
                        $('input[id=tmp_input'+i+']').css("border","solid black 0px");
                        $('input[id=tmp_input'+i+']').css("border-bottom","solid black 1px");
                        $('input[id=tmp_input'+i+']').css("border-radius","3px");
                        $("#tmp_input").blur(function() {
                            // Set input value as span content
                            // when focus of input is lost.
                            // Also delete the input.
                            var value = $(this).val();
                            // $(this).prev().show();
                            $(this).prev().html(value);
                            // $(this).remove();        
                        });
                        i++;
                    }
                    $("span[id=replace]").html(convertSpanToInput);
                    $(".textbox:first").focus();
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text3").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening3'></span>";
                    document.getElementById("counter_text3").style.display="block";
                    document.getElementById("progressbarDiv3").style.display="block";
                    document.getElementById("audioFile3").pause();
                    document.getElementById("audioFile3").currentTime = 0;
                    timer();         
                }
            }
        });
    } 

    function highlight_correct_summary(){
        var remaining_time = hour+":"+min+":"+timeleft;
        type="highlight-correct-summary";
        var option = document.getElementsByName('radio');
        var userans ="";
        for(var i = 0; i < option.length; i++){
            if(option[i].checked){
                j = i+1;
                userans = $("#span4"+j).html();
                break;
            }
            else
            {
                userans="";
            }
        }
        if(jawab == userans)
        {
            var marks = 45.00;
        }
        else
        {
            var marks = 0.00;
        }
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,marks:marks},
            success: function (response) {
                if(que == 70){
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'none';
                    document.getElementById("p4q4").style.display = 'none';
                    document.getElementById("p4q5").style.display = 'block';
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile5").remove();
                    $("#progressbarDiv5").append('<audio controls controlsList="nodownload" id="audioFile5" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home5").remove();
                    $("#icon-pills-tabContent5").append('<div class="tab-pane fade show active" id="icon-pills-home5" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><div class="col-xl-12 col-md-12 col-sm-12 col-12"><h4 id="pera5"><b>'+obj.question+'</b></h4></div><p style="font-size: 1.1em" style="margin-top:20px;"><div class="n-chk ml-3" id="option_block5" style="margin-top:10px;"> ') 
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block5").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio5" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span5'+j+'">'+res+'</span></label><br/></div></p></div>');
                                  
                            }
                        }
                    }
                    type = 'single-answer';
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text5").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening5'></span>";
                    document.getElementById("counter_text5").style.display="block";
                    document.getElementById("progressbarDiv5").style.display="block";
                    document.getElementById("audioFile5").pause();
                    document.getElementById("audioFile5").currentTime = 0;
                    timer();          
                }
                else
                {
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile4").remove();
                    $("#progressbarDiv4").append('<audio controls controlsList="nodownload" id="audioFile4" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home4").remove();
                    $("#icon-pills-tabContent4").append('<div class="tab-pane fade show active" id="icon-pills-home4" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><p style="font-size: 1.1em" ><div class="n-chk ml-3" id="option_block4"> ') 
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block4").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span4'+j+'">'+res+'</span></label><br/></div></p></div>');
                                  
                            }
                        }
                    }
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text4").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening4'></span>";
                    document.getElementById("counter_text4").style.display="block";
                    document.getElementById("progressbarDiv4").style.display="block";
                    document.getElementById("audioFile4").pause();
                    document.getElementById("audioFile4").currentTime = 0;
                    timer();          
                }
            }
        });
    }
    
    function single_answer(){
        var remaining_time = hour+":"+min+":"+timeleft;
        type="single-answer";
        var option = document.getElementsByName('radio5');
        var userans ="";
        for(var i = 0; i < option.length; i++){
            if(option[i].checked){
                j = i+1;
                userans = $("#span5"+j).html();
                break;
            }
            else
            {
                userans="";
            }
        }
        if(jawab == userans)
        {
            var marks = 45.00;
        }
        else
        {
            var marks = 0.00;
        }

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,marks:marks},
            success: function (response) {
                if(que == 72){
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'none';
                    document.getElementById("p4q4").style.display = 'none';
                    document.getElementById("p4q5").style.display = 'none';
                    document.getElementById("p4q6").style.display = 'block';
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile6").remove();
                    $("#progressbarDiv6").append('<audio controls controlsList="nodownload" id="audioFile6" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home6").remove();
                    $("#icon-pills-tabContent6").append('<div class="tab-pane fade show active" id="icon-pills-home6" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><p style="font-size: 1.1em" ><div class="n-chk ml-3" id="option_block6"> ') 
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block6").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio6" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span6'+j+'">'+res+'</span></label><br/></div></p></div>');
                                  
                            }
                        }
                    }
                    type = 'select-missing-word';
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text6").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening6'></span>";
                    document.getElementById("counter_text6").style.display="block";
                    document.getElementById("progressbarDiv6").style.display="block";
                    document.getElementById("audioFile6").pause();
                    document.getElementById("audioFile6").currentTime = 0;
                    timer();         
                }
                else
                {
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile5").remove();
                    $("#progressbarDiv5").append('<audio controls controlsList="nodownload" id="audioFile5" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home5").remove();
                    $("#icon-pills-tabContent5").append('<div class="tab-pane fade show active" id="icon-pills-home5" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><div class="col-xl-12 col-md-12 col-sm-12 col-12"><h4 id="pera5"><b>'+obj.question+'</b></h4></div><p style="font-size: 1.1em" style="margin-top:20px;"><div class="n-chk ml-3" id="option_block5" style="margin-top:10px;"> ') 
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block5").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio5" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span5'+j+'">'+res+'</span></label><br/></div></p></div>');
                                  
                            }
                        }
                    } 
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text5").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening5'></span>";
                    document.getElementById("counter_text5").style.display="block";
                    document.getElementById("progressbarDiv5").style.display="block";
                    document.getElementById("audioFile5").pause();
                    document.getElementById("audioFile5").currentTime = 0;
                    timer();        
                }
            }
        });
    }

    function select_missing_word(){
        var remaining_time = hour+":"+min+":"+timeleft;
        type="select-missing-word";
        var option = document.getElementsByName('radio6');
        var userans ="";
        for(var i = 0; i < option.length; i++){
            if(option[i].checked){
                j = i+1;
                userans = $("#span6"+j).html();
                break;
            }
            else
            {
                userans="";
            }
        }
        if(jawab == userans)
        {
            var marks = 45.00;
        }
        else
        {
            var marks = 0.00;
        }

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,marks:marks},
            success: function (response) {
                if(que == 74){
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'none';
                    document.getElementById("p4q4").style.display = 'none';
                    document.getElementById("p4q5").style.display = 'none';
                    document.getElementById("p4q6").style.display = 'none';
                    document.getElementById("p4q7").style.display = 'block';
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile7").remove();
                    $("#progressbarDiv7").append('<audio controls controlsList="nodownload" id="audioFile7" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home7").remove();
                    $("#icon-pills-tabContent7").append('<div class="tab-pane fade show active" id="icon-pills-home7" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><div class="row" style="cursor: pointer;"><div class="col-xl-12 mb-2" style="margin-top: -20px;"><p class="paragraph-highlight text-justify" style="font-size: 1.3em;line-height: 2;letter-spacing: auto;" id="highlight-incorrect">'+obj.questiontext+'</p></div></div>');
                    var words = $( "#highlight-incorrect" ).first().text().split( /\s+/ );
                    var text = words.join( "</span> <span>" );
                    var id = 0;
                    $( ".paragraph-highlight" ).first().html( "<span >" + text + "</span>" );
                    $( "span" ).on( "click", function() {
                    if($('#dummy').css('background-color') === $(this).css('background-color')) {
                        $(this).css("background-color", "white");
                        $(this).css("font-weight", "normal");
                        $( this ).css( "padding", "0px 0px 0px 0px" );
                        $( this ).removeAttr("id");
                    }else {
                        $(this).attr("id","selected"+id);
                        
                        $( this ).css( "background-color", "#ffeb3b" );
                        $( this ).css( "border-radius", "5px" );
                        $( this ).css( "font-weight", "bolder" );
                        $( this ).css( "padding", "0px 2px 0px 2px" );
                        id += 1;
                    }
                    });
                    type = 'highlight-incorrect-words';
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text7").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening7'></span>";
                    document.getElementById("counter_text7").style.display="block";
                    document.getElementById("progressbarDiv7").style.display="block";
                    document.getElementById("audioFile7").pause();
                    document.getElementById("audioFile7").currentTime = 0;
                    timer();   
                }
                else
                {
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile6").remove();
                    $("#progressbarDiv6").append('<audio controls controlsList="nodownload" id="audioFile6" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home6").remove();
                    $("#icon-pills-tabContent6").append('<div class="tab-pane fade show active" id="icon-pills-home6" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><p style="font-size: 1.1em" ><div class="n-chk ml-3" id="option_block6"> ') 
                    for(i=1;i<=obj.c;i++)
                    { 
                        if(i == obj.c)
                        {
                            for(j=1;j<=obj.c;j++)
                            {
                                var x = (j+9).toString(36).toUpperCase();
                                var op = "option"+j;
                                var res = obj[op];
                                // alert();
                                $("#option_block6").append('<label class="new-control new-radio radio-primary" id='+x+'><input type="radio" class="new-control-input" name="radio6" value='+x+'><span class="new-control-indicator"></span>'+' '+x+'. <span class="text-dark" id="span6'+j+'">'+res+'</span></label><br/></div></p></div>');
                                  
                            }
                        }
                    }
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text6").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening6'></span>";
                    document.getElementById("counter_text6").style.display="block";
                    document.getElementById("progressbarDiv6").style.display="block";
                    document.getElementById("audioFile6").pause();
                    document.getElementById("audioFile6").currentTime = 0;
                    timer();            
                }
            }
        });
    }

    function highlight_incorrect_words(){
        var remaining_time = hour+":"+min+":"+timeleft;
        var tot_span = $('.paragraph-highlight span').length;
        var userans = [];
        var ans="";
        for (var i = 0; i < tot_span; i++) {
            var ans = $('.paragraph-highlight #selected'+i).text();
            if($('.paragraph-highlight #selected'+i).length != 0){
                ans = ans.replace(/[^a-zA-Z0-9 !?]+/g, '');
                userans.push(ans);
            }
        }
        var trueAns = jawab.split("/*/");
        var marks=0;
        if(userans.length != 0){
            var intersection = userans.filter(element => trueAns.includes(element));
            var difference = userans.filter(element => !trueAns.includes(element));
            var tot_marks = 0;
            var false_marks = 0;
            var diff = 0;
            if(intersection.length == trueAns.length && difference.length == 0) {
                marks = 30;
            } else {
                tot_marks = 30/trueAns.length;
                true_marks = intersection.length*tot_marks;
                false_marks = difference.length*tot_marks;
                diff = true_marks- false_marks;
                if (diff <=0 ) {
                    marks = 0; 
                }else{
                    marks = diff;
                }
            }
        }

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,marks:marks},
            success: function (response) {
                if(que == 77){
                    document.getElementById("p4q1").style.display = 'none';
                    document.getElementById("p4q2").style.display = 'none';
                    document.getElementById("p4q3").style.display = 'none';
                    document.getElementById("p4q4").style.display = 'none';
                    document.getElementById("p4q5").style.display = 'none';
                    document.getElementById("p4q6").style.display = 'none';
                    document.getElementById("p4q7").style.display = 'none';
                    document.getElementById("p4q8").style.display = "block";
                    $("#audioFile8").remove();
                    $("#progressbarDiv8").append('<audio controls controlsList="nodownload" id="audioFile8" ><source src="../database/audio/'+response+'" type="audio/mpeg"></audio>')
                    document.getElementById("text1").value ="";
                    $('#wordCount1').html(0);
                    type = 'write-from-dictation';
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text8").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening8'></span>";
                    document.getElementById("counter_text8").style.display="block";
                    document.getElementById("progressbarDiv8").style.display="block";
                    document.getElementById("audioFile8").pause();
                    document.getElementById("audioFile8").currentTime = 0;
                    timer(); 
                }
                else
                {
                    var obj = JSON.parse(response)
                    jawab = obj.ans;
                    $("#audioFile7").remove();
                    $("#progressbarDiv7").append('<audio controls controlsList="nodownload" id="audioFile7" ><source src="../database/audio/'+obj.audio+'" type="audio/mpeg"></audio>')
                    $("#icon-pills-home7").remove();
                    $("#icon-pills-tabContent7").append('<div class="tab-pane fade show active" id="icon-pills-home7" role="tabpanel" aria-labelledby="icon-pills-home-tab" align="left" style="margin-top:-50px;"><div class="row" style="cursor: pointer;"><div class="col-xl-12 mb-2" style="margin-top: -20px;"><p class="paragraph-highlight text-justify" style="font-size: 1.3em;line-height: 2;letter-spacing: auto;" id="highlight-incorrect">'+obj.questiontext+'</p></div></div>');
                    var words = $( "#highlight-incorrect" ).first().text().split( /\s+/ );
                    var text = words.join( "</span> <span>" );
                    var id = 0;
                    $( ".paragraph-highlight" ).first().html( "<span >" + text + "</span>" );
                    $( "span" ).on( "click", function() {
                        if($('#dummy').css('background-color') === $(this).css('background-color')) {
                            $(this).css("background-color", "white");
                            $(this).css("font-weight", "normal");
                            $( this ).css( "padding", "0px 0px 0px 0px" );
                            $( this ).removeAttr("id");
                        }else {
                            $(this).attr("id","selected"+id);
                            $( this ).css( "background-color", "#ffeb3b" );
                            $( this ).css( "border-radius", "5px" );
                            $( this ).css( "font-weight", "bolder" );
                            $( this ).css( "padding", "0px 2px 0px 2px" );
                            id += 1;
                        }
                    });
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text7").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening7'></span>";
                    document.getElementById("counter_text7").style.display="block";
                    document.getElementById("progressbarDiv7").style.display="block";
                    document.getElementById("audioFile7").pause();
                    document.getElementById("audioFile7").currentTime = 0;
                    timer(); 
                }
            }
        });
    }

    function write_from_dictation(){
        var remaining_time = hour+":"+min+":"+timeleft;
        type="write-from-dictation";
        var userans = $("#text1").val();
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {remaining_time: remaining_time,summarize_writing_que: que,type: type,test_no:test_no,answer:userans,word_count:wordCount1},
            success: function (response) {
                if(que >= 81)
                {
                    swal({
                        title: 'Good job!',
                        text: "You completed test successfully!",
                        type: 'success',
                        padding: '2em',
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.opener.location.reload(true);
                            window.close();
                        }
                    })
                    
                }
                else
                {
                    $("#audioFile8").remove();
                    $("#progressbarDiv8").append('<audio controls controlsList="nodownload" id="audioFile8" ><source src="../database/audio/'+response+'" type="audio/mpeg"></audio>')
                    document.getElementById("text1").value ="";
                    $('#wordCount1').html(0);
                    window.clearInterval(downloadTimer);  
                    document.getElementById("counter_text8").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft_listening8'></span>";
                    document.getElementById("counter_text8").style.display="block";
                    document.getElementById("progressbarDiv8").style.display="block";
                    document.getElementById("audioFile8").pause();
                    document.getElementById("audioFile8").currentTime = 0;
                    timer(); 
                }
            }
        });
    }


    //timer call
    
    var click = 0;
    // timer define
    function timer(){
        if (click == 1){
            window.clearInterval(downloadTimer);
        }
        var timeleft_listening = 3;
        var pass = 0;
        var y;
        window.downloadTimer = setInterval(function(){
            click = 1;
            if(timeleft_listening <= -1){
                if (type == 'summarize-spoken-text') {
                    if (pass == 0) {
                        document.getElementById("audioFile1").play();
                        var x = Math.ceil(document.getElementById("audioFile1").duration);
                        document.getElementById("counter_text1").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening1'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar1").style.width = per;
                        document.getElementById("timeleft_listening1").innerHTML = timeleft_listening ;
                    }else{
                        window.clearInterval(downloadTimer);
                        document.getElementById("counter_text1").style.display="none";
                        document.getElementById("progressbarDiv1").style.display="none";
                    }
                    document.getElementById("progressbar1").style.width = "100%" ;
                } else if (type == 'multiple-answers') {
                    if (pass == 0) {
                        document.getElementById("audioFile2").play();
                        var x = Math.ceil(document.getElementById("audioFile2").duration);
                        document.getElementById("counter_text2").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening2'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar2").style.width = per;
                        document.getElementById("timeleft_listening2").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text2").style.display="none";
                        document.getElementById("progressbarDiv2").style.display="none";
                    }
                    document.getElementById("progressbar2").style.width = "100%" ;
                    document.getElementById("timeleft_listening2").innerHTML = timeleft_listening ;
                } else if (type == 'fill-in-the-blanks') {
                    if (pass == 0) {
                        document.getElementById("audioFile3").play();
                        var x = Math.ceil(document.getElementById("audioFile3").duration);
                        document.getElementById("counter_text3").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening3'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar3").style.width = per;
                        document.getElementById("timeleft_listening3").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text3").style.display="none";
                        document.getElementById("progressbarDiv3").style.display="none";
                    }
                } else if (type == 'highlight-correct-summary') {
                    if (pass == 0) {
                        document.getElementById("audioFile4").play();
                        var x = Math.ceil(document.getElementById("audioFile4").duration);
                        document.getElementById("counter_text4").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening4'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar4").style.width = per;
                        document.getElementById("timeleft_listening4").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text4").style.display="none";
                        document.getElementById("progressbarDiv4").style.display="none";
                        clearInterval(downloadTimer);
                    }
                } else if (type == 'single-answer') {
                    if (pass == 0) {
                        document.getElementById("audioFile5").play();
                        var x = Math.ceil(document.getElementById("audioFile5").duration);
                        document.getElementById("counter_text5").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening5'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar5").style.width = per;
                        document.getElementById("timeleft_listening5").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text5").style.display="none";
                        document.getElementById("progressbarDiv5").style.display="none";
                        clearInterval(downloadTimer);
                    }
                } else if (type == 'select-missing-word') {
                    if (pass == 0) {
                        document.getElementById("audioFile6").play();
                        var x = Math.ceil(document.getElementById("audioFile6").duration);
                        document.getElementById("counter_text6").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening6'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar6").style.width = per;
                        document.getElementById("timeleft_listening6").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text6").style.display="none";
                        document.getElementById("progressbarDiv6").style.display="none";
                        clearInterval(downloadTimer);
                    }
                } else if (type == 'highlight-incorrect-words') {
                    if (pass == 0) {
                        document.getElementById("audioFile7").play();
                        var x = Math.ceil(document.getElementById("audioFile7").duration);
                        document.getElementById("counter_text7").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening7'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar7").style.width = per;
                        document.getElementById("timeleft_listening7").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text7").style.display ="none";
                        document.getElementById("progressbarDiv7").style.display ="none";
                    }
                } else if (type == 'write-from-dictation') {
                    if (pass == 0) {
                        document.getElementById("audioFile8").play();
                        var x = Math.ceil(document.getElementById("audioFile8").duration);
                        if(isNaN(x))
                        {
                            location.reload();
                        }
                        document.getElementById("counter_text8").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft_listening8'></span>/"+x;
                        timeleft_listening=x;
                        audTime = x;
                        pass = 1;
                        var per = ((timeleft_listening*100)/audTime)+"%";
                        document.getElementById("progressbar8").style.width = per;
                        document.getElementById("timeleft_listening8").innerHTML = timeleft_listening ;
                    }else{
                        document.getElementById("counter_text8").style.display="none";
                        document.getElementById("progressbarDiv8").style.display="none";
                    }
                }
            } else {
                if (type == 'summarize-spoken-text') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar1").style.width = per ;
                    document.getElementById("timeleft_listening1").innerHTML = timeleft_listening ;
                } else if (type == 'multiple-answers') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar2").style.width = per ;
                    document.getElementById("timeleft_listening2").innerHTML = timeleft_listening ;
                } else if (type == 'fill-in-the-blanks') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar3").style.width = per ;
                    document.getElementById("timeleft_listening3").innerHTML = timeleft_listening ;
                } else if (type == 'highlight-correct-summary') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar4").style.width = per ;
                    document.getElementById("timeleft_listening4").innerHTML = timeleft_listening ;
                } else if (type == 'single-answer') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar5").style.width = per ;
                    document.getElementById("timeleft_listening5").innerHTML = timeleft_listening ;
                } else if (type == 'select-missing-word') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar6").style.width = per ;
                    document.getElementById("timeleft_listening6").innerHTML = timeleft_listening ;
                } else if (type == 'highlight-incorrect-words') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar7").style.width = per ;
                    document.getElementById("timeleft_listening7").innerHTML = timeleft_listening ;
                } else if (type == 'write-from-dictation') {
                    if (pass==1) {
                        var per = ((timeleft_listening*100)/audTime)+"%";
                    }else{
                        var per = (timeleft_listening/0.03)+"%";
                    }
                    document.getElementById("progressbar8").style.width = per ;
                    document.getElementById("timeleft_listening8").innerHTML = timeleft_listening ;
                }
            }
            timeleft_listening -= 1;
            if(timeleft_listening == -2){
                window.clearInterval(downloadTimer);
            }
        }, 1000);
    }
    function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
    $(document).on("keydown", disableF5);
</script>
