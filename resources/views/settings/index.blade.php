@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>Settings</title>
    <!--HEADER-->
    @include('includes.settings_header')
    <!--HEADER-->

    <!--CUSTOM STYLE SHEET-->
    <link rel="stylesheet" href="assets/css/settings_styles.css">
    <!--CUSTOM STYLE SHEET-->

    <!--GOOGLE FONT-->
    <link href="https://fonts.googleapis.com/css?family=Modak" rel="stylesheet">
    <!--GOOGLE FONT-->
</head>
<body>
<?php $user= Auth::user(); ?>

<div class="container-fluid custom_container">
    <h1 id="heading_title">SETTINGS</h1>
    <img src="images/gears.png" class="img-responsive" height="100" width="100" id="gears">
</div>

<br><br>
        <!--CUSTOM SETTINGS PAGE-->
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

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Notify email on my thread activity</h4><br>
                        {!! Form::model($user, ['method'=> 'PATCH', 'action'=>['SettingsController@update', $user->id], 'id'=>'notifyEmailForm']) !!}

                            {!! csrf_field() !!}

                            {!! Form::label('notifyEmail', 'Notify me') !!}
                            {!! Form::radio('notifyEmail', 'yes', null, ['class'=>'']) !!}<br>

                            {!! Form::label('notifyEmail', 'No Dont') !!}
                            {!! Form::radio('notifyEmail', 'no', null, ['class'=>'']) !!}

                            <br><br>
                            <br><br>
                            <h4>Notify email on joined thread activity</h4><br>
                            {!! Form::label('notifyAdditionals', 'Notify me') !!}
                            {!! Form::radio('notifyAdditionals', 'yes', null, ['class'=>'']) !!}<br>

                            {!! Form::label('notifyAdditionals', 'No Dont') !!}
                            {!! Form::radio('notifyAdditionals', 'no', null, ['class'=>'']) !!}

                        {!! Form::close() !!}<br><br>
                    </div>


                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Change my on-file email</h4>
                        <p>This email is used to notify you of thread responses and other
                        changes to your account</p><br>

                        <div id="return_message"></div>
                        <div id="return_matching"></div>

                        <form action="{{url('/updateEmail')}}" method="POST" id="change_email_form">
                            {!! csrf_field() !!}
                            <label>Old email</label><br>
                            <input type="text" name="old_email" class="form-control" id="old_email"><br>

                            <label>New email</label><br>
                            <input type="email" name="new_email" class="form-control" id="new_email"><br>
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <input type="submit" value="Change Email" class="btn btn-default" id="changeEmailButton">
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
