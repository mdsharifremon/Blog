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
            <button class="hover:bg-green-500 text-green-500 hover:text-green-50 border border-green-500 rounded px-4 py-1 transition duration-300 ease-in modal-open" data-target="#addTaxonomyModal">Add Taxonomy</button>
        </div>
        <div class="table-content mt-3">
            <table class="w-full">
                <thead class="bg-gray-200">
                    <tr class="text-sm uppercase font-poppins">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1</td>
                        <td>Sharif</td>
                        <td>Sharif@gmail.com</td>
                        <td>20</td>
                        <td>Bangladesh</td>
                        <td class="flex justify-center">
                            <button class='px-2 py-1 text-gray-50 bg-green-400 hover:bg-green-500 m-0.5 text-xs rounded transition-0.3'>Edit</button>
                            <button class='px-2 py-1 text-gray-50 bg-red-400 hover:bg-red-500 m-0.5 text-xs rounded transition-0.3'>Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Sharif</td>
                        <td>Sharif@gmail.com</td>
                        <td>20</td>
                        <td>Bangladesh</td>
                        <td class="flex justify-center">
                            <button class='px-2 py-1 text-gray-50 bg-green-400 hover:bg-green-500 m-0.5 text-xs rounded transition-0.3'>Edit</button>
                            <button class='px-2 py-1 text-gray-50 bg-red-400 hover:bg-red-500 m-0.5 text-xs rounded transition-0.3'>Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Sharif</td>
                        <td>Sharif@gmail.com</td>
                        <td>20</td>
                        <td>Bangladesh</td>
                        <td class="flex justify-center">
                            <button class='px-2 py-1 text-gray-50 bg-green-400 hover:bg-green-500 m-0.5 text-xs rounded transition-0.3'>Edit</button>
                            <button class='px-2 py-1 text-gray-50 bg-red-400 hover:bg-red-500 m-0.5 text-xs rounded transition-0.3'>Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            <div class="modal-header bg-blue-600 text-gray-50">
                <h2>Add A Post</h2>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm bg-blue-600 text-gray-50 modal-close ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal close -->

<!-- Update Modal -->
<div class="modal" id="updateModal" area-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <button type="button" class="modal-close default-modal-close" data-dismiss="modal">X</button>
            <div class="modal-header bg-blue-600 text-gray-50">
                <h2>Add A Post</h2>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm bg-blue-600 text-gray-50 modal-close ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal close -->



<?php require_once "template-parts/footer.php"; ?>