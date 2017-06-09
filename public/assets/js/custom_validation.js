/**
 * Created by ocean on 6/7/17.
 */
$(function(){

    //Declarations
    var old_password= $('#old_password');
    var new_password= $('#new_password');
    var submitButton= $('#submitButton');
    var old_password_confirm= $('#old_password_confirm');
    var old_password_error= $('#old_password_error');
    var empty_field_error= $('#empty_field_error');
    var password_match_error= $('#password_match_error');
    var changeEmailButton= $('#changeEmailButton');

    //Automatically disable submit button on page load
    submitButton.prop('disabled', true);
    changeEmailButton.prop('disabled', true);

    //First check that the user knows his original password
    old_password.blur(function(){
        var old_password= $('#old_password').val();
        var user_id= $('#user_id').val();
        $.ajax({
            url:"/ajax_verify",
            type:"GET",
            data:{old_password: old_password, user_id: user_id},
            success: function(data){
                if(data){
                    old_password_confirm.html("<div class='alert alert-success text-center'>" + data + "</div>");
                    old_password_confirm.delay(5000).fadeOut('slow');
                    $('#changeEmailButton').prop('disabled', false);
                } else {
                    $('#old_password').focus();
                    old_password_error.html("<div class='alert alert-danger text-center'>NOT YOUR ORIGINAL PASSWORD</div>");
                    old_password_error.delay(5000).fadeOut('slow');
                }
            }
        });

        $('#passwordForm').submit(function(e){
            if($('#new_password').val() == '' || $('#retype_password').val() == ''){
                empty_field_error.html("<div class='alert alert-danger text-center'>Fields cannot be left blank</div>");
                e.preventDefault();
            }

            if($('#new_password').val() != $('#retype_password').val()){
                password_match_error.html("<div class='alert alert-danger text-center'>Your passwords do not match</div>");
                e.preventDefault();
            }
        });
    });




    //on change notify me selector
    $(function(){
        $('#notifyEmailForm').change(function(){
            $('#notifyEmailForm').submit();
        });
    });


    //Verify that email address is legit
    function validateEmail(Email) {
        var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return pattern.test(Email);
    }


    $('#old_email').blur(function(){
        var email= $(this).val();
        $.ajax({
            url:"/verifyEmail",
            method:"GET",
            data: {email:email},
            success: function(data){
                if(data){
                    $('#return_message').html("<div class='alert alert-success text-center'>" + data + "</div>");
                    changeEmailButton.prop('disabled', false);
                } else {
                    $('#return_message').html("<div class='alert alert-danger text-center'>EMAIL ADDRESS NOT VALID!</div>");
                    $('#return_message').delay(3000).fadeOut('slow');
                    $('#old_email').focus();
                    changeEmailButton.prop('disabled', true);
                }
            }
        });
    });


    $('#change_email_form').submit(function(e){
        var originalEmail= $('#old_email');
        var newEmail= $('#new_email');
        if(originalEmail.val() == '' || newEmail.val() == ''){
            $('#return_matching').html("<div class='alert alert-danger text-center'>Fields cannot be blank</div>");
            e.preventDefault();
            $('#return_matching').delay(5000).fadeOut('slow');
        }
        if(!validateEmail(newEmail.val())){
            $('#return_message').html("<div class='alert alert-danger text-center'>Your new email address is the wrong format</div>");
            e.preventDefault();
        }
    });
});