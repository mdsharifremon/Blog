<?php

/**
 * View Post Template
 */


 if(isset($_POST['action']) && $_POST['action'] == 'viewPost'){
    $postId = validate($_POST['postId']);

    $sql = "SELECT p.post_id, p.post_title, p.post_desc, p.post_image,p.post_created_on, p.post_edited_on, c.cat_name, t.tag_name, u.user_name, u.user_pic, u.user_profession FROM posts p JOIN category c ON p.post_cat = c.cat_id JOIN tag t ON p.post_tag = t.tag_id JOIN user u ON p.post_author = u.user_id WHERE p.post_id = {$postId}";
    $output = '';
    if($data = $db->fetch_by_sql($sql)){
        $post = $data[0];
        $post_created_date = date('M d, Y', strtotime($post['post_created_on']));
        $post_edited_date = date('M d, Y', strtotime($post['post_edited_on']));
        

     /** Post Image */
     if($post['post_image'] != ''):
      $output .= "<div class='modal-header' style='padding:0;'>
             <figure>
                <img src='{$post_img_root}{$post['post_image']}' class='w-full'>
             </figure>
          </div>";
     endif;
     /* Modal Body Start */
     $output .="<div class='modal-body'>";
        /** Post Title */
        $output .= "<h2 class='block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto'>{$post['post_title']}</h2>";
        /** Post Description */
        $output .= "<p class='text-gray-500 text-sm mt-2'>{$post['post_desc']}</p>";
        /** Post Author & Date*/
        $output .= "<div class='flex items-center justify-between mt-2'>";
                 /* Post Author */
                 $output .= "<div class='profile flex items-center'>";
                        if($post['user_pic'] != ''):
                         $output .= "<img src='{$user_img_root}{$post['user_pic']}' alt='' class='w-9 h-9 rounded-full'>";
                        else:
                        $output .= "<img src='{$user_img_root}avatar.png' alt='' class='w-9 h-9 rounded-full'>";
                        endif;
                    $output .= "<div class='pl-3'>
                                  <h6 class='text-xs text-pri font-bold'>{$post['user_name']}</h6>
                                  <p class='text-xs text-gen'>{$post['user_profession']}</p>
                            </div>";
                       $output.="</div>";
            $output .= "<div class='flex  py-0 px-2 mb-1 text-sm rounded text-gray-400 items-center'>
                      <span class='mr-2'>
                          <i class='far fa-clock'></i>
                      </span>
                      <time datetime='{$post['post_created_on']}'>{$post_created_date}</time>
                      <span class='hidden'>Updated
                        <time datetime='{$post['post_edited_on']}'>{$post_edited_date}</time>
                      </span>
                  </div>";
              $output .= "</div>";
            $output .="<div class='mt-3 space-x-4'>
                  <div class='flex text-gray-400 text-sm justify-center'>
                      <button class='btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1'>
                         {$post['cat_name']}
                      </button>
                      <button class='btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1'>
                         {$post['tag_name']}
                       </button>
                  </div>
              </div>";
    $likes = ($db->row_count('likes', "likes_post = {$post['post_id']}")) ? $db->row_count('likes', "likes_post = {$post['post_id']}") : '';
    $comments = ($db->row_count('comments', "com_post = {$post['post_id']}")) ? $db->row_count('comments', "com_post = {$post['post_id']}") : '';     
    $output .= "<hr class='mt-3'>
              <div class='react flex justify-between my-2 px-1'>
                  <button class='hover:text-blue-600 likes'>
                      <i class='fa fa-thumbs-up like-icon'></i>
                      <span>&nbsp;{$likes}</span><span>&nbsp;Loves</span>
                  </button>
                  <button class='comments hover:text-blue-600'>
                      <span>{$comments}</span>
                      <span>&nbsp;Comments&nbsp;</span>
                      <i class='fa fa-comments'></i>
                  </button>
              </div>
              <hr class='mb-3'>";

    if (isset($user_id)) :
      $output .= "<div class='post-comment mb-2'>
                        <div class='form-group relative rounded-3xl border border-gray-300 flex w-full'>
                                <input class='py-2 px-3 pl-6 w-11/12 outline-none rounded-3xl comment-input' type='text' name='comment-input' placeholder='Write Your Thoughts Here'>
                                
                                <button class='post-comment-btn transition-0.3 text-blue-600 absolute rounded-circle w-10 h-full right-0 top-0 bg-gray-100 hover:bg-gray-200  rounded-full' data-postId='{$post["post_id"]}'>
                                    <i class='fa fa-paper-plane'></i>
                                </button>
                        </div>
                    </div>";
    endif;

    $output .= "<div id='comment-plate'></div>";

    /** Modal Body Close Button*/
    $output .= "</div>";

          //  <form action='#' class='mt-2'>
          //                         <div class='form-group'>
          //                             <div class='input-message'>
          //                                 <textarea type='text' class='w-full border border-gray-200 py-1 px-2 text-sm  rounded-sm h-20 focus:outline-none focus:border-gray-400' placeholder='type your message'></textarea>
          //                             </div>
          //                             <div class=''>
          //                                 <button type='submit' class='text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition'>
          //                                     Post
          //                                 </button>
          //                             </div>

          //                         </div>
          //                     </form>
    
    }else{
        $output .= "<h2>Sorry! No Post Found.</h2>";
    }

    echo $output;
 }



?>