<?php

/**
 * View Post Modal
 */
?>

<div class="modal" id="ViewPostModal" area-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content" style="max-width: 750px;">
            <button type="button" class="modal-close corner-close-btn" data-dismiss="modal">X</button>
            <div class="modal-header" style="padding:0;">
                <img src="assets/images/img-12.jpg" class="w-full">
            </div>
            <div class="modal-body">
                <h2 class="block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iddo loremque, totam
                    architecto odit pariatur Lorem ips dolor.
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem distinctio doloremque
                    placeat ipsa! Sequi, recusandae. In numquam similique molestiae error, magni velit suscipit repudiandae itaqu....
                </p>
                <div class="flex items-center justify-between mt-2">
                    <div class='profile flex items-center'>
                        <img src="assets/images/avatar-2.png" alt="" class="w-9 h-9 rounded-full">
                        <div class="pl-3">
                            <h6 class="text-xs text-pri font-bold">John Doe</h6>
                            <p class="text-xs text-gen">Brand Specialist</p>
                        </div>
                    </div>
                    <div class="flex  py-0 px-2 mb-1 text-sm rounded text-gray-400 items-center">
                        <span class="mr-2">
                            <i class="far fa-clock"></i>
                        </span>
                        June 11, 2021
                    </div>
                </div>
                <div class="mt-3 space-x-4">
                    <div class="flex text-gray-400 text-sm justify-center">
                        <button class="btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1">Business</button>
                        <button class="btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1">Business</button>
                        <button class="btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1">Business</button>
                        <button class="btn btn-sm btn-outline text-sm text-gray-600 hover:text-gray-50 hover:bg-gray-600 rounded mr-1 mb-1">Business</button>
                    </div>
                </div>
                <hr class="mt-3">
                <div class="react flex justify-between my-2 px-1">
                    <button class="hover:text-blue-600 likes">
                        <i class="fa fa-thumbs-up like-icon"></i>
                        &nbsp;100 Likes
                    </button>
                    <button class="comments hover:text-blue-600">
                        12 Comments&nbsp;
                        <i class="fa fa-comments"></i>
                    </button>
                </div>
                <hr class="mb-3">
            </div>

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
            <button type="button" class="block mr-3 mb-2 btn btn-sm bg-blue-600 text-gray-50 modal-close ml-auto" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>