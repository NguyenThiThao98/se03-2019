<!DOCTYPE html>
<html>
	<head>

		<title>Smart Shop </title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=vietnamese" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="public/fonts/css/fontawesome-all.css">

		<link rel="stylesheet" type="text/css" href="public/css/owl.carousel.css">

		<link rel="stylesheet" type="text/css" href="public/css/owl.theme.default.min.css">

		<link rel="stylesheet" type="text/css" href="public/css/style.css">

		<link rel="stylesheet" type="text/css" href="public/css/style_header.css">

		<link rel="stylesheet" type="text/css" href="public/css/style_product.css">

		<script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>

		<script type="text/javascript" src="public/js/popper.min.js"></script>

		<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="public/js/owl.carousel.js"></script>
	</head>

	<body>

	<header id="header" class="">
		<?php  
			require $header;
			
		?>
	</header><!-- /header -->

	<div id="main-app">
		<?php require $content;?>
	</div>

	<div id="post-web">
		<?php  
			require $postNews;
		?>
	</div>

	<div id="brand-index">
		<?php  
			require $brand;
		?>
	</div>

	<footer id="footer">
		<?php  
			require $footer;
		?>
	</footer>

	</body>
</html>