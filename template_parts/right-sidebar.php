<?php

/**
 * 
 * Right Sidebar
 */
?>
<div class="xl:w-3/12 lg:w-4/12 md:w-5/12 w-full pt-8 lg:pt-0 lg:pl-0 md:pl-3 right-sidebar">
    <!-- Popular posts -->
    <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Popular Posts</h3>
        <?php require_once "template_parts/popular-posts.php"; ?>
    </div>
    <!-- Recent posts -->
    <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Recent Posts</h3>
        <div class='space-y-4' id='recent-posts'>

        </div>
    </div>
</div>