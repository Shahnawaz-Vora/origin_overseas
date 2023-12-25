<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php
    if (!isset($_GET['question'])) {
        ?><script>location.href='../manage_materials.php'</script><?php
    }
    $type = "multiple-answers";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Update Materials-Reading: Multiple-choice, choose multiple answer | Origin Overseas - PTE tutors </title>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Reading: Multiple-choice, choose multiple answer</span></li>
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
            $sql="SELECT * FROM material_reading WHERE type='multiple-answers' and readingMaterialId='$question_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="col-xl-12">
                <div class="container">
                    <div class="row layout-spacing">
                        <div class="col-lg-12 col-12 layout-spacing">                
                            <form id="general-info" class="section general-info" method="POST" action="" enctype="multipart/form-data">
                                <div class="account-settings-container layout-top-spacing">

                                    <div class="account-content">
                                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="info">
                                                        <h6 class="pl-2">Question:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                   <textarea rows="3" class="form-control" id="question_text" name="question" required=""><?php echo stripcslashes($row['question']); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info" style="margin-top: -15px">
                                                        <h6 class="pl-2">Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                   <textarea rows="7" class="form-control" id="question" name="question_text" required=""><?php echo stripslashes($row['questionText']); ?></textarea>
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
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" >
                                                                <div class="row" >
                                                                    <div class="col-md-12" style="display: none;" id="option1" >
                                                                        <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="0" id="checkbox1" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option1']) {echo 'checked=""'; break; } } ?> >
                                                                             <input type="text"  name="option1" class="form-control " id="opt1" value="<?php if (isset($row['option1'])) {echo stripcslashes($row['option1']);}?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option2">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 2</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="1" id="checkbox2" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option2']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option2" class="form-control" id="opt2" value="<?php if (isset($row['option2'])) {echo stripcslashes($row['option2']) ;}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option3">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 3</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="2" id="checkbox3" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option3']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option3" class="form-control" id="opt3" value="<?php if (isset($row['option3'])) {echo stripcslashes($row['option3']) ;}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option4">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 4</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="3" id="checkbox4" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option4']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option4" class="form-control" id="opt4" value="<?php if (isset($row['option4'])) {echo stripcslashes($row['option4']) ;}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" >
                                                                    <div class="col-md-12" style="display: none;" id="option5">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 5</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="4" id="checkbox5" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option5']) {echo 'checked=""'; break; } } ?> >
                                                                      
                                                                             <input type="text"  name="option5" class="form-control" id="opt5" value="<?php if (isset($row['option5'])) {echo stripcslashes($row['option5']) ;}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option6">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 6</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="5" id="checkbox6" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option6']) {echo 'checked=""'; break; } } ?> >
                                                                            
                                                                             <input type="text"  name="option6" class="form-control" id="opt6" value="<?php if (isset($row['option6'])) {echo stripcslashes($row['option6']) ;}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option7">
                                                                        <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 7</label>
                                                                             <div class="btn-group w-100">
                                                                            <input type="checkbox" name="checkbox" value="6" id="checkbox7" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option7']) {echo 'checked=""'; break; } } ?> >
                                                                           
                                                                             <input type="text"  name="option7" class="form-control" id="opt7" value="<?php if (isset($row['option7'])) {echo stripcslashes($row['option7']) ;}?>">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;" id="option8">
                                                                        <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 8</label>
                                                                             <div class="btn-group w-100">
                                                                                <input type="checkbox" name="checkbox" value="7" id="checkbox8" class="mr-4 form-control" style="width: 25px;box-shadow: none;" <?php for ($i=0; $i < count($answer); $i++) { if ($answer[$i] == $row['option8']) {echo 'checked=""'; break; } } ?> >
                                                                           
                                                                                <input type="text"  name="option8" class="form-control" id="opt8" value="<?php if (isset($row['option8'])) {echo stripcslashes($row['option8']) ;}?>">
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="ans" value="" id="ans">
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
                                            <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">UPDATE</button>
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
                    Snackbar.show({ text: "There is Same Options, please enter Diffrent Option !", duration: 2000, });
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
        $ans = trim(addslashes(mysqli_real_escape_string($conn, $_POST['ans'])));
        $question = trim(addslashes(mysqli_real_escape_string($conn, $_POST['question'])));
        $question_text = trim(addslashes(mysqli_real_escape_string($conn, $_POST['question_text'])));
        $options = trim(addslashes(mysqli_real_escape_string($conn, $_POST['options'])));
        $modify_date = date("Y/m/d");
        $option = [];
        $tot_options = 0;
        for ($i=1; $i <= 8; $i++) {
            $index = 'option'.$i;
            if ($i <= $options) {
                if ($_POST[$index] != "") {
                    array_push($option,trim(addslashes($_POST[$index])));
                    $tot_options +=1;
                }
                else{
                    array_push($option,'');
                }    
            }else{
                array_push($option,'');
            }
        }

        if ($tot_options != $options) {
            ?>
            <script type="text/javascript">    
            window.location = "reading_multiple_answer.php?question=<?php echo $question_id ?>&missing=1";
            </script>
            <?php
        }
        if($ans == null || $ans == "")
        {
              ?>
            <script type="text/javascript">    
            window.location = "reading_multiple_answer.php?question=<?php echo $question_id ?>&missing=1";
            </script>
            <?php
        }
        else{
            
            $sql = mysqli_query($conn, "UPDATE material_reading SET question='$question', questionText='$question_text', answer='$ans', option1='$option[0]', option2='$option[1]', option3='$option[2]', option4='$option[3]', option5='$option[4]', option6='$option[5]', option7='$option[6]', option8='$option[7]',  modify_date='$modify_date'  WHERE readingMaterialId='$question_id' ");
            if ($sql == true) {

                ?>
                <script type="text/javascript">    
                window.location = "../manage_material_table.php?section=reading&type=multiple-answers&update=success"; 
                </script>
                <?php    
            }else{
                ?>
                <script type="text/javascript">    
                window.alert("There is Some Error, Please Try Again");
                window.location = "reading_multiple_answer.php?question=<?php echo $question_id ?>&error=1";
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