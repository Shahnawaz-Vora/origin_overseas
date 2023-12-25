<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php
    include_once '../../database/dbh.inc.php';
    $sql = mysqli_query($conn, "select * from student");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Manage Student | Origin Overseas - PTE Tutors </title>
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
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/switches.css">
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
                                <li class="breadcrumb-item"><a href="student_manage_table.php"> Manage Student </a></li>
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
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Stud. Name</th>
                                                    <th class="text-center">Stud. Id</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Test Given</th>
                                                    <th class="text-center">Overall AVG.</th>
                                                    <th class="text-center">Joining </th>
                                                    <th class="text-center">Ending </th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Stud. Name</th>
                                                    <th class="text-center">Stud. Id</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Test Given</th>
                                                    <th class="text-center">Overall AVG.</th>
                                                    <th class="text-center">Joining </th>
                                                    <th class="text-center">Ending </th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $i=0;
                                                    while($row = mysqli_fetch_assoc($sql)) {
                                                        $i+=1; 
                                                        echo '
                                                        <tr>
                                                            <td class="text-center">'.$i.'</td>
                                                            ';
                                                        $name = $row['firstName']." ".$row['lastName'];
                                                        echo '<td class="text-center">'.$name.'</td>';
                                                        $id = $row['studentId'];
                                                        $studId = "Stud".$id;
                                                        echo '<td class="text-center">'.$studId.'</td>';
                                                        if($row['status'] == 0)
                                                        {
                                                            $status = "";
                                                        }
                                                        else
                                                        {
                                                            $status = "checked";
                                                        }
                                                        echo '<td class="text-center">'.
                                                            '<label class="switch s-primary mr-2">
                                                                <input type="checkbox" '.$status.' id="active_deactive'.$i.'" name="checkbox" onclick="switching('.$id.');">
                                                                <span class="slider round"></span>
                                                            </label>'
                                                        .'</td>'; 
                                                        $sql5=mysqli_query($conn,"select distinct(test_no) as given_test from user_test where question_no=81 and studentId='$id'");
                                                        $given_test = mysqli_num_rows($sql5);
                                                        echo '<td class="text-center">'.$given_test.'</td>';
                                                        $test_score = mysqli_query($conn,"SELECT *,AVG(average_marks) AS overall_average FROM test_evaluation WHERE studentId=$id "); 
                                                        $test_score_row = mysqli_fetch_assoc($test_score);
                                                        echo '<td class="text-center">'.round($test_score_row['overall_average'],3).'</td>';
                                                        echo '<td class="text-center">'.date("d-m-Y",strtotime($row['joinDate'])).'</td>';
                                                        echo '<td class="text-center">'.date("d-m-Y",strtotime($row['endDate'])).'</td>';
                                                        
                                                        echo '<td class="text-center">
                                                            <button type="button" onclick="editQuestion('.$id.');" data-toggle="modal" data-target="#faderightModalEdit" style="border:none;background:none;" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                            </td>'; 
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
    function editQuestion(id){
        window.location = "update_student.php?studId="+id;
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
<script type="text/javascript">
    var totalCheckboxes = $('input:checkbox').length;
    var checkbox=[];
    var sid ;
    var status ;
    function switching(id)
    {  
        studId=id;
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
                data: {status: status,studId: studId},
            });
        }
        else
        {
            $(this).val(0);
            status = 0;
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {status: status,studId: studId},
            });
        }
    });
</script>
<?php
    include_once '../../database/dbh.inc.php';
    
?>
<?php 
    if (isset($_GET['success'])) {
        ?><script type="text/javascript">
        Snackbar.show({ text: 'Student record updated', duration: 2000, });
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("success");
        history.pushState(null, null, "?"+queryParams.toString());
        </script><?php
    }
?>