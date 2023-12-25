<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: auth_login.php");
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
include_once '../database/dbh.inc.php';
// manage student file
if(isset($_POST['status']) && isset($_POST['studId']))
{
	$status = trim($_POST['status']);
	$studId = trim($_POST['studId']);
	$sql = mysqli_query($conn , "update student set status = '$status' where studentId = '$studId'");
}
// create student file
	
	if(isset($_POST['email']))
	{
		$email = trim($_POST['email']);
		$sql = mysqli_query($conn , "select * from student where email='$email'");
		echo mysqli_num_rows($sql);
	}
	if(isset($_POST['mobileno']))
	{
		$mobileno = trim($_POST['mobileno']);
		$sql = mysqli_query($conn , "select * from student where mobileNo='$mobileno'");
		echo mysqli_num_rows($sql);
	}

//update student file
	if(isset($_POST['email_update']) && isset($_POST['studId']))
	{
		$email = trim($_POST['email_update']);
		$studId = trim($_POST['studId']);
		$sql = mysqli_query($conn , "select * from student where studentId not like '$studId' and email='$email'");
		echo mysqli_num_rows($sql);
	}
	if(isset($_POST['mobileno_update']) && isset($_POST['studId']))
	{
		$mobileno = trim($_POST['mobileno_update']);
		$studId = trim($_POST['studId']);
		$sql = mysqli_query($conn , "select * from student where studentId not like '$studId' and mobileNo='$mobileno'");
		echo mysqli_num_rows($sql);
	}
?>