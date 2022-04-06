(function ($)
  { "use strict"
  

/* 1. Proloder */
    $(window).on('load', function () {
      $('#preloader-active').delay(450).fadeOut('slow');
      $('body').delay(450).css({
        'overflow': 'visible'
      });
    });

/* 2. sticky And Scroll UP */
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 400) {
        $(".header-sticky").removeClass("sticky-bar");
        $('#back-top').fadeOut(500);
      } else {
        $(".header-sticky").addClass("sticky-bar");
        $('#back-top').fadeIn(500);
      }
    });

  // Scroll Up
    $('#back-top a').on("click", function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  

/* 3. slick Nav */
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    };



    
/* 4. MainSlider-1 */
    // h1-hero-active
    function mainSlider() {
      var BasicSlider = $('.slider-active');
      BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
      });
      BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
      });
      BasicSlider.slick({
        autoplay: false,
        autoplaySpeed: 4000,
        dots: false,
        fade: true,
        arrows: false, 
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          }
        ]
      });

      function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
          var $this = $(this);
          var $animationDelay = $this.data('delay');
          var $animationType = 'animated ' + $this.data('animation');
          $this.css({
            'animation-delay': $animationDelay,
            '-webkit-animation-delay': $animationDelay
          });
          $this.addClass($animationType).one(animationEndEvents, function () {
            $this.removeClass($animationType);
          });
        });
      }
    }
    mainSlider();



/* 5. Testimonial Active*/
var testimonial = $('.h1-testimonial-active');
if(testimonial.length){
testimonial.slick({
    dots: true,
    infinite: true,
    speed: 1000,
    autoplay:false,
    arrows: false,
    prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
          arrow:true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          arrow:true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          arrow:true
        }
      }
    ]
  });
}

/* 6. Nice Selectorp  */
  var nice_Select = $('select');
    if(nice_Select.length){
      nice_Select.niceSelect();
    }

/* 7. data-background */
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });


/* 10. WOW active */
    new WOW().init();

// 11. ---- Mailchimp js --------//  
    function mailChimp() {
      $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();


// 12 Pop Up Img
    var popUp = $('.single_gallery_part, .img-pop-up');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'image',
          gallery:{
            enabled:true
          }
        });
      }
// 12 Pop Up Video
    var popUp = $('.popup-video');
    if(popUp.length){
      popUp.magnificPopup({
        type: 'iframe'
      });
    }

/* 13. counterUp*/
    $('.counter').counterUp({
      delay: 10,
      time: 3000
    });

/* 14. Datepicker */
  $('#datepicker1').datepicker();

// 15. Time Picker
  $('#timepicker').timepicker();

//16. Overlay
  $(".snake").snakeify({
    speed: 200
  });


//17.  Progress barfiller

  $('#bar1').barfiller();
  $('#bar2').barfiller();
  $('#bar3').barfiller();
  $('#bar4').barfiller();
  $('#bar5').barfiller();
  $('#bar6').barfiller();

})(jQuery);


/********************* Custom Js *********************************/


//------- adopt page form --------//
    $('#btnadopt').click(function (event) {
      
        if(Form_Validate('frmadopt')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmadopt')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    // alert(result);
                    // consol.log(result);
                    // return false;
                     
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your request is sent successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmadopt').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });

    function Form_Validate(id) {
        var error = 0;
        $('.invalid').removeClass('invalid');
        $('strong').html('');
        
        $("#" + id).find(".required").each(function () {
            var val = $.trim($(this).val());
            if (value == "") {
                error = 1;
                $('#wrn_msg').html('Please enter detail!');
                 $('#wrn_msg').css("color", "red")
               // $('.' + $(this).attr('id')).html(defaultLang.input_message);
                $(this).addClass('invalid');
            }
        });
        $("#" + id).find(".dropdown").each(function () {
            if ($(this).val() == "" || $(this).val() == 0) {
                error = 1;
                //$('.' + $(this).attr('id')).html(defaultLang.dropdown_message);
                $(this).addClass('invalid');
            }
        });
        $("#" + id).find(".textarea").each(function () {
            if ($(this).val() == "") {
                error = 1;
                //$('.' + $(this).attr('id')).html(defaultLang.textarea_message);
                $(this).addClass('invalid');
            }
        });
        $("#" + id).find(".integer").each(function () {
            if ($(this).val() != "") {
                var regex = /^[0-9]+$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    
                    $(this).addClass('invalid');
                }
            }
        });
        $("#" + id).find(".zipcodeval").each(function () {
            if ($(this).val() != "") {
              var regex = /^\d{6}$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    
                    $(this).addClass('invalid');
                }
            }
        });
        $("#" + id).find(".mobilenumber").each(function () {
            if ($(this).val() != "") {
              var regex = /^\d{10}$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    $('#wrn_msg').html('Please enter valid mobile no!');
                    $(this).addClass('invalid');
                    
                }
            }
        });
        $("#" + id).find(".decimal").each(function () {
            if ($(this).val() != "") {
                //var dec = /^[-+]?[0-9]+\.[0-9]+$/;
                var regex = /^\d+(\.\d{1,10})?$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    //$('.' + $(this).attr('id')).html(defaultLang.decimal_message);
                    $(this).addClass('invalid');
                } else if ($(this).attr("min")) {
                    var min = $(this).attr("min");
                    var value = $(this).val();
                    if (min != '') {
                        if (parseInt(min) > parseInt(value)) {
                            error = 1;
                           // $('.' + $(this).attr('id')).html('Please enter minimum ' + min);
                            $(this).addClass('invalid');
                        }
                    }
                } else if ($(this).attr("max")) {
                    var max = $(this).attr("max");
                    var value = $(this).val();
                    if (max != '') {
                        if (parseInt(max) < parseInt(value)) {
                            error = 1;
                           // $('.' + $(this).attr('id')).html('Please enter maximum ' + max);
                            $(this).addClass('invalid');
                        }
                    }
                }
            }
        });
        $("#" + id).find(".email_validate").each(function () {
            var input = $(this).val();
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            if(!pattern.test(input))
            {
                error = 1;
                //$('.' + $(this).attr('id')).html('invalid email address!');
                $(this).addClass('invalid');
            }
        });

        if ($("#" + id).attr("min")) {
            var min = $("#" + id).attr("min");
            var value = $("#" + id).val();
            if (min != '') {
                if (min > value) {
                    error = 1;
                    //$('.' + $(this).attr('id')).html('Please enter minimum ' + min + ' value');
                    $(this).addClass('invalid');
                }
            }
        }


        if (error == 1)
            return false;
        else
            return true;
    }



/******************************************************************/



//------- adopt page form --------//
    $('#btndonation').click(function (event) {
      
        if(Form_Validate('frmdonation')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmdonation')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    //alert(result);
                     
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your request is sent successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmdonation').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });

    function Form_Validate(id) {
        var error = 0;
        $('.invalid').removeClass('invalid');
        $('strong').html('');
        
        $("#" + id).find(".required").each(function () {
            var val = $.trim($(this).val());
            if (val == "") {
                error = 1;
                 $('#wrn_msg').html('Please enter detail!');
                 $('#wrn_msg').css("color", "red")
               // $('.' + $(this).attr('id')).html(defaultLang.input_message);
                $(this).addClass('invalid');
            }
        });
        $("#" + id).find(".dropdown").each(function () {
            if ($(this).val() == "" || $(this).val() == 0) {
                error = 1;
                //$('.' + $(this).attr('id')).html(defaultLang.dropdown_message);
                $('#wrn_msg').html('Please select children');
                $(this).addClass('invalid');
            }
        });
        $("#" + id).find(".textarea").each(function () {
            if ($(this).val() == "") {
                error = 1;
                //$('.' + $(this).attr('id')).html(defaultLang.textarea_message);
                $(this).addClass('invalid');
            }
        });
        $("#" + id).find(".integer").each(function () {
            if ($(this).val() != "") {
                var regex = /^[0-9]+$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    
                    $(this).addClass('invalid');
                }
            }
        });
        $("#" + id).find(".zipcodeval").each(function () {
            if ($(this).val() != "") {
              var regex = /^\d{6}$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    
                    $(this).addClass('invalid');
                }
            }
        });
        $("#" + id).find(".mobilenumber").each(function () {
            if ($(this).val() != "") {
              var regex = /^\d{10}$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    
                    $(this).addClass('invalid');
                }
            }
        });
        $("#" + id).find(".decimal").each(function () {
            if ($(this).val() != "") {
                //var dec = /^[-+]?[0-9]+\.[0-9]+$/;
                var regex = /^\d+(\.\d{1,10})?$/;
                var input = $(this).val();
                if (!regex.test(input)) {
                    error = 1;
                    //$('.' + $(this).attr('id')).html(defaultLang.decimal_message);
                    $(this).addClass('invalid');
                } else if ($(this).attr("min")) {
                    var min = $(this).attr("min");
                    var value = $(this).val();
                    if (min != '') {
                        if (parseInt(min) > parseInt(value)) {
                            error = 1;
                           // $('.' + $(this).attr('id')).html('Please enter minimum ' + min);
                            $(this).addClass('invalid');
                        }
                    }
                } else if ($(this).attr("max")) {
                    var max = $(this).attr("max");
                    var value = $(this).val();
                    if (max != '') {
                        if (parseInt(max) < parseInt(value)) {
                            error = 1;
                           // $('.' + $(this).attr('id')).html('Please enter maximum ' + max);
                            $(this).addClass('invalid');
                        }
                    }
                }
            }
        });
        $("#" + id).find(".email_validate").each(function () {
            var input = $(this).val();
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            if(!pattern.test(input))
            {
                error = 1;
                //$('.' + $(this).attr('id')).html('invalid email address!');
                $(this).addClass('invalid');
            }
        });

        if ($("#" + id).attr("min")) {
            var min = $("#" + id).attr("min");
            var value = $("#" + id).val();
            if (min != '') {
                if (min > value) {
                    error = 1;
                    //$('.' + $(this).attr('id')).html('Please enter minimum ' + min + ' value');
                    $(this).addClass('invalid');
                }
            }
        }


        if (error == 1)
            return false;
        else
            return true;
    }



/******************************************************************/

 $('#btnemail').click(function (event) {
      
        if(Form_Validate('frmemail')) 
        {
            $('#wrn_msg1').text('');
            $('#success_msg1').text('');
            
             var form = $('#frmemail')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    //alert(result);
                     
                     if(result=="false")
                     {
                       $('#wrn_msg1').text('Please enter valid detail!');
                       $("#wrn_msg1").css("color", "red"); 
                     }
                     else if(result == "yes")
                     {
                       $('#success_msg1').text('Your email is already sent.');
                         $("#success_msg1").css("color", "red");
                     }
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg1').text('Your email is successfully registered.');
                         $("#success_msg1").css("color", "#ccc");
                         //$('#contactForm')[0].reset();
                         $('#frmemail').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });

 /******************************************************************/
 $('#btncontact').click(function (event) {
      
        if(Form_Validate('frmcontact')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmcontact')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    //alert(result);
                     
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your request is sent successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmcontact').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });


 /******************************************************************/


 // $('#btnreg').click(function (event) {
      
 //        if(Form_Validate('frmreg')) 
 //        {
 //            $('#wrn_msg').text('');
 //            $('#success_msg').text('');
            
 //             var form = $('#frmreg')[0];
 //              var formdata = new FormData(form);
              
 //             $.ajax({
 //                 url: 'save',
 //                 type: 'POST',
 //                 data: formdata,
 //                 processData: false,
 //                 contentType: false,
 //                 success: function (result) {
                    
 //                    // alert(result);
 //                    //  console.log(result);
 //                    //  return false;


 //                     if(result == "false")
 //                     {
 //                       $('#wrn_msg').text('Please enter detail!');
 //                       $("#wrn_msg").css("color", "red"); 
 //                     }
 //                     else if(result == "username")
 //                     {
 //                       $('#wrn_msg').text('Username is already taken!');
 //                       $("#wrn_msg").css("color", "red"); 
 //                     }
 //                     else
 //                     {
 //                        //window.location.href = baseUrl+'/thank-you';
 //                        //total_cnt($('#qty_inq').val());
 //                         $('#success_msg').text('Your request is sent successfully.');
 //                         $("#success_msg").css("color", "#03b507");
 //                         //$('#contactForm')[0].reset();
 //                         $('#frmreg').trigger("reset");
                         
 //                     }
                        
 //                 }
 //             });
 //        }
         
 //    });

 /******************************************************************************/

 $('#btnvol').click(function (event) {
      
        if(Form_Validate('frmvol')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmvol')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    //alert(result);
                     
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your request is sent successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmvol').trigger("reset");
                         
                     }
                        
                 }
             });
        }
         
    });

 /****************************************************/

$('#btndonate').click(function (event) {
      
        if(Form_Validate('frmdonate')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmdonate')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    //alert(result);
                     
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your request is sent successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmdonate').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });

/*********************************************************************************/

$('#btncpass').click(function (event) {
      
        if(Form_Validate('frmcpass')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmcpass')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    //alert(result);
                     //alert(result);
                     //console.log(result);
                     //return false;
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter valid detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }

                     else if(result=="mpass")
                     {
                       $('#wrn_msg').text('Current Password not match!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     
                      else if(result=="rpass")
                     {
                       $('#wrn_msg').text('Password not match!');
                       $("#wrn_msg").css("color", "red"); 
                     }

                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your password is change successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmcpass').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });

/******************************************************************************/

$('#btnprofile').click(function (event) {
      
        if(Form_Validate('frmprofile')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmprofile')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'save',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    // alert(result);
                    //  console.log(result);
                    //  return false;
                     if(result=="false")
                     {
                       $('#wrn_msg').text('Please enter valid detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }

                     else if(result=="username")
                     {
                       $('#wrn_msg').text('Username is already taken!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     
                     else{
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your profile is updated successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmprofile').trigger("reset");
                         
                     }
                     
                     
                 }
             });
        }
         
    });