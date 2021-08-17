<?php

/**
 * Autoloader
 * 
 * FILE INCLUDES
 * ## config.php
 */
require_once "config.php";
spl_autoload_register(function($className) {

	$file = CLASS_ROOT . strtolower($className) . '.php';

	if (file_exists($file)) {
            require_once $file;
	}

    if(!class_exists($className)) {
        echo "class does not exist";
    }
});

?>