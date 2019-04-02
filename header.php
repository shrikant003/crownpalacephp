<?php include 'functions.php'; ?>
<?php $pagename =  get_current_file_name(); ?>
<!DOCTYPE html>
<html>
<head>
    
    <title>HOTEL CROWN PALACE</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Google Fonts-->    
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">

    <!--Bootstrap File-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
    <!--jQuery UI-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css" />
    
    <!--Fontawesome File-->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <!--Custom Stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/main.css"> 
    
</head> 
<body>

    <?php

    // Contact data
    $contactdata = get_contact_data(); ?>
    
    <?php if($pagename!='index.php') { ?>
    
    <?php if($pagename=='booking.php') { ?>
        <div class="home_banner"></div>
    <?php } ?> 
    
    <!-- Booking Header Start--> 
    <header class="main_header fixed-top">

        <!--Header Top Start-->
        <div class="top_header text-white font-weight-bold clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="left_side float-left py-2 mrg_r_10">
                            <div class="font-weight-bold contact_details"><span><i class="fas fa-phone"></i> <?php echo $contactdata['numbers']['0']['number']; ?></span></div>
                        </div>
                        <div class="left_side float-left py-2">
                            <div class="address_details"><span class="address mr-2"><i class="fas fa-map-marker-alt"></i></span><?php echo $contactdata['address']; ?></div>
                        </div>  
                        <div class="left_side float-right">
                            <a class="mr-2 agent_btn_login" href="<?php echo site_url('login.php'); ?>">Travel Agent Login</a>
                            <a class="py-2 agent_btn_cancel" href="<?php echo site_url('register.php'); ?>">Travel Agent Registration</a>
                        </div>
                    </div> 
                </div>  
            </div> 
        </div>
        <!--Header Top End-->

        <!--Header Bottom Start-->
        <div class="bottom_header clearfix">
            <div class="container">
                <div class="float-left p-2">
                    <a href="<?php echo site_url(); ?>" class="d-inline-block logo"><img class="img-fluid" src="images/logo.png"></a>
                </div>
                <div class="navigations float-right">
                    <nav class="navs">
                        <ul class="nav nav-tabs border-0"> 
                            <li class="nav-item"><a href="<?php echo site_url(); ?>" class="nav-link text-white font-weight-bold text-uppercase ">Home</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('about-us.php'); ?>" class="nav-link text-white font-weight-bold text-uppercase ">About Us</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('rooms.php'); ?>" class="nav-link text-white font-weight-bold text-uppercase ">Rooms</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('restaurants.php'); ?>" class="nav-link text-white font-weight-bold text-uppercase ">Restaurants</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('banquet.php'); ?>" class="nav-link text-white font-weight-bold text-uppercase ">Banquet</a></li>
                            <li class="nav-item"><a href="<?php echo site_url('contact-us.php'); ?>" class="nav-link text-white font-weight-bold text-uppercase ">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--Header Bottom End-->
    </header>
     <!-- Booking Header End--> 
     
    <?php } else { ?>
    
    <!-- Landing Page header start-->
    <header class="header-custom fixed-top">
            <div class="container">
                    <div class="row">
                            <div class="col-sm-2 col-12">
                                    <div class="logo-bg pdng_10 mrg_t_10">
                                            <a href="<?php echo site_url(); ?>" class="d-inline-block">
                                                    <img src="images/logo.png" alt="" class="img-fluid" />
                                            </a>
                                    </div>
                            </div>
                            <div class="col-sm-10 col-12">
                                    <div class="float-right pdng_t_20 mega_menu_btn"> 
                                            <a class="btn btn-tab rounded-0  font-weight-bold scrolltoid" href="#suit-room" role="button">Suits & Room</a>
                                            <a class="btn btn-tab rounded-0 font-weight-bold scrolltoid" href="#rest-bar" role="button">Restaurant & Bar</a>
                                            <a class="btn btn-tab rounded-0 font-weight-bold scrolltoid" href="#fast-food" role="button">Fast Food Shop</a>
                                            <div class="menu-tab"> <span class="hamburgur text-white pdng_10"><i class="fas fa-bars w-100"></i></span></div>
                                    </div>
                            </div>
                    </div>
            </div>
    </header>
    <!-- Landing Page header end -->
    
    <?php }  