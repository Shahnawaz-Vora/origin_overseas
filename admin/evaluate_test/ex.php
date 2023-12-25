<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php 
    include_once("../../database/dbh.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Add Material | Origin Overseas - PTE Tutors </title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/loader.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL STYLES -->
</head>
<body>
    
    <form action="" method="post">
        <div id="load_screen" class="row h-25 my-auto"> <div class="loader col-sm-12 my-auto"> <div class="loaer-contdent">
        <span style="color: black;font-size: 3em;font-family: Nunito;font-weight: bold"> Processing Data...</span><br>
        <center><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg></center>
    </div></div></div>
        <button type="submit" hidden="" name="submit" id="myCheck" class="btn btn-danger">Submit</button>
    </form>

    <script src="../../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script>
        window.onload=function(){
            document.getElementById("myCheck").click()
        }
    </script>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
    if(isset($_GET['test_no']) && isset($_GET['studentId']))
    {
        set_time_limit(500);
        $test_no = $_GET['test_no'];
        $student_id = $_GET['studentId'];
        
        $speaking_marks=0;
        $speaking_sql = mysqli_query($conn , "SELECT * from user_test WHERE studentId='$student_id' AND test_no='$test_no' AND section='speaking' ");
        while($speaking_row = mysqli_fetch_assoc($speaking_sql)) {
            $speaking_marks+=$speaking_row['marks'];
        }
        $speaking_marks = ($speaking_marks*90)/450;
        

        $writing_marks=0;
        $writing_sql = mysqli_query($conn , "SELECT * from user_test WHERE studentId='$student_id' AND test_no='$test_no' AND section='writing' ");
        while($writing_row = mysqli_fetch_assoc($writing_sql)) {
            $writing_marks+=$writing_row['marks'];
        }
        $writing_marks = ($writing_marks*90)/180;
        

        $reading_marks=0;
        $reading_sql = mysqli_query($conn , "SELECT * from user_test WHERE studentId='$student_id' AND test_no='$test_no' AND section='reading' ");
        while($reading_row = mysqli_fetch_assoc($reading_sql)) {
            $reading_marks+=$reading_row['marks'];
        }
        $reading_marks = ($reading_marks*90)/450;
        

        $listening_marks=0;
        $listening_sql = mysqli_query($conn , "SELECT * from user_test WHERE studentId='$student_id' AND test_no='$test_no' AND section='listening' ");
        while($listening_row = mysqli_fetch_assoc($listening_sql)) {
            $listening_marks+=$listening_row['marks'];
        }
        $listening_marks=($listening_marks*90)/720;
        
        
        $average_marks = ($speaking_marks + $writing_marks + $reading_marks + $listening_marks)/4;
        
        $sql = mysqli_query($conn, "SELECT * FROM test_evaluation WHERE studentId=$student_id AND test_no='$test_no' ");
        if (mysqli_num_rows($sql) >= 1){
            $row = mysqli_fetch_assoc($sql); 
            $id = $row['id'];
            $sql = mysqli_query($conn, "UPDATE test_evaluation SET speaking='$speaking_marks' , writing='$writing_marks', reading='$reading_marks', listening='$listening_marks', average_marks='$average_marks', modify_date= '$modify_date' WHERE id=$id");
        }else{
            $sql = mysqli_query($conn, "INSERT INTO test_evaluation (test_no, studentId,speaking, writing, reading, listening, average_marks ) VALUES ('$test_no',$student_id,'$speaking_marks','$writing_marks','$reading_marks','$listening_marks','$average_marks' )");
        }
        
        
        

        // $sql_performance = mysqli_query($conn,"SELECT * from student_performance where studentId='$student_id'");
        // $modify_date = date("Y-m-d");

        // if(mysqli_num_rows($sql_performance) > 0)
        // {
        //     $row = mysqli_fetch_assoc($sql_performance);
        //     $speaking_average=($row['average_speaking']+$speaking_marks)/2;
        //     $writing_average=($row['average_writing']+$writing_marks)/2;
        //     $reading_average=($row['average_reading']+$reading_marks)/2;
        //     $listening_average=($row['average_listening']+$listening_marks)/2;
        //     $total_average = ($row['average_marks']+($speaking_average + $writing_average + $reading_average + $listening_average)/4)/2;
        //    $sql = mysqli_query($conn, "update student_performance set average_speaking='$speaking_average' , average_writing='$writing_average',average_reading='$reading_average', average_listening='$listening_average',average_marks='$total_average',modify_date='$modify_date' where studentId='$student_id'");
        // }
        // else
        // {
        //     $total_average = ($speaking_marks + $writing_marks + $reading_marks + $listening_marks)/4;
        //     $sql = mysqli_query($conn, "INSERT INTO student_performance (studentId,average_speaking,average_writing,average_reading,average_listening,average_marks,modify_date) VALUES ($student_id,'$speaking_marks','$writing_marks','$reading_marks','$listening_marks','$total_average',$modify_date )");    
        // }
        

        echo "<script>window.close();</script>";

    }
}
?>
