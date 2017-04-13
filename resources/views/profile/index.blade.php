<!DOCTYPE HTML>
<!--
	Formula by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<html>
<head>
    <title>{{Auth::user()->name}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{asset('css/stylesmix.css')}}">
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <a href="index.html" class="logo">Formula <span>by Pixelarity</span></a>
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
            <li><a href="generic.html">Generic</a></li>
            <li><a href="elements.html">Elements</a></li>
        </ul>
        <ul class="actions vertical">
            <li><a href="#" class="button special fit">Sign Up</a></li>
            <li><a href="#" class="button fit">Log In</a></li>
        </ul>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">
                    <h1>Profile</h1>
                </header>
                <span class="image main"><img src="images/pic04.jpg" alt="" /></span>

                <form method="post" action="#">
                    <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="name" id="name" value="" placeholder="Name" />
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input type="email" name="email" id="email" value="" placeholder="Email" />
                        </div>

                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="school" id="school" value="" placeholder="School" />
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input type="text" name="career" id="career" value="" placeholder="Career" />
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <div class="select-wrapper">
                                <select name="category" id="category">
                                    <option value="">College Student</option>
                                    <option value="1">Hobby/Passion</option>
                                    <option value="1">Always been tech savvy</option>
                                    <option value="1">Here to better myself</option>
                                    <option value="1">Curious</option>
                                </select>
                            </div>
                        </div>
                        <!-- Break -->
                        <div class="6u 12u$(small)">
                            <input type="checkbox" id="copy" name="copy">
                            <label for="copy">TEST</label>
                        </div>
                        <div class="6u$ 12u$(small)">
                            <input type="checkbox" id="human" name="human">
                            <label for="human">Notifications</label>
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Update" class="special" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

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

</body>
</html>