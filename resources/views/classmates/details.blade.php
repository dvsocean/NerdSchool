<?php use App\User; ?>
@if(Auth::user())
<!DOCTYPE HTML>

<html>
<head>
    <title>Details</title>
    <!--HEADER-->
@include('includes.header')
<!--HEADER-->
    <?php $user= User::findOrFail($id); ?>
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="">
                <div class="container">
                    <div class="row" align="center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1>{{$user->name}}'s Page</h1><br>
                        </div>
                    </div>

                    <div class="row" align="center">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4">
                            <img src="../{{$user->photo ? $user->photo->file : 'PLACEHOLDER/avatar.JPG'}}" class="img-responsive img-rounded"><br>
                        </div>

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
                            <a href="javascript:history.back()" class="btn btn-default">GO BACK</a><br><br>
                        </div>
                    </div>

                    <div class="row" align="center">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <h5>Email: <a href="mailto:{{$user->email}}">{{$user->email}}</a></h5><br>
                            <h5>School: {{$user->school}}</h5><br>
                            <h5>Major: {{$user->major}}</h5><br>
                            <h5>Goal: {{$user->goal}}</h5><br>
                            <h5>About me: </h5>
                            <p>{{$user->interest}}</p>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <!--PLACEHOLDER-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@include('includes.footer')

</body>
</html>

@else
    @include('includes.error')
@endif
