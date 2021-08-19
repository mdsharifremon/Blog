<?php


/**
 * @param Fetch_Posts
 ***********************/
if (isset($_POST['action']) && $_POST['action'] == 'fetchPosts') {

    $sql = "SELECT p.post_id, p.post_title, p.post_desc, p.post_image,p.post_created_on,p.post_edited_on,t.tag_name,c.cat_name,u.user_id,u.user_name, u.user_pic, u.user_profession FROM posts p JOIN category c ON p.post_cat = c.cat_id JOIN tag t ON p.post_tag = t.tag_id JOIN user u ON p.post_author = u.user_id ORDER BY p.post_id DESC";


    $output = '';
    if ($data = $db->fetch_by_sql($sql)) {
        foreach($data as $row):
        $desc = substr($row['post_desc'],0, 150) . '...';
        $date = date('M d, Y', strtotime($row['post_created_on']));

        $output .= "<article class='rounded-lg mt-4 overflow-hidden bg-white shadow-sm'>";

        /** Post Image */
        if($row['post_image'] != ''):
        $output .= "<figure class='block rounded overflow-hidden'>
                            <img src='{$post_img_root}{$row['post_image']}' class='w-full h-auto max-h-80 object-cover transform hover:scale-110 transition duration-500'>
                    </figure>";
        endif;

        /** Content Container */
        $output .= "<section class='p-4 pb-5'>";

        /** Post Title */
        $output .= "<h2 class='block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto'>
                               <a href='single-post.php?post_id={$row["post_id"]}'> {$row['post_title']}</a>   
                    </h2> ";
        /** Post Description */
        $output .= " <p class='text-gray-500 text-sm mt-2'>{$desc} </p>";

        /** Buttons Container */
        $output .= "<div class='flex items-center justify-between mt-3'>";

                    /** Read More Button */
                    $output.="<button class='bg-blue-500 hover:bg-blue-600 text-gray-100 text-sm rounded float-right mt-1 cursor-pointer modal-open' data-target='#ViewPostModal' style='padding:0.14rem 0.5rem;' data-id='{$row['post_id']}'>read more</a>";

        /** Edit and Delete Button */
        if (isset($user_id) && $user_id == $row['user_id']) :   
         $output .= "<div>
                        <button class='bg-white border border-gray-300 hover:bg-gray-600 text-gray-600 hover:text-gray-50 text-sm rounded transition-0.2 mx-1  cursor-pointer modal-open' data-target='#EditPostModal' style='padding:0.2rem 0.4rem;' data-id='{$row['post_id']}'>Edit Post</button>

                        <button class='bg-white border border-red-300 hover:bg-red-500 text-red-500 hover:text-gray-50 text-sm rounded transition-0.2  mx-1 cursor-pointer modal-open' data-target='#EditPostModal' style='padding:0.2rem 0.4rem;' data-id='{$row['post_id']}'>Delete Post</button>
                  </div>";
        endif;
        $output .="</div>"; // Button Container Close

        /** Post Author & Date Container*/
        $output .= "<div class='flex items-center justify-between mt-2'>";
            /** Post Author Wrapper */
            $output .= "<figure class='profile flex items-center'>";

            /** Author Image */
            if($row['user_pic'] != ''):
                $output .= "<img src='{$user_img_root}{$row["user_pic"]}' alt='uer-profile-{$row["user_name"]}' class='w-9 h-9 rounded-full'>";
            else:
                $output .= "<img src='{$user_img_root}avatar.png' alt='' class='w-9 h-9 rounded-full'>";
            endif;

            /** Author Details Wrapper */
            $output .= "<div class='pl-3'>";
                    /** Author Name */
                    $output .= "<h6 class='text-xs text-pri font-bold'>{$row["user_name"]}</h6>";
                    /** Author Profession */ 
                    if($row['user_profession'] != ''):
                        $output .="<p class='text-xs text-gen'>{$row["user_occupation"]}</p>";
                    endif;
            $output .= "</div>"; // Author Details Wrapper Close
                
            $output .="</figure>"; // Post Author Wrapper Close
            /** Post Time  */
            $output .= "<div class='flex  py-0 px-2 mb-1 text-sm rounded text-gray-400 items-center'>
                                <span class='mr-2'>
                                    <i class='far fa-clock'></i>
                                </span>
                            <time datetime='{$row["post_created_on"]}'>{$date}</time>
                            <time class='screen-reader hidden' area-hidden='true' datetime='{$row["post_edited_on"]}'>{$row["post_edited_on"]}'</time>

                        </div>";
        $output .=    "</div>";//  Post Author & Date Container Close

        /** Post Loves and Comments */
        $output .= "<hr class='mt-3'>
                        <div class='react flex justify-between my-2 px-1'>
                            <button class='hover:text-blue-600 likes'>
                                <i class='fa fa-heart like-icon'></i>&nbsp;100 Loves
                            </button>
                            <button class='comments hover:text-blue-600'>
                                12 Comments&nbsp;<i class='fa fa-comments'></i>
                            </button>
                        </div>
                    <hr class='mb-3'>";

        /** Comments Plate When User Logged */
       if (isset($user_id)) :
        $output .= "<div class='post-comment mb-2'>
                        <div class='form-group relative rounded-3xl border border-gray-300 flex w-full'>
                         
                                <input class='py-2 px-3 pl-6 w-11/12 outline-none rounded-3xl comment-input' type='text' name='comment-input' placeholder='Write Your Thoughts Here'>
                                
                                <button class='post-comment-btn transition-0.3 text-blue-600 absolute rounded-circle w-10 h-full right-0 top-0 bg-gray-100 hover:bg-gray-200  rounded-full' data-postId='{$row["post_id"]}'>
                                    <i class='fa fa-paper-plane'></i>
                                </button>
                           
                        </div>
                    </div>";
        endif;
        $output .= "</section>"; // Content Container Close
        $output .= "</article>";

        endforeach;
    }else{
        $output .= "<h2 class='text-center text-xl text-blue-600 py-3 rounded bg-white'>No post found</h2>";
    }
    echo $output;
}


?>    
   
            
 
        

        
        
  
