<?php include 'header.php'; ?>
<?php 

$message = '';

if(isset($_POST['contact_submit'])) {

    // Users Data From The Contact Form 
    $customer_name          = htmlspecialchars(stripslashes(trim($_POST['customer_name'])));
    $customer_email         = htmlspecialchars(stripslashes(trim($_POST['customer_email'])));
    $customer_number        = htmlspecialchars(stripslashes(trim($_POST['customer_number'])));
    $customer_message       = htmlspecialchars(stripslashes(trim($_POST['customer_message'])));

    // Validate Email
    if (filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
    
        $mailto = 'shrikant.webllisto@gmail.com';
        $mailcc = 'weblistoanil@gmail.com';
        $subject = 'Contact Form Message By '.$customer_name;

        // HTML Content Type  
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";  

        // Header
        $headers = "From: $customer_email" . "\r\n" ."CC: $mailcc"; 

      $html_message = '
      <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */
        
        /*All the styling goes here*/
        
        img {
          border: none;
          -ms-interpolation-mode: bicubic;
          max-width: 100%; 
        }
        body {
          background-color: #f6f6f6;
          font-family: sans-serif;
          -webkit-font-smoothing: antialiased;
          font-size: 14px;
          line-height: 1.4;
          margin: 0;
          padding: 0;
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%; 
        }
        table {
          border-collapse: separate;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          width: 100%; }
          table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; 
        }
        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
        .body {
          background-color: #f6f6f6;
          width: 100%; 
        }
        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
          display: block;
          margin: 0 auto !important;
          /* makes it centered */
          max-width: 580px;
          padding: 10px;
          width: 580px; 
        }
        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
          box-sizing: border-box;
          display: block;
          margin: 0 auto;
          max-width: 580px;
          padding: 10px; 
        }
        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
          background: #ffffff;
          border-radius: 3px;
          width: 100%; 
        }
        .wrapper {
          box-sizing: border-box;
          padding: 20px; 
        }
        .content-block {
          padding-bottom: 10px;
          padding-top: 10px;
        }
        .footer {
          clear: both;
          margin-top: 10px;
          text-align: center;
          width: 100%; 
        }
          .footer td,
          .footer p,
          .footer span,
          .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center; 
        }
        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
          color: #000000;
          font-family: sans-serif;
          font-weight: 400;
          line-height: 1.4;
          margin: 0;
          margin-bottom: 30px; 
        }
        h1 {
          font-size: 35px;
          font-weight: 300;
          text-align: center;
          text-transform: capitalize; 
        }
        p,
        ul,
        ol {
          font-family: sans-serif;
          font-size: 14px;
          font-weight: normal;
          margin: 0;
          margin-bottom: 15px; 
        }
          p li,
          ul li,
          ol li {
            list-style-position: inside;
            margin-left: 5px; 
        }
        a {
          color: #3498db;
          text-decoration: underline; 
        }
        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
          box-sizing: border-box;
          width: 100%; }
          .btn > tbody > tr > td {
            padding-bottom: 15px; }
          .btn table {
            width: auto; 
        }
          .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center; 
        }
          .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize; 
        }
        .btn-primary table td {
          background-color: #3498db; 
        }
        .btn-primary a {
          background-color: #3498db;
          border-color: #3498db;
          color: #ffffff; 
        }
        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
          margin-bottom: 0; 
        }
        .first {
          margin-top: 0; 
        }
        .align-center {
          text-align: center; 
        }
        .align-right {
          text-align: right; 
        }
        .align-left {
          text-align: left; 
        }
        .clear {
          clear: both; 
        }
        .mt0 {
          margin-top: 0; 
        }
        .mb0 {
          margin-bottom: 0; 
        }
        .preheader {
          color: transparent;
          display: none;
          height: 0;
          max-height: 0;
          max-width: 0;
          opacity: 0;
          overflow: hidden;
          mso-hide: all;
          visibility: hidden;
          width: 0; 
        }
        .powered-by a {
          text-decoration: none; 
        }
        hr {
          border: 0;
          border-bottom: 1px solid #f6f6f6;
          margin: 20px 0; 
        }
        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
          table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important; 
          }
          table[class=body] p,
          table[class=body] ul,
          table[class=body] ol,
          table[class=body] td,
          table[class=body] span,
          table[class=body] a {
            font-size: 16px !important; 
          }
          table[class=body] .wrapper,
          table[class=body] .article {
            padding: 10px !important; 
          }
          table[class=body] .content {
            padding: 0 !important; 
          }
          table[class=body] .container {
            padding: 0 !important;
            width: 100% !important; 
          }
          table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important; 
          }
          table[class=body] .btn table {
            width: 100% !important; 
          }
          table[class=body] .btn a {
            width: 100% !important; 
          }
          table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important; 
          }
        }
        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
          .ExternalClass {
            width: 100%; 
          }
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
            line-height: 100%; 
          }
          .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important; 
          }
          .btn-primary table td:hover {
            background-color: #34495e !important; 
          }
          .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important; 
          } 
        }
      </style>

      <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
          <td>&nbsp;</td>
          <td class="container">
            <div class="content">

              <!-- START CENTERED WHITE CONTAINER -->
              <table role="presentation" class="main">

                <!-- START MAIN CONTENT AREA -->
                <tr>
                  <td class="wrapper">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <p>Hi Admin,</p> 
                          <p>You have received a mail from '.$customer_name.'</p>
                          <p><strong>Message:</strong></p>
                          <p>'.$customer_message.'</p>
                          
                          <p>Regards,<br />Crown Palace Team</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

              <!-- END MAIN CONTENT AREA -->
              </table>
              <!-- END CENTERED WHITE CONTAINER -->

              <!-- START FOOTER -->
              <div class="footer">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="content-block">
                      <span class="apple-link">Webllisto Technologies Pvt Ltd</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="content-block powered-by">
                      Powered by <a href="http://webllisto.com">Webllisto</a>.
                    </td>
                  </tr>
                </table>
              </div>
              <!-- END FOOTER -->

            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    '; 

        // send email
        $status = mail($mailto,$subject,$html_message,$headers); 

        if($status) {
            $message = "<div class='alert alert-success'>You message has been send successfully.</div>";
        } else {
            $message = "<div class='alert alert-danger'>Unable to send your mail. Please try again.</div>";
        }

    } else {
            $message = "<div class='alert alert-danger'>Invalid email address.</div>";
    }
 
}

?>
    <!--Contact Start  -->
    <section class='pdng_t_124'>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7360.446524050914!2d75.8827291!3d22.7199416!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fd3be6a104db%3A0xa027d49b6aa49c2e!2sHotel+Crown+Palace!5e0!3m2!1sen!2sin!4v1553760068431" height="450" frameborder="0" style="border:0" allowfullscreen class="w-100"></iframe>
            <div class="contact_page_card border-0 card bx_shw2 move_up_100 mx-auto pdng_40 pdng_l_30 pdng_r_30 mrg_b_40 w-100">
                <div class="row">
                    <div class="col">
                        <h3 class="contact_heading mrg_b_20 text_primary">Write to Us:</h3>
                        <form class="contact_form" action="" method="post">
                            <?php echo $message; ?> 
                            <div class="form_in form-group pb-4">
                                <label class="text-black d-none">Name<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <input type="text" class="form-control pl-0" id="name" name="customer_name" placeholder="Name" autocomplete="off" required="required">
                            </div>

                            <div class="form_in form-group pb-4">
                                <label class="text-black d-none">Email<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <input type="email" class="form-control pl-0" id="email" name="customer_email"  placeholder="Email" autocomplete="off" required="required">
                            </div>

                            <div class="form_in form-group">
                                <label class="text-black d-none">Number<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <input type="text" class="form-control pl-0" id="number" name="customer_number" placeholder="Contact Number" autocomplete="off" required="required">
                            </div>

                            <div class="form_in form-group">
                                <label class="text-black d-none">Message<span class="text-danger">*</span></label>
                                <span class="c_spans text-danger float-right">*</span>
                                <textarea placeholder="Message" class="form-control pl-0" name="customer_message" rows="5" id="message" required="required"></textarea>
                            </div>

                            <div class="btn_wr">
                                <button type="submit" name="contact_submit" class="btn text-uppercase text-white float-right agent_btn_cancel">submit</button>
                            </div>
                        </form> 
                    </div>
  
                    <div class="col">
                    
                            <h3 class="contact_heading mrg_b_20 text_primary">Contacts:</h3>
                            <?php 
                            $contact_numbers = $contactdata['numbers'];
                            if($contact_numbers) {
                            echo '<ul class="list-group list-group-flush contact_listing">';

                              foreach($contact_numbers as $c_key => $c_val) {
                                if($c_key==0) {
                                  echo '<li class="list-group-item px-0 border-top-0">'.$c_val['label'].': <span class="float-right">'.$c_val['number'].'</span></li>';
                                } else {
                                  echo '<li class="list-group-item px-0">'.$c_val['label'].': <span  class="float-right">'.$c_val['number'].'</span></li>';
                                } 
                              }

                            echo '</ul>';
                            }
                          ?>      
                            <div class="pdng_t_30">   
                                <h3 class="contact_heading mrg_b_20 text_primary">Address:</h3>
                                <p><?php echo $contactdata['address']; ?></p> 
                                  <?php 
                                    $distances = $contactdata['distance'];
                                    if($distances) {
                                    echo '<ul class="list-group list-group-flush contact_listing">';

                                      foreach($distances as $d_key => $d_val) {
                                        if($c_key==0) {
                                          echo '<li class="list-group-item px-0 border-top-0">'.$d_val['label'].': <span class="float-right font-weight-bold">'.$d_val['number'].'</span></li>';
                                        } else {
                                          echo '<li class="list-group-item px-0">'.$d_val['label'].': <span  class="float-right font-weight-bold">'.$d_val['number'].'</span></li>';
                                        } 
                                      }

                                    echo '</ul>';
                                    }
                                 ?>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Contact End -->

<?php include 'footer.php'; 


