<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<?php
    include_once '../database/dbh.inc.php';
    if(isset($_GET['testno']))
    {
        $testno = $_GET['testno'];
        ?><script type="text/javascript">var test_no='<?php echo $testno; ?>';</script><?php
    }
    else
    {
        ?><script type="text/javascript">location.replace("manage_section_test_table.php");</script><?php
    }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Test | Origin Overseas - PTE Tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">
    <link href="../plugins/pricing-table/css/component.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css" media="screen">  
    </style>
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
        include_once 'header.php';
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <?php 
                            $sql5 = mysqli_query($conn,"select * from manage_section_test where test_no = '$testno'");
                            $row5 = mysqli_fetch_assoc($sql5);
                        ?>
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="manage_section_test_table.php">Manage Tests</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span><?php echo $row5['test_name']; ?></span></li>
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
                                <div class="widget-header">
                                    <div class="row" style="padding: 20px">
                                        <div class="col-xl-11 col-md-11 col-sm-10 ">
                                            <h3><b>Test Name : <?php echo $row5['test_name']; ?></b></h3>

                                        </div>
                                        <div class="col-xl-1 col-md-1 col-sm-2">
                                            <div class="add-s-task">
                                                <a class="addTask" style="cursor: pointer;"><img src="../assets/img/pencil.png" width="30px;"></a>
                                            </div>
                                        </div>             
                                    </div>
                                </div>
                                
                                <div class="widget-content widget-content-area" style="padding-top: 0px;margin-top: 0px">
                                    <div class="container">                                    
                                        <div id="pricingWrapper" class="row">
                                            <?php
                                                $section_query = mysqli_query($conn,"SELECT distinct section from section_test where test_no='$testno'");
                                                $section_result = mysqli_fetch_assoc($section_query);
                                                $section_type = $section_result['section'];
                                            
                                            if($section_type == "speaking")
                                            {
                                                echo '<div class="col-md-12 col-lg-12">
                                                            <div class="card stacked mt-5">
                                                                <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                    <span class="card-price">
                                                                        <svg style="margin-top: 28px;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mic"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line></svg>
                                                                    </span>
                                                                    <h3 class="card-title mt-3 mb-1"><b>Speaking</b></h3>
                                                                </div>
                                                                <div class="card-body" style="padding-bottom: 0px">
                                                                    <ul class="list-group list-group-minimal mb-3">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=speaking&testno='.$testno.'&type=read-aloud" style="padding: 0px">Read aloud</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=speaking&testno='.$testno.'&type=repeat-sentence" style="padding: 0px">Repeat sentence</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=speaking&testno='.$testno.'&type=describe-image"  style="padding: 0px">Describe image</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=speaking&testno='.$testno.'&type=re-tell-lecture"  style="padding: 0px">Re-tell lecture</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=speaking&testno='.$testno.'&type=answer-short-question"  style="padding: 0px">Answer short question</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>';                              

                                            }
                                            if($section_type == "writing")
                                            {
                                                echo '<div class="col-md-12 col-lg-12">
                                                            <div class="card stacked mt-5">
                                                                <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                    <span class="card-price">
                                                                        <svg style="margin-top: 28px;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                                                                    </span>
                                                                    <h3 class="card-title mt-3 mb-1"><b>Writing</b></h3>
                                                                </div>
                                                                <div class="card-body" style="padding-bottom: 0px">
                                                                    <ul class="list-group list-group-minimal mb-3">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=writing&testno='.$testno.'&type=summarize-written-text"  style="padding: 0px">Summarize written text</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=writing&testno='.$testno.'&type=essay"  style="padding: 0px">Essay (20mins)</a>
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
                                                        </div>'; 
                                            }
                                            if($section_type == "reading")
                                            {
                                                echo '<div class="col-md-12 col-lg-12">
                                                            <div class="card stacked mt-5">
                                                                <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                    <span class="card-price">
                                                                        <svg style="margin-top: 28px;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                                                    </span>
                                                                    <h3 class="card-title mt-3 mb-1"><b>Reading</b></h3>
                                                                </div>
                                                                <div class="card-body" style="padding-bottom: 0px">
                                                                    <ul class="list-group list-group-minimal mb-3">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=reading&testno='.$testno.'&type=single-answer"  style="padding: 0px">Multiple-choice, choose single answer</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=reading&testno='.$testno.'&type=multiple-answers"  style="padding: 0px">Multiple-choice, choose multiple answers</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=reading&testno='.$testno.'&type=reorder-paragraph"  style="padding: 0px">Re-order paragraphs</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=reading&testno='.$testno.'&type=fill-in-the-blanks"  style="padding: 0px">Reading: Fill in the blanks</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=reading&testno='.$testno.'&type=reading-and-writing-fill-in-the-blanks"  style="padding: 0px">Reading and writing: Fill in the blanks</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a></a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a></a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a  style="padding: 0px"></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>';
                                            }
                                            if($section_type == "listening") 
                                            {
                                                echo '<div class="col-md-12 col-lg-12">
                                                            <div class="card stacked mt-5">
                                                                <div class="card-header pt-0" style="padding-bottom: 5px">
                                                                    <span class="card-price">
                                                                        <svg style="margin-top: 28px;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
                                                                    </span>
                                                                    <h3 class="card-title mt-3 mb-1"><b>Litening</b></h3>
                                                                </div>
                                                                <div class="card-body" style="padding-bottom: 0px">
                                                                    <ul class="list-group list-group-minimal mb-3">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=summarize-spoken-text"  style="padding: 0px">Summarize spoken text</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=multiple-answers"  style="padding: 0px">Multiple Choice, Choose Multiple Answers</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=fill-in-the-blanks"  style="padding: 0px">Fill the blanks</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=highlight-correct-summary"  style="padding: 0px">Highlight the correct summary</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=single-answer"  style="padding: 0px">Multiple choice question Single Answer</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=select-missing-word"  style="padding: 0px">Select missing word</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=highlight-incorrect-words"  style="padding: 0px">Highlight incorrect words</a>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center"><a href="manage_section_test_question_table.php?section=listening&testno='.$testno.'&type=write-from-dictation"  style="padding: 0px">Write from dictation</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>';
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
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <!--modal-->
    <form action="" method="post">
        <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="compose-box">
                            <div class="compose-content" id="addTaskModalTitle">
                                <h5 class="add-task-title">Edit Test Details</h5>
                                
                                    <div class="addTaskAccordion" id="add_task_accordion">
                                        <div class="card task-simple">
                                            <div class="card-header" id="headingOne">
                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Test Name </div>
                                            </div>
                                            
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#add_task_accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="task-title mb-4" id="task1">
                                                                <svg id="svg1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                <input id="s-simple-task" name="test_name" type="text" placeholder="Test Name" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card task-text-progress">
                                            <div class="card-header" id="headingTwo">
                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Test Price </div>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#add_task_accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="task-title mb-4" id="task2">
                                                                <svg id="svg2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                <input id="s-simple-task1" name="test_price" type="text" placeholder="Test Price" class="form-control" pattern="[+-]?([0-9]*[.])?[0-9]+">
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
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> Discard</button>
                        <button data-btnfn="addTask" class="btn add-tsk" type="submit" name="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end modal -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script type="text/javascript">
        $(".addTask").click(function(event) {
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {test_no:test_no},
                success: function (response) {
                    var obj = JSON.parse(response);
                    console.log(obj.name);
                    console.log(obj.price);
                    $("#s-simple-task").remove();
                    $("#s-simple-task1").remove();
                    $("#task1").append('<input id="s-simple-task" name="test_name" type="text" placeholder="Test Name" class="form-control" value="'+obj.name+'">');
                    $("#task2").append('<input id="s-simple-task1" name="test_price" type="text" placeholder="Test Price" pattern="[+-]?([0-9]*[.])?[0-9]+" class="form-control" value='+obj.price+' >'); 
                }
            });
        });
    </script>
    <script src="../plugins/highlight/highlight.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="../assets/js/apps/scrumboard.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $test_name = trim(mysqli_escape_string($conn,$_POST['test_name']));
        $test_price = trim(mysqli_escape_string($conn,$_POST['test_price']));
        $sql = mysqli_query($conn,"update manage_section_test set test_name='$test_name' , test_price='$test_price' where test_no='$testno'");
        if($sql == true)
        {
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else
        {
            ?><script type="text/javascript">alert("There is some error . Please Try Again Later");</script><?php
        }
    }
?>