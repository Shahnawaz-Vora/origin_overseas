<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<?php 
    include_once '../database/dbh.inc.php';
    $sql = mysqli_query($conn , "SELECT * from section_user_test where (question_no=38 and section='speaking') or (question_no=4 and section='writing') or (question_no=18 and section='reading') or (question_no=21 and section='listening')  GROUP BY test_no ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Evaluate Tests | Origin Overseas - PTE Tutors </title>
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="evaluation_table.php"><span> Evaluate Tests </span></a></li>
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
                                                        <th class="text-center">Student No</th>
                                                        <th class="text-center">Test No.</th>
                                                        <th class="text-center">Test Name</th>
                                                        <th class="text-center">Taken Date</th>
                                                        <th class="text-center">Evaluate</th>
                                                        <th class="text-center">Final Evaluate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0;
                                                    while($row = mysqli_fetch_assoc($sql)) {
                                                        $t = $row['test_no'];
                                                        $sql3 = mysqli_query($conn,"select * from manage_section_test where test_no='$t'");
                                                        $row3 = mysqli_fetch_assoc($sql3);
                                                        $i+=1; 
                                                        echo '
                                                        <tr>
                                                            <td class="text-center">'.$i.'</td>
                                                            ';
                                                        
                                                    
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;" class="text-center">'.$row['studentId'].'</div></td>';
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;" class="text-center">'.$row['test_no'].'</div></td>';
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;" class="text-center">'.$row3['test_name'].'</div></td>';
                                                    ?>
                                                        <!-- <td class="text-center">Vincent Carpenter</td> -->
                                                        
                                                        <?php
                                                             $test_no = $row['test_no'];
                                                             $student_id = $row['studentId'];
                                                        ?>
                                                        <td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;" class="text-center"><?php echo $row['modify_date']; ?></div></td>
                                                        <td class="text-center">
                                                            <?php 
                                                            
                                                            $section = $row['section'];

                                                            if($row['section'] == "reading")
                                                            {
                                                                ?><div class="td-content"><span class="badge outline-badge-primary">Evaluated</span></div><?php    
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <button type="button" onclick="editQuestion('<?php echo $test_no; ?>','<?php echo $student_id; ?>','<?php echo $section; ?>');" data-toggle="modal" data-target="#faderightModalEdit" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php
                                                            $check = mysqli_num_rows(mysqli_query($conn,"SELECT * from user_test where test_no='$t' AND studentId='$student_id' AND marks='NULL' OR marks='' "));
                                                        ?>
                                                            <button type="button" <?php if($check != 0){echo "disabled";} ?> name="writing" onclick="writing_evaluation('<?php echo $test_no; ?>','<?php echo $student_id; ?>','<?php echo $section; ?>')" class="btn btn-danger">Submit</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            <!--modal -->
                                                
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
   
    function editQuestion(test_no,student_id,section){
        if(section == "speaking")
        {
            location.href="evaluation_section_test_table.php?testno="+test_no+"&student_id="+student_id+"&type=read-aloud&section=speaking";
        } 
        else if(section == "writing")
        {
            location.href="evaluation_section_test_table.php?testno="+test_no+"&student_id="+student_id+"&type=summarize-written-text&section=writing";
        }
        else if(section == "listening")
        {
            location.href="evaluation_section_test_table.php?testno="+test_no+"&student_id="+student_id+"&type=summarize-spoken-text&section=listening";
        }
        
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
    <script type="text/javascript">
        function writing_evaluation(test_no,studentId,section){
            
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {test:test_no,studentId:studentId,section:section},
                success: function (response) {
                    if(response == 38 || response ==4 || response ==18 || response ==21){
                        window.open("evaluate_section_test/ex.php?test_no="+test_no+"&studentId="+studentId+'&section='+section,"_blank");
                    }else{
                        Snackbar.show({ text: 'Please Enter '+section+' Section Marks First', duration: 4000});
                        var queryParams = new URLSearchParams(window.location.search);
                        queryParams.delete("wrong");
                        history.pushState(null, null, "?"+queryParams.toString());
                    }
                }
            });            
        }
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