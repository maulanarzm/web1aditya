<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Input page</title>
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
					<span>
						<?php
						session_start();

						$notification = isset($_SESSION['notification']) ? $_SESSION['notification'] : '';
						unset($_SESSION['notification']); // Clear the session variable
						?>
					</span>
				</button>
				<!-- /Mobile toggle -->
			</div>

			<!-- Navigation -->
			<nav id="nav">
				<ul class="main-menu nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="#" style="color: sandybrown;">Input Data</a></li>
					<li><a href="detail.php">Detail</a></li>
					<li><a href="login.php">loggout</a></li>
				</ul>
			</nav>
			<!-- /Navigation -->

		</div>
	</header>
	<!-- /Header -->

	<!-- Hero-area -->
	<div class="hero-area section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
		<!-- /Backgound Image -->

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<ul class="hero-area-tree">
						<li><a href="index.html">Menu Utama</a></li>
						<li>input</li>
					</ul>
					<h1 class="white-text">Input Artikel</h1>

				</div>
			</div>
		</div>

	</div>
	<!-- /Hero-area -->

	<!-- Blog -->
	<div id="blog" class="section">

		<!-- container -->
		<div class="container">

			<div class="container mt-4">
				<!-- Form Input Artikel di Kiri -->
				<div class="form-container">

					<form action="dataphp/input.php" method="post">
						<div class="form-group">
							<label for="judul">Judul Artikel:</label>
							<input type="text" name="judul" class="form-control" id="judul"
								placeholder="Masukkan judul artikel">
						</div>
						<div class="form-group">
							<label for="url">URL Artikel:</label>
							<input type="text" name="url" class="form-control" id="url"
								placeholder="Masukkan URL artikel">
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi Artikel:</label>
							<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
								placeholder="Masukkan deskripsi artikel"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Tambah Artikel</button>
					</form>
				</div>

				<!-- Tabel Artikel di Kanan -->
				<div class="table-container">
					<h2 class="text-center">Daftar Artikel</h2>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Judul</th>
									<th>URL</th>
									<th>Deskripsi</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="tableBody ">

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
                                    <td>${article['judul']}</td>
                                    <td>${article['url']}</td>
                                    <td>${article['deskripsi']}</td>
                                    <td class='d-flex justify-content-center'>
                                        <button class='btn btn-warning editBtn mr-2' data-judul='${article['judul']}'>Edit</button>
                                        <button class='btn btn-success saveBtn' data-judul='${article['judul']}' style='display:none;'>Save</button>
                                        <button class='btn btn-danger deleteBtn mr-2' data-judul='${article['judul']}'>Delete</button>
                                    </td>
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
							<li><a href="#">about</a></li>
					</ul>
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
						<span>&copy; </i> <a href="https://colorlib.com"> Copyright 21552011299. ADITYA RIZKI MAULANA
								TIF 221 PB</a></span>

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
	<!-- Tambahkan script Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const tableBody = document.querySelector(".tableBody");
			const form = document.querySelector("form");
			const itemsPerPage = 7;
			let articles = <?php echo json_encode($result); ?>;
			let currentPage = 0;
			let currentlyEditing = null;

			function attachEventListeners() {
				document.querySelectorAll('.editBtn').forEach(btn => {
					btn.addEventListener('click', function () {
						const judul = this.getAttribute('data-judul');
						const selectedArticle = articles.find(article => article['judul'] === judul);

						// Populate the form fields with the selected article data
						form.elements['judul'].value = selectedArticle['judul'];
						form.elements['url'].value = selectedArticle['url'];
						form.elements['deskripsi'].value = selectedArticle['deskripsi'];

						if (currentlyEditing !== null && currentlyEditing !== judul) {
							document.querySelector(`.saveBtn[data-judul="${currentlyEditing}"]`).style.display = 'none';
							document.querySelector(`.editBtn[data-judul="${currentlyEditing}"]`).style.display = 'block';
						}
						currentlyEditing = judul;
						this.style.display = 'none';
						document.querySelector(`.saveBtn[data-judul="${judul}"]`).style.display = 'block';
					});
				});

				document.querySelectorAll('.saveBtn').forEach(btn => {
					btn.addEventListener('click', function () {
						const judul = this.getAttribute('data-judul');
						const updatedJudul = form.elements['judul'].value;
						const updatedUrl = form.elements['url'].value;
						const updatedDeskripsi = form.elements['deskripsi'].value;

						// Make an AJAX request to update.php
						const xhr = new XMLHttpRequest();
						xhr.open('POST', 'dataphp/update.php', true);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

						const data = `judul=${encodeURIComponent(judul)}&updatedJudul=${encodeURIComponent(updatedJudul)}&updatedUrl=${encodeURIComponent(updatedUrl)}&updatedDeskripsi=${encodeURIComponent(updatedDeskripsi)}`;

						xhr.onreadystatechange = function () {
							if (xhr.readyState === XMLHttpRequest.DONE) {
								if (xhr.status === 200) {
									// Successfully updated, you can handle the response if needed
									console.log(xhr.responseText);

									// Reload the page to refresh the table
									location.reload();
								} else {
									// Handle error
									console.error(xhr.statusText);
								}
							}
						};

						xhr.send(data);

						this.style.display = 'none';
						document.querySelector(`.editBtn[data-judul="${judul}"]`).style.display = 'block';
						currentlyEditing = null;
					});
				});

				document.querySelectorAll('.deleteBtn').forEach(btn => {
					btn.addEventListener('click', function () {
						const judulToDelete = this.getAttribute('data-judul');

						// Konfirmasi sebelum menghapus
						const confirmDelete = confirm(`Apakah Anda yakin ingin menghapus artikel dengan judul: ${judulToDelete}?`);

						if (confirmDelete) {
							// Buat AJAX request untuk delete.php menggunakan jQuery
							$.ajax({
								url: 'dataphp/delete.php',
								type: 'POST',
								data: { judul: judulToDelete },
								success: function (response) {
									// Berhasil menghapus, tanggapi respons jika diperlukan
									console.log(response);

									// Reload halaman untuk memperbarui tabel
									location.reload();
								},
								error: function (xhr, status, error) {
									// Handle error
									console.error(error);
								}
							});
						}
					});
				});
			}

			function displayArticles(startIndex) {
				const endIndex = startIndex + itemsPerPage;
				const displayedArticles = articles.slice(startIndex, endIndex);

				tableBody.innerHTML = "";

				displayedArticles.forEach(article => {
					tableBody.innerHTML += `<tr>
				<td>${article['judul']}</td>
				<td>${article['url']}</td>
				<td>${article['deskripsi']}</td>
				<td class='d-flex justify-content-center'>
					<button class='btn btn-warning editBtn mr-2' data-judul='${article['judul']}'>Edit</button>
					<button class='btn btn-success saveBtn' data-judul='${article['judul']}' style='display:none;'>Save</button>
					<button class='btn btn-danger deleteBtn mr-2' data-judul='${article['judul']}'>Delete</button>
				</td>
			</tr>`;
				});

				attachEventListeners(); // Attach event listeners after updating content
			}

			function displayPagination() {
				const totalPages = Math.ceil(articles.length / itemsPerPage);

				document.getElementById("prevBtn").disabled = currentPage === 0;
				document.getElementById("nextBtn").disabled = currentPage === totalPages - 1;

				document.getElementById("prevBtn").textContent = "Previous";
				document.getElementById("nextBtn").textContent = "Next";

				document.getElementById("prevBtn").addEventListener("click", function () {
					if (currentPage > 0) {
						currentPage--;
						const startIndex = currentPage * itemsPerPage;
						displayArticles(startIndex);
						displayPagination();
					}
				});

				document.getElementById("nextBtn").addEventListener("click", function () {
					if (currentPage < totalPages - 1) {
						currentPage++;
						const startIndex = currentPage * itemsPerPage;
						displayArticles(startIndex);
						displayPagination();
					}
				});
			}


			displayArticles(0);
			displayPagination();

		});
	</script>
</body>

</html>