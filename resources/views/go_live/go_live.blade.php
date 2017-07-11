@if(Auth::user())
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
                            <h3 align="center">Upload files and see how your project will look when it goes live</h3>
                            <br><br>
                            <br><br>


                            <form action="{{url('/server')}}" id="my-awesome-dropzone" method="POST" class="dropzone">
                                {{csrf_field()}}
                            </form>
                            <br><br>
                            <a href="{{url('/profile')}}" class="btn btn-default">DONE</a>
                            <br><br>
                            <h5>Your files will be reviewed within 24 hours. We will notify you upon completion at
                                <strong>{{Auth::user()->email}}</strong></h5>
                            <br><br>
                            <h5>You can view your project by clicking the "Nerd Server" button on your profile page</h5>
                        </div>
                    </div>
                </div>
            </section>

        <br><br>

    @include('includes.footer')

    </body>
    </html>

    @else
        @include('includes.verify_error')
    @endif
@else
    @include('includes.error')
@endif
