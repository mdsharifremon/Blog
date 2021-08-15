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


define("BASE_URL", $root_url . "/phpcms/blog/");
define("ADMIN_BASE_URL", BASE_URL . "admin/");



$root = $_SERVER['DOCUMENT_ROOT'];
$root = dirname(__DIR__);
define("ROOT", $root . "/");
define("FUNCTION_ROOT", ROOT . 'functions/');
define("CLASS_ROOT", FUNCTION_ROOT . 'classes/');
define("ASSETS_ROOT", ROOT . 'assets/');
define("ADMIN_ROOT",  ROOT . 'admin/');
define("IMG_ROOT", ASSETS_ROOT . 'images/');
define("CSS_ROOT", ASSETS_ROOT . 'css/');
define("JS_ROOT", ASSETS_ROOT . 'js/');


?>