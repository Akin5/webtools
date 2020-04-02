<?php

require 'vendor/autoload.php';

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
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" type="text/css">
	<link rel="stylesheet" href="css/sb-admin-2.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<div id="loader-wrapper">
			<div class="loader"></div>
			<div class="loader-sec-right"></div>
			<div class="loader-sec-left"></div>
		</div>
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
					<div class="collapse-inner rounded py-2 bg-light">
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
					<div class="collapse-inner rounded py-2 bg-light">
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
					<div class="collapse-inner rounded py-2 bg-light">
						<h5 class="collapse-header">Spam Tools</h5>
						<a href="/tools/spwhats.php" class="collapse-item">
							<ion-icon name="logo-whatsapp"></ion-icon>
							<span>Spam Whatsapp</span>
						</a>
						<a class="collapse-item" href="/tools/sms.php">
							<i class="fas fa-sms"></i>
							<span>Sms Gratis</span>
						</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCrypto">
					<ion-icon name="apps-outline"></ion-icon>
					<span>Crypto Tools</span>
				</a>
				<div id="collapseCrypto" class="collapse" data-parent="#accordinSidebar">
					<div class="collapse-inner rounded bg-light py-2">
						<h5 class="collapse-header">Crypto Tools</h5>
						<a class="collapse-item" href="/tools/base64.php">
							<ion-icon name="finger-print-outline"></ion-icon>
							<span>Base64 Tools</span>
						</a>
						<a class="collapse-item" href="/tools/md5.php">
							<ion-icon name="key-outline"></ion-icon>
							<span>MD5 Tools</span>
						</a>
						<a class="collapse-item" href="/tools/hash.php">
							<ion-icon name="search-outline"></ion-icon>
							<span>Hash identifier</span>
						</a>
						<a class="collapse-item" href="/tools/enc">
							<i class="fa fa-lock"></i>
							<span>PHP Encryption</span>
						</a>
						<a class="collapse-item" href="/tools/genhash.php">
							<ion-icon name="finger-print-outline"></ion-icon>
							<span>Generate Hash</span>
						</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDefacer">
					<ion-icon name="apps-outline"></ion-icon>
					<span>Defacer Tools</span>
				</a>
				<div id="collapseDefacer" class="collapse" data-parent="#accordinSidebar">
					<div class="collapse-inner rounded bg-light pl-0">
						<h5 class="collapse-header">Defacer Tools</h5>
						<a class="collapse-item" href="/tools/csrf.php">
							<ion-icon name="bug-outline"></ion-icon>
							<span>CSRF Online</span>
						</a>
						<a class="collapse-item" href="/tools/balibang.php">
							<ion-icon src="icons/inject.svg" style="transform: rotateY(180deg)"></ion-icon>
							<span>Balibang Auto Sqli</span>
						</a>
						<a class="collapse-item" href="/tools/webdav.php">
							<ion-icon src="icons/webdav.svg"></ion-icon>
							<span>WebDav Deface</span>
						</a>
						<a class="collapse-item" href="/tools/drupal.php">
							<ion-icon src="icons/inject.svg"></ion-icon>
							<span>Drupal Exploit</span>
						</a>
						<a class="collapse-item" href="/tools/hackbar.php">
							<ion-icon name="skull-outline"></ion-icon>
							<span>Hackbar</span>
						</a>
						<a class="collapse-item" href="/tools/lokoexpoit.php">
							<ion-icon src="icons/inject.svg"></ion-icon>
							<span>Lokmed Auto Exploit</span>
						</a>
						<a class="collapse-item" href="/tools/wpbrute.php">
							<ion-icon name="logo-wordpress"></ion-icon>
							<span>WP BruteForce</span>
						</a>
						<a class="collapse-item" href="/tools/lokoexpoit.php">
							<ion-icon src="icons/inject.svg" style="transform: rotateY(180deg)"></ion-icon>
							<span>Kfcinder Exploiter</span>
						</a>
						<a class="collapse-item" href="/tools/lokoexpoit.php">
							<ion-icon name="search-outline"></ion-icon>
							<span>Admin Finder</span>
						</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProgrammer">
					<ion-icon name="apps-outline"></ion-icon>
					<span>Programmer Tools</span>
				</a>
				<div id="collapseProgrammer" class="collapse" data-parent="#accordinSidebar">
					<div class="collapse-inner rounded py-2 bg-light">
						<h5 class="collapse-header">Programmer Tools</h5>
						<a class="collapse-item" href="/tools/editor.php">
							<ion-icon name="create-outline"></ion-icon>
							<span>Live Editor</span>
						</a>
						<a class="collapse-item" href="/tools/jso.php">
							<ion-icon src="icons/puzzle.svg"></ion-icon>
							<span>JSO Creator</span>
						</a>
					</div>
				</div>
			</li>
			<hr class="sidebar-divider my-0">
		</ul>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<nav class="navbar navbar-expand navbar-dark bg-dark topbar shadow static-top mb-4">
					<button class="btn btn-link rounded-circle bars mr-2" id="sidebarToggleTop"><i class="fa fa-bars"></i></button>
					<form action="" method="post" class="navbar-search mr-auto form-inline p-3 d-sm-inline-block d-none">
						<div class="input-group">
							<input id="querySearch" class="form-control form-control-search" type="search" name="querySearch" placeholder="Search...">
							<div class="input-group-append">
								<button class="btn btn-search" type="submit" name="btnSearch" id="btnSearch">
									<i class="fas fa-fw fa-search"></i>
								</button>
							</div>
						</div>
					</form>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown no-arrow d-md-none">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
								<i class="fas fa-search"></i>
							</a>
							<div class="dropdown-menu-right shadow dropdown-menu animated--fade-in bg-dark">
								<form action="" method="post" class="navbar-search mr-auto w-100 form-inline p-3">
									<div class="input-group">
										<input id="search" class="form-control form-control-search" type="search" name="search" placeholder="Search..">
										<div class="input-group-append">
											<button class="btn btn-search" type="submit" name="btnSearch" id="btnSearch">
												<i class="fas fa-fw fa-search"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>
						<div class="topbar-divider d-sm-block"></div>
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown">
								Home
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
								<h5 class="dropdown-header">Social Media</h5>
								<a class="dropdown-item" href="http://blackcodercrush.rf.gd" target="_blank">
									<ion-icon src="icons/profileweb.svg" style="font-size: 20px"></ion-icon>
									<span>Website Profile</span>
								</a>
								<a class="dropdown-item" href="https://github.com/blackcodercrush" target="_blank">
									<i class="fab  mr-2 text-gray fa-github"></i>
									<span>Github</span>
								</a>
								<a class="dropdown-item" href="https://www.instagram.com/blackcodercrush" target="_blank">
									<i class="fab  mr-2 text-gray fa-instagram"></i>
									<span>Instagram</span>
								</a>
								<a class="dropdown-item" href="https://facebook.com/blackcodercrush" target="_blank">
									<i class="fab  mr-2 text-gray fa-facebook"></i>
									<span>Facebook</span>
								</a>
								<a class="dropdown-item" href="https://www.blackcodercrush.com/?m=1" target="_blank">
									<i class="fab  mr-2 text-gray fa-blogger"></i>
									<span>Blog</span>
								</a>
								<a class="dropdown-item" href="https://www.youtube.com/channel/UCk-KwD5UouOkjhAvr2E-dPQ" target="_blank">
									<i class="fab  mr-2 text-gray fa-youtube"></i>
									<span>Youtube</span>
								</a>
							</div>
						</li>
					</ul>
				</nav>
				<div class="container-fluid">
					<div class="d-flex justify-content-between align-items-center mb-4">
						<h1 class="h3 text-gray-700 mb-0 text-center">Dashboard Tools</h1>
						<ul class="breadcrumb d-none d-md-flex">
							<li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-7 mx-auto">
						<div class="card border-top-primary shadow">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col-md-7">
										<h1 class="text-gray-800 text-center">Welcome</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="sticky-footer bg-dark">
				<div class="container my-auto shadow">
					<div class="copyright text-center my-auto text-light">
						<span>Copyright 2020 made with <i class="fa fa-heart text-danger"></i> BlackCoderCrush</span>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/jquery-easing/jquery.easing.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/fontawesome-free/js/all.min.js"></script>
	<script src="js/sb-admin-2.min.js"> </script>
	<script src="js/main.js"></script>
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>
