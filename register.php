<?php include 'functions.php'; ?>
<?php 

/*
 * User Sign In  
 */  
$message = '';

if(isset($_POST['register_agent'])) {   

	// Insert User
    $response = $user->insert();  
    $message = $response['message'];

} else {
    
    $login = $user->check_login();
    if($login) {
        $dashboardurl = site_url('?alreadylogin=1');  
        header("Location:$dashboardurl");    
    }  
    
}       
?>  
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body> 
<div class="home_banner"></div>

	<section class="bg">
		<div class="container">
			<div class="card_size card" style="top: 35%;"> 
				<div class="row">
					<div class="left_col col-5 text-white">
						<div class="p-3">
							<div class="pb-4 pt-5 text-center">
								<a href="index.html"><img src="images/logo.png"></a>
							</div>
							<h2 class="text-center">Register</h2>
							<p class="pt-3">Get access to your Orders, Wishlist and Recommendations</p>
						</div>
					</div>

					<div class="right_col col-7 bg-white pt-4">
						<div class="p-3 ">
							<form class="reg_form" name="registration_form" action="" method="post">
								<?php  echo $message;  ?>
								<div class="form_in form-group pb-2">
									<label class="text-black mb-0 d-none">Agency Name<span class="text-danger">*</span></label>
									<span class="c_spans text-danger float-right">*</span>
		    						<input type="text" class="form-control pl-0" name="agency_name" placeholder="Agency Name" autocomplete="off" required="required">
		  						</div>

		  						<div class="form_in form-group pb-2">
		  							<label class="text-black mb-0 d-none">Agency Contact<span class="text-danger">*</span></label>
		  							<span class="c_spans text-danger float-right">*</span>
		    						<input type="text" class="form-control pl-0" name="contact_number" id="userpassword" placeholder="Agency Contact" autocomplete="off" required="required">
		  						</div>

		  						<div class="form_in form-group pb-2">
									<label class="text-black mb-0 d-none">Address<span class="text-danger">*</span></label>
									<span class="c_spans text-danger float-right">*</span>
		    						<input type="text" class="form-control pl-0" name="address" placeholder="Address" autocomplete="off" required="required">
		  						</div>

		  						<div class="row">
		  							<div class="col">
				  						<div class="form_in form-group pb-2">
											<label class="text-black mb-0 d-none">Country<span class="text-danger">*</span></label>
											<span class="c_spans text-danger float-right">*</span>
				    						<input type="text" class="form-control pl-0" name="country" placeholder="Country" autocomplete="off" required="required">
				  						</div>
		  							</div>
			  						<div class="col">
			  							<div class="form_in form-group pb-2">
											<label class="text-black mb-0 d-none">State<span class="text-danger">*</span></label>
											<span class="c_spans text-danger float-right">*</span> 
			    							<input type="text" class="form-control pl-0" name="state" placeholder="State" autocomplete="off" required="required">
			  							</div>
			  						</div>
		  						</div>

		  						<div class="row"> 
		  							<div class="col">
				  						<div class="form_in form-group pb-2">
											<label class="text-black mb-0 d-none">City<span class="text-danger">*</span></label>
											<span class="c_spans text-danger float-right">*</span>
		    								<input type="text" class="form-control pl-0" name="city" placeholder="City" autocomplete="off" required="required">
		  								</div>
		  							</div>
			  						<div class="col">
			  							<div class="form_in form-group pb-2">
											<label class="text-black mb-0 d-none">Zip Code<span class="text-danger">*</span></label>
											<span class="c_spans text-danger float-right">*</span>
		    								<input type="text" class="form-control pl-0" name="zip_code" placeholder="Zip Code" autocomplete="off" required="required">
		  								</div>
			  						</div>
		  						</div>
		  						

		  						<div class="form_in form-group pb-2">
									<label class="text-black mb-0 d-none">Phone Number<span class="text-danger">*</span></label>
									<span class="c_spans text-danger float-right">*</span>
		    						<input type="text" class="form-control pl-0" name="phone" placeholder="Phone Number" autocomplete="off" required="required">
		  						</div>

		  						<div class="form_in form-group pb-2">
									<label class="text-black mb-0 d-none">Company Pan Card Number<span class="text-danger">*</span></label>
		    						<input type="text" class="form-control pl-0" name="pan" placeholder="Company Pan Card Number" autocomplete="off">
		  						</div>
 
		  						<div class="form_in form-group">
									<label class="text-black mb-0 d-none">Email<span class="text-danger">*</span></label>
									<span class="text-danger float-right c_spans">*</span>
		    						<input type="email" class="form-control pl-0" name="email" placeholder="Email" autocomplete="off" required="required">
		  						</div>

		  						<div class="btns pt-3 pb-3 text-center">
		  							<button type="submit" name="register_agent" class="btn w-100 btn-lg text-uppercase text-white">Register</button>
		  						</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/all.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>