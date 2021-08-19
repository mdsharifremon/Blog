<?php

/**
 * Mobile Menu
 */

?>

<!-- mobile menu -->
<div class="fixed  w-full h-full bg-black bg-opacity-25 left-0 top-0 z-10 opacity-0 invisible transition-all duration-500 xl:hidden" id="sidebar_wrapper">
    <div class="fixed pt-18 top-0 w-72 h-full bg-white shadow-md z-10 flex flex-col transition-all duration-500 -left-80" id="sidebar">

        <!-- search and menu -->
        <div class="lg:hidden">
            <!-- searchbar -->
            <div class="relative mx-3 mt-3 shadow-sm">
                <span class="absolute left-3 top-2 text-sm text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500" placeholder="Search">
            </div>

            <!-- navlink -->
            <h3 class="text-xl font-semibold text-gray-700 mb-1 font-roboto pl-3 pt-3">Menu</h3>
            <div class="">
                <a href="index.html" class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="w-6">
                        <i class="fas fa-home"></i>
                    </span>
                    Home
                </a>
                <a href="#" class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="w-6">
                        <i class="far fa-file-alt"></i>
                    </span>
                    About
                </a>
                <a href="#" class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="w-6">
                        <i class="fas fa-phone"></i>
                    </span>
                    Contact
                </a>
            </div>
            <!-- navlinks end -->
        </div>

        <!-- categories -->
        <div class="w-full mt-3 px-4 ">
            <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
            <?php require "template_parts/categories.php"; ?>
        </div>
    </div>
</div>