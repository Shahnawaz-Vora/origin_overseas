<?php 
$active="43";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Listening: Fill the Blanks | Free Materials | PTE Materials | Origin Overseas | PTE Tutors </title>
    <meta name="description" content="Free PTE Material for Listening section's Fill the Blanks questions">
    <meta name="keywords" content="Listening PTE Questions, listening questions, listening practices, model listening question, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <link href="../../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
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
    <style type="text/css">
        /* modal transcript */
        .transcript-modal{
            overflow-y: initial !important
        }
        .transcript-modal-body{
            height: 160px;
            overflow-y: auto;
        } 
        /*block ui */
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
                                <li class="breadcrumb-item"><a href="../materials.php">Material</a></li>
                                <li class="breadcrumb-item"><span>Listening</span></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Fill in The Blanks</span></li>
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
                                        $_SESSION['listening-fill-id'] = $question_id;
                                        $_SESSION['listening-fill-num'] = $_GET['number'];
                                        $sql="SELECT * FROM material_listening WHERE type='fill-in-the-blanks' and listeningMaterialId='$question_id'";
                                        ?><script>
                                            var queryParams = new URLSearchParams(window.location.search);
                                            queryParams.delete("question");queryParams.delete("number");
                                            history.pushState(null, null, "?"+queryParams.toString());
                                        </script><?php
                                    }else{
                                        if (isset($_SESSION['listening-fill-id'])) {
                                            $question_id = $_SESSION['listening-fill-id'];
                                            $sql="SELECT * FROM material_listening WHERE type='fill-in-the-blanks' and listeningMaterialId='$question_id'";
                                        }else{
                                            $sql="SELECT * FROM material_listening WHERE type='fill-in-the-blanks' ";
                                        }
                                    }
                                    $result = mysqli_query($conn, $sql);
                                    $tot_row = mysqli_num_rows($result);
                                    $row = mysqli_fetch_assoc($result);   
                                ?>
                                <hr style="height: 1px;background: #bfc9d4;padding: 0px;margin:0px; margin-top: -20px">
                                <div class="text-center widget-content widget-content-area  " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold">
                                    <p class="mb-4"><span style="color: red">Note:</span> You will hear a sentence. Type the sentence in the box below exactly as you hear it. Write as much of the sentence as you can. You will hear the sentence only once.</p>
                                </div>
                                <div class="row" style="margin-top: -75px;">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text">Audio <span style="color: red">will Play in... </span><span id="timeleft"></span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="margin-top: -18px;padding-bottom:50px">
                                            <center id="progressbarDiv">
                                                <div class="progress mb-4 progress-bar-stack br-30" style="width: 50%">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" id="progressbar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </center>
                                            <audio controls id="audioFile" style="width: 220px;">    
                                                <source src="../../database/audio/<?php echo $row['audio']; ?>" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination">
                                    <div class="tab-content" id="icon-pills-tabContent">
                                        <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                            <div class="container">
                                                 <div class="col-xl-12 mb-2" style="margin-top: 0px;">
                                                   <div class="row" style="cursor: pointer;">
                                                        <div class="col-xl-12 mb-2" style="margin-top: -30px;">
                                                            <p class="paragraph text-justify" style="font-size: 1.1em;letter-spacing:auto;line-height: 2"><?php echo $row['questionText']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">
                                        <!--  bottom row start -->
                                        <div class="row mt-4" >
                                            <!--Buttons left side start -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3 " align="left">
                                                <button class="btn btn-primary" onclick="checkAns()" id="submitbtn" name="submit" type="button">Submit</button>
                                                <button type="button" class="btn" style="background-color: #e63f49;color: white;" onclick="resetdata();" id="reset">Reset</button>
                                                <button type="button" class="btn" style="background-color: #83bb2f;color: white;" data-toggle="modal" data-target="#exampleModal1" id="answer">Answer</button>
                                            </div>
                                            <!-- Button left side end -->


                                            <!-- Pagination start -->
                                            <?php
                                                if (isset($_SESSION['listening-fill-num'])) {
                                                    $pageNo = indexes($_SESSION['listening-fill-num']);
                                                    // print_r($pageNo);
                                                }else{
                                                    $pageNo = indexes(1);
                                                    $_SESSION['listening-fill-num'] = "1";
                                                    // echo $pageNo;
                                                }
                                            ?>  
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3" style="margin-top: -3px;">
                                                <div class="pagination-no_spacing">
                                                    <ul class="pagination">
                                                        <?php
                                                            
                                                                if($pageNo[1]==$_SESSION['listening-fill-num']){ 
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
                                                                        <a href="fill_the_blanks.php?question='.$pageNo[0].'&number='.$pageNo[1].'" class="prev">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                                                        </a>
                                                                    </li>
                                                                    ';
                                                                    echo '<li><a href="fill_the_blanks.php?question='.$pageNo[0].'&number='.$pageNo[1].'">'.$pageNo[1].'</a></li>';
                                                                }
                                                            
                                                        
                                                            if ($pageNo[3] == $_SESSION['listening-fill-num']) {
                                                                echo '
                                                                <li><a class="active" >'.$pageNo[3].'</a></li>
                                                                ';
                                                            }else{
                                                                echo '
                                                                <li><a href="fill_the_blanks.php?question='.$pageNo[2].'&number='.$pageNo[3].'">'.$pageNo[3].'</a></li>
                                                                ';
                                                            }
                                                            
                                                        
                                                            if ($pageNo[4] != "") {
                                                                if($pageNo[5]==$_SESSION['listening-fill-num']){
                                                                    echo '<li><a href="fill_the_blanks.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="active">'.$pageNo[5].'</a></li>';
                                                                }else{
                                                                    echo '<li><a href="fill_the_blanks.php?question='.$pageNo[4].'&number='.$pageNo[5].'">'.$pageNo[5].'</a></li>';
                                                                }
                                                                echo '
                                                                <li>
                                                                    <a href="fill_the_blanks.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="next">
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
                                                    $sql1="SELECT * FROM material_listening WHERE type='fill-in-the-blanks' ";
                                                    $result1 = mysqli_query($conn, $sql1);
                                                    $tot_row1 = mysqli_num_rows($result1);
                                                    echo $_SESSION['listening-fill-num']; 
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
                                                                        <a href="fill_the_blanks.php?question='.$row1['listeningMaterialId'].'&number='.$i.'">
                                                                            <div class="dropdown-item dd-item"><div class="circle text-center" style="background-color:#007bff45"><p style="margin-top:-1px;">'.$i.'</p></div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    ';    
                                                                    }else{    
                                                                    echo '
                                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 " >
                                                                        <a href="fill_the_blanks.php?question='.$row1['listeningMaterialId'].'&number='.$i.'">
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
                                        <!--  bottom row start -->
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
                    <p class="modal-text"><?php 
                        for($i = 1; $i <= 8; $i++)
                        {
                            if($row['option'.$i] != null || $row['option'.$i] != "")
                            {
                                echo "<li>".stripslashes($row['option'.$i])."</li>";
                            }
                        }
                     ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
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
                    <p class="modal-text"><?php echo stripslashes($row['transcript']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
     <!-- php pagination function -->
    <?php
        function indexes($value){
            include '../../database/dbh.inc.php';
            $query ="SELECT * FROM material_listening WHERE type='fill-in-the-blanks' ";
            $res = mysqli_query($conn, $query);
            $indexes = []; 
            while($val = mysqli_fetch_assoc($res)) { 
                array_push($indexes, $val['listeningMaterialId']);
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
        $('.modal-dialog').draggable();
        timer();
        function timer(){
            var timeleft = 3;
            var pass = 0;
            var audTime;
            var click = 0;
            window.downloadTimer = setInterval(function(){
            if(timeleft <= -1){
                if (pass == 0) {
                    document.getElementById("audioFile").play();
                    var x = Math.ceil(document.getElementById("audioFile").duration);
                    if(isNaN(x))
                    {
                        location.reload();
                    }
                    document.getElementById("counter_text").innerHTML = "Audio is<span style='color:red'> Playing...</span> <span id='timeleft'></span>/"+x;
                    timeleft=x;
                    audTime = x;
                    pass = 1;
                    var per = ((timeleft*100)/audTime)+"%";
                    document.getElementById("progressbar").style.width = per;
                    document.getElementById("timeleft").innerHTML = timeleft ;
                }else{
                    document.getElementById("counter_text").style.display="none";
                    document.getElementById("progressbarDiv").style.display="none";
                }
                    
            } else {
                if (pass==1) {
                    var per = ((timeleft*100)/audTime)+"%";
                }else{
                    var per = (timeleft/0.03)+"%";
                }
                document.getElementById("progressbar").style.width = per ;
                document.getElementById("timeleft").innerHTML = timeleft ;
            }
            timeleft -= 1;
            
            }, 1000);
        }
    </script>
    
    <script>
    function checkAns() {
        var userAns=[];
        var trueAns =[];
        var option = $('.paragraph input');
        for (var i = 0; i < option.length; i++) {
            var j= i+1; 
            var ans = $('#tmp_input'+j).val();
            if (ans != "") {
                userAns.push(ans); 
            }else{
                Snackbar.show({
                    text: 'Please fill the answers! It cant be empty',
                    duration: 3000,
                    backgroundColor: "#080c13",
                });
                return false;
                break;
            }
        }

        <?php
            $ind = 0;
            for ($i = 1; $i <= 8; $i++) {
                $ind = "option".$i;
                if ($row[$ind] != '' && $row[$ind] != ' ' && $row[$ind] !=null) {
                    echo "trueAns.push('".trim($row[$ind])."');";
                }
            }
        ?>
        for (var i = 0; i < userAns.length; i++) {
            var j = i+1;
            var inter ="#tmp_input"+j;
            console.log(userAns[i] +"=="+ trueAns[i]);
            if (trueAns[i].localeCompare(userAns[i]) == 0) {
                $("#span"+j).prepend('<svg id="svg'+j+'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather mr-1 feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>');
                $(inter).css("color","green");
                $(inter).css("font-weight","bolder");
            }else{
                $("#span"+j).prepend('<svg id="svg'+j+'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather mr-1 feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>');
                
                $(inter).css("color","red")
                $(inter).css("font-weight","bolder");
            }
        }
        $("#submitbtn").attr("disabled",true);
    }
    function resetdata(){
        $("#submitbtn").attr("disabled",false);
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
        var option = $('.paragraph input');
        for(var i=1;i<=option.length;i++){
            $("#svg"+i).remove();
            $("#tmp_input"+i).val("");
            $("#tmp_input"+i).css("color","black")
            $("#tmp_input"+i).css("font-weight","normal");
        }
        document.getElementById('pan').hidden = true;
        window.clearInterval(downloadTimer);
        document.getElementById("counter_text").innerHTML = "Audio <span style='color: red'>will Play in... </span><span id='timeleft'></span>";
        document.getElementById("counter_text").style.display="block";
        document.getElementById("progressbarDiv").style.display="block";
        document.getElementById("audioFile").pause();
        document.getElementById("audioFile").currentTime = 0;
        timer();
    }
    var i=1;
    function convertSpanToInput() {
        // Insert input after span
        $('<span id="span'+i+'" class="mx-2 d-inline-block"><input id="tmp_input'+i+'" placeholder="Answer" class="textbox d-inline-block" required="required"></span>').insertAfter($(this));
        $(this).hide(); // Hide span
        $(this).next().focus();
        $('input[id=tmp_input'+i+']').css("border","solid black 0px");
        $('input[id=tmp_input'+i+']').css("border-bottom","solid black 1px");
        $('input[id=tmp_input'+i+']').css("border-radius","3px");
        $("#tmp_input").blur(function() {
            // Set input value as span content
            // when focus of input is lost.
            // Also delete the input.
            var value = $(this).val();
            // $(this).prev().show();
            $(this).prev().html(value);
            // $(this).remove();        
        });
        i++;
    }
    $(document).ready(function() {
        // Init all spans with a placeholder.
        $(".container span[id=replace]").html(convertSpanToInput);
        $(".textbox:first").focus();    
        //
        // $(".container span[id=replace]").click(convertSpanToInput);
    });

    </script>
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
    <script src="../../plugins/table/datatable/datatables.js"></script>
    <script src="../../plugins/blockui/custom-blockui.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../../plugins/highlight/highlight.pack.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/countdown/jquery.countdown.min.js"></script>  
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
</body>
</html>