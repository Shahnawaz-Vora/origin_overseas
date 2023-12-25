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
	include_once '../../database/dbh.inc.php';
	if(isset($_GET['testno']) && isset($_GET['type']) && isset($_GET['section']))
	{
		$test_no = $_GET['testno'];
		$type = $_GET['type'];
        $section = $_GET['section'];
	}   
	$sql = mysqli_query($conn , "SELECT * from section_test where test_no='$test_no' and type='$type' and section='$section' ");
	$tot_ques = mysqli_num_rows($sql);
	// to set question-text
    $col1 = "";
    // audio
    $col2 = "";
    // image
    $col3 = "";
    // question 
    $col4 = "";

    if ($section == "speaking") {
        if ($type == "answer-short-question") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "read-aloud") {
            $col1 = "questionText";
            $col2 = "audio";
        }else if ($type == "repeat-sentence") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "describe-image") {
            $col1 = 'answer';
            $col3 = 'image';
        }else if ($type == "re-tell-lecture") {
            $col1 = "transcript";
            $col2 = "audio";
        }else {
            ?>
            <script type="text/javascript">
                window.alert("You Select wrong Type of Question");
                window.location = "test_results.php";
            </script>
            <?php
        }
    }else if ($section == "writing") {
        if ($type == "summarize-written-text") {
            $col1 = "questionText";
        }else if ($type == "essay") {
            $col1 = "questionText";
        }else {
            ?>
            <script type="text/javascript">
                window.alert("You Select wrong Type of Question");
                window.location = "test_results.php";
            </script>
            <?php    
        }
    }else if ($section == "reading") {
        if ($type == "single-answer") {
            $col1 = "questionText";
            $col4 = "question";
        }else if ($type == "multiple-answers") {
            $col1 = "questionText";
            $col4 = "question";
        }else if ($type == "reorder-paragraph") {
            $col1 = "option1";
        }else if ($type == "fill-in-the-blanks") {
            $col1 = "questionText";
        }else if ($type == "reading-and-writing-fill-in-the-blanks") {
            $col1 = "questionText";
        }else {
            ?>
            <script type="text/javascript">
                window.alert("You Select wrong Type of Question");
                window.location = "test_results.php";
            </script>
            <?php    
        }
    }else if ($section == "listening") {
        if ($type == "summarize-spoken-text") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "multiple-answers") {
            $col1 = "transcript";
            $col2 = "audio";
            $col4 = "question";
        }else if ($type == "fill-in-the-blanks") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "highlight-correct-summary") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "single-answer") {
            $col1 = "transcript";
            $col2 = "audio";
            $col4 = "question";
        }else if ($type == "select-missing-word") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "highlight-incorrect-words") {
            $col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "write-from-dictation") {
            $col1 = "transcript";
            $col2 = "audio";
        }else {
            ?>
            <script type="text/javascript">
                window.alert("You Select wrong Type of Question");
                window.location = "test_results.php";
            </script>
            <?php    
        }
    }else{
        ?>
        <script type="text/javascript">
            window.alert("You Select wrong Section");
            window.location = "test_results.php";
        </script>
        <?php
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
    <link href="../../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/table/datatable/dt-global_style.css">
     <link href="../../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <style type="text/css">
        .table > tbody > tr > td{
            color: black;
            font-family: sans-serif;
            text-overflow: ellipsis;
            overflow: hidden;
            max-height: 50px;
        }
        .bs-tooltip-top {
          margin-left: 5px;
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
                                <li class="breadcrumb-item" aria-current="page"><a href="test_results.php"> Analyze Test </a></li>
                                <li class="breadcrumb-item" aria-current="page"> <span> View Section Tests </span> </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="view_test.php?test_no=<?php echo $test_no; ?>"><?php $test_name = mysqli_fetch_assoc(mysqli_query($conn , "SELECT test_name from manage_section_test where test_no='$test_no' ")); echo $test_name['test_name'] ; ?></a></li>
                                <li class="breadcrumb-item active"> <span> <?php echo ucfirst($section).": ".ucfirst(str_replace("-"," ",$type)); ?> </span> </li>
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
                            <div class="widget-content widget-content-area br-6">
                                <form method="POST" action="">
                                    <div class="table-responsive mb-4 mt-4">
                                        <table id="alter_pagination" class="table table-hover with-ellipsis" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Question No.</th>
                                                        <?php
    	                                                    if ($col1 != "") {
    	                                                        echo '<th class=text-center>'.$col1.'</th>';
    	                                                    }
    	                                                    if ($col2 != "") {
    	                                                        echo '<th class=text-center>'.$col2.'</th>';
    	                                                    }
    	                                                    if ($col3 != "") {
    	                                                        echo '<th class=text-center>'.$col3.'</th>';
    	                                                    }
    	                                                    if ($col4 != "") {
    	                                                        echo '<th class=text-center>'.$col4.'</th>';
    	                                                    }
                                                    	?>                                                    
                                                        <th class="text-center">Show</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
    	                                            <tr>
    	                                                <th class="text-center">Question No.</th>
    	                                                <?php
    		                                                if ($col1 != "") {
    	                                                        echo '<th class=text-center>'.$col1.'</th>';
    	                                                    }
    	                                                    if ($col2 != "") {
    	                                                        echo '<th class=text-center>'.$col2.'</th>';
    	                                                    }
    	                                                    if ($col3 != "") {
    	                                                        echo '<th class=text-center>'.$col3.'</th>';
    	                                                    }
    	                                                    if ($col4 != "") {
    	                                                        echo '<th class=text-center>'.$col4.'</th>';
    	                                                    }
    	                                                ?>
                                                        <th class="text-center">Show</th>	                                                
    	                                            </tr>
                                            	</tfoot>
                                                <tbody>
                                                    <?php $i=0;
                                                    while($row = mysqli_fetch_assoc($sql)) {
                                                        $i+=1; 
                                                        echo '
                                                        <tr>
                                                        <td class=text-center>'.$i.'</td>
                                                        ';
                                                    
                                                    $str = $row[$col1];
                                                    $find = [];
                                                    $set   = [];
                                                    for ($j=1; $j<= 8 ; $j++) { 
                                                        $f = '<span id="replace">';
                                                        array_push($find, $f);
                                                        array_push($set, '<span class="replace"></span>');    
                                                       }
                                                    $question_text_replaced =  str_replace($find, $set, $str);
                                                    for ($j=1; $j<= 8 ; $j++) { 
                                                        $f = '<div class="d-inline-block" id="'.$j.'" contenteditable="false">&lt;span id="replace"&gt;&lt;/span&gt;</div>';
                                                        array_push($find, $f);
                                                        array_push($set, '<span class="replace"></span>');    
                                                       }
                                                   
                                                    $question_text_replaced =  str_replace($find, $set, $str);
                                                    if ($col1 != "") {
                                                    echo '<td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;">'.htmlspecialchars($question_text_replaced, ENT_QUOTES).'</div></td>';
                                                    }


                                                    if ($col2 == "audio") {
                                                    echo '<td class="text-center ">
                                                            <div style="margin-left:0px;" class="" align="center">
                                                                <audio controls style="width: 220px; display: block;">
                                                                    <source src="../../database/audio/'.$row['audio'].'" type="audio/mpeg">
                                                                </audio>
                                                                <input type="hidden" name="audio" value="../../database/audio/'.$row['audio'].'">
                                                            </div>
                                                        </td>';
                                                    }

                                                    if ($col3 == "image") {
                                                        echo '<td class=text-center>
                                                            <img src="../../database/images/'.$row['image'].'" class="img-fluid" style="max-height:80px;width:auto">
                                                            <input type="hidden" name="image" value="../../database/images/'.$row['image'].'">
                                                        </td>';
                                                    }

                                                    if ($col4 == "question") {
                                                        echo '<td class=text-center><div style="overflow: hidden;
                                                               text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$row['question'].'</div></td>';
                                                    }
                                                    $id = $row['id'];
                                                    $sec = "'".$section."'";  
                                                    echo '
                                                        <td class="text-center">
                                                            <button type="button" onclick="editQuestion('.$id.','.$sec.')"  style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Show"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                                                        </td>
                                                    </tr>
                                            	';
                                        	}
                                        	?>   
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
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
    <script type="text/javascript">
    	function setid(ids){
        document.getElementById('del').value = ids;
    }
   	var type = "<?php echo $type ; ?>";
    function editQuestion(id,section){
        if (section == "speaking") {
        	if (type == "answer-short-question") {
        		location.replace("view_test/speaking_short_question.php?question="+id);
        	}else if (type == "read-aloud") {
        		location.replace("view_test/speaking_read_a_loud.php?question="+id);
        	}else if (type == "repeat-sentence") {
        		location.replace("view_test/speaking_repeat_sentence.php?question="+id);
    	    }else if (type == "describe-image") {
    	        location.replace("view_test/speaking_describe_image.php?question="+id);
    	    }else if (type == "re-tell-lecture") {
    	    	location.replace("view_test/speaking_re_tell_lecture.php?question="+id);
            }
        }else if (section == "writing") {
    	    if (type == "summarize-written-text") {
    	    	location.replace("view_test/writing_written_text.php?question="+id);
    	    }else if (type == "essay") {
    	    	location.replace("view_test/writing_essay.php?question="+id);
            }
        }else if (section == "reading") {
    	    if (type == "single-answer") {
    			location.replace("view_test/reading_single_answer.php?question="+id);    	
    	    }else if (type == "multiple-answers") {
    	    	location.replace("view_test/reading_multiple_answer.php?question="+id);
    	    }else if (type == "reorder-paragraph") {
    	    	location.replace("view_test/reading_reorder_paragraph.php?question="+id);
    	    }else if (type == "fill-in-the-blanks") {
    	    	location.replace("view_test/reading_fill_in_the_blanks.php?question="+id);
    	    }else if (type == "reading-and-writing-fill-in-the-blanks") {
    	    	location.replace("view_test/reading_writing_fill_in_the_blanks.php?question="+id);
            }
        }else if (section == "listening") {
    	    if (type == "summarize-spoken-text") {
    	    	location.replace("view_test/listening_summarize_spoken_text.php?question="+id);
    	    }else if (type == "multiple-answers") {
    	    	location.replace("view_test/listening_multiple_answer.php?question="+id);
    	    }else if (type == "fill-in-the-blanks") {
    	    	location.replace("view_test/listening_fill_in_the_blanks.php?question="+id);
    	    }else if (type == "highlight-correct-summary") {
    	    	location.replace("view_test/listening_highlight_correct_summary.php?question="+id);
    	    }else if (type == "single-answer") {
    	    	location.replace("view_test/listening_single_answer.php?question="+id);
    	    }else if (type == "select-missing-word") {
    	    	location.replace("view_test/listening_select_missing_word.php?question="+id);
    	    }else if (type == "highlight-incorrect-words") {
    	    	location.replace("view_test/listening_highlight_incorrect_words.php?question="+id);
    	    }else if (type == "write-from-dictation") {
    	    	location.replace("view_test/listening_write_from_dictation.php?question="+id);
    	    }
        }
    }
    </script> 
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
    <script src="../../assets/js/custom.js"></script>
     <script src="../../plugins/highlight/highlight.pack.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="../../assets/js/scrollspyNav.js"></script>
    <script src="../../plugins/table/datatable/datatables.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <script>
        $(document).ready(function() {
            $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
        } );
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

</body>
</html>
<?php 
     if (isset($_GET['update'])) {
        ?><script type="text/javascript">
        Snackbar.show({ text: 'Question Updated', duration: 2000, });
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("update");
        history.pushState(null, null, "?"+queryParams.toString());
        </script><?php
    }
?>