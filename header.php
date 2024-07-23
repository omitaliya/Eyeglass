

<!DOCTYPE html>
<html lang="zxx">
<?php 
		include "connection.php";
		session_start();
?>
<head>
	<title>Eyewear</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);

		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/contact.css" rel='stylesheet' type='text/css' />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/checkout.css">

	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					
					<ul>
						<li>
							<!-- <i class="fas fa-phone"></i> Call</li> -->
						<!-- <li class="number-phone mt-3">12345678099</li> -->
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="index.php">
							Eyewear</a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
				
				</div>
			</div>
			<!-- -->
				<!-- open/close -->
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						
						<!-- <li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li> -->
						<li class="button-log">
							<?php 
							if (isset($_SESSION['useremail'])) {
						?>
							<a class="nav-link" href="logout.php" ><i class="fa fa-user"></i> Logout </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="orders.php"><i class="fa fa-shopping-bag"></i>My Orders</a>
						</li>	
						<li class="nav-item">
							<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i>My Cart</a>
						</li>	
						<li class="nav-item">
							<a class="nav-link" href="feedback.php"><i class="fa fa-pen-square"></i>Feedback</a>
						</li>	
						<?php
							}

							else{
						?>
						<li class="nav-item">
							<a class="nav-link" href="login.php" ><i class="fa fa-user"></i>Login</a>
						</li>
						<li class="button-log">
							<a class="nav-link" href="adduser.php"><i class="fa fa-user"></i>Register</a>
						</li>
						<?php
							}
						?>
										
					</ul>
						
				</div>
			</nav>
		</header>
		<!-- //header -->