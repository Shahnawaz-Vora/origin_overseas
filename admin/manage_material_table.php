<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<?php
    if (!isset($_GET['section']) || !isset($_GET['type'])) {
        header("location: index.php");   
    }
    include_once '../database/dbh.inc.php';

    $section = $_GET['section'];
    $type = $_GET['type'];
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
        }else if ($type == "repeat-sentence") {
        	$col1 = "transcript";
            $col2 = "audio";
        }else if ($type == "describe-image") {
            $col3 = 'image';
        }else if ($type == "re-tell-lecture") {
        	$col1 = "transcript";
            $col2 = "audio";
        }else {
            ?>
            <script type="text/javascript">
                window.alert("You Select wrong Type of Question");
                window.location = "index.php";
            </script>
            <?php
        }
        $sql="SELECT * FROM material_speaking WHERE type='$type' ";
        $result = mysqli_query($conn, $sql);
    }else if ($section == "writing") {
        if ($type == "summarize-written-text") {
        	$col1 = "questionText";
        }else if ($type == "essay") {
        	$col1 = "questionText";
        }else {
            ?>
            <script type="text/javascript">
                window.alert("You Select wrong Type of Question");
                window.location = "index.php";
            </script>
            <?php    
        }
        $sql="SELECT * FROM material_writing WHERE type='$type' ";
        $result = mysqli_query($conn, $sql);
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
                window.location = "index.php";
            </script>
            <?php    
        }
         $sql="SELECT * FROM material_reading WHERE type='$type' ";
        $result = mysqli_query($conn, $sql);
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
                window.location = "index.php";
            </script>
            <?php    
        }
        $sql="SELECT * FROM material_listening WHERE type='$type' ";
        $result = mysqli_query($conn, $sql);
        // $tot_row = mysqli_num_rows($result);
        // $row = mysqli_fetch_assoc($result);
    }else{
        ?>
        <script type="text/javascript">
            window.alert("You Select wrong Section");
            window.location = "index.php";
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
    <title>Manage Materials | Origin Overseas - PTE Tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->    
       <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
     <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
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

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="manage_materials.php">Manage Materials </a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span><?php if ($section == "speaking") { if ($type == "answer-short-question") { echo "Speaking: Answer Short Question"; }else if ($type == "read-aloud") {echo "Speaking: Read A Loud"; }else if ($type == "repeat-sentence") {echo "Speaking: Repeat Sentence";}else if ($type == "describe-image") {echo "Speaking: Describe Image";}else if ($type == "re-tell-lecture") {echo "Speaking: Re-Tell Lecture";}}else if ($section == "writing") {if ($type == "summarize-written-text") {echo "Writing: Summarize Written Text";}else if($type == "essay") {echo "Writing: Essay Writing";}}else if ($section == "reading") {if ($type == "single-answer") {echo "Reading: Single Answer";}else if ($type == "multiple-answers") {echo "Reading: Multiple-choice, choose multiple answer" ;}else if ($type == "reorder-paragraph") {echo "Reading: Reorder Paragraph";}else if ($type == "fill-in-the-blanks") {echo "Reading: Fill in the Blanks";}else if ($type == "reading-and-writing-fill-in-the-blanks") {echo "Reading: Reading and Writing Fill in the Blanks";}}else if ($section == "listening") {if ($type == "summarize-spoken-text") {echo "Listening: Summarize Spoken Text";}else if ($type == "multiple-answers") {echo "Listening: Choose Multiple Answers";}else if ($type == "fill-in-the-blanks") {echo "Listening: Fill The Blanks";}else if ($type == "highlight-correct-summary") {echo "Listening: Highlight Correct Summary";    }else if ($type == "single-answer") {echo "Listening: Single Answers";}else if ($type == "select-missing-word") {echo "Listening: Select Missing Word";}else if ($type == "highlight-incorrect-words") {echo "Listening: Highlight Incorrect Words";}else if ($type == "write-from-dictation") {echo "Listening: Write From Dictation";}  } ?></span></li>
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
                                                    <th>No.</th>
                                                    <?php
                                                        if ($col1 != "") {
                                                            echo '<th>'.$col1.'</th>';
                                                        }
                                                        if ($col2 != "") {
                                                            echo '<th>'.$col2.'</th>';
                                                        }
                                                        if ($col3 != "") {
                                                            echo '<th>'.$col3.'</th>';
                                                        }
                                                        if ($col4 != "") {
                                                            echo '<th>'.$col4.'</th>';
                                                        }
                                                    ?>
                                                    <!-- <th></th> -->
                                                    <th>Modify_Date</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <?php
    	                                                if ($col1 != "") {
                                                            echo '<th>'.$col1.'</th>';
                                                        }
                                                        if ($col2 != "") {
                                                            echo '<th>'.$col2.'</th>';
                                                        }
                                                        if ($col3 != "") {
                                                            echo '<th>'.$col3.'</th>';
                                                        }
                                                        if ($col4 != "") {
                                                            echo '<th>'.$col4.'</th>';
                                                        }
                                                    ?>
                                                    <!-- <th>Age</th> -->
                                                    <th>Modify_Date</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                        <?php
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $i+=1; 
                                            echo '
                                                    <tr>
                                                        <td>'.$i.'</td>
                                                        ';

                                                    if ($col1 != "") {
                                                        $str = $row[$col1];
                                                        $find = [];
                                                        $set   = [];
                                                        for ($j=1; $j<= 8 ; $j++) { 
                                                            $f = '<span id="replace"></span>';
                                                            array_push($find, $f);
                                                            array_push($set, '<span class="replace"></span>');    
                                                           }
                                                       
                                                        $question_text_replaced =  str_replace($find, $set, $str);
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.htmlspecialchars($question_text_replaced, ENT_QUOTES).'</div></td>';
                                                    }

                                                    if ($col2 == "audio") {
                                                    echo '<td>
                                                            <div style="width:250px;">
                                                                <audio controls style="width: 220px; display: block;">
                                                                    <source src="../database/audio/'.$row['audio'].'" type="audio/mpeg">
                                                                </audio>
                                                                <input type="hidden" name="audio" value="../database/audio/'.$row['audio'].'">
                                                            </div>
                                                        </td>';
                                                    }

                                                    if ($col3 == "image") {
                                                        echo '<td>
                                                            <img src="../database/images/'.$row['image'].'" class="img-fluid" style="max-height:80px;width:auto">
                                                            <input type="hidden" name="image" value="../database/images/'.$row['image'].'">
                                                        </td>';
                                                    }

                                                    if ($col4 == "question") {
                                                        echo '<td><div style="overflow: hidden;
                                                               text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;">'.$row['question'].'</div></td>';
                                                    }
                                                    $materialId = $section."MaterialId"; 
                                                 
                                            echo '      <td>'.$row['modify_date'].'</td>
                                                        <td class="text-center">
                                                            <button type="button" onclick="editQuestion('.$row[$materialId].')"  style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" onclick="setid('.$row[$materialId].')" data-toggle="modal" data-target="#faderightModal" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                        </td>
                                                    </tr>
                                            ';
                                        }
                                        ?>
                                                
                                            </tbody>
                                            <!--modal -->
                                                <div id="faderightModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="padding: 10px;padding-left: 20px">
                                                                <h5 class="modal-title" >Delete Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <p class="modal-text text-dark" >Are you sure to Delete this?</p>
                                                            </div>
                                                            <div class="modal-footer md-button" style="padding: 5px">
                                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                                <button type="submit" class="btn btn-danger"  id="del" name="delete" value="" >Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!--end modal-->
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->   

<script type="text/javascript">
    function setid(id){
        document.getElementById('del').value = id;
    }
    function editQuestion(id){
        <?php
        if ($section == "speaking") {
            if ($type == "answer-short-question") {
                ?>
                    window.location.href = "update_material/speaking_short_question.php?question="+id;
                <?php
            }else if ($type == "read-aloud") {
                ?>
                    window.location.href = "update_material/speaking_read_a_loud.php?question="+id;
                <?php
            }else if ($type == "repeat-sentence") {
                ?>
                    window.location.href = "update_material/speaking_repeat_sentence.php?question="+id;
                <?php
            }else if ($type == "describe-image") {
                ?>
                    window.location.href = "update_material/speaking_describe_image.php?question="+id;
                <?php
            }else if ($type == "re-tell-lecture") {
                ?>
                    window.location.href = "update_material/speaking_re_tell_lecture.php?question="+id;
                <?php
            }else {
            }
        }else if ($section == "writing") {
            if ($type == "summarize-written-text") {
                ?>
                    window.location.href = "update_material/writing_written_text.php?question="+id;
                <?php
            }else if ($type == "essay") {
                ?>
                    window.location.href = "update_material/writing_essay.php?question="+id;
                <?php
            }else {
            }
        }else if ($section == "reading") {
            if ($type == "single-answer") {
                ?>
                    window.location.href = "update_material/reading_single_answer.php?question="+id;
                <?php
            }else if ($type == "multiple-answers") {
                ?>
                    window.location.href = "update_material/reading_multiple_answer.php?question="+id;
                <?php
            }else if ($type == "reorder-paragraph") {
                ?>
                    window.location.href = "update_material/reading_reorder_paragraph.php?question="+id;
                <?php
            }else if ($type == "fill-in-the-blanks") {
                ?>
                    window.location.href = "update_material/reading_fill_in_the_blanks.php?question="+id;
                <?php
            }else if ($type == "reading-and-writing-fill-in-the-blanks") {
                ?>
                    window.location.href = "update_material/reading_writing_fill_in_the_blanks.php?question="+id;
                <?php
            }else {
             }
        }else if ($section == "listening") {
            if ($type == "summarize-spoken-text") {
                ?>
                    window.location.href = "update_material/listening_summarize_spoken_text.php?question="+id;
                <?php
            }else if ($type == "multiple-answers") {
                ?>
                    window.location.href = "update_material/listening_multiple_answer.php?question="+id;
                <?php
            }else if ($type == "fill-in-the-blanks") {
                ?>
                    window.location.href = "update_material/listening_fill_in_the_blanks.php?question="+id;
                <?php
            }else if ($type == "highlight-correct-summary") {
                ?>
                    window.location.href = "update_material/listening_highlight_correct_summary.php?question="+id;
                <?php
            }else if ($type == "single-answer") {
                ?>
                    window.location.href = "update_material/listening_single_answer.php?question="+id;
                <?php
            }else if ($type == "select-missing-word") {
                ?>
                    window.location.href = "update_material/listening_select_missing_word.php?question="+id;
                <?php
            }else if ($type == "highlight-incorrect-words") {
                ?>
                    window.location.href = "update_material/listening_highlight_incorrect_words.php?question="+id;
                <?php
            }else if ($type == "write-from-dictation") {
                ?>
                    window.location.href = "update_material/listening_write_from_dictation.php?question="+id;
                <?php
            }else{
            }
        }else{
        }

        ?>
    }
</script>

        
    
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
     <script src="../plugins/highlight/highlight.pack.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="../assets/js/scrollspyNav.js"></script>
    <script src="../plugins/table/datatable/datatables.js"></script>
    <script src="../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../assets/js/components/notification/custom-snackbar.js"></script>
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
    include_once '../database/dbh.inc.php';
    if (isset($_POST['delete'])) {
        $id = trim(mysqli_real_escape_string($conn, $_POST['delete']));
        if ($section == "speaking") {
            $sql = mysqli_query($conn,"DELETE FROM material_speaking WHERE speakingMaterialId = $id ");
        }else if ($section == "writing") {
            $sql = mysqli_query($conn,"DELETE FROM material_writing WHERE writingMaterialId = $id ");
        }else if ($section == "reading") {
            $sql = mysqli_query($conn,"DELETE FROM material_reading WHERE readingMaterialId = $id ");
        }else if ($section == "listening") {
            $sql = mysqli_query($conn,"DELETE FROM material_listening WHERE listeningMaterialId = $id ");
        }else{

        }
        if ($col2 == "audio") {
            unlink($_POST['audio']);
        }
        if ($col3 == "image") {
            unlink($_POST['image']);
        }
        if ($sql == false) {
            ?>   
            <script type="text/javascript">    
            window.alert("There is Some Error, Please Try Again");
            window.location = "<?php $_SERVER['REQUEST_URI'] ?>";
            r = false;
            </script> 
            <?php
        }else{
            ?>
            <script type="text/javascript">    
            window.location = "<?php $_SERVER['REQUEST_URI'] ?>";
            r = false;
            </script>    
            <?php
        }
    }
    
?>
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