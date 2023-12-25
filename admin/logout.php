<?php
    if (isset($_COOKIE['adminId'])) {
        unset($_COOKIE['adminId']);
        setcookie('adminId', '', time()-3600,'/');
        setcookie('studentEmail', '', time()-3600,'/');
        header("location: auth_login.php");
    }else{
        header("location: auth_login.php");
    }
?>