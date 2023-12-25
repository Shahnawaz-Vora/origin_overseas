<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: auth_login.php");
    }
    include_once '../database/dbh.inc.php';
?>
<?php
    include_once '../database/dbh.inc.php';
    if(isset($_POST['test_no']))
    {
        $test_no = trim($_POST['test_no']);
        $sql1 = mysqli_fetch_assoc(mysqli_query($conn,"select * from manage_section_test where test_no='$test_no'"));
        $arry=(object)[];
        $arry->name=$sql1['test_name'];
        $arry->price=$sql1['test_price'];
        $json_data = json_encode($arry);
        echo $json_data;
    }

    //to switch section button test
    if(isset($_POST['status']) && isset($_POST['testno']))
    {
        $status = trim($_POST['status']);
        $test_no = trim($_POST['testno']);
        $check_sql = mysqli_query($conn,"select total_question_entered from manage_section_test where test_no='$test_no'");
        $fetch = mysqli_fetch_assoc($check_sql);
        $type_sql = mysqli_query($conn,"select section from section_test where test_no='$test_no'");
        $fetch_type = mysqli_fetch_assoc($type_sql);
        $tot_ques = $fetch['total_question_entered'];
        $section = $fetch_type['section'];
        if($section == "speaking" && $tot_ques == 38)
        {
            $sql = mysqli_query($conn,"update manage_section_test set status='$status' where test_no='$test_no' ");
        }
        else if($section == "writing" && $tot_ques == 4)
        {
            $sql = mysqli_query($conn,"update manage_section_test set status='$status' where test_no='$test_no' ");
        }
        else if($section == "reading" && $tot_ques == 18)
        {
            $sql = mysqli_query($conn,"update manage_section_test set status='$status' where test_no='$test_no' ");
        }
        else if($section == "listening" && $tot_ques == 21)
        {
            $sql = mysqli_query($conn,"update manage_section_test set status='$status' where test_no='$test_no' ");
        }
        else
        {
            echo 0;
        }
    }
    //to switch section button test
    if(isset($_POST['status']) && isset($_POST['test']))
    {
        $status = trim($_POST['status']);
        $test_no = trim($_POST['test']);
        $check_sql = mysqli_query($conn,"select total_question_entered from manage_test where test_no='$test_no'");
        $fetch = mysqli_fetch_assoc($check_sql);
        $tot_ques = $fetch['total_question_entered'];
        if($tot_ques == 81)
        {
            $sql = mysqli_query($conn,"update manage_test set status='$status' where test_no='$test_no' ");
        }
        else
        {
            echo 0;
        }
    }

    if(isset($_POST['test']) && isset($_POST['studentId']) && isset($_POST['section']))
    {           
        $section = $_POST['section']; 
        $test_no = $_POST['test'];
        $studentId = $_POST['studentId'];
        $sql = mysqli_query($conn,"select * from section_user_test where section='$section' and marks>=0 and test_no ='$test_no' and studentId = '$studentId'");
        echo mysqli_num_rows($sql);
    }

    // if(isset($_POST['test']) && isset($_POST['studentId']))
    // {            
    //     $test_no = $_POST['test'];
    //     $studentId = $_POST['studentId'];
    //     $sql = mysqli_query($conn,"select * from user_test where section='speaking' and marks>=0 and test_no ='$test_no' and studentId = '$studentId'");
    //     echo mysqli_num_rows($sql);
    // }
?>