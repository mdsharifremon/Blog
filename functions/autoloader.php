<?php

/**
 * Autoloader
 * 
 */
require_once "config.php";
spl_autoload_register(function($className) {

	$file = CLASS_ROOT . 'class-' . strtolower($className) . '.php';

	if (file_exists($file)) {
            require_once $file;
	}

    if(!class_exists($className)) {
        echo "class does not exist";
    }
});



?>