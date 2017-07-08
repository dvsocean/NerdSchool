<?php use App\Post;
use App\User; ?>
@if(Auth::user())
        <!DOCTYPE HTML>
<html>
<head>
    <title>Verify</title>
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
                <h2>VERIFY FORM</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <h2>FILL OUT FORM TO VERIFY</h2>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <br><br>


@include('includes.footer')
</body>
</html>

@else
    @include('includes.error')
@endif