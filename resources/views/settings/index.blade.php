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
        <section id="main" class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Change your password</h4><br>
                        <form action="" method="">
                            <label>Old Password</label><br>
                            <input type="text" name="old_password" class="form-control"><br>

                            <label>New Password</label><br>
                            <input type="text" name="new_password" class="form-control"><br>

                            <label>Re-type New Password</label><br>
                            <input type="text" name="retype_password" class="form-control"><br>

                            <input type="submit" name="submit" value="Change Password" class="btn btn-default">
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
                                               $('#return_message').html("<div class='alert alert-danger text-center'>NOT YOUR EMAIL ADDRESS</div>");
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
