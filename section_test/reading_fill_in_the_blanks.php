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
    $type = "fill-in-the-blanks";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question-7;
    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$question_query' and section='reading'";
    ?><script type="text/javascript">
        var type= '<?php echo $type; ?>';
        var test_no= '<?php echo $test_no; ?>';
    </script><?php
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
}
if(isset($_GET['resume']) && isset($_GET['question']))
{
    $type = "fill-in-the-blanks";
    $section = 'reading';
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    $question_query = $question-7;
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
    <title>Reading: Fill in the Blanks | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../plugins/animate/animate.css">
    <style>   
        ul#options li{
            margin-left:10px;
            list-style: none; 
            display: inline-block;
            min-width: 100px;
            width: auto; 
            min-height: 35px;
            height: auto;
            padding: 5px;
            color: black;
            border: 1px solid #9da3aa;
            border-radius: 3px;
        }
        ul#options li:hover{ 
            list-style: none;
            min-width: 100px;
            width: auto;  
            min-height: 35px;
            height: auto;
            background-color: #007bff45;
            cursor: move;
            padding: 5px;
            border: 1px solid blue;
            color: black;
            font-weight: bolder;
            border-radius: 3px;
        }
        #paragraph span li{ 
            list-style: none;
            min-width: 100px;
            width: auto;    
            height: 35px;
            margin-top: -12px;
            margin-left: -5px;
            padding: 5px;
            color: black;
            text-align:center;
        }
        #paragraph span li:hover{ 
            list-style: none;
            min-width: 100px;
            width: auto;  
            height: 40px;
            cursor: move;
            background-color: #007bff45;
            padding: 5 0 0 0px ;
            border: 1px solid blue;
            color: black;
            font-weight: bolder;
            border-radius: 3px;
        }
        #paragraph span{
            min-width: 100px;
            width: auto; 
            height: 35px;
            padding: 5px;
            color: black;
            font-weight: bolder;
            border-bottom: 1px solid black;
            border-radius: 3px;
        }
        #paragraph span:hover{
            min-width: 100px;
            width: auto;  
            height: 35px;
            cursor: move;
            padding: 5px;
            color: black;
            font-weight: bolder;
            border-bottom: 1px solid black;
            border-radius: 3px;
        }
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
        
        #paragraph span {
            padding-top:5px;
            min-width: 100px;
            min-height: 35px;
            width: auto; 
            display: inline-block;
            height: 25px;
            border-radius:4px;
            background: #ffffff;
            border-bottom:solid black 1px;
        }
        
        /* #paragraph span{
            min-width: 100px;
            min-height: 35px;
            width: auto; 
            display: inline-block;
            border-radius:4px;
            background: #ffffff;
            border-bottom:solid black 1px;
        } */
        
    </style>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-countdown.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
        });
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
    <!--  END NAVBAR  -->

        <!--  BEGIN CONTENT AREA  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT AREA  -->
        <div id="" class="main-content" style="margin-top: 0px;width: 100%;">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing" >
                            <div class="statbox widget box box-shadow" id="p3q4" style="width: 115%;margin-left: -83px;margin-top:-10px"> 
                                <div class="text-center widget box box-shadow widget-content widget-content-area" style="background: white;margin-top: 100px;font-size: 16px;font-weight: bold;height:72vh;border-radius:8px;"><br>
                                    <p class="mb-4"><span style="color: red">Note:</span> In the text below some words are missing. Drag words from the box below to the appropriate place in the text. To undo an answer choice, drag the word back to the box below the text.</p>
                                </div>
                                <div class="row" style="margin-top: -435px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-content widget-content-area" >
                                            <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">         
                                                <div class="tab-content" id="icon-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                                        <div class="row" style="cursor: pointer;">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 " style="margin-top: -10px;" align="center" id="question_block">
                                                                <div  style="padding: 20px 0px 10px 0px;background-color: #efefef;border-radius: 5px;width: 100%" class="top d-inline-block">
                                                                    <ul id="options">    
                                                                   
                                                                    </ul>
                                                                </div>
                                                                <p class="paragraph" id="paragraph" style="margin-top: 50px;font-size: 1.2em;color: black;line-height: 2.2em"><?php
                                                                    echo stripslashes($row['questionText']);
                                                                ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>             
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="padding-top: 20px;">
                                    <div class="row ">
                                        <div class="col-xl-6" align="left">
                                            <div style="color: black;font-weight: bolder;font-size: 18px;margin-left: 25px;"  class="">
                                                <button class="mb-2 btn btn-outline-danger  title-text text-dark font-weight-bold" ><span id="question_number">8</span>  of 18</button>
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
    <!-- footer -->
    </div>
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
    resetOption();
    var url = new URL(window.location.href);
    var crr_question = url.searchParams.get("question");
    document.getElementById("crr_question").value = crr_question;
    var q = crr_question; 
    var answr="";
    var true_Ans =[];
    function pageInc(){
        isPaused = true;
        var remaining_time = hour+":"+min+":"+timeleft;
        q++;
        $("#crr_question").val(q); 
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?question=' + q;
        window.history.pushState({ path: newurl }, '', newurl);
        que = q -1;
        var userAns=[];
        var totalCount=$("#paragraph span li").length;
        var tot_fill =0;
        var temp =[];

        for (var i = 0; i < totalCount; i++) {
            // var ans = $('#paragraph p').eq(i).text();
            var ans = $('#paragraph span li').eq(i).text();
        
            if (ans != "") {
                userAns.push(ans);  
            }
        }
        
        if(userAns.length == 0)
        {
            userAns = "";
        }
        
        // console.log(userAns);
        if (que == 8) {
            true_Ans=[];
            <?php
                $ind = 0;
                $answer =explode('/*/', $row["answer"]);
                for ($i = 0; $i < count($answer); $i++) {
                    $j=$i+1;
                    if ($answer[$i] != '' && $answer[$i] != ' ' && $answer[$i] !=null) {
                        $ind = $answer[$i]-1;  //2-1 1 //3- 2
                        echo "true_Ans['".$ind."']= '".$row["option".$j]."';"; //2[ans] 
                    }
                }
            ?>
        }
        var mr = 18/true_Ans.length;
        var marks = 0;
        for(var i =0; i< userAns.length; i++){
            if (userAns[i] == true_Ans[i]) {
                marks+=mr;
            }
        }
        document.getElementById("question_number").innerHTML = q;
        if(que >= 8 && que<=12){
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: {summarize_writing_que: que,type: type,test_no:test_no,answer:userAns,remaining_time: remaining_time,marks:marks,section:"reading"},
                success: function (response) {
                    // console.log(response);
                    var obj = JSON.parse(response);
                    for(var i=0;i<$('#paragraph div').length;i++){
                        $('#paragraph div').eq(i).html("");
                    }
                    var trueAns = [];
                    for(i=0;i<obj.c;i++)
                    {
                        var j =i+1;
                        var op = "option"+j;
                        var res = obj[op];
                        if (res != '' || res != ' ' || res != null) {
                            trueAns.push(res);
                        }
                    }
                    true_Ans=[]; 
                    var ind = 0;
                    var j = 0;
                    var aaa = obj.answr;
                    var answer =aaa.split('/*/');
                    for (var h = 0; h < answer.length; h++) {
                        j=h+1;
                        if (answer[h] !== "" && answer[h] !== " " && answer[h] !==null ) {
                            ind = answer[h]-1;
                            var opt = "option"+j;
                            true_Ans[ind]= obj[opt];
                        }
                    }
                    $("#paragraph").remove();
                    $("#question_block").append('<p class="paragraph" id="paragraph" style="margin-top: 50px;font-size: 1.2em;color: black;line-height: 2.2em">'+obj.questiontext+'</p>')        
                    for (var i = 0; i < trueAns.length; i++) {
                        var j = i+1;
                        if (i == 0) {
                            $('#options').html('<li>'+trueAns[i]+'</li>'); 
                        }else{
                            $('#options').append('<li>'+trueAns[i]+'</li>'); 
                        }
                    }
                    $('#paragraph').find('span').html("");

                    // This code used for set order attribute for items
                    var numberOfItems = $("#options").find('li').length;
                    $.each($("#options").find('li'), function(index, item) {
                        $(item).attr("order", index);
                        var removeBotton = $('<i class="fa fa-times" style="display:none"></i>');
                        removeBotton.click(function(){
                            addToOlderPlace($(this).parent());        
                        });
                        $(item).append(removeBotton);
                        
                    });
                    
                    $("#paragraph span").droppable({
                        accept: "li",
                        classes: {
                        "ui-droppable-hover": "ui-state-hover"
                        },
                        drop: function(event, ui) {
                        // Check for existing another option
                        if($(this).find('li').length > 0)
                        addToOlderPlace($(this).find('li'));
                        
                        $(this).addClass("ui-state-highlight");
                        $(this).addClass('matched');
                        $(this).css("width","auto");  
                        
                        $(ui.draggable).find('i').attr("style","");
                        $(this).append($(ui.draggable));    
                        
                        }
                    });

                    $("li").draggable({
                        helper:"clone",
                        revert: "invalid"
                    }); 
                    
                    
                    // This function used for find old place of item
                    function addToOlderPlace($item) {
                        var indexItem = $item.attr('order');
                        var itemList = $("#options").find('li');
                        $item.find('i').hide();         

                        if (indexItem === "0")
                            $("#options").prepend($item);
                        else if (Number(indexItem) === (Number(numberOfItems)-1))        
                            $("#options").append($item);                       
                        else
                            $(itemList[indexItem - 1]).after($item);
                    }
                }  
            });
            que_inc = que+1;
        }
        if(que_inc >= 13)
        {
            window.location.replace("reading_writing_fill_the_blanks.php?question="+que_inc+"&test_no="+test_no+"&continue=1&remaining_time="+remaining_time+"&non_timer=0");
        }
        isPaused = false;
    }
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
                $('#options').html('<li>'+trueAns[i]+'</li>'); 
            }else{

                $('#options').append('<li>'+trueAns[i]+'</li>');
            }
        }
        $('#paragraph').find('span').html("");

        // This code used for set order attribute for items
        var numberOfItems = $("#options").find('li').length;
        $.each($("#options").find('li'), function(index, item) {
            $(item).attr("order", index);
            var removeBotton = $('<i class="fa fa-times" style="display:none"></i>');
            removeBotton.click(function(){
                addToOlderPlace($(this).parent());        
            });
            $(item).append(removeBotton);
            
        });
        
        $("#paragraph span").droppable({
            accept: "li",
            classes: {
            "ui-droppable-hover": "ui-state-hover"
            },
            drop: function(event, ui) {
            // Check for existing another option
            if($(this).find('li').length > 0)
            addToOlderPlace($(this).find('li'));
            
            $(this).addClass("ui-state-highlight");
            $(this).addClass('matched');  
            $(this).css("width","auto");
            $(this).css("height","auto");

            $(ui.draggable).find('i').attr("style","");
            $(this).append($(ui.draggable));    
            
            }
        });

        $("li").draggable({
            helper:"clone",
            revert: "invalid"
        }); 
        
        
        // This function used for find old place of item
        function addToOlderPlace($item) {
            var indexItem = $item.attr('order');
            var itemList = $("#options").find('li');
            $item.find('i').hide();         

            if (indexItem === "0")
                $("#options").prepend($item);
            else if (Number(indexItem) === (Number(numberOfItems)-1))        
                $("#options").append($item);                       
            else
                $(itemList[indexItem - 1]).after($item);
        }
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
     <script src="../plugins/blockui/custom-blockui.js"></script>
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
</body>
</html>