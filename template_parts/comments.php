 <div class="p-4 bg-white rounded-sm shadow-sm mt-8">
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
                     <p class="text-xs text-gray-400">9 Aprile 2021 at 12:34 AM</p>
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
                 <p class="text-xs text-gray-400">9 Aprile 2021 at 12:34 AM</p>
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
 </div>