<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Create Test | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../../plugins/dropify/dropify.min.css">
    <link href="../../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <script type="text/javascript">
    function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
    <style type="text/css" media="screen">
        body{
            overflow-y:scroll;
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
                                <li class="breadcrumb-item"><a href="index.php">Create Test</a></li>
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

        <?php
            include_once 'sidebar.php';
        ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-6">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">                
                            <form id="general-info" class="section general-info" method="POST" action="index.php" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">

                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="info">
                                                        <h2 class="ml-5 mt-3"><b>Create Test</b></h2><br><br>
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto ">
                                                                <div class="row">
                                                                    <div class="col-md-12 " >
                                                                        <div class="form-group">
                                                                            <label for="fullName" class="font-weight-bold" style="font-size: 1.1em;color: black">Test Section :</label>
                                                                            <select name="section-name" class="form-control">
                                                                                <option value="speaking">Speaking</option>
                                                                                <option value="writing">Writing</option>
                                                                                <option value="reading">Reading</option>
                                                                                <option value="listening">Listening</option>
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>                           
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 " >
                                                                        <div class="form-group">
                                                                            <label for="fullName" class="font-weight-bold" style="font-size: 1.1em;color: black">Test Name :</label>
                                                                            <input type="text" name="test_name" class="form-control mb-4 " required="" id="test_name" title="Only characters and numbers" placeholder="Test Name">
                                                                        </div>
                                                                    </div>                           
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 ">
                                                                        <div class="form-group">
                                                                            <label for="fullName" class="font-weight-bold" style="font-size: 1.1em;color: black">Test Price :</label>
                                                                            <input type="text" name="test_price" class="form-control mb-4 " required="" id="test_price" pattern="[+-]?([0-9]*[.])?[0-9]+" title="Only numbers" placeholder="Test Price">
                                                                        </div>
                                                                    </div>                             
                                                                </div>
                                                                <div class="row" align="center">
                                                                    <div class="col-md-12">
                                                                        <button type="submit" name="submit" id="submit" class="btn btn-danger mt-2"  >Create</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

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
        //  function getData(){
        //     var test_name = document.getElementById("test_name").value;
        //     var test_price = document.getElementById("test_price").value;
        //     if(test_name || test_price)
        //     {
        //         return false;
        //     }
        //     else
        //     {
        //         location.replace("speaking_read_a_loud.php?question_no=1&test=new&test_name="+test_name+"&test_price="+test_price);
        //     }
        // }
    </script>
    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../plugins/dropify/dropify.min.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../../plugins/tagInput/tags-input.js"></script> -->
    <script src="../../assets/js/users/account-settings.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    include_once("../../database/dbh.inc.php");
    $section_name = mysqli_escape_string($conn,$_POST['section-name']);
    $test_name = mysqli_escape_string($conn,$_POST['test_name']);
    $test_price = mysqli_escape_string($conn,$_POST['test_price']);
    if($section_name == "speaking")
    {
        ?><script type="text/javascript"> location.replace("speaking_read_a_loud.php?question_no=1&test=new&test_name=<?php echo $test_name; ?>&test_price=<?php echo $test_price ?>");</script><?php    
    }
    else if($section_name == "writing")
    {
        ?><script type="text/javascript"> location.replace("writing_written_text.php?question_no=1&test=new&test_name=<?php echo $test_name; ?>&test_price=<?php echo $test_price ?>");</script><?php    
    }
    else if($section_name == "reading")
    {
        ?><script type="text/javascript"> location.replace("reading_single_answer.php?question_no=1&test=new&test_name=<?php echo $test_name; ?>&test_price=<?php echo $test_price ?>");</script><?php    
    }
    else if($section_name == "listening")
    {
        ?><script type="text/javascript"> location.replace("listening_summarize_spoken_text.php?question_no=1&test=new&test_name=<?php echo $test_name; ?>&test_price=<?php echo $test_price ?>");</script><?php    
    }
    
}
?>