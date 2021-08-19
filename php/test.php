<div class='rounded-lg mt-4 overflow-hidden bg-white shadow-sm'>
    <a href='view.html' class='block rounded overflow-hidden'>
        <img src='assets/images/img-12.jpg' class='w-full h-96 object-cover transform hover:scale-110 transition duration-500'>
    </a>
    <div class='p-4 pb-5'>
        <a href='view.html'>
            <h2 class='block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto'>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iddo loremque, totam
                architecto odit pariatur Lorem ips dolor.
            </h2>
        </a>

        <p class='text-gray-500 text-sm mt-2'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem distinctio doloremque
            placeat ipsa! Sequi, recusandae. In numquam similique molestiae error, magni velit suscipit
            repudiandae itaqu....
            <button class='bg-blue-500 hover:bg-blue-600 text-gray-100 text-sm rounded float-right mt-1 cursor-pointer modal-open' data-target='#ViewPostModal' style='padding:0.14rem 0.5rem;'>read more</button>
        <div class='clear-both'></div>
        </p>
        <div class='flex items-center justify-between mt-2'>
            <div class='profile flex items-center'>
                <img src='assets/images/avatar-2.png' alt='' class='w-9 h-9 rounded-full'>
                <div class='pl-3'>
                    <h6 class='text-xs text-pri font-bold'>John Doe</h6>
                    <p class='text-xs text-gen'>Brand Specialist</p>
                </div>
            </div>
            <div class='flex  py-0 px-2 mb-1 text-sm rounded text-gray-400 items-center'>
                <span class='mr-2'>
                    <i class='far fa-clock'></i>
                </span>
                June 11, 2021
            </div>
        </div>
        <hr class='mt-3'>
        <div class='react flex justify-between my-2 px-1'>
            <button class='hover:text-blue-600 likes'>
                <i class='fa fa-heart like-icon'></i>
                &nbsp;100 Likes
            </button>
            <button class='comments hover:text-blue-600'>
                12 Comments&nbsp;
                <i class='fa fa-comments'></i>
            </button>
        </div>
        <hr class='mb-3'>
        <?php if (isset($user_id)) : ?>
            <div class='post-comment mb-2'>
                <div class='form-group relative rounded-3xl border border-gray-300 flex w-full'>
                    <input class='py-2 px-3 pl-6 w-11/12 outline-none rounded-3xl ' type='text' name='comment' id='' placeholder='Write Your Thoughts Here'>
                    <button class='post-comment-btn transition-0.3 text-blue-600 absolute rounded-circle w-10 h-full right-0 top-0 bg-gray-100 hover:bg-gray-200  rounded-full'>
                        <i class='fa fa-paper-plane'></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>