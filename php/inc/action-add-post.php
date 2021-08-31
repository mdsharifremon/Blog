<?php

/**
 * @param Add-Post
 *  
 ******************************/
if (isset($_FILES['post-image'])) {
    $err = [];
    $post_img = '';
    // Post validate Post title
    if (isset($_POST['post-title'])) {
        $post_title = validate($_POST['post-title']);
    } else {
        $err[] = "Post title is required";
    }

    // Post Description
    if (isset($_POST['post-desc'])) {
        $post_desc = validate($_POST['post-desc']);
    } else {
        $err[] = "Post description is required";
    }

    // Post Category
    if (isset($_POST['post-category'])) {
        $post_category = validate($_POST['post-category']);
    }else{
        $post_category = 22;
    }
    // Post Tags
    if (isset($_POST['post-tag'])) {
        $post_tag = validate($_POST['post-tag']);
    }else{
        $post_tag = 6;
    }

    // Validate Image Upload

    if (isset($_FILES['post-image']['name']) && $_FILES['post-image']['name'] !== '') {

        $img = $_FILES['post-image']['name'];
        $img_size = $_FILES['post-image']['size'];
        $img_tmp = $_FILES['post-image']['tmp_name'];
        $img_type = $_FILES['post-image']['type'];

        $temp = explode('.', $img);
        $ext = strtolower(end($temp));
        $extension = array('jpg', 'jpeg', 'png', 'webp', 'gif', 'jfif');

        if (!in_array($ext, $extension)) {
            $err[] = "Image format is not supported";
        }

        if ($img_size > 1000 * 1024) {
            $err[] = "Image size too large. Choose less than 1mb";
        }
        if (empty($err)) {
            $post_img = rand() . '-' . $img;
            if (move_uploaded_file($img_tmp, IMG_ROOT_DIR . 'posts\\' .  $post_img)) {
                $arr = ['post_title' => $post_title, 'post_desc' => $post_desc, 'post_image' => $post_img, 'post_cat' => $post_category, 'post_tag' => $post_tag, 'post_author' => $user_id];

                if($db->insert('posts', $arr)){echo 1; }else{echo 0;};
                
            } else {
                show_msg('danger', 'Ops! Post failed. image not uploaded');
            }
        } else {
            for ($i = 0; $i < count($err); $i++) {
                show_msg("danger", $err[$i]);
            }
          
        }
    } else {

        if (empty($err)) {
            $arr = ['post_title' => $post_title, 'post_desc' => $post_desc, 'post_cat' => $post_category, 'post_tag' => $post_tag, 'post_author' => $user_id];
           if( $db->insert('posts', $arr)){
                $db->update_by_sql("UPDATE category SET posts = (posts + 1) WHERE cat_id = {$post_category}");
               echo 1; 
            }else{ 
                echo 0;
            }
        } else {
            for ($i = 0; $i < count($err); $i++) {
                show_msg("danger", $err[$i]);
            }
           
        }
    }
    die();
}
