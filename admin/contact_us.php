<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<?php 
    include_once '../database/dbh.inc.php';
    $sql = mysqli_query($conn , "SELECT * from contect_us ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Contect US | Origin Overseas - PTE Tutors </title>
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="evaluation_table.php"><span> Contect US </span></a></li>
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
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Message</th>
                                                        <th class="text-center">Preference</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Mobile No</th>
                                                        <th class="text-center">Modify Date</th>
                                                        <th class="text-center">Delete</th>
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
                                                        
                                                    
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;" class="text-center">'.$row['name'].'</div></td>';
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;" class="text-center">'.$row['message'].'</div></td>';
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;" class="text-center">'.$row['preference'].'</div></td>';
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;" class="text-center">'.$row['email'].'</div></td>';
                                                        echo '<td><div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;line-height: 1.5;max-height: 5.25;" class="text-center">'.$row['mobileNo'].'</div></td>';
                                                    ?>
                                                        
                                                        <td><p class="text-success text-center"><?php echo $row['modify_date']; ?></p></td>
                                                        <td class="text-center">
                                                            <button type="submit" name="delete" value="<?php echo $row['id']; ?>" onclick="delete_data()" data-toggle="modal" data-target="#faderightModal" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                        </td>
                                                    </tr>
                                                    <?php
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
        </div>
        
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->  
    <script type="text/javascript">
   
    function editQuestion(test_no,student_id){ 
        location.href="evaluation_section_table.php?testno="+test_no+"&student_id="+student_id+"&type=read-aloud";
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
        function writing_evaluation(test_no,studentId){
            window.open("evaluate_test/ex.php?test_no="+test_no+"&studentId="+studentId,"_blank");
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

        function delete_data(){
            <?php
                if (isset($_POST['delete'])) {
                    $id = mysqli_real_escape_string($conn, $_POST['delete']);
                    $sql = mysqli_query($conn,"DELETE FROM contect_us WHERE id=$id ");
                }
                if ($sql == false) {
                    ?>    
                    window.alert("There is Some Error, Please Try Again"); 
                    <?php
                }
            ?>

        }
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
</body>
</html>