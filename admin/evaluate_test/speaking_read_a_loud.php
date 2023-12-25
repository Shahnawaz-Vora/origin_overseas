<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
    include_once("../../database/dbh.inc.php");
    if(isset($_GET['question']) && isset($_GET['student_id']) && isset($_GET['test_no']))
    {
        $id = $_GET['question'];
        $studentId= $_GET['student_id'];
        $test_no = $_GET['test_no'];
        $sql = mysqli_query($conn , "SELECT * from test where id='$id'");
        $row = mysqli_fetch_assoc($sql);
        $question_no = $row['question_no'];
        $user_sql = mysqli_query($conn , "SELECT * from user_test WHERE studentId='$studentId' AND test_no='$test_no' AND section='speaking' AND type='read-aloud' AND question_no='$question_no' ");
        $user_row = mysqli_fetch_assoc($user_sql);
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
    <title>Evaluate Test-Speaking: Read Aloud | Origin Overseas - PTE tutors </title>
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
            <?php 
                $sql5 = mysqli_query($conn,"select * from manage_test where test_no = '$test_no'");
                $row5 = mysqli_fetch_assoc($sql5);
            ?>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="../evaluation_table.php">Evaluate Tests</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="../evaluation_section_table.php?testno=<?php echo $test_no; ?>&student_id=<?php echo $studentId; ?>&type=read-aloud"><?php echo $row5['test_name']; ?> :Read A Loud</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Question: <?php echo $question_no ;?></span></li>
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
                            <form id="general-info" class="section general-info" action="" method="post">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-top-spacing" >
                                                    <h4><center><b>Read a loud</b> : Question <?php echo $question_no; ?></center></h4>
                                                    <div class="info">
                                                        <h6 class="pl-2">
                                                       Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" disabled="true" style="color:black;" class="form-control" name="question_text" required=""><?php echo stripslashes($row['questionText']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px" disabled=true>
                                                        <h6 class="pl-2">
                                                        Model Answer:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" disabled="true" style="color:black;" class="form-control" name="answer" required=""><?php echo stripslashes($row['answer']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px" disabled=true>
                                                        <h6 class="pl-2">
                                                        User Answer:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <audio controls>
                                                                        <source src="../../database/audio/<?php echo $user_row['audio'] ?>" type="audio/mpeg">
                                                                    </audio>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px" >
                                                        <h6 class="pl-2">
                                                        Marks:</h6><br>
                                                        <div class="row no-gutters" style="margin-top: -45px;margin-left: 40px;">
                                                            <div class="col-md-2 mx-auto" align="center">
                                                                <div class="form-group" align="left">
                                                                    <label style="font-size:1em">Content: </label>
                                                                    <input style="color:black;" name="content" class="form-control" id="content_marks" required="" pattern="[0-5]" placeholder="Content" value="<?php if (isset($user_row['content'])) {echo $user_row['content']; } else {echo ""; } ?>">
                                                                    <span id="content_error" style="color: red;display: none;">Marks must be 0 to 5</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2 mx-auto no-gutters" >
                                                                <div class="form-group" align="left">
                                                                    <label style="font-size:1em">Fluency: </label>
                                                                    <input style="color:black;" name="fluency" class="form-control" id="fluency" required="" pattern="[0-5]" placeholder="Fluency" value="<?php if (isset($user_row['fluency'])) {echo $user_row['fluency']; } else {echo ""; } ?>">
                                                                    <span id="content_flu" style="color: red;display: none;">Marks must be 0 to 5</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mx-auto no-gutters" >
                                                                <div class="form-group" align="left">
                                                                    <label style="font-size:1em">Pronounciation: </label>
                                                                    <input style="color:black;" name="pronounciation" class="form-control" id="pronounciation" required="" pattern="[0-5]" placeholder="Pronounciation" value="<?php if (isset($user_row['pronunciation'])) {echo $user_row['pronunciation']; } else {echo ""; } ?>">
                                                                    <span id="content_pro" style="color: red;display: none;">Marks must be 0 to 5</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mx-auto no-gutters" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px" disabled=true>
                                                        <h6 class="pl-2">
                                                        Average Marks:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <input name="marks" readonly="" style="color:black;" class="form-control" required="" id="marks" value="<?php if (isset($user_row['marks'])) {echo $user_row['marks']; } else {echo ""; } ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px" disabled=true>
                                                        <h6 class="pl-2">
                                                        Comments from Admin:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" name="comments" cols="10" style="color:black;" class="form-control"><?php if (isset($user_row['comments'])) {echo $user_row['comments']; } else {echo ""; } ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group" align="center">
                                            <button class="btn btn-primary btn-rounded" name="update" id="update" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Update</button>
                                            <button class="btn btn-primary btn-rounded" name="update_next" id="update_next" style="width: 180px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">Update & Next</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="actual_marks" id="actual_marks">
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
        $("#content, #fluency, #pronounciation").on("keyup focusin focusout", function () {
            calculate();
        });
        function calculate(){
            var content=$("#content_marks").val();
            var fluency=$("#fluency").val();
            var pronounciation=$("#pronounciation").val();
            var con=0;
            var flu =0;
            var pro = 0;
            if(parseInt(content) >=0 && parseInt(content)<=5){
                $("#content_error").css("display","none");
                con = 1; 
            }else{
                $("#content_error").css("display","block");
                con=0;
            }
            if(parseInt(fluency) >=0 && parseInt(fluency)<=5){
                $("#content_flu").css("display","none");
                flu=1;
            }else{
                $("#content_flu").css("display","block");
                flu=0;
            }
            if(parseInt(pronounciation) >=0 && parseInt(pronounciation)<=5){
                $("#content_pro").css("display","none");
                pro=1;
            }else{
                $("#content_pro").css("display","block");
                pro=0;
            }
            if(content != null && content != "" && content != " " && fluency != null && fluency != "" && fluency != " " && pronounciation != null && pronounciation != "" && pronounciation != " " ){
                mark = parseInt(content)+parseInt(fluency)+parseInt(pronounciation);
                marks=(mark*(90/7))/15;
            }else{
                marks = 0;
            }
            $("#actual_marks").val(marks.toFixed(2));
            var val =marks.toFixed(2)+'/12.86';
            $("#marks").val(val);
        }
        $("#update_next , #update").on("click",function(){
            if(con == 1 && pro == 1 && flu == 1)
            {
                document.getElementById("general-info").submit();
            }
            else
            {
                return false;
            }
        });
    </script>
    <!-- <script src="../../assets/js/custom.js"></script> -->
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
if(isset($_POST['update_next']))
{
    $marks = trim(mysqli_escape_string($conn,$_POST['actual_marks']));
    $content = trim(mysqli_escape_string($conn,$_POST['content']));
    $fluency = trim(mysqli_escape_string($conn,$_POST['fluency']));
    $pronounciation = trim(mysqli_escape_string($conn,$_POST['pronounciation']));
    $comments = trim(mysqli_escape_string($conn,$_POST['comments']));
    $sql = mysqli_query($conn,"update user_test set marks='$marks',content='$content',fluency='$fluency',pronunciation='$pronounciation',comments='$comments' where studentId='$studentId' and test_no='$test_no' and question_no='$question_no'");
    if($sql == true)
    {
        if($question_no == 7)
        {
            $id = $id+1;
            ?><script>
                location.replace("speaking_repeat_sentence.php?question=<?php echo $id; ?>&student_id=<?php echo $studentId; ?>&test_no=<?php echo $test_no; ?>");
            </script><?php
        }
        else
        {
            $id = $id+1;
            ?><script>
                location.replace("speaking_read_a_loud.php?question=<?php echo $id; ?>&student_id=<?php echo $studentId; ?>&test_no=<?php echo $test_no; ?>");
            </script><?php
        }
    }
    else
    {
        ?><script>location.replace("speaking_read_a_loud.php?question=<?php echo $id ; ?>&student_id=<?php echo $studentId; ?>&test_no=<?php echo $test_no; ?>&error=1");</script><?php
    }
}
if(isset($_POST['update']))
{
    $marks = trim(mysqli_escape_string($conn,$_POST['actual_marks']));
    $content = trim(mysqli_escape_string($conn,$_POST['content']));
    $fluency = trim(mysqli_escape_string($conn,$_POST['fluency']));
    $pronounciation = trim(mysqli_escape_string($conn,$_POST['pronounciation']));
    $comments = trim(mysqli_escape_string($conn,$_POST['comments']));
    $sql = mysqli_query($conn,"update user_test set marks='$marks',content='$content',fluency='$fluency',pronunciation='$pronounciation',comments='$comments' where studentId='$studentId' and test_no='$test_no' and question_no='$question_no'");
    if($sql == true)
    {
        ?><script>location.replace("../evaluation_section_table.php?student_id=<?php echo $studentId; ?>&testno=<?php echo $test_no; ?>&insert=1&type=read-aloud");</script><?php
    }
    else
    {
        ?><script>location.replace("speaking_read_a_loud.php?question=<?php echo $id ; ?>&student_id=<?php echo $studentId; ?>&test_no=<?php echo $test_no; ?>&error=1");</script><?php
    }
}

?>
<?php 
     if (isset($_GET['error'])) {
         ?><script type="text/javascript">
        Snackbar.show({ text: 'There is some errror. Please Try Again!', duration: 3000, });
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.delete("error");
        history.pushState(null, null, "?"+queryParams.toString());
        </script><?php
    }
?>