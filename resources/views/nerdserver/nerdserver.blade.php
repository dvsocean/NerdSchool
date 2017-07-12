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
    <?php $files= \App\Nerdserver::where('user_id', Auth::user()->id)->get(); ?>


        <!-- Main -->
        <section id="main" class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h1>NERDSERVER</h1>

                        <table>
                            <tr>
                                <td>
                                    <p>ID</p>
                                </td>

                                <td>
                                    <p>File</p>
                                </td>

                                <td>
                                    <p>Size</p>
                                </td>

                                <td>
                                    <p>Type</p>
                                </td>

                                <td>
                                    <p>Action</p>
                                </td>
                            </tr>
                            @foreach($files as $file)

                            <tr>
                                <td>
                                    <a href="nerd_server_files/{{$file->file}}">{{$file->id}}</a>
                                </td>

                                <td>
                                    <p>{{$file->file}}</p>
                                </td>

                                <td>
                                    <p>{{$file->file_size}} KB</p>
                                </td>

                                <td>
                                    <p>{{$file->type}}</p>
                                </td>

                                <td>
                                    <a href="{{url('/delete_from_nerd_server', ['id'=> $file->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">

                        <a href="" class="btn btn-default">GO LIVE</a>
                    </div>

                    <div class="col-xs-12 col-md-6" align="right">
                        <a href="{{url('/live')}}" class="btn btn-default">ADD MORE</a>
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