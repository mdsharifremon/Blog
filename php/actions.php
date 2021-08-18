<?php

/**
 * Actions Template
 */
require_once "autoloader.php";
require_once "functions.php";
require_once "session.php";

$db = new Database();

/** 
    if(isset($_POST['action']) && $_POST['action'] === ''){

    }
*/

/**
 * @param User-Signup
 * 
 * *************************/
    if (isset($_POST['action']) && $_POST['action'] === 'signup') {
        $err = [];

        /** Name Validation */
        if(isset($_POST['name']) && $_POST['name'] !== ''){
            $name = validate($_POST['name']);
        }else{
            $err[] = "Name Is required";
        }
        
        /** Email Validation */
        if (isset($_POST['email']) && $_POST['email'] !== '') {
            if(email($_POST['email'])){
                $email = email($_POST['email']);
                if($row = $db->fetch_by_sql("SELECT user_email FROM user WHERE user_email = '{$email}'")){
                    $err[] = 'This email is already exists. Use another';
                }
            }else{
                $err[] = "Invalid Email";
            }
        } else {
            $err[] = "Email Is required";
        }

        /** Password Validation */
        if(isset($_POST['password']) && $_POST['password'] !== ''){
            $pass = validate($_POST['password']);
            $pass = password_hash($pass, PASSWORD_DEFAULT);
        }else{
            $err[] = "Password Is required";
        }

        if(empty($err)){
            $arr = ['user_name' => $name, 'user_email' => $email, 'user_pass' => $pass];
            if($db->insert('user', $arr)){
                echo "inserted";
            }else{ 
                echo "Ops!! Insert Failed. Try again";
            }
        }else{
            for($i=0; $i < count($err); $i++){
                show_msg('danger', $err[$i]);
            }
        }
    }

/**
 * @param User-Login
 * 
 ****************************/
    if (isset($_POST['action']) && $_POST['action'] === 'login'){
        /** Validate Email */
        if(isset($_POST['email']) && $_POST['email'] !== ''){
            if(email($_POST['email'])){
                $email = email($_POST['email']);
            }else{
                $err[] ="Invalid Email";
            } 
        }else{
            $err[] = "Email is required";
        }

        /** Validate Password */
        if(isset($_POST['password']) && $_POST['password'] !== ''){
            $pass = validate($_POST['password']);
        }else{
            $err[] = "Password is required";
        }

        if($row = $db->fetch_by_sql("SELECT * FROM user WHERE user_email = '{$email}'")){
                if(password_verify($pass, $row[0]['user_pass'])){
                    $_SESSION['user'] = 'yes';
                    $_SESSION['user_id'] = $row[0]['user_id'];
                    $_SESSION['user_name'] = $row[0]['user_name'];
                    $_SESSION['user_email'] = $row[0]['user_email']; 
                    $_SESSION['user_phone'] = $row[0]['user_phone']; 
                    $_SESSION['user_dob'] = $row[0]['user_dob']; 
                    $_SESSION['user_profession'] = $row[0]['user_profession']; 
                    $_SESSION['user_pic'] = $row[0]['user_pic']; 

                    if(isset($_POST['remember']) && $_POST['remember'] == 'rem'){
                        setcookie('email', $email, time() + (90 * 24 * 60 * 60), '/');
                        setcookie('pass', $pass, time() + (90 * 24 * 60 * 60), '/');
                    }else{
                        setcookie('email', '',1,'/');
                        setcookie('pass', '', 1,'/');
                    }
                    echo "logged";
                }else{
                    $err[] = "Incorrect Password";
                }
        } else {
            $err[] = "You are not signed up. Please signup first.";
        }

        if(!empty($err)){
            for($i = 0; $i < count($err); $i++){ 
                show_msg('danger', $err[$i]);
            }
        }



    }

/**
 * @param Add-Post
 *  
 ******************************/
if (isset($_FILES['post-image'])) {
    $err = [];
    $post_img= '';
    // Post validate Post title
    if(isset($_POST['post-title'])){
        $post_title = validate($_POST['post-title']);
    }else{
        $err[] = "Post title is required";
    }

    // Post Description
    if(isset($_POST['post-desc'])){
        $post_desc = validate($_POST['post-desc']);
    }else{
        $err[] = "Post description is required";
    }

    // Post Category
    if(isset($_POST['post-category'])){
        $post_category = validate($_POST['post-category']);
    }
    // Post Tags
    if (isset($_POST['post-tag'])) {
        $post_tag = validate($_POST['post-tag']);
    }

    // Validate Image Upload

    if(isset($_FILES['post-image']['name']) && $_FILES['post-image']['name'] !== ''){

        $img = $_FILES['post-image']['name'];
        $img_size = $_FILES['post-image']['size'];
        $img_tmp = $_FILES['post-image']['tmp_name'];
        $img_type = $_FILES['post-image']['type'];

        $temp = explode('.', $img);
        $ext = strtolower(end($temp));
        $extension = array('jpg', 'jpeg', 'png', 'webp', 'gif', 'jfif');

        if(!in_array($ext, $extension)){
            $err[] = "Image format is not supported";
        }

        if($img_size > 1000 * 1024){
            $err[] = "Image size too large. Choose less than 1mb";
        }
        if (empty($err)) {
            $post_img = rand() . '-' . $img;
            $upload = "../assets/images/posts/" .  $post_img;
            if(move_uploaded_file($img_tmp,"../assets/images/posts/" .  $post_img)){
                $arr = ['post_title' => $post_title, 'post_desc' => $post_desc, 'post_image' => $post_img, 'post_cat' => $post_category, 'post_tag' => $post_tag, 'post_author' => $user_id];

                $db->insert("posts", $arr);
                if ($db->insert('posts', $arr)) {
                    echo "posted";
                }else{
                    show_msg('danger','Ops! Post with image failed. Try again');
                }
            }else{show_msg('danger','Ops! Post failed. image not uploaded');}
        }else{
            for($i = 0; $i < count($err); $i++){
                show_msg("danger", $err[$i]);
            }
            exit();
        }
    }else{

        if(empty($err)){
            $arr = ['post_title' => $post_title, 'post_desc' => $post_desc, 'post_cat' => $post_category, 'post_tag' => $post_tag, 'post_author' => $user_id];
            if ($db->insert('posts', $arr)) {
                echo "posted";
            } else {
                show_msg('danger', 'Ops! Post failed. Try again');
            }
        }else{
            for($i = 0; $i < count($err); $i++){
                show_msg("danger", $err[$i]);
            }
            exit();
        }

    }

    

}

