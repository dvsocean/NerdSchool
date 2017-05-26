<?php use App\Post;use App\User; ?>
@if(Auth::user())
        <!DOCTYPE HTML>
<html>
<head>
    <title>Large View</title>
    @include('includes.header')
    <?php $user= Auth::user(); ?>
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
            <div class="inner">
                <header class="major">
                    <h1><!--PLACEHOLDER--></h1>
                </header>
                <span><!--PLACEHOLDER--></span>
                <p class="text-center">
                    <!--PLACEHOLDER-->
                </p>
                <br>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        @if (Session::has('post_message'))
                            <div class="alert alert-info text-center">{{ Session::get('post_message') }}</div><br>
                        @endif
                    </div>
                </div>

                <?php $larger_img= \App\Image_post::findOrFail($id); ?>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <img src="../../post_images/{{$larger_img->post_image}}" class="img-rounded img-responsive center-block">
                    </div>
                </div>
            </div>
        </section>
    </div>


@include('includes.footer')

</body>
</html>
@else
    <html>
    <head>
        <title>Unknown User!</title>
    </head>
    <body>

    <br><br>
    <br><br>

    <h3 align="center">We dont know who you are! Please create an account and login.</h3>
    </body>
    </html>
@endif