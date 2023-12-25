<?php

if (isset($_POST['submit'])) {

    include_once '../database/dbh.inc.php';
    $resultCheck=0;

    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    
    $sql="SELECT * FROM student WHERE password='$password' AND email='$username' or mobileNo='$username'  ";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['status'] == 0 )
        {
            ?><script type="text/javascript">
            location.href = "auth_login.php?deactivated=1"; 
            </script><?php
        }
        else
        {
            $date = date('Y-m-d');
            if ($date > $row['endDate']) {
                $sql = "UPDATE student set status=0 WHERE email='$username' || mobileNo='$username' ";
                $result = mysqli_query($conn, $sql); 
                ?>
                <script>
                    window.location = "auth_login.php?deactivated=1&date=<?php echo $row['endDate'];?>"; 
                </script>
                <?php
            }else {
                setcookie("studentId",$row['studentId'] ,time()+86400,'/');
                setcookie("studentImg",$row['profileImg'] ,time()+86400,'/');
                setcookie("studentEmail",$row['email'] ,time()+86400,'/');
                header("location: index.php?login=1");
            }    
        }
    }else{
        ?>
        <script>
            window.location = "auth_login.php?wrong=1"; 
        </script>
        <?php
    }
}else{
    if (isset($_COOKIE['studentId'])) {
        header("location: index.php");
    }else{
        header("location: auth_login.php");
    }    
}
?>