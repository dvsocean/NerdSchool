<?php require_once "html_output/html_main.php"; ?>
<!DOCTYPE HTML>
<?php
session_start();
if(!isset($_SESSION['valid_user'])){
    header("Location: error_page/error.php?error_message=You are not authorized to be here!");
}

$username= $_SESSION['valid_user'];
?>
<html>
	<head>
		<title>Discussions</title>
        <!--HEADER-->
        <?php display_header(); ?>
        <!--HEADER-->
	</head>
	<body>

    <!--NAVIGATION-->
    <?php display_nav_bar(); ?>
    <!--NAVIGATION-->

		<!-- Main -->
			<div id="main" class="container">
				<header class="major">
					<h2>Topics</h2>
					<p>Let us give you ideas, you just bookmark them</p>
				</header>
				<div class="row 150%">
					<div class="4u 12u$(medium)">

						<!-- Sidebar -->
							<section id="sidebar">
								<section>
									<h3>Linux</h3>
									<p>Installation and configuration, we look at vhosts as well as the apache config file.
                                    The command line is an important tool for developers but it may seem daunting to
                                    some. Since we are Linux nerds we talk about the command line too, and all the cool
                                    things it can do.</p>
									<footer>
										<ul class="actions">
											<li><a href="bookmarks/bookmark.php?bk_message=Information about Linux and the Apache server" class="button small alt">Bookmark</a></li>
										</ul>
									</footer>
								</section>
								<hr />
								<section>
									<a href="#" class="image fit"><img src="images/databases.png" alt="" /></a>
									<h3>PHP and MySQL</h3>
									<p>Amazing power inside such a small tool. The database can be separated from
                                    the main server or it can run parallel on the same machine. Bookmark material
                                    that will teach you how.</p>
									<footer>
										<ul class="actions">
											<li><a href="bookmarks/bookmark.php?bk_message=Get creative making dynamic sites and using databases w/ PHP" class="button small alt">Bookmark</a></li>
										</ul>
									</footer>
								</section>
							</section>

					</div>
					<div class="8u$ 12u$(medium) important(medium)">

						<!-- Content -->
							<section id="content">
								<a href="#" class="image fit"><img src="images/discussions.png" alt="" /></a>
								<h3>Fear and fail or learn and succeed</h3>
								<p>If you plant a seed in the ground it will sprout roots and grow into a plant, why?
                                    Because it has the right environment. It has soil and from the soil it can get
                                    water and nutrients. You can be who ever you want to be so long as you create the
                                    right environment for yourself. If you want to be rich, study hard, manage your
                                    money well and become friends with rich people. Create the environment for yourself
                                    blood sweat and tears, it will never just happen to you.
                                    <ul class="actions">
                                        <li><a href="bookmarks/bookmark.php?bk_message=Everything in life happens for a reason but you cant see that reason" class="button small alt">Bookmark</a></li>
                                    </ul>
                                </p>

								<h3>Thinking is one of the harder tasks that is why so few attempt it. <br>
                                -Henry Ford</h3>
								<p>Imagination, is the ability to see that, which does not yet exist in reality.
                                    We receive only that, what we can imagine...so how could analytical thinking
                                    be nonsense? </p>
								<ul>
									<li>If you don't think you are a slave of public opinion.</li>
									<li>If a situation can cause you to doubt, this is proof you were never rooted in what you believe.</li>
									<li>A mans actions testify to the fact that he longs to be happy.</li>
									<li>To participate in gossip is to be superficial.</li>
									<li>If your 30 years old now, you only have about 360 months left to live.</li>
								</ul>

                                <ul class="actions">
                                    <li><a href="bookmarks/bookmark.php?bk_message=Did you know that chess players are usually regarded as the smartest" class="button small alt">Bookmark</a></li>
                                </ul>
							</section>

					</div>
				</div>
			</div>

		<!-- Footer -->
        <?php display_footer(); ?>
        <!-- Footer -->

	</body>
</html>