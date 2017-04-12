<!DOCTYPE HTML>
<!--
	Formula by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<html>
<head>
    <title>Nerdschool</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{asset('css/stylesmix.css')}}">
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <a href="/" class="logo"><!--PLACEHOLDER--></a>
        <nav>
            <ul>
                <li><a href="#menu">Menu</a></li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.html">Home</a></li>
            <li><a href="generic.html">Home</a></li>
            <li><a href="elements.html">Home</a></li>
        </ul>
        <ul class="actions vertical">
            @if(Auth::user())
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout {{Auth::user()->name}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li><a href="{{url('/register')}}" class="button special fit">Register</a></li>
                <li><a href="/login" class="button fit">Log In</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif

        </ul>
    </nav>

    <!-- Banner -->
    <!--
        Note: If you'd like to use a video as your banner background, set the "data-video" attribute below
        to the full filename of your video, but *exclude* the file extension. The template will automatically
        generate a multi-format* <video> tag on platforms that support background videos, and simply skip the
        step on those that don't (falling back on whatever you've set as the background image).

        * Your video must be offered in both .mp4 and .webm formats to work everywhere.
    -->
    <section id="banner" data-video="images/banner">
        <div class="inner">
            <header>
                <h1>Nerdschool</h1>
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
                        <h2>Get started now!</h2>
                    </header>
                    <p>
                        Edit migrations to edit tables<br>
                        Controllers and Models<br>
                        Linux from USB<br>
                        Uploading your project<br>
                        Compiling with Gulp<br>
                        Installing Linux<br>
                    </p>
                </div>
                <!--
                    Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
                    320x340 or at least the same aspect ratio (16:17).
                -->
                <span class="image"><img src="images/pic01.svg" alt="" /></span>
            </div>
        </section>

        <!-- Two -->
        <section id="two" class="main">
            <div class="inner spotlight alt style2">
                <div class="content">
                    <header>
                        <h2 style="padding-left: 25px;">Code that makes content beautiful</h2>
                    </header>
                    <p style="padding-left: 25px;">
                        Our goal is to provide an accelerated learning environment<br>
                        by allowing you to communicate with others who are learning<br>
                        the same material. Nerdschool provides an option to implement<br>
                        what you have learned by making your content live. You may upload<br>
                        up-to 3 pages and test your nerdy creation. Details in your account.
                    </p>
                </div>
                <!--
                    Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
                    320x340 or at least the same aspect ratio (16:17).
                -->
                <span class="image"><img src="images/pic02.svg" alt="" /></span>
            </div>
        </section>

        <!-- Three -->
        <section id="three" class="main">
            <div class="inner spotlight style3">
                <div class="content">
                    <header>
                        <h2>Web Development</h2>
                    </header>
                    <p>
                        Properly declare and assign variables using jQuery.
                        Installing and using the Charts API. When to use frames
                        (and if they should be used at all). Using version control
                        to protect your code.
                    </p>
                </div>
                <!--
                    Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
                    320x340 or at least the same aspect ratio (16:17).
                -->
                <span class="image"><img src="images/pic03.svg" alt="" /></span>
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
                        <span class="icon major fa-diamond style1"></span>
                        <h3>HTML Page layout</h3>
                        <p>...</p>
                    </section>
                    <section>
                        <span class="icon major fa-laptop style2"></span>
                        <h3>Responsive Website</h3>
                        <p>...</p>
                    </section>
                    <section>
                        <span class="icon major fa-bar-chart style3"></span>
                        <h3>React Library</h3>
                        <p>...</p>
                    </section>
                    <section>
                        <span class="icon major fa-save style4"></span>
                        <h3>CSS or Linked CSS</h3>
                        <p>...</p>
                    </section>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section id="cta" class="main special">
            <div class="inner">
                <p>
                    If we can help you we will, just let us know which email address we should respond to.
                    All Mt Sac students are encouraged to
                    open an account and further your learning by communicating with classmates.
                </p>
                <ul class="actions vertical">
                    <li><a href="{{url('/register')}}" class="button special big">Register</a></li>
                    <!-- <li><a href="#" class="button big">Learn More</a></li> -->
                </ul>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <ul class="icons">
                <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon alt fa-youtube"><span class="label">YouTube</span></a></li>
                <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
        </div>
        <p class="copyright">&copy; Untitled. All rights reserved.</p>
    </footer>

</div>

<!-- Scripts -->
<script src="{{asset('js/scriptsmix.js')}}"></script>

</body>
</html>
