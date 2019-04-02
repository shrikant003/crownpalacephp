<?php include 'header.php'; ?>


	<!-- banner start -->
	<div class="banner-custom position-relative vh-100 bg_light">

		<?php 
			$banner_data = get_banner_data(); 
			
			// Banner Slider
			$slider = $banner_data['slider'];
			if($slider) {
				echo '<div class="banner-img">';
				foreach($slider as $sl_val) {
					echo '<img src="'.$sl_val.'" />';
				} 
				echo '</div>';
			} 
		?>

		<div class="address-head text-center">
			<div class="lg font-weight-bold text-white"><?php echo $banner_data['title']; ?></div>
			<p class="sm text-white"><?php echo $banner_data['subtitle']; ?></p>
		</div>

		<!--reservation form start -->
		<div class="reservation-form">
			<form class="booking-form pdng_20 pdng_t_30 p_b_14 bx_shw" method="get" action="<?php echo site_url('booking.php'); ?>" autocomplete="off">
				<h4 class="text-center mb-4 text-uppercase text_primary">Reservation </h4>
				<div class="form-row">
					<div class="form-group col-md-4 mb-0">
						<label for="checkindate" class="text_primary">Check In Date <span class="text-danger">*</span> 
						</label>
						<input type="text" class="form-control rounded-0" name="checkin_date" id="checkindate" placeholder="dd/mm/yy" size="30" required="required">
						<label for="checkindate"> <span class="date-icon p-1"><i class="far fa-calendar-alt"></i></span>
						</label>
					</div>
					<div class="form-group col-md-4 mb-0">
						<label for="checkoutdate" class=" text_primary">Check In Date <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control rounded-0" name="checkout_date" id="checkoutdate" placeholder="dd/mm/yy" size="30" required="required">
						<label for="checkoutdate"> <span class="date-icon p-1"><i class="far fa-calendar-alt"></i></span>
						</label>
					</div>
					<div class="form-group col-md-2 mb-0  ">
						<label for="room" class="text_primary">No Of Rooms <span class="text-danger">*</span>
						</label>
						<select class="rounded-0  custom-select form-control" name="numberofrooms" required="required">
							<option selected="selected">1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select>
					</div>
					<div class="form-group col-md-2 mb-0 text-center">
						<input type="submit" value="BOOK NOW" class="btn book-btn border-0 rounded font-weight-bold p-2 text-white" />
					</div>
				</div>
			</form>
		</div>
		<!--reservation end -->
		
			<?php 
			/*
			 * Social Links
			 */
  			show_social_links('header-icon p-2 text-reset', 'social_links');  
			?>
			
		</div>
	</div>
	<!-- banner end -->

 		
 			<?php 
			/*
			 * Services
			 */
  			show_services();   
			?>
 
        
<?php include 'footer.php'; 