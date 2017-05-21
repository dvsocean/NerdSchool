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
                <img src="page_images/folder.png" alt="" height="100" width="90" class="center-block" />
                <p>TEXT GOES HERE</p>
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