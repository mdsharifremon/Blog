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
            $db->update_by_sql("UPDATE posts SET post_likes = (post_likes + 1) WHERE post_id = {$post_id}");
            echo 1;
        }elseif($type == 'sub'){
            $db->delete('likes', "likes_post = {$post_id} && likes_author = {$user_id}");
            $db->update_by_sql("UPDATE posts SET post_likes = (post_likes - 1) WHERE post_id = {$post_id}");
            echo 1;
        }
    endif;
  }

  /** @param Fetch_Comments_By_Post_ID */

  if(isset($_POST['action']) && $_POST['action'] == 'fetchComment'){
    $post_id = validate($_POST['postId']);
    $output = '';

    $sql_comments = "SELECT c.com_id, c.com_details, c.com_author,c.com_on, u.user_name,u.user_pic FROM comments c JOIN user u ON c.com_author = u.user_id WHERE com_post = {$post_id} ORDER BY c.com_id DESC";
    if ($row = $db->fetch_by_sql($sql_comments)) :
        $output .= "<div class='p-4 bg-white rounded-sm shadow-sm mt-8 comments-plate'>
             <h4 class='text-base uppercase  font-semibold mb-2 font-roboto'>Comments</h4>
              <div class='space-y-5 mt-4'>";
        foreach ($row as $com) :
            $com_date = date("M d, Y", strtotime($com['com_on']));
            $com_time = date("g:i A", strtotime($com['com_on']));

            $output .= "<div class='flex items-start border-b  pb-5 border-gray-200'>
                      <div class='w-12 h-12 flex-shrink-0'>";
            $output .= "<figure class='w-12 h-12 flex-shrink-0'>";
            if ($com['user_pic'] != '') :
                $output .= "<img src='{$user_img_root}{$com['user_pic']}' class='w-full'>";
            else :
                $output .= "<img src='{$user_img_root}avatar.png' class='w-full'>";
            endif;
            $output .= "</figure>";

            $output .= "</div>
                      <div class='flex-grow pl-4'>
                          <div class='commenter'>
                              <h4 class='text-base  font-roboto'>{$com['user_name']}</h4>
                              <p class='text-xs text-gray-400'>
                                 <time datetime='{$com['com_on']}'
                                        <span>{$com_date}</span>
                                        <span>&nbsp;at&nbsp;</span>
                                        <span>{$com_time}</span>
                                 </time>
                              </p>
                          </div>

                          <p class='text-sm font-600 mt-2'>{$com['com_details']}</p>
                          <div class='reply'>
                              <div class='flex gap-2 mt-2'>";

            /** Reply Button */
            if (isset($user_id)) :
                $output .= "<button class='text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition reply-button' data-commentId='{$com['com_id']}'>Reply<button>";

                /** Delete Comment Button */
                if ($com['com_author'] == $user_id) :
                    $output .= "<button class='text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition delete-comment' data-postid='{$post_id}' data-commentId='{$com['com_id']}'>Delete</button>";
                endif;
            endif;
            $output .= "</div>
                          </div>
                          <div class='reply-form'></div>
                      </div>
                  </div>";
        endforeach;
        $output .= "<div class='mt-3'>
                      <button class='bg-gray-600 text-gray-100 rounded py-1 w-full text-center'>View Previous Comments</button>
                  </div>
              </div>
          </div>";
    endif;

    echo $output;


   

  }



