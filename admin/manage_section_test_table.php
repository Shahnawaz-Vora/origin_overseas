<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<?php 
    include_once '../database/dbh.inc.php';
    $sql = mysqli_query($conn , "SELECT * from manage_section_test");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Tests | Origin Overseas - PTE Tutors </title>
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
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/forms/switches.css">
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="manage_test_table.php"><span> Manage Tests </span></a></li>
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
                                                        <th class="text-center">NO.</th>
                                                        <th class="text-center">Test Id</th>
                                                        <th class="text-center">Section</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Progress</th>
                                                        <th class="text-center">MODIFY_DATE</th>
                                                        <th class="text-center">EDIT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0;
                                                    while($row = mysqli_fetch_assoc($sql)) {
                                                        $i+=1; 
                                                        echo '
                                                        <tr>
                                                            <td class="text-center">'.$i.'</td>
                                                            ';
                                                        
                                                        
                                                        echo '<td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;     ">'.$row['test_no'].'</div></td>';
                                                        $section_sql = mysqli_fetch_assoc(mysqli_query($conn,"select distinct section from section_test where test_no='".$row['test_no']."'"));
                                                        echo '<td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;     ">'.$section_sql['section'].'</div></td>';
                                                        echo '<td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;     ">'.$row['test_name'].'</div></td>';
                                                        echo '<td class="text-center"><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;     ">'.$row['test_price'].'</div></td>';
                                                        if($row['status'] == 0)
                                                        {
                                                            $status = "";
                                                        }
                                                        else
                                                        {
                                                            $status = "checked";
                                                        }
                                                        $t = $row['test_no'];
                                                        echo '<td class="text-center">'.
                                                            '<label class="switch s-primary mr-2" style="margin-bottom:-3px;">
                                                                <input type="checkbox" '.$status.' id="active_deactive'.$i.'" name="checkbox" onclick=switching("'.$t.'");>
                                                                <span class="slider round"></span>
                                                            </label>'
                                                        .'</td>';
                                                    ?>
                                                        <!-- <td class="text-center">Vincent Carpenter</td> -->
                                                        <?php 
                                                            $tot_ques = $row['total_question_entered'];
                                                            $tot_per = ($tot_ques*100)/81; 
                                                          
                                                        ?>
                                                        <td>
                                                            <center>                                       
                                                            <div class="progress br-30 ">
                                                                <div class="progress-bar br-30 bg-secondary" role="progressbar" style="width: <?php echo $tot_per;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div><span >
                                                            <?php
                                                              echo floor($tot_per)."%";
                                                           
                                                            ?>
                                                            </span>
                                                            </center>
                                                        </td>
                                                        <?php
                                                             $test_no = $row['test_no'];
                                                        ?>
                                                        <td><p class="text-success text-center"><?php echo date("d-m-Y",strtotime($row['modify_date'])); ?></p></td>
                                                        <td class="text-center">
                                                            <button type="button" onclick="editQuestion('<?php echo $test_no; ?>');" data-toggle="modal" data-target="#faderightModalEdit" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                                <!--modal -->
                                                <div id="faderightModalEdit" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="padding: 10px;padding-left: 20px">
                                                                <h5 class="modal-title" >Edit Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <p class="modal-text text-dark" >Test in Incomplete would you like to continue?</p>
                                                            </div>
                                                            <div class="modal-footer md-button" style="padding: 5px">
                                                                <button type="submit" name="continue" id="continue" class="btn btn-info"  class="btn">Continue</button>
                                                                <button type="submit" name="edit" class="btn btn-danger" id="edit" value="">Edit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!--end  modal-->
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
        document.getElementById('continue').value = id;
        document.getElementById('edit').value = id;
    }
    </script> 
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../plugins/sweetalerts/custom-sweetalert.js"></script>
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
        var totalCheckboxes = $('input:checkbox').length;
        var checkbox=[];
        var status ;
        function switching(id)
        {  
            testno=id;
            for (i = 1 ; i<=totalCheckboxes;i++ )
            {
                checkbox[i] = document.getElementById("active_deactive"+i);           
            }    
        }
        $("input[type=checkbox]").change(function(event) {
            if ($(this).prop("checked") == true){
                $(this).val(1);
                status= 1;
                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: {status: status,testno: testno},
                    success:function(response){ 
                        if(response == '0')
                        {
                            Snackbar.show({ text: 'Please complete the test first!', duration: 2000,});
                        }
                    }
                });
            }
            else
            {
                $(this).val(0);
                status = 0;
                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: {status: status,testno: testno},
                    success:function(response){
                        if(response == '0')
                        {
                            Snackbar.show({ text: 'Please complete the test first!', duration: 2000,});
                        }
                    }
                });
            }
        });
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

</body>
</html>
<?php
if (isset($_POST['delete'])) {
    $id = trim(mysqli_real_escape_string($conn, $_POST['delete']));
    $sql = mysqli_query($conn, "delete from manage_test where test_no = '$id' ");
    $sql = mysqli_query($conn, "delete from test where test_no = '$id' ");
    ?><script>location.replace("manage_section_test_table.php")</script><?php
}
if (isset($_POST['continue'])) {
    $test_no = trim(mysqli_real_escape_string($conn, $_POST['continue']));
    $sql = mysqli_query($conn, "SELECT * from manage_section_test where test_no='$test_no'");
    $row = mysqli_fetch_assoc($sql);
    $type_sql = mysqli_query($conn,"SELECT distinct section from section_test where test_no='$test_no'");
    $type_res = mysqli_fetch_array($type_sql);
    $section_type = $type_res['section']; 
    $tot_ques = $row['total_question_entered'];
    if($section_type == "speaking")
    {
        
        if($tot_ques <= 7 && $tot_ques != 0)
        {
            $type = $tot_ques + 1; 
            if($type == 8)
            {
                ?><script type="text/javascript">location.replace("section_test/speaking_repeat_sentence.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/speaking_read_a_loud.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type ?>");</script><?php
            }
        }
        if($tot_ques > 7 && $tot_ques <= 17)
        {
            $type = $tot_ques - 7 ;
            $type = $type + 1;
            if($type == 11){
                ?><script type="text/javascript">location.replace("section_test/speaking_describe_image.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/speaking_repeat_sentence.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques > 17 && $tot_ques <= 24)
        {
            $type = $tot_ques - 17 ;
            $type = $type + 1;
            if($type == 8){
                ?><script type="text/javascript">location.replace("section_test/speaking_re_tell_lecture.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/speaking_describe_image.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques > 24 && $tot_ques <= 28)
        {
            $type = $tot_ques - 24 ;
            $type = $type + 1;
            if($type == 5){
                ?><script type="text/javascript">location.replace("section_test/speaking_short_question.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/speaking_re_tell_lecture.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques > 28 && $tot_ques <= 38)
        {
            $type = $tot_ques - 28 ;
            $type = $type + 1;
            if($type == 11){
                ?><script type="text/javascript">
                    Snackbar.show({ text: 'Test Completed Already!', duration: 2000, });</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/speaking_short_question.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
    }
    if($section_type == "writing")
    {
        if($tot_ques > 0 && $tot_ques <= 3)
        {
            $type = $tot_ques  ;
            $type = $type + 1;
            if($type == 4){
                ?><script type="text/javascript">location.replace("section_test/writing_essay.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/writing_written_text.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
    }
    if($section_type == "reading")
    {
        if($tot_ques >0 && $tot_ques <= 2)
        {
            $type = $tot_ques ;
            $type = $type + 1;
            if($type == 3){
                ?><script type="text/javascript">location.replace("section_test/reading_multiple_answer.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/reading_single_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=3 && $tot_ques <= 4)
        {
            $type = $tot_ques-2;
            $type = $type + 1;
            if($type == 3){
                ?><script type="text/javascript">location.replace("section_test/reading_reorder_paragraph.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/reading_multiple_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=5 && $tot_ques <= 7)
        {
            $type = $tot_ques-4 ;
            $type = $type + 1;
            if($type == 4){
                ?><script type="text/javascript">location.replace("section_test/reading_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/reading_reorder_paragraph.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=8 && $tot_ques <= 12 )
        {
            $type = $tot_ques-7;
            $type = $type + 1;
            if($type == 6){
                ?><script type="text/javascript">location.replace("section_test/reading_writing_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/reading_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=13 && $tot_ques <=18)
        {
            $type = $tot_ques -12;
            $type = $type + 1;
            if($type == 7){
                ?><script type="text/javascript">location.replace("section_test/listening_summarize_spoken_text.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/reading_writing_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
    }
    if($section_type == "listening")
    {
        if($tot_ques >0 && $tot_ques <= 3 )
        {
            $type = $tot_ques ;
            $type = $type + 1;
            if($type == 4){
                ?><script type="text/javascript">location.replace("section_test/listening_multiple_answer.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_summarize_spoken_text.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=4 && $tot_ques <= 5 )
        {
            $type = $tot_ques - 3 ;
            $type = $type + 1;
            if($type == 3){
                ?><script type="text/javascript">location.replace("section_test/listening_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_multiple_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=6 && $tot_ques <= 8 )
        {
            $type = $tot_ques - 5 ;
            $type = $type + 1;
            if($type == 4){
                ?><script type="text/javascript">location.replace("section_test/listening_highlight_correct_summary.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=9 && $tot_ques <= 10 )
        {
            $type = $tot_ques - 8;
            $type = $type + 1;
            if($type == 3){
                ?><script type="text/javascript">location.replace("section_test/listening_single_answer.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_highlight_correct_summary.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=11 && $tot_ques <= 12 )
        {
            $type = $tot_ques - 10;
            $type = $type + 1;
            if($type == 3){
                ?><script type="text/javascript">location.replace("section_test/listening_select_missing_word.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_single_answer.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=13 && $tot_ques <= 14 )
        {
            $type = $tot_ques - 12 ;
            $type = $type + 1;
            if($type == 3){
                ?><script type="text/javascript">location.replace("section_test/listening_highlight_incorrect_words.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_select_missing_word.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=15 && $tot_ques <= 17 )
        {
            $type = $tot_ques - 14 ;
            $type = $type + 1;
            if($type == 4){
                ?><script type="text/javascript">location.replace("section_test/listening_write_from_dictation.php?testno=<?php echo $test_no; ?>&question_no=1");</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_highlight_incorrect_words.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
        if($tot_ques >=18 && $tot_ques <= 21 )
        {
            $type = $tot_ques - 17 ;
            $type = $type + 1;
            if($type == 5){
                ?><script type="text/javascript">
                    Snackbar.show({ text: 'Test Completed Already!', duration: 2000, });</script><?php
            }
            else
            {
            ?><script type="text/javascript">location.replace("section_test/listening_write_from_dictation.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $type  ?>");</script><?php   
            } 
        }
    }

}
if(isset($_POST['edit']))
{
    ?><script type="text/javascript">location.replace("manage_section_tests.php?testno=<?php echo $_POST['edit']; ?>");</script><?php
}
?>