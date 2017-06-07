@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>Settings</title>
    <!--HEADER-->
    @include('includes.settings_header')
    <!--HEADER-->
</head>
<body>
<?php $user= Auth::user(); ?>

<div class="container-fluid custom_container">
    <h1>SETTINGS</h1>
    <img src="images/gears.png" class="img-responsive" height="100" width="100" id="gears">
</div>

<br><br>
        <!--CUSTOM SETTINGS PAGE-->
        <script>
            $(function(){
                //Declarations
                var old_password= $('#old_password');
                var new_password= $('#new_password');
                var submitButton= $('#submitButton');
                var old_password_confirm= $('#old_password_confirm');
                var old_password_error= $('#old_password_error');
                var empty_field_error= $('#empty_field_error');
                var password_match_error= $('#password_match_error');

                //Automatically disable submit button
                submitButton.prop('disabled', true);

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
                                submitButton.prop('disabled', false);
                            } else {
                                $('#old_password').focus();
                                old_password_error.html("<div class='alert alert-danger text-center'>NOT YOUR ORIGINAL PASSWORD</div>");
                                old_password_error.delay(5000).fadeOut('slow');
                                submitButton.prop('disabled', true);

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
            });
        </script>

        <section id="main" class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Change your password</h4><br>
                        <form action="{{url('change_password')}}" method="POST" id="passwordForm">
                            {{csrf_field()}}

                            <div id="old_password_confirm"></div>
                            <div id="old_password_error"></div>
                            <div id="empty_field_error"></div>
                            <div id="password_match_error"></div>

                            <label>Old Password</label><br>
                            <input type="password" name="old_password" class="form-control" id="old_password"><br>

                            <label>New Password</label><br>
                            <input type="password" name="new_password" class="form-control" id="new_password"><br>

                            <label>Re-type New Password</label><br>
                            <input type="password" name="retype_password" class="form-control" id="retype_password"><br>

                            <input type="hidden" name="user_id" value="{{$user->id}}" id="user_id">

                            <input type="submit" value="Change Password" class="btn btn-default" id="submitButton">
                        </form><br><br>
                    </div>

                    <script>
                        $(function(){
                           $('#notifyEmailForm').change(function(){
                               $('#notifyEmailForm').submit();
                           });
                        });
                    </script>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Notify my email when someone responds to my thread</h4><br>
                        {!! Form::model($user, ['method'=> 'PATCH', 'action'=>['SettingsController@update', $user->id], 'id'=>'notifyEmailForm']) !!}

                            {!! csrf_field() !!}

                            {!! Form::label('notifyEmail', 'Notify Me') !!}
                            {!! Form::radio('notifyEmail', 'yes', null, ['class'=>'']) !!}<br>

                            {!! Form::label('notifyEmail', 'No Dont') !!}
                            {!! Form::radio('notifyEmail', 'no', null, ['class'=>'']) !!}

                            {{--{!! Form::submit('Done', ['class'=>'btn btn-default', 'id'=>'settings_done']) !!}--}}
                        {!! Form::close() !!}<br><br>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Change my on-file email</h4>
                        <p>This email is used to notify you of thread responses and other
                        changes to your account</p><br>

                        <script>
                            $(function(){

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
                                           } else {
                                               $('#return_message').html("<div class='alert alert-danger text-center'>EMAIL ADDRESS NOT VALID!</div>");
                                               $('#return_message').delay(3000).fadeOut('slow');
                                               $('#old_email').focus();
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
                        </script>
                        <div id="return_message"></div>
                        <div id="return_matching"></div>

                        <form action="{{url('/updateEmail')}}" method="POST" id="change_email_form">
                            {!! csrf_field() !!}
                            <label>Old email</label><br>
                            <input type="text" name="old_email" class="form-control" id="old_email"><br>

                            <label>New email</label><br>
                            <input type="email" name="new_email" class="form-control" id="new_email"><br>
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <input type="submit" value="Change Email" class="btn btn-default">
                        </form><br><br>
                    </div>
                </div>

                <br><br>

                <div class="row" align="right">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <!--PLACEHOLDER-->
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <!--PLACEHOLDER-->
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <a href="{{route('profile')}}" class="btn btn-default">Done</a>
                    </div>
                </div>
            </div>

            <br><br><br>
        </section>
        <!--CUSTOM SETTINGS PAGE-->


@include('includes.settings_footer')

</body>
</html>

@else
    @include('includes.error')
@endif
