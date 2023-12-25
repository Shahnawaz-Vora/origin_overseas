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
    <title>Notes | Origin Overseas </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/css/apps/notes.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Notes</span></li>
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
            include_once "sidebar.php";
        ?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row app-notes layout-top-spacing" id="cancel-row">
                    <div class="col-lg-12">
                        <div class="app-hamburger-container">
                            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                        </div>

                        <div class="app-container">
                            
                            <div class="app-note-container">

                                <div class="app-note-overlay"></div>

                                
                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12 text-center">
                                            <br>
                                            <a id="btn-add-notes" class="btn btn-primary" href="javascript:void(0);">Add</a>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12 mt-5">
                                            <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link list-actions active" id="all-notes"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> All Notes</a>
                                                </li>
                                            </ul>
                                            <br>
                                            <hr/>
                                            <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg> Save your</p>

                                            <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link g-dot-primary" id="note-personal">Valuable Time</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link g-dot-warning" id="note-work">Important Data</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link g-dot-success" id="note-social">Schedule</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link g-dot-danger" id="note-important">Tasks Syncing</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="note-container note-grid">
                                    <?php 
                                    include_once '../database/dbh.inc.php';
                                    $sql = mysqli_query($conn,"SELECT * FROM admin_notes");
                                    $i=0;
                                    $colors=array("personal","important","work","fav","social","fav","fav");
                                    while($row = mysqli_fetch_assoc($sql)) {
                                        echo'<div class="note-item all-notes note-'.$colors[$i].'">
                                            <div class="note-inner-content">
                                                <div class="note-content">
                                                    <p class="note-title">'.$row['title'].'</p>
                                                    <p class="meta-time">'.$row['modify_date'].'</p>
                                                    <div class="note-description-content">
                                                        <p class="note-description">'.$row['description'].'</p>
                                                    </div>
                                                </div>
                                                <form method="POST">
                                                    <div class="note-action" align="right">
                                                        <button type="submit" name="delete_note" value="'.$row['id'].'" data-toggle="modal" style="border:none;background:none;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 "><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>';
                                        if($i>=6){
                                            $i=0;
                                        }else{
                                            $i++;
                                        }
                                    }
                                    ?>

                                </div>

                            </div>
                            
                        </div>

                        <!-- Modal -->
                                            <div class="modal fade" id="notesMailModal" tabindex="-1" role="dialog" aria-labelledby="notesMailModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            <div class="notes-box">
                                                                <div class="notes-content">                                                                        
                                                                    <form method="post">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="d-flex note-title">
                                                                                        <input type="text" id="n-title" name="title" class="form-control" maxlength="25" placeholder="Title">
                                                                                    </div>
                                                                                    <span class="validation-text"></span>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="d-flex note-description">
                                                                                        <textarea id="n-description" name="description" class="form-control" maxlength="60" placeholder="Description" rows="3"></textarea>
                                                                                    </div>
                                                                                    <span class="validation-text"></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn" data-dismiss="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Discard</button>
                                                                <button name="add_notes" type="submit" class="btn btn-primary">Add</button>
                                                            </div>
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="../assets/js/apps/notes.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>


<?php

include_once '../database/dbh.inc.php';

if (isset($_POST['add_notes'])) {
    $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $modify_date = date("Y/m/d");
    $sql = mysqli_query($conn, "INSERT INTO admin_notes(title, description,modify_date) VALUES ('$title', '$description','$modify_date' ) ");
    ?>
    <script type="text/javascript">
        window.location = "apps_notes.php";
    </script> 
    <?php
}

if (isset($_POST['delete_note'])) {
    $id = trim(mysqli_real_escape_string($conn, $_POST['delete_note']));
    $sql = mysqli_query($conn, "DELETE FROM admin_notes WHERE id=$id ");
    ?>
    <script type="text/javascript">
        window.location = "apps_notes.php";
    </script> 
    <?php
}

?>