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
                        <form action="" method="POST">
                            <label>Old Password</label><br>
                            <input type="text" name="old_password" class="form-control"><br>

                            <label>New Password</label><br>
                            <input type="text" name="new_password" class="form-control"><br>

                            <label>Re-type New Password</label><br>
                            <input type="text" name="retype_password" class="form-control"><br>

                            <input type="submit" name="submit" value="Change Password" class="btn btn-default">
                        </form><br><br>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Notify my email when someone responds to my thread</h4><br>
                        {!! Form::model($user, ['method'=> 'PATCH', 'action'=>['SettingsController@update', $user->id]]) !!}

                            {!! csrf_field() !!}

                            {!! Form::label('notifyEmail', 'Notify Me') !!}
                            {!! Form::radio('notifyEmail', 'yes', null, ['class'=>'']) !!}<br>

                            {!! Form::label('notifyEmail', 'No Dont') !!}
                            {!! Form::radio('notifyEmail', 'no', null, ['class'=>'']) !!}

                            {!! Form::submit('Done', ['class'=>'btn btn-default', 'id'=>'settings_done']) !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h4>Change my on-file email</h4>
                        <p>This email is used to notify you of thread responses and any
                        changes your account may encounter</p><br>

                        <form action="" method="POST">
                            <label>Old email</label><br>
                            <input type="text" name="old_email" class="form-control"><br>

                            <label>New email</label><br>
                            <input type="text" name="new_email" class="form-control"><br>

                            <input type="submit" name="email_submit" value="Change Email" class="btn btn-default">
                        </form><br><br>


                    </div>
                </div>
            </div>
        </section>
        <!--CUSTOM SETTINGS PAGE-->


@include('includes.settings_footer')

</body>
</html>

@else
    @include('includes.error')
@endif
