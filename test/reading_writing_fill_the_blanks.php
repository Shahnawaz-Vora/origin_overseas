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
    $type = "reading-and-writing-fill-in-the-blanks";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $sql = "select * from test where test_no = '$test_no' and type='$type' and question_no=1 and section='reading'";
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
if(isset($_GET['resume']) && isset($_GET['question']))
{
    $type = "reading-and-writing-fill-in-the-blanks";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question-54;
    $sql = "select * from test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='reading'";
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
    var section = "reading";
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reading: Reading and Writing Fill in the Blanks | Origin Overseas - PTE tutors </title>
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
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css" media="screen">
         select{
            background-color: transparent; 
            color: black;
            margin : 0px 8px 0px 8px;
            padding: 2px 5px 2px 5px;
            width: 150px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            -webkit-appearance: button;
            appearance: button;
            outline: none;
        }
    </style>
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
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once 'navbar.php';
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
                            <div class="statbox widget box box-shadow" id="p3q5" style="width: 115%;margin-left: -83px;margin-top:-10px"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span>You will hear a recording. Below is a transcription of the recording. Some words in the transcription differ from what the speaker(s) said. Please click on the words that are different.</p>
                                </div>
                                <div class="row" style="margin-top: -350px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-content widget-content-area">
                                            <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                <div class="tab-content" id="icon-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                                    <div class="row" style="cursor: pointer;">
                                                        <div class="col-xl-12 mb-2" style="margin-top: -90px;" id="question_block">
                                                            <p class="paragraph text-justify" id="questionText" style="font-size: 1.2em;color: black;line-height: 2.5em;">
                                                                <?php echo $row['questionText']; ?>
                                                            </p>
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
                                                    <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">55</span>  of 81</button>
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
    <input value="43" name="question" type="hidden" id="crr_question">
    </div>
    <!-- footer -->
    <!-- END MAIN CONTAINER -->
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
    var trueAns = [];
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
        var userAns=[];
        var temp;
        span =0;
        var span = $("#questionText span").length;
        for(var i=0; i<span;i++){
            var j = i+1;
            userAns.push($('#questionText #ans'+j).val());        
        }
        for(var i=0; i<userAns.length;i++){
            if(userAns[i] !== null)
            {
                temp=1;
            }        
        }
        if(temp != 1)
        {
            var userAns = "";
        }
        if (que == 55) {
            <?php
                $ind = 0;
                $answer =explode('/*/', $row["answer"]);
                for ($i = 0; $i < count($answer); $i++) {
                    if ($answer[$i] != '' && $answer[$i] != ' ' && $answer[$i] !=null) {
                        echo "trueAns.push('".trim($answer[$i])."');";
                    }
                }
            ?>
        }
        console.log(userAns.length);
        var mr = 15/trueAns.length;
        var marks = 0;
        for(var i =0; i< userAns.length; i++){
            if (userAns[i] == trueAns[i]) {
                marks+=mr;
            }
        }
        document.getElementById("question_number").innerHTML = q;
        if(que >= 55 && que<=60)
        {
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {summarize_writing_que: que,type: type,test_no:test_no,answer:userAns,remaining_time: remaining_time,marks:marks},
                success: function (response) {
                    var obj = JSON.parse(response);
                    $("#questionText select").each(function(){
                        this.selectedIndex=0;
                    });
                    trueAns = [];
                    var aaa = obj.ans;
                    trueAns = aaa.split('/*/');
                    $("#questionText").remove();
                    $("#question_block").append('<p class="paragraph text-justify" id="questionText" style="font-size: 1.2em;color: black;line-height: 2.5em;">'+obj.questiontext+'</p>')
                    $(function() {
                        if (obj.c >= 1) {
                            $("#questionText span").eq(0).html('<select id="ans1"><option disabled=true selected value=>---select---</option><option value="'+obj.option11+'">'+obj.option11+'</option><option value="'+obj.option12+'">'+obj.option12+'</option><option value="'+obj.option13+'">'+obj.option13+'</option><option value="'+obj.option14+'">'+obj.option14+'</option></select>');
                            if (obj.c >= 2) {
                                $("#questionText span").eq(1).html('<select id="ans2"><option disabled=true selected value=>---select---</option><option value="'+obj.option21+'">'+obj.option21+'</option><option value="'+obj.option22+'">'+obj.option22+'</option><option value="'+obj.option23+'">'+obj.option23+'</option><option value="'+obj.option24+'">'+obj.option24+'</option></select>');
                                if (obj.c >= 3) {
                                    $("#questionText span").eq(2).html('<select id="ans3"><option disabled=true selected value=>---select---</option><option value="'+obj.option31+'">'+obj.option31+'</option><option value="'+obj.option32+'">'+obj.option32+'</option><option value="'+obj.option33+'">'+obj.option33+'</option><option value="'+obj.option34+'">'+obj.option34+'</option></select>');
                                    if (obj.c >= 4) {
                                        $("#questionText span").eq(3).html('<select id="ans4"><option disabled=true selected value=>---select---</option><option value="'+obj.option41+'">'+obj.option41+'</option><option value="'+obj.option42+'">'+obj.option42+'</option><option value="'+obj.option43+'">'+obj.option43+'</option><option value="'+obj.option44+'">'+obj.option44+'</option></select>');
                                        if (obj.c >= 5) {
                                            $("#questionText span").eq(4).html('<select id="ans4"><option disabled=true selected value=>---select---</option><option value="'+obj.option51+'">'+obj.option51+'</option><option value="'+obj.option52+'">'+obj.option52+'</option><option value="'+obj.option53+'">'+obj.option53+'</option><option value="'+obj.option54+'">'+obj.option54+'</option></select>');
                                            if (obj.c >= 6) {
                                                $("#questionText span").eq(5).html('<select id="ans6"><option disabled=true selected value=>---select---</option><option value="'+obj.option61+'">'+obj.option61+'</option><option value="'+obj.option62+'">'+obj.option62+'</option><option value="'+obj.option63+'">'+obj.option63+'</option><option value="'+obj.option64+'">'+obj.option64+'</option></select>');
                                                if (obj.c >= 7) {
                                                    $("#questionText span").eq(6).html('<select id="ans7"><option disabled=true selected value=>---select---</option><option value="'+obj.option71+'">'+obj.option71+'</option><option value="'+obj.option72+'">'+obj.option72+'</option><option value="'+obj.option73+'">'+obj.option73+'</option><option value="'+obj.option74+'">'+obj.option74+'</option></select>');
                                                    if (obj.c >= 8) {
                                                        $("#questionText span").eq(7).html('<select id="ans8"><option disabled=true selected value=>---select---</option><option value="'+obj.option81+'">'+obj.option81+'</option><option value="'+obj.option82+'">'+obj.option82+'</option><option value="'+obj.option83+'">'+obj.option83+'</option><option value="'+obj.option84+'">'+obj.option84+'</option></select>');
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });
                }  
            });
            que_inc = que+1;
        }
        if(que_inc >= 61)
        {
            window.location.replace("listening_section.php?question="+que_inc+"&test_no="+test_no+"&temp=1&continue=1&non_timer=1&remaining_time="+remaining_time);
        }
        isPaused = false;
    }
    <?php
        $arry = [];
        for($i=1; $i<=8 ; $i++)
        {
            $option = "option".$i;
            if ($row[$option] != '' || $row[$option] != null) {
                $options = explode("/*/", $row['option'.$i]);
                array_push($arry, $options);
            }

        }
    ?>
    var userAns = [];
    span = $("#questionText span").length;
    $(function() {
        if (span >= 1) {
            $("#questionText span").eq(0).html('<select id="ans1"><?php
                if (isset($arry[0])) {
                    echo "<option disabled=true selected value=>---select---</option>";
                    for($j=0;$j<4;$j++){
                        echo "<option value=".$arry[0][$j].">".$arry[0][$j]. " </option>";
                    }
                }
            ?></select>');
            if (span >= 2) {
                $("#questionText span").eq(1).html('<select id="ans2"><?php
                    if (isset($arry[1])) {
                        echo "<option disabled=true selected value=>---select---</option>";
                        for($j=0;$j<4;$j++){
                            echo "<option value=".$arry[1][$j].">".$arry[1][$j]."</option>";
                        }
                    }
                ?></select>');
                if (span >= 3) {
                    $("#questionText span").eq(2).html('<select id="ans3"><?php
                        if (isset($arry[2])) {
                            echo "<option disabled=true selected value=>---select---</option>";
                            for($j=0;$j<4;$j++){
                                echo "<option value=".$arry[2][$j].">".$arry[2][$j]."</option>";
                            }
                        }
                    ?></select>');
                    if (span >= 4) {
                        $("#questionText span").eq(3).html('<select id="ans4"><?php
                            if (isset($arry[3])) {
                                echo "<option disabled=true selected value=>---select---</option>";
                                for($j=0;$j<4;$j++){
                                    echo "<option value=".$arry[3][$j].">".$arry[3][$j]."</option>";
                                }
                            }
                        ?></select>');
                        if (span >= 5) {
                            $("#questionText span").eq(4).html('<select id="ans5"><?php
                                if (isset($arry[4])) {
                                    echo "<option disabled=true selected value=>---select---</option>";
                                    for($j=0;$j<4;$j++){
                                        echo "<option value=".$arry[4][$j].">".$arry[4][$j]."</option>";
                                    }
                                }
                            ?></select>');
                            if (span >= 6) {
                                $("#questionText span").eq(5).html('<select id="ans6"><?php
                                    if (isset($arry[5])) {
                                        echo "<option disabled=true selected value=>---select---</option>";
                                        for($j=0;$j<4;$j++){
                                            echo "<option value=".$arry[5][$j].">".$arry[5][$j]."</option>";
                                        }
                                    }
                                ?></select>');
                                if (span >= 7) {
                                    $("#questionText span").eq(6).html('<select id="ans7"><?php
                                        if (isset($arry[6])) {
                                            echo "<option disabled=true selected value=>---select---</option>";
                                            for($j=0;$j<4;$j++){
                                                echo "<option value=".$arry[6][$j].">".$arry[6][$j]."</option>";
                                            }
                                        }
                                    ?></select>');
                                    if (span >= 8) {
                                        $("#questionText span").eq(7).html('<select id="ans8"><?php
                                            if (isset($arry[7])) {
                                                echo "<option disabled=true selected value=>---select---</option>";
                                                for($j=0;$j<4;$j++){
                                                    echo "<option value=".$arry[7][$j]."> ".$arry[7][$j]."</option>";
                                                }
                                            }
                                        ?></select>');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    });
    function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
    $(document).on("keydown", disableF5);
</script>