<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: auth_login.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Origin Overseas - PTE tutors </title>
    <title>Student Home | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Home Page">
    <meta name="keywords" content="Student Home Page, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Listeing section, Writing Section, Speaking Section, Reading Section, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
    html {
        overflow: scroll;
        overflow-x: hidden;
    }
    ::-webkit-scrollbar {
        width: 0px;  /* Remove scrollbar space */
        background: transparent;  /* Optional: just make scrollbar invisible */
    }
    /* Optional: show position indicator in red */
    ::-webkit-scrollbar-thumb {
        background: #FF0000;
    }
</style>
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

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
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
            <div class="row sales layout-top-spacing">
                    
              <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                  <div class="widget widget-chart-one">
                      <div class="widget-heading">
                          <h5 class="">Section Score</h5>
                      </div>

                      <div class="widget-content">
                          <div class="tabs tab-content">
                              <div id="content_1" class="tabcontent"> 
                                  <div id="section_marks"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                  <div class="widget widget-chart-two">
                      <div class="widget-heading">
                          <h5 class="">Overall Average</h5>
                      </div>
                      <div class="widget-content">
                          <div id="overall_average" class=""></div>
                      </div>
                  </div>
              </div>

              

              <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                  <div class="row widget-statistic">
                      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                          <div style="padding:0" class="widget widget-one_hybrid widget-followers">
                              <div class="widget-heading">
                                  <p class="w-value">32</p>
                                  <h5 class="">Speaking</h5>
                              </div>
                              <div class="widget-content">    
                                  <div class="w-chart">
                                      <div id="hybrid_followers"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                          <div style="padding:0" class="widget widget-one_hybrid ">
                              <div class="widget-heading">
                                  <p class="w-value">45</p>
                                  <h5 class="">Writing</h5>
                              </div>
                              <div class="widget-content">    
                                  <div class="w-chart">
                                      <div id="hybrid_followers1"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                          <div style="padding:0" class="widget widget-one_hybrid widget-referral">
                              <div class="widget-heading">
                                  <p class="w-value">30</p>
                                  <h5 class="">Reading</h5>
                              </div>
                              <div class="widget-content">    
                                  <div class="w-chart">
                                      <div id="hybrid_followers2"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                          <div style="padding:0" class="widget widget-one_hybrid widget-engagement">
                              <div class="widget-heading">
                                  <p class="w-value">55</p>
                                  <h5 class="">Listning</h5>
                              </div>
                              <div class="widget-content">    
                                  <div class="w-chart">
                                      <div id="hybrid_followers3"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> -->

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                  <div class="widget widget-chart-one">
                      <div class="widget-heading">
                          <h5 class="">Test's Score</h5>
                      </div>

                      <div class="widget-content">
                          <div class="tabs tab-content">
                              <div id="content_1" class="tabcontent"> 
                                  <div id="test_score"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Recent Orders</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Test Name</div></th>
                                        <th><div class="th-content">Order ID </div></th>
                                        <th><div class="th-content">Time</div></th>
                                        <th><div class="th-content th-heading">Price</div></th>
                                        <th><div class="th-content">Status</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $purchase = mysqli_query($conn,"SELECT * FROM test_purchase where studentId=$studentId ORDER BY order_id DESC LIMIT 5");
                                    if(mysqli_num_rows($purchase) >= 1){
                                      while($row =  mysqli_fetch_assoc($purchase)){
                                        $test_no = $row['test_no'];
                                        $test_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM manage_test WHERE test_no='$test_no' "));
                                        echo '
                                        <tr>
                                          <td><div class="td-content">'.$test_data['test_name'].'</div></td>
                                          <td><div class="td-content product-brand">'.$row['order_id'].'</div></td>
                                          <td><div class="td-content">'.$row['payment_time'].'</div></td>
                                          <td><div class="td-content pricing"><span class="">'.$row['amount'].'</span></div></td>
                                          <td><div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div></td>
                                        </tr>';
                                      }
                                    }else{
                                      echo "<tr> <td colspan='5' style='font-weight:bold' class='text-center'>You Didn't Purchased Any Test Yet !</td></tr>";
                                    }
                                  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                  <div class="widget widget-table-three">

                      <div class="widget-heading">
                          <h5 class=""> Latest Test </h5>
                      </div>

                      <div class="widget-content">
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th><div class="th-content">Test Name</div></th>
                                          <th><div class="th-content th-heading">Price</div></th>
                                          <th><div class="th-content">Sold</div></th>
                                          <th><div class="th-content th-heading">Upload Date</div></th>
                                          <th><div class="th-content">Purchase</div></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $latest = mysqli_query($conn,"SELECT * FROM manage_test  where test_no NOT IN (SELECT test_no FROM free_test where student_id='$studentId') AND test_no NOT IN (SELECT test_no from test_purchase where studentId='$studentId') AND status=1 ORDER BY id DESC LIMIT 5");
                                      if(mysqli_num_rows($latest) >= 1){
                                        while($row =  mysqli_fetch_assoc($latest)){
                                          $test_no = $row['test_no'];
                                          $test_sold_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS sold FROM test_purchase WHERE test_no='$test_no' "));
                                          echo '
                                          <tr>
                                            <td><div class="td-content product-name">'.$row['test_name'].'</div></td>
                                            <td><div class="td-content"><span class="pricing">'.$row['test_price'].'</span></div></td>
                                            <td><div class="td-content"><span class="discount-pricing">'.$test_sold_data['sold'].'</span></div></td>
                                            <td><div class="td-content">'.$row['modify_date'].'</div></td>
                                            <td><div class="td-content"><span class="badge outline-badge-success"><a href="" class="">Purchase</a></span></div></td>
                                          </tr>';
                                        }
                                      }else{
                                        echo "<tr> <td colspan='5' style='font-weight:bold' class='text-center'>There isn't any Latest Test !</td></tr>";
                                      }

                                    ?>
                                  </tbody>
                              </table>
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
                              <?php 
                                $test_Purchase_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) AS total_amount, COUNT(*) AS total_test FROM test_purchase WHERE studentId=$studentId "));
                              ?>
                              <div class="summary-list">
                                  <div class="w-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                  </div>
                                  <div class="w-summary-details">
                                      
                                      <div class="w-summary-info">
                                          <h6>Total Expenditure</h6>
                                          <p class="summary-count"><?php echo $test_Purchase_data['total_amount'] ;?></p>
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
                                      
                                      <div class="w-summary-info">
                                          <h6>Test Purchase</h6>
                                          <p class="summary-count"><?php echo $test_Purchase_data['total_test'] ;?></p>
                                      </div>

                                      <div class="w-summary-stats">
                                          <div class="progress">
                                              <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                  <div class="widget widget-five">
                      <div class="widget-content">

                          <div class="header">
                              <div class="header-body">
                                  <h6>Days Left</h6>
                              </div>
                          </div>

                          <div class="w-content">
                              <div class="">
                                <?php
                                  $student_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE studentId=$studentId "));
                                  $days_between = ceil(abs(strtotime($student_data['endDate']) - strtotime($student_data['joinDate'])) / 86400);
                                ?>                                            
                                  <p class="task-left"><?php echo $days_between; ?></p>
                                  <p class="task-completed"><span>Starting Date: <?php echo date("d-m-Y",strtotime($student_data['joinDate'])); ?></span></p>
                                  <p class="task-hight-priority"><span>Ending Date: <?php echo date("d-m-Y",strtotime($student_data['endDate'])); ?></span></p>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                  <div class="widget widget-card-four">
                      <div class="widget-content">
                          <div class="w-content">
                              <?php
                                $sql=mysqli_query($conn,"select count(*) as total_free from free_test where student_id='$studentId'");
                                $result = mysqli_fetch_assoc($sql);
                                $sql1=mysqli_query($conn,"select count(*) as total_purchased from test_purchase where studentId='$studentId'");
                                $result1 = mysqli_fetch_assoc($sql1);
                                $sql2=mysqli_query($conn,"select distinct(test_no) as given_test from user_test where question_no=81 and studentId='$studentId'");
                                $given_test = mysqli_num_rows($sql2);
                                $totalTest = $result['total_free']+$result1['total_purchased'];
                                $per = ($given_test*100)/4;
                              ?>
                              <div class="w-info">
                                  <h6 class="value" > <?php echo $given_test."/".$totalTest ?> </h6>
                                  <p class="">Total Completed Test</p>
                              </div>
                              <div class="">
                                  <div class="w-info">
                                      <h3 class="value"><b> <?php echo round($per,2); ?>% </b></h3>
                                  </div>
                              </div>
                          </div>
                          <div class="progress">
                              <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: <?php echo $per; ?>%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
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
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    
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
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../plugins/apex/apexcharts.min.js"></script>
    <script src="../assets/js/dashboard/dash_2.js"></script>
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
    <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../plugins/sweetalerts/custom-sweetalert.js"></script>
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
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
    
  <?php 
    $test_score = mysqli_query($conn,"SELECT *,AVG(average_marks) AS overall_average FROM test_evaluation WHERE studentId=$studentId "); 
    $speaking_marks = [];
    $writing_marks = [];
    $reading_marks = [];
    $listening_marks = [];
    $average_marks = [];
    $test_lables = [];
    $overall_average = 0;
    while($test_score_data = mysqli_fetch_assoc($test_score)){
      array_push($speaking_marks,$test_score_data['speaking']);
      array_push($writing_marks,$test_score_data['writing']);
      array_push($reading_marks,$test_score_data['reading']);
      array_push($listening_marks,$test_score_data['listening']);
      array_push($average_marks,$test_score_data['average_marks']);
      $test_no = $test_score_data['test_no']; 
      $test_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT test_name FROM manage_test WHERE test_no='$test_no' ")); 
      array_push($test_lables,$test_name['test_name']);
      $overall_average = round($test_score_data['overall_average'],2);
    }

  ?>
/*
    =================================
        Section Marks
    =================================
*/
var section_marks = {
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


    // to show the fix point of data of chart's any row
    // events: {
    //   mounted: function(ctx, config) {
    //     const highest1 = ctx.getHighestValueInSeries(0);
    //     const highest2 = ctx.getHighestValueInSeries(1);

    //     ctx.addPointAnnotation({
    //       x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
    //       y: highest1,
    //       label: {
    //         style: {
    //           cssClass: 'd-none'
    //         }
    //       },
    //       customSVG: {
    //           SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
    //           cssClass: undefined,
    //           offsetX: -8,
    //           offsetY: 5
    //       }
    //     })

    //     ctx.addPointAnnotation({
    //       x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
    //       y: highest2,
    //       label: {
    //         style: {
    //           cssClass: 'd-none'
    //         }
    //       },
    //       customSVG: {
    //           SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
    //           cssClass: undefined,
    //           offsetX: -8,
    //           offsetY: 5
    //       }
    //     })
    //   },
    // }
  },
  colors: ['#1b55e2', '#dc3545','#343a40','#6c757d'],
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
    text: 'Average Marks',
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
    text: '<?php echo $overall_average; ?>',
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
      name: 'Speaking',
      data: [<?php echo implode(",", $speaking_marks); ?>]
  }, {
      name: 'Writing',
      data: [<?php echo implode(",", $writing_marks); ?>]
  }, {
      name: 'Reading',
      data: [<?php echo implode(",", $reading_marks); ?>]
  }, {
      name: 'Listening',
      data: [<?php echo implode(",", $listening_marks); ?>]
  }],
  labels: [<?php echo "'".implode("','", $test_lables)."'"; ?>],
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
      offsetX: -22,
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

var section_marks_chart = new ApexCharts(
    document.querySelector("#section_marks"),
    section_marks
);
section_marks_chart.render();

/*
    =================================
        Test's Score
    =================================
*/
var test_score = {
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
  colors: ['#2f4b7c'],
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
    text: 'Average Marks',
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
    text: '<?php echo $overall_average; ?>',
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
      name: 'Marks',
      data: [<?php echo implode(",", $average_marks); ?>]
  }],
  labels: [<?php echo "'".implode("','", $test_lables)."'"; ?>],
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
      offsetX: -22,
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

var test_score_chart = new ApexCharts(
    document.querySelector("#test_score"),
    test_score
);
test_score_chart.render();

/*
    ==================================
        Overall Average
    ==================================
*/
var overall_average = {
    chart: {
        type: 'donut',
        width: 380
    },
    colors: ['#003f5c', '#7a5195','#ef5675','#ffa600'],
    dataLabels: {
      enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
          width: 10,
          height: 10,
        },
        itemMargin: {
          horizontal: 0,
          vertical: 8
        }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '65%',
          background: 'transparent',
          labels: {
            show: true,
            name: {
              show: true,
              fontSize: '29px',
              fontFamily: 'Nunito, sans-serif',
              color: undefined,
              offsetY: -10
            },
            value: {
              show: true,
              fontSize: '26px',
              fontFamily: 'Nunito, sans-serif',
              color: '20',
              offsetY: 16,
              formatter: function (val) {
                return val
              }
            },
            total: {
              show: true,
              showAlways: true,
              label: 'Average',
              color: '#888ea8',
              formatter: function (w) {
                return w.globals.seriesTotals.reduce( function(a, b) {
                  return <?php echo $overall_average; ?>
                }, 0)
              }
            }
          }
        }
      }
    },
    stroke: {
      show: true,
      width: 25,
    },
    series: [<?php $max = max($speaking_marks); $min = min($speaking_marks); echo (array_sum($speaking_marks) / count($speaking_marks)); ?>, <?php $max = max($writing_marks); $min = min($writing_marks); echo (array_sum($writing_marks) / count($writing_marks)); ?>, <?php $max = max($reading_marks); $min = min($reading_marks); echo (array_sum($reading_marks) / count($reading_marks)); ?>, <?php $max = max($listening_marks); $min = min($listening_marks); echo (array_sum($listening_marks) / count($listening_marks)); ?>],
    labels: ['Speaking', 'Writing', 'Reading','Listening'],
    responsive: [{
        breakpoint: 1599,
        options: {
            chart: {
                width: '350px',
                height: '400px'
            },
            legend: {
                position: 'bottom'
            }
        },

        breakpoint: 1439,
        options: {
            chart: {
                width: '250px',
                height: '390px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
              pie: {
                donut: {
                  size: '65%',
                }
              }
            }
        },
    }]
}

var overall_average_chart = new ApexCharts(
    document.querySelector("#overall_average"),
    overall_average
);
overall_average_chart.render();

    </script>
</body>
</html>
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