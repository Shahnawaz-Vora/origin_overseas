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
    $type = "reorder-paragraph";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question-4;
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='reading'";
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
    $type = "reorder-paragraph";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question-4;
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='reading'";
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
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
    <title>Reading: Re-order Paragraph | Origin Overseas - PTE tutors </title>
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
    <link href="../plugins/drag-and-drop/dragula/dragula.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/drag-and-drop/dragula/example.css" rel="stylesheet" type="text/css" />
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
                            <div class="statbox widget box box-shadow" id="p3q3" style="width: 115%;margin-left: -83px;margin-top:-10px"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> The text boxes in the left panel have been placed in random order. Restore the original order by dragging the text boxes from the left panel to the right panel.</p>
                                </div>
                                <div class="row" style="margin-top: -435px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-content widget-content-area">
                                            <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                <div class="tab-content" id="icon-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">  
                                                        <!---drag and drop -->
                                                        <div class="col-xl-12 mx-auto">
                                                            <div class="widget-content widget-content-area " align="center" style="margin-top: -30px;" >
                                                                <div class='parent ex-2' >
                                                                    <div class='row w-100'>
                                                                        <div class="col-md-5 mb-4 " style="margin-left: 40px;">
                                                                            <h4 align="center" class="" style="font-size: 1.4em;color: black;border-radius: 5px;padding: 10px 0px 10px 0px;background: #c6c8ca;border:solid black 2px"><b>Source</b></h4>
                                                                            <div id='left-events' class='dragula columnData' style="border-radius: 5px;border:1px solid #e0e6ed;min-height: 300px;">
                                                                            </div>
                                                                        </div>   
                                                                        <div class="col-md-1" style="margin-top: 250px;">              
                                                                            <img src="../assets/img/arrow.gif" alt="" width="50px;">
                                                                        </div>
                                                                        <div class="col-md-1" >              
                                                                            
                                                                        </div>
                                                                        <div class="col-md-5" id="answers" style="margin-left: -80px;">
                                                                            
                                                                            <h4 align="center" class="userAns" style="font-size: 1.4em;color: black;border-radius: 5px;background: #ffc10796;padding: 10px 0px 10px 0px;border:solid black 2px"><b>Target</b></h4>
                                                                            <div id='right-events' class='dragula' style="border-radius: 5px;border:1px solid #e0e6ed;min-height: 300px;padding-bottom: 40px"> 
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---drag and drop end -->
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
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">5</span>  of 18</button>
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
        <input value="43" name="question" type="hidden" id="crr_question">
        <input value="" name="true_ans" type="hidden" id="true_ans">
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
    <script src="../plugins/drag-and-drop/dragula/dragula.min.js"></script>
    <script src="../plugins/drag-and-drop/dragula/custom-dragula.js"></script>
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
        var trueAns = []; 
        if(que == 1) {
        <?php
            $trueAns =explode('/*/', $row["answer"]);
            for ($i = 0; $i < count($trueAns); $i++) {
                echo "trueAns.push(".$trueAns[$i].");";
            }
        ?> 
        } else {
            var true_ans = $("#true_ans").val();
            var trueAns = Array.from(true_ans.split('/*/'),Number);
        }
        var totalCount= $("#left-events > div").length+$("#right-events input").length;
        userAns = [];
        for(var i = 0; i < totalCount; i++){
            var ans = $("#right-events input").eq(i).val();
            if (ans != null && ans != "" && ans != " ") {
                userAns.push(ans);  
            }
        }
        if(userAns.length == 0)
        {
            userAns = "";
        }
        var true_pair = 0;
        for (var i = 0; i < userAns.length; i++) {
            var inter ="#right-events .dummy";
            var crr_ans = userAns[i];
            var next_ans = userAns[i+1];
            var true_ans_pos = trueAns.indexOf(parseInt(crr_ans));
            var true_crr_ans = trueAns[true_ans_pos];
            var true_next_ans = trueAns[true_ans_pos+1];
            if (true_crr_ans == crr_ans && true_next_ans == next_ans) {
                if(userAns.length-1 != i){
                    true_pair +=1; 
                }
            }
        }
        var marks = 0;
        if( true_pair == trueAns.length){
            marks = 30;
        }else{
            var mkr = 30/(trueAns.length-1);
            marks = mkr*true_pair;
        }
      
        
        document.getElementById("question_number").innerHTML = q;
        if(que >= 5 && que<=7)
        {
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {summarize_writing_que: que,type: type,test_no:test_no,answer:userAns,remaining_time: remaining_time, marks: marks,section:"reading"},
                success: function (response) {
                    var obj = JSON.parse(response);
                    var trueAns=[];
                    for(var i=1; i<=8;i++) {
                        $("#right-events #div"+i).remove();
                    }

                    for(i=0;i<obj.c;i++) {
                        var j =i+1;
                        var op = "option"+j;
                        var res = obj[op];
                        trueAns.push(res);
                    }

                    for (var i = 0; i < trueAns.length; i++) {
                        var j = i+1;
                        if (i == 0) {
                            $('.columnData').html('<div class="media   d-block d-sm-flex dummy" id=div'+j+'><div class="media-body "><div class="text-center"><div class="">'+j+'<p style="font-size:0.9em;color:black">'+trueAns[i]+'</p><input type="hidden" id='+j+' value='+j+'> </div></div></div></div>'); 
                        }else{

                            $('.columnData').append('<div class="media   d-block d-sm-flex dummy" id=div'+j+'><div class="media-body "><div class="text-center"><div class="">'+j+'<p style="font-size:0.9em;color:black">'+trueAns[i]+'</p><input type="hidden" id='+j+' value='+j+'> </div></div></div></div>');
                        }
                        
                    }
                    $("#true_ans").val(obj.ans); 
                }  
            });
            que_inc = que+1;
        }
        if(que_inc >= 8)
        {
            window.location.replace("reading_fill_in_the_blanks.php?question="+que_inc+"&test_no="+test_no+"&continue=1&remaining_time="+remaining_time+"&non_timer=0");
        }
        isPaused = false;
    }
    resetOption();  
    function resetOption(){
            var trueAns = [];
            <?php
                for ($i = 1; $i <= 8; $i++) {
                    $opt = "option".$i;
                    if (isset($row[$opt])) {
                        if ($row[$opt] != "" && $row[$opt]!= " ") {
                            echo "trueAns.push('".$row[$opt]."');";
                        }
                    }
                }
            ?>
            for (var i = 0; i < trueAns.length; i++) {
                var j = i+1;
                if (i == 0) {
                    $('.columnData').html('<div class="media   d-block d-sm-flex dummy" id=div'+j+'><div class="media-body "><div class="text-center"><div class="">'+j+'<p style="font-size:0.9em;color:black">'+trueAns[i]+'</p><input type="hidden" id='+j+' value='+j+'> </div></div></div></div>'); 
                }else{

                    $('.columnData').append('<div class="media   d-block d-sm-flex dummy" id=div'+j+'><div class="media-body "><div class="text-center"><div class="">'+j+'<p style="font-size:0.9em;color:black">'+trueAns[i]+'</p><input type="hidden" id='+j+' value='+j+'> </div></div></div></div>');
                }
                
            }
        
        }
    function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
    $(document).on("keydown", disableF5);
</script>

