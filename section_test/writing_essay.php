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
include_once '../database/dbh.inc.php';
if (isset($_GET['question']) && isset($_GET['test_no']))
{
    $type = "essay";
    $section = 'writing';
    $test_no = $_GET['test_no'];
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no=1 and section='writing'";
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
    </script><?php
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
}
?>
<script type="text/javascript">
    var section = "writing";
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Writing: Essay | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../plugins/animate/animate.css">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-countdown.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
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
                        console.log(response);
                        var obj = JSON.parse(response);
                        hour = obj.hour;
                        min= obj.min;
                        timeleft=obj.sec;
                        isPaused = false;
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
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow" id="p2q2" style="width: 115%;margin-left: -83px;margin-top:-10px"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> You will have 20 minutes to plan, write and revise an essay about the topic below. Your response will be judged on how well you develop a position, organize your ideas, present supporting details, and control the elements of standard written English. You should write 200-300 words.</p>
                                </div>
                                <div class="row" style="margin-top: -435px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-content widget-content-area">
                                            <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                <div class="tab-content" id="icon-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                                        <h6 class="mb-4 widget-header text-justify" style="line-height: 28px;color: black" id = "questiontext">
                                                        <?php echo stripslashes($row['questionText']); ?></h6>    
                                                        <div class="row" id = "answer_block">
                                                            <div class="col-xl-12">
                                                                <div class="form-group ">
                                                                    <textarea rows="8" cols="135" class="form-control mb-2" id="text" name="answer"></textarea>
                                                                </div>
                                                                <div align="left" hidden="">Words: <span id="wordCount">0</span></div><br><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: -80px;">
                                    <div class="row ">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">4</span>  of 4</button>
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
                </div>
            </div>
        </div>
        <input value="39" name="question" type="hidden" id="crr_question">
        <!-- footer -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script type="text/javascript">
        var url = new URL(window.location.href);
        var crr_question = url.searchParams.get("question");
        document.getElementById("crr_question").value = crr_question;
        var q = crr_question;
        function pageInc(){
            isPaused = true;
            var remaining_time = hour+":"+min+":"+timeleft;
            q++;
            $("#crr_question").val(q); 
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
            window.history.pushState({ path: newurl }, '', newurl);
            que = q + 2;
            answer = $("#text").val();
            wordCount = $("#wordCount").html();
            if(que == 4 )
            {
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {summarize_writing_que: que,type: type,test_no:test_no,answer:answer,remaining_time: remaining_time,word_count:wordCount,section:'writing'},
                    success: function (response) {
                        $("#questiontext").remove();
                        $("#answer_block").prepend('<h6 class="mb-4 widget-header text-justify" style="line-height: 28px;color: black" id = "questiontext">'+response+'</h6>');
                    }
                });
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
                // window.location.replace("reading.php?question="+que_inc+"&test_no="+test_no+"&non_timer=1&remaining_time="+remaining_time);
            }
        }
        isPaused = false;
    </script>
    <script type="text/javascript">
        counter = function() {
        var value = $('#text').val();
        if (value.length == 0) {
            $('#wordCount').html(0);
            $('#totalChars').html(0);
            $('#charCount').html(0);
            $('#charCountNoSpace').html(0);
            return;
        }
        var regex = /\s+/gi;
        var wordCount = value.trim().replace(regex, ' ').split(' ').length;
        var totalChars = value.length;
        var charCount = value.trim().length;
        var charCountNoSpace = value.replace(regex, '').length;

        $('#wordCount').html(wordCount);
        $('#totalChars').html(totalChars);
        $('#charCount').html(charCount);
        $('#charCountNoSpace').html(charCountNoSpace);
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
    function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
    $(document).on("keydown", disableF5);
    </script>
</body>
</html>
