@if(Auth::user())
    <?php $user= App\User::findOrFail($id); ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>{{$user->name}}'s Project</title>
        @include('includes.header')
    </head>
    <body>

    <!-- Page Wrapper -->
    <div id="page-wrapper">

    <!--NAV BAR-->
    @include('includes.navbar')
    <!--NAV BAR-->

        <br><br>
        <br><br>

        <!-- Main -->
        <section id="main" class="main">


            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                        <img src="{{$user->photo ? '../'.$user->photo->file : '../PLACEHOLDER/avatar.JPG'}}" height="200" width="200" class="img-circle">
                        <h1>{{$user->name}}'s Project</h1><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="right">
                        @if(count($user->server) > 0)
                            @include('includes.shared_project_files')
                        @else
                            <h3 align="center">{{$user->name}} is not sharing any files</h3>
                        @endif
                        <a href="{{url('/classmates')}}" class="button">Return</a><br><br><br>
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