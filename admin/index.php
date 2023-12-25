<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Admin Dashboard </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../assets/css/widgets/modules-widgets.css">    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->    
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    
    <!--  BEGIN NAVBAR  -->
    <?php include_once('header.php'); ?>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
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
            <div class="layout-px-spacing">
                <div class="container">
                    <div class="row sales layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-one">
                                <div class="widget-heading">
                                    <h5 class="">Students</h5>
                                    <ul class="tabs tab-pills">
                                        <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                    </ul>
                                </div>

                                <div class="widget-content">
                                    <div class="tabs tab-content">
                                        <div id="content_1" class="tabcontent"> 
                                            <div id="revenueMonthly"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row sales">

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget-two">
                                <div class="widget-content">
                                    <div class="w-numeric-value">
                                        <div class="w-content">
                                            <span class="w-value">Daily sales</span>
                                            <span class="w-numeric-title">Go to columns for details.</span>
                                        </div>
                                        <div class="w-icon">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="401.998px" height="401.998px" viewBox="0 0 401.998 401.998" style="enable-background:new 0 0 401.998 401.998;" xml:space="preserve"><g><path d="M326.62,91.076c-1.711-1.713-3.901-2.568-6.563-2.568h-48.82c-3.238-15.793-9.329-29.502-18.274-41.112h66.52 c2.669,0,4.853-0.856,6.57-2.565c1.704-1.712,2.56-3.903,2.56-6.567V9.136c0-2.666-0.855-4.853-2.56-6.567 C324.334,0.859,322.15,0,319.481,0H81.941c-2.666,0-4.853,0.859-6.567,2.568c-1.709,1.714-2.568,3.901-2.568,6.567v37.972 c0,2.474,0.904,4.615,2.712,6.423s3.949,2.712,6.423,2.712h41.399c40.159,0,65.665,10.751,76.513,32.261H81.941 c-2.666,0-4.856,0.855-6.567,2.568c-1.709,1.715-2.568,3.901-2.568,6.567v29.124c0,2.664,0.855,4.854,2.568,6.563 c1.714,1.715,3.905,2.568,6.567,2.568h121.915c-4.188,15.612-13.944,27.506-29.268,35.691 c-15.325,8.186-35.544,12.279-60.67,12.279H81.941c-2.474,0-4.615,0.905-6.423,2.712c-1.809,1.809-2.712,3.951-2.712,6.423v36.263 c0,2.478,0.855,4.571,2.568,6.282c36.543,38.828,83.939,93.165,142.182,163.025c1.715,2.286,4.093,3.426,7.139,3.426h55.672 c4.001,0,6.763-1.708,8.281-5.141c1.903-3.426,1.53-6.662-1.143-9.708c-55.572-68.143-99.258-119.153-131.045-153.032 c32.358-3.806,58.625-14.277,78.802-31.404c20.174-17.129,32.449-39.403,36.83-66.811h47.965c2.662,0,4.853-0.854,6.563-2.568 c1.715-1.709,2.573-3.899,2.573-6.563V97.646C329.193,94.977,328.335,92.79,326.62,91.076z"/></g></svg>

                                        </div>
                                    </div>
                                    <div class="w-chart">
                                        <div id="daily-sales"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget-three">
                                <div class="widget-heading">
                                    <h5 class="">Summary</h5>
                                </div>
                                <div class="widget-content">

                                    <div class="order-summary">

                                        <div class="summary-list">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                            </div>
                                            <div class="w-summary-details">
                                                <?php 
                                                    $sql2= mysqli_query($conn,"select sum(amount) as total_amount from test_purchase");
                                                    $result2 = mysqli_fetch_assoc($sql2);
                                                ?>
                                                <div class="w-summary-info">
                                                    <h6>Income</h6>
                                                    <p class="summary-count"><?php echo $result2['total_amount'];  ?></p>
                                                </div>

                                                <div class="w-summary-stats">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="summary-list">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                            </div>
                                            <div class="w-summary-details">
                                                <?php
                                                    $sql3 = mysqli_query($conn,"select count(distinct(test_no)) as total_test from test");
                                                    $result3 = mysqli_fetch_assoc($sql3);
                                                ?>
                                                <div class="w-summary-info">
                                                    <h6>Total Tests</h6>
                                                    <p class="summary-count"><?php echo $result3['total_test'];  ?></p>
                                                </div>

                                                <div class="w-summary-stats">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="summary-list">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                            </div>
                                            <div class="w-summary-details">
                                                <?php
                                                    $sql4 = mysqli_query($conn,"select count(distinct(test_no)) as free_test from free_test");
                                                    $result4 = mysqli_fetch_assoc($sql4);
                                                ?>
                                                <div class="w-summary-info">
                                                    <h6>Total Free Test Alloted</h6>
                                                    <p class="summary-count"><?php echo $result4['free_test'];  ?></p>
                                                </div>

                                                <div class="w-summary-stats">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget-one">
                                <div class="widget-content">
                                    <div class="w-numeric-value">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                        </div>
                                        <?php
                                            $sql5 = mysqli_query($conn,"select order_id from test_purchase");
                                        ?>
                                        <div class="w-content">
                                            <span class="w-value"><?php echo mysqli_num_rows($sql5); ?></span>
                                            <span class="w-numeric-title">Total Orders</span>
                                        </div>
                                    </div>
                                    <div class="w-chart">
                                        <div id="total-orders"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row sales">

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-table-two">

                                <div class="widget-heading">
                                    <h5 class="">Pending Test Check</h5>
                                </div>

                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><div class="th-content">Date</div></th>
                                                    <th><div class="th-content">Customer</div></th>
                                                    <th><div class="th-content">Product</div></th>
                                                    <th><div class="th-content">Invoice</div></th>
                                                    <th><div class="th-content">Price</div></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql6 = mysqli_query($conn,"select distinct(test_no),test_no,studentId,DATE_FORMAT(modify_date, '%d-%m-%Y') as test_date from user_test where marks is null and question_no=81 order by id desc limit 7");
                                                while($result6 = mysqli_fetch_assoc($sql6))
                                                {
                                                    $student_id = $result6['studentId'];
                                                    $test_no = $result6['test_no'];
                                                    $modify_date = $result6['test_date'];
                                                    $sql7 = mysqli_query($conn,"select * from student where studentId='$student_id'");
                                                    $result7= mysqli_fetch_assoc($sql7);
                                                    $sql8 = mysqli_query($conn,"select * from test_purchase where studentId='$student_id' and test_no='$test_no'");
                                                    $result8= mysqli_fetch_assoc($sql8);
                                                    $sql9 = mysqli_query($conn,"select test_name from manage_test where test_no='$test_no'");
                                                    $result9 = mysqli_fetch_assoc($sql9);
                                                    $test_name = $result9['test_name'];
                                                    if(isset($result8['order_id']))
                                                    {
                                                        $invoice_no = $result8['order_id'];
                                                        $price = $result8['amount'];
                                                        $status = "Paid";
                                                    }
                                                    else
                                                    {
                                                        $invoice_no = "No Invoice";
                                                        $price = 0;
                                                        $status = "Free";
                                                    }
                                                    echo '
                                                        <tr>
                                                            <td><div class="td-content customer-name">'.$modify_date.'</div></td>
                                                            <td><div class="td-content customer-name">'.$result7['firstName'].' '.$result7['lastName'].'</div></td>
                                                            <td><div class="td-content " >'.$test_name.'</div></td>
                                                            <td><div class="td-content">#'.$invoice_no.'</div></td>
                                                            <td><div class="td-content pricing"><span class="">'.$price.' ₹</span></div></td>
                                                        </tr>
                                                    ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-table-two">

                                <div class="widget-heading">
                                    <h5 class="">Contact Us</h5>
                                </div>

                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><div class="th-content ">Date</div></th> 
                                                    <th><div class="th-content ">Name</div></th>
                                                    <th><div class="th-content ">Email</div></th>
                                                    <th><div class="th-content th-heading">Message</div></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sql10 =mysqli_query($conn,"select * from contect_us");
                                                    while ($result10 = mysqli_fetch_assoc($sql10)) {
                                                        echo '<tr>
                                                                <td><div class="td-content product-name">'.date("d-m-Y",strtotime($result10["modify_date"])).'</div></td>
                                                                <td><div class="td-content product-name">'.$result10["name"].'</div></td>
                                                                <td><div class="td-content product-name"><a href="mailto:example@mail.com">'.$result10["email"].'</a></div></td>
                                                                <td><div class="td-content product-name" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1; -webkit-box-orient: vertical;width:90px;">'.$result10["message"].'s a as as as  as sa ssa</div></td>
                                                            </tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Speaking Material </h5>
                                        </div>
                                        <?php $sql12 = mysqli_query($conn,"select * from material_speaking"); ?>
                                        <p style="margin-top:-40px"><?php echo mysqli_num_rows($sql12); ?></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="manage_materials.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Manage Materials</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Writing Material </h5>
                                        </div>
                                        <?php $sql13 = mysqli_query($conn,"select * from material_writing"); ?>
                                        <p style="margin-top:-40px"><?php echo mysqli_num_rows($sql13); ?></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="manage_materials.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Manage Materials</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Reading Material </h5>
                                        </div>
                                        <?php $sql14 = mysqli_query($conn,"select * from material_reading"); ?>
                                        <p style="margin-top:-40px"><?php echo mysqli_num_rows($sql14); ?></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="manage_materials.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Manage Materials</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Listening Material </h5>
                                        </div>
                                        <?php $sql15 = mysqli_query($conn,"select * from material_listening"); ?>
                                        <p style="margin-top:-40px"><?php echo mysqli_num_rows($sql15); ?></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="manage_materials.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Manage Materials</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row sales layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-chart-one">
                                <div class="widget-heading">
                                    <h5 class="">Profit</h5>
                                    <ul class="tabs tab-pills">
                                        <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                    </ul>
                                </div>

                                <div class="widget-content">
                                    <div class="tabs tab-content">
                                        <div id="content_1" class="tabcontent"> 
                                            <div id="profit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Create Material </h5>
                                        </div>
                                        <p style="margin-top:-40px"></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="add_material.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Create Material</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Update Material </h5>
                                        </div>
                                        <p style="margin-top:-40px"></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="manage_materials.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Update Material</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Create Test </h5>
                                        </div>
                                        <p style="margin-top:-40px"></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="test/"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Create Test</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                            <div class="widget widget-account-invoice-two">
                                <div class="widget-content">
                                    <div class="account-box">
                                        <div class="info">
                                            <h5 class="">Update Test </h5>
                                        </div>
                                        <p style="margin-top:-40px"></p>
                                        <div class="acc-action">
                                            <div class="">
                                                <a href="manage_test_table.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Update Test</a>
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
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../plugins/apex/apexcharts.min.js"></script>
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
    <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
<?php
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    // $date = $year."-".$month."-".$day;
    $tot_month = [];
    $total_month = 0;
    for($i=1;$i<=12;$i++)
    {
        $sql = mysqli_query($conn,"SELECT * from student where month(joinDate)='$i' and year(joinDate)='$year'");
        $result = mysqli_fetch_assoc($sql);
        if(mysqli_num_rows($sql)>=1)
        {
            array_push($tot_month,mysqli_num_rows($sql));
        }
        else
        {
            array_push($tot_month,0);
        }
        $total_month += mysqli_num_rows($sql);
    }
?>
<script type="text/javascript">
     
/*
    =================================
        Revenue Monthly | Options
    =================================
*/
var options1 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
  },
  colors: ['#1b55e2'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Total Students',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: '<?php echo $total_month; ?>',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Students',
      data: [<?php echo implode(",", $tot_month); ?>]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      offsetX: -20,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}
var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);

chart1.render();


/*
    =============================
        Daily Sales | Options
    =============================
*/
<?php
$week_day = date("w");
if($week_day >= 1)
{
    $firstDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-7);
    $lastDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-1);
    $first = date("Y-m-d",$firstDayOfLastWeek);
    $last = date("Y-m-d",$lastDayOfLastWeek);
}
else
{
    $firstDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-7);
    $lastDayOfLastWeek = mktime(0,0,0,date("m"),date("d")-date("w")-1);
    $first = date("Y-m-d",$firstDayOfLastWeek);
    $last = date("Y-m-d",$lastDayOfLastWeek);
}
$last_week =[];
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=6 ");
$last_week[0] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=0 ");
$last_week[1] = mysqli_num_rows($sql1);  
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=1 ");
$last_week[2] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=2 ");
$last_week[3] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=3 ");
$last_week[4] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=4 ");
$last_week[5] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=5 ");
$last_week[6] = mysqli_num_rows($sql1);


$firstDayOfThisWeek = mktime(0,0,0,date("m"),date("d")-date("w"));
$lastDayOfThisWeek = mktime(0,0,0,date("m"),date("d")-date("w")+6);
$first = date("Y-m-d",$firstDayOfThisWeek);
$last = date("Y-m-d",$lastDayOfThisWeek);
$current_Week=[];
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=6 ");
$current_week[0] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=0 ");
$current_week[1] = mysqli_num_rows($sql1);  
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=1 ");
$current_week[2] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=2 ");
$current_week[3] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=3 ");
$current_week[4] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=4 ");
$current_week[5] = mysqli_num_rows($sql1);
$sql1=mysqli_query($conn,"select payment_time from test_purchase where date(payment_time) >= '$first' and date(payment_time) <= '$last' and weekday(payment_time)=5 ");
$current_week[6] = mysqli_num_rows($sql1);
?>

var d_2options1 = {
  chart: {
        height: 160,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false,
        }
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 1,
    },
    colors: ['#e2a03f', '#e0e6ed'],
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
            }
        }
    }],
    series: [{
        name: 'Sales',
        data: [<?php echo implode(",", $current_week); ?>]
    },{
        name: 'Last Week',
        data: [<?php echo implode(",", $last_week); ?>]
    }],
    xaxis: {
        labels: {
            show: false,
        },
        categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    },
    yaxis: {
        show: false
    },
    fill: {
        opacity: 1
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '25%',
        }
    },
    legend: {
        show: false,
    },
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: false
            }
        },
        padding: {
          top: 10,
          right: 0,
          bottom: -40,
          left: 0
        }, 
    },
}

var d_2C_1 = new ApexCharts(document.querySelector("#daily-sales"), d_2options1);
d_2C_1.render();


/*
    =============================
        Total Orders | Options
    =============================
*/
<?php
    $month_orders = [];
    $total_orders = 0;
    for($i=1;$i<=12;$i++)
    {
        $sql16 = mysqli_query($conn,"SELECT order_id as total_orders from test_purchase where month(payment_time)='$i' and year(payment_time)='$year'");
        $result16 = mysqli_fetch_assoc($sql16);
        if(mysqli_num_rows($sql16)>= 1)
        {
            array_push($month_orders,mysqli_num_rows($sql16));
        }
        else
        {
            array_push($month_orders,0);
        }
    }
?>
var d_2options2 = {
  chart: {
    id: 'sparkline1',
    group: 'sparklines',
    type: 'area',
    height: 280,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Sales',
    data: [<?php echo implode(",", $month_orders); ?>]
  }],
  labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
  yaxis: {
    min: 0
  },
  grid: {
    padding: {
      top: 125,
      right: 0,
      bottom: 36,
      left: 0
    }, 
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .40,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  tooltip: {
    x: {
      show: false,
    },
    theme: 'dark'
  },
  colors: ['#fff']
}

var d_2C_2 = new ApexCharts(document.querySelector("#total-orders"), d_2options2);
d_2C_2.render();




/*
    =================================
        Profit | Options
    =================================
*/

<?php
    $month_profit = [];
    $total_profit = 0;
    for($i=1;$i<=12;$i++)
    {
        $sql11 = mysqli_query($conn,"SELECT sum(amount) as total_profit from test_purchase where month(payment_time)='$i' and year(payment_time)='$year'");
        $result11 = mysqli_fetch_assoc($sql11);
        if($result11['total_profit'] != 0)
        {
            array_push($month_profit,$result11['total_profit']);
            $total_profit += $result11['total_profit'];
        }
        else
        {
            array_push($month_profit,0);
        }
    }
?>


var options2 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
  },
  colors: ['#1b55e2'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Total Revenue',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: '<?php echo $total_profit; ?>',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Revenue',
      data: [<?php echo implode(",", $month_profit); ?>]
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return (value / 1000) + 'K'
      },
      offsetX: -12,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}
var chart2 = new ApexCharts(
    document.querySelector("#profit"),
    options2
);

chart2.render();

</script>
<?php
if(isset($_GET['change']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Password Changed Successfully', duration: 4000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("change");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['login']))
{
?>
    <script type="text/javascript"> 
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            padding: '2em'
        });
        toast({
            type: 'success',
            title: 'Signed in successfully',
            padding: '2em',
        })
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("login");
        history.pushState(null, null, "?"+queryParams.toString());
    </script>
<?php
}
?>