@if(Auth::user())
    @if(Auth::user()->accepted_by)
            <!DOCTYPE HTML>
    <html>
    <head>
        <title>Nerd Server</title>
        @include('includes.header')
    </head>
    <body>

    <!-- Page Wrapper -->
    <div id="page-wrapper">

    <!--NAV BAR-->
    @include('includes.navbar')
    <!--NAV BAR-->
    <?php
    $files= \App\Nerdserver::where('user_id', Auth::user()->id)->get();
    ?>

    <br><br>
    <br><br>

        <script>
            $(function(){
                $('.delete_this').click(function(e){

                    if(!confirm("You are sure you would like to remove this file?")){
                        e.preventDefault();
                    }
                });
            });
        </script>


        <!-- Main -->
        <section id="main" class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">

                        @if (Session::has('server_message'))
                            <div class="alert alert-info text-center">{{ Session::get('server_message') }}</div><br>
                        @endif

                        @if(Auth::user()->reviewed)
                           @if(count($files) > 0)
                                <h1>NERDSERVER</h1>
                                <br><br>
                                @include('includes.files_reviewed')
                           @else
                                <h3>Your server is empty</h3><br><br>
                           @endif
                        @else
                            <br><br>
                            @include('includes.not_reviewed')
                            <br><br>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <a href="{{url('/profile')}}" class="btn btn-default">PROFILE</a>
                    </div>

                    <div class="col-xs-12 col-md-6" align="right">
                        <a href="{{url('/live')}}" class="btn btn-default">ADD FILES</a>
                    </div>
                </div>
            </div>
        </section>





    @include('includes.no_links_footer')
    </body>
    </html>

    @else
        @include('includes.verify_error')
    @endif
@else
    @include('includes.error')
@endif