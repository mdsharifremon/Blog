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

/** 
 * @param Print-Array 
 * **************************/
function pr($arr)
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}

/** 
 * @param Print-Array-&-Exist 
 * **************************/
function prx($arr)
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
  exit();
}

/**
 *  @param Validate-Form-Data 
 * ********** ****************/

function validate($data)
{
  if ($data != '') {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
/** 
 * @param Validate-Email  
 * **********************/

function email($data)
{
  if ($data != '') {
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
      return $data;
    } else {
      return false;
    }
  }
}



function show_msg($type = null, $msg = null)
{
  if (null !== $type && null !== $msg) {
    /**
     * @param Show-Message 
     * $type = message type (warning, info, danger, success), 
     * $msg = message
     * */
    echo  "<div class='alert alert-{$type} alert-dismissible' role='alert'>
              <p>{$msg}</p> 
              <button type='button' class='alert-close' data-dismiss='alert' aria-label='Close'>X</button>                     
           </div>";
  }
}

/** Functions */
function time_in_timestamp($time)
{
  date_default_timezone_set('Asia/Dhaka');
  $time = strtotime($time) ? strtotime($time) : $time;
  $time = time() - $time;
  switch ($time) {
    case $time <= 60:
      return 'just now!';
      // Minute Check
    case $time > 60 && $time <= 3600:
      return (round($time / 60) == 1) ? '1 minute ago' : round($time / 60) . ' minutes ago';
      // Hour Check
    case $time > 3600 && $time <= 86400:
      return (round($time / 3600) == 1) ? '1 hour ago' : round($time / 3600) . ' hours ago';
      // Day Check
    case $time > 86400 && $time <= 604800:
      return (round($time / 86400) == 1) ? '1 hour ago' : round($time / 86400) . ' hours ago';
      // Week Check
    case $time > 604800 && $time <= 2600640:
      return (round($time / 604800) == 1) ? '1 week ago' : round($time / 604800) . 'weeks ago';
      // Month Check
    case $time > 2600640 && $time <= 31207680:
      return (round($time / 2600640) == 1) ? '1 month ago' : round($time / 2600640) . ' months ago';
      // Year Check
    case $time > 31207680:
      return (round($time / 31207680) == 1) ? '1 year ago' : round($time / 31207680) . ' years ago';
  }
}
