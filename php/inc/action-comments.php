<?php 

/** @param Comment_Actions */

/**
 * @param Insert_Comments_To_Database_By_Post_Id
 */

 if(isset($_POST['action']) && $_POST['action'] == 'postComment'){
     if(!isset($_POST['comment']) || $_POST['comment'] == ''){
        echo "please write some text to post a comment";
        die();
     }

     $comment = validate($_POST['comment']);
     $post_id = validate($_POST['postId']);
     $arr = ["com_details" =>$comment , "com_author" =>$user_id, "com_post"=>$post_id];
     if($db->insert('comments', $arr)){
         echo 1;
     }

 }

 /**
  * @param Add_Or_Remove_Loves_To_Post
  */

  if(isset($_POST['action']) && $_POST['action'] == 'love'){
    if(isset($user_id)):
        $post_id = validate($_POST['postId']);
        $type = validate($_POST['type']);

        if($type == 'add'){
            $arr = ["likes_post"=> $post_id, "likes_author" => $user_id];
            $db->insert('likes', $arr);
            echo 1;
        }elseif($type == 'sub'){
            $db->delete('likes', "likes_post = {$post_id} && likes_author = {$user_id}");
            echo 1;
        }
    endif;
  }

