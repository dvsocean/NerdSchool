
@if(Auth::user())

        <!DOCTYPE HTML>
<html>
<head>
    <title>Discussions</title>
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
                <h2>This page is being prepared for the upload page functionality</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <a href="{{url('/profile')}}" class="btn btn-default">PROFILE</a>




                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <h2>Need to figure out how this will work</h2>
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