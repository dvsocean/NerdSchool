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
                            </tr>
                            @foreach($files as $file)
                            <tr>
                                <td>
                                    <p>{{$file->id}}</p>
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
                            </tr>
                            @endforeach
                        </table>
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
@else
    @include('includes.error')
@endif