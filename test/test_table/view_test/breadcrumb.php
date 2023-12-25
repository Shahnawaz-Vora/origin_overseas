<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../../../student/auth_login.php");
    }
    include_once '../../../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
    error_reporting(0);
?>
<div class="container">
    <div class="row widget-content widget-content-area layout-top-spacing signup-step-container">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-md-12 ">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="<?php if($section == 'speaking') {echo 'active';} else{echo "";} ?>">
                                    <a href="#" id="step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i class="step">Speaking</i></a>
                                </li>
                                <li role="presentation" class="disabled <?php if($section == 'writing') {echo 'active';} else{echo "";} ?>">
                                    <a href="#" id="step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i class="step ">Writing</i></a>
                                </li>
                                <li role="presentation" class="disabled <?php if($section == 'reading') {echo 'active';} else{echo "";} ?>">
                                    <a href="#" id="step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i class="step ">Reading</i></a>
                                </li>
                                <li role="presentation" class="disabled <?php if($section == 'listening') {echo 'active';} else{echo "";} ?>">
                                    <a href="#" id="step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i class="step ">Listening</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#step1").click(function(event) {
        <?php
        $id5 = $_GET['question'];
        $sql5 = mysqli_query($conn , "select id from test where section='speaking' and type='read-aloud' and test_no='$test_no'");
        $row5= mysqli_fetch_assoc($sql5);
        ?>
        location.replace("speaking_read_a_loud.php?question=<?php echo $row5['id']; ?>");   
    });
    $("#step2").click(function(event) {
        <?php
        $id5 = $_GET['question'];
        $sql5 = mysqli_query($conn , "select id from test where section='writing' and type='summarize-written-text' and test_no='$test_no'");
        $row5= mysqli_fetch_assoc($sql5);
        ?>
        location.replace("writing_written_text.php?question=<?php echo $row5['id']; ?>");
    });
    $("#step3").click(function(event) {
        <?php
        $id5 = $_GET['question'];
        $sql5 = mysqli_query($conn , "select id from test where section='reading' and type='single-answer' and test_no='$test_no'");
        $row5= mysqli_fetch_assoc($sql5);
        ?>
        location.replace("reading_single_answer.php?question=<?php echo $row5['id']; ?>");    
    });
    $("#step4").click(function(event) {
        <?php
        $id5 = $_GET['question'];
        $sql5 = mysqli_query($conn , "select id from test where section='listening' and type='summarize-spoken-text' and test_no='$test_no'");
        $row5= mysqli_fetch_assoc($sql5);
        ?>
        location.replace("listening_summarize_spoken_text.php?question=<?php echo $row5['id']; ?>"); 
    });
</script>