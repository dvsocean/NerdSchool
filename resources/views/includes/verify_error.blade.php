<!DOCTYPE HTML>
<html>
<head>
    <title>Verification required!</title>
    @include('includes.header')
</head>
<body>

<br><br>
<br><br>
<br><br>


<div class="container">
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-3 col-lg-4">
            <!--PLACEHOLDER-->
        </div>

        <div class="col-xs-8 col-sm-8 col-md-6 col-lg-4">
            <img src="../images/verify.png" class="img-responsive">
            <br><br>
        </div>

        <div class="col-xs-2 col-sm-2 col-md-3 col-lg-4">
            <!--PLACEHOLDER-->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-4">
            <!--PLACEHOLDER-->
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-4">
            <h4>For access to the Nerdserver you must get verified</h4>
            <br><br>
            <a href="{{url('/verify')}}" class="btn btn-success">Get verified</a>
            <a href="{{url('/profile')}}" class="button">Not now</a>
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-4">
            <!--PLACEHOLDER-->
        </div>
    </div>
</div>

<br><br><br>
@include('includes.footer')
</body>
</html>