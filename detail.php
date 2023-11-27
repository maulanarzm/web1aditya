<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Detail page</title>
	<link rel="Icon" href="img/course02.jpg">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />



</head>

<body>

	<!-- Header -->
	<header id="header">
		<div class="container">

			<div class="navbar-header">
				<!-- Logo -->
				<div class="navbar-brand">
					<h3 style="  font-family: 'Montserrat', sans-serif;">Aditya<<span style="color:sandybrown;">></span></span></h3>

				</div>
				<!-- /Logo -->

				<!-- Mobile toggle -->
				<button class="navbar-toggle">
					<span></span>
				</button>
				<!-- /Mobile toggle -->
			</div>

			<!-- Navigation -->
			<nav id="nav">
				<ul class="main-menu nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="detail.php"style="color: sandybrown;">Detail</a></li>
					<li><a href="#">about</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
			<!-- /Navigation -->

		</div>
	</header>
	<!-- /Header -->

	<!-- Hero-area -->
	<div class="hero-area section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./img/Gedung-Kominfo-Republik-Indonesia.jpg)"></div>
		<!-- /Backgound Image -->

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<ul class="hero-area-tree">
						<li><a href="index.php">Home</a></li>
						<li><a href="#" style="color:sandybrown;">Detail</a></li>
					
					</ul>
					<h1 class="white-text">Welcome to detail page</h1>
					<ul class="blog-post-meta">
						
					</ul>
				</div>
			</div>
		</div>

	</div>
	<!-- /Hero-area -->

	<!-- Blog -->
	<div id="blog" class="section">

		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">

				<!-- main blog -->
				<div id="main" class="col-md-9">

					<!-- blog post -->
					<div class="blog-post">
						<div class="table-container">
							<h2>Daftar Artikel</h2>
							<div class="table-responsive">
								<table class="table">
									<thead class="text-center">

									</thead>
									<tbody class="tableBody text-center">

										<?php
										// Panggil skrip koneksi
										require_once 'dataphp/connection.php';

										try {
											// SQL untuk melakukan SELECT * FROM datalink
											$sql = "SELECT * FROM datalink";

											// Siapkan pernyataan SQL menggunakan metode prepare
											$stmt = $koneksi->prepare($sql);

											// Eksekusi pernyataan SQL
											$stmt->execute();

											// Ambil semua baris hasil sebagai array
											$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

											// Loop through the data and create table rows
											foreach($result as $article) {
												echo "<tr>
                                    <td>Name : ${article['judul']} <br> Link : <a> ${article['url']} </a> <br> Deskripsi : ${article['deskripsi']}</td>
                               
                                </tr>";
											}
										} catch (PDOException $e) {
											// Handle error if needed
											echo "<tr><td colspan='4'>Error retrieving data: ".$e->getMessage()."</td></tr>";
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- Pagination -->
							<nav aria-label="Page navigation example">
								<ul class="pagination" id="pagination">
									<li class="page-item">
										<button class="btn btn-secondary pagination-btn" id="prevBtn">Previous</button>
									</li>
									<li class="page-item">
										<button class="btn btn-secondary pagination-btn" id="nextBtn">Next</button>
									</li>
								</ul>
							</nav>
						</div>

					</div>
					<!-- /blog post -->

					<!-- blog share -->
					<div class="blog-share">
						<h4>Share This Post:</h4>
						<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
					</div>
					<!-- /blog share -->

					<!-- blog comments -->
					<div class="blog-comments">
						<h3>5 Comments</h3>

						<!-- single comment -->
						<div class="media">
							<div class="media-left">
								<img src="./img/avatar.png" alt="">
							</div>
							<div class="media-body">
								<h4 class="media-heading">adam</h4>
								<p>keren sekali website ini</p>
								<div class="date-reply"><span>Oct 18, 2023 - 1:00AM</span><a href="#"
										class="reply">Reply</a></div>
							</div>

							<!-- comment reply -->
							<div class="media">
								<div class="media-left">
									<img src="./img/avatar.png" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">raul</h4>
									<p>ajarin dong puh</p>
									<div class="date-reply"><span>Nov 18, 2023 - 3:00AM</span><a href="#"
											class="reply">Reply</a></div>
								</div>
							</div>
							<!-- /comment reply -->

							<!-- comment reply -->
							<div class="media">
								<div class="media-left">
									<img src="./img/avatar.png" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">vina</h4>
									<p>cool</p>
									<div class="date-reply"><span>Oct 18, 2020 - 8:00AM</span><a href="#"
											class="reply">Reply</a></div>
								</div>
							</div>
							<!-- /comment reply -->

						</div>
						<!-- /single comment -->

						<!-- single comment -->
						<div class="media">
							<div class="media-left">
								<img src="./img/avatar.png" alt="">
							</div>
							<div class="media-body">
								<h4 class="media-heading">gigi</h4>
								<p>sangat bermanfaat</p>
								<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#"
										class="reply">Reply</a></div>
							</div>
						</div>
						<!-- /single comment -->

						<!-- blog reply form -->
						<div class="blog-reply-form">
							<h3>Leave Comment</h3>
							<form>
								<input class="input name-input" type="text" name="name" placeholder="Name">
								<input class="input email-input" type="email" name="email" placeholder="Email">
								<textarea class="input" name="message" placeholder="Enter your Message"></textarea>
								<button class="main-button icon-button">Submit</button>
							</form>
						</div>
						<!-- /blog reply form -->

					</div>
					<!-- /blog comments -->
				</div>
				<!-- /main blog -->

				<!-- aside blog -->
				<div id="aside" class="col-md-3">

					<!-- search widget -->
					<div class="widget search-widget">
						<form>
							<input class="input" type="text" name="search">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /search widget -->

					<!-- category widget -->
					<div class="widget category-widget">
						<h3>Categories</h3>
						<a class="category" href="#">Web <span>12</span></a>
						<a class="category" href="#">Css <span>5</span></a>
						<a class="category" href="#">Wordpress <span>24</span></a>
						<a class="category" href="#">Html <span>78</span></a>
						<a class="category" href="#">Business <span>36</span></a>
					</div>
					<!-- /category widget -->

					<!-- posts widget -->
					
					<!-- /posts widget -->

					<!-- tags widget -->
					<div class="widget tags-widget">
						<h3>Tags</h3>
						<a class="tag" href="#">Web</a>
						<a class="tag" href="#">Photography</a>
						<a class="tag" href="#">Css</a>
						<a class="tag" href="#">Responsive</a>
						<a class="tag" href="#">Wordpress</a>
						<a class="tag" href="#">Html</a>
						<a class="tag" href="#">Website</a>
						<a class="tag" href="#">Business</a>
					</div>
					<!-- /tags widget -->

				</div>
				<!-- /aside blog -->

			</div>
			<!-- row -->

		</div>
		<!-- container -->

	</div>
	<!-- /Blog -->

	<!-- Footer -->
	<footer id="footer" class="section">

		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">

				<!-- footer logo -->
				<div class="col-md-6">
					<div class="footer-logo">
						<a class="logo" href="index.html">
						<h3 style="  font-family: 'Montserrat', sans-serif;">Aditya<<span style="color:sandybrown;">></span></span></h3>

						</a>
					</div>
				</div>
				<!-- footer logo -->

				<!-- footer nav -->
				<div class="col-md-6">
					<ul class="footer-nav">
					<li><a href="index.php">Home</a></li>
							<li><a href="#">Detail</a></li>
							<li><a href="#">About</a></li>
					</ul>
				</div>
				<!-- /footer nav -->

			</div>
			<!-- /row -->

			<!-- row -->
			<div id="bottom-footer" class="row">

				<!-- social -->
				<div class="col-md-4 col-md-push-8">
					<ul class="footer-social">
						<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				<!-- /social -->

				<!-- copyright -->
				<div class="col-md-8 col-md-pull-4">
					<div class="footer-copyright">
					<span>&copy; </i> <a href="https://colorlib.com"> Copyright  21552011299. ADITYA RIZKI MAULANA TIF 221 PB</a></span>

					</div>
				</div>
				<!-- /copyright -->

			</div>
			<!-- row -->

		</div>
		<!-- /container -->

	</footer>
	<!-- /Footer -->

	<!-- preloader -->
	<div id='preloader'>
		<div class='preloader'></div>
	</div>
	<!-- /preloader -->


	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>