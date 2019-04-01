<?php

//Show Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php'; 
include 'includes/class.users.php';   
//include 'includes/class.activities.php';   
//include 'includes/class.hotelbooking.php';   

/*
 * Site URL 
 */
function _site_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    '/crownpalace/'
  );
}

/*
 * Custom Site URL 
 */
function site_url($next=''){
  return _site_url().$next;
} 

/*
 * Current Page/file name
 */
function get_current_file_name() {
    return basename($_SERVER['PHP_SELF']); 
}