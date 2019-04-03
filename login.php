<?php include 'functions.php'; ?>
<?php 

/*
 * User Sign In  
 */  
$message = '';

if(isset($_POST['sign_in'])) {   

    $loginstatus = $user->signin($_POST);  

    if($loginstatus>0) {

        $message = "<div class='alert alert-success text-center'>You are successfully logged in.</div>" ;  
        // $pageurl = site_url('/dashboard.php');  
        $pageurl = site_url();  

        //Redirect 
        header("Location:$pageurl");   

    } else {
        $message = "<div class='alert alert-danger text-center'>Invalid Email/Password.</div>" ;   
    }
    
} else {
    
    $login = $user->check_login();
    if($login) {
        $dashboardurl = site_url('?login=1'); 
        header("Location:$dashboardurl");    
    }  
    
}   
?>    
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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
			<div class="card_size card"> 
				<div class="row">
					<div class="left_col col-md-5 text-white">
						<div class="p-3">
							<div class="pb-4 pt-5 text-center">
								<a href="<?php echo site_url(); ?>"><img src="images/logo.png"></a>
							</div>
							<h2 class="text-center">Sign In</h2>
							<p class="pt-3">Get access to your Orders, Wishlist and Recommendations</p>
						</div>
					</div>

					<div class="right_col col-md-7 bg-white pt-3">
						<div class="p-3"> 
                                                    <?php echo $message; ?>
                                                        <form class="pt-4" action="" method="post">
								<div class="form_in form-group pb-4">
									<label class="text-black d-none">Email<span class="text-danger">*</span></label>
									<span class="c_spans text-danger float-right">*</span>
		    						<input type="email" class="form-control pl-0" id="useremail" name="user_email" placeholder="Email" autocomplete="off" required="required">
		  						</div>

		  						<div class="form_in form-group">
		  							<label class="text-black d-none">Password<span class="text-danger">*</span></label>
		  							<span class="c_spans text-danger float-right">*</span>
                                                                        <input type="password" class="form-control pl-0" id="userpassword" name="user_password" placeholder="Password" autocomplete="off" required="required">
		  						</div>

		  						<div class="text-white btns p-4 text-center pt-5">
		  							<button type="submit" name="sign_in" class="btn w-100 btn-lg text-uppercase text-white">login</button>
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