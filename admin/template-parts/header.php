<?php

/**
 *  Header Template 
 * 
 *  Responsible for add styles and top header
 */

require_once "php/functions.php";
$page_name = basename($_SERVER['PHP_SELF'], '.php');

if ('index' === $page_name) {
    $page_title = $site_name . ' | Login';
} else {
    $page_title = $site_name . ' | ' . ucfirst($page_name);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>google-fonts.css">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>dashboard.css">
    <title><?php echo $page_title; ?> </title>
</head>
<body class="font-poppins">
    <header id="header">
        <div class="top fixed top-0 left-0 right-0 bg-gray-800">
            <div class="h-14 px-5 flex justify-between items-center shadow-md">
                <div class="logo-details">
                    <div class="logo_name text-gray-50 text-xl font-bold">CodingLab</div>
                </div>
                <div class="search">
                    <div class="flex search-group">
                        <input type="text" class="search-input" name="" id="" placeholder="search">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="user text-gray-50 relative">
                    <i class="fa fa-user"></i>
                    &nbsp;
                    <button class="admin-option" id="admin-option"><i class="fa fa-caret-down"></i></button>
                    <div class="admin-card absolute top-10 -right-1 w-40 bg-gray-100 shadow-lg p-3 rounded hidden">
                        <ul>
                            <li>
                                <span class="text-gray-700">Dark Mode</span>
                                <span class="dark-mode"></span>
                            </li>
                            <li>
                                <a href="" class="text-gray-700">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>