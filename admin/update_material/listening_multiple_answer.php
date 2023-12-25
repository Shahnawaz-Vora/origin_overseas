<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php
    if (!isset($_GET['question'])) {
        ?><script>//location.href='../manage_materials.php'; 
        </script><?php
    }
    $type = "multiple-answers";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Update Materials-Listening: Multiple Choice, Choose Multiple Answers | Origin Overseas - PTE tutors </title>
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
    <link href="../../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
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
                                <li class="breadcrumb-item"><a href="../manage_materials.php">Manage Materials</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Listening: Choose Multiple Answers</span></li>
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
            include_once '../../database/dbh.inc.php';
            $question_id = $_GET['question'];
            $sql="SELECT * FROM material_listening WHERE type='multiple-answers' and listeningMaterialId='$question_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
       

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">                
                            <form id="general-info" class="section general-info" method="POST" action="listening_multiple_answer.php" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">
                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" >
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-lg-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                                                        <div class="upload mt-4 pr-md-4 uploadimg" style="border:none;">
                                                                            <?php 
                                                                                if(file_exists("../../database/audio/".$row['audio']))
                                                                                {
                                                                                    echo "<audio controls height=250 width=250 id='imgshow' src=../../database/audio/".$row['audio']."></audio>";
                                                                                }
                                                                                else
                                                                                {
                                                                                    echo '<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" accept="audio/* "/ required=""><p class="mb-4"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Audio</b></p>';
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-1 col-lg-12 col-md-4">
                                                                        <?php
                                                                            if(file_exists("../../database/audio/".$row['audio']))
                                                                            {
                                                                                echo '<button type="button" class="btn btn-danger btn-block" style="margin-top:31px;padding-left:13px;" onclick=remove(); id="removebtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing" style="margin-top: -55px">
                                                    <div class="info">
                                                        <h6 class="pl-2">Question:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="4" cols="108" class="form-control" id="question_text" name="question" required=""><?php echo stripslashes($row['question']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info">
                                                        <h6 class="pl-2">Transcript:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <textarea rows="7" cols="10" class="form-control" name="transcript" required=""><?php echo stripslashes($row['transcript']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $tot_opt = 0;
                                                    for ($cou=1; $cou <= 8; $cou++) { 
                                                        $opt = "option".$cou;
                                                        if (isset($row[$opt]) && $row[$opt]!= "" && $row[$opt]!=" ") {
                                                            $tot_opt++;    
                                                        }
                                                    }
                                                    $answer = explode("/*/", $row['answer']); 

                                                    ?>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">No. of Options:</h6><br>
                                                        <div class="row" style="margin-top: -55px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <select name="options" id="options" onchange="change();" class="form-control custom-control mt-2" required="">
                                                                        <option value="" disabled="">--Select Option--</option> 
                                                                        <option value=1 <?php if ($tot_opt == 1) {echo 'selected=""';}?>>1</option>
                                                                        <option value=2 <?php if ($tot_opt == 2) {echo 'selected=""';}?>>2</option>
                                                                        <option value=3 <?php if ($tot_opt == 3) {echo 'selected=""';}?>>3</option>
                                                                        <option value=4 <?php if ($tot_opt == 4) {echo 'selected=""';}?>>4</option>
                                                                        <option value=5 <?php if ($tot_opt == 5) {echo 'selected=""';}?>>5</option>
                                                                        <option value=6 <?php if ($tot_opt == 6) {echo 'selected=""';}?>>6</option>
                                                                        <option value=7 <?php if ($tot_opt == 7) {echo 'selected=""';}?>>7</option>
                                                                        <option value=8 <?php if ($tot_opt == 8) {echo 'selected=""';}?>>8</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info">
                                                        <h6 class="pl-2" style="display: none;" id="option_text">Option:</h6><br>
                                                        <div class="row" style="margin-top: -30px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                    
                                                                    <div class="col-md-12" style="display: none;" id="option1" >
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="checkbox" value="0" name="checkbox" id="checkbox1" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option1']) {echo 'checked=""'; break; } } ?> >
                                                                             <input type="text"  name="option1" class="form-control" id="opt1" value="<?php if (isset($row['option1'])) {echo stripcslashes($row['option1']);}?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option2">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 2</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="checkbox" value="1" name="checkbox" id="checkbox2" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option2']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option2" class="form-control" id="opt2" value="<?php if (isset($row['option2'])) {echo stripcslashes($row['option2']);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option3">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 3</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" value="2" name="checkbox" id="checkbox3" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option3']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option3" class="form-control" id="opt3" value="<?php if (isset($row['option3'])) {echo stripcslashes($row['option3']);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option4">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 4</label>
                                                                            <div class="btn-group w-100">
                                                                            <input type="checkbox" value="3" name="checkbox" id="checkbox4" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option4']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option4" class="form-control" id="opt4" value="<?php if (isset($row['option4'])) {echo stripcslashes($row['option4']);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" >
                                                                    <div class="col-md-12" style="display: none;" id="option5">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 5</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" value="4" name="checkbox" id="checkbox5" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option5']) {echo 'checked=""'; break; } } ?> >
                                                                      
                                                                             <input type="text"  name="option5" class="form-control" id="opt5" value="<?php if (isset($row['option5'])) {echo stripcslashes($row['option5']);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option6">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 6</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" value="5" name="checkbox" id="checkbox6" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option6']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option6" class="form-control" id="opt6" value="<?php if (isset($row['option6'])) {echo stripcslashes($row['option6']);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option7">
                                                                        <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 7</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" value="6" name="checkbox" id="checkbox7" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option7']) {echo 'checked=""'; break; } } ?> >
                                                                           
                                                                             <input type="text"  name="option7" class="form-control" id="opt7" value="<?php if (isset($row['option7'])) {echo stripcslashes($row['option7']);}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option8">
                                                                        <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 8</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" value="7" name="checkbox" id="checkbox8" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option8']) {echo 'checked=""'; break; } } ?> >
                                                                           
                                                                             <input type="text"  name="option8" class="form-control" id="opt8" value="<?php if (isset($row['option8'])) {echo stripcslashes($row['option8']);}?>">
                                                                         </div>
                                                                        </div>
                                                                        <input type="hidden" name="ans" value="" id="ans">
                                                                        <input type="hidden" name="id" value="<?php echo $question_id ?>">
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
                                 <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group" align="center">
                                            <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">SUBMIT</button>
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
            change();
        });
        function remove(){
            $("#imgshow").remove();
            $("#removebtn").remove();
            $(".uploadimg").append('<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" accept="audio/* "/ required=""><p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Audio</b></p>');
                <?php $originalfile = $row['audio']; ?>
        }
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
<script type="text/javascript">
    
    var options;
    $("#options").change(function(){
        options = $("#options").val();
    });
   
    $('#general-info').submit(function (e) {
        
        for(var i=1;i<=options;i++){
            var index = 'opt'+i;
            x = document.getElementById(index).value;
            if(x == "") {
                Snackbar.show({ text: "Please Fill Options, it can't be Empty!", duration: 2000, });
                return false;
            }
        }

        options = $("#options").val();
        var allAns = [];
        for (var i = 1; i <= options; i++) {
            var push= $("input[id=opt"+i+"]").val();
            allAns.push(push);
        }
        var sorted_arr = allAns.sort();
        for (var i = 0; i < allAns.length - 1; i++) {
            if(sorted_arr[i + 1] != ""){
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    Snackbar.show({ text: "There is Same Options, please enter Diffrent Options!", duration: 2000, });
                    return false;
                }
            }
        }

        var radios = document.getElementsByTagName('input');
        var value=-1;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].type === 'checkbox' && radios[i].checked && radios[i].value < options) {
                value += 1; 
            }
        }

        var checkedValue = null; 
        var inputElements = $("input[type=checkbox]");
        var inputValue = $("input[type=text]");
        for(var i=0; inputElements[i]; ++i){
            if(inputElements[i].checked){
                if (checkedValue == null) {
                    checkedValue = inputValue[i].value;
                }else{
                    checkedValue =checkedValue+"/*/"+inputValue[i].value;
                }
            }
        }
        document.getElementById("ans").value = checkedValue;
        
        if (value == -1) {
            Snackbar.show({ text: "Please select Answer ! It can't be Empty.", duration: 2000, });
            return false;
        }
    });
</script>
<?php
    if (isset($_POST['submit'])) {
        include_once '../../database/dbh.inc.php';
        $type = "multiple-answers";
        $question = trim(addslashes(mysqli_real_escape_string($conn, $_POST['question'])));
        $transcript = trim(addslashes(mysqli_real_escape_string($conn, $_POST['transcript'])));
        $options = trim(addslashes(mysqli_real_escape_string($conn, $_POST['options'])));
        $ans = trim(addslashes(mysqli_real_escape_string($conn, $_POST['ans'])));
        $id =trim(mysqli_real_escape_string($conn, $_POST['id']));
        $modify_date = date("Y/m/d");
        $option = [];
         for ($i=1; $i <= 8; $i++) {
            $index = 'option'.$i;
            if ($i <= $options) {
                if ($_POST[$index] != "") {
                    array_push($option,trim(addslashes($_POST[$index])));
                }
                else{
                    array_push($option,'');
                }    
            }else{
                array_push($option,'');
            }
        }

         if($ans == null || $ans == "")
        {
              ?>
            <script type="text/javascript">    
            window.location = "listening_multiple_answer.php?question=<?php echo $id ?>&missing=1";
            </script>
            <?php
        }
        else{   
            if(isset($_FILES['profileImg'])){
                $file = $_FILES['profileImg'];   
                $fileName = $_FILES['profileImg']['name'];
                $fileType = $_FILES['profileImg']['type'];
                $fileTmpName = $_FILES['profileImg']['tmp_name'];
                $fileSize = $_FILES['profileImg']['size'];
                $fileError = $_FILES['profileImg']['error'];  

                $allowed  = array('mp3','wav','mpeg','MP3','ACC');
                $fileExt =explode('.',$fileName);
                $fileActualExt= strtolower(end($fileExt));
                if (in_array($fileActualExt,$allowed)){
                    if ($fileError === 0 ){
                        if ($fileSize <  8388608999){
                            $fileNameNew =uniqid('' ,true ).".".$fileActualExt;
                            $fileDestination='../../database/audio/'.$fileNameNew;
                            $query = "UPDATE material_listening SET audio='$fileNameNew', question='$question', transcript='$transcript', answer='$ans', option1='$option[0]', option2='$option[1]', option3='$option[2]', option4='$option[3]', option5='$option[4]', option6='$option[5]', option7='$option[6]', option8='$option[7]', modify_date='$modify_date' WHERE listeningMaterialId='$id' ";
                            $sql = mysqli_query($conn, $query);
                            if ($sql == true) {
                                move_uploaded_file($fileTmpName,$fileDestination);
                                unlink("../../database/audio/".$originalFile);
                                 ?>
                                 <script type="text/javascript">
                                     window.location = "../manage_material_table.php?section=listening&type=multiple-answers&update=success";
                                 </script> 
                                 <?php    
                            }else{
                                ?>
                                 <script type="text/javascript">    
                                     window.location = "listening_multiple_answer.php?question=<?php echo $id ?>&error=1";
                                  </script> 
                                 <?php
                            }
                        }else{
                            ?>
                             <script type="text/javascript">
                             window.location = "listening_multiple_answer.php?question=<?php echo $id ?>&high=1";
                            script>
                             <?php
                        }
                    }else{
                            ?>
                             <script type="text/javascript">
                             window.location = "listening_multiple_answer.php?question=<?php echo $id ?>&file_error=1";
                         </script>
                             <?php
                    }
                }else{
                     ?>
                     <script type="text/javascript">
                         window.location = "listening_multiple_answer.php?question=<?php echo $id ?>&type=1"; 
                       </script>
                     <?php
                }
            }else{
                $query = "UPDATE material_listening SET question='$question', transcript='$transcript', answer='$ans', option1='$option[0]', option2='$option[1]', option3='$option[2]', option4='$option[3]', option5='$option[4]', option6='$option[5]', option7='$option[6]', option8='$option[7]',  modify_date='$modify_date' WHERE listeningMaterialId='$id' ";
                $sql = mysqli_query($conn, $query);
                if ($sql == true) {
                     ?>
                     <script type="text/javascript">    
                         window.location = "../manage_material_table.php?section=listening&type=multiple-answers&update=success";  
                     </script> 
                     <?php    
                }else{
                    ?>
                     <script type="text/javascript">    
                         window.location = "listening_multiple_answer.php?question=<?php echo $id ?>&error=1";
                         </script> 
                     <?php
                }
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
    Snackbar.show({ text: 'You Can Not Upload this type of Audio', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['missing']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'There is missing Answers, Please Try Again', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("missing");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>