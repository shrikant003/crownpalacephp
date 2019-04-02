    
    <!--Footer Code Start-->
    <footer class="footer_design1 text-white bottom_header">

        <!--Footer Navigation-->
        <div class="container"> 
            <div class="row"> 
                <div class="col">
                    <p class="pdng_y_10 m-0"><a class="text-white d-inline-block tdn" href="<?php echo site_url('/reservation-and-cancellation-policy.php'); ?>">Reservation and Cancellation Policy </a></p>
                </div>
                <div class="col">  
                    <p class="pdng_y_10 m-0 text-center">&copy; Copyright <?php echo date('Y'); ?> All Right Reserved.</p>
                </div>  
                <div class="col">
                    <p class="pdng_y_10 m-0 text-right">Developed By: <a class="d-inline-block text-white tdn" href="http://webllisto.com" target="_blank">Webllisto Technologies Pvt Ltd</a> </p>
                </div>
            </div>
        </div>

    </footer>
    <!--Footer Code End-->

    <!--Main JQuery File-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!--Fontawesome File-->
    <script type="text/javascript" src="js/all.min.js"></script>
    
    <!--Popper JS file-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    
    <!--Bootstrap File-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <!-- slick slider js -->
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    
    <!--Custom Script-->
    <script type="text/javascript" src="js/custom.js"></script>

    <!--Custom JS-->
    <script type="text/javascript">
        $(window).on("scroll", function() {
            if($(window).scrollTop() > 400) {
                $(".main_header").addClass("active");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
                $(".main_header").removeClass("active");
            }
        });
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
        } else {
        document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
        }
        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("stepForm").submit();
        return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }
        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
        }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }
        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
        }
    </script>


</body>
</html>