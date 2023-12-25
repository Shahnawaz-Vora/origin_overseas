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
    <title>Speaking | PTE Materials | Origin Overseas | PTE Tutors </title>
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
                                        <div class=" font-weight-bold text-center" style="color:black;font-size: 3em;margin-top: -40px;">Speaking Section       &nbsp;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
                                        <table class="table table-responsive table-bordered text-dark" align="center" style="width: 80%;margin-top:-30px;border-radius: 10px;" >
                                            <tr>
                                                <th style="font-size:1.4em;color:#0169ba;padding-right: 110px;">Section</th>
                                                <th colspan="2" style="font-size:1.4em;color:#0169ba;padding-right: 400px;">Question Type</th>
                                                <th style="font-size:1.4em;color:#0169ba;padding-right: 92px;">Time Allowed</th>
                                            </tr>
                                            <tr>
                                                <td rowspan="5" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;"><b>Section 1</b></td>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Read Aloud</td>
                                                <td rowspan="5" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">30-35 minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Repeat Sentence</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Describe Image</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Re-tell Lecture</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Answer short question</td>
                                            </tr>
                                        </table>
                                        <div align="center" class="mt-4 mb-2">
                                            <?php
                                            $test_no = $_GET['testno'];
                                            if(isset($_GET['testno']) && isset($_GET['question']) && isset($_GET['type']) && isset($_GET['section']) )
                                            {
                                                $type = $_GET['type'];
                                                $question = $_GET['question'];
                                                if($type == 'read-aloud')
                                                {
                                                    ?><button class="btn btn-rounded btn-info" type="button" onclick=location.href='speaking_section.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=<?php echo $type; ?>&resume=1&non_timer=0'>Next</button>
                                                    <?php
                                                }
                                                else if($type == 'repeat-sentence')
                                                {
                                                   ?><button class="btn btn-rounded btn-info" type="button" onclick=location.href='speaking_section.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=<?php echo $type; ?>&resume=1&non_timer=0'>Next</button>
                                                    <?php 
                                                }
                                                else if($type == 'describe-image')
                                                {
                                                   ?><button class="btn btn-rounded btn-info" type="button" onclick=location.href='speaking_section.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=<?php echo $type; ?>&resume=1&non_timer=0'>Next</button>
                                                    <?php 
                                                }
                                                else if($type == 're-tell-lecture')
                                                {
                                                   ?><button class="btn btn-rounded btn-info" type="button" onclick=location.href='speaking_section.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=<?php echo $type; ?>&resume=1&non_timer=0'>Next</button>
                                                    <?php 
                                                }
                                                else if($type == 'answer-short-question')
                                                {
                                                   ?><button class="btn btn-rounded btn-info" type="button" onclick=location.href='speaking_section.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=<?php echo $type; ?>&resume=1&non_timer=0'>Next</button>
                                                    <?php 
                                                }
                                            }
                                            else
                                                {
                                                    ?>
                                                    <button class="btn btn-rounded btn-info" type="button" onclick=location.href='speaking_section.php?testno=<?php echo $test_no; ?>&question=1&non_timer=0' style="padding: 7px 50px 7px 50px;">Next</button>
                                                    <?php
                                                }
                                            ?>
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
        function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
        $(document).on("keydown", disableF5);
    </script>
    <script src="../plugins/highlight/highlight.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>