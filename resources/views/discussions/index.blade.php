@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>Discussions</title>
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
                    <h1>Discussions</h1>
                </header>
                <span class="image main"><img src="page_images/discussions.png" alt="" /></span>
                <p>Join a discussion or start one. We focus on web technologies, frameworks such as Angular and
                MVC, the goal is to spend less time creating something and more time enjoying it. We'd love to have
                your input...this is the place for nerds!</p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Age</th>
                                    <th>City</th>
                                    <th>Country</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Anna</td>
                                    <td>Pitt</td>
                                    <td>35</td>
                                    <td>New York</td>
                                    <td>USA</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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