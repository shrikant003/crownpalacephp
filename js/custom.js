jQuery('document').ready(function(){
   
//    Date Picker
    jQuery('.datePicker').datepicker({
        dateFormat: "dd-M-yy",
        minDate: 0
    });
    
//    Date Picker IN
    jQuery('#checkindate').datepicker({ 
        dateFormat: "dd-M-yy",
        minDate: 0,
        onSelect: function () {
            var checkoutdate = $('#checkoutdate');
            var startDate = $(this).datepicker('getDate');
            //add 30 days to selected date
            startDate.setDate(startDate.getDate() + 30);
            var minDate = $(this).datepicker('getDate');
            var checkoutdateDate = checkoutdate.datepicker('getDate');
            //difference in days. 86400 seconds in day, 1000 ms in second
            var dateDiff = (checkoutdateDate - minDate)/(86400 * 1000);

            //checkoutdate not set or dt1 date is greater than checkoutdate date
            if (checkoutdateDate == null || dateDiff < 0) {
                    checkoutdate.datepicker('setDate', minDate);
            }
            //dt1 date is 30 days under checkoutdate date
            else if (dateDiff > 30){
                    checkoutdate.datepicker('setDate', startDate);
            }
            //sets checkoutdate maxDate to the last day of 30 days window
            checkoutdate.datepicker('option', 'maxDate', startDate);
            //first day which can be selected in checkoutdate is selected date in dt1
            checkoutdate.datepicker('option', 'minDate', minDate);
        }
    });
    
//    Date Picker Out
    jQuery('#checkoutdate').datepicker({
        dateFormat: "dd-M-yy",
        minDate: 0
    });
    
//    Search Trigger
    jQuery('.search_trigger').click(function(){
        jQuery('.search_form_design').slideToggle('slow');
    });
    
//    Slick Slider
    $('.banner-img').slick({
        autoplay:true,
        autocontrol:true,
        dots: false,
        infinite: true,
        speed: 10,
        fade:true,
        slidesToShow: 1,
        adaptiveHeight: true,
        prevArrow: false,
        nextArrow: false
    });
    
}); 