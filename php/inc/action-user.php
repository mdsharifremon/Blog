<?php
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
                die();
            }else{ 
                echo "Ops!! Insert Failed. Try again";
            }
        }else{
            for($i=0; $i < count($err); $i++){
                show_msg('danger', $err[$i]);
            }
            die();
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
                    die();
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
            die();
        }



    }