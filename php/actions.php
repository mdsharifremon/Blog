<?php

/**
 * Actions Template
 */
require_once "autoloader.php";
require_once "functions.php";
require_once "session.php";

$img_root = $root_url .  dirname(dirname($_SERVER['SCRIPT_NAME'])) . '/assets/images/' ;
$post_img_root = $img_root . 'posts/';
$user_img_root = $img_root . 'user/';

$db = new Database();

/** 
    if(isset($_POST['action']) && $_POST['action'] === ''){

    }
*/

/** @param User_Signup_Login_Related-Actions */
 require_once "inc/action-user.php";

/** @param Fetch_All_Posts */
require_once "inc/action-fetch-posts.php";

/** @param Add_New_Post */
require_once "inc/action-add-post.php";

/** @param Fetch_Recent_Posts */
require_once "inc/fetch-recent-ports.php";

/** @param Comments */
require_once "inc/action-comments.php";

/** @param View_Post_By_PostId */
require_once "inc/action-view-post.php";

/** @param Delete_POST_&_COMMENTS */
require_once 'inc/action-delete.php';
 
/** @param Fetch_Posts_By_Category */
require_once "inc/action-fetch-posts-by-cat.php";

/** @param Fetch_Posts_By_Tag */
require_once "inc/action-fetch-posts-by-tag.php";


