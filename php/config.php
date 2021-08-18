<?php

/**
 * Basic Config Template
 * 
 * All Basic Declared Variables
 * 
 */


$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$domain = $_SERVER['SERVER_NAME'];
$root_url = "${protocol}://${domain}";
$site_name = "Blog";

define("BASE_URL",  $root_url . dirname($_SERVER['SCRIPT_NAME']) . '/');
define("ADMIN_BASE_URL", BASE_URL . "admin/");


/*** File Root */
// $root = $_SERVER['DOCUMENT_ROOT'] . 'phpcms/blog/';

$root = dirname(__DIR__);
define("ROOT", $root . '\\');
define("PHP_ROOT", ROOT . 'php\\');
define("CLASS_ROOT", PHP_ROOT . 'classes\\');
define("ASSETS_ROOT", ROOT . 'assets\\');
define("ADMIN_ROOT",  ROOT . 'admin\\');
define("IMG_ROOT_DIR", ROOT . "assets\\images");

/** ASSETS URL */
define("ASSETS_ROOT_URL", BASE_URL . 'assets/');
define("IMG_ROOT", ASSETS_ROOT_URL . 'images/');
define("CSS_ROOT", ASSETS_ROOT_URL . 'css/');
define("JS_ROOT", ASSETS_ROOT_URL . 'js/');


?>