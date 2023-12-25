<?php 
$active="21";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Writing: Summarize Written Text | Free Materials | PTE Materials | Origin Overseas | PTE Tutors </title>
    <meta name="description" content="Free PTE Material for Writing section's Summarize Written Text questions">
    <meta name="keywords" content="Writing PTE Questions, Writing questions, Writing practices, model Writing question, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" /><link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <link href="../../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../plugins/animate/animate.css">
    <style>   
        /* modal transcript */
        .answer-modal{
            overflow-y: initial !important
        }
        .answer-modal-body{
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
        /*button*/
       

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
    <!--  BEGIN NAVBAR  -->
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
                                <li class="breadcrumb-item"><span>Writing</span></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Summarize Wriiten Text</span></li>
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
                                        $_SESSION['summarize-written-text-id'] = $question_id;
                                        $_SESSION['summarize-written-text-num'] = $_GET['number'];
                                        $sql="SELECT * FROM material_writing WHERE type='summarize-written-text' and writingMaterialId='$question_id'";
                                        ?><script>
                                            var queryParams = new URLSearchParams(window.location.search);
                                            queryParams.delete("question");queryParams.delete("number");
                                            history.pushState(null, null, "?"+queryParams.toString());
                                        </script><?php
                                    }else{
                                        if (isset($_SESSION['summarize-written-text-id'])) {
                                            $question_id = $_SESSION['summarize-written-text-id'];
                                            $sql="SELECT * FROM material_writing WHERE type='summarize-written-text' and writingMaterialId='$question_id'";
                                        }else{
                                            $sql="SELECT * FROM material_writing WHERE type='summarize-written-text' ";
                                        }
                                    }
                                    $result = mysqli_query($conn, $sql);
                                    $tot_row = mysqli_num_rows($result);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <hr style="height: 1px;background: #bfc9d4;padding: 0px;margin:0px; margin-top: -20px">
                                <div class="text-center widget-content widget-content-area  " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold">
                                    <p class="mb-4"><span style="color: red">Note:</span> Read the passage below and summarize it using one sentence. Type your response in the box at the bottom of the screen. You have 10 minutes to finish this task. Your response will be judged on the quality of your writing and on how well your response presents the key points in the passage.</p>
                                </div>
                                <div class="row" style="margin-top: -75px">
                                    <div class="col-xl-12 text-center mt-5">
                                        <div class="widget-header">
                                            <div class="row layout-top-spacing" >
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4 id="counter_text"><span style="color: red">Total Time Left</span></h4>
                                                </div>                                 
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="margin-top: -10px">
                                            <div id="cd-read_a_loud" align="center">
                                                <div class="countdown d-inline-block">
                                                    <div class="clock-count-container text-center" >
                                                        <h6 class="clock-val" id="min"></h6>
                                                    </div>
                                                    <h4 class="clock-text mb-2 mt-2"> Min </h4>
                                                </div>
                                                <div class="countdown d-inline-block">
                                                    <div class="clock-count-container text-center" >
                                                        <h6 class="clock-val" id="sec"></h6>
                                                    </div>
                                                    <h4 class="clock-text mb-2 mt-2"> Sec </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" style="margin-top: 0px">
                                    <div class="tab-content" id="icon-pills-tabContent">
                                        <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel" aria-labelledby="icon-pills-home-tab">
                                            <div class="container">
                                                <div class="col-xl-12 mb-2" style="margin-top: -30px;">
                                                    <p class="mb-4 text-justify" style="font-size: 1.1em;letter-spacing: auto;line-height: 2">
                                                     <?php echo stripslashes($row['questionText']); ?>
                                                    </p>      
                                                    <textarea rows="4" cols="135" class="form-control mb-2" id="text"></textarea>
                                                    Words: <span id="wordCount">0</span>  
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
                                                if (isset($_SESSION['summarize-written-text-num'])) {
                                                    $pageNo = indexes($_SESSION['summarize-written-text-num']);
                                                    // print_r($pageNo);
                                                }else{
                                                    $pageNo = indexes(1);
                                                    $_SESSION['summarize-written-text-num'] = "1";
                                                    // echo $pageNo;
                                                }
                                            ?>  
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3" style="margin-top: -3px;">
                                                <div class="pagination-no_spacing">
                                                    <ul class="pagination">
                                                        <?php
                                                            
                                                                if($pageNo[1]==$_SESSION['summarize-written-text-num']){ 
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
                                                                        <a href="summarize_written_text.php?question='.$pageNo[0].'&number='.$pageNo[1].'" class="prev">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                                                        </a>
                                                                    </li>
                                                                    ';
                                                                    echo '<li><a href="summarize_written_text.php?question='.$pageNo[0].'&number='.$pageNo[1].'">'.$pageNo[1].'</a></li>';
                                                                }
                                                            
                                                        
                                                            if ($pageNo[3] == $_SESSION['summarize-written-text-num']) {
                                                                echo '
                                                                <li><a class="active" >'.$pageNo[3].'</a></li>
                                                                ';
                                                            }else{
                                                                echo '
                                                                <li><a href="summarize_written_text.php?question='.$pageNo[2].'&number='.$pageNo[3].'">'.$pageNo[3].'</a></li>
                                                                ';
                                                            }
                                                            
                                                        
                                                            if ($pageNo[4] != "") {
                                                                if($pageNo[5]==$_SESSION['summarize-written-text-num']){
                                                                    echo '<li><a href="summarize_written_text.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="active">'.$pageNo[5].'</a></li>';
                                                                }else{
                                                                    echo '<li><a href="summarize_written_text.php?question='.$pageNo[4].'&number='.$pageNo[5].'">'.$pageNo[5].'</a></li>';
                                                                }
                                                                echo '
                                                                <li>
                                                                    <a href="summarize_written_text.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="next">
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
                                                    <button class="btn dropdown-toggle btn-info" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropbtn">
                                                     <?php
                                                    include_once '../../database/dbh.inc.php';
                                                    $sql1="SELECT * FROM material_writing WHERE type='summarize-written-text' ";
                                                    $result1 = mysqli_query($conn, $sql1);
                                                    $tot_row1 = mysqli_num_rows($result1);
                                                    echo $_SESSION['summarize-written-text-num']; 
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
                                                                        <a href="summarize_written_text.php?question='.$row1['writingMaterialId'].'&number='.$i.'">
                                                                            <div class="dropdown-item dd-item"><div class="circle text-center" style="background-color:#007bff45"><p style="margin-top:-1px;">'.$i.'</p></div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    ';    
                                                                    }else{    
                                                                    echo '
                                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 " >
                                                                        <a href="summarize_written_text.php?question='.$row1['writingMaterialId'].'&number='.$i.'">
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
                                        <!--  bottom row end -->
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>          
            <!--footer-->
            <div class="footer-wrapper" style="float: right">
                <div class="footer-section f-section-2 ml-auto" style="float: right">
                    <p class="" style="float: right">Copyright © 2020 <a target="_blank" href="#">Origin Overseas</a>, All rights reserved.</p>
                </div>
            </div>
        </div>
            <!-- footer end-->
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
          <!-- Modal -->
    <div class="modal animated fadeInUp" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg answer-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Correct Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body answer-modal-body">
                    <p class="modal-text"><?php echo stripslashes($row['answer']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
    <div class="modal animated fadeInUp" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg answer-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Score & Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body answer-modal-body">
                    <p class="modal-text font-weight-bold d-inline-block">Vocabulary:<span class="font-weight-normal" id="vocab_marks"> </span></p>
                    <p class="modal-text font-weight-bold d-inline-block">| Content:<span class="font-weight-normal" id="content_marks"> </span></p>
                    <p class="modal-text font-weight-bold d-inline-block">| Grammer:<span class="font-weight-normal" id="grammer_marks"> </span></p>
                    <p class="modal-text font-weight-bold d-inline-block">| Spelling:<span class="font-weight-normal" id="spell_marks"> </span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
    <!-- php pagination function -->
     <?php
        function indexes($value){
            include '../../database/dbh.inc.php';
            $query ="SELECT * FROM material_writing WHERE type='summarize-written-text' ";
            $res = mysqli_query($conn, $query);
            $indexes = []; 
            while($val = mysqli_fetch_assoc($res)) { 
                array_push($indexes, $val['writingMaterialId']);
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
        <!-- pagination end -->
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
   
    
    <script src="../../plugins/table/datatable/datatables.js"></script>
    
    <script src="../../plugins/highlight/highlight.pack.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/countdown/jquery.countdown.min.js"></script>
    <script src="../../plugins/blockui/custom-blockui.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
     <!--word counter -->
    <script type="text/javascript">
        function checkAns(){
            var answer = $("#text").val();
            var id = <?php echo $row['writingMaterialId']; ?>;
            $.ajax({
                    url: '../ajax.php',
                    type: 'POST',
                    data: {answer:answer,id:id,type:"summarize-written-text"},
                    async: true,
                    beforeSend : function() {
                       $.blockUI({
                            message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin no-edge-top"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
                            fadeIn: 800, 
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
                    },
                    complete: function () {
                        $.unblockUI();
                    },
                    success: function (response) {
                        var removeFirst=response.replace("[","")
                        var removeLast = removeFirst.replace("]","")
                        console.log(removeLast);
                        var answer = removeLast.split(",");
                        $("#vocab_marks").html(answer[1])
                        $("#content_marks").html(answer[0])
                        $("#grammer_marks").html(answer[2])
                        $("#spell_marks").html(answer[3])
                        $('#exampleModal2').modal('show');
                    }
            });
            
        }
        timer();
        //reset
        function resetdata(){
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
            window.clearInterval(downloadTimer);
            document.getElementById("text").value ="";
            $('#wordCount').html(0);
            timer();
        }

        function timer(){
            var timeleft = 0;
            var pass = 0;
            var min = 10;
            var click = 0;
            window.downloadTimer = setInterval(function(){
            if(timeleft <= -1){
                timeleft=59;
                if (min <= 0) {
                    pass = 1;
                    min = 0;
                    timeleft = 0;
                    document.getElementById("sec").innerHTML = timeleft ;
                    document.getElementById("min").innerHTML = min ;    
                }else{
                    min = min-1;
                    document.getElementById("sec").innerHTML = timeleft ;
                    document.getElementById("min").innerHTML = min ;    
                }
                    
            } else {
                if (timeleft == 0 && min != 10) {       
                    document.getElementById("sec").innerHTML = "60" ;
                }else{
                    document.getElementById("sec").innerHTML = timeleft ;
                }
                document.getElementById("min").innerHTML = min ;    
                
            }
            timeleft -= 1;
            
            }, 1000);
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

    //modal drag
    $('.modal-dialog').draggable();

    
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
</body>
</html>