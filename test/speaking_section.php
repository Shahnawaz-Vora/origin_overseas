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
<script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
<?php
include_once '../database/dbh.inc.php';
if (!isset($_GET['resume']) && isset($_GET['question']) == 1)
{
    $type = "read-aloud";
    $section = 'speaking';
    $test_no = $_GET['testno'];
    $question=1;
    $sql = "select * from test where test_no = '$test_no' and type='$type' and question_no=1 and section='speaking'";
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
        var ques = 1;
        var hour =2;
        var min = 60;
        var timeleft=0;
        var section = "speaking";
    </script><?php
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);

}
if(isset($_GET['resume']) && isset($_GET['question']))
{
    $type = $_GET['type'];
    $section = 'speaking';
    $question = $_GET['question'];
    $test_no = $_GET['testno'];
        $question_query = $question;
        $sql = "select * from test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='speaking'";
    ?><script type="text/javascript">
        var section = "speaking";
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
        var ques = <?php echo $question; ?>;
        var resume = 1;
        var hour=0;
        var min=0;
        var timeleft=0;
        var timer_resume = <?php if (isset($_GET['resume']) || isset($_GET['continue'])) {echo 1;}else{echo 0;}?>;
        var sawal = <?php echo $_GET['question']; ?>;
        if(timer_resume == 1)
        {
            $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {t:test_no,q:sawal},
                    async: false,
                    success: function (response) {
                        console.log(response)
                        var obj = JSON.parse(response);
                        hour = obj.hour;
                        min= obj.min;
                        timeleft=obj.sec;
                    }
            });
        }
    </script>
    <?php
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Speaking Section | Origin overseas - PTE tutors </title>
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
    <link href="assets/css/elements/avatar.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <style type="text/css">
        .card-body > ul > li > a {
            color:black;
        }
        .card-body > ul > li > a:hover {
            color:blue;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="100" >
    <?php 
        include_once('navbar.php');
    ?>
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        <!--  BEGIN CONTENT AREA  -->
        <div id="" class="main-content" style="margin-top: 60px;width: 100%;">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">

                            <!-- read a loud start -->
                            <div class="statbox widget box box-shadow" id="p1q1" style="width: 115%;margin-left: -92px">
                                <div class="text-center widget box box-shadow widget-content widget-content-area " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Look at the text below. In 40 seconds, you must read this text aloud as naturally and clearly as possible. You have 40 seconds to read aloud.</p>
                                </div>
                                <div class="row" style="margin-top: -400px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text1">Recording <span style="color: red">will start in... </span><span id="timeleft1"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="margin-bottom: -70px;">
                                            <center id="progressbarDiv1">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar1" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </center>
                                            <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                <div class="tab-content" id="icon-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                                        <p class="mb-4 text-justify" style="font-size: 1.3em;color: black;letter-spacing: auto;font-family: 'Nunito', sans-serif" id= "question_original">

                                                            <?php
                                                            if ($question >=1 && $question <=7) { 
                                                                if (!isset($_GET['resume']))
                                                                {  
                                                                    echo stripslashes($row['questionText']);
                                                                } 
                                                                else if(isset($_GET['resume'])) 
                                                                {
                                                                    echo stripslashes($row['questionText']);
                                                                } 
                                                            } 
                                                            ?>
                                                        </p>      
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid"  align="center">
                                                <button id=startRecord1 hidden="">start</button>
                                                <button id=stopRecord1 disabled hidden="">stop</button>
                                                <audio id=recordedAudio1 hidden=""></audio>
                                                <a id=audioDownload1 hidden=""></a>
                                            </div>
                                            <input value="1" name="question" type="hidden" id="crr_question">
                                            
                                        </div>
                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                            <div class="row mt-5">
                                                <div class="col-xl-6" align="left">
                                                    <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                        <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold"><span id="question_number">1</span>  of 81</button>
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
                                </div>
                            </div>
                            <!-- read a loud end -->

                            <input type="hidden" name="resume" value="0" id="resume">
                            <script type="text/javascript">
                                if(resume == 1){
                                    document.getElementById("resume").value = 1;
                                }
                            </script>

                            <!-- repeat sentence start -->
                            <div class="statbox widget box box-shadow" id="p1q2" style="width: 115%;margin-left: -92px;display: none;">   
                                <div class="text-center widget box box-shadow widget-content widget-content-area " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4" style="padding: 0 60 0 50;"><span style="color: red">Note:</span> You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</p>
                                </div> 
                                <div class="row" style="margin-top: -400px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text2">Audio <span style="color: red">will start in... </span><span id="timeleft2"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area ">
                                                <center id="progressbarDiv2">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar2" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                                
                                                <div class="container-fluid">
                                                    <button id=startRecord2 hidden="">start</button>
                                                    <button id=stopRecord2 hidden="">stop</button>
                                                    <center><audio id=recordedAudio2 hidden=""></audio></center>
                                                    <a id=audioDownload2 hidden=""></a>
                                                </div>
                                        </div>
                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                            <div class="row mt-5">
                                                <div class="col-xl-6" align="left">
                                                    <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                        <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">1</span>  of 81</button>
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
                                </div>
                            </div>
                            <!-- repeat sentence end -->

                            <!--describe image start -->
                            <div class="statbox widget box box-shadow" id="p1q3" style="width: 115%;margin-left: -84px;display: none;">      
                                <div class="text-center widget box box-shadow widget-content widget-content-area " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Look at image below. In 25 seconds, please speak into the microphone and describe in detail what the image is showing. You will have 40 seconds to give your response.</p>
                                </div>
                                <div class="row" style="margin-top: -400px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text3">Recording <span style="color: red">will start in... </span><span id="timeleft3"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area ">
                                            <center id="progressbarDiv3">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar3" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                            
                                            <div class="container-fluid" id="image_recording">
                                                <button id=startRecord3 hidden="">start</button>
                                                <button id=stopRecord3 hidden="">stop</button>
                                                <center><audio id=recordedAudio3 hidden=""></audio></center>
                                                <a id=audioDownload3 hidden=""></a>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                            <div class="row mt-5">
                                                <div class="col-xl-6" align="left">
                                                    <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                        <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">1</span>  of 81</button>
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
                                </div>
                            </div>
                            <!--describe image start end -->

                            <!--re-tell lecture -->
                            <div class="statbox widget box box-shadow" id="p1q4" style="width: 115%;margin-left: -92px;display: none;">   
                                <div class="text-center widget-content widget-content-area " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> You will hear a lecture. After listening to the lecture, in 5 seconds, please speak into the microphone and retell what you have just heard from the lecture in your own words. You will have 40 seconds to give your response.</p>
                                </div> 
                                <div class="row" style="margin-top: -400px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text4">Audio/Video <span style="color: red">will start in... </span><span id="timeleft4"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area ">
                                            <center id="progressbarDiv4">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar4" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                            
                                            <div class="container-fluid" id="">
                                                <button id=startRecord4 hidden="">start</button>
                                                <button id=stopRecord4 hidden="">stop</button>
                                                <center><audio id=recordedAudio4 hidden=""></audio></center>
                                                <a id=audioDownload4 hidden=""></a>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                            <div class="row mt-5 ">
                                                <div class="col-xl-6" align="left">
                                                    <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                        <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">1</span>  of 81</button>
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
                                </div>
                            </div>

                            <!--answer short question -->
                            <div class="statbox widget box box-shadow" id="p1q5" style="width: 115%;margin-left: -92px;display: none;">    
                                <div class="text-center widget-content widget-content-area " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> You will hear a question. Please give a simple and short answer. Often just one or a few words is enough.</p>
                                </div> 
                                <div class="row" style="margin-top: -400px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text5">Recording <span style="color: red">will start in... </span><span id="timeleft5"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area ">
                                                <center id="progressbarDiv5">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar5" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                                
                                                <div class="container-fluid" id="">
                                                    <button id=startRecord5 hidden="">start</button>
                                                    <button id=stopRecord5 hidden="">stop</button>
                                                    <center><audio id=recordedAudio5 hidden=""></audio></center>
                                                    <a id=audioDownload5 hidden=""></a>
                                                </div>
                                        </div>
                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                            <div class="row mt-5 ">
                                                <div class="col-xl-6" align="left">
                                                    <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                        <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">1</span>  of 81</button>
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
                                </div>
                            </div>
                            <!--answer short lecture end-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script type="text/javascript">
        var resume = $("#resume").val();
        if(resume==1)
        {    
            var q = ques;
            console.log(resume);
            document.getElementById("crr_question").value = <?php echo $_GET['question']; ?>;
            var crr = $("#crr_question").val();
            if(crr>=1 && crr<=7)
            {

            }
            if(crr >=8 && crr <= 17)
            {
                <?php
                $question_query = $question - 7;
                $sql1 = "select * from test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='speaking' ";
                $run1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($run1);
                ?>
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "block";
                document.getElementById("p1q3").style.display = 'none';
                document.getElementById("p1q4").style.display = 'none';
                document.getElementById("p1q5").style.display = 'none';
                $("#progressbarDiv2").append('<audio controls controlsList="nodownload" id="audioFile2" ><source src="../database/audio/<?php echo $row1['audio']; ?>"></audio>');
            }
            else if(crr >=18 && crr <= 24)
            {
                <?php
                $question_query = $question - 17;
                $sql1 = "select * from test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='speaking' ";
                $run1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($run1);
                ?>
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'block';
                document.getElementById("p1q4").style.display = 'none';
                document.getElementById("p1q5").style.display = 'none';
                $("#progressbarDiv3").append('<img id="describe-image" src="../database/images/<?php echo $row1['image']; ?>" />');
            }
            else if(crr >=25 && crr <= 28)
            {
                var file;
                <?php
                $question_query = $question - 24;
                $sql1 = "select * from test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='speaking' ";
                $run1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($run1);
                if(file_exists('../database/audio/'.$row1['audio']))
                {
                    echo "console.log('aaaaaaa');";
                    echo "file = 'audio';";
                }
                else
                {
                    
                    echo "file = 'video';";
                }
                ?>
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'none';
                document.getElementById("p1q4").style.display = 'block';
                document.getElementById("p1q5").style.display = 'none';
                if(file == 'audio'){
                    document.getElementById("p1q4").style.marginLeft = "-92px";
                    $("#progressbarDiv4").append('<audio controls controlsList="nodownload" id="audioFile4"><source src=../database/audio/<?php echo $row1['audio']; ?>></audio>');
                }
                if(file == 'video'){
                    document.getElementById("p1q4").style.marginLeft = "-83px";
                    $("#progressbarDiv4").append('<video controls controlsList="nodownload" style="margin-top:20px;" id="audioFile4" width=600><source src=../database/video/<?php echo $row1['audio']; ?>></video>');
                }
            }
            else if(crr >=29 && crr <= 38)
            {
                <?php
                $question_query = $question - 28;
                $sql1 = "select * from test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='speaking' ";
                $run1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($run1);
                ?>
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'none';
                document.getElementById("p1q4").style.display = 'none';
                document.getElementById("p1q5").style.display = 'block';
                $("#progressbarDiv5").append('<audio controls controlsList="nodownload" id="audioFile5" ><source src=../database/audio/<?php echo $row1['audio']; ?>></audio>');
            }
        }
        else
        {
            var q =1;
        }
        var audio_file;
        let device = navigator.mediaDevices.getUserMedia({ audio:true });
        function pageInc(){
            isPaused = true;
            read_aloud();
            isPaused = false;
        }
        //read a loud
        function read_aloud(){
            var recAud= "recordedAudio2";
            var que = $("#crr_question").val(); 
            ques = q+1;
            document.getElementById("question_number").innerHTML = ques;
            console.log("que:"+que + "q:"+q+" Ques:"+ ques);
            if (ques>=8 && ques<=17) {
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
                window.history.pushState({ path: newurl }, '', newurl);
                var url = new URL(window.location.href);
                var crr_question = url.searchParams.get("question");
                document.getElementById("crr_question").value = crr_question;
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "block";
                document.getElementById("p1q3").style.display = 'none';
                document.getElementById("p1q4").style.display = 'none';
                document.getElementById("p1q5").style.display = 'none';
                repeat_sentence();
            }
            else if(ques>=18 && ques<=24){
                var recAud= "recordedAudio3";
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
                window.history.pushState({ path: newurl }, '', newurl);
                var url = new URL(window.location.href);
                var crr_question = url.searchParams.get("question");
                document.getElementById("crr_question").value = crr_question;
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'block';
                document.getElementById("p1q4").style.display = 'none';
                document.getElementById("p1q5").style.display = 'none';
                describe_image();
            }
            else if(ques>=25 && ques<=28){
                var recAud= "recordedAudio4";
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
                window.history.pushState({ path: newurl }, '', newurl);
                var url = new URL(window.location.href);
                var crr_question = url.searchParams.get("question");
                document.getElementById("crr_question").value = crr_question;
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'none';
                document.getElementById("p1q4").style.display = 'block';
                document.getElementById("p1q5").style.display = 'none';
                re_tell_lecture();
            }
            else if(ques>=29 && ques<=39) {
                var recAud= "recordedAudio5";
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
                window.history.pushState({ path: newurl }, '', newurl);
                var url = new URL(window.location.href);
                var crr_question = url.searchParams.get("question");
                document.getElementById("crr_question").value = crr_question;
                document.getElementById("p1q1").style.display = "none";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'none';
                document.getElementById("p1q4").style.display = 'none';
                document.getElementById("p1q5").style.display = 'block';
                short_question();
            }
            else if(ques>39){
                var remaining_time = hour+":"+min+":"+timeleft;
                window.location.replace("writing.php?question="+ques+"&test_no="+test_no+"&continue=1&non_timer=1&remaining_time="+remaining_time);
            }
            else{
                q+=1;
                var remaining_time = hour+":"+min+":"+timeleft;
                var recAud= "recordedAudio1";
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {que: que,test_no:test_no, audio: audio_file,remaining_time:remaining_time},
                    success: function (response) {
                        $("#question_original").remove();
                        $("#icon-pills-home").append('<p class="mb-4 text-justify" style="font-size: 1.3em;color: black;letter-spacing: auto;font-family: Nunito, sans-serif" id= "question_original">'+response+'</p>')
                        audio_file = "";
                    }
                });
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
                window.history.pushState({ path: newurl }, '', newurl);
                var url = new URL(window.location.href);
                var crr_question = url.searchParams.get("question");
                document.getElementById("crr_question").value = crr_question;
                document.getElementById("p1q1").style.display = "block";
                document.getElementById("p1q2").style.display = "none";
                document.getElementById("p1q3").style.display = 'none';
                if(type == 'read-aloud'){
                    window.clearInterval(downloadTimer);
                    document.getElementById("recordedAudio1").style.display = "none";
                    document.getElementById("counter_text1").innerHTML = "Recording <span style='color: red'>will start in... </span><span id='timeleft1'></span>";
                    document.getElementById("progressbarDiv1").style.display ="block";
                    timer();
                }
            }
        }

        timer();

        // read a loud timer
        function timer(){
            if (type == 'read-aloud') {
                var timeleft = 40;
            }else if (type == 'repeat-sentence'){
                var timeleft = 3;
            }else if (type == 'describe-image'){
                var timeleft = 25;
            }else if (type == 're-tell-lecture'){
                var timeleft = 5;
            }else if (type == 'answer-short-question'){
                var timeleft = 3;
            }
            var pass = 0;
            var y;
            var click = 1;
            window.downloadTimer = setInterval(function(){
            if(timeleft <= -1){
                if (type == 'read-aloud') {
                    if (pass == 2) {
                        document.getElementById("counter_text1").innerHTML = "Recording <span style='color:red'>complete</span>";
                        // document.getElementById("progressbarDiv1").style.display ="none";
                        document.getElementById("stopRecord1").disabled = false;
                        document.getElementById("stopRecord1").click();
                        document.getElementById("recordedAudio1").style.display = "block";
                        window.clearInterval(downloadTimer);
                    }else if(pass == 1){
                        timeleft=10;
                        document.getElementById("startRecord1").click();
                        document.getElementById("counter_text1").innerHTML = "<span style='color:red'>Recording</span> has Started... <span id='timeleft1'></span>/10";
                        pass = 2;
                        document.getElementById("timeleft1").innerHTML = timeleft;
                    }else{
                         var audio = new Audio('../audio/beep.mp3');
                        audio.play();
                        timeleft = 0;
                        pass = 1;
                    }
                    document.getElementById("progressbar1").style.width = "100%" ;
                } else if (type == 'repeat-sentence'){
                    if (pass == 2) {
                        clearInterval(downloadTimer);
                        document.getElementById("counter_text2").innerHTML = "Recording <span style='color:red'>complete</span>";
                        // document.getElementById("progressbarDiv").style.display ="none";
                        document.getElementById("stopRecord2").click();
                        document.getElementById("recordedAudio2").style.display = "block";
                        window.clearInterval(downloadTimer);
                    }else if(pass == 1){
                        var audio = new Audio('../audio/beep.mp3');
                        audio.play();
                        timeleft=10;
                        document.getElementById("startRecord2").click();
                        document.getElementById("audioFile2").style.padding = "0 0 52 0";
                        document.getElementById("audioFile2").style.visibility ="hidden";
                        document.getElementById("counter_text2").innerHTML = "<span style='color:red'>Recording</span> has Started... <span id='timeleft2'></span>/10";
                        pass = 2;
                    }else{
                        var x = Math.ceil(document.getElementById("audioFile2").duration);
                        document.getElementById("audioFile2").play();
                        document.getElementById("counter_text2").innerHTML = "Audio<span style='color:red'> is playing... </span><span id='timeleft2'></span>";
                        timeleft=x;
                        y=x;
                        pass = 1;
                    }
                    document.getElementById("progressbar2").style.width = "100%" ;
                    document.getElementById("timeleft2").innerHTML = timeleft ;
                } else if (type == 'describe-image'){
                    if (pass == 2) {
                        document.getElementById("counter_text3").innerHTML = "Recording <span style='color:red'>complete</span>";
                        document.getElementById("stopRecord3").click();
                        document.getElementById("recordedAudio3").style.display = "block";
                        clearInterval(downloadTimer);
                    }else if(pass == 1){
                        document.getElementById("counter_text3").innerHTML = "<span style='color:red'>Recording</span> has Started... <span id='timeleft3'></span>/40";
                        document.getElementById("progressbar3").style.width = "100%" ;
                        document.getElementById("timeleft3").innerHTML = "40";
                        document.getElementById("startRecord3").click();
                        pass = 2;
                        timeleft = 40;
                    }
                    else{
                        var audio = new Audio('../audio/beep.mp3');
                        audio.play();
                        timeleft = 0;
                        pass = 1;
                        document.getElementById("progressbar3").style.width = "100%" ;
                    }
                    document.getElementById("timeleft3").innerHTML = timeleft ;
                } else if (type == 're-tell-lecture'){
                    if (pass == 4) {
                        document.getElementById("counter_text4").innerHTML = "Recording <span style='color:red'>complete</span>";
                        // document.getElementById("progressbarDiv").style.display = "none";;
                        document.getElementById("stopRecord4").click();
                        document.getElementById("recordedAudio4").style.display = "block";
                        clearInterval(downloadTimer);
                    }else if(pass == 1){
                        document.getElementById("counter_text4").innerHTML = "Recording <span style='color:red'> will start </span>after... <span id='timeleft4'></span>";
                        timeleft=10;
                        pass = 2;
                        document.getElementById("timeleft4").innerHTML = timeleft ;
                    }else if(pass == 2){
                        var audio = new Audio('../audio/beep.mp3');
                        audio.play();
                        timeleft=0;
                        pass = 3;
                    }else if(pass == 3){
                        timeleft=40;
                        document.getElementById("startRecord4").click();
                        document.getElementById("counter_text4").innerHTML = "<span style='color:red'>Recording</span> has Started... <span id='timeleft4'></span>/40";
                        pass = 4;
                        document.getElementById("timeleft4").innerHTML = timeleft ;
                    }else{
                        var x = Math.ceil(document.getElementById("audioFile4").duration);
                        document.getElementById("audioFile4").play();
                        document.getElementById("counter_text4").innerHTML = "Audio<span style='color:red'> is playing...</span> <span id='timeleft4'></span>";
                        timeleft=x;
                        y=x;
                        pass = 1;
                        document.getElementById("timeleft4").innerHTML = timeleft ;
                    }
                    document.getElementById("progressbar4").style.width = "100%" ;
                } else if (type == 'answer-short-question'){
                    if (pass == 3) {
                        document.getElementById("counter_text5").innerHTML = "Recording <span style='color:red'>complete</span>";
                        document.getElementById("stopRecord5").click();
                        document.getElementById("recordedAudio5").style.display = "block";
                        clearInterval(downloadTimer);
                    }else if(pass == 1){
                        var audio = new Audio('../audio/beep.mp3');
                        audio.play();
                        timeleft=0;
                        pass = 2;
                    }else if(pass == 2){
                        timeleft=10;
                        document.getElementById("startRecord5").click();
                        document.getElementById("counter_text5").innerHTML = "<span style='color:red'>Recording</span> has Started... <span id='timeleft5'></span>/10";
                        pass = 3;
                    }else{
                        var x = Math.ceil(document.getElementById("audioFile5").duration);
                        document.getElementById("audioFile5").play();
                        document.getElementById("counter_text5").innerHTML = "Audio<span style='color:red'> is playing...</span> <span id='timeleft5'></span>";
                        timeleft=x;
                        y=x;
                        pass = 1;
                    }
                    document.getElementById("progressbar5").style.width = "100%" ;
                    document.getElementById("timeleft5").innerHTML = timeleft ;
                }
            } else {
                if (type == 'read-aloud') {
                    if (pass == 0) {
                        var per = (timeleft/.4)+"%";
                    }else if (pass == 1) {
                        var per = ((timeleft*100)/y)+"%";
                    }else if (pass == 2) {
                        var per = (timeleft/.1)+"%";
                    }else{    
                        var per = (timeleft/.40)+"%";
                    }
                    document.getElementById("progressbar1").style.width = per ;
                    document.getElementById("timeleft1").innerHTML = timeleft ;
                } else if (type == 'repeat-sentence'){
                    if (pass == 0) {
                        var per = (timeleft/.03)+"%";
                    }else if (pass == 1) {
                        var per = ((timeleft*100)/y)+"%";
                    }else if (pass == 2) {
                        var per = (timeleft/.1)+"%";
                    }else{    
                        var per = "100%";
                    }
                    document.getElementById("progressbar2").style.width = per ;
                    document.getElementById("timeleft2").innerHTML = timeleft ;
                } else if (type == 'describe-image'){
                    if (pass == 0) {
                        var per = (timeleft/.25)+"%";
                    }else if (pass == 1) {
                        var per = "100%";
                    }else if (pass == 2) {
                        var per = (timeleft/.4)+"%";
                    }else{    
                        var per = "100%";
                    }
                    document.getElementById("progressbar3").style.width = per ;
                    document.getElementById("timeleft3").innerHTML = timeleft ;
                } else if (type == 're-tell-lecture'){
                    if (pass == 0) {
                        var per = (timeleft/.05)+"%";
                    }else if (pass == 1) {
                        var per = ((timeleft*100)/y)+"%";
                    }else if (pass == 2) {
                        var per = (timeleft/.1)+"%";
                    }else if(pass == 3){
                        var per = (timeleft/.1)+"%";
                    }else{    
                        var per = (timeleft/.40)+"%";
                    }
                    document.getElementById("progressbar4").style.width = per ;
                    document.getElementById("timeleft4").innerHTML = timeleft ;
                } else if (type == 'answer-short-question'){
                    if (pass == 0) {
                        var per = (timeleft/.03)+"%";
                    }else if (pass == 1) {
                        var per = ((timeleft*100)/y)+"%";
                    }else if (pass == 2) {
                        var per = (timeleft/.1)+"%";
                    }else if(pass == 3){
                        var per = (timeleft/.1)+"%";
                    }else{    
                        var per = (timeleft/.40)+"%";
                    }
                    document.getElementById("progressbar5").style.width = per ;
                    document.getElementById("timeleft5").innerHTML = timeleft ;
                }
            }
            timeleft -= 1;
            }, 1000);
        }

        // repeat sentence
        function repeat_sentence(){
            var remaining_time = hour+":"+min+":"+timeleft;
            var que = $("#crr_question").val(); 
            type = 'repeat-sentence';
            q+=1;
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {que: que, test_no:test_no, audio: audio_file,remaining_time:remaining_time},
                success: function (response) {
                    $("#audioFile2").remove();
                    $("#progressbarDiv2").append('<audio controls controlsList="nodownload" id="audioFile2" ><source src=../database/audio/'+response+'></audio>');
                    console.log(response);
                    audio_file = "";
                }
            });
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
            window.history.pushState({ path: newurl }, '', newurl);
            var url = new URL(window.location.href);
            var crr_question = url.searchParams.get("question");
            document.getElementById("crr_question").value = crr_question;
            if(type == 'repeat-sentence'){
                window.clearInterval(downloadTimer);
                document.getElementById("recordedAudio2").style.display = "none";
                document.getElementById("counter_text2").innerHTML = "Audio <span style='color: red'>will play in... </span><span id='timeleft2'></span>";
                document.getElementById("progressbarDiv2").style.display ="block";
                timer();
            }
        }

        //describe image function
        function describe_image(){
            var remaining_time = hour+":"+min+":"+timeleft;
            var que = $("#crr_question").val(); 
            type = 'describe-image';
            q+=1;
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {que: que, test_no:test_no, audio: audio_file,remaining_time:remaining_time},
                success: function (response) {
                    $("#describe-image").remove();
                    $("#progressbarDiv3").append('<img id="describe-image"  src="../database/images/'+response+'" />');
                    console.log(response);
                    audio_file = "";
                }
            });
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
            window.history.pushState({ path: newurl }, '', newurl);
            var url = new URL(window.location.href);
            var crr_question = url.searchParams.get("question");
            document.getElementById("crr_question").value = crr_question;
            if(type == 'describe-image'){
                window.clearInterval(downloadTimer);
                document.getElementById("recordedAudio3").style.display = "none";
                document.getElementById("counter_text3").innerHTML = "Recording <span style='color: red'>will start in... </span><span id='timeleft3'></span>";
                document.getElementById("progressbarDiv3").style.display ="block";
                timer();
            }
        }

        //re-tell lecture function
        function re_tell_lecture(){
            var remaining_time = hour+":"+min+":"+timeleft;
            var que = $("#crr_question").val(); 
            type = 're-tell-lecture';
            q+=1;
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: {que: que, test_no:test_no, audio: audio_file,remaining_time:remaining_time},
                success: function (response) {
                    $("#audioFile4").remove();
                    if(response.type == 'audio'){
                        document.getElementById("p1q4").style.marginLeft = "-92px";
                        $("#progressbarDiv4").append('<audio controls controlsList="nodownload" id="audioFile4"><source src=../database/audio/'+response.data+'></audio>');
                    }
                    if(response.type == 'video'){
                        document.getElementById("p1q4").style.marginLeft = "-83px";
                        $("#audioFile4").remove();
                        $("#progressbarDiv4").append('<video controls controlsList="nodownload" style="margin-top:20px;" id="audioFile4" width=600><source src=../database/video/'+response.data+'></video>');
                    }
                    audio_file = "";
                }
            });
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
            window.history.pushState({ path: newurl }, '', newurl);
            var url = new URL(window.location.href);
            var crr_question = url.searchParams.get("question");
            document.getElementById("crr_question").value = crr_question;
            if(type == 're-tell-lecture'){
                window.clearInterval(downloadTimer);
                document.getElementById("recordedAudio4").style.display = "none";
                document.getElementById("counter_text4").innerHTML = "Audio/ Video <span style='color: red'>will start in... </span><span id='timeleft4'></span>";
                document.getElementById("progressbarDiv4").style.display ="block";
                timer();
            }
        }

        function short_question(){
            var remaining_time = hour+":"+min+":"+timeleft;
            var que = $("#crr_question").val(); 
            type = 'answer-short-question';
            q+=1;
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {que: que, test_no:test_no, audio: audio_file,remaining_time:remaining_time},
                success: function (response) {
                    $("#audioFile5").remove();
                    $("#progressbarDiv5").append('<audio controls controlsList="nodownload" id="audioFile5" ><source src=../database/audio/'+response+'></audio>');
                    console.log(response);
                    audio_file = "";
                }
            });
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
            window.history.pushState({ path: newurl }, '', newurl);
            var url = new URL(window.location.href);
            var crr_question = url.searchParams.get("question");
            if(crr_question>=39){
                var remaining_time = hour+":"+min+":"+timeleft;
                window.location.replace("writing.php?question="+ques+"&test_no="+test_no+"&non_timer=1&remaining_time="+remaining_time);
            }            
            document.getElementById("crr_question").value = crr_question;
            if(type == 'answer-short-question'){
                window.clearInterval(downloadTimer);
                document.getElementById("recordedAudio5").style.display = "none";
                document.getElementById("counter_text5").innerHTML = "Audio <span style='color: red'>will play in... </span><span id='timeleft5'></span>";
                document.getElementById("progressbarDiv5").style.display ="block";
                timer();
            }
           
        }

        //recording save to temp file
        function sendToServer(blob,name='recordedAudio1'){
            var formData = new FormData();
            formData.append(name,blob);
            $.ajax({
              url: 'ajax.php',
              type:'post',      
              data: formData,
              contentType:false,
              processData:false,
              cache:false,
              success: function(data){
                audio_file = data;
              }
            });  
        }
    </script>
    <script type="text/javascript">
    var recAud= "recordedAudio1";
        if (navigator.getUserMedia) {
            var constraints = {
                audio: true
            };
            var chunks = [];
            var onSuccess = function(stream) {
                var mediaRecorder1 = new MediaRecorder(stream);
                var mediaRecorder2 = new MediaRecorder(stream);
                var mediaRecorder3 = new MediaRecorder(stream);
                var mediaRecorder4 = new MediaRecorder(stream);
                var mediaRecorder5 = new MediaRecorder(stream);
                document.getElementById("startRecord1").onclick = function() {
                    if(mediaRecorder1.state == "recording"){
                        mediaRecorder1.stop();
                    }
                    mediaRecorder1.start();
                }
                document.getElementById("startRecord2").onclick = function() {
                    if(mediaRecorder2.state == "recording"){
                        mediaRecorder2.stop();
                    }
                    mediaRecorder2.start();
                }
                document.getElementById("startRecord3").onclick = function() {
                    if(mediaRecorder3.state == "recording"){
                        mediaRecorder3.stop();
                    }
                    mediaRecorder3.start();
                }
                document.getElementById("startRecord4").onclick = function() {
                    if(mediaRecorder4.state == "recording"){
                        mediaRecorder4.stop();
                    }
                    mediaRecorder4.start();
                }
                document.getElementById("startRecord5").onclick = function() {
                    if(mediaRecorder5.state == "recording"){
                        mediaRecorder5.stop();
                    }
                    mediaRecorder5.start();
                }
                
                
                
                document.getElementById("stopRecord1").onclick = function() {
                    mediaRecorder1.stop();
                }
                document.getElementById("stopRecord2").onclick = function() {
                    mediaRecorder2.stop();
                }
                document.getElementById("stopRecord3").onclick = function() {
                    mediaRecorder3.stop();
                }
                document.getElementById("stopRecord4").onclick = function() {
                    mediaRecorder4.stop();
                }
                document.getElementById("stopRecord5").onclick = function() {
                    mediaRecorder5.stop();
                }



                mediaRecorder1.onstop = function(e) {
                    recordedAudio1.controls = true;
                    var blob = new Blob(chunks, {
                        'type': 'audio/ogg; codecs=opus'
                    });
                    chunks = [];
                    var audioURL = window.URL.createObjectURL(blob);
                    recordedAudio1.src = audioURL;
                    sendToServer(blob);
                }
                mediaRecorder2.onstop = function(e) {
                    recordedAudio2.controls = true;
                    var blob = new Blob(chunks, {
                        'type': 'audio/ogg; codecs=opus'
                    });
                    chunks = [];
                    var audioURL = window.URL.createObjectURL(blob);
                    recordedAudio2.src = audioURL;
                    sendToServer(blob);
                }
                mediaRecorder3.onstop = function(e) {
                    recordedAudio3.controls = true;
                    var blob = new Blob(chunks, {
                        'type': 'audio/ogg; codecs=opus'
                    });
                    chunks = [];
                    var audioURL = window.URL.createObjectURL(blob);
                    recordedAudio3.src = audioURL;
                    sendToServer(blob);
                }
                mediaRecorder4.onstop = function(e) {
                    recordedAudio4.controls = true;
                    var blob = new Blob(chunks, {
                        'type': 'audio/ogg; codecs=opus'
                    });
                    chunks = [];
                    var audioURL = window.URL.createObjectURL(blob);
                    recordedAudio4.src = audioURL;
                    sendToServer(blob);
                }
                mediaRecorder5.onstop = function(e) {
                    recordedAudio5.controls = true;
                    var blob = new Blob(chunks, {
                        'type': 'audio/ogg; codecs=opus'
                    });
                    chunks = [];
                    var audioURL = window.URL.createObjectURL(blob);
                    recordedAudio5.src = audioURL;
                    sendToServer(blob);
                }



                mediaRecorder1.ondataavailable = function(e) {
                    chunks.push(e.data);
                }
                mediaRecorder2.ondataavailable = function(e) {
                    chunks.push(e.data);
                }
                mediaRecorder3.ondataavailable = function(e) {
                    chunks.push(e.data);
                }
                mediaRecorder4.ondataavailable = function(e) {
                    chunks.push(e.data);
                }
                mediaRecorder5.ondataavailable = function(e) {
                    chunks.push(e.data);
                }
            }
            var onError = function(err) {
                console.log('The following error occured: ' + err);
            }
            navigator.getUserMedia(constraints, onSuccess, onError);
        } else {
            console.log('getUserMedia not supported on your browser!');
        }
        function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
        $(document).on("keydown", disableF5);
    </script>
    
<script src="../plugins/table/datatable/datatables.js"></script>  
<script src="../plugins/highlight/highlight.pack.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY STYLES -->
<script src="../assets/js/scrollspyNav.js"></script>
<script src="../plugins/countdown/jquery.countdown.min.js"></script>
</body>
</html>

