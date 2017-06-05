<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
<html>
<head>
    <title>Nerdschool</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->

    <!--WEBPACK-->
    <link rel="stylesheet" href="{{asset('css/stylesmix.css')}}">
    <!--WEBPACK-->

</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

@include('includes.navbar')

    <!-- Banner -->
    <!--
        Note: If you'd like to use a video as your banner background, set the "data-video" attribute below
        to the full filename of your video, but *exclude* the file extension. The template will automatically
        generate a multi-format* <video> tag on platforms that support background videos, and simply skip the
        step on those that don't (falling back on whatever you've set as the background image).

        * Your video must be offered in both .mp4 and .webm formats to work everywhere.
    -->
    <section id="banner" data-video="">
        <div class="inner">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <img src="images/NerdSchool-package.png" class="img-responsive">
                        </div>
                    </div>
                </div>
                <p>
                    Does technology give you a headache yet<br>
                    you love it? Or maybe you have a simple<br>
                    question regarding the molecular structure of<br>
                    compounds used for....ok ok thats a lot of<br>
                    nerd talk we get it. So, log in and ask a <br>
                    nerd yourself.
                </p>
            </header>
            @if(Auth::user())
                <h3>Welcome {{Auth::user()->name}}</h3>
            @else
                <ul class="actions">
                    <li><a href="/login" class="button special big">Login</a></li>
                    <li><a href="/register" class="button special big">Signup</a></li>
                </ul>
            @endif
        </div>
        <a href="#one" class="more">Learn More</a>
    </section>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- One -->
        <section id="one" class="main">
            <div class="inner spotlight style1">
                <div class="content">
                    <header>
                        <h2>We can help you learn!</h2>
                    </header>
                    <p>
                        The goal is to provide an accelerated learning environment
                        by allowing you to communicate with others who are learning
                        the same material. You may ask questions, you can also upload
                        and download files if you need. The developer of nerdschool is
                        automatically notified of all discussions so, if your question
                        goes unanswered he himself will help you. All you have to
                        do is take the first step and put your problem out there.
                    </p>
                </div>
                <!--
                    Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
                    320x340 or at least the same aspect ratio (16:17).
                -->
                <span class="image"><img src="images/pencil.jpg" alt="" /></span>
            </div>
        </section>

        <!-- Two -->
        <section id="two" class="main">
            <div class="inner spotlight alt style2">
                <div class="content">
                    <header>
                        <h2 style="padding-left: 25px;">Focus is on web technologies!</h2>
                    </header>
                    <p style="padding-left: 25px;">
                        MVC Frameworks<br>
                        Controllers, Models, Views<br>
                        PHP, Javascript and OOP code in general<br>
                        Making your project live<br>
                        Compiling with Gulp or Webpack<br>
                        Installing the LAMP stack<br>
                        Using VCS to protect your code<br>
                        Managing your database<br>
                    </p>
                </div>
                <!--
                    Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
                    320x340 or at least the same aspect ratio (16:17).
                -->
                <span class="image"><img src="images/keys.jpg" alt="" /></span>
            </div>
        </section>

        <!-- Three -->
        <section id="three" class="main">
            <div class="inner spotlight style3">
                <div class="content">
                    <header>
                        <h2>Databases</h2>
                    </header>
                    <p>
                        Telling a database what to do is really
                        easy and incorporating a database into your
                        project can be useful in many ways. For example,
                        Laravel has an amazing feature that takes advantage
                        of the database and creates a notification system.
                        Another great feature is the user authentication
                        functionality which utilizes the database and turns
                        management into a breeze. Also learn about security
                        and middleware or other features that are built into
                        most MVC frameworks. Either way a database is an essential
                        part of the web so learn how to use it and be more powerful.
                    </p>
                </div>
                <!--
                    Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
                    320x340 or at least the same aspect ratio (16:17).
                -->
                <span class="image"><img src="images/dataKey.jpg" alt="" /></span>
            </div>
        </section>

        <!-- Four -->
        <section id="four" class="main special">
            <div class="inner">
                <header>
                    <h2>HTML/CSS/JS</h2>
                </header>
                <div class="features">
                    <section>
                        <span class="icon major fa fa-file-code-o"></span>
                        <h3>HTML Page layout</h3>
                        <p>Dynamic scripts, video and data embedded into vanilla HTML</p>
                    </section>
                    <section>
                        <span class="icon major fa-laptop"></span>
                        <h3>Responsive Website</h3>
                        <p>More than just a fluid layout, elements respond to their containers</p>
                    </section>
                    <section>
                        <span class="icon major fa fa-graduation-cap"></span>
                        <h3>Pro libraries</h3>
                        <p>Laravel, jQuery, Bootstrap and more take web pages into the future</p>
                    </section>
                    <section>
                        <span class="icon major fa fa-picture-o"></span>
                        <h3>CSS or Linked CSS</h3>
                        <p>Less, Sass or CSS, compile them all into one stylesheet</p>
                    </section>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section id="cta" class="main special">
            <div class="inner">
                <p>
                    If we can help you we will, sign up for one-on-one tutoring. Provide your
                    availability and the technology you are looking to study. We can help
                    you learn PHP, Laravel, JavaScript, HTML, CSS, Jquery, MySQL, Linux,
                    Apache, the UNIX like Terminal, compilers like Gulp or Webpack and more. The
                    goal is for you to learn so tutoring is always free, all you need is the
                    desire to stare at code.
                </p>
                <ul class="actions vertical">
                    <li><a href="mailto:dvsocean@icloud.com" class="button special big">Tutor Me</a></li>
                    <!-- <li><a href="#" class="button big">Learn More</a></li> -->
                </ul>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <ul class="icons">
                <li><a href="https://github.com/dvsocean/nerdschool" class="icon alt fa-github"><span class="label">Github</span></a></li>
                <li><a href="https://www.linkedin.com/in/daniel-ocean-4ab9918a/" class="icon alt fa fa-linkedin"><span class="label">Instagram</span></a></li>
                <li><a href="mailto:dvsocean@icloud.com" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
        </div>
        <p class="copyright">&copy; Nerdschool, Walnut, CA</p>
    </footer>

</div>

<!-- Scripts -->
<script src="{{asset('js/scriptsmix.js')}}"></script>

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- BOOTSTRAP -->

</body>
</html>
