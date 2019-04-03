<?php

/*
 * Start Session 
 */
session_start();

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
 
/*
 * Get Social Links Function
 */
function get_social_links() {

	$social_links = array(
		array(
			'link' => '#',
			'icon_class' => 'fab fa-facebook-f'
		),
		array(
			'link' => '#',
			'icon_class' => 'fab fa-twitter'
		), 
		array(
			'link' => '#',
			'icon_class' => 'fab fa-google-plus-g'
		),
		array(
			'link' => '#',
			'icon_class' => 'fab fa-pinterest-p'
		), 
		array(
			'link' => '#',
			'icon_class' => 'fab fa-youtube'
		), 
		array(
			'link' => '#',
			'icon_class' => 'fab fa-instagram'
		),
	); 

	return $social_links;
}

/*
 * Show Social Links
 */
function show_social_links($classes = '', $wr_classes = '') { 

	$social_links = get_social_links();  
	if(!empty($social_links)) {
		echo '<div class="'.$wr_classes.'">';
		foreach($social_links as $sl_key => $sl_val) {
			if(($sl_val['link']!='') && ($sl_val['icon_class']!=''))
			echo '<a href="'.$sl_val['link'].'" class="'.$classes.'" target="_blank"><i class="'.$sl_val['icon_class'].'"></i></a>';		
		}
		echo '</div>';
	}

} 
   
/*
 * Home Services Data
 */   
function get_services() {
	$services = array(
		array(
			'id' 		=> 'suit-room',
			'title' 		=> 'Suits & Room',
			'description' 	=> 'At Crown Palace Indore we pride ourselves in providing that little bit extra, ensuring that our customers come first and our services are flexible and tailor made to suit the needs of our guests....',
			'image_url' 	=> 'images/suits&room.jpg',
			'btn_label' 	=> 'Find out more ',
			'btn_link' 		=> site_url('/cafe-bake-well.php'),
			'res_no' 		=> 'Reservations : 0731-2528855'
		),
		array(
			'id' 		=> 'rest-bar',
			'title' 		=> 'Restaurant & Bar',
			'description' 	=> 'An awesome open air restaurant that serve you with rich spicy aromas, sits alongside a wide selection of delicious dishes while providing room for fresh breezes and views of the surrounding nature...',
			'image_url' 	=> 'images/restaurants&bar.jpg',
			'btn_label' 	=> 'Find out more ',
			'btn_link' 		=> site_url('/restaurant-and-bar.php'),
			'res_no' 		=> 'Reservations : 0731-2528855'
		),
		array(
			'id' 		=> 'fast-food',
			'title' 		=> 'Fast Food Shop',
			'description' 	=> 'The award winning Fast Food Shop at Hotel Crown Palace are run by Indore\'s best and most welcoming teams. Come for delicious afternoon teas on Cafe Bakewell...',
			'image_url' 	=> 'images/restaurants&bar.jpg',
			'btn_label' 	=> 'Find out more ',
			'btn_link' 		=> site_url('/fast-food-shop.php'),
			'res_no' 		=> 'Reservations : 0731-2528855'
		),
	); 

	return $services;  
}

/*
 * Show Services 
 */
function show_services() {

	$services = get_services();

	if(!empty($services)) {
	foreach($services as $s_key => $s_val) {
		if($s_key%2==0) {  
			echo '<section class="pdng_y_60" id="'.$s_val['id'].'">';
		} else {
			echo '<section class="bg_light pdng_y_60" id="'.$s_val['id'].'">';
		}
		echo '<div class="container-fluid">
				<div class="row">';

					if($s_key%2==0) {  
						echo '<div class="col-md-6 "><img src="'.$s_val['image_url'].'" class="card-img-top" alt="..."></div>';
					}

					echo '<div class="col-md-6">
						<h3 class="mrg_b_30">'.$s_val['title'].'</h3>
						<p class="mrg_b_20">'.$s_val['description'].'</p>
						<div class="mrg_b_20"> <a class="btn btn-primary font-sm p-2 bg_primary border-0" href="'.$s_val['btn_link'].'" role="button">'.$s_val['btn_label'].' <i class="fas fa-arrow-circle-right"></i></a>
						</div>
						<div>
							<p class="text-right font-sm border-top pdng_y_10 m-0">'.$s_val['res_no'].'</p>
						</div>
					</div>';

					if($s_key%2!=0) { 
						echo '<div class="col-md-6 "><img src="'.$s_val['image_url'].'" class="card-img-top" alt="..."></div>';
					}

				echo '</div>
			</div>
		</section>';
		}

	}
}

/*
 * Get Banner Data
 */
function get_banner_data() {

	$banner_data['slider'] = array('images/home-img-4.png', 'images/home-img.png', 'images/home-img-3.png', 'images/home-img-2.png');
	$banner_data['title'] = 'HOTEL CROWN PALACE';
	$banner_data['subtitle'] = '2 A, Kanchan Bagh South Tukoganj Near Geeta Bhavan Square,Indore';
	$banner_data['btn_label'] = 'Book Now';

	return $banner_data;
}

/*
 *  Get contact details
 */
function get_contact_data() {

	$contact['numbers'][] = array( 'label' => 'Rooms Reservation', 'number' => '+91 07312528855'); 
	$contact['numbers'][] = array( 'label' => 'Banquets', 'number' => '+91 8109010159'); 
	$contact['numbers'][] = array( 'label' => 'Bakewell Bakery', 'number' => '+91 07312528877'); 
	$contact['numbers'][] = array( 'label' => 'Take Away Parcel', 'number' => '+91 07312528875'); 
	$contact['numbers'][] = array( 'label' => 'Xpress Bakewell Geeta Bhawan', 'number' => '+91 7773002901'); 
	$contact['numbers'][] = array( 'label' => 'Xpress Bakewell Anand Bazar', 'number' => '+91 7773002902'); 

	$contact['address'] = '2-A, Near Geeta Bhavan Square, Kanchan Bagh, Indore, Madhya Pradesh - 452001';

	$contact['distance'][] = array( 'label' => 'Distance from Airport', 'number' => '8 KM'); 
	$contact['distance'][] = array( 'label' => 'Distance from Railway Station', 'number' => '1 KM');  
	$contact['distance'][] = array( 'label' => 'Distance from Bus Stand', 'number' => '1 KM'); 

	return $contact;

}

/*
 * Generate Password
 */
function generate_random_password() {

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
	$password = substr( str_shuffle( $chars ), 0, 8 );

	return $password;
}


/* 
 * Send mail with attachment
 */
function send_mail($to, $from, $fromName, $subject ,$htmlContent, $file = '', $bcc = '') {
    
        $status = 0; 
        if(($to!='') && ($from!='') && ($fromName!='') && ($subject!='') && ($htmlContent!='')) { 
    
            //header for sender info
//           $headers = "From: $fromName"." <".$from.">";
            $headers  = "From: $fromName <$from> \r\n";
             
            if($bcc!=''){
                $headers .= "Bcc: $bcc ";  
            }  
  
            //boundary 
            $semi_rand = md5(time()); 
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

            //headers for attachment 
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

            //multipart boundary 
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

            //preparing attachment
            if(!empty($file) > 0){
                if(is_file($file)){
                    $message .= "--{$mime_boundary}\n";
                    $fp =    @fopen($file,"rb");
                    $data =  @fread($fp,filesize($file));

                    @fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
                    "Content-Description: ".basename($files[$i])."\n" .
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                }
            }
            
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;
            
            //send email
            $mail = @mail($to, $subject, $message, $headers, $returnpath); 
            // Use wp_mail() for wordpress
            if($mail) {
                $status = 1;
            }
//            //email sending status
//            echo $mail?"<div class='alert alert-success'>Mail sent.</div>":"<div class='alert alert-danger'>Mail sending failed.</div>";
//        
        } 
        
        return $status; 
}