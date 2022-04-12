<?php

    //authorization-access control
    if(!isset($_SESSION['user'])){
        //user not logedin
        $_SESSION['no-login-message'] = "<div class='text-danger text-centre'>Please login to acess admin panel.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>