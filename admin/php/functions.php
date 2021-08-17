<?php

/**
 * Basic Functions 
 */

 /**
  * File Included
  * autoloader.php
  * config.php
  */

  require_once "config.php";


function prx($arr)
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
  exit();
}


function validate($data)
{
  if ($data != '') {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}

function email($data)
{
  if ($data != '') {
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
      return $data;
    } else {
      return "Invalid Email";
    }
  }
}

function show_msg($type = null, $msg = null){
  if(null !== $type && null !== $msg){
    echo  "<div class='alert alert-{$type} alert-dismissible' role='alert'>
                <p>{$msg}</p>                      
            <button type='button' class='alert-close' data-dismiss='alert' aria-label='Close'>X</button>
        </div>";
  }
}


