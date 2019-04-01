
<?php include 'header.php'; ?> 

    <!-- Start section1 -->
    <section class="section1 bx_shw  text-center vh-100">
        <div class="container">
            <div class="text-white pt-5 pb-5">
                <h1 class="font-weight-bold">HOTEL CROWN PALACE</h1>
                <h2>2 A Kanchan Bagh Near Geeta Bhavan Square, Indore, Madhya Pradesh, India</h2>
            </div>
            <div class="row pt-5 text-center d-block">
                <a class="btn btn-lg d-inline-block mr-1 agent_btn_login" href="#book_now_form">Book Now</a>
            </div>
        </div>
    </section>
    <!-- End section1 -->

      <!-- Step Form Start-->
    <section id="book_now_form" class="form_section text-center bg_grey pdng_tb_80">
       <div class="container">
            <h2 class="text-uppercase pdng_b_30">Follow the steps to book your room</h2>
            <form id="stepForm" action="">
                <!-- One "tab" for each step in the form: -->
                <div class="tab p-5 bg-white bx_shw2 mrg_b_30 first_form mx-auto">
                    <h3>Select Stay Dates</h3>
                    <div class="form-row"> 
                        <div class="col-12">
                            <div class="form_in form-group pb-2">
                                <label class="text-black mb-0 text-left d-block">Check In Date<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <div class="input-group">
                                    <input type="text" class="form-control pl-0" id="checkindate" value="<?php if(isset($_GET['checkin_date'])) { echo $_GET['checkin_date']; } ?>" placeholder="Check In Date" autocomplete="off" required="required">
                                    <div class="input-group-append input-group-append-trans">
                                        <label for="checkindate"><span class="input-group-text bg-transparent border-0"><i class="fas fa-calendar-alt"></i></span></label>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form_in form-group pb-2">
                                <label class="text-black mb-0 text-left d-block">Check Out Date<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <div class="input-group">
                                    <input type="text" class="form-control pl-0" id="checkoutdate" placeholder="Check Out Date" value="<?php if(isset($_GET['checkout_date'])) { echo $_GET['checkout_date']; } ?>" autocomplete="off" required="required">
                                    <div class="input-group-append input-group-append-trans">
                                        <label for="checkoutdate"><span class="input-group-text bg-transparent border-0"><i class="fas fa-calendar-alt"></i></span></label>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="form_in form-group pb-2">
                                <label class="text-black mb-0 text-left d-block">Number of Nights<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <input type="number" class="form-control pl-0" value="<?php if(isset($_GET['numberofrooms'])) { echo $_GET['numberofrooms']; } ?>"  placeholder="Number of Nights" autocomplete="off" required="required">
                            </div>    
                        </div>
                    </div>     
                </div>
                <div class="tab p-5 bg-white bx_shw2 mrg_b_30">
                    <h3>Select Rooms</h3>
                    <div class="form-row">
                        <div class="col-md-3 col-12">
                            <a href="#" class="d-block"><img src="images/p1.gif" class="img-fluid room_img"></a>
                        </div>
                        <div class="col-md-9 col-12">
                            <div class="position-relative text-left">
                                <h4>Delux Room</h4>
                                <p class="fnsz_12">Includes Complimentary Buffet Breakfast.</p>
                                <div class="pricing_details">
                                    <span class="font-weight-bold pr-2">INR</span>
                                    <span class="text-secondary room_price font-weight-bold">3000</span>
                                    <i class="text-muted">per night</i>
                                </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <label for="inputGroupSelect01">Number of Rooms</label>
                                            <div class="row">
                                                <div class="col">
                                                    <select class="select_no custom-select form-control" id="inputGroupSelect01">
                                                        <option selected>0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>  
                                                <div class="col">
                                                    <span class="mrg_t_5 d-inline-block"><i class="fas fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="inputGroupSelect02">Meal Plan</label>
                                            <select class="select_br custom-select form-control" id="inputGroupSelect02">
                                                <option selected>With Breakfast</option>
                                                <option value="1">Breakfast, Lunch or Dinner</option>
                                            </select>
                                        </div>
                                       <div class="col-12 col-md-2 text-right">
                                           <a class="mrg_t_36 d-inline-block" href="#">Room Details</a>
                                       </div>
                                   </div>
                                    <table class="table table-striped mrg_t_20 text-center table-sm">
                                      <thead>
                                        <tr>
                                          <th scope="col">Room</th>
                                          <th scope="col">Adults</th>
                                          <th scope="col">Child <span class="text-muted fnsz_12">(Age 5-12 yrs)</span></th>
                                          <th scope="col">Child <span class="text-muted fnsz_12">(Age 5-12 yrs)</span></th>
                                          <th scope="col">Room Price <span class="text-muted fnsz_12">(Age 5-12 yrs)</span></th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>1</td>
                                          <td>2</td>
                                          <td>3</td>
                                          <td>2</td>
                                          <td class='text-left'><b>INR</b> 1000</td>  
                                          <td><a href='#' class='text-danger fnsz_18_18 tdn'>&times;</a></td>
                                        </tr>
                                        <tr>
                                          <td>1</td>
                                          <td>2</td>
                                          <td>3</td>
                                          <td>2</td>
                                          <td class='text-left'><b>INR</b> 1000</td>  
                                          <td><a href='#' class='text-danger fnsz_18_18 tdn'>&times;</a></td>
                                        </tr>
                                        <tr>
                                          <td>1</td>
                                          <td>2</td>
                                          <td>3</td>
                                          <td>2</td>
                                          <td class='text-left'><b>INR</b> 3000</td>  
                                          <td><a href='#' class='text-danger fnsz_18_18 tdn'>&times;</a></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                <a class="btn btn-sm d-inline-block mr-1 agent_btn_login" href="#book_now_form">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab p-5 bg-white bx_shw2 mrg_b_30">
                    <h3>Enter Guest Details</h3>
                    <div class="row">
                        <div class="col">
                            <div class="form_in form-group pb-2">
                                <label class="text-black mb-0 d-none">First Name<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <input type="text" class="form-control pl-0"  placeholder="First Name" autocomplete="off" required="required">
                            </div>
                        </div>
                         <div class="col">
                            <div class="form_in form-group pb-2">
                               <label class="text-black mb-0 d-none">Last Name<span class="text-danger">*</span></label>
                               <span class="c_spans text-danger float-right">*</span> 
                               <input type="text" class="form-control pl-0"  placeholder="Last Name" autocomplete="off" required="required">
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form_in form-group pb-2">
                               <label class="text-black mb-0 d-none">Email<span class="text-danger">*</span></label>
                               <span class="c_spans text-danger float-right">*</span>
                               <input type="email" class="form-control pl-0"  placeholder="Email" autocomplete="off" required="required">
                            </div>
                        </div>
                         <div class="col">
                            <div class="form_in form-group pb-2">
                               <label class="text-black mb-0 d-none">Contact Number<span class="text-danger">*</span></label>
                               <span class="c_spans text-danger float-right">*</span> 
                               <input type="text" class="form-control pl-0"  placeholder="Contact Number" autocomplete="off" required="required">
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form_in form-group pb-2">
                                <label class="text-black mb-0 d-none">City<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <input type="text" class="form-control pl-0"  placeholder="City" autocomplete="off" required="required">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form_in form-group pb-2">
                                <label class="text-black mb-0 d-none">Country<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span> 
                                <input type="text" class="form-control pl-0"  placeholder="Country" autocomplete="off" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form_in form-group pb-2">
                        <h4>Message/Special Requests to the hotel</h4>
                        <textarea placeholder="Message" class="form-control"></textarea>
                    </div>
                </div>
                <div class="tab p-5 bg-white bx_shw2 mrg_b_30">
                    <h2>Select Payment Gateway and Make Payment</h2>
                    
                </div>
                <div class="text-center">
                    <button class="btn d-inline-block mr-1 agent_btn_login" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button class="btn d-inline-block agent_btn_cancel" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
        </div>
    </section>
    <!-- Step Form End -->

      <!--Tabs Start-->
    <section class="tabs bg-white pdng_tb_80 section_shw">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-hotel-tab" data-toggle="tab" href="#nav-hotel" role="tab" aria-controls="nav-hotel" aria-selected="true">Hotel Info</a>
                            <a class="nav-item nav-link text-secondary" id="nav-facility-tab" data-toggle="tab" href="#nav-facility" role="tab" aria-controls="nav-facility" aria-selected="false">Facilities</a>
                            <a class="nav-item nav-link text-secondary" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab" aria-controls="nav-gallery" aria-selected="false">Gallery</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                        <!--Hotel Info Start-->
                        <div class="tab-pane fade show active pt-3" id="nav-hotel" role="tabpanel" aria-labelledby="nav-hotel-tab">
                            <p class="pt-3">We take immense pleasure to introduce ourselves as a 3-star facility hotel. We are well recognized by the elite of the city and a large number of companies of repute. We have 49 well-appointed Guest Rooms and Suites.We also have Banquet Halls, Conference Halls, Business center; all keeping in mind the need of todays business travelers. Also uniquely designed multi-cuisine Restaurants, In - House Bakery, Fast Food, Cocktail lounge and Bar-Be-Que to comfort your guests the way they want. Above all, a team of professionally trained staff rendering your guests with quality oriented personalized services.</p>
                            <p><span class="font-weight-bold">Location : </span>The beautifully built hotel, located in prime business and shopping area, is a comfortable 20-minutes drive from the airport and a 05-minutes drive from the railway station. Hotel is located in the center of the city on Agra-Mumbai Highway, which makes access to the hotel very convenient.</p>
                        </div>
                        <!--Hotel Info End-->

                        <!-- Facilities Start -->
                        <div class="tab-pane fade pt-3" id="nav-facility" role="tabpanel" aria-labelledby="nav-facility-tab">
                            <h4>Facilities: </h4>
                            <div class="row pt-3">
                                <div class="col">
                                    <ul class="list-group d-inline-block">
                                      <li class="list-group-item mr-2 d-inline-block border-0 w-100"><span class="mr-2"><i class="fas fa-check-circle"></i></span> Banquet</li>
                                      <li class="list-group-item mr-2 d-inline-block border-0 w-100"><span class="mr-2"><i class="fas fa-check-circle"></i></span>Meeting Facilities</li>
                                      <li class="list-group-item mr-2 d-inline-block border-0 w-100"><span class="mr-2"><i class="fas fa-check-circle"></i></span>Valet Parking</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-group d-inline-block">
                                      <li class="list-group-item d-inline-block border-0 w-100"><span class="mr-2"><i class="fas fa-check-circle"></i></span>Concierge</li>
                                      <li class="list-group-item d-inline-block border-0 w-100"><span class="mr-2"><i class="fas fa-check-circle"></i></span>Parking</li>
                                      <li class="list-group-item d-inline-block border-0 w-100"><span class="mr-2"><i class="fas fa-check-circle"></i></span>Laundry</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-group d-inline-block">
                                      <li class="list-group-item d-inline-block border-0 w-100"><span class="mr-2 d-inline-block"><i class="fas fa-check-circle"></i></span>Conference Facilities</li>
                                      <li class="list-group-item d-inline-block border-0 w-100"><span class="mr-2 d-inline-block"><i class="fas fa-check-circle"></i></span>Restaurant</li>
                                      <li class="list-group-item d-inline-block border-0 w-100"><span class="mr-2 d-inline-block"><i class="fas fa-check-circle"></i></span>Luggage Storage</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Facilities End -->

                        <!-- Gallery Start -->
                        <div class="tab-pane fade pt-3" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                            <div class="form-row pt-3">
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g1.jpg" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g2.jpg" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g3.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g4.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="w-100"></div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g5.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g6.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g7.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g8.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="w-100"></div>
                                <div class="col gallery_col">
                                    <a href="#" class="d-block mb-2"><img src="images/g9.gif" class="gallery_image img-fluid"></a>
                                </div>
                                <div class="col gallery_col">
                                </div>
                                <div class="col gallery_col">
                                </div>
                                <div class="col gallery_col">
                                </div>
                            </div>
                        </div>
                        <!--Gallery End-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tabs End -->


    
<?php include 'footer.php'; 