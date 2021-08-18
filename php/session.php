<?php
/************
 * User Session
 */
 ob_start();
 session_start();
 if(isset($_SESSION['user']) && $_SESSION['user'] == 'yes'){
     $user_id = $_SESSION['user_id'];
     $user_name = $_SESSION['user_name'];
     $user_email = $_SESSION['user_email'];
     $user_dob = $_SESSION['user_dob'];
     $user_image = $_SESSION['user_pic'];
     $user_profession = $_SESSION['user_profession'];
     $user_phone = $_SESSION['user_phone'];

        $split_name = explode(' ', $user_name); 
        $first_name = array_shift($split_name);
        $last_name = array_pop($split_name);
        $middle_name = trim(implode(' ', $split_name));

 }


