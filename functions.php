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

  if(SITE_URL!='') {
	return SITE_URL; 
  } else {
    return sprintf(
	    "%s://%s%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    '/crownpalace/php'
    );
  }
} 

/*
 * Print R with Pre
 */
function pre_print_r($output) { 

	ob_start();

	echo '<pre>';
	 	print_r($output);
	echo '</pre>';
	
	return ob_get_contents();
}

/*
 * Print Data in Console
 */
function print_console($output) {
	?>
		<script>
			console.log('<?php echo pre_print_r($output); ?>');
		</script>
	<?php
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

/*
 * Get PHP tables
 */
function get_all_tables() {

	global $connection; 

	$result = mysqli_query($connection, "show tables"); 
	while($table = mysqli_fetch_array($result)) { 
	    $tables[] = $table[0];  
	}

	return $tables;
}

/*
 * Get Column names form Table
 */
function get_column_names($db, $table) {

	global $connection; 

	$result = mysqli_query($connection, "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='".$db."' AND `TABLE_NAME`='".$table."';"); 
	while($column = mysqli_fetch_array($result)) { 
	    $columns[] = $column[0];  
	}
 
	return $columns; 
} 

  
pre_print_r(get_column_names($databasename, 'users'));