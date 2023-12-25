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
    <title>Invoices | Origin Overseas </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php 
        include_once "header.php";
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Invoices</span></li>
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
            include_once('sidebar.php');
        ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="app-hamburger-container">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                            </div>
                            <div class="doc-container">
                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="search">
                                                <input type="text" class="form-control" placeholder="Search...">
                                            </div>
                                            <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                                
                                            <?php 
                                            include_once '../database/dbh.inc.php';
                                            $query = "(SELECT * from test_purchase ORDER BY order_id DESC)
                                            UNION
                                            (SELECT * from section_test_purchase ORDER BY order_id DESC)";

                                            $sql = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($sql)) {
                                                echo'
                                                <li class="nav-item">
                                                    <div class="nav-link list-actions" id="'.$row['order_id'].'" data-invoice-id="'.$row['order_id'].'">
                                                        <div class="f-m-body">
                                                            <div class="f-head">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                            </div>';
                                                            $studentId = $row['studentId'];
                                                            $student_sql = mysqli_query($conn,"SELECT firstName, lastName FROM student WHERE studentId=$studentId ");
                                                            $student = mysqli_fetch_assoc($student_sql);
                                                            echo '<div class="f-body">
                                                                <p class="invoice-number">Invoice '.$row['order_id'].'</p>
                                                                <p class="invoice-customer-name"><span>To:</span> '.$student['firstName']." ".$student['lastName'].'</p>
                                                                <p class="invoice-generated-date">Date: '.$row['payment_time'].'</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>';
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-container">
                                    <div class="invoice-inbox">

                                        <div class="inv-not-selected">
                                            <p>Open an invoice from the list.</p>
                                        </div>

                                        <div class="invoice-header-section">
                                            <h4 class="inv-number"></h4>
                                            <div class="invoice-action">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Print"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            </div>
                                        </div>
                                        
                                        <div id="ct" class="">
                                            <?php
                                            $sql = mysqli_query($conn,"SELECT * FROM test_purchase ORDER BY order_id DESC");
                                            while($row = mysqli_fetch_assoc($sql)) {
                                                echo'
                                                <div class="'.$row['order_id'].'">
                                                    <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                        <div class="row inv--head-section">

                                                            <div class="col-sm-6 col-12">
                                                                <h3 class="in-heading">INVOICE</h3>
                                                            </div>
                                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                                <div class="company-info">
                                                                    <img src="../assets/img/90x90.png">
                                                                    <h5 class="inv-brand-name">Origin<br>Overseas</h5>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row inv--detail-section">

                                                            <div class="col-sm-7 align-self-center">
                                                                <p class="inv-to">Invoice To</p>
                                                            </div>
                                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                                <p class="inv-detail-title">From : Origin Overseas</p>
                                                            </div>
                                                            ';
                                                            $studentId = $row['studentId'];
                                                            $student_sql = mysqli_query($conn,"SELECT * FROM student WHERE studentId=$studentId ");
                                                            $student = mysqli_fetch_assoc($student_sql);
                                                            echo '<div class="col-sm-7 align-self-center">
                                                                <p class="inv-customer-name">'.$student['firstName']." ".$student['lastName'].'</p>
                                                                <p class="inv-street-addr">'.$student['address'].", ".$student['city'].", ".$student['state'].", ".$student['country'].'</p>
                                                                <p class="inv-email-address">'.$student['email'].'</p>
                                                                <p class="inv-email-address">'.$student['mobileNo'].'</p>
                                                            </div>
                                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                                <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                                <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">'.$row['payment_time'].'</span></p>
                                                            </div>
                                                        </div>

                                                        <div class="row inv--product-table-section">
                                                            <div class="col-12">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th scope="col">S.No</th>
                                                                                <th scope="col">Test Name</th>
                                                                                <th class="text-right" scope="col">Test Price</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>';
                                                                                $test_no = $row['test_no'];
                                                                                $test_sql = mysqli_query($conn,"SELECT test_name FROM manage_test WHERE test_no='$test_no' ");
                                                                                $test_name = mysqli_fetch_assoc($test_sql);
                                                                                echo '<td>'.$test_name['test_name'].'</td>
                                                                                <td class="text-right">'.$row['amount'].'</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                <div class="inv--payment-info">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-12">
                                                                            <h6 class=" inv-title">Payment Info:</h6>
                                                                        </div>
                                                                        <div class="col-sm-4 col-12">
                                                                            <p class=" inv-subtitle">Payment Mode: </p>
                                                                        </div>
                                                                        <div class="col-sm-8 col-12">
                                                                            <p class="">'.$row['payment_mode'].'</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                <div class="inv--total-amounts text-sm-right">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                                            <h4 class="">Total Amount: </h4>
                                                                        </div>
                                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                                            <h4 class="">'.$row['amount'].'</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
    <script src="../assets/js/apps/invoice.js"></script>
</body>
</html>