<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
    include_once("../../database/dbh.inc.php");
    if(isset($_GET['testno']))
    {
        $test_no = $_GET['testno'];
        $modify_date = date("Y/m/d");
        $sql = mysqli_query($conn , "INSERT INTO manage_test(test_no,modify_date) VALUES('$test_no','$modify_date')");
    }
    $question_no = $_GET['question_no'];
    $section = "reading";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Create Test-Reading: Fill in the Blanks | Origin Overseas - PTE tutors </title>
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
    <style type="text/css">
        .textbox{
           border-radius: 5px;
            border: solid #bfc9d4 1px;
            box-shadow: none;
            width: 45px;
            height: 45px;
            max-height: 45px;
            max-width: 45px;
            margin-right: 3px;
            text-align: center;
        }
        .form-control{
            margin-left: 5px;
        }
        div::-webkit-scrollbar {
            width: 5px;
            background-color: transparent;
            border-radius: 50px;
        }

        div::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: transparent;
        }

        div::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
            background-color: #181818;
        }
    </style>
    <script type="text/javascript" >
       function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
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

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Create Test</a></li>
                                 <li class="breadcrumb-item active" aria-current="page"><span>Reading: Fill in the Blanks </span></li>
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
                                                    <h4><center><b>Fill in the Blanks</b> : Question <?php echo $question_no; ?></center></h4>
                                                    <div class="info">
                                                        <h6 class="pl-2">Question Text:</h6><br>
                                                        <div class="row" style="margin-top: -45px">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                   <!-- <textarea rows="8" cols="10" class="form-control" id="question" name="question_text" required=""></textarea> -->
                                                                   <div class="form-control" style="height: 200px;overflow-y: scroll;text-align: left" contenteditable=true id="question"  required="">
                    
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <button type="button" onclick="addText(event)" style="list-style: none;cursor:pointer;width: 165px;margin: 3px" class="btn btn-outline-dark d-inline-block" ><center>Add Answer Box</center></button>

                                                                        <button type="button" onclick="deleteText(event)" style="list-style: none;cursor:pointer;width: 165px;margin: 3px" class=" d-inline-block btn btn-outline-danger"><center>Delete Answer box</center></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="info" >
                                                        <div class="row" style="margin-top: -10px;">
                                                            <div class="col-md-11 mx-auto" align="center">
                                                                <div class="form-group">
                                                                    <select name="options" id="options" class="form-control custom-control mt-2" onchange=change(); required="">
                                                                            <option value="" selected="" disabled="">--Select Option--</option>
                                                                            <option value=1>1</option>
                                                                            <option value=2>2</option>
                                                                            <option value=3>3</option>
                                                                            <option value=4>4</option>
                                                                            <option value=5>5</option>
                                                                            <option value=6>6</option>
                                                                            <option value=7>7</option>
                                                                            <option value=8>8</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info">
                                                        <h6 class="pl-2" style="display: none;" id="option_text">Option:</h6><br>
                                                        <div class="row" style="margin-top: -10px">
                                                            <div class="col-md-11 mx-auto" >
                                                                 <div class="row" >
                                                                    <div class="col-md-3" style="display: none;" id="option1" >
                                                                         <div class="form-group">
                                                                            <label for="option1" class="" style="margin-left: -10px;">Answer</label>
                                                                            <label for="option1" class="ml-2">Option 1</label>

                                                                            <div class="btn-group w-100">
                                                                            <input type="text" name="text1" id="text1" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                             <input type="text" name="option1" class="form-control"  id="opt1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option2">
                                                                        <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 2</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text2" id="text2" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                            
                                                                             <input type="text" name="option2" class="form-control" id="opt2">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option3">
                                                                         <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 3</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text3" id="text3" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                            
                                                                             <input type="text" name="option3" class="form-control" id="opt3">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="display: none;" id="option4">
                                                                         <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 4</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text4" id="text4" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                            
                                                                             <input type="text" name="option4" class="form-control" id="opt4">
                                                                         </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                     <div class="row" >
                                                                        <div class="col-md-3" style="display: none;" id="option5">
                                                                           <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 5</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text5" id="text5" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                      
                                                                             <input type="text" name="option5" class="form-control" id="opt5">
                                                                         </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3" style="display: none;" id="option6">
                                                                           <div class="form-group">
                                                                            <label for="option1"  style="margin-left: 54px;">Option 6</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text6" id="text6" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                            
                                                                             <input type="text" name="option6" class="form-control" id="opt6">
                                                                         </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3" style="display: none;" id="option7">
                                                                            <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 7</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text7" id="text7" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                           
                                                                             <input type="text" name="option7" class="form-control" id="opt7">
                                                                         </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3" style="display: none;" id="option8">
                                                                           <div class="form-group">
                                                                             <label for="option1"  style="margin-left: 54px;">Option 8</label>
                                                                             <div class="btn-group w-100">
                                                                           <input type="text" name="text8" id="text8" class="textbox" pattern="\d{1,8}" title="Only numbers 1 to 8" maxlength="1">
                                                                           
                                                                             <input type="text" name="option8" class="form-control" id="opt8">
                                                                         </div>
                                                                        </div>
                                                                        <input type="hidden" name="question_text" id="question_text" >
                                                                        </div>
                                                                        <input type="hidden" name="test_no" value="<?php echo $test_no; ?>">
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
                                            <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px">NEXT</button>
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
    <script type="text/javascript">
        function placeCaretAtEnd(el) {
            el.focus();
            if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
                var range = document.createRange();
                range.selectNodeContents(el);
                range.collapse(false);
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (typeof document.body.createTextRange != "undefined") {
                var textRange = document.body.createTextRange();
                textRange.moveToElementText(el);
                textRange.collapse(false);
                textRange.select();
            }
        }
        var span = 0;
        function addText(event) {
            if (span < 8) {
                span+=1;
                var element = document.createElement("div");
                element.classList.add("d-inline-block");
                element.id = span;
                element.setAttribute("contenteditable", false);
                element.appendChild(document.createTextNode('<span class="replace"></span>'));
                document.getElementById('question').appendChild(element);
                document.getElementById('options').value = span;
                change();
                placeCaretAtEnd( document.querySelector('#question') );
            }else{
                Snackbar.show({ text: 'Cant Add More Answer Then This!', duration: 2000, });
                var temp = document.getElementById('question').innerHTML;
                alert(temp);
            }
        }
  
        function deleteText(event) {
            if (span > 0) {
                document.getElementById(span).remove();
                span-=1;
                document.getElementById('options').value = span;
                change();
                placeCaretAtEnd( document.querySelector('#question') );
            }else{
                Snackbar.show({ text: 'There is nothing to Delete.', duration: 2000, });
            }
        }

      var span_counter = -1;
        setInterval(function(){
            let spans = question.getElementsByClassName('d-inline-block');
            var cou=0;
            for (let input of spans) {
                cou+=1;
            }
            span_counter = cou;
            if (span_counter >= 0) {      
                // document.getElementById('options').value = span_counter;
                // change();
            }
            span = span_counter;
        }, 100);
    </script>
</body>
</html>
<script type="text/javascript">
    var options;
    var pass= 1;
    $("#options").change(function(){
        options = $("#options").val();
    });
    
    $('#general-info').submit(function (e) {
        var fill= 0;
        if (span_counter != span) {
            Snackbar.show({ text: 'There is missmatch between answer and blanks! Please check again.', duration: 2000, });
            return false;
            pass = 0;
        }
        
        if ($('#question').text().trim().length == 0) {
            Snackbar.show({ text: 'Question Text Cant be Empty! Please Fill it.', duration: 2000, });
            return false;
            pass = 0;
        }

        options = $("#options").val();
        var allTextBoxes = [];
        for (var i = 1; i <= options; i++) {
            var push= $("input[id=text"+i+"]").val();
            allTextBoxes.push(push);
        }
        var sorted_arr = allTextBoxes.sort();
        for (var i = 0; i < allTextBoxes.length - 1; i++) {
            if(sorted_arr[i + 1] != ""){
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    Snackbar.show({ text: 'Answer Order cant be Same!.', duration: 2000, });
                    return false;
                    pass = 0;
                }
            }
        }

        var allAns = [];
        for (var i = 1; i <= options; i++) {
            var push= $("input[id=opt"+i+"]").val();
            allAns.push(push);
        }
        var sorted_arr = allAns.sort();
        for (var i = 0; i < allAns.length - 1; i++) {
            if(sorted_arr[i + 1] != ""){
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    Snackbar.show({ text: 'There is Same Options, please enter Diffrent Options!', duration: 2000, });
                    return false;
                    pass = 0;
                }    
            }
        }

        for(var i=1;i<=options;i++) {
            var index = 'opt'+i;
            x = document.getElementById(index).value;
            if(x == ""){
                Snackbar.show({ text: 'Please Fill Options, it cant be Empty!', duration: 2000, });
                return false;
                pass = 0;
            }
        }
        
        for(var i=1;i<=options;i++) {
            var index = 'text'+i;
            x = document.getElementById(index).value;

            if(x != "") {
                if(x > span || x < 0){
                    Snackbar.show({ text: 'Answers number must be between 1 to '+span, duration: 2000, });
                    return false;
                    pass = 0;
                }else{
                    fill+=1;
                }
            }
        }
        if(span != fill) {
            Snackbar.show({ text: 'There is Missing answers, Please Fill answers same as options!', duration: 2000, });
            return false;
            pass = 0;
        }else{  
         document.getElementById('question_text').value = document.getElementById('question').innerHTML;  
        }
        

});
document.querySelector("div[contenteditable]").addEventListener("paste", function(e) {
    e.preventDefault();
var text = e.clipboardData.getData("text/plain");
document.execCommand("insertHTML", false, text);
});

</script>
<?php
    if (isset($_POST['submit'])) {
        include_once '../../database/dbh.inc.php';
        $type = "fill-in-the-blanks";
        $test_no = trim($_POST['test_no']);
        $question_text = trim(mysqli_real_escape_string($conn, $_POST['question_text']));
        $options = trim(addslashes(mysqli_real_escape_string($conn, $_POST['options'])));
        $modify_date = date("Y/m/d");
        $question_no = $_GET['question_no'];  
        $find = [];
        $set   = [];
        for ($i=1; $i<= $options ; $i++) { 
            $f = '<div class=\"d-inline-block\" id=\"'.$i.'\" contenteditable=\"false\">&lt;span class=\"replace\"&gt;&lt;/span&gt;</div>';
            array_push($find, $f);
            array_push($set, '<span id=\"replace\"></span>');    
           }
       
        $question_text_replaced =  str_replace($find, $set, $question_text);

        $tot_options = 0;
        $option = [];
        for ($i=1; $i <= 8; $i++) {
            $index = 'option'.$i;
            if ($i <= $options) {
                if ($_POST[$index] != "") {
                    array_push($option,trim(addslashes($_POST[$index])));
                    $tot_options +=1;
                }else{
                    array_push($option,'');
                }
            }else{
                array_push($option,'');
            }
        }
        $answer = trim(addslashes(mysqli_real_escape_string($conn, $_POST['text1'])));
        for ($i=2; $i <= $options; $i++) { 
            $index = 'text'.$i;
            $answer = $answer."/*/".trim($_POST[$index]);
            
        }
        $sql = mysqli_query($conn, "INSERT INTO test(test_no,question_no,type,answer,questionText,option1, option2, option3, option4, option5, option6, option7, option8, modify_date,section) VALUES ('$test_no','$question_no','$type','$answer', '$question_text_replaced', '$option[0]', '$option[1]', '$option[2]', '$option[3]', '$option[4]', '$option[5]', '$option[6]', '$option[7]', '$modify_date','$section') ");
        if ($sql == true) {
            $tot_question = mysqli_query($conn , "SELECT total_question_entered FROM manage_test WHERE test_no='$test_no' ");
            $row = mysqli_fetch_assoc($tot_question);
            $totques = $row['total_question_entered'] + 1;
            $sql = mysqli_query($conn,"update manage_test set modify_date='$modify_date',total_question_entered='$totques' where test_no='$test_no' ");
            $question_no += 1;
            if($question_no <= 5)
            {
                ?><script>location.replace("reading_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no ?>&question=success");</script><?php
            }
            else
            {
                ?><script>location.replace("reading_writing_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=1&question=success");</script><?php    
            }
        }
        else
        {
            ?><script type="text/javascript">location.href = "reading_fill_in_the_blanks.php?testno=<?php echo $test_no; ?>&question_no=<?php echo $question_no;?>&error=1";</script><?php
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
if(isset($_GET['question']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Question Inserted', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("question");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>
