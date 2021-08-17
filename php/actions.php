<?php

/**
 * Actions Template
 */
require_once "autoloader.php";
require_once "functions.php";
require_once "session.php";

$db = new Database();

/** 
    if(isset($_POST['action']) && $_POST['action'] === ''){

    }
*/

/***************************
 * Category Fetch 
 * 
 * *************************/
if (isset($_POST['action']) && $_POST['action'] === 'fetchCategories') {

  $row = $db->fetch_by_sql("SELECT * FROM taxonomy WHERE tax_type = 'category'");
  print_r($row);
  echo $row;
      
}