<?php

/**
 * Logout Page
 */

 require_once "php/config.php";
 require_once "php/session.php";
 if(isset($_SESSION['user']) && $_SESSION['user'] == 'yes'){
     unset($_SESSION['user']);
     unset($_SESSION['user_name']);
     unset($_SESSION['user_email']);
     unset($_SESSION['user_dob']);
     unset($_SESSION['user_profession']);
     unset($_SESSION['user_dob']);
     unset($_SESSION['user_pic']);
 }
header("Location:". BASE_URL);
 