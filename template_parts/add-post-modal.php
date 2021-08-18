<?php

/**
 * Add Post Modal
 * 
 */
?>
<!-- Add Post Modal -->
<div class="modal" id="addPostModal" area-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close default-modal-close" data-dismiss="modal">X</button>
            <div class="modal-header bg-blue-600 text-gray-50">
                <h2>Add A Post</h2>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="add-post-form">

                    <div id="uploader" class="flex justify-center items-center">
                        <!-- Image will be Shown here -->

                    </div>
                    <p id="image-error" class="mb-2 text-red-500 px-2 text-sm"></p>
                    <div class='form__div'>
                        <label id="file-label" class="file-label" for="image">Upload An Image</label>
                        <input type="file" id="image" name="post-image" class="form-control">
                    </div>

                    <div class="form__div">
                        <input type="text" name="post-title" class="form__input" placeholder=" " required>
                        <label for="" class="form__label">Post Title</label>
                    </div>

                    <div class="form__div">
                        <textarea name='post-desc' class="form__input" placeholder=" " style="min-height:80px;" required></textarea>
                        <label for="" class="form__label">Post Details</label>
                    </div>
                    <div class="flex">
                        <div class="form-group md:w-6/12 w-ful pr-1 mb-3.5">
                            <select name="post-category" id="post-category" class="form-control">
                                <option disabled selected>Select Category</option>
                                <?php if ($row = $db->fetch_All("category")) : ?>
                                    <?php foreach ($row as $data) : ?>
                                        <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif;  ?>
                            </select>
                        </div>
                        <div class="form-group md:w-6/12 w-full pl-1 mb-3.5">
                            <select name="post-tag" id="tag-select" class="form-control">
                                <option disabled selected>Select Tags</option>
                                <?php if ($row = $db->fetch_All("tag")) : ?>
                                    <?php foreach ($row as $data) : ?>
                                        <option value="<?php echo $data['tag_id']; ?>"><?php echo $data['tag_name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif;  ?>
                            </select>
                        </div>
                    </div>
                    <div id="add-post-err"></div>
                    <input type="submit" id="add-post-btn" class="btn bg-blue-600 hover:bg-blue-700 text-gray-50 transition-0.3 w-full my-1" value="Save Post">
                </form>
            </div>

        </div>
    </div>
</div>