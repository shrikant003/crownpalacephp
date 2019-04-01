<?php

/*
 * Constants
 */
define('SITE_URL', 'http://base1.tutorsincity.com/crownpalace/php/');
 
/*
 * Global Variable - Connection  
 */

global $connection;  

/*
 * Required Variable 
 */

$hostname = 'localhost'; 
$dbusername = 'hbookdb'; 
$dbpassword = 'hbookdb@123';  
$databasename = 'hbookdb';      

 
/*
 * Connect With Server
 */

$connection = mysqli_connect($hostname,$dbusername,$dbpassword);
if(!$connection) {
    die('Error in connect with server');   
}  
 
/*
 * Create Database
 */
$sql = "CREATE DATABASE $databasename";
$sql = "CREATE DATABASE IF NOT EXISTS $databasename"; 
$output = mysqli_query($connection, $sql); 
if(!$output) {
    die('Error in database creation. ');
}

/* 
 *  Connect with database
 */

$database = mysqli_select_db($connection, $databasename);  
if(!$database) {
    die('Error in connect with database');
}  

