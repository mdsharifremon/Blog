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
                        <?php if($post["post_image"] != ''): ?>
                        <figure class="post-image">
                            <img src="<?php echo IMG_ROOT . 'posts/'. $post["post_image"]; ?>" class="w-full rounded">
                        </figure>
                        <?php endif; ?>
                        <section class="post-content px-4 py-2">
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
                                    <time datetime="<?php echo $post['post_created_on']; ?>"><?php echo $date ;?></time>
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
                            <hr class="mt-3">
                            <div class="react flex justify-between my-2 px-1">
                                <button class="hover:text-blue-600 likes">
                                    <i class="fa fa-heart like-icon"></i>
                                    &nbsp;100 Loves
                                </button>
                                <button class="comments hover:text-blue-600">
                                    12 Comments&nbsp;
                                    <i class="fa fa-comments"></i>
                                </button>
                            </div>
                            <hr class="mb-3">
                        </section>


                        <section class="comment-plate p-4 bg-white rounded-sm shadow-sm mt-8">
                            <h4 class="text-base uppercase  font-semibold mb-2 font-roboto">Post a comment</h4>
                            <form action="#" class="mt-2">
                                <textarea type="text" class="w-full border border-gray-200 py-3 px-5 text-sm  rounded-sm h-20 focus:outline-none focus:border-gray-400" placeholder="type your comment"></textarea>
                                <div class="mt-2">
                                    <button type="submit" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                                        Post
                                    </button>
                                </div>
                            </form>

                            <div class="space-y-5 mt-4">
                                <div class="flex items-start border-b  pb-5 border-gray-200">
                                    <div class="w-12 h-12 flex-shrink-0">
                                        <img src="assets/images/avatar.png" class="w-full">
                                    </div>
                                    <div class="flex-grow pl-4">
                                        <div class="commenter">
                                            <h4 class="text-base  font-roboto">Rasel Ahmed</h4>
                                            <p class="text-xs text-gray-400">
                                                <time datetime="">9 April 2021 at 12:34 AM</time>
                                            </p>
                                        </div>

                                        <p class="text-sm font-600 mt-2">Great article. Thanks</p>
                                        <div class="reply">
                                            <div class="flex gap-2 mt-2">
                                                <button class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Reply<button>
                                                        <button class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Delete</button>
                                            </div>
                                        </div>
                                        <div class="reply-form">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start border-b  pb-5 border-gray-200">
                                    <div class="w-12 h-12 flex-shrink-0">
                                        <img src="assets/images/avatar-2.png" class="w-full">
                                    </div>
                                    <div class="flex-grow pl-4">
                                        <h4 class="text-base  font-roboto">John Doe</h4>
                                        <p class="text-xs text-gray-400">
                                            <time datetime="">June 11, 2021</time>
                                        </p>
                                        <p class="text-sm font-600 mt-2">Great article. Thanks</p>
                                        <div class="flex gap-2 mt-2">
                                            <button class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Reply</button>
                                            <button class="text-gray-500 dark:text-gray-100 px-1 text-xs border border-gray-200 dark:border-gray-600 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-12 h-12 flex-shrink-0">
                                        <img src="assets/images/avatar.png" class="w-full">
                                    </div>
                                    <div class="flex-grow pl-4">
                                        <h4 class="text-base  font-roboto">Rasel Ahmed</h4>
                                        <p class="text-xs text-gray-400">9 Aprile 2021 at 12:34 AM</p>
                                        <p class="text-sm font-600 mt-2">Great article. Thanks</p>
                                        <div class="flex gap-2 mt-2">
                                            <button class="text-gray-500 dark:text-gray-100 px-1 text-xs border border-gray-200 dark:text-gray-500 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Reply</button>
                                            <button class="text-gray-500 px-1 text-xs border border-gray-200 rounded-sm shadow-sm hover:bg-blue-500 hover:text-white transition">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="bg-gray-600 text-gray-100 rounded py-1 w-full text-center">View Previous Comments</button>
                                </div>
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