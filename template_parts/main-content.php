   <!-- main -->
   <main class="bg-gray-100">
       <section class="full-content">
           <div class="wrapper mx-auto px-4 flex flex-wrap lg:flex-nowrap">
               <!-- left sidebar -->
               <aside class="w-3/12 xl:block hidden left-sidebar">
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
               </aside>

               <!-- Main content -->
               <div class="xl:w-6/12 lg:w-8/12 md:w-7/12  w-full   xl:ml-6 lg:pr-3 md:pr-3 lg:mr-3 main-content">

                   <!-- title -->
                   <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm">
                       <h5 class="text-base uppercase font-semibold font-roboto" id="posts-under-the-category">BUSINESS</h5>
                       <?php if (isset($user_id)) : ?>
                           <button class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition-0.3 modal-open" data-target="#addPostModal">
                               Share Your Thoughts
                           </button>
                       <?php else : ?>
                           <a href="login.php" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition-0.3">
                               Login first to Write post
                           </a>
                       <?php endif; ?>
                   </div>

                   <!-- All posts -->
                   <div id="all-posts"></div>
                   <!-- All posts -->

                   <!-- footer -->
                   <footer class="bg-white rounded shadow mt-3 py-3">
                       <p class=" text-sm text-center ">Copyright © 2021 <a href="https://sharifwds.me" target="_blank" class="font-semibold">Sharif Uddin</a>
                           All Rights Reserved</p>
                   </footer>
               </div>

               <!-- right sidebar -->
               <aside class="xl:w-3/12 lg:w-4/12 md:w-5/12 w-full pt-8 lg:pt-0 lg:pl-0 md:pl-3 right-sidebar">
                   <!-- Popular posts -->
                   <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
                       <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Popular Posts</h3>
                       <div class="space-y-4" id="popular-posts">
                           <!-- <article class="popular-posts">
                          <a href="#" class="flex group">
                               <figure class="flex-shrink-0">
                                   <img src="assets/images/img-5.jpg" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover">
                                </figure>
                               <div class="flex-grow pl-3">
                                  <h5 class="text-md leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                                   Team Bitbose geared up to attend Blockchain
                                 </h5>
                                 <div class="flex text-gray-400 text-sm items-center">
                                       <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                                               June 11, 2021
                                 </div>
                              </div>
                           </a>
                       </article> -->
                       </div>
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