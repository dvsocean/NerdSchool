<?php use App\User; ?>
@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>{{ucfirst(Auth::user()->name)}}'s profile</title>
    <meta name="_token" content="{{ csrf_token() }}" />
    <!--HEADER-->
    @include('includes.header')
    <!--HEADER-->

    <!--GOOGLE CHART API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--GOOGLE CHART API-->
    <style>
        .well {
            text-align: left;
            list-style-type: none;;
        }

        a:link {
            text-decoration: none;
        }

        .control-box {
            padding-right: 10px;
        }
    </style>
</head>


<body>
<?php
$user= Auth::user();
$review=\App\Review::all();
?>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- NAVR BAR -->
    @include('includes.navbar')
    <!-- NAVR BAR -->

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">

<!--MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION -->
                    <h1>{{$user->name}}'s Profile</h1><br>
                    @if (Session::has('message'))
                      <div class="alert alert-info text-center">{{ Session::get('message') }}</div><br>
                    @endif


                    <div id="test"></div>
                        <br><br>
                        <img src="{{$user->photo ? $user->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="200" width="200" class="img-circle"><br><br>

                    {!! Form::model($user, ['method'=> 'PATCH', 'action'=>['NerdController@update', $user->id], 'files'=> true]) !!}

                      <br><br>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" align="left">
                            <strong><p>Update profile photo</p></strong>
                            {!! Form::file('photo_id', ['id'=>'user_photo'], ['class'=>'form-control']) !!}<br><br>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            @if(Auth::user()->admin == 'yes')
                                <button type="button" id="adminButton" class="button" data-toggle="modal" data-target=".bs-example-modal-lg">Administrator</button><br><br>
                                @if(!count($review) < 1)
                                    <a href="{{url('/review')}}" class="button">Review files</a><br><br>
                                @endif
                            @endif
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <button type="button" class="button" data-toggle="modal" data-target=".stats">Control Panel</button><br><br>
                        </div>
                    </div>

                    <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Name:</label><br>
                          {!! Form::text('name', null, ['class'=>'', 'placeholder'=>'Name']) !!}
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Email:</label><br>
                          {!! Form::text('email', null, ['class'=>'checkEmail', 'placeholder'=>'Email']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>School:</label><br>
                          {!! Form::text('school', null, ['class'=>'', 'placeholder'=>'School your affiliated with']) !!}
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Major:</label><br>
                          {!! Form::text('major', null, ['class'=>'', 'placeholder'=>'Major your want']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Goal:</label><br>
                          {!! Form::text('goal', null, ['class'=>'', 'placeholder'=>'Goal you want to achieve']) !!}
                            <br><br>
                            <p>
                                Uploading a profile picture provides the rest of
                                us with the ability to see who you are. Every time
                                you add a comment or create a discussion, your image
                                gets included. Or, you can use the GIF format to
                                exaggerate it a bit.<br><br>
                            </p>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>About me:</label><br>
                            {!! Form::textarea('interest', null, ['class'=>'', 'placeholder'=>'Describe yourself']) !!}<br><br>
                        </div>
                      </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <!--PLACEHOLDER-->
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <!--PLACEHOLDER-->
                            </div>
                        </div>


                    <div class="row" align="right">
                        <div class="col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-4">
                            {!! Form::submit('Update Profile', ['class'=>'update_profile']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </header>
                <span class="image main"><!--PLACEHOLDER--></span>
            </div>
        </section>
    </div>
<!--MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION -->



<!-- START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA -->
    <br><br>
    <br><br>
    @include('includes.start_a_discussion_form')
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
<!-- START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA -->


<!--X-TOKEN-->
@include('includes.x-token')
<!--X-TOKEN-->

<!--DATABASE MODAL-->
@include('includes.database_modal')
<!--DATABASE MODAL-->

<!--CHARTS API JS-->
@include('includes.charts_api_js')
<!--CHARTS API JS-->

<!--CHARTS MODAL-->
@include('includes.charts_modal')
<!--CHARTS MODAL-->

<!--JAVASCRIPT FILE-->
@include('includes.validation_and_deletes')
<!--JAVASCRIPT FILE-->

@include('includes.footer')

</body>
</html>

@else
    @include('includes.error')
@endif
