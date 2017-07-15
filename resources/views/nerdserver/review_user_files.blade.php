@if(Auth::user())
    @if(Auth::user()->admin)
            <!DOCTYPE HTML>
    <html>
    <head>
        <title>Admin-Review Files</title>
        @include('includes.header')
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
                        <h1>Review files for..</h1>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <a href="" class="btn btn-default">PLACEHOLDER</a>
                    </div>

                    <div class="col-xs-12 col-md-6" align="right">
                        <a href="" class="btn btn-default">PLACEHOLDER</a>
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


