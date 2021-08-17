<?php
/**
 * Left Sidebar
 * 
 */
?>   
   <div class="w-3/12 xl:block hidden left-sidebar">
       <!-- Social plugin -->
       <div class="w-full bg-white shadow-sm rounded-sm p-4">
           <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Social Plugin</h3>
           
           <?php require_once "template_parts/social-plugins.php"; ?>
       </div>
       <!-- categories -->
       <div class="w-full bg-white shadow-sm rounded-sm p-4 mt-8">
           <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
          <?php require_once "template_parts/categories.php"; ?>
       </div>
       <!-- tags -->
       <div class="w-full bg-white shadow-sm rounded-sm p-4 mt-8">
           <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Tags</h3>
           <?php require_once "template_parts/tags.php"; ?>
       </div>
   </div>