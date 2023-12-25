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
if (!isset($_GET['resume']) && isset($_GET['question']) && isset($_GET['test_no']))
{
    $type = "summarize-written-text";
    $section = 'writing';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question' and section='writing'";
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
        
    </script><?php
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
}
if(isset($_GET['resume']) && isset($_GET['question']))
{
    $type = "summarize-written-text";
    $section = 'writing';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question;
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='writing'";
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
    <title>Writing: Summarize Written Text | Origin Overseas - PTE tutors </title>
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
    <link href="../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/animate/animate.css">
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        var hour=0;
        var min=44;
        var timeleft=60;
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
                        isPaused = false;
                    }
            });
        }
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
                            <div class="statbox widget box box-shadow" id="p2q1" style="width: 115%;margin-left: -83px;margin-top:-10px"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Read the passage below and summarize it using one sentence. Type your response in the box at the bottom of the screen. You have 10 minutes to finish this task. Your response will be judged on the quality of your writing and on how well your response presents the key points in the passage.</p>
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
                                                                    <textarea rows="6" cols="135" class="form-control mb-2" id="text" name="answer"></textarea>
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
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">1</span>  of 4</button>
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
            que = q -1;
            answer = $("#text").val();
            document.getElementById("question_number").innerHTML = q;
            wordCount = $("#wordCount").html();
            if(que >= 1 && que <= 3)
            {
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {summarize_writing_que: que,type: type,test_no:test_no,answer:answer,remaining_time: remaining_time,word_count:wordCount,section:"writing"},
                    success: function (response) {
                        $("#questiontext").remove();
                        $("#answer_block").prepend('<h6 class="mb-4 ml-3 widget-header text-justify" style="line-height: 28px;color: black" id = "questiontext">'+response+'</h6>');
                        answer = "";
                        $("#text").val(" ");
                    }
                });
                que_inc = que+1;
            }
            if(que_inc == 4)
            {
                var remaining_time = hour+":"+min+":"+timeleft;
                window.location.replace("writing_essay.php?question="+que_inc+"&test_no="+test_no+"&continue=1&remaining_time="+remaining_time);
            }
            isPaused = false;
        }
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
