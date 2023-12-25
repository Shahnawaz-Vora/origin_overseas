<?php
    if (isset($_COOKIE['studentId'])) {
        unset($_COOKIE['studentId']);
        setcookie('studentId', '', time()-3600,'/');
        setcookie('studentImg', '', time()-3600,'/');
        setcookie('studentEmail', '', time()-3600,'/');
        header("location: auth_login.php");
    }else{
        header("location: auth_login.php");
    }
?>