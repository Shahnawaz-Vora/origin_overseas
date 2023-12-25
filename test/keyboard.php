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
    <title>Keyboard Check | PTE Materials | Origin Overseas | PTE Tutors </title>
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
                                        <div class=" font-weight-bold" style="color:black;font-size: 3em;margin-left: 80px;margin-top: -40px">Keyboard Check</div><br><br>
                                            <div class="card-body" style="margin-top: -45px">
                                            <ul style="list-style-type: none;">
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px">Look at the top row of letter on the keyboard.   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
                                                </p>
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px">The letter should appear in the order of QWERTY</li>
                                                </p>
                                                <p style="line-height: 1.5;">
                                                    <li style="font-size: 1.2em;color:black;font-family: nunito"> <img src="../assets/img/arrow.svg" style="height: 11px;padding-right:10px">If you do not see QWERTY then please change the keyboard</li>
                                                </p>
                                            </ul>
                                            <br>
                                            <div align="center" class="mt-4" style="margin-left: -650px;">
                                                <?php
                                                if(isset($_GET['testno']) && isset($_GET['question']))
                                                {
                                                    $test_no = $_GET['testno'];
                                                    $question = $_GET['question'];
                                                    if($question <= 7 && $question > 0)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='speaking.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=read-aloud&section=speaking&non_timer=1'>Next</button>
                                                        <?php
                                                    }
                                                    if($question > 7 && $question <= 17)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='speaking.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=repeat-sentence&section=speaking&non_timer=1'>Next</button>
                                                        <?php
                                                    }
                                                    if($question > 17 && $question <= 24)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='speaking.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=describe-image&section=speaking&non_timer=1'>Next</button>
                                                        <?php
                                                    }
                                                    if($question > 24 && $question <= 28)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='speaking.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=re-tell-lecture&section=speaking&non_timer=1'>Next</button>
                                                        <?php
                                                    }
                                                    if($question > 28 && $question <= 38)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='speaking.php?testno=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=answer-short-question&section=speaking&non_timer=1'>Next</button>
                                                        <?php
                                                    }
                                                    if($question > 38 && $question <= 41)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='writing.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=summarize-written-text&section=writing&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question == 42)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='writing.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=essay&section=writing&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 42 && $question <= 44)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='reading.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=single-answer&section=reading&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 44 && $question <= 46)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='reading.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=multiple-answer&section=reading&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 46 && $question <= 49)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='reading.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=reorder-paragraph&section=reading&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 49 && $question <= 54)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='reading.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=fill-in-the-blanks&section=reading&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 54 && $question <= 60)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='reading.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=reading-writing-fill-in-the-blanks&section=reading&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 60 && $question <= 63)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=summarize-spoken-text&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 63 && $question <= 65)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=multiple-answers&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 65 && $question <= 68)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=fill-in-the-blanks&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 68 && $question <= 70)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=highlight-correct-summary&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 70 && $question <= 72)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=single-answer&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 72 && $question <= 74)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=select-missing-word&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 74 && $question <= 77)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=highlight-incorrect-words&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question > 77 && $question <= 81)
                                                    {
                                                        ?>
                                                        <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='listening_section.php?test_no=<?php echo $test_no; ?>&question=<?php echo $question; ?>&type=write-from-dictation&section=listening&temp=1&resume=1&non_timer=1'>Next</button>
                                                        <?php   
                                                    }
                                                    if($question >= 82)
                                                    {
                                                        ?><script type="text/javascript">window.close();</script><?php
                                                    }
                                                }
                                                else
                                                {
                                                    $test_no = $_GET['testno'];
                                                    ?>
                                                    <button class="btn btn-rounded btn-outline-info" type="button" onclick=location.href='speaking.php?testno=<?php echo $test_no; ?>&non_timer=1'>Next</button>
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
        <img src="../assets/img/keyboard.png" alt="headphone" style="margin-left: 55%;z-index:1;margin-top: -30%;width: 50%;height:50%"  align="right">
        <img src="../assets/img/logo.png" alt="headphone" style="margin-left: 0;z-index:1;margin-top: -10%;width: 22%;height:22%"  align="right">
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