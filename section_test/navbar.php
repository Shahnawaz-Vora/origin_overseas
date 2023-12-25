<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../student/auth_login.php");
    }
    include_once '../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
    error_reporting(0);
?>
<div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm" style="height: 60px">

            <ul class="navbar-item theme-brand flex-row text-center">
                <li class="nav-item theme-logo">
                    <a href="#">
                        <img src="../assets/img/90x90.png" style="width: auto;" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="#" class="nav-link"> ORIGIN OVERSEAS 
                     </a>
                </li>
            </ul>

            <ul class="navbar-item flex-row" id="main_timer" style="margin-left: 195px;display: none;">
                <div class="" style="width: 180px; margin-top: 10px;margin-bottom:10px;">
                    <div id="cd-read_a_loud" align="center">
                        <div class="countdown d-inline-block">
                            <div class="clock-count-container text-center" style="height: 40px;width: 40px;" >
                                <h6 class="clock-val" id="hour" style="color: white"></h6>
                            </div>
                           
                        </div>
                        <div class="countdown d-inline-block">
                            <div class="clock-count-container text-center" style="height: 40px;width: 40px;">
                                <h6 class="clock-val" id="min" style="color: white"></h6>
                            </div>
                         
                        </div>
                        <div class="countdown d-inline-block">
                            <div class="clock-count-container text-center" style="height: 40px;width: 40px;">
                                <h6 class="clock-val" id="sec" style="color: white"></h6>
                            </div>
                           
                        </div>
                    </div>
                </div>                    
            </ul>
            <div class="avatar avatar-sm avatar-indicators avatar-online" id="username" style="margin-left: 725px;">
                <span class="text-white font-weight-bold"><?php echo $_COOKIE['studentEmail'] ;?></span>
                <img alt="avatar" src="../database/student_profile_pic/<?php echo $_COOKIE['studentImg'] ;?>" class="rounded-circle ml-2" height="45" />
            </div>
        </header>
    </div>

<script type="text/javascript">
    var non_timer = 0;
    var isPaused = false;
    var question = <?php echo $_GET['question']; ?>;
    main_timer();
    function main_timer(){

        window.downloadTimerMain = setInterval(function(){
            if(section == "listening"){
                if(non_timer == 1){
                    document.getElementById("main_timer").style.display = 'inline-block';
                    $("#username").css("margin-left","350px");
                    if (!isPaused) {
                        if(timeleft <= -1){
                            timeleft=59;
                            if (min <= 0 && hour!= 0) {
                                min = 44;
                                timeleft = 60;
                                hour = hour-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }else if (min <= 0 && hour <= 0) {
                                min = 0;
                                timeleft = 0;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }
                            else{
                                min = min-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;
                                document.getElementById("hour").innerHTML = hour ;        
                            }
                                
                        } else {
                            if (timeleft == 0 && hour < 0) {       
                                document.getElementById("sec").innerHTML = "60" ;
                            }else{
                                document.getElementById("sec").innerHTML = timeleft ;
                            }
                            document.getElementById("min").innerHTML = min ;
                            document.getElementById("hour").innerHTML = hour ;        
                            
                        }
                        timeleft -= 1;
                    }
                }
            }else if(section == "writing" && question == 1){
                non_timer = <?php if($_GET['non_timer']=="0"){echo 1;}else{echo 0;} ?>;
                if(non_timer == 1)
                {
                    document.getElementById("main_timer").style.display = 'inline-block';
                    $("#username").css("margin-left","350px");
                    if (!isPaused) {
                        if(timeleft <= -1){
                            timeleft=59;
                            if (min <= 0 && hour!= 0) {
                                min = 44;
                                timeleft = 60;
                                hour = hour-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }else if (min <= 0 && hour <= 0) {
                                min = 0;
                                timeleft = 0;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }
                            else{
                                min = min-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;
                                document.getElementById("hour").innerHTML = hour ;        
                            }
                                
                        } else {
                            if (timeleft == 0 && hour < 0) {       
                                document.getElementById("sec").innerHTML = "60" ;
                            }else{
                                document.getElementById("sec").innerHTML = timeleft ;
                            }
                            document.getElementById("min").innerHTML = min ;
                            document.getElementById("hour").innerHTML = hour ;        
                            
                        }
                        timeleft -= 1;
                    }
                }
            }
            else if(section == "reading" && question == 1){
                non_timer = <?php if($_GET['non_timer']=="0"){echo 1;}else{echo 0;} ?>;
                if(non_timer == 1)
                {
                    document.getElementById("main_timer").style.display = 'inline-block';
                    $("#username").css("margin-left","350px");
                    if (!isPaused) {
                        if(timeleft <= -1){
                            timeleft=59;
                            if (min <= 0 && hour!= 0) {
                                min = 44;
                                timeleft = 60;
                                hour = hour-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }else if (min <= 0 && hour <= 0) {
                                min = 0;
                                timeleft = 0;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }
                            else{
                                min = min-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;
                                document.getElementById("hour").innerHTML = hour ;        
                            }
                                
                        } else {
                            if (timeleft == 0 && hour < 0) {       
                                document.getElementById("sec").innerHTML = "60" ;
                            }else{
                                document.getElementById("sec").innerHTML = timeleft ;
                            }
                            document.getElementById("min").innerHTML = min ;
                            document.getElementById("hour").innerHTML = hour ;        
                            
                        }
                        timeleft -= 1;
                    }
                }
            }
            else if(section == "speaking" && question == 1){
                non_timer = <?php if($_GET['non_timer']=="0"){echo 1;}else{echo 0;} ?>;
                if(non_timer == 1)
                {
                    document.getElementById("main_timer").style.display = 'inline-block';
                    $("#username").css("margin-left","350px");
                    if (!isPaused) {
                        if(timeleft <= -1){
                            timeleft=59;
                            if (min <= 0 && hour!= 0) {
                                min = 44;
                                timeleft = 60;
                                hour = hour-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }else if (min <= 0 && hour <= 0) {
                                min = 0;
                                timeleft = 0;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }
                            else{
                                min = min-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;
                                document.getElementById("hour").innerHTML = hour ;        
                            }
                                
                        } else {
                            if (timeleft == 0 && hour < 0) {       
                                document.getElementById("sec").innerHTML = "60" ;
                            }else{
                                document.getElementById("sec").innerHTML = timeleft ;
                            }
                            document.getElementById("min").innerHTML = min ;
                            document.getElementById("hour").innerHTML = hour ;        
                            
                        }
                        timeleft -= 1;
                    }
                }
            }
            else{

                if(1 == <?php if($_GET['non_timer']=="0"){echo 1;}else{echo 0;} ?>)
                {
                    document.getElementById("main_timer").style.display = 'inline-block';
                    $("#username").css("margin-left","350px");
                    if (!isPaused) {
                        if(timeleft <= -1){
                            timeleft=59;
                            if (min <= 0 && hour!= 0) {
                                min = 60;
                                timeleft = 60;
                                hour = hour-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }else if (min <= 0 && hour <= 0) {
                                min = 0;
                                timeleft = 0;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;    
                                document.getElementById("hour").innerHTML = hour ;    
                            }
                            else{
                                min = min-1;
                                document.getElementById("sec").innerHTML = timeleft ;
                                document.getElementById("min").innerHTML = min ;
                                document.getElementById("hour").innerHTML = hour ;        
                            }
                                
                        } else {
                            if (timeleft == 0 && hour < 0) {       
                                document.getElementById("sec").innerHTML = "60" ;
                            }else{
                                document.getElementById("sec").innerHTML = timeleft ;
                            }
                            document.getElementById("min").innerHTML = min ;
                            document.getElementById("hour").innerHTML = hour ;        
                            
                        }
                        timeleft -= 1;
                    }
                }
            }
        }, 1000);
    }
</script>
