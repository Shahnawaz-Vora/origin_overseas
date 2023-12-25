<?php 
$active="2";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Repeat sentence | Origin overseas - pte tutors </title>
    <title>Speaking: Repeat sentence | Free Materials | PTE Materials | Origin Overseas | PTE Tutors </title>
    <meta name="description" content="Free PTE Material for Speaking section's Repeat sentence questions">
    <meta name="keywords" content="Speaking PTE Questions, Speaking questions, Speaking practices, model Speaking question, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FQKPT0PS9K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FQKPT0PS9K');
        // stop right click
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <link href="../../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../plugins/animate/animate.css">
    <style>   
        .blockui-growl-message {
            display: none;
            text-align: left;
            padding: 15px;
            background-color: #455a64;
            color: #fff;
            border-radius: 3px;
        }
        .blockui-animation-container { display: none; }
        .multiMessageBlockUi {
            display: none;
            background-color: #455a64;
            color: #fff;
            border-radius: 3px;
            padding: 15px 15px 10px 15px;
        }
        .multiMessageBlockUi i { display: block }
    </style>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/custom-countdown.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
     <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <div id="load_screen"> <div class="loader"> <div class="loaer-contdent">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
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
                                <li class="breadcrumb-item"><a href="../materials.php;">Material</a></li>
                                <li class="breadcrumb-item"><span>Speaking</span></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Repeat Sentence</span></li>
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

        <!--  BEGIN SIDEBAR  -->
        <?php
            include_once 'sidebar.php';
        ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
            
                <div class="container">

                    <div class="row layout-top-spacing">

                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <?php
                                    include_once 'pills_dropdown.php';
                                     include '../../database/dbh.inc.php';

                                    if (isset($_GET['question'])) {
                                        $question_id = $_GET['question'];
                                        $_SESSION['repeat-sentence-id'] = $question_id;
                                        $_SESSION['repeat-sentence-num'] = $_GET['number'];
                                        $sql="SELECT * FROM material_speaking WHERE type='repeat-sentence' and speakingMaterialId='$question_id'";
                                        ?><script>
                                            var queryParams = new URLSearchParams(window.location.search);
                                            queryParams.delete("question");queryParams.delete("number");
                                            history.pushState(null, null, "?"+queryParams.toString());
                                        </script><?php
                                    }else{
                                        if (isset($_SESSION['repeat-sentence-id'])) {
                                            $question_id = $_SESSION['repeat-sentence-id'];
                                            $sql="SELECT * FROM material_speaking WHERE type='repeat-sentence' and speakingMaterialId='$question_id'";
                                        }else{
                                            $sql="SELECT * FROM material_speaking WHERE type='repeat-sentence' ";
                                        }
                                    }
                                    $result = mysqli_query($conn, $sql);
                                    $tot_row = mysqli_num_rows($result);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <hr style="height: 1px;background: #bfc9d4;padding: 0px;margin:0px; margin-top: -20px">
                                <div class="text-center widget-content widget-content-area  " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold">
                                    <p class="mb-4"><span style="color: red">Note:</span> You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</p>
                                </div>
                                <div class="row" style="margin-top: -95px">
                                    <div class="col-xl-12 text-center mt-5">
                                       <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text">Audio  <span style="color: red">Beginning in </span><span id="timeleft"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area ">
                                                <center id="progressbarDiv">
                                                    <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </center>
                                                
                                                <audio controls id="audioFile" style="width: 220px;">
                                                    <source src="../../database/audio/<?php echo $row['audio'] ?>" >
                                                </audio>
                                                
                                                <div class="container-fluid">
                                                    <button id=startRecord hidden="true">start</button>
                                                    <button id=stopRecord disabled hidden="true">stop</button>
                                                    <center><audio style="width: 220px;" id=recordedAudio></audio></center>
                                                    <a id=audioDownload hidden="true"></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                        <!--  bottom row start -->
                                        <div class="row mt-4" >
                                            <!--Buttons left side start -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3 " align="left">
            
                                                <button type="button" class="btn " style="background-color: #e63f49;color: white;" onclick="resetdata();" id="reset">Reset</button>
                                                <button type="button" class="btn" style="background-color: #83bb2f;color: white;" data-toggle="modal" data-target="#exampleModal1" id="answer">Answer</button>
                                            </div>
                                            <!-- Button left side end -->


                                            <!-- Pagination start -->
                                            <?php
                                                if (isset($_SESSION['repeat-sentence-num'])) {
                                                    $pageNo = indexes($_SESSION['repeat-sentence-num']);
                                                    // print_r($pageNo);
                                                }else{
                                                    $pageNo = indexes(1);
                                                    $_SESSION['repeat-sentence-num'] = "1";
                                                    // echo $pageNo;
                                                }
                                            ?>  
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3" style="margin-top: -3px;">
                                                <div class="pagination-no_spacing">
                                                    <ul class="pagination">
                                                        <?php
                                                            
                                                                if($pageNo[1]==$_SESSION['repeat-sentence-num']){ 
                                                                    echo '
                                                                    <li>
                                                                        <a class="prev">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                                                        </a>
                                                                    </li>
                                                                    ';
                                                                    echo '<li><a class="active">'.$pageNo[1].'</a></li>';
                                                                }else{
                                                                    echo '
                                                                    <li>
                                                                        <a href="repeat_sentence.php?question='.$pageNo[0].'&number='.$pageNo[1].'" class="prev">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                                                        </a>
                                                                    </li>
                                                                    ';
                                                                    echo '<li><a href="repeat_sentence.php?question='.$pageNo[0].'&number='.$pageNo[1].'">'.$pageNo[1].'</a></li>';
                                                                }
                                                            
                                                        
                                                            if ($pageNo[3] == $_SESSION['repeat-sentence-num']) {
                                                                echo '
                                                                <li><a class="active" >'.$pageNo[3].'</a></li>
                                                                ';
                                                            }else{
                                                                echo '
                                                                <li><a href="repeat_sentence.php?question='.$pageNo[2].'&number='.$pageNo[3].'">'.$pageNo[3].'</a></li>
                                                                ';
                                                            }
                                                            
                                                        
                                                            if ($pageNo[4] != "") {
                                                                if($pageNo[5]==$_SESSION['repeat-sentence-num']){
                                                                    echo '<li><a href="repeat_sentence.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="active">'.$pageNo[5].'</a></li>';
                                                                }else{
                                                                    echo '<li><a href="repeat_sentence.php?question='.$pageNo[4].'&number='.$pageNo[5].'">'.$pageNo[5].'</a></li>';
                                                                }
                                                                echo '
                                                                <li>
                                                                    <a href="repeat_sentence.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="next">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                    </a>
                                                                </li>
                                                                ';
                                                            }else{
                                                                echo '<li></li>';
                                                                echo '
                                                                <li>
                                                                    <a class="next">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                                    </a>
                                                                </li>
                                                                ';
                                                            }
                                                        

                                                        ?>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Pagination end -->

                                            <!-- Button right side start -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" align="right">
                                                <div class="dropup" >
                                                    <button type="button" class="btn btn-dark ml-auto" style="background-color: #181c1f" data-toggle="modal" data-target="#exampleModal" id="transcript">Transcript</button>
                                                    <button class="btn dropdown-toggle btn-info" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropbtn">
                                                     <?php
                                                    include_once '../../database/dbh.inc.php';
                                                    $sql1="SELECT * FROM material_speaking WHERE type='repeat-sentence' ";
                                                    $result1 = mysqli_query($conn, $sql1);
                                                    $tot_row1 = mysqli_num_rows($result1);
                                                    echo $_SESSION['repeat-sentence-num']; 
                                                    ?>
                                                    of 
                                                    <?php echo $tot_row1 ?>
                                                    </button>
                                                    
                                                        <div class="dropdown-menu dd-menu">
                                                            <div class="row no-gutters">

                                                                <?php
                                                                $i = 1;
                                                                while($row1 = mysqli_fetch_assoc($result1)) { 
                                                                    if ($pageNo[1] == $i) {
                                                                    echo '
                                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 " >
                                                                        <a href="repeat_sentence.php?question='.$row1['speakingMaterialId'].'&number='.$i.'">
                                                                            <div class="dropdown-item dd-item"><div class="circle text-center" style="background-color:#007bff45"><p style="margin-top:-1px;">'.$i.'</p></div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    ';    
                                                                    }else{    
                                                                    echo '
                                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 " >
                                                                        <a href="repeat_sentence.php?question='.$row1['speakingMaterialId'].'&number='.$i.'">
                                                                            <div class="dropdown-item dd-item"><div class="circle text-center"><p style="margin-top:-1px;">'.$i.'</p></div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    ';
                                                                    }
                                                                    $i++;    
                                                                }
                                                                ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button right side end -->
                                        </div> 
                                        <!--  bottom row end -->
                                    </div>
                                </div>
                                
                            </div>
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
        <!-- Modal -->
    <div class="modal animated fadeInUp" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transcript</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text"><?php echo $row['transcript']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
         <!-- Modal -->
    <div class="modal animated fadeInUp" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Correct Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text"><?php echo stripslashes($row['answer']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
     <!-- php pagination function -->
     <?php
        function indexes($value){
            include '../../database/dbh.inc.php';
            $query ="SELECT * FROM material_speaking WHERE type='repeat-sentence' ";
            $res = mysqli_query($conn, $query);
            $indexes = []; 
            while($val = mysqli_fetch_assoc($res)) { 
                array_push($indexes, $val['speakingMaterialId']);
            }
            $crr = $value-1;
            $ind = [];

            if (isset($indexes[$crr-1])) {
                array_push($ind, $indexes[$crr-1]);
                array_push($ind, $value-1);
                array_push($ind, $indexes[$crr]);
                array_push($ind, $value);
                if (isset($indexes[$crr+1])) {
                    array_push($ind, $indexes[$crr+1]);
                    array_push($ind, $value+1);
                }else{
                    array_push($ind,"");
                    array_push($ind,"");
                }
            }else{
                array_push($ind, $indexes[$crr]);
                array_push($ind, $value);
                if (isset($indexes[$crr+1])) {
                    array_push($ind, $indexes[$crr+1]);
                    array_push($ind, $value+1);
                    if (isset($indexes[$crr+2])) {
                        array_push($ind, $indexes[$crr+2]);
                        array_push($ind, $value+2);
                    }else{
                        array_push($ind,"");
                        array_push($ind,"");
                    }
                }else{
                    array_push($ind,"");
                    array_push($ind,"");
                }
            }
            return $ind;
        }
    ?>
    <!-- pagination end -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
            
        });
    </script>
    <script type="text/javascript">
        let device = navigator.mediaDevices.getUserMedia({ audio:true });
        timer();
        function resetdata(){
            $(function() {
                $.blockUI({
                    message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin no-edge-top"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
                    fadeIn: 800, 
                    timeout: 1000, //unblock after 2 seconds
                    overlayCSS: {
                        backgroundColor: '#1b2024',
                        opacity: 0.8,
                        zIndex: 1200,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        color: '#fff',
                        zIndex: 1201,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                });
            });
            window.clearInterval(downloadTimer);
            document.getElementById("recordedAudio").style.display = "none";
            document.getElementById("counter_text").innerHTML = "Recording <span style='color: red'>will start in... </span><span id='timeleft'></span>";
            document.getElementById("progressbarDiv").style.display ="block";
            document.getElementById("audioFile").pause();
            document.getElementById("audioFile").currentTime = 0;
            timer();
        }
        function timer() {
            var timeleft = 5;
            var pass = 0;
            var y;   
            var click = 0;
            window.downloadTimer = setInterval(function(){
            if(timeleft <= -1){
                if (pass == 2) {
                    clearInterval(downloadTimer);
                    document.getElementById("counter_text").innerHTML = "Recording <span style='color:red'>complete</span>";
                    document.getElementById("progressbarDiv").style.display ="none";
                    document.getElementById("stopRecord").click();
                    document.getElementById("recordedAudio").style.display = "block";
                }else if(pass == 1){
                    // var audio = new Audio('../../audio/beep.mp3');
                    // audio.play();
                    timeleft=10;
                    document.getElementById("startRecord").click();
                    // document.getElementById("audioFile").style.visibility ="hidden";
                    // document.getElementById("counter_text").innerHTML = "<span style='color:red'>Recording</span> has Started... <span id='timeleft'></span>/10";
                    document.getElementById("counter_text").innerHTML = "<span style='color:transparent'><span id='timeleft'></span>";
                    pass = 2;
                }else{
                    var x = Math.ceil(document.getElementById("audioFile").duration);
                     if(isNaN(x))
                    {
                        location.reload();
                    }
                    document.getElementById("audioFile").play();
                    document.getElementById("counter_text").innerHTML = "Audio<span style='color:red'> is playing... </span><span id='timeleft'></span>";
                    timeleft=x;
                    y=x;
                    pass = 1;
                }
                document.getElementById("progressbar").style.width = "100%" ;
                document.getElementById("timeleft").innerHTML = timeleft ;
                    
            } else {
                if (pass == 0) {
                    var per = (timeleft/.05)+"%";
                }else if (pass == 1) {
                    var per = ((timeleft*100)/y)+"%";
                }else if (pass == 2) {
                    var per = (timeleft/.1)+"%";
                }else{    
                    var per = "100%";
                }
                document.getElementById("progressbar").style.width = per ;
                document.getElementById("timeleft").innerHTML = timeleft ;
            }
            timeleft -= 1;
            
            }, 1000);    
        }
        
    </script>
    <script type="text/javascript">
        var audioChunks;
        startRecord.onclick = e => {
          startRecord.disabled = true;
          stopRecord.disabled=false;
          // This will prompt for permission if not allowed earlier
          device.then(stream => {
              audioChunks = []; 
              rec = new MediaRecorder(stream);
              rec.ondataavailable = e => {
                audioChunks.push(e.data);
                if (rec.state == "inactive"){
                  let blob = new Blob(audioChunks,{type:'audio/x-mpeg-3'});
                  recordedAudio.src = URL.createObjectURL(blob);
                  recordedAudio.controls=true;
                  recordedAudio.autoplay=true;
                  audioDownload.href = recordedAudio.src;
                  audioDownload.download = 'mp3';
                  audioDownload.innerHTML = 'download';
               }
              }
            rec.start();  
            })
            .catch(e=>console.log(e));
        }
        stopRecord.onclick = e => {
          startRecord.disabled = false;
          stopRecord.disabled=true;
          rec.stop();
        }
        //modal drag
        $('.modal-dialog').draggable();
    </script>
    <script src="../../plugins/table/datatable/datatables.js"></script>
    
    <script src="../../plugins/highlight/highlight.pack.js"></script>
    <script src="../../plugins/blockui/custom-blockui.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/countdown/jquery.countdown.min.js"></script>
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