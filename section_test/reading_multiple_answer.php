<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../student/auth_login.php");
    }
    include_once '../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
    // error_reporting(0);
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FQKPT0PS9K"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FQKPT0PS9K');
    // stop right click
    // document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php
include_once '../database/dbh.inc.php';

if (!isset($_GET['resume']) && isset($_GET['question']) && isset($_GET['test_no']))
{
    $type = "multiple-answers";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question-2;
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='reading'";
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
    </script><?php

}
if(isset($_GET['resume']) && isset($_GET['question']))
{
    $type = "multiple-answers";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question']-2;
    $question_query = $question;
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='reading'";
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
    </script><?php
}
?>
<script type="text/javascript">
    var section = "reading";
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reading: Multiple Chhose, Multiple Answer | Origin Overseas - PTE tutors </title>
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
                        console.log(response)
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
                            <div class="statbox widget box box-shadow" id="p3q2" style="width: 115%;margin-left: -83px;margin-top:-10px"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> Read the text and answer the question by selecting all the correct responses. More than one response is correct.</p>
                                </div>
                                <div class="row" style="margin-top: -435px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-content widget-content-area">
                                            <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                <div class="tab-content" id="icon-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                                        <p style="margin-top: -50px;font-size: 1.2em;color: black" class="mb-3 widget-header text-justify">
                                                            <?php
                                                                echo stripslashes($row['questionText']);
                                                            ?> 
                                                        </p>    
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 layout-top-spacing" style="margin-top: 55px" align="left">
                                                            <h4 id="counter_text"><b>
                                                            <?php
                                                                echo stripslashes($row['question']);
                                                            ?> 
                                                            </b></h4>
                                                        </div>   
                                                        <p style="font-size: 1.1em" id="option_block">
                                                            <div class="n-chk ml-3 ml-3" align="left">
                                                                <?php
                                                                    $x = 'A';
                                                                    $tot_opt = 0;
                                                                    $ans = explode('/*/', $row['answer']);
                                                                    $trueAns =[];
                                                                    $answer = [];
                                                                    for ($i=1; $i <= 8; $i++) {
                                                                        $option = "option".$i;
                                                                        if ($row[$option] != '' || $row[$option] != null) {
                                                                            $tot_opt+=1; 
                                                                            echo '
                                                                            <label class="new-control new-checkbox checkbox-primary" id="'.$x.'">
                                                                                <input type="checkbox" class="new-control-input" name="checkbox" value="'.$x.'">
                                                                                <span class="new-control-indicator"></span>'.$x.'. <span class="text-dark" id="span'.$i.'">'.stripslashes($row[$option]).'</span>
                                                                            </label><br/>
                                                                            ';
                                                                            for ($j=0; $j < count($ans); $j++) { 
                                                                                if ($row[$option] == $ans[$j]) {
                                                                                    array_push($trueAns, stripslashes($row[$option]));
                                                                                    array_push($answer, $x.". ".$row[$option]);
                                                                                }
                                                                            }
                                                                            $x++;
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>                                             
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px;">
                                            <div class="row ">
                                                <div class="col-xl-6" align="left">
                                                    <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                        <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">3</span>  of 18</button>
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
            </div>
        </div>
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
     <script src="../plugins/blockui/custom-blockui.js"></script>
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
</body>
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
        option = document.getElementsByName('checkbox');
        var user_answer="";
        userAns = [];
        var userans="";
        var trueAns = [<?php echo '"'.implode('","', $trueAns).'"' ?>];
        for(var i = 0; i < option.length; i++){
            if(option[i].checked){
                var j = i+1;
                user_answer = $("#span"+j).html() ;
                userAns.push(user_answer);
                seperator= "~~~";
                userans += user_answer + seperator;
            }
        }
        userans = userans.replace(/~~~+$/g,"");
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
                tot_a = <?php echo $tot_opt; ?> ; // 5
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

        document.getElementById("question_number").innerHTML = q;
        
        if(que >= 3 && que<=4)
        {
            console.log(que); //3
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {summarize_writing_que: que,type: type,test_no:test_no,answer:userans,remaining_time: remaining_time,marks:marks,section:"reading"},
                success: function (response) {
                    var obj = JSON.parse(response);
                    $("#icon-pills-home").remove();
                    $("#icon-pills-tabContent").append('<div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab" ><p style="margin-top: -50px;font-size:1.2em;color: black" class="mb-3 widget-header text-justify" style="line-height:0.9em;">'+obj.questiontext+'</p> <div class="col-xl-12 col-md-12 col-sm-12 col-12 layout-top-spacing" style="margin-top: 35px" align="left"><h4 id="counter_text"><b>'+obj.question+'</b></h4></div><p style="font-size: 1.1em" ><div class="n-chk ml-3" align="left" id="option_block" style="line-height:0.1em;">')
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
                                    $("#option_block").append('<label class="new-control new-checkbox checkbox-primary" id="'+x+'"><input type="checkbox" class="new-control-input" name="checkbox" value="'+x+'"><span class="new-control-indicator">'+' '+x+'. </span><span class="text-dark" id="span'+j+'">'+res+'</span></label><br/></div></p></div>');
                                }
                            }
                        }         
                }
            });
            que_inc = que+1;
        }
        if(que_inc >= 5)
        {
           window.location.replace("reading_reorder_paragraph.php?question="+que_inc+"&test_no="+test_no+"&continue=1&remaining_time="+remaining_time); 
        }
        isPaused = false;
    }
    function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
    $(document).on("keydown", disableF5);
</script>