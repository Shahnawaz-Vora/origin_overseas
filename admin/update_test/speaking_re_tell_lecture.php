<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
    include_once("../../database/dbh.inc.php");
    if(isset($_GET['question']))
    {
        $id = $_GET['question'];
        $sql = mysqli_query($conn , "select * from test where id='$id'");
        $row = mysqli_fetch_assoc($sql);
    }
    else
    {
        ?><script type="text/javascript">location.replace("../manage_test_table.php");</script><?php
    }
    $section = "speaking";
    $question_no = $row['question_no'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Update Test-Speaking: Re Tell Lacture | Origin Overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
      <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../../plugins/dropify/dropify.min.css">
    <link href="../../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../plugins/animate/animate.css">
    <link href="../../assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/step.css">
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body>
    <div id="load_screen"> <div class="loader"> <div class="loaer-contdent">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
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

                        <?php 
                        $t = $row['test_no'];
                            $sql5 = mysqli_query($conn,"select * from manage_test where test_no = '$t'");
                            $row5 = mysqli_fetch_assoc($sql5);
                        ?>
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../manage_test_table.php">Manage Tests</a></li>
                                <li class="breadcrumb-item"><a href="../manage_tests.php?testno=<?php echo $t; ?>"><?php echo $row5['test_name']; ?></a></li>
                                <li class="breadcrumb-item"><a href="../manage_test_question_table.php?section=speaking&testno=<?php echo $t; ?>&type=re-tell-lecture">Speaking: Re-Tell Lecture</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Question <?php echo $row['question_no']; ?></span></li>
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
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">  
                             <?php include_once("breadcrumb.php "); ?>                
                            <form id="general-info" class="section general-info" method="POST" action="" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing"> 
                                                    <h4><center><b>Re-Tell Lecture</b> : Question <?php echo $question_no; ?></center></h4>
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-lg-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-lg-12 col-md-4">
                                                                         <div class="upload mt-4 pr-md-4 uploadimg" style="border:none;">
                                                                            <?php 
                                                                                if(file_exists("../../database/audio/".$row['audio']) || file_exists("../../database/video/".$row['audio']))
                                                                                {
                                                                                    if(file_exists("../../database/audio/".$row['audio'])){
                                                                                       echo "<audio controls height=250 width=250 id='imgshow' src=../../database/audio/".$row['audio']."></audio>"."<button type='button' class='btn btn-danger btn-block w-25 mb-4' onclick=remove(); id='removebtn'>Remove</button>";
                                                                                        $audio_video = 0;
                                                                                    }
                                                                                    if(file_exists("../../database/video/".$row['audio'])){
                                                                                        echo "<video controls width=150% id='imgshow' src=../../database/video/".$row['audio']."></video>"."<button type='button' class='btn btn-danger btn-block w-25 mb-4' onclick=remove(); id='removebtn'>Remove</button>";  $audio_video = 1;    
                                                                                    }
                                                                                }
                                                                                else{
                                                                                        echo '<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" accept="audio/* "/ required=""><p class="mb-4"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Audio/Video</b></p>'; 
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" style="margin-top: -65px">
                                                    <div class="info" >
                                                        <h6 class="pl-2">
                                                        Answer:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" class="form-control" name="answer" required=""><?php echo stripslashes($row['answer']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">
                                                       Transcript:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" class="form-control" name="transcript" required=""><?php echo stripslashes($row['transcript']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group" align="center">
                                            <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Update</button>
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
        function remove(){
            $("#imgshow").remove();
            $("#removebtn").remove();
            $(".uploadimg").append('<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" accept="audio/* "/ required=""><p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Audio/Video</b></p>');
                <?php $originalfile = $row['audio']; ?>
        }
    </script>
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
    if (isset($_POST['submit'])) {
        include_once '../../database/dbh.inc.php';
        $type = "re-tell-lecture";
        $test_no = $row['test_no'];
        $answer = trim(addslashes(mysqli_real_escape_string($conn, $_POST['answer'])));
        $transcript = trim(addslashes(mysqli_real_escape_string($conn, $_POST['transcript'])));
        $modify_date = date("Y/m/d");
        $question_no = $_GET['question_no'];
        if(isset($_FILES['profileImg'])){
            $file = $_FILES['profileImg'];   
            $fileName = $_FILES['profileImg']['name'];
            $fileType = $_FILES['profileImg']['type'];
            $fileTmpName = $_FILES['profileImg']['tmp_name'];
            $fileSize = $_FILES['profileImg']['size'];
            $fileError = $_FILES['profileImg']['error'];  

             $allowed  = array('mp3','wav','mpeg','.MP3','.aac');
            $allowed_vid  = array('mp4','avi','mkv');
            $fileExt =explode('.',$fileName);
            $fileActualExt= strtolower(end($fileExt));
            if (in_array($fileActualExt,$allowed) || in_array($fileActualExt,$allowed_vid)){
                if ($fileError === 0 ){
                    $fileNameNew =uniqid('' ,true ).".".$fileActualExt;
                    if (in_array($fileActualExt,$allowed)) {
                        $fileDestination='../../database/audio/'.$fileNameNew; 
                    }if (in_array($fileActualExt,$allowed_vid)) {
                        $fileDestination='../../database/video/'.$fileNameNew;
                    }
                    $sql = mysqli_query($conn, "update test set audio='$fileNameNew' , answer='$answer',transcript='$transcript',modify_date='$modify_date' where id='$id'");
                    if ($sql == true) {
                        move_uploaded_file($fileTmpName,$fileDestination);
                        if($audio_video == 0){
                            unlink("../../database/audio/".$originalfile);
                        }
                        else if($audio_video == 1){
                            unlink("../../database/video/".$originalfile);
                        }
                        ?>
                        <script type="text/javascript">  
                        window.location = "../manage_test_question_table.php?section=speaking&testno=<?php echo $test_no; ?>&type=<?php echo $type; ?>&update=success"; 
                        </script>
                        <?php    
                    }else{
                        ?>
                        <script type="text/javascript">
                        window.location = "speaking_re_tell_lecture.php?question=<?php echo $id ?>&error=1";
                        </script>
                        <?php
                    }
                }else{
                        ?>
                        <script type="text/javascript">
                        window.location = "speaking_re_tell_lecture.php?question=<?php echo $id ?>&file_error=1";
                        </script>
                        <?php
                }
            }else{
                ?>
                <script type="text/javascript">
                window.location = "speaking_re_tell_lecture.php?question=<?php echo $id ?>&type=1"; 
                </script>
                <?php
            }
        }else{
            $sql = mysqli_query($conn, "update test set answer='$answer',transcript='$transcript',modify_date='$modify_date' where id='$id'");
            if ($sql == true) {
                ?>
                <script type="text/javascript">    
                window.location = "../manage_test_question_table.php?section=speaking&testno=<?php echo $test_no; ?>&type=<?php echo $type; ?>&update=success"; 
                </script>
                <?php    
            }else{
                ?>
                <script type="text/javascript">    
                window.location = "speaking_re_tell_lecture.php?question=<?php echo $id ?>&error=1";
                </script>
                <?php
            }
        }
    }
?>
<?php
if(isset($_GET['error']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Some Error, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['high']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'File size is too high !', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("high");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['file_error']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is Error in Your File', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("file_error");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['type']))
{
    ?><script type="text/javascript">
    Snackbar.show({ text: 'You Can Not Upload this type of Audio/Video', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>