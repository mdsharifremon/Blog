<?php

/**
 * @param Fetch_Recent_Posts
 ***********************/
if (isset($_POST['action']) && $_POST['action'] == 'fetchRecentPosts') {
    $sql = "SELECT p.post_id, p.post_title, p.post_image,p.post_created_on FROM posts p ORDER BY p.post_id DESC LIMIT 4";
    $output = '';
    if($data = $db->fetch_by_sql($sql)){
        foreach($data as $row):
            $date = date('M d, Y', strtotime($row['post_created_on']));
            $post_title = substr($row['post_title'], 0,40);
            $output .= "<a href='#' class='flex group modal-open' data-target='viewPostModal' data-postId='{$row['post_id']}'>";
        
           if($row['post_image'] != ''):
          $output .= "<div class='flex-shrink-0'>
                        <img src='{$post_img_root}{$row["post_image"]}' class='h-14 w-20 rounded object-cover'>
                     </div>";
           endif;
           $output .= "
            <div class='flex-grow pl-3'>
                <h5 class='text-md leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500'>
                    {$post_title}
                </h5>
                <div class='flex text-gray-400 text-sm items-center'>
                    <span class='mr-1 text-xs'><i class='far fa-clock'></i></span>
                    {$date}
                </div>
            </div>
          </a>";
        endforeach;
        
        
    }else{
        $output .= '<h3 class="text-base text-red-300">No recent posts found.</h3>';
    }

    echo $output;

}
