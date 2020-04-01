<?php

if (!session_id()) session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Akin">
	<meta name="description" content="Web Tools by BlackCoderCrush">
	<meta name="theme-color" content="#4e73df">
	<title>Web Tools | BlackCoderCrush</title>
	<!-- Icon -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!-- Css -->
	<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" type="text/css">
	<link rel="stylesheet" href="css/sb-admin-2.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="page-top">
	<div id="loader-wrapper">
		<div class="loader"></div>
		<div class="loader-sec-right"></div>
		<div class="loader-sec-left"></div>
	</div>
	<div id="wrapper">
		<ul id="accordinSidebar" class="navbar-nav sidebar sidebar-dark accordin bg-gradient-dark">
			<a class="sidebar-brand d-flex justify-content-center align-items-center" href="/">
				<div class="sidebar-brand-icon">
					<img class="img-circle img-brand" src="img/logo.jpg" alt="Logo">
				</div>
				<span class="sidebar-brand-text mx-3">BlackCoderCrush</span>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="/">
					<i class="fa fa-home"></i>
					<span>Home</span>
				</a>
			</li>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSosmed">
					<ion-icon name="apps-outline"></ion-icon>
					<span>Sosmed Tools</span>
				</a>
				<div id="collapseSosmed" class="collapse" data-parent="#accordinSidebar">
					<div class="collapse-inner rounded py-2 bg-gradient-light">
						<h5 class="collapse-header">Sosmed Tools</h5>
						<a class="collapse-item" href="/tools/ytdown.php">
							<i class="fab fa-youtube"></i>
							<span>Youtube Downloader</span>
						</a>
						<a class="collapse-item" href="/tools/igdown.php">
							<i class="fab fa-instagram"></i>
							<span>Instagram Downloader</span>
						</a>
						<a class="collapse-item" href="/tools/fbdown.php">
							<i class="fab fa-facebook"></i>
							<span>Facebook Downloader</span>
						</a>
						<a class="collapse-item" href="/tools/twitterdown.php">
							<i class="fab fa-twitter"></i>
							<span>Twitter Downloader</span>
						</a>
						<a class="collapse-item" href="/tools/tiktokdown.php">
							<i class="fas fa-music"></i>
							<span>Tiktok Downloader</span>
						</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSEO">
					<ion-icon name="apps-outline"></ion-icon>
					<span>SEO Tools</span>
				</a>
				<div id="collapseSEO" class="collapse" data-parent="#accordinSidebar">
					<div class="collapse-inner rounded py-2 bg-gradient-light">
						<h5 class="collapse-header">SEO Tools</h5>
						<a href="/tools/frewproxy.php" class="collapse-item">
							<ion-icon name="shield-checkmark-outline"></ion-icon>
							<span>Free Proxy</span>
						</a>
						<a href="/tools/whois.php" class="collapse-item">
							<ion-icon name="globe-outline"></ion-icon>
							<span>Whois Lookup</span>
						</a>
						<a href="/tools/reverseip.php" class="collapse-item">
							<ion-icon name="arrow-redo-outline"></ion-icon>
							<span>Reverse IP</span>
						</a>
						<a href="/tools/dns.php" class="collapse-item">
							<ion-icon name="globe-outline"></ion-icon>
							<span>DNS Lookup</span>
						</a>
						<a href="/tools/portscanner.php" class="collapse-item">
							<ion-icon name="eye-outline"></ion-icon>
							<span>Port Scanner</span>
						</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSpam">
					<ion-icon name="apps-outline"></ion-icon>
					<span>Spam Tools</span>
				</a>
				<div id="collapseSpam" class="collapse" data-parent="#accordinSidebar">
					<div class="collapse-inner rounded py-2 bg-gradient-light">
						<h5 class="collapse-header">Spam Tools</h5>
						<a href="/tools/spwhats.php" class="collapse-item">
							<ion-icon name="logo-whatsapp"></ion-icon>
							<span>Spam Whatsapp</span>
						</a>
						<a class="collapse-item" href="/tools/sms.php">
							<i class="fas fa-sms"></i>
							Sms Gratis
						</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/ionicons/dist/ionicons.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/fontawesome-free/js/all.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
