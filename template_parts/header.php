<?php

/**
 * Header Template
 */
require_once "php/autoloader.php";
require_once "php/functions.php";
require_once "php/session.php";
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>google-fonts.css">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>style.css">
    <link rel="stylesheet" href="<?php echo CSS_ROOT; ?>frontend.css">
    <script src="<?php echo JS_ROOT; ?>sweetalert2.all.min.js"></script>
    <title><?php echo $site_name; ?></title>
</head>

<body class="font-poppins text-gray-600">
    <!-- navbar -->
    <nav class="top-bar bg-gray-50 fixed top-0 left-0 right-0 z-index-1">
        <div class="wrapper px-4 mx-auto flex justify-between  items-center py-3">
            <!-- logo -->
            <div class="lg:w-44 w-40">
                <a href="index.html">
                    <img src="assets/images/logo.png" alt="logo" class="w-full">
                </a>
            </div>
            <!-- logo end -->

            <!-- searchbar -->
            <div class="relative h-9 md:block w-5/12">
                <input type="text" class="block w-full shadow border-none rounded  pr-11 pl-4 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500" placeholder="Search">
                <button class="absolute right-0 top-0 h-5/6 w-10">
                    <span class=" text-sm text-gray-500">
                        <i class="fas fa-search"></i>
                    </span>
                </button>
            </div>
            <div class="flex">

                <a href="login.php" id="login-button" class=" text-sm  font-semibold hover:text-blue-500 transition flex items-center">
                    <span class="mr-2">
                        <i class="far fa-user"></i>
                    </span>
                    Login/Register</a>
                <div class="relative">
                    <span class="login-handle">&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span>
                    <!--Login Side Options -->
                    <?php require_once "template_parts/user-sidebar.php"; ?>
                    <!--Login Side Options -->
                </div>

            </div>
            <div class="text-xl text-gray-700 cursor-pointer ml-4 xl:hidden block hover:text-blue-500 transition" id="open_sidebar">
                <i class="fas fa-bars"></i>
            </div>
            <!-- searchbar end -->
        </div>
    </nav>