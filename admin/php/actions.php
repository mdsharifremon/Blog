<?php 

/**
 * Actions Template
 */
 require_once "autoloader.php";
 require_once "functions.php";
 $db = new Database();


/** 
* @param Fetch-Category
*******************************/
    if(isset($_POST['action']) && $_POST['action'] == 'fetchCategory'){
        $output = '';
        $i = 0;

        if($row = $db->fetch_All('category')){
            $i++;
            $output = "<table class='w-full'>
                            <thead class='bg-gray-200'>
                                <tr class='text-sm uppercase font-poppins'>
                                    <th>##</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created ON</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
            foreach($row as $data){
                $date = date("d M, Y", strtotime($data['cat_created_on']));
                $output .= "<tr>
                                <td>{$i}</td>
                                <td>{$data['cat_name']}</td>
                                <td>{$data['cat_desc']}</td>
                                <td>{$date}</td>
                                <td class='flex justify-center'>
                                    <button class='px-2 py-1 text-gray-50 bg-green-400 hover:bg-green-500 m-0.5 text-xs rounded transition-0.3' data-id='{$data["cat_id"]}'>Edit</button>

                                    <button class='px-2 py-1 text-gray-50 bg-red-400 hover:bg-red-500 m-0.5 text-xs rounded transition-0.3' data-id='{$data["cat_id"]}'>Delete</button>
                                </td>
                            </tr>";

            }
            $output .= "</tbody></table>"; 
        }else{
            $output = "<h2 class='text-center text-xl'>No Category Found. Add a new one.</h2>";
        }

        echo $output;;
    }


/** 
* @param Add-Category
*******************************/
    if(isset($_POST['action']) &&  'add-category' === $_POST['action'] ){
        $err = [];

        if(isset($_POST['category-name']) && $_POST['category-name'] !== ''){
            $cat_name =  validate($_POST['category-name']);
        }else{
            $err[] = 'Category Name is required';
        }
        $cat_desc =  validate($_POST['category-desc']);


        if(empty($err)){
            $arr = ['cat_name' => $cat_name, 'cat_desc' => $cat_desc];
            if ($db->insert('category', $arr)) {
                echo "inserted";
            }else{
                show_msg('danger', 'Ops! Insert failed. Try again' );
            }
        }else{
            for ($i = 0; $i < count($err); $i++) {
                show_msg('danger', $err[$i]);
            }  
        }
    }

    
/**
 * @param Fetch-Tag
 *******************************/
    if (isset($_POST['action']) && $_POST['action'] == 'fetchTag') {
        $output = '';
        $i = 0;

        if ($row = $db->fetch_All('tag')) {
            $i++;
            $output = "<table class='w-full'>
        <thead class='bg-gray-200'>
            <tr class='text-sm uppercase font-poppins'>
                <th>##</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created ON</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";
            foreach ($row as $data) {
                $date = date("d M, Y", strtotime($data['tag_created_on']));
                $output .= "<tr>
                <td>{$i}</td>
                <td>{$data['tag_name']}</td>
                <td>{$data['tag_desc']}</td>
                <td>{$date}</td>
                <td class='flex justify-center'>
                    <button class='px-2 py-1 text-gray-50 bg-green-400 hover:bg-green-500 m-0.5 text-xs rounded transition-0.3' data-id='{$data["tag_id"]}'>Edit</button>

                    <button class='px-2 py-1 text-gray-50 bg-red-400 hover:bg-red-500 m-0.5 text-xs rounded transition-0.3' data-id='{$data["tag_id"]}'>Delete</button>
                </td>
            </tr>";
            }
            $output .= "</tbody>
    </table>";
        } else {
            $output = "<h2 class='text-center text-xl'>No Tag Found. Add a new one.</h2>";
        }

        echo $output;;
    }


/**
 * @param Add-Tag
 *******************************/
    if (isset($_POST['action']) && 'add-tag' === $_POST['action']) {
        $err = [];

        if (isset($_POST['tag-name']) && $_POST['tag-name'] !== '') {
            $tag_name = validate($_POST['tag-name']);
        } else {
            $err[] = 'Tag Name is required';
        }
        $tag_desc = validate($_POST['tag-desc']);


        if (empty($err)) {
            $arr = ['tag_name' => $tag_name, 'tag_desc' => $tag_desc];
            if ($db->insert('tag', $arr)) {
                echo "inserted";
            } else {
                show_msg('danger', 'Ops! Insert failed. Try again');
            }
        } else {
            for ($i = 0; $i < count($err); $i++) {
                show_msg('danger', $err[$i]);
            }
        }
    }