<?php 

/**
 * Actions Template
 */
 require_once "autoloader.php";
 require_once "functions.php";
 $db = new Database();

// Taxonomy Page
    /** Fetch Taxonomy */
    if(isset($_POST['action']) && $_POST['action'] == 'show-taxonomy'){
        $output = '';
        $i = 0;

        if($row = $db->fetch_All('taxonomy')){
            $i++;
            $output = "<table class='w-full'>
                            <thead class='bg-gray-200'>
                                <tr class='text-sm uppercase font-poppins'>
                                    <th>##</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Created ON</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
            foreach($row as $data){
                $date = date("d M, Y", strtotime($data['tax_created_on']));
                $output .= "<tr>
                                <td>{$i}</td>
                                <td>{$data['tax_name']}</td>
                                <td>{$data['tax_type']}</td>
                                <td>{$data['tax_desc']}</td>
                                <td>{$date}</td>
                                <td class='flex justify-center'>
                                    <button class='px-2 py-1 text-gray-50 bg-green-400 hover:bg-green-500 m-0.5 text-xs rounded transition-0.3' data-id='{$data["tax_id"]}'>Edit</button>
                                    <button class='px-2 py-1 text-gray-50 bg-red-400 hover:bg-red-500 m-0.5 text-xs rounded transition-0.3' data-id='{$data["tax_id"]}'>Delete</button>
                                </td>
                            </tr>";

            }
            $output .= "</tbody></table>"; 
        }else{
            $output = "<h2>No Data Found</h2>";
        }

        echo $output;;
    }
    /** Add Taxonomy*/
    if(isset($_POST['action']) &&  'add-taxonomy' === $_POST['action'] ){
        $err = [];

        if(isset($_POST['taxonomy-name']) && $_POST['taxonomy-name'] !== ''){
            $tax_name =  validate($_POST['taxonomy-name']);
        }else{
            $err[] = 'Taxonomy-name is required';
        }

        if (isset($_POST['taxonomy-type'])) {
            $tax_type =  validate($_POST['taxonomy-type']);
        } else {
            $err[] = 'Taxonomy type is required';
        }
        $tax_desc =  validate($_POST['taxonomy-desc']);


        if(empty($err)){
            $arr = ['tax_name' => $tax_name, 'tax_type' => $tax_type, 'tax_desc' => $tax_desc];
            if ($db->insert('taxonomy', $arr)) {
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