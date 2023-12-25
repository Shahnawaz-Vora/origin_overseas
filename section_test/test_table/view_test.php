<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../../student/auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
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
if(isset($_GET['test_no']))
{
    $testno = $_GET['test_no'];
    include_once '../../database/dbh.inc.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>View Analyzed Test | Origin Overseas - PTE Tutors </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/switches.css">
    <link href="../../plugins/pricing-table/css/component.css" rel="stylesheet" type="text/css" />
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
    </style>
</head>
<body>
    
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
                                <li class="breadcrumb-item" aria-current="page"><a href="test_results.php"> Analyze Section Test </a></li>
                                <li class="breadcrumb-item" aria-current="page"> View Section Test </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php $test_name = mysqli_fetch_assoc(mysqli_query($conn , "SELECT test_name,total_question_entered from manage_section_test where test_no='$testno' ")); echo $test_name['test_name'] ; ?></li>
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
                            <div class="row" id="cancel-row">

                                <div class="col-lg-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row" style="padding: 20px">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <br><h1><b><?php echo $test_name['test_name']; ?></b></h1>
                                                </div>           
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="padding-top: 0px;margin-top: 0px">
                                            <div class="container">                                    
                                                <div id="pricingWrapper" class="row">
                                                    
                                                    <?php 
                                                        if($test_name['total_question_entered'] == 38){
                                                            echo'
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="card stacked mt-5">
                                                            <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                <span class="card-price">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mic"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg>
                                                                </span>
                                                                <h3 class="card-title mt-3 mb-1"><b>Speaking</b></h3>
                                                            </div>
                                                            <div class="card-body" style="padding-bottom: 0px">
                                                                <ul class="list-group list-group-minimal mb-3">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=speaking&type=read-aloud&testno='.$testno.'" style="padding: 0px">Read aloud</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=speaking&type=repeat-sentence&testno='.$testno.'" style="padding: 0px">Repeat sentence</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=speaking&type=describe-image&testno='.$testno.'"  style="padding: 0px">Describe image</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=speaking&type=re-tell-lecture&testno='.$testno.'"  style="padding: 0px">Re-tell lecture</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=speaking&type=answer-short-question&testno='.$testno.'"  style="padding: 0px">Answer short question</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';                              
                                                    } 




                                                    else if($test_name['total_question_entered'] == 4){
                                                            
                                                        echo '
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="card stacked mt-5">
                                                            <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                <span class="card-price">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                                                                </span>
                                                                <h3 class="card-title mt-3 mb-1"><b>Writing</b></h3>
                                                            </div>
                                                            <div class="card-body" style="padding-bottom: 0px">
                                                                <ul class="list-group list-group-minimal mb-3">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=writing&type=summarize-written-text&testno='.$testno.'"  style="padding: 0px">Summarize written text</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=writing&type=essay&testno='.$testno.'"  style="padding: 0px">Essay (20mins)</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a></a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a ></a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a  style="padding: 0px"></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        ';
                                                    }
                                                    
                                                    

                                                    else if($test_name['total_question_entered'] == 18){
                                                            
                                                        echo'
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="card stacked mt-5">
                                                            <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                <span class="card-price">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                                                </span>
                                                                <h3 class="card-title mt-3 mb-1"><b>Reading</b></h3>
                                                            </div>
                                                            <div class="card-body" style="padding-bottom: 0px">
                                                                <ul class="list-group list-group-minimal mb-3">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=reading&type=single-answer&testno='.$testno.'"  style="padding: 0px">Multiple-choice, choose single answer</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=reading&type=multiple-answers&testno='.$testno.'"  style="padding: 0px">Multiple-choice, choose multiple answers</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=reading&type=reorder-paragraph&testno='.$testno.'"  style="padding: 0px">Re-order paragraphs</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=reading&type=fill-in-the-blanks&testno='.$testno.'"  style="padding: 0px">Reading: Fill in the blanks</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=reading&type=reading-and-writing-fill-in-the-blanks&testno='.$testno.'"  style="padding: 0px">Reading and writing: Fill in the blanks</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        ';
                                                    }
                                                    
                                                    
                                                    
                                                    else if($test_name['total_question_entered'] == 21){
                                                            echo '
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="card stacked mt-5">
                                                            <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                <span class="card-price">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
                                                                </span>
                                                                <h3 class="card-title mt-3 mb-1"><b>Litening</b></h3>
                                                            </div>
                                                            <div class="card-body" style="padding-bottom: 0px">
                                                                <ul class="list-group list-group-minimal mb-3">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=summarize-spoken-text&testno='.$testno.'"  style="padding: 0px">Summarize spoken text</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=multiple-answers&testno='.$testno.'"  style="padding: 0px">Multiple Choice, Choose Multiple Answers</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=fill-in-the-blanks&testno='.$testno.'"  style="padding: 0px">Fill the blanks</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=highlight-correct-summary&testno='.$testno.'"  style="padding: 0px">Highlight the correct summary</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=single-answer&testno='.$testno.'"  style="padding: 0px">Multiple choice question Single Answer</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=select-missing-word&testno='.$testno.'"  style="padding: 0px">Select missing word</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=highlight-incorrect-words&testno='.$testno.'"  style="padding: 0px">Highlight incorrect words</a>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="view_test_table.php?section=listening&type=write-from-dictation&testno='.$testno.'"  style="padding: 0px">Write from dictation</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        ';
                                                    }else{
                                                        echo "Something went wrong please contect Admin";
                                                    }
                                                    ?>
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
            <div class="footer-wrapper">
                <div class="footer-section f-section-1 ml-auto">
                    <p class="">Copyright © 2020 <a target="_blank" href="#">Origin Overseas</a>, All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../../plugins/highlight/highlight.pack.js"></script>
    <script src="../../assets/js/custom.js"></script>
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
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
