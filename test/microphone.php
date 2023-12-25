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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Microphone Check | PTE Materials | Origin Overseas | PTE Tutors </title>
    <meta name="description" content="Free PTE Materials">
    <meta name="keywords" content="Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <meta name="author" content="John Doe">

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">
    <link href="../plugins/pricing-table/css/component.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
   
    <!--  END CUSTOM STYLE FILE  -->
    
    <style type="text/css">
        .card-body > ul > li > a {
            color:black;
        }
        .card-body > ul > li > a:hover {
            color:blue;
        }
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
    
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once 'navbar.php';
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        <!--  BEGIN CONTENT AREA  -->
        <div id="" class="main-content"  style="margin-top: 90px">
            <div class="col-xl-12" >
                <div class="container" >
                    <div class="row ">
                        <div class="col-lg-12 col-12"  >
                            <div class="statbox widget box box-shadow" style="width:115%;margin-left:-10px">
                                <div class="widget-content widget-content-area" style="border-radius: 10px">
                                    <div class=" mt-5 text-left text-dark">
                                        <div class=" font-weight-bold" style="color:black;font-size: 3em;margin-left: 80px;margin-top: -40px">Microphone Check</div><br><br>
                                            <div class="card-body" style="margin-top: -45px">
                                            <ul style="list-style-type: none;">
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px"> Make sure you allow the access when the pop up is asking for allowing the microphone. If incase You disabled it for this site enable it.</li>
                                                </p>
                                                <p style="line-height: 1.5;" >
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px"> Make sure your headset is on, and your microphone is in the downward position near your mouth.</li>
                                                </p>
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px"> When you are ready, click on the Record button to say “Testing testing, one two three” into the microphone.</li>
                                                </p>
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px"> Now click on the Playback button. You should clearly hear yourself speaking.</li>
                                                </p>
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px"> During the exam, you will not get Record and Playback button. Recording will automatically start.</li>
                                                </p>
                                            </ul>
                                            <br>
                                            <div align="center" style="margin-left: -600px">
                                                    <audio id=recordedAudio style="margin-left:80px;margin-bottom:20px;border:solid #9c9c9c9c 1px;border-radius: 25px"></audio>
                                                    <div style="margin-left: 90px">
                                                        <button class="btn btn-rounded btn-outline-success" id=startRecord>Record</button>
                                                        <button class="btn btn-rounded btn-outline-danger ml-2" id=stopRecord disabled>Playback</button>
                                                    </div>
                                            </div>
                                            <div align="left" class="mt-3" style="margin-left: 300px;">
                                                <?php
                                                if(isset($_GET['testno']) && isset($_GET['question']))
                                                {
                                                    $test_no = $_GET['testno'];
                                                    $question = $_GET['question'];
                                                    ?>
                                                    <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='keyboard.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&non_timer=1'>Next</button>
                                                    <?php
                                                }
                                                else
                                                {
                                                    $test_no = $_GET['testno'];
                                                    ?>
                                                    <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='keyboard.php?testno=<?php echo $test_no; ?>&non_timer=1'>Next</button>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
        <img src="../assets/img/headphone.png" alt="headphone" style="margin-left: 75%;margin-top: -30%;z-index:1;width: 20%;height:20%"  align="right">
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
        var section=0;
    </script>
    <script type="text/javascript">
        var audioChunks;
        startRecord.onclick = e => {
            let device = navigator.mediaDevices.getUserMedia({ audio:true });
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
                    recordedAudio.src =URL.createObjectURL(blob);
                    recordedAudio.controls=true;
                    recordedAudio.autoplay=true;
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
        function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
        $(document).on("keydown", disableF5);
    </script>
    <script src="../plugins/highlight/highlight.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>