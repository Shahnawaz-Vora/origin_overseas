<?php 
$active="33";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reading: Re-order Paragraph | Free Materials | PTE Materials | Origin Overseas | PTE Tutors </title>
    <meta name="description" content="Free PTE Material for Reading section's Re-order Paragraph questions">
    <meta name="keywords" content="Reading PTE Questions, Reading questions, Reading practices, model Reading question, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <title> | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../../assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/custom-countdown.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/drag-and-drop/dragula/dragula.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/drag-and-drop/dragula/example.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css">
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../plugins/animate/animate.css">
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FQKPT0PS9K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FQKPT0PS9K');
        // stop right click
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>

</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
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
                                <li class="breadcrumb-item"><span>Reading</span></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Re-order paragraphs</span></li>
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
                                        $_SESSION['reading-reorder-id'] = $question_id;
                                        $_SESSION['reading-reorder-num'] = $_GET['number'];
                                        $sql="SELECT * FROM material_reading WHERE type='reorder-paragraph' and readingMaterialId='$question_id'";
                                        ?><script>
                                            var queryParams = new URLSearchParams(window.location.search);
                                            queryParams.delete("question");queryParams.delete("number");
                                            history.pushState(null, null, "?"+queryParams.toString());
                                        </script><?php
                                    }else{
                                        if (isset($_SESSION['reading-reorder-id'])) {
                                            $question_id = $_SESSION['reading-reorder-id'];
                                            $sql="SELECT * FROM material_reading WHERE type='reorder-paragraph' and readingMaterialId='$question_id'";
                                        }else{
                                            $sql="SELECT * FROM material_reading WHERE type='reorder-paragraph' ";
                                        }
                                    }
                                    $result = mysqli_query($conn, $sql);
                                    $tot_row = mysqli_num_rows($result);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                                <hr style="height: 1px;background: #bfc9d4;padding: 0px;margin:0px; margin-top: -20px">
                                <div class="text-center widget-content widget-content-area  " style="background: white;margin-top: 10px;font-size: 16px;font-weight: bold">
                                    <p class="mb-4"><span style="color: red">Note:</span> The text boxes in the left panel have been placed in random order. Restore the original order by dragging the text boxes from the left panel to the right panel.</p>
                                </div>
                                <div class="row" style="margin-top: 0px">
                                    <!---drag and drop -->
                                    
                                    <div class="col-xl-12 mx-auto">
                                        <div class="widget-content widget-content-area " align="center" style="margin-top: -30px;" >
                                            <div class="container">
                                                <div class='parent ex-2' >
                                                    <div class='row w-100'>
                                                        <div class="col-md-5 mb-4" style="margin-left: 40px;">
                                                            <h4 align="center" class="" style="font-size: 1.4em;color: black;border-radius: 5px;padding: 10px 0px 10px 0px;background: #c6c8ca;border:solid black 2px"><b>Source</b></h4>
                                                            <div id='left-events' class='dragula columnData' style="border-radius: 5px;border:1px solid #e0e6ed">
                                                            </div>
                                                        </div>   
                                                        <div class="col-md-1" style="margin-top: 250px;">              
                                                            <img src="../../assets/img/arrow.gif" alt="" width="50px;">
                                                        </div>
                                                        <div class="col-md-5" id="answers" style="margin-left: 0px;">
                                                            
                                                            <h4 align="center" class="userAns" style="font-size: 1.4em;color: black;border-radius: 5px;background: #ffc10796;padding: 10px 0px 10px 0px;border:solid black 2px"><b>Target</b></h4>
                                                            <div id='right-events' class='dragula' style="border-radius: 5px;border:1px solid #e0e6ed;min-height: 300px;padding-bottom: 40px"> 
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 180px">
                                        <div class="row" style="margin-top: -40px;margin-left: -1165px;" hidden="true" id="pair0">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">
                                                
                                                <svg id="right_svg0" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg0" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img src="../../assets/img/pair.png" class="d-inline-block" width=32>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row" style="margin-top: 31px;margin-left: -1165px;" hidden="true" id="pair1">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">
                                                <svg id="right_svg1" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg1" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img class="d-inline-block" src="../../assets/img/pair.png" width=32>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row" style="margin-top: 31px;margin-left: -1165px;" hidden="true" id="pair2">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">

                                                <svg id="right_svg2" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg2" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img class="d-inline-block" src="../../assets/img/pair.png" width=32>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row" style="margin-top: 31px;margin-left: -1165px;" hidden="true" id="pair3">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">
                                                <svg id="right_svg3" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg3" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img class="d-inline-block" src="../../assets/img/pair.png" width=32>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row" style="margin-top: 31px;margin-left: -1165px;" hidden="true" id="pair4">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">
                                                <svg id="right_svg4" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg4" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img class="d-inline-block" src="../../assets/img/pair.png" width=32>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row" style="margin-top: 31px;margin-left: -1165px;" hidden="true" id="pair5">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">
                                                <svg id="right_svg5" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg5" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img class="d-inline-block" src="../../assets/img/pair.png" width=32>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                        <div class="row" style="margin-top: 31px;margin-left: -1165px;" hidden="true" id="pair6">
                                            <div class="col-xl-6"></div>
                                            <div class="col-xl-3">
                                                <svg id="right_svg6" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m14.371 16.871c-.566.567-1.32.879-2.121.879s-1.555-.312-2.121-.879l-4.25-4.25c-.567-.566-.879-1.32-.879-2.121s.312-1.555.879-2.121c.566-.567 1.32-.879 2.121-.879s1.555.312 2.121.879l2.129 2.128 5.877-5.877c-1.92-1.637-4.406-2.63-7.127-2.63-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.137-.173-2.233-.493-3.265z"/><path d="m12.25 15.75c-.256 0-.512-.098-.707-.293l-4.25-4.25c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.543 3.543 10.043-10.043c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-10.75 10.75c-.195.195-.451.293-.707.293z"/></g></svg>

                                                <svg id="wrong_svg6" style="display: none;" enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m23.269 10.582-4.409-7.25c-.495-.815-1.396-1.321-2.35-1.321h-9c-.954 0-1.854.506-2.35 1.321l-4.409 7.25c-.536.881-.536 1.976 0 2.857l4.409 7.25c.495.815 1.396 1.321 2.35 1.321h9.001c.954 0 1.854-.506 2.35-1.321l4.409-7.25c.535-.881.535-1.976-.001-2.857zm-6.85 4.423c.391.391.391 1.023 0 1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-3.005-3.005-3.005 3.005c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023 0-1.414l3.005-3.005-3.005-3.005c-.391-.391-.391-1.023 0-1.414s1.023-.391 1.414 0l3.005 3.005 3.005-3.005c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.005 3.005z"/></svg>
                                                <img class="d-inline-block" src="../../assets/img/pair.png" width=32>

                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>    
                                    </div>
                                    <!---drag and drop end -->
                                </div>
                                <div class="widget-content widget-content-area icon-pill" id="alter_pagination" >
                                    <div class="widget-content widget-content-area icon-pill" id="alter_pagination" >
                                        <div class="row" >
                                            <!--Buttons left side start -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3 " align="left">
                                               <button class="btn btn-primary" onclick="checkAns()" id="submitbtn" name="submit" type="button">Submit</button>
                                                <button type="button" class="btn" style="background-color: #e63f49;color: white;" id="reset">Reset</button>
                                                <button type="button" class="btn" style="background-color: #83bb2f;color: white;" data-toggle="modal" data-target="#exampleModal" id="answer">Answer</button>
                                            </div>
                                            <!-- Button left side end -->
                                            <!-- Pagination start -->
                                            <?php
                                                if (isset($_SESSION['reading-reorder-num'])) {
                                                    $pageNo = indexes($_SESSION['reading-reorder-num']);
                                                    // print_r($pageNo);
                                                }else{
                                                    $pageNo = indexes(1);
                                                    $_SESSION['reading-reorder-num'] = "1";
                                                    // echo $pageNo;
                                                }
                                            ?>  
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-sm-3 col-12 mb-3" style="margin-top: -3px;">
                                                <div class="pagination-no_spacing">
                                                    <ul class="pagination">
                                                        <?php
                                                            
                                                                if($pageNo[1]==$_SESSION['reading-reorder-num']){ 
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
                                                                        <a href="reorder_paragraph.php?question='.$pageNo[0].'&number='.$pageNo[1].'" class="prev">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                                                        </a>
                                                                    </li>
                                                                    ';
                                                                    echo '<li><a href="reorder_paragraph.php?question='.$pageNo[0].'&number='.$pageNo[1].'">'.$pageNo[1].'</a></li>';
                                                                }
                                                            
                                                        
                                                            if ($pageNo[3] == $_SESSION['reading-reorder-num']) {
                                                                echo '
                                                                <li><a class="active" >'.$pageNo[3].'</a></li>
                                                                ';
                                                            }else{
                                                                echo '
                                                                <li><a href="reorder_paragraph.php?question='.$pageNo[2].'&number='.$pageNo[3].'">'.$pageNo[3].'</a></li>
                                                                ';
                                                            }
                                                            
                                                        
                                                            if ($pageNo[4] != "") {
                                                                if($pageNo[5]==$_SESSION['reading-reorder-num']){
                                                                    echo '<li><a href="reorder_paragraph.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="active">'.$pageNo[5].'</a></li>';
                                                                }else{
                                                                    echo '<li><a href="reorder_paragraph.php?question='.$pageNo[4].'&number='.$pageNo[5].'">'.$pageNo[5].'</a></li>';
                                                                }
                                                                echo '
                                                                <li>
                                                                    <a href="reorder_paragraph.php?question='.$pageNo[4].'&number='.$pageNo[5].'" class="next">
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
                                                    $sql1="SELECT * FROM material_reading WHERE type='reorder-paragraph' ";
                                                    $result1 = mysqli_query($conn, $sql1);
                                                    $tot_row1 = mysqli_num_rows($result1);
                                                    echo $_SESSION['reading-reorder-num']; 
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
                                                                    <a href="reorder_paragraph.php?question='.$row1['readingMaterialId'].'&number='.$i.'">
                                                                        <div class="dropdown-item dd-item"><div class="circle text-center" style="background-color:#007bff45"><p style="margin-top:-1px;">'.$i.'</p></div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                ';    
                                                                }else{    
                                                                echo '
                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 " >
                                                                    <a href="reorder_paragraph.php?question='.$row1['readingMaterialId'].'&number='.$i.'">
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
                                        <!--row end -->
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
    <div class="modal animated fadeInUp" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Correct Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text"><?php
                        $ans = explode("/*/", $row['answer']);
                        for($i=0;$i<count($ans);$i++){
                        echo "<li>".$row['option'.$ans[$i]]."</li>";
                        }
                    ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
    <!-- php pagination function -->
    <?php
        function indexes($value){
            include '../../database/dbh.inc.php';
            $query ="SELECT * FROM material_reading WHERE type='reorder-paragraph' ";
            $res = mysqli_query($conn, $query);
            $indexes = []; 
            while($val = mysqli_fetch_assoc($res)) { 
                array_push($indexes, $val['readingMaterialId']);
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
            resetOption();
        });
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
                    $('.columnData').html('<div class="media d-inline-block  d-block d-sm-flex dummy" id=div'+j+'><div class="media-body d-inline-block" style="min-height:70px;max-height:70px;"><div class="text-center"><div class="" align="left">'+j+'. &nbsp<span style="font-size:0.9em;color:black">'+trueAns[i]+'</span><input type="hidden" id='+j+' value='+j+'> </div></div></div></div>'); 
                }else{

                    $('.columnData').append('<div class="media   d-block d-sm-flex dummy" id=div'+j+'><div class="media-body " style="min-height:70px;max-height:70px;"><div class="text-center"><div class="" align="left">'+j+'. &nbsp<span style="font-size:0.9em;color:black">'+trueAns[i]+'</span><input type="hidden" id='+j+' value='+j+'> </div></div></div></div>');
                }
                
            }
            $(".dummy").draggable({ disabled: true });
        }
        $("#reset").click(function(){
            $(".dummy").draggable({ disabled: false });
            resetOption();
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
            for(var i=1; i<=8;i++)
            {
                $("#right-events #div"+i).remove();
            }
            for(var i =0;i<6;i++){
                var pr = "pair"+i; 
                document.getElementById(pr).hidden = true;
                var tr = "right_svg"+i;
                document.getElementById(tr).style.display = "none";
                var wr = "wrong_svg"+i;
                document.getElementById(wr).style.display = "none";
            }
            $("#submitbtn").attr("disabled",false);
        });
        //modal drag
        $('.modal-dialog').draggable();
        function checkAns(){
            var trueAns = []; 
            <?php
                $trueAns =explode('/*/', $row["answer"]);
                for ($i = 0; $i < count($trueAns); $i++) {
                    echo "trueAns.push(".$trueAns[$i].");";
                }
            ?>
            var paragraph = "<?php echo count($trueAns) ?>"
            userAns = [];
            for(var i = 0; i < paragraph; i++){
                var ans = $("#right-events input").eq(i).val();
                if (ans != null && ans != "" && ans != " ") {
	                userAns.push(ans);	
                }
            }
            if(userAns.length != trueAns.length)
            {
                Snackbar.show({
                text: 'Please fill the answers! It cant be empty',
                duration: 3000,
                backgroundColor: "#080c13",
                });
                return false;
            }
            var true_pair = 0;
            
            for (var i = 0; i < userAns.length; i++) {
                var inter ="#right-events .dummy";
                var crr_ans = userAns[i];
                var next_ans = userAns[i+1];
                var true_ans_pos = trueAns.indexOf(parseInt(crr_ans));
                var true_crr_ans = trueAns[true_ans_pos];
                var true_next_ans = trueAns[true_ans_pos+1];
                var svg = 0;
                if (true_crr_ans == crr_ans && true_next_ans == next_ans) {
                    if(userAns.length-1 != i){
                        true_pair +=1; 
                        $(inter).eq(i).css("border","solid green 1px");
                        $(inter).eq(i).css("background-color","#c1f881e3");
                        $(inter).eq(i).css("border-radius","5px");
                        $(inter).eq(i).css("font-weight","bolder");

                        $(inter).eq(i+1).css("border","solid green 1px");
                        $(inter).eq(i+1).css("background-color","#c1f881e3");
                        $(inter).eq(i+1).css("border-radius","5px");
                        $(inter).eq(i+1).css("font-weight","bolder");
                        svg = 1;
                    }else{
                        if(trueAns[i] == userAns[i] && trueAns[i-1] == userAns[i-1]){
                            $(inter).eq(i).css("border","solid green 1px");
                            $(inter).eq(i).css("background-color","#c1f881e3");
                            $(inter).eq(i).css("border-radius","5px");
                            $(inter).eq(i).css("font-weight","bolder");
                            svg = 1;
                        } else {
                            $(inter).eq(i).css("border","solid red 1px");
                            $(inter).eq(i).css("background-color","#ff766c8c");
                            $(inter).eq(i).css("border-radius","5px");
                            $(inter).eq(i).css("font-weight","bolder");
                        }
                    }
                }else{
                    $(inter).eq(i).css("border","solid red 1px");
                    $(inter).eq(i).css("background-color","#ff766c8c");
                    $(inter).eq(i).css("border-radius","5px");
                    $(inter).eq(i).css("font-weight","bolder");
                }

                if (i+1 != userAns.length) {
                    var pr = "pair"+i; 
                    document.getElementById(pr).hidden = false;
                    if(svg == 1){
                        var tr = "right_svg"+i; 

                    }else{
                        var tr = "wrong_svg"+i;
                    }
                    document.getElementById(tr).style.display = "inline-block";

                }
            }
            $("#submitbtn").attr("disabled",true);
        }
    </script>
    
    <script src="../../plugins/table/datatable/datatables.js"></script>
    <script src="../../plugins/blockui/custom-blockui.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../../plugins/highlight/highlight.pack.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/countdown/jquery.countdown.min.js"></script>
    <script src="../../plugins/drag-and-drop/dragula/dragula.min.js"></script>
    <script src="../../plugins/drag-and-drop/dragula/custom-dragula.js"></script>
     <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script> 
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
