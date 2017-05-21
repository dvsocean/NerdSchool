@if(Auth::user())
        <!DOCTYPE HTML>
<html>
<head>
    <title>Project</title>
    @include('includes.header')
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">
                    <h1>Project Files</h1>
                </header>

                    <div class="row" align="right">
                        <div class="col-md-12">
                            <a href="{{route('profile')}}" class="btn btn-primary">Profile</a>
                        </div>
                    </div>

                <img src="page_images/folder.png" alt="" height="100" width="90" class="center-block" />
                <br><br>

                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Discussion</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><a href="">Development</a></td>
                                <td>5.21.17</td>
                                <td>This is me now with nerdschool...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


        </section>
    </div>


@include('includes.footer')

</body>
</html>
@else
    <html>
    <head>
        <title>Unknown User!</title>
    </head>
    <body>

    <br><br>
    <br><br>

    <h3 align="center">We dont know who you are! Please create an account and login.</h3>
    </body>
    </html>
@endif