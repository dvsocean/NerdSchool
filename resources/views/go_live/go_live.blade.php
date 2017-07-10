@if(Auth::user()->accepted_by)
<!DOCTYPE HTML>
<html>
<head>
    <title>Upload Files</title>
    @include('includes.header')
    <script src="dropzone/dropzone.js"></script>
    <link type="text/css" rel="stylesheet" href="dropzone/dropzone.css">
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

<!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->



        <!-- Main -->
        <section id="main" class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <br><br>
                        <h3>How your project will look when it goes live</h3>
                        <br><br>
                        <br><br>


                        <form action="{{url('/server')}}" id="my-awesome-dropzone" method="POST" class="dropzone">
                            {{csrf_field()}}
                        </form>
                        <br><br>
                        <a href="{{url('/profile')}}" class="btn btn-default">DONE</a>
                        <br><br>
                        <h4>Your files will be reviewed within 24 hours. We will notify you upon completion at
                            <strong>{{Auth::user()->email}}</strong></h4>
                    </div>
                </div>
            </div>
        </section>

    <br><br>
    <br><br>
    <br><br>
    <br><br>

@include('includes.footer')
</body>
</html>

@else
    @include('includes.verify_error')
@endif