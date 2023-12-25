<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../student/auth_login.php");
    }
    include_once '../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
    error_reporting(0);
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FQKPT0PS9K"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FQKPT0PS9K');
    // stop right click
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php
if(!isset($_GET['type']) && isset($_GET['test_no']) || isset($_GET['question']))
{
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    ?>
    <script type="text/javascript">
        var test_no = "<?php echo $test_no; ?>";
        var question = <?php echo $question; ?>;
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
        var type = "";
    </script><?php
}
if(isset($_GET['type']))
{
    $test_no = $_GET['test_no'];
    $question = $_GET['question'];
    ?>
    <script type="text/javascript">
        var test_no = "<?php echo $test_no; ?>";
        var question = <?php echo $question; ?>;
        var type = '<?php echo $_GET['type']; ?>' ;
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "var remaining_time = '".$_GET['remaining_time']."';";
            }
        ?>
    </script><?php
}
?>
<script type="text/javascript">
    var non_timer=0;
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reading Section | Origin overseas - PTE tutors </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-countdown.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    <?php 
            include_once('navbar.php');
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        <!--  BEGIN CONTENT AREA  -->
        <div id="" class="main-content"  style="margin-top: 90px">
            <div class="col-xl-12" >
                <div class="container" >
                    <div class="row ">
                        <div class="col-lg-12 col-12"  >
                            <div class="statbox widget box box-shadow" style="width:115%;margin-left:-10px">
                                <div class="widget-content widget-content-area" style="border-radius: 10px">
                                    <div class=" mt-5 text-left text-dark">
                                        <div class=" font-weight-bold text-center" style="color:black;font-size: 3em;margin-top: -40px;">Reading Section       &nbsp;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
                                        <table class="table table-responsive table-bordered text-dark" align="center" style="width: 80%;margin-top:-30px;border-radius: 10px;" >
                                            <tr>
                                                <th style="font-size:1.4em;color:#0169ba;padding-right: 110px;">Section</th>
                                                <th colspan="2" style="font-size:1.4em;color:#0169ba;padding-right: 350px;">Question Type</th>
                                                <th style="font-size:1.4em;color:#0169ba;padding-right: 96px;">Time Allowed</th>
                                            </tr>
                                            <tr>
                                                <td rowspan="5" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;"><b>Section 3</b></td>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Multiple-choice, choose single answer</td>
                                                <td rowspan="5" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">30-35 minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Multiple-choice, choose multiple answer </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Re-order paragraphs</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Fill in the blanks</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:black;padding: 15px;font-size: 1.2em;font-family: sans-serif;">Multiple fill in the blanks </td>
                                            </tr>
                                        </table>
                                        <div align="center" class="mt-4">
                                            <button class="btn btn-rounded btn-info" type="button" onclick="reading_section();">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
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
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
        var section=0;
    </script>
    <script src="../plugins/highlight/highlight.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
<script type="text/javascript">
    function reading_section(){
        <?php 
            if(isset($_GET['remaining_time'])){
                echo "
                if (type == 'single-answer') {
                    location.replace('reading_single_answer.php?question='+question+'&test_no='+test_no+'&resume=1&remaining_time='+remaining_time);    
                }else if (type  ==  'multiple-answer') {
                    location.replace('reading_multiple_answer.php?question='+question+'&test_no='+test_no+'&resume=1&remaining_time='+remaining_time);
                }else if (type  ==  'reorder-paragraph') {
                    location.replace('reading_reorder_paragraph.php?question='+question+'&test_no='+test_no+'&resume=1&remaining_time='+remaining_time);
                }else if (type  ==  'fill-in-the-blanks') {
                    location.replace('reading_fill_in_the_blanks.php?question='+question+'&test_no='+test_no+'&resume=1&remaining_time='+remaining_time);
                }else if (type  ==  'reading-writing-fill-in-the-blanks') {
                    location.replace('reading_writing_fill_the_blanks.php?question='+question+'&test_no='+test_no+'&resume=1&remaining_time='+remaining_time);
                }else if(type == '')
                {
                    location.replace('reading_single_answer.php?question='+question+'&test_no='+test_no+'&continue=1&remaining_time='+remaining_time);    
                }
                ";
            }else{
                echo "
                if (type == 'single-answer') {
                    location.replace('reading_single_answer.php?question='+question+'&test_no='+test_no+'&resume=1');    
                }else if (type  ==  'multiple-answer') {
                    location.replace('reading_multiple_answer.php?question='+question+'&test_no='+test_no+'&resume=1');
                }else if (type  ==  'reorder-paragraph') {
                    location.replace('reading_reorder_paragraph.php?question='+question+'&test_no='+test_no+'&resume=1');
                }else if (type  ==  'fill-in-the-blanks') {
                    location.replace('reading_fill_in_the_blanks.php?question='+question+'&test_no='+test_no+'&resume=1');
                }else if (type  ==  'reading-writing-fill-in-the-blanks') {
                    location.replace('reading_writing_fill_the_blanks.php?question='+question+'&test_no='+test_no+'&resume=1');
                }else if(type == '')
                {
                    location.replace('reading_single_answer.php?question='+question+'&test_no='+test_no+'&continue=1');    
                }
                ";
            }
        ?>
    }
    function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
    $(document).on("keydown", disableF5);
</script>

