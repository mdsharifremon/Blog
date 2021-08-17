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
            <div class="space-y-2">
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Beauti</span>
                    <p class="ml-auto font-normal">(12)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Business</span>
                    <p class="ml-auto font-normal">(15)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Fashion</span>
                    <p class="ml-auto font-normal">(5)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Food</span>
                    <p class="ml-auto font-normal">(10)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Learn</span>
                    <p class="ml-auto font-normal">(3)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Music</span>
                    <p class="ml-auto font-normal">(7)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Nature</span>
                    <p class="ml-auto font-normal">(0)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>People</span>
                    <p class="ml-auto font-normal">(13)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Sports</span>
                    <p class="ml-auto font-normal">(7)</p>
                </a>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span>Technology</span>
                    <p class="ml-auto font-normal">(17)</p>
                </a>
            </div>
        </div>
    </div>
</div>