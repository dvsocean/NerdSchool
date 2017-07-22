<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Us</title>
    @include('includes.header')
    <style>
        #contact-text{
            text-indent: 25px;
        }
    </style>
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

<!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->

    <div class="container">
        <div class="row" align="center">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img src="images/contact-us.jpg" class="img-responsive">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!--PLACEHOLDER-->
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p id="contact-text">
                    Trying to learn a new technology can be frustrating, I know that because I went
                    through the struggle myself. Many times its not even about having the knowledge
                    but about having the creativity to implement that knowledge. This is the idea that
                    brought nerdschool to life. There are many discussion forums out there yes but, that
                    is where they stop..I have set out to create an environment for my fellow students
                    where we can ask each other questions, share files and projects and test what we learn.
                    This makes nerdschool more than just a discussion forum, it makes us a community.
                </p><br><br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <!--PLACEHOLDER-->
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <p>
                    Location: Mt. San Antonio College<br>
                    Walnut, CA 91789
                </p>
                <img src="images/campus-screenshot.png" class="img-responsive"><br><br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label>Comment:</label><br>
                <textarea name="comment" rows="10"></textarea><br><br>

                <input type="submit" value="Send Message"><br><br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <p>
                    Recent discussions include<br>
                    <strong>PHP</strong><br>
                    <strong>SQL</strong><br>
                    and were growing with <strong>MVC</strong> frameworks.<br><br>

                    Laravel is the primary focus but all are welcome. Drop us a line if you
                    have a suggestion or comment. We gladly accept criticism too.
                </p>
            </div>
        </div>
    </div>

@include('includes.footer')
</body>
</html>
