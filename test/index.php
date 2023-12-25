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
$student_id = $_COOKIE['studentId'];
error_reporting(0);
//latest test
$sql = "SELECT test_no FROM manage_test where test_no NOT IN (SELECT test_no FROM free_test where student_id='$student_id') AND test_no NOT IN (SELECT test_no from test_purchase where studentId='$student_id') AND status=1 ORDER BY id DESC";
$run = mysqli_query($conn,$sql);
$tot_latest_test = mysqli_num_rows($run);
//free test
$sql1 = "SELECT test_no FROM free_test where student_id='$student_id'";
$run1 = mysqli_query($conn,$sql1);
$tot_free_test = mysqli_num_rows($run1);
//purchased test
$sql2 ="SELECT test_no from test_purchase where test_no NOT IN (SELECT test_no FROM free_test where student_id='$student_id') AND studentId='$student_id'";
$run2 = mysqli_query($conn,$sql2);
$tot_purchased_test = mysqli_num_rows($run2);
$tab = "latest";
if(isset($_GET['tab'])){
    $tab = $_GET['tab'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="windows-1252">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Test | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Manage Test Page">
    <meta name="keywords" content="Manage Test, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../plugins/editors/quill/quill.snow.css">
    <link href="../assets/css/apps/todolist.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body>
    <?php
        echo include_once('index_navbar.php');
    ?>
    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><span>Test</span></li>
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
            include_once('index_sidebar.php');
        ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="mail-box-container">
                                    <div class="mail-overlay"></div>

                                    <div class="tab-title">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                                <h5 class="app-title">Test</h5>
                                            </div>

                                            <div class="todoList-sidebar-scroll">
                                                <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions <?php if($tab == "latest"){echo "active"; } ?>" id="all-list" data-toggle="pill" href="#pills-inbox" role="tab" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg> Latest <span ></span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link list-actions <?php if($tab == "purchased"){echo "active"; } ?>" id="todo-task-important" data-toggle="pill" href="#pills-important" role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg> Purchased <span ></span></a>
                                                        </li>
                                                        <?php
                                                        if($tot_free_test != 0)
                                                        {
                                                            ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link list-actions <?php if($tab == "free"){echo "active"; } ?>" id="todo-task-trash" data-toggle="pill" href="#pills-trash" role="tab" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg> Free </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="todo-inbox" class="accordion todo-inbox">
                                        <div class="search">
                                            <input type="text" class="form-control input-search" placeholder="Search Here...">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                        </div>
                                
                                        <div class="todo-box">
                                            
                                            <div id="ct" class="todo-box-scroll">
                                                        <?php 
                                                            if($tot_latest_test == 0)
                                                            {
                                                                if($tab == "latest"){
                                                                    echo '<div class="todo-item all-list" style="display:block">';
                                                                }else{
                                                                    echo '<div class="todo-item all-list" style="display:none">';
                                                                }

                                                                echo'<div class="todo-item-inner"><div class="n-chk text-center"></div><div class="col-xl-12 col-md-12 col-sm-12 col-12" style="height:300px">
                                                                    <center style="margin-top:15%;color:black;font-size:1.3em">There is no latest test for you !!! </center>
                                                                </div></div></div>';
                                                            } 
                                                            else{
                                                                $i=0;
                                                                $j=0;
                                                                while($row = mysqli_fetch_assoc($run)) {
                                                                    if($tab == "latest"){
                                                                        echo '<div class="todo-item all-list" style="display:block">';
                                                                    }else{
                                                                        echo '<div class="todo-item all-list" style="display:none">';
                                                                    }
                                                                    ?>
                                                                        <div class="todo-item-inner">
                                                                            <div class="n-chk text-center">
                                                                                
                                                                            </div>
                                                                        <?php
                                                                            $i+=1;
                                                                            $test_no = $row['test_no'];
                                                                            $sql1 = mysqli_fetch_assoc(mysqli_query($conn,"select * from manage_test where test_no='$test_no' ")); 
                                                                            
                                                                            echo '
                                                                            <div class="todo-content" style="margin-top: 10px;">
                                                                                <div id="test-svg" class="d-lg-none d-md-none d-sm-none d-xl-inline-block">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#c8d6f8" stroke="#1b55e2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay d-inline-block"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                                                                </div>
                                                                                <h5 class="todo-heading ml-2 d-inline-block">'.$sql1['test_name'].'</h5>
                                                                            </div>
                                                                            <div class="priority-dropdown custom-dropdown-icon font-weight-bold mr-2" style="margin-top: 10px;color:black;">
                                                                                '.$sql1['test_price'].'&nbsp;₹
                                                                            </div>
                                                                            <div class="priority-dropdown custom-dropdown-icon mr-2  w-25" align="center">
                                                                                <button type="button" class="btn btn-outline-info d-inline-block" id="test_button" onclick=setId("'.$test_no.'")>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg><span class="ml-2" id="buy">Buy</span></button>
                                                                            </div>'; ?>
                                                                        </div>
                                                                    </div><?php
                                                                    if($j>=4){
                                                                        $j=0;
                                                                    }else{
                                                                        $j++;
                                                                    }
                                                                }
                                                            }
                                                        ?>

                                                <!-- purchased test -->
                                                
                                                        <?php 
                                                            if($tot_purchased_test == 0)
                                                            {
                                                                if($tab == "purchased"){
                                                                    echo '<div class="todo-item todo-task-important" style="display: block;">';
                                                                }else{
                                                                    echo '<div class="todo-item todo-task-important" style="display: none;">';
                                                                }
                                                                echo'   <div class="todo-item-inner">
                                                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="height:300px">
                                                                                <center style="margin-top:15%;color:black;font-size:1.3em">
                                                                                    You have not purchased any test yet !!! 
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>';
                                                            } 
                                                            else
                                                            {    
                                                                $i=0;
                                                                $j=0;
                                                                $colors=array("warning","danger","primary","info","success");
                                                                while($row2 = mysqli_fetch_assoc($run2)) {
                                                                    if($tab == "purchased"){
                                                                        echo '<div class="todo-item todo-task-important" style="display: block;">';
                                                                    }else{
                                                                        echo '<div class="todo-item todo-task-important" style="display: none;">';
                                                                    }
                                                                    ?>
                                                                        <div class="todo-item-inner">
                                                                            <?php
                                                                                $i+=1; 
                                                                                $test_no = $row2['test_no'];
                                                                                $sql1 = mysqli_fetch_assoc(mysqli_query($conn,"select * from manage_test where test_no='$test_no' "));
                                                                                $time1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user_test where studentId='$student_id' and test_no='$test_no' order by id desc limit 1"));
                                                                                $per = (($time1['question_no']*100)/81)."%";
                                                                                echo '<div class="n-chk text-center" onclick=redirectTest("'.$row2['test_no'].'","'.$time1['question_no'].'")>';
                                                                                if(isset($time1['question_no']) && $time1['question_no'] < 81 && $time1['question_no'] >= 1)
                                                                                {
                                                                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#343a40" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pause-circle ml-2"><circle cx="12" cy="12" r="10"></circle><line x1="10" y1="15" x2="10" y2="9"></line><line x1="14" y1="15" x2="14" y2="9"></line></svg></button>';
                                                                                }
                                                                                else if(isset($time1['question_no']) && $time1['question_no'] == 81)
                                                                                {
                                                                                     echo '
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#343a40" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle ml-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></button>';
                                                                                }
                                                                                else
                                                                                {
                                                                                     echo '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#343a40" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle ml-2"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg></button>';
                                                                                }
                                                                                echo '
                                                                                </div>
                                                                                <div class="todo-content" onclick=redirectTest("'.$row2['test_no'].'","'.$time1['question_no'].'")>
                                                                                    <h5 class="todo-heading" data-todoHeading="'.$sql1['test_name'].'">'.$sql1['test_name'].'</h5>
                                                                                    <p class="todo-text" data-todoHtml="<p>Last Attempted Section: '.$time1['section'].'</p><p>Last Attempted Question Type: '.ucwords(str_replace("-"," ",$time1['type'])).'</p><p>Last Attempted Question No: '.$time1['question_no'].'</p><p>Last Attempted Time: '.$time1['modify_date'].'</p>"></p>
                                                                                    <p class="meta-date">Question Remaining: ';
                                                                                    if (isset($time1['question_no'])) {
                                                                                        $rem_que = 81-$time1['question_no'];
                                                                                        echo $rem_que;
                                                                                    }
                                                                                    else{
                                                                                        echo "81";
                                                                                    }
                                                                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duration Remaining: ';
                                                                                    if (isset($time1['remaining_time'])) 
                                                                                    {
                                                                                        echo $time1['remaining_time'];
                                                                                    }
                                                                                    else{
                                                                                        echo "03:00:00";
                                                                                    }
                                                                                    echo '
                                                                                    </p>
                                                                                    <p class="meta-date">
                                                                                        <div class="progress w-75 mt-3 br-30 progress-sm" style="margin-bottom: -17px;">
                                                                                            <div class="progress-bar bg-info" role="progressbar" style="width:'.$per.'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">        
                                                                                            </div>
                                                                                        </div>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="priority-dropdown custom-dropdown-icon mr-2">
                                                                                    
                                                                                </div>
                                                                                <div class="priority-dropdown custom-dropdown-icon mr-3">
                                                                                    <div class=" p-dropdown">
                                                                                        <a class="dropdown-toggle '.$colors[$j].'" role="button" data-toggle="modal" data-target="#info" id="dropdownMenuLink-1" onclick=getModalData("'.str_replace(" ","&nbsp",$sql1['test_name']).'","'.$time1['section'].'","'.ucwords(str_replace("-","&nbsp",$time1['type'])).'","'.$time1['question_no'].'","'.$time1['modify_date'].'")>
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line>
                                                                                            </svg>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>';  
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    if($j>=4){
                                                                        $j=0;
                                                                    }else{
                                                                        $j++;
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                        
                                                 

                                                <!--free test -->
                                                
                                                <?php 
                                                    if($tot_free_test == 0)
                                                    {
                                                        ?>
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="height:300px;<?php if($tab=="free"){ echo "display:block"; }else{ echo "display:none"; } ?>">
                                                            <center style="margin-top:15%;color:black;font-size:1.3em">You not have any free test !!! </center>
                                                        </div>
                                                        <?php
                                                    }
                                                    else
                                                    {    
                                                        $i=0;
                                                        while($row1 = mysqli_fetch_assoc($run1)) {
                                                            ?>
                                                            <div class="todo-item todo-task-trash" style="<?php if($tab=="free"){ echo "display:block"; }else{ echo "display:none"; } ?>">
                                                                <div class="todo-item-inner">
                                                                    <?php
                                                                    $i+=1; 
                                                                    $test_no = $row1['test_no'];
                                                                    $sql1 = mysqli_fetch_assoc(mysqli_query($conn,"select * from manage_test where test_no='$test_no' "));
                                                                    $time = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user_test where studentId='$student_id' and test_no='$test_no' order by id desc limit 1"));
                                                                    $per = (($time['question_no']*100)/81)."%";
                                                                    $colors=array("warning","danger","primary","info","success");
                                                                    echo '<div class="n-chk text-center" onclick=redirectTest("'.$row1['test_no'].'","'.$time['question_no'].'")>';
                                                                    if(isset($time['question_no']) && $time['question_no'] < 81 && $time['question_no'] >= 1)
                                                                    {
                                                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#343a40" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pause-circle ml-2"><circle cx="12" cy="12" r="10"></circle><line x1="10" y1="15" x2="10" y2="9"></line><line x1="14" y1="15" x2="14" y2="9"></line></svg>';
                                                                    }
                                                                    else if(isset($time['question_no']) && $time['question_no'] == 81)
                                                                    {
                                                                         echo '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#343a40" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle ml-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
                                                                    }
                                                                    else
                                                                    {
                                                                         echo '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#343a40" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle ml-2"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>';
                                                                    }
                                                                    echo '
                                                                    </div>
                                                                    <div class="todo-content" onclick=redirectTest("'.$row1['test_no'].'","'.$time['question_no'].'")>
                                                                        <h5 class="todo-heading" data-todoHeading="'.$sql1['test_name'].'">'.$sql1['test_name'].'</h5>
                                                                        <p class="meta-date">Question Remaining: ';
                                                                        if (isset($time['question_no'])) {
                                                                            $rem_que = 81-$time['question_no'];
                                                                            echo $rem_que;
                                                                        }
                                                                        else{
                                                                            echo "81";
                                                                        }
                                                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duration Remaining: ';
                                                                        if (isset($time['remaining_time'])) 
                                                                        {
                                                                            echo $time['remaining_time'];
                                                                        }
                                                                        else{
                                                                            echo "03:00:00";
                                                                        }
                                                                        echo '
                                                                        </p>
                                                                            <p class="meta-date">
                                                                            <div class="progress w-75 mt-3 br-30 progress-sm" style="margin-bottom: -17px;">
                                                                                <div class="progress-bar bg-info" role="progressbar" style="width:'.$per.'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">        
                                                                                </div>
                                                                            </div>
                                                                        </p>
                                                                    </div>
                                                                    <div class="priority-dropdown custom-dropdown-icon mr-2">
                                                                                    
                                                                    </div>
                                                                    <div class="priority-dropdown custom-dropdown-icon mr-3">
                                                                        <div class=" p-dropdown">
                                                                            <a class="dropdown-toggle '.$colors[$j].'" role="button" data-toggle="modal" data-target="#info" id="dropdownMenuLink-1" onclick=getModalData("'.str_replace(" ","&nbsp",$sql1['test_name']).'","'.$time['section'].'","'.ucwords(str_replace("-","&nbsp",$time['type'])).'","'.$time['question_no'].'","'.$time['modify_date'].'")>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line>
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                    </div>';  ?>
                                                                </div>
                                                            </div><?php
                                                            if($j>=4){
                                                                $j=0;
                                                            }else{
                                                                $j++;
                                                            }
                                                        }

                                                    }
                                                ?>
                                                    
                                            </div>

                                            <!-- data for modal -->
                                            <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            <div class="compose-box">
                                                                <div class="compose-content">
                                                                    <h5 class="task-heading" id="test-name"></h5>
                                                                    <p class="task-text" id="test-details"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal">Close</button>
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
            <div class="footer-wrapper">
                <div class="footer-section f-section-1 ml-auto">
                    <p class="">Copyright © 2020 <a target="_blank" href="#">Origin Overseas</a>, All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
    <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../plugins/sweetalerts/custom-sweetalert.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script type="text/javascript">
        function getModalData(name,section,type,question,dt)
        {   
            $("#test-name").html(name);
            if(question == 81)
            {
                $("#test-details").html('<p class="text-center font-weight-bold">Test Completed</p>');
            }
            else if(question == "" || question == " " || question == null)
            {
                $("#test-details").html('<p class="text-center font-weight-bold">Test not started yet!</p>');
            }
            else
            {
                $("#test-details").html('<p>Last Attempted Section:'+section+'</p><p>Last Attempted Question Type:'+type+'</p><p>Last Attempted Question No: '+question+'</p><p>Last Attempted Time: '+dt+'</p>');
            }
        }                              
        function setId(testno)
        {
            var test_no = testno;
            location.href='cashfree/checkout.php?test_no='+test_no;
        }
    </script>
    <script type="text/javascript">
        //free test
        function redirectTest(testno,question){
            if(question < 81)
            {
                <?php
                $useragent=$_SERVER['HTTP_USER_AGENT'];
                if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
                    ?> Snackbar.show({ text: 'Please give Test Using Desktop or Laptop!', duration: 4000, });<?php
                }else{
                ?>
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        data: {testno:testno},
                        success: function (response) {
                            var tot_ques = parseInt(response);
                            if(tot_ques <= 81 && tot_ques >= 1)
                            {
                                tot_ques+=1;
                                window.open("headphone.php?testno="+testno+"&question="+tot_ques+"&non_timer=1","_blank","height="+screen.availHeight+",width="+screen.availWidth+",status=yes,toolbar=no,menubar=no,location=no,addressbar=no,top=200,left=300");
                            }
                            else
                            {
                                window.open("headphone.php?testno="+testno+"&non_timer=1","_blank","height="+screen.availHeight+",width="+screen.availWidth+",status=yes,toolbar=no,menubar=no,location=no,addressbar=no,top=200,left=300");
                            }
                        }
                    });
                <?php
                }
                ?>
            }
            else
            {
                Snackbar.show({ text: 'Test is Already Given!', duration: 4000, });
            }
        }
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="../assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="../plugins/editors/quill/quill.js"></script>
    <script src="../assets/js/apps/todoList.js"></script>
</body>
</html>
<?php
if(isset($_GET['paymentfailed']))
{   
    ?><script>
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: 'Please try again later !',
        padding: '2em'
      })
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("paymentfailed");
        history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['paymentsuccess']))
{
    ?><script>
    swal({
        title: 'Payment Done!',
        text: "Now you can explore test 😃",
        type: 'success',
        padding: '2em'
    })
    $('[href="#animated-underline-purchased"]').tab('show');
     var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("paymentsuccess");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>