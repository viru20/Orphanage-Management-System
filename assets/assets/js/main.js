(function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

})(jQuery);

$('#btnreg').click(function (event) {
      
        if(Form_Validate('frmreg')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmreg')[0];
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


                     if(result == "false")
                     {
                       $('#wrn_msg').text('Please enter valid detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else if(result == "username")
                     {
                       $('#wrn_msg').text('Username is already taken!');
                       $("#wrn_msg").css("color", "red"); 
                     }

                      else if(result == "rpass")
                     {
                       $('#wrn_msg').text('Password not match!');
                       $("#wrn_msg").css("color", "red"); 
                     }

                     else if(result == "agree")
                     {
                       $('#wrn_msg').text('Please Agree Terms and Conditions!');
                       $("#wrn_msg").css("color", "red");
                     }

                     else
                     {
                        //window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         $('#success_msg').text('Your account is created successfully.');
                         $("#success_msg").css("color", "#03b507");
                         //$('#contactForm')[0].reset();
                         $('#frmreg').trigger("reset");
                         
                     }
                        
                 }
             });
        }
         
    });

$('#btnlogin').click(function (event) {
      
        if(Form_Validate('frmlogin')) 
        {
            $('#wrn_msg').text('');
            $('#success_msg').text('');
            
             var form = $('#frmlogin')[0];
              var formdata = new FormData(form);
              
             $.ajax({
                 url: 'process',
                 type: 'POST',
                 data: formdata,
                 processData: false,
                 contentType: false,
                 success: function (result) {
                    
                    // alert(result);
                    //  console.log(result);
                    //  return false;


                     if(result == "false")
                     {
                       $('#wrn_msg').text('Please enter valid detail!');
                       $("#wrn_msg").css("color", "red"); 
                     }
                     else if(result == "invalid")
                     {
                       $('#wrn_msg').text('Username or Password is invalid!');
                       $("#wrn_msg").css("color", "red"); 
                     }

                     else
                     {
                        window.location = "http://localhost/projects/orphanage/";
                        // window.location.href = baseUrl+'/thank-you';
                        //total_cnt($('#qty_inq').val());
                         //$('#contactForm')[0].reset();

                         $('#frmlogin').trigger("reset");
                         
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
                    $('#wrn_msg').html('Please enter valid number!');
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

