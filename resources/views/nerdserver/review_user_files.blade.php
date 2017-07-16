@if(Auth::user())
    @if(Auth::user()->admin)
            <!DOCTYPE HTML>
    <html>
    <head>
        <title>Admin-Review Files</title>
        @include('includes.header')
    </head>
    <body>
    <?php
    $reviews= \App\Review::all();
    ?>

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
                        <h1>Review files</h1>
                        <br><br>
                        <br><br>
                        @if (Session::has('allow_message'))
                            <div class="alert alert-info text-center">{{ Session::get('allow_message') }}</div><br>
                        @endif

                        @if (Session::has('reject_message'))
                            <div class="alert alert-danger text-center">{{ Session::get('reject_message') }}</div><br>
                        @endif

                        @if($reviews)
                            @include('includes.review_table_with_files')
                        @else
                            <br><br>
                            <h3>You have nothing to review...</h3>
                            <br><br>
                            <br><br>
                        @endif
                    </div>
                </div>

                <script>
                    $(function(){
                       $('.review_button').click(function(e){
                           if(!confirm("Are you sure you want to allow this file into the server!?")){
                               e.preventDefault();
                           }
                       });

                       $('.reject_button').click(function(e){
                           if(!confirm("You are deleting this file permanently, are you sure you want to continue?")){
                               e.preventDefault();
                           }
                       });

                        $('.allow_button').click(function(e){
                            if(!confirm("You are allowing this user to upload all files, including future files. Continue?")){
                                e.preventDefault();
                            }
                        });


                    });
                </script>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <a href="{{url('/profile')}}" class="btn btn-default">Profile</a>
                    </div>

                    <div class="col-xs-12 col-md-6" align="right">
                        <!--PLACEHOLDER-->
                    </div>
                </div>
            </div>
        </section>





    @include('includes.no_links_footer')
    </body>
    </html>

    @else
        @include('includes.error')
    @endif
@else
    @include('includes.error')
@endif


