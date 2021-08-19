<?php 

/**
 * @param Single_Post_Page
 */


require_once "php/config.php";

/** User Sessions  */
require_once "php/session.php";

if(isset($_GET['post_id']) && $_GET['post_id'] != ''){ 
    $post_id = $_GET['post_id'];
}else{
    header('Location:' . BASE_URL);
}

/** Header */
require_once "template_parts/header.php";

/** Main Content */
require_once "template_parts/single-main-content.php";

/** Mobile Menu */
require_once "template_parts/mobile-menu.php";

/** Footer */
require_once "template_parts/footer.php";