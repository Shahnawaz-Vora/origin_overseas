<div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="../index.php">
                        <img src="../assets/img/90x90.png" style="width: auto;" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="../student/index.php" class="nav-link"> ORIGIN OVERSEAS </a>
                </li>
            </ul>
            <?php
            if (isset($_COOKIE['studentId'])) {
            ?>
                <ul class="navbar-item flex-row ml-md-auto">

                    <li class="nav-item dropdown user-profile-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img src="../database/student_profile_pic/<?php if(isset($_COOKIE['studentImg'])){echo $_COOKIE['studentImg'];}else{echo "noprofile.jpg";} ?>" alt="avatar">
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="">
                                <div class="dropdown-item">
                                    <a class="" href="../student/user_profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                                </div>
                                <div class="dropdown-item">
                                    <a class="" href="../student/<?php if(isset($_COOKIE['studentImg'])){echo "auth_logout.php";}else{echo "auth_login.php";} ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <?php if(isset($_COOKIE['studentImg'])){echo "Logout";}else{echo "Login";} ?></a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul><?php
            }
            ?>
        </header>
    </div>