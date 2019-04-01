<?php include 'header.php'; ?>


	<!-- banner start -->
	<div class="banner-custom position-relative vh-100 bg_light">
		<div class="banner-img">
			<img src="images/home-img-4.png" />
			<img src="images/home-img.png" />
			<img src="images/home-img-3.png" /> 
			<img src="images/home-img-2.png" />
		</div>
		<!--slide end -->
		<div class="address-head text-center">
			<div class="lg font-weight-bold text-white">HOTEL CROWN PALACE</div>
			<p class="sm text-white">2 A, Kanchan Bagh South Tukoganj Near Geeta Bhavan Square,Indore</p>
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
		<div class="social_links"> <a href="#" class="header-icon p-2 text-reset"><i class="fab fa-facebook-f"></i></a>
			<a href="#" class="header-icon p-2 text-reset"><i class="fab fa-twitter"></i></a>
			<a href="#" class="header-icon p-2 text-reset"><i class="fab fa-google-plus-g"></i></a>
			<a href="#" class="header-icon p-2 text-reset"><i class="fab fa-pinterest-p"></i></a>
			<a href="#" class="header-icon p-2 text-reset"><i class="fab fa-youtube"></i></a>
			<a href="#" class="header-icon p-2 text-reset"><i class="fab fa-instagram"></i></a>
		</div>
	</div>
	<!-- banner end -->
	<!-- suits & room section start -->
	<section class="pdng_y_60" id="suit-room">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 ">
					<img src="images/suits&room.jpg" class="card-img-top" alt="...">
				</div>
				<div class="col-md-6">
					<h3 class="mrg_b_30">Suits & Room</h3>
					<p class="mrg_b_20">At Crown Palace Indore we pride ourselves in providing that little bit extra, ensuring that our customers come first and our services are flexible and tailor made to suit the needs of our guests....</p>
					<div class="mrg_b_20"> <a class="btn btn-primary font-sm p-2 bg_primary border-0" href="<?php echo site_url('/cafe-bake-well.php'); ?>" role="button">Find out more <i class="fas fa-arrow-circle-right"></i></a>
					</div>
					<div>
						<p class="text-right font-sm border-top pdng_y_10 m-0">Reservations : 0731-2528855</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- restaautant & bar section start -->
	<section class="bg_light pdng_y_60" id="rest-bar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<h3 class="mrg_b_30">Restaurant & Bar</h3>
					<p class="mrg_b_20">An awesome open air restaurant that serve you with rich spicy aromas, sits alongside a wide selection of delicious dishes while providing room for fresh breezes and views of the surrounding nature...</p>
					<div class="mrg_b_20"> <a class="btn btn-primary font-sm p-2 bg_primary border-0" href="<?php echo site_url('/restaurant-and-bar.php'); ?>" role="button">Find out more <i class="fas fa-arrow-circle-right"></i></a>
					</div>
					<div>
						<p class="text-right font-sm border-top pdng_y_10 m-0">Reservations : 0731-2528855</p>
					</div>
				</div>
				<div class="col-md-6">
					<img src="images/restaurants&bar.jpg" class="card-img-top" alt="...">
				</div>
			</div>
		</div>
	</section>
	<!-- fast food shop section start -->
	<section class="pdng_y_60" id="fast-food">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<img src="images/restaurants&bar.jpg" class="card-img-top" alt="...">
				</div>
				<div class="col-md-6">
					<h3 class="mrg_b_30">Fast Food Shop</h3>
					<p class="mrg_b_20">The award winning Fast Food Shop at Hotel Crown Palace are run by Indore's best and most welcoming teams. Come for delicious afternoon teas on Cafe Bakewell...</p>
					<div class="mrg_b_20"> <a class="btn btn-primary font-sm p-2 bg_primary border-0" href="<?php echo site_url('/fast-food-shop'); ?>" role="button">Find out more <i class="fas fa-arrow-circle-right"></i></a>
					</div>
					<div>
						<p class="text-right font-sm border-top pdng_y_10 m-0">Reservations : 0731-2528855</p>
					</div>
				</div>
			</div>
		</div>
	</section>
        
<?php include 'footer.php'; 