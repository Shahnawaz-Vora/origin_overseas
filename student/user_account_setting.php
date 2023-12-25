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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Student Profile | Origin Overseas | PTE tutors </title>
    <meta name="description" content="Origin Overseas Student Student Profile Page">
    <meta name="keywords" content="Student Profile, PTE full tests, Free PTE Materials, PTE Materials, Free Materials, Thousands of free question, Practice Question, PTE Practice, Sample Question, Model Question, Model Answer, PTE, Origin Overseas, Overseas Practicies">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../plugins/dropify/dropify.min.css">
    <link href="../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <style type="text/css">
    </style>
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php
        include_once 'navbar.php';
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
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Profile Settings</span></li>
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
            $studentId = $_COOKIE['studentId'];
            $sql="SELECT * FROM student WHERE studentId='$studentId' ";
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
                                                        <h6 class="">General Information</h6>
                                                        <div class="row">
                                                            <div class="col-lg-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                                        <div class="upload mt-4 pr-md-4">
                                                                            <input type="file" id="profileImg" class="dropify" data-default-file="<?php 
                                                                            if($row['profileImg'] != 'NULL'){
                                                                                echo '../database/student_profile_pic/'.$row['profileImg'];
                                                                            }else{
                                                                                echo '../assets/img/200x200.jpg';
                                                                            }
                                                                            ?>" data-max-file-size="1M" name="profileImg" accept="image/* "/>
                                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                                        <div class="form">
                                                                            <div class="row">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group">
                                                                                        <label for="fullName">First Name</label>
                                                                                        <input type="text" name="firstName" class="form-control mb-4" required="" id="fullName" placeholder="First Name" value="<?php echo $row['firstName'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group">
                                                                                        <label for="fullName">Last Name</label>
                                                                                        <input type="text" name="lastName" class="form-control mb-4" required="" id="lastName" placeholder="Last Name" value="<?php echo $row['lastName'] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <label class="dob-input">Date of Birth</label>
                                                                                    <div class="d-sm-flex d-block">
                                                                                        <div class="form-group mr-1">
                                                                                            <select class="form-control" name="dateOfBirth" id="exampleFormControlSelect1" required="">
                                                                                                <option selected disabled="">Day</option>
                                                                                                <?php
                                                                                                    preg_match_all("/\d+/", $row['dob'], $dob);
                                                                                                    $date = $dob[0][2];
                                                                                                    $month = $dob[0][1];
                                                                                                    $year = $dob[0][0];
                                                                                                ?>
                                                                                                <option value="1" <?php if ($date == 1) { echo "selected";} ?> id="first-date">1</option>
                                                                                                <option value="2" <?php if ($date == 2) { echo "selected";} ?>>2</option>
                                                                                                <option value="3" <?php if ($date == 3) { echo "selected";} ?>>3</option>
                                                                                                <option value="4" <?php if ($date == 4) { echo "selected";} ?>>4</option>
                                                                                                <option value="5" <?php if ($date == 5) { echo "selected";} ?>>5</option>
                                                                                                <option value="6" <?php if ($date == 6) { echo "selected";} ?>>6</option>
                                                                                                <option value="7" <?php if ($date == 7) { echo "selected";} ?>>7</option>
                                                                                                <option value="8" <?php if ($date == 8) { echo "selected";} ?>>8</option>
                                                                                                <option value="9" <?php if ($date == 9) { echo "selected";} ?>>9</option>
                                                                                                <option value="10" <?php if ($date == 10) { echo "selected";} ?>>10</option>
                                                                                                <option value="11" <?php if ($date == 11) { echo "selected";} ?>>11</option>
                                                                                                <option value="12" <?php if ($date == 12) { echo "selected";} ?>>12</option>
                                                                                                <option value="13" <?php if ($date == 13) { echo "selected";} ?>>13</option>
                                                                                                <option value="14" <?php if ($date == 14) { echo "selected";} ?>>14</option>
                                                                                                <option value="15" <?php if ($date == 15) { echo "selected";} ?>>15</option>
                                                                                                <option value="16" <?php if ($date == 16) { echo "selected";} ?>>16</option>
                                                                                                <option value="17" <?php if ($date == 17) { 
                                                                                                    echo "selected";} ?>>17</option>
                                                                                                <option value="18" <?php if ($date == 18) { echo "selected";} ?>>18</option>
                                                                                                <option value="19" <?php if ($date == 19) { echo "selected";} ?>>19</option>
                                                                                                <option value="20" <?php if ($date == 20) { echo "selected";} ?>>20</option>
                                                                                                <option value="21" <?php if ($date == 21) { echo "selected";} ?>>21</option>
                                                                                                <option value="22" <?php if ($date == 22) { echo "selected";} ?>>22</option>
                                                                                                <option value="23" <?php if ($date == 23) { echo "selected";} ?>>23</option>
                                                                                                <option value="24" <?php if ($date == 24) { echo "selected";} ?>>24</option>
                                                                                                <option value="25" <?php if ($date == 25) { echo "selected";} ?>>25</option>
                                                                                                <option value="26" <?php if ($date == 26) { echo "selected";} ?>>26</option>
                                                                                                <option value="27" <?php if ($date == 27) { echo "selected";} ?>>27</option>
                                                                                                <option value="28" <?php if ($date == 28) { echo "selected";} ?>>28</option>
                                                                                                <option value="29" <?php if ($date == 29) { echo "selected";} ?>>29</option>
                                                                                                <option value="30" <?php if ($date == 30) { echo "selected";} ?>>30</option>
                                                                                                <option value="31" <?php if ($date == 31) { echo "selected";} ?>>31</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group mr-1">
                                                                                            <select class="form-control" name="monthOfBirth" id="month" required="">
                                                                                                <option selected disabled="">Month</option>
                                                                                                <option value="01" id="first-month" <?php if ($month == "01") { echo "selected";} ?>>Jan</option>
                                                                                                <option value="02" <?php if ($month == "02") { echo "selected";} ?>>Feb</option>
                                                                                                <option value="03" <?php if ($month == "03") { echo "selected";} ?>>Mar</option>
                                                                                                <option value="04" <?php if ($month == "04") { echo "selected";} ?>>Apr</option>
                                                                                                <option value="05" <?php if ($month == "05") { echo "selected";} ?>>May</option>
                                                                                                <option value="06" <?php if ($month == "06") { echo "selected";} ?>>Jun</option>
                                                                                                <option value="07" <?php if ($month == "07") { echo "selected";} ?>>Jul</option>
                                                                                                <option value="08" <?php if ($month == "08") { echo "selected";} ?>>Aug</option>
                                                                                                <option value="09" <?php if ($month == "09") { echo "selected";} ?>>Sep</option>
                                                                                                <option value="10" <?php if ($month == "10") { echo "selected";} ?>>Oct</option>
                                                                                                <option value="11" <?php if ($month == "11") { echo "selected";} ?>>Nov</option>
                                                                                                <option value="12" <?php if ($month == "12") { echo "selected";} ?>>Dec</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group mr-1">
                                                                                            <select class="form-control" name="yearOfBirth" id="year" required="">
                                                                                              <option selected disabled="" >Year</option>
                                                                                              <?php
                                                                                                    $crrYear=date("Y")-18;
                                                                                                    for ($i=$crrYear; $i > $crrYear-40; $i--) {
                                                                                                                echo '<option value="'.$i.'" ';
                                                                                                                if ($year == $i) { 
                                                                                                                    echo 'selected';
                                                                                                                }
                                                                                                                echo '>'.$i.'</option>';
                                                                                                    }

                                                                                              ?>
                                                                                            </select>
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
                                                    
                                                </div>

                                                
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="info">
                                                        <h6 class=""><b>Contact</b></h6>
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="country">Country</label>
                                                                            <select class="form-control" name="country" id="country" required="">
                                                                                <option selected disabled="">Country</option>
                                                                                <option value="United States" <?php if ($row['country'] == "United States") { echo "selected";} ?>>United States</option>
                                                                                <option value="India" <?php if ($row['country'] == "India") { echo "selected";} ?>>India</option>
                                                                                <option value="Canada" <?php if ($row['country'] == "Canada") { echo "selected";} ?>>Canada</option>
                                                                                <option value="Australia" <?php if ($row['country'] == "Australia") { echo "selected";} ?>>Australia</option>
                                                                                <option value="New Zealand" <?php if ($row['country'] == "New Zealand") { echo "selected";} ?>>New Zealand</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="location">State</label>
                                                                            <input type="text" name="state" class="form-control mb-4" id="location" placeholder="State" value="<?php echo $row['state'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="location">City</label>
                                                                            <input type="text" name="city" class="form-control mb-4" id="location" placeholder="City" value="<?php echo $row['city'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" name="address" class="form-control mb-4" id="address" placeholder="Address" value="<?php echo $row['address'] ?>" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input type="text" name="mobileNo" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="<?php echo $row['mobileNo'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="text" name="email" class="form-control mb-4" id="email" placeholder="Write your email here" value="<?php echo $row['email'] ?>">
                                                                        </div>
                                                                    </div>                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing text-center" style="margin-top: -70px;">
                                        <input type="submit" name="updateProfile" id="multiple-messages" class="btn btn-primary" value="Save Changes">
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
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script type="text/javascript">
        $(window).on('keydown',function(event){
            if(event.keyCode==123)
            {
                return false;
            }
            else if(event.ctrlKey && event.shiftKey && event.keyCode==73)
            {
                return false;  //Prevent from ctrl+shift+i
            }
            else if(event.ctrlKey && event.keyCode==73)
            {
                return false;  //Prevent from ctrl+shift+i
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../plugins/dropify/dropify.min.js"></script>
    <script src="../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../plugins/tagInput/tags-input.js"></script> -->
    <script src="../assets/js/users/account-settings.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>

<?php
    if (isset($_POST['updateProfile'])) {
        $studentId = $_COOKIE['studentId'];
        $firstName = trim(mysqli_real_escape_string($conn, $_POST['firstName']));
        $lastName = trim(mysqli_real_escape_string($conn, $_POST['lastName']));
        $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
        $state = trim(mysqli_real_escape_string($conn, $_POST['state']));
        $city = trim(mysqli_real_escape_string($conn, $_POST['city']));
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $mobileNo = trim(mysqli_real_escape_string($conn, $_POST['mobileNo']));
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $date = trim(mysqli_real_escape_string($conn, $_POST['dateOfBirth']));
        $month = trim(mysqli_real_escape_string($conn, $_POST['monthOfBirth']));
        $year = trim(mysqli_real_escape_string($conn, $_POST['yearOfBirth']));
        $dob = $year.'-'.$month.'-'.$date;
        $file = $_FILES['profileImg'];
                
        $fileName = $_FILES['profileImg']['name'];
        $fileType = $_FILES['profileImg']['type'];
        $fileTmpName = $_FILES['profileImg']['tmp_name'];
        $fileSize = $_FILES['profileImg']['size'];
        $fileError = $_FILES['profileImg']['error'];  

        $allowed  = array('jpg','jpeg','png');
        $fileExt =explode('.',$fileName);
        $fileActualExt= strtolower(end($fileExt));
        list($width, $height)=  getimagesize($fileTmpName);
        if ($width == $height){
            if (in_array($fileActualExt,$allowed)){
                if ($fileError === 0 ){
                    if ($fileSize <  8388608){
                        $fileNameNew =uniqid('' ,true ).".".$fileActualExt;
                        $fileDestination='../database/student_profile_pic/'.$fileNameNew; 
                        $sql = mysqli_query($conn, "UPDATE student SET profileImg='$fileNameNew' WHERE studentId='$studentId' ");
                        move_uploaded_file($fileTmpName,$fileDestination);
                        ?>
                        <script type="text/javascript">
                            window.location = "user_account_setting.php";
                        </script> 
                        <?php
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert("Image size is too High.");
                            window.location = "user_account_setting.php";
                        </script> 
                        <?php
                    }
                }else{
                        ?>
                        <script type="text/javascript">
                            alert("There is Error in Your Image.");
                            window.location = "user_account_setting.php";
                        </script> 
                        <?php
                }
            }else{
                ?>
                <script type="text/javascript">
                    alert("You can not upload this type of file in Profile");
                    window.location = "user_account_setting.php"; 
                </script> 
                <?php
            }
        }else{
            ?>
            <script type="text/javascript">
                alert("Upload Valid Sqaure Image(200x200) ");
                window.location = "user_account_setting.php";
            </script>     
            <?php
        }
        $sql = mysqli_query($conn, "UPDATE student SET firstName='$firstName', lastName='$lastName', mobileNo=$mobileNo, email='$email', dob='$dob', country='$country', state='$state', city='$city', address='$address' WHERE studentId='$studentId' ");
        ?>
        <script type="text/javascript">
            window.location = "user_account_setting.php";
        </script> 
        <?php
    }
?>