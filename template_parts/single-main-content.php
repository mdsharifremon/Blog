<?php




?>
<!-- main -->
<main class="bg-gray-100">
    <section class="full-content">
        <div class="wrapper mx-auto px-4 flex flex-wrap lg:flex-nowrap">
            <!-- Main content -->
            <div class="lg:w-8/12 md:w-7/12  w-full   xl:ml-6 lg:pr-3 md:pr-3 lg:mr-3 main-content">
                <!-- Post --->
                <?php
                $sql = "SELECT p.post_id, p.post_title, p.post_desc, p.post_image,p.post_created_on,p.post_edited_on,t.tag_name,c.cat_name,u.user_id,u.user_name, u.user_pic, u.user_profession FROM posts p JOIN category c ON p.post_cat = c.cat_id JOIN tag t ON p.post_tag = t.tag_id JOIN user u ON p.post_author = u.user_id WHERE p.post_id = {$post_id} ORDER BY p.post_id DESC";

                if ($row = $db->fetch_by_sql($sql)) :
                    $post = $row[0];
                    $date = date('M d, Y', strtotime($post['post_created_on']));
                ?>
                    <article class="rounded">
                        <?php if ($post["post_image"] != '') : ?>
                            <figure class="post-image">
                                <img src="<?php echo IMG_ROOT . 'posts/' . $post["post_image"]; ?>" class="w-full rounded">
                            </figure>
                        <?php endif; ?>
                        <section class="post-content px-4 py-2 bg-white rounded">
                            <h2 class="block text-2xl font-semibold text-gray-700 font-roboto mt-1">
                                <?php echo $post['post_title']; ?>
                            </h2>

                            <p class="text-gray-500 text-sm mt-3">
                                <?php echo $post['post_desc']; ?>
                            </p>
                            <div class="flex items-center justify-between mt-2">
                                <div class='profile flex items-center'>
                                    <?php if ($post['user_pic'] != '') : ?>
                                        <img src="<?php echo IMG_ROOT; ?>user/<?php echo $post["user_pic"]; ?>" alt="" class="w-9 h-9 rounded-full">
                                    <?php else : ?>
                                        <img src="<?php echo IMG_ROOT; ?>user/avatar.png" alt="" class="w-9 h-9 rounded-full">
                                    <?php endif; ?>
                                    <div class="pl-3">
                                        <h6 class="text-xs text-pri font-bold"><?php echo $post["user_name"]; ?></h6>
                                        <p class="text-xs text-gen"><?php echo $post["user_profession"]; ?></p>
                                    </div>
                                </div>
                                <div class="flex  py-0 px-2 mb-1 text-sm rounded text-gray-400 items-center">
                                    <span class="mr-2">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    <time datetime="<?php echo $post['post_created_on']; ?>"><?php echo $date; ?></time>
                                    <span class="screen-reader hidden" area-hidden="true">Updated On<time datetime="<?php echo $post["post_edited_on"]; ?>">
                                            <?php echo date('M d, Y', strtotime($post["post_edited_on"])); ?>
                                        </time></span>
                                </div>
                            </div>
                            <div class="mt-3 space-x-4">
                                <div class="flex text-gray-400 text-sm justify-center">
                                    <button class="btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1">
                                        <?php echo $post["cat_name"]; ?>
                                    </button>
                                    <button class="btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1">
                                        <?php echo $post["tag_name"]; ?>
                                    </button>
                                </div>
                            </div>

                            <!---Post Loves and Comments--->

                            <hr class='mt-3'>
                            <div class='react flex justify-between my-2 px-1'>
                                <!--likes -->
                                <div class='love-wrapper'>
                                    <?php
                                    $likes = ($db->row_count('likes', "likes_post = {$post['post_id']}")) ? $db->row_count('likes', "likes_post = {$post['post_id']}") : '';

                                    if (isset($user_id)) :
                                        $loved = ($db->fetch_All('likes', null, null, "likes_post = {$post["post_id"]} && likes_author = {$user_id}")) ? "loved" : '';
                                    ?>
                                        <button class="hover:text-blue-600 loves logged <?php echo $loved; ?>" data-postId="<?php echo $post['post_id']; ?>">
                                            <i class='fa fa-heart love-icon'></i>
                                            &nbsp;<span class='love-count'><?php echo $likes; ?></span>&nbsp;Loves
                                        </button>
                                    <?php else : ?>
                                        <button class='loves'>
                                            <i class='fa fa-heart love-icon'></i>
                                            &nbsp;<span class='love-count'><?php echo $likes; ?></span>&nbsp;Loves
                                        </button>
                                    <?php endif; ?>

                                </div>
                                <div class='comment-wrapper'><button class='comments'>
                                        <?php
                                        $comments = ($db->row_count('comments', "com_post = {$post['post_id']}")) ? $db->row_count('comments', "com_post = {$post['post_id']}") : '';
                                        ?>
                                        <span class='comment-count'><?php echo $comments; ?></span>&nbsp;Comments&nbsp;<i class='fa fa-comments'></i>
                                    </button></div>
                            </div>
                            <hr class='mb-3'>
                        </section>


                        <!-- Comments Plate -->
                        <section class="comment-plate p-4 bg-white rounded-sm shadow-sm mt-8">
                            <h4 class="text-base uppercase  font-semibold mb-2 font-roboto">Post a comment</h4>

                            <textarea type="text" class="w-full border border-gray-200 py-3 px-5 text-sm  rounded-sm h-20 focus:outline-none focus:border-gray-400 comment-input" name="comment-input" placeholder="type your comment"></textarea>

                            <button type="submit" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition post-comment-btn" data-postid="<?php echo $post["post_id"]; ?>">
                                Post
                            </button>



                            <div class="space-y-5 mt-4" id="comments-container">

                                <?php if ($data = $db->fetch_by_sql("SELECT c.com_id, c.com_details, c.com_author,c.com_on, u.user_name,u.user_pic FROM comments c JOIN user u ON c.com_author = u.user_id WHERE com_post = {$post_id} ORDER BY c.com_id DESC")): ?>
                                    <?php foreach ($data as $com) : ?>
                                        <div class="flex items-start border-b  pb-5 border-gray-200">

                                            <figure class="w-12 h-12 flex-shrink-0">
                                                <?php if ($com['user_pic'] != '') : ?>
                                                    <img src="<?php echo IMG_ROOT . 'user/' . $com['user_pic']; ?>" class="w-full">
                                                <?php else : ?>
                                                    <img src="<?php echo IMG_ROOT; ?>user/avatar.png" class="w-full">
                                                <?php endif; ?>
                                            </figure>

                                            <div class="flex-grow pl-4">
                                                <div class="commenter">
                                                    <h4 class="text-base  font-roboto"><?php echo $com['user_name']; ?></h4>
                                                    <p class="text-xs text-gray-400">
                                                        <time datetime="<?php echo $com["com_on"]; ?>">
                                                        <?php echo date("M d, Y",strtotime($com['com_on'])); ?>
                                                        &nbsp;at&nbsp;
                                                         <?php echo date("g:i A",strtotime($com['com_on'])); ?>
                                                        </time>
                                                    </p>
                                                </div>

                                                <p class="text-sm font-600 mt-2">
                                                    <?php echo $com['com_details']; ?>
                                                </p>
                                                <div class="reply">
                                                    <div class="flex gap-2 mt-2">
                                                        <button class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition reply-btn">Reply<button>
                                                        <?php 
                                                        if(isset($user_id)):
                                                        if($com["com_author"] == $user_id): ?>
                                                                <button class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition" data-comId="<?php echo $com['com_id']; ?>">Delete</button>
                                                        <?php endif; endif; ?>
                                                    </div>
                                                </div>
                                  <!-- <div class="reply-form">
                                            <form action="#" class="mt-2">
                                                <div class="form-group">
                                                    <div class="input-message">
                                                        <textarea type="text" class="w-full border border-gray-200 py-1 px-2 text-sm  rounded-sm h-20 focus:outline-none focus:border-gray-400" placeholder="type your message"></textarea>
                                                    </div>
                                                    <div class="">
                                                        <button type="submit" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                                                            Post
                                                        </button>
                                                    </div>

                                                </div>
                                            </form>

                                        </div> -->
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="mt-3">
                                          <button class="bg-gray-600 text-gray-100 rounded py-1 w-full text-center">View Previous Comments</button>
                                    </div>
                                
                                    <?php endif; ?>
                            </div>
                        </section>
                    </article>
                <?php endif; ?>


                <!-- footer -->
                <footer class="bg-white rounded shadow mt-3 py-3">
                    <p class=" text-sm text-center ">Copyright © 2021 <a href="https://sharifwds.me" target="_blank" class="font-semibold">Sharif Uddin</a>
                        All Rights Reserved</p>
                </footer>
            </div>

            <!-- right sidebar -->
            <aside class="lg:w-4/12 md:w-5/12 w-full pt-8 lg:pt-0 lg:pl-0 md:pl-3 right-sidebar">
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
            </aside>


        </div>
    </section>
</main>