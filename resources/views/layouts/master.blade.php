
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Q-Shoes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->


<body>
	<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="header_top"><!--header_top-->
					<div class="container">
						<div class="row">
							<div class="col-sm-5">
								<div class="contactinfo">
									<ul class="nav nav-pills">
										<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
										<li><a href="#"><i class="fa fa-envelope"></i> info@quinna.com</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="mainmenu pull-left">
										
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="social-icons pull-right">
									<ul class="nav navbar-nav">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div><!--/header_top-->
				<div class="col-sm-12 row">
					<div class="col-sm-2">
						<div class="logo pull-left">
							<a href="home"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-6 pull-left ">
						<div class="shop-menu ">
							<ul class="nav navbar-nav">
									<?php 	
										if(\Session::get('peran')==2){
											echo "<a type=\"button\" class=\"btn btn-default get \" href=\"cart\"><i class=\"fa fa-shopping-cart\"></i> Cart</a>&nbsp;";
											echo "<a type=\"button\" class=\"btn btn-default get \" href=\"checkout\"><i class=\"fa fa-crosshairs\"></i> Checkout</a>&nbsp;";
											echo "<a type=\"button\" class=\"btn btn-default get \" href=\"pesanan\"><i class=\"fa fa-shopping-cart\"></i> CartOrder</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
											echo "<a type=\"button\" class=\"btn btn-default get \" href=\"listorderbydesign\"><i class=\"fa fa-shopping-cart\"></i> OrderByDesign</a>&nbsp;";
										} 
										if (\Session::get('peran')==1){
											echo "<li><a  href=\"listpesanan\"><i class=\"fa fa-crosshairs\"></i> List Pesanan</a></li>";
											echo "<li><a  href=\"listpenjualan\"><i class=\"fa fa-shopping-cart\"></i> Data Penjualan</a></li>";
											echo "<li><a  href=\"listproduct\"><i class=\"fa fa-crosshairs\"></i> List Product</a></li>";
											echo "<li><a  href=\"addproduct\"><i class=\"fa fa-shopping-cart\"></i> Add Product</a></li>";
										}if (\Session::has('id')==false){
											echo "<a type=\"button\" class=\"btn btn-default get \" href=\"pesanan\"><i class=\"fa fa-shopping-cart\"></i> Pesanan</a>&nbsp;";
											echo "<a type=\"button\" class=\"btn btn-default get \" href=\"cart\"><i class=\"fa fa-shopping-cart\"></i> Cart</a>&nbsp;";
										}		 	
									 ?>								
								</ul> 	
						</div>				
					</div>
					<div class="col-2-sm-4 pull-right">
						<?php 
							if(\Session::has('id')){
											
								echo "<a type=\"button\" class=\"btn btn-default get\"  href=\"account\"><i class=\"fa fa-lock\"></i> ".\Session::get('nama')." </a>&nbsp;";
								echo "<a type=\"button\" class=\"btn btn-default get\" href=\"logout\"><i class=\" fa fa-lock\"></i> Logout</a>&nbsp;";
								
							} else{
								echo "<a type=\"button\" class=\"btn btn-default get\"  href=\"login\"><i class=\"fa fa-lock\"></i> Login</a>";
							}
						?>
					</div>					
				</div>
		</div><!--/header-middle-->
	
	<div class="container">
		@yield('slider')
		
				
		@yield('content')
	<div>

	

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Q</span>-SHOES</h2>
							<p>The Biggest Shoes Online Store in Indonesia</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=DOUlLjIVlpU">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video Exhibition 2011</p>
								<h2>24 DEC 2011</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=DOUlLjIVlpU">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video Exhibition 2012</p>
								<h2>2 DEC 2012</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=DOUlLjIVlpU">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video Exhibition 2013</p>
								<h2>4 May 2013</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=DOUlLjIVlpU">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video Exhibition 2014</p>
								<h2>3 AUG 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Dago st./ 10, Bandung, Indonesia</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="text-center">Copyright © 2015 Quinna Shoes Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>