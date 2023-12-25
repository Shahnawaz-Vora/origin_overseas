<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../../student/auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
    // error_reporting(0);
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
    <title>Analyze Section Test | Origin Overseas - PTE Tutor </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
        .apexcharts-canvas {
            margin: 0 auto;
        }
    </style>

</head>
<body data-spy="scroll" data-target="#navSection" data-offset="140">
    
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once("navbar.php");
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">section Test </a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Analysis Test</span></li>
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
            include_once ("sidebar.php");
        ?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
       <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="row sales">

                                <div id="chartBar" class="col-xl-12 layout-spacing mt-4">
                                    <div class="statbox widget box box-shadow">
                                        
                                        <?php
                                            $test_no = $_GET['test_no'];
                                            $section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM manage_section_test WHERE test_no='$test_no' "));
                                            if($section['total_question_entered'] == 38){
                                                echo'
                                                <div class="widget-header">                                
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Speaking Section</h4> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div id="speaking_section" class=""></div>
                                                </div>
                                                ';
                                            }
                                            
                                            else if($section['total_question_entered'] == 4){
                                                echo'
                                                <div class="widget-header">                                
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Writing Section</h4> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div id="writing_section" class=""></div>
                                                </div>
                                                ';
                                            }
                                            
                                            else if($section['total_question_entered'] == 18){
                                                echo'
                                                <div class="widget-header">                                
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Reading Section</h4> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div id="reading_section" class=""></div>
                                                </div>
                                                ';
                                            }
                                            
                                            else if($section['total_question_entered'] == 21){
                                                echo'
                                                <div class="widget-header">                                
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Listening Section</h4> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div id="listening_section" class=""></div>
                                                </div>
                                                ';
                                            }

                                            
                                            else{
                                                echo'
                                                <div class="widget-header">                                
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>Error</h4> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div id="" class="">Something went wrong kindly contect Admin!</div>
                                                </div>
                                                ';
                                            }
                                        ?>                            
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

    <!--  BEGIN FOOTER  -->
    
    <!--  END FOOTER  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../../plugins/highlight/highlight.pack.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/apex/apexcharts.min.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        <?php
            include_once "../../database/dbh.inc.php";
            
            $test_no = $_GET['test_no'];
            $studentId = $_COOKIE['studentId'];
            $speaking_read_aloud = 0;
            $speaking_repeat_sentence = 0;
            $speaking_describe_image = 0;
            $speaking_re_tell_lecture = 0;
            $speaking_answer_short_question = 0;
            $writing_summarize_written_text = 0;
            $writing_essay = 0;
            $reading_single_answer = 0;
            $reading_multiple_answer = 0;
            $reading_reorder_paragraph = 0;
            $reading_fill_in_the_blanks = 0;
            $reading_writing_fill_in_the_blanks = 0;
            $listening_summarize_spoken_text = 0;
            $listening_multiple_answers = 0;
            $listening_fill_in_the_blanks = 0;
            $listening_highlight_correct_summary = 0;
            $listening_single_answer = 0;
            $listening_select_missing_word = 0;
            $listening_highlight_incorrect_words = 0;
            $listening_write_from_dictation = 0;
            $simple_data= mysqli_query($conn,"SELECT * FROM section_user_test WHERE studentId=$studentId AND test_no='$test_no' ");
            
            while($s_data = mysqli_fetch_assoc($simple_data)){
                if($s_data['section']=="speaking" && $s_data['type']=="read-aloud"){
                    $speaking_read_aloud += (float)$s_data['marks'];
                } else if($s_data['section']=="speaking" && $s_data['type']=="repeat-sentence"){
                    $speaking_repeat_sentence += (float)$s_data['marks'];
                } else if($s_data['section']=="speaking" && $s_data['type']=="describe-image"){
                    $speaking_describe_image += (float)$s_data['marks'];
                } else if($s_data['section']=="speaking" && $s_data['type']=="re-tell-lecture"){
                    $speaking_re_tell_lecture += (float)$s_data['marks'];
                } else if($s_data['section']=="speaking" && $s_data['type']=="answer-short-question"){
                    $speaking_answer_short_question += (float)$s_data['marks'];
                } else if($s_data['section']=="writing" && $s_data['type']=="summarize-written-text"){
                    $writing_summarize_written_text += (float)$s_data['marks'];
                } else if($s_data['section']=="writing" && $s_data['type']=="essay"){
                    $writing_essay += (float)$s_data['marks'];
                } else if($s_data['section']=="reading" && $s_data['type']=="single-answer"){
                    $reading_single_answer += (float)$s_data['marks'];
                } else if($s_data['section']=="reading" && $s_data['type']=="multiple-answers"){
                    $reading_multiple_answer += (float)$s_data['marks'];
                } else if($s_data['section']=="reading" && $s_data['type']=="reorder-paragraph"){
                    $reading_reorder_paragraph += (float)$s_data['marks'];
                } else if($s_data['section']=="reading" && $s_data['type']=="fill-in-the-blanks"){
                    $reading_fill_in_the_blanks += (float)$s_data['marks'];
                } else if($s_data['section']=="reading" && $s_data['type']=="reading-and-writing-fill-in-the-blanks"){
                    $reading_writing_fill_in_the_blanks += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="summarize-spoken-text"){
                    $listening_summarize_spoken_text += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="multiple-answers"){
                    $listening_multiple_answers += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="fill-in-the-blanks"){
                    $listening_fill_in_the_blanks += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="highlight-correct-summary"){
                    $listening_highlight_correct_summary += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="single-answer"){
                    $listening_single_answer += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="select-missing-word"){
                    $listening_select_missing_word += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="highlight-incorrect-words"){
                    $listening_highlight_incorrect_words += (float)$s_data['marks'];
                } else if($s_data['section']=="listening" && $s_data['type']=="write-from-dictation"){
                    $listening_write_from_dictation += (float)$s_data['marks'];
                }
            }
        ?>


        // Simple Bar Speaking Section 
        var speaking = {
            chart: {
                height: 230,
                type: 'bar',
                toolbar: {
                show: false,
                }
            },
            // colors: ['#1b55e2'],
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $speaking_read_aloud.", ".$speaking_repeat_sentence.", ".$speaking_describe_image.", ".$speaking_re_tell_lecture.", ".$speaking_answer_short_question; ?>]
            }],
            xaxis: {
                categories: ['Read Aloud','Repeat Sentence','Describe Image','Re-tell Lecture','Answer Short Question'],
            }
        }

        var writing = {
            chart: {
                height: 130,
                type: 'bar',
                toolbar: {
                show: false,
                }
            },
            // colors: ['#1b55e2'],
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $writing_summarize_written_text.", ".$writing_essay; ?>]
            }],
            xaxis: {
                categories: ['Summarize Written Text','Essay'],
            }
        }

        var reading = {
            chart: {
                height: 230,
                type: 'bar',
                toolbar: {
                show: false,
                }
            },
            // colors: ['#1b55e2'],
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $reading_single_answer.", ".$reading_multiple_answer.", ".$reading_reorder_paragraph.", ".$reading_fill_in_the_blanks.", ".$reading_writing_fill_in_the_blanks; ?>]
            }],
            xaxis: {
                categories: ['Single Answer','Multiple Answer','Reorder Paragraph','Fill in the Blanks','Reading And Writing Fill in the Blanks'],
            }
        }

        var listening = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                show: false,
                }
            },
            // colors: ['#1b55e2'],
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $listening_summarize_spoken_text.", ".$listening_multiple_answers.", ".$listening_fill_in_the_blanks.", ".$listening_highlight_correct_summary.", ".$listening_single_answer.", ".$listening_select_missing_word.", ".$listening_highlight_incorrect_words.", ".$listening_write_from_dictation; ?>]
            }],
            xaxis: {
                categories: ['Summarize Spoken Text','Multiple Answers','Fill in the Blanks','Highlight Correct Summary','Single Answer','Select Missing Word','Highlight Incorrect Words','Write from Dictation'],
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#speaking_section"),
            speaking
        );
        chart.render();

        var chart = new ApexCharts(
            document.querySelector("#writing_section"),
            writing
        );
        chart.render();

        var chart = new ApexCharts(
            document.querySelector("#reading_section"),
            reading
        );
        chart.render();

        var chart = new ApexCharts(
            document.querySelector("#listening_section"),
            listening
        );
        chart.render();


        <?php 
            $speaking = ($speaking_read_aloud+$speaking_repeat_sentence+$speaking_describe_image+$speaking_re_tell_lecture+$speaking_answer_short_question)/5;
            
            $writing = ($writing_summarize_written_text+$writing_essay)/2;
            
            $reading = ($reading_single_answer+$reading_multiple_answer+$reading_reorder_paragraph+$reading_fill_in_the_blanks+$reading_writing_fill_in_the_blanks)/5;
            
            $listening = ($listening_summarize_spoken_text+$listening_multiple_answers+$listening_fill_in_the_blanks+$listening_highlight_correct_summary+$listening_single_answer+$listening_select_missing_word+$listening_highlight_incorrect_words+$listening_write_from_dictation)/8;
        ?>
        //report
        <?php
            $per_speaking = round(((float)$speaking*100)/90,2);
            $per_writing = round(((float)$writing*100)/90,2);
            $per_reading = round(((float)$reading*100)/90,2);
            $per_listening = round(((float)$listening*100)/90,2);
        ?>
        $(".speaking_marks").html('<?php echo round($per_speaking,2); ?>%');
        $(".writing_marks").html('<?php echo round($per_writing,2); ?>%');
        $(".reading_marks").html('<?php echo round($per_reading,2); ?>%');
        $(".listening_marks").html('<?php echo round($per_listening,2); ?>%');
        $("#speaking_progress").css("width","<?php echo $per_speaking; ?>%")
        $("#writing_progress").css("width","<?php echo $per_writing; ?>%")
        $("#reading_progress").css("width","<?php echo $per_reading; ?>%")
        $("#listening_progress").css("width","<?php echo $per_listening; ?>%")
        // Donut Chart
        // var donutChart = {
        //     chart: {
        //         height: 350,
        //         type: 'donut',
        //         toolbar: {
        //         show: false,
        //         }
        //     },
        //     // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
        //     series: [<?php echo $speaking.','.$writing.','.$reading.','.$listening; ?>],
        //     responsive: [{
        //         breakpoint: 480,
        //         options: {
        //             chart: {
        //                 width: 200
        //             },
        //             legend: {
        //                 position: 'bottom'
        //             }
        //         }
        //     }]
        // }

        // var donut = new ApexCharts(
        //     document.querySelector("#donut-chart"),
        //     donutChart
        // );

        // donut.render();

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
                          return <?php echo round(($speaking+$writing+$reading+$listening)/4,2) ; ?>
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
            series: [<?php echo round($speaking,2).','.round($writing,2).','.round($reading,2).','.round($listening,2); ?>],
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


        
        
        
        var speaking_chart = {
            chart: {
                id: 'sparkline1',
                type: 'area',
                height: 160,
                sparkline: {
                enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $speaking_read_aloud.", ".$speaking_repeat_sentence.", ".$speaking_describe_image.", ".$speaking_re_tell_lecture.", ".$speaking_answer_short_question; ?>]
            }],
            labels: ['Read Aloud','Repeat Sentence','Describe Image','Re-tell Lecture','Answer Short Question'],
            yaxis: {
                min: 0
            },
            colors: ['#1b55e2'],
            tooltip: {
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
                    opacityFrom: .40,
                    opacityTo: .05,
                    stops: [45, 100]
                }
            },
        }

        var writing_chart = {
            chart: {
                id: 'sparkline2',
                type: 'area',
                height: 160,
                sparkline: {
                enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $writing_summarize_written_text.", ".$writing_essay; ?>]
            }],
            labels: ['Summarize Written Text','Essay'],
            yaxis: {
                min: 0
            },
            colors: ['#000000'],
            tooltip: {
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
                    opacityFrom: .40,
                    opacityTo: .05,
                    stops: [45, 100]
                }
            },
        }

        var reading_chart = {
            chart: {
                id: 'sparkline3',
                type: 'area',
                height: 160,
                sparkline: {
                enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $reading_single_answer.", ".$reading_multiple_answer.", ".$reading_reorder_paragraph.", ".$reading_fill_in_the_blanks.", ".$reading_writing_fill_in_the_blanks; ?>]
            }],
            labels: ['Single Answer','Multiple Answer','Reorder Paragraph','Fill in the Blanks','Reading And Writing Fill in the Blanks'],
            yaxis: {
                min: 0
            },
            colors: ['#e7515a'],
            tooltip: {
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
                    opacityFrom: .40,
                    opacityTo: .05,
                    stops: [45, 100]
                }
            },
        }

        var listening_chart = {
            chart: {
                id: 'sparkline4',
                type: 'area',
                height: 160,
                sparkline: {
                enabled: true
                },
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                name: 'Marks: ',
                data: [<?php echo $listening_summarize_spoken_text.", ".$listening_multiple_answers.", ".$listening_fill_in_the_blanks.", ".$listening_highlight_correct_summary.", ".$listening_single_answer.", ".$listening_select_missing_word.", ".$listening_highlight_incorrect_words.", ".$listening_write_from_dictation; ?>]
            }],
            labels: ['Summarize Spoken Text','Multiple Answers','Fill in the Blanks','Highlight Correct Summary','Single Answer','Select Missing Word','Highlight Incorrect Words','Write from Dictation'],
            yaxis: {
                min: 0
            },
            colors: ['#8dbf42'],
            tooltip: {
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
                    opacityFrom: .40,
                    opacityTo: .05,
                    stops: [45, 100]
                }
            },
        }

        var speaking_chart_render = new ApexCharts(document.querySelector("#speaking_chart"), speaking_chart);
        speaking_chart_render.render()
        // Referral

        var writing_chart_render = new ApexCharts(document.querySelector("#writing_chart"), writing_chart);
        writing_chart_render.render()

        var reading_chart_render = new ApexCharts(document.querySelector("#reading_chart"), reading_chart);
        reading_chart_render.render()
        
        // Engagement Rate
        var listening_chart_render = new ApexCharts(document.querySelector("#listening_chart"), listening_chart);
        listening_chart_render.render()
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