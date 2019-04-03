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
// booking section
function get_booking_tab()
{
	$tab_section = array(

		array(
			'id' 	=> 'nav-hotel-tab',  //tab hotel
			'title' => 'Hotel Info',
			'description' => 'We take immense pleasure to introduce ourselves as a 3-star facility hotel. We are well recognized by the elite of the city and a large number of companies of repute. We have 49 well-appointed Guest Rooms and Suites.We also have Banquet Halls, Conference Halls, Business center; all keeping in mind the need of todays business travelers. Also uniquely designed multi-cuisine Restaurants, In - House Bakery, Fast Food, Cocktail lounge and Bar-Be-Que to comfort your guests the way they want. Above all, a team of professionally trained staff rendering your guests with quality oriented personalized services.'

			),

		array(
			'id'	 => 'nav-facility-tab',  //tab facilities
			'title'  => 'Facilities',
			'list'	 => array('Banquet','Meeting Facilities','Valet Parking','Concierge','Parking','Laundry','Conference Facilities','Restaurant','Luggage Storage'),
			

			),
		array(
			'id'	 => 'nav-gallery-tab',   //tab gallery
			'title'  => 'Gallery',
			'gallery'=> array('images/g1.jpg','images/g2.jpg','images/g3.jpg','images/g4.jpg','images/g5.jpg','images/g6.jpg','images/g7.jpg','images/g8.jpg','images/g9.jpg'),

		),
			
	);		
 return $tab_section;
			
}

// about us section
function get_about_us()
{
	$about_us_page = array(  					

			'id' 	 	  => '',
			'title' 	  =>'About Us',
			'img'	 	  => 'image_url(images/about.jpg)',
			'description' => 'Located in the heart of Indore city, Hotel Crown Palace holds a revered place in the hearts of the people of Indore. Established in the year 1990, we have been an integral part of the lives of the people of this city for decades.We welcome you into our midst of elegance, sophistication and true and selfless hospitality.
             Being a 3 star accredited Hotel by Indian Tourism (Govt. of India); we aspire to provide you the best of all services here.With 25 successful years in the hospitality industry we offer you a warm stay with us and look forward to cater to your special needs.'
       );
	return $about_us_page;
}
// Team Deatails.
function get_team()
{	
	$team_detail	= array(

			'title' 	=>'The three Pillars of Crown Palace',
			'crd_desc'  => array(
					'image_url'	=> '',
					'title'	 	=>'card-title',
					'sub-title'	=> 'card-subtitle',
					'desc'		=> 'card-para'		
			),

		);
	return $team_detail;
}

// Banquets and rooms
function get_banquet()
{
	$banquet_page = array(  					

			'id' 	 	  => '',
			'title' 	  =>'Meeting & Banquets',
			'img'	 	  => 'images/room.jpg',		
			'room_tab'    =>array(					//tab of rooms details
			 array(                      
						'id' 	 	=>  '',
						'tab_title' =>  'Zodiac Room',
						'title'		=> 'Zodiac Room',
						'sub-title'	=> 'You take care of the business, we ill take care of the facilities...',
						'desc'     	=>'<p class="card-text para_font">Our professionals will guide you through the planning process, leaving no stone unturned. Right from the booking, business facilities, snacks to stationary and flipcharts we look after the minutest of details to make your event and you a \'success\'.</p>

                                        <ul class="list-group d-inline-block">
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> High-speed internet access</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> LCD Projection</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Writing paper and pencils</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Flipchart</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Whiteboard & pencils</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Latest audio visual technology</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Newspapers & magazines</li>
                                        </ul>
                                        <p class="card-text para_font">We do everything possible to help make your conference a success at your requirement.<br>
                                        Spacious, centrally-airconditioned hall Overhead and slide projectors, CD player & TV, PA system with standing and collar mikes, secretarial services, etc.</p>
                                        <p class="card-text para_font font-weight-bold">Conference room equipped with all modern amenities, suitable for organizing conference / seminars.</p>',

							'image'	=> 'images/b1.jpg'
		
			),
			 array(                      					//crsytal room
						'id' 	 	=>  '',
						'tab_title' =>  'Crystal Room',
						'title'		=> 'Crystal Room',
						'sub-title'	=>'There are seminar halls as well which have been well designed and placed meticulously by the trained staff of the hotel.',
						'desc'      =>'<p class="card-text para_font">For its esteemed business visitors, the hotel has equipped these halls with all modern amenities required to hold a conference, meeting, seminar or presentation.</p>

                                        <ul class="list-group d-inline-block">
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> High-speed internet access</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> LCD Projection</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Writing paper and pencils</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Flipchart</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Whiteboard & pencils</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Latest audio visual technology</li>
                                            <li class="para_font list-group-item d-inline-block border-0 w-100 py-1"><span class="mr-2"><i class="fas fa-arrow-up arrow"></i></span> Newspapers & magazines</li>
                                        </ul>
                                        <p class="card-text para_font font-weight-bold">Lavishly designed conference hall furnished with modern amenities, suitable for organising training programmes and conferences.</p>',

						'image'	=> 'images/b2.jpg'
		
			),
			 array( 									//imperial hall                     
						'id'  	=>  '',
						'tab_title' =>  'Imperial Hall',
						'title'	=> 'Imperial Hall',
						'desc'	=> 'An elaborate banquet hall, equipped with all sort of banquet amenities, suitable for organising seminars, family functions for up to 200 people.',
						'image'	=> 'images/b3.jpg','images/b4.jpg'
		
			),
			 array(     								//ragency hall
			 			'id'  	=>  '',
						'tab_title' =>  'Regency Hall',
						'title'	=> 'Regency Hall',
						'desc'	=> 'More elaborate banquet hall equipped with stage and dance floor, suitable for organising seminars, family functions etc. for up to 300 people.',
						'image'	=> 'images/b5.jpg','images/b6.jpg'
		
			),
			 array(                      
						'id'  		=>  '',
						'tab_title' =>  'Fact Sheet',
						'title'		=> 'Fact Sheet',
						'sub-title'	=> 'Capacity','Rentals',
						'desc'     	=>' <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Venues</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Sitting</th>
                                                <th scope="col">Reception</th>
                                                <th scope="col">Minimum Pax</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">BOARD ROOM I</th>
                                                <td></td>
                                                <td>08</td>
                                                <td>-</td>
                                                <td>06</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">BOARD ROOM II</th>
                                                <td></td>
                                                <td>14</td>
                                                <td>-</td>
                                                <td>08</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">ZODIAC ROOM</th>
                                                <td>33\'×17\'</td>
                                                <td>30</td>
                                                <td>-</td>
                                                <td>20</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">CRYSTAL ROOM</th>
                                                <td>37\'×30\'</td>
                                                <td>40</td>
                                                <td>-</td>
                                                <td>25</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">IMPERIAL HALL</th>
                                                <td>58\'×40\'×10\'</td>
                                                <td>150</td>
                                                <td>200</td>
                                                <td>75</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">REGENCY HALL</th>
                                                <td>80\'×37\'×10\'</td> 
                                                <td>200</td>
                                                <td>250</td>
                                                <td>100</td>
                                            </tr>
                                      </tbody>
                                    </table>
                                </div>
                                <div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Venues</th>
                                                <th scope="col">8 Hours</th>
                                                <th scope="col">4 Hours</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">BOARD ROOM I</th>
                                                <td>4,000/-</td>
                                                <td>2,000/-</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">BOARD ROOM II</th>
                                                <td>5,000/-</td>
                                                <td>3,000/-</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">ZODIAC ROOM</th>
                                                <td>8,500/-</td>
                                                <td>6,000/-</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">CRYSTAL ROOM</th>
                                                <td>12,000/-</td>
                                                <td>9,000/-</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">IMPERIAL HALL</th>
                                                <td>25,000/-</td>
                                                <td>17,000/-</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">REGENCY HALL</th>
                                                <td>30,000/-</td>
                                                <td>20,000/-</td>
                                            </tr>
                                      </tbody>
                                    </table>',
                            'dwnld_btn'	=> 'Download Banquet Fact Sheet'
						
			),
		)
			

       );
	return $banquet_page;
}

