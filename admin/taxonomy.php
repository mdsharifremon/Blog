<?php

/**
 * Home Page Template
 */
?>

<?php
require_once "template-parts\header.php";
require_once "template-parts\sidebar.php";
?>

<section class="home-section  mt-14 pt-8 pl-8 pr-2">
    <div class="main-content rounded overflow-hidden bg-white">
        <div class="content-header bg-white flex justify-between items-center  rounded px-3 py-2">
            <h2 class="text-2xl font-bold text-green-500">Dashboard</h2>
            <button class="hover:bg-green-500 text-green-500 hover:text-green-50 border border-green-500 rounded px-4 py-2 mt-2 transition duration-300 ease-in modal-open" data-target="#addTaxonomyModal">Add Taxonomy</button>
        </div>
        <div class="table-content mt-3" id="taxonomyData">

        </div>
        <div class="footer">
            <p class="text-center py-2 mt-8 bg-white text-green-400">
                &copy;&nbsp;CodingLab 2021 all the right reserved.
            </p>
        </div>
    </div>
</section>
<!-- Add Post Modal -->
<div class="modal" id="addTaxonomyModal" area-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close default-modal-close" data-dismiss="modal">X</button>
            <div class="modal-header bg-green-600 text-gray-50">
                <h2 class="text-xl">Add Taxonomy</h2>
            </div>
            <div class="modal-body">
                <form id="taxonomyForm" method="post" class="my_form">
                    <div class="form-group">
                        <input type="text" name="taxonomy-name" id="taxonomy-name" placeholder="Taxonomy Name" class="outline-none px-3 py-2 mb-3 rounded text-sm w-full border border-gray-300 focus:border-gray-400">
                        <select class="outline-none text-sm  px-3 py-2 mb-3 rounded w-full border border-gray-300 focus:border-gray-400" name="taxonomy-type" id="taxonomy-type">
                            <option disabled selected>Select Taxonomy Type</option>>
                            <option value="category">Category</option>
                            <option value="tag">Tag</option>
                        </select>
                        <textarea name="taxonomy-desc" id="taxonomy-desc" class="outline-none px-3 py-2 mb-3 rounded text-sm w-full border border-gray-300 focus:border-gray-400 text-gray-500 h-24" placeholder="Taxonomy Description">
                        </textarea>
                        <div id="add-taxonomy-err">
                            <!-- <div class='alert alert-danger alert-dismissible' role='alert'>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <button type='button' class='alert-close' data-dismiss='alert' aria-label='Close'>X</button>
                            </div> -->
                        </div>
                        <div class="flex justify-center">
                            <button id="save-taxonomy" class="mt-3 mb-2 btn m-auto bg-green-500 text-white ">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal close -->




<?php require_once "template-parts/footer.php"; ?>