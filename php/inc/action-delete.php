<?php


/**
 *  DELETE POST, COMMENTS 
 */

 /** @param Delete_Post */

 if(isset($_POST['action']) && $_POST['action'] == 'deletePost'){
    $post_id = validate($_POST['postId']);

    if($db->delete('posts', "post_id = {$post_id}")){
        echo 1;
    }else{
        echo 0;
    }
 }

 /** @param Delete_Comment */

if (isset($_POST['action']) && $_POST['action'] == 'deleteComment') {
    $commentId = validate($_POST['commentId']);

    if ($db->delete('comments', "com_id = {$commentId}")) {
        echo 1;
    } else {
        echo 0;
    }
}
