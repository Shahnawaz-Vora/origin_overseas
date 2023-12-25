<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<?php
    include_once '../../database/dbh.inc.php';
    if(isset($_GET['studId']))
    {
        $studId = $_GET['studId'];
        $sql = mysqli_query($conn, "select * from student where studentId='$studId'");
        $row = mysqli_fetch_assoc($sql);
    }else{
        //error
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Update Student | Origin Overseas - PTE tutors </title>
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
    <link rel="stylesheet" type="text/css" href="../../assets/css/forms/switches.css">
    <link href="../../plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        input[type='file'] {
          width: 200px;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body>
    <div id="load_screen"> <div class="loader"> <div class="loaer-contdent">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <?php
        include_once 'header.php';
    ?>
    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="student_manage_table.php">Manage Student</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Update Student </span></li>
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
            <div class="layout-px-spacing">                
                <form id="general-info" class="section general-info" method="POST" action="update_student.php" enctype="multipart/form-data">
                    <div class="account-settings-container layout-top-spacing">
                        <div class="account-content">
                            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-xl-9">
                                                    <h6 class="">General Information</h6>
                                                </div>
                                                <div class="col-xl-2" style="padding-right: 0px;" align="right">
                                                <?php 
                                                    if($row['status'] == '1')
                                                    {
                                                        echo '<h6 id="on" style="display: block;">Active</h6><h6 id="off" style="display: none;">Deactive</h6>';
                                                        $status = "checked";
                                                    }
                                                    else
                                                    {
                                                        echo '<h6 id="on" style="display: none;">Active</h6><h6 id="off" style="display: block;">Deactive</h6>';
                                                        $status = "";
                                                    }
                                                ?>
                                                </div>
                                                <div class="col-xl-1"align="right">
                                                    <div class="d-inline-block">
                                                        <label id="tog" class="switch s-icons s-outline s-outline-info mb-4 mr-2">
                                                        <input type="checkbox" <?php echo $status ?> id="active_deactive" name="checkbox" onclick="switching();">
                                                        <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-3 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4 uploadimg">
                                                                <?php 
                                                                    if(file_exists("../../database/student_profile_pic/".$row['profileImg']))
                                                                    {
                                                                        echo "<img height=200 width=200 id='imgshow' src=../../database/student_profile_pic/".$row['profileImg'].">"."<button type='button' class='btn btn-danger btn-block mt-2 mb-4' onclick=remove(); id='removebtn'>Remove</button>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" title= " " name="profileImg" accept="image/* "/ required=""><p class="mt-2 mb-4"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Image</b></p>';
                                                                    }
                                                                ?>    
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label for="fullName">First Name</label>
                                                                            <input type="text" name="firstName" class="form-control mb-4" required="" id="fullName" placeholder="First Name" value="<?php echo $row['firstName'] ?>" pattern="[A-Za-z]{0,20}" required="" title="Only alphabets , 20 characters limit">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Last Name</label>
                                                                            <input type="text" name="lastName" class="form-control mb-4" required="" id="lastName" placeholder="Last Name" value="<?php echo $row['lastName'] ?>" pattern="[A-Za-z]{0,20}" title="Only alphabets , 20 characters limit">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="dob-input">Date of Birth</label>
                                                                        <div class="d-sm-flex d-block">
                                                                            <div class="form-group mr-1">
                                                                                <input class="form-control" type="date" id="datefield" name="date" required="" value="<?php echo $row['dob']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        function currdate(){
                                                                            var today = new Date();
                                                                            var dd = today.getDate();
                                                                            var mm = today.getMonth()+1; //January is 0!
                                                                            var yyyy = today.getFullYear()-18;
                                                                             if(dd<10){
                                                                                    dd='0'+dd
                                                                                } 
                                                                                if(mm<10){
                                                                                    mm='0'+mm
                                                                                } 

                                                                            today = yyyy+'-'+mm+'-'+dd;
                                                                            document.getElementById("datefield").setAttribute("max", today);
                                                                        }
                                                                        currdate();
                                                                </script>
                                                                    <div class="row ml-1">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label for="fullName">Password</label>
                                                                                <input type="text" disabled="" name="password" class="form-control mb-4" required="" id="password" placeholder="Password" pattern=".{6,20}" required="" title="Password must be 6 to 20 characters" autocomplete="new-password" value="<?php echo $row['password']; ?>">
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

                                    <?php $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                    ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="info">
                                            
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select class="form-control" name="country" id="country" required="" >
                                                                    <?php 
                                                                    for ($i=0; $i < count($countries) ; $i++) { 
                                                                        echo "<option value=".$countries[$i].">".$countries[$i]."</option>";
                                                                        if($countries[$i] == $row['country'] )
                                                                        {
                                                                            echo "<option selected value=".$countries[$i].">".$countries[$i]."</option>";
                                                                            ?><script type="text/javascript">
                                                                                function rem(){
                                                                                    var x = document.getElementById("country");
                                                                                    x.remove(<?php echo $i; ?>)
                                                                                }
                                                                                rem();
                                                                            </script><?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">State</label>
                                                                <input type="text" name="state" class="form-control mb-4" id="state" placeholder="State" value="<?php echo $row['state']; ?>" pattern="[A-Za-z]{0,30}" title="Only alphabets , 30 characters limit" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">City</label>
                                                                <input type="text" name="city" class="form-control mb-4" id="city" placeholder="City" value="<?php echo $row['city']; ?>" pattern="[A-Za-z]{0,30}" title="Only alphabets , 30 characters limit" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" class="form-control mb-4" id="address" pattern=".{0,200}" title="Only alphabets , 200 characters limit" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" name="mobileNo" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="<?php echo $row['mobileNo']; ?>" pattern="[0-9]{0,10}" title="Only alphabets , 10 characters limit" required="">
                                                                <span id="phone_error" style="display: none;">Mobile No. already registered</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" class="form-control mb-4" id="email" placeholder="Write your email here" value="<?php echo $row['email']; ?>" autocomplete=username required="">
                                                                <span id="email_error" style="display: none;">Email already registered</span>
                                                            </div>
                                                        </div>    
                                                        <input type="hidden" value="<?php echo $studId; ?>" name="studId" >
                                                         <input type=hidden value="" name=original id="original">
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
                                        <button class="btn btn-primary btn-rounded" name="submit" type="submit" style="width: 110px;margin-top: -30px;font-family: sans-serif;letter-spacing: 1.7px;margin-bottom: 15px" id="submit">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </form>
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
        function remove(){
            $("#imgshow").remove();
            $("#removebtn").remove();
            $(".uploadimg").append('<input type="file" id="profileImg" class="dropify" data-default-file="" data-max-file-size="5M" name="profileImg" title= " "  accept="image/* "/ required=""><p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i><b style="color: red"> Upload Image</b></p>');
                <?php $originalfile = $row['profileImg']; ?>
            document.getElementById("original").value = '<?php echo $originalfile; ?>'
            }
        var email_error = true;
        var phone_error =true;
        $("#email").on("keyup", function () {
            email();
        });
        function email(){
            var email = $("#email").val();
            var studId = <?php echo $studId; ?>;
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {email_update: email,studId: studId},
                success: function (response) {
                    if(response >= '1')
                    {
                        $("#email_error").css("display","block");
                        $("#email_error").css("color","red");
                        $("#submit").attr("disabled",true);
                        email_error = false;
                        return false;
                    }
                    else
                    {
                        $("#email_error").css("display","none");
                        $("#submit").attr("disabled",false);
                    }
                   
                }
            });
        }
        $("#phone").on("keyup", function () {
            phone();
        });
        function phone(){
            var phone = $("#phone").val();
            var studId = <?php echo $studId; ?>;
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {mobileno_update: phone,studId: studId},
                success: function (response) {
                    if(response == 1)
                    {
                        $("#phone_error").css("display","block");
                        $("#phone_error").css("color","red");
                        $("#submit").attr("disabled",true);
                        phone_error = false;
                        return false;
                    }
                    else
                    {
                        $("#phone_error").css("display","none");
                        $("#submit").attr("disabled",false);
                    }

                }
            });
        }
        
      
    </script>

    <script src="../../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../../plugins/dropify/dropify.min.js"></script>
    <script src="../../plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="../plugins/tagInput/tags-input.js"></script> -->
    <script src="../../assets/js/users/account-settings.js"></script>
    <script src="../../plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="../../assets/js/components/notification/custom-snackbar.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>
<script type="text/javascript">
    $("#general-info").submit(function(e) {
        var email_error = true;
        var phone_error =true;
        password();
        email();
        phone();
        if((email_error == true)&&(phone_error == true)){
            return true;
        }
        else
        {
            return false;
        }
    });
    function switching()
    {
        var checkbox = document.getElementById("active_deactive");
        var on = document.getElementById("on");
        var off = document.getElementById("off");
        if (checkbox.checked == true){
            on.style.display = 'block';
            off.style.display = 'none';
            checkbox.value = "1";
        }
        else
        {
            on.style.display = 'none';
            off.style.display = 'block';
            checkbox.value = "0";
        }
    }
</script>
<?php
    if (isset($_POST['submit'])) {
        $studId = trim($_POST['studId']);
        $firstName = trim(mysqli_real_escape_string($conn, $_POST['firstName']));
        $lastName = trim(mysqli_real_escape_string($conn, $_POST['lastName']));
        $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
        $state = trim(mysqli_real_escape_string($conn, $_POST['state']));
        $city = trim(mysqli_real_escape_string($conn, $_POST['city']));
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $mobileNo = trim(mysqli_real_escape_string($conn, $_POST['mobileNo']));
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $status = trim(mysqli_real_escape_string($conn,$_POST['checkbox']));
        if($status == 0)
        {
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        $password = trim(mysqli_real_escape_string($conn,$_POST['password']));
        $dob = $_POST['date'];
        if(isset($_FILES['profileImg'])){
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
                            $fileDestination='../../database/student_profile_pic/'.$fileNameNew; 
                            $sql = mysqli_query($conn, "update student set profileImg='$fileNameNew',firstName='$firstName',lastName='$lastName',dob='$dob',country='$country',state='$state',city='$city',address='$address',mobileNo='$mobileNo',email='$email',status='$status' where studentId='$studId'");
                            if($sql == true){    
                                move_uploaded_file($fileTmpName,$fileDestination);
                                if(isset($_POST['original']))
                                {
                                    $originalfile = $_POST['original'];
                                    unlink("../../database/student_profile_pic/".$originalfile);
                                } 
                                ?><script type="text/javascript">
                                    window.location = "student_manage_table.php?success=1"; 
                                </script>
                                <?php
                            }else{
                                ?><script type="text/javascript">
                                    window.location = "update_student.php?studId=<?php echo $studId; ?>&error=1"; 
                                </script>
                                <?php
                            }
                        }else{
                            ?><script>
                                window.location = "update_student.php?studId=<?php echo $studId; ?>&high=1";
                                </script>
                            <?php
                        }
                    }else{
                            ?><script>
                                window.location = "update_student.php?studId=<?php echo $studId; ?>&file_error=1";
                            </script>
                            <?php
                    }
                }else{
                    ?><script>
                        window.location = "update_student.php?studId=<?php echo $studId; ?>&type=1"; 
                    </script>
                    <?php
                }
            }else{
                ?><script>
                    window.location = "update_student.php?studId=<?php echo $studId; ?>&valid=1";
                </script>
                <?php
            }
        }else{
            $sql = mysqli_query($conn ,"update student set firstName='$firstName',lastName='$lastName',dob='$dob',country='$country',state='$state',city='$city',address='$address',mobileNo='$mobileNo',email='$email',status='$status' where studentId='$studId'");
                if($sql == true){    
                    ?><script type="text/javascript">
                        window.location = "student_manage_table.php?success=1"; 
                    </script>
                    <?php
                }else{
                    ?><script type="text/javascript">
                        window.location = "update_student.php?studId=<?php echo $studId; ?>&error=1"; 
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
    Snackbar.show({ text: 'You Can Not Upload this type of Image', duration: 2000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("type");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
if(isset($_GET['valid']))
{   
    ?><script type="text/javascript">
    Snackbar.show({ text: 'Please Upload Image(ex : 200x200)', duration: 4000, });
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.delete("valid");
    history.pushState(null, null, "?"+queryParams.toString());
    </script><?php
}
?>