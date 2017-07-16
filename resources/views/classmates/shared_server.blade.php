@if(Auth::user())
    <!DOCTYPE HTML>
    <html>
    <head>
        <title></title>
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

        <?php
        $user= App\User::findOrFail($id);
        ?>
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
                        <div class="table-responsive">
                            <table class="table-hover">
                                <tr>
                                    <td>
                                        <p>File</p>
                                    </td>

                                    <td>
                                        <p>Size</p>
                                    </td>

                                    <td>
                                        <p>Type</p>
                                    </td>
                                </tr>
                                @foreach($user->server as $srvr)
                                <tr>
                                    <td>
                                        <a href="{{url($user->nerd_directory.'/'.$srvr->file)}}"><p>{{$srvr->file}}</p></a>
                                    </td>

                                    <td>
                                        <p>{{$srvr->file_size}} KB</p>
                                    </td>

                                    <td>
                                        <p>{{$srvr->type}}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <a href="{{url('/classmates')}}" class="btn btn-default">Return</a>

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