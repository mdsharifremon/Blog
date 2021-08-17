   <!-- main -->
   <main class="bg-gray-100">
       <section class="full-content">
           <div class="wrapper mx-auto px-4 flex flex-wrap lg:flex-nowrap">
               <!-- left sidebar -->
                <?php require_once "left-sidebar.php"; ?>

               <!-- Main content -->
               <div class="xl:w-6/12 lg:w-8/12 md:w-7/12  w-full   xl:ml-6 lg:pr-3 md:pr-3 lg:mr-3 main-content">

                   <!-- title -->
                   <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm">
                       <h5 class="text-base uppercase font-semibold font-roboto">BUSINESS</h5>
                       <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition-0.3 modal-open" data-target="#addPostModal">
                           Add Post
                       </a>
                   </div>

                   <!-- big post -->
                 <?php require_once "template_parts/posts.php"; ?>
                   <!-- big post -->


                   <!-- comment -->
                  <?php require_once "template_parts/comments.php"; ?>

                   <!-- footer -->
                   <footer class="bg-white rounded shadow mt-3 py-3">
                       <p class=" text-sm text-center ">Copyright © 2021 <a href="https://sharifwds.me" target="_blank" class="font-semibold">Sharif Uddin</a>
                           All Rights Reserved</p>
                   </footer>
               </div>

               <!-- right sidebar -->
               <?php require_once "template_parts/right-sidebar.php"; ?>
               

           </div>
       </section>
   </main>