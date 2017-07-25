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
                            <h3 align="center">Upload and share your project</h3>
                            <br><br>
                            <br><br>

                            @if (Session::has('file_exists'))
                                <div class="alert alert-danger text-center">{{ Session::get('file_exists') }}</div><br>
                            @endif
                        </div>
                    </div>

                    @if(!Auth::user()->reviewed)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <form action="{{url('/server')}}" id="my-awesome-dropzone" method="POST" class="dropzone">
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h5>Your files will be reviewed within 24 hours. We will notify you upon completion at
                                <strong>{{Auth::user()->email}}</strong>. You can then view your project by clicking the
                                "Nerd Server" button.
                            </h5>
                        </div>
                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <a href="{{url('/profile')}}" class="button">PROFILE</a>
                        </div>

                        <div class="col-xs-6 col-md-6" align="right">
                            <a href="{{url('/nerdserver')}}" class="button special">NERD SERVER</a>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <form action="{{url('/server')}}" id="my-awesome-dropzone" method="POST" class="dropzone">
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <a href="{{url('/profile')}}" class="button">PROFILE</a>
                        </div>

                        <div class="col-xs-6 col-md-6" align="right">
                            <a href="{{url('/nerdserver')}}" class="button special">NERD SERVER</a>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h5><strong>Note: </strong> We accept .js .css .html .jpg .jpeg .png,
                                duplicate file names will not be uploaded.
                            </h5>
                        </div>
                    </div>
                    @endif
                </div>
            </section>

        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br><br>


    @include('includes.footer')

    </body>
    </html>

    @else
        @include('includes.verify_error')
    @endif
@else
    @include('includes.error')
@endif
