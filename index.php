<?php
/**
 * Main Template 
 * 
 */
 /** Configuration File */
 require_once "php/config.php";
 
 /** User Sessions  */
 require_once "php/session.php";

 /** Header */
 require_once "template_parts/header.php";

 /** Main Content */
 require_once "template_parts/main-content.php";

 /** Mobile Menu */
 require_once "template_parts/mobile-menu.php"; 

 /** Add Post */
 require_once "template_parts/add-post-modal.php";

 /** View Post */
 require_once "template_parts/view-post-modal.php";

 /** Footer */
 require_once "template_parts/footer.php";

