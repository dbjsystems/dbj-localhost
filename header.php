<?php

// Prevent aliased access
global $ds_runtime;
if (! $ds_runtime->is_localhost ) exit();

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="http://localhost/assets/favicon.ico">

	<title>DesktopServer Sites</title>

	<!-- Bootstrap core CSS -->
	<link href="http://localhost/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="http://localhost/css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php
	global $ds_runtime;
	$ds_runtime->do_action("ds_head");
	?>
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://localhost/" target="_blank"><img src="http://localhost/assets/logo2.png" /></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="http://127.0.0.1/phpmyadmin">PHPMyAdmin - MySQL Administration</a></li>
						<li><a href="http://127.0.0.1/xampp/phpinfo.php">PHP Information - phpinfo</a></li>
						<?php $ds_runtime->do_action( "append_tools_menu" ); ?>
					</ul>
				</li>
				<li><a href="http://serverpress.com/support" target="_blank">Support</a></li>
				<li><a href="http://serverpress.com/contact-us" target="_blank">Contact</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Built on <img src="http://localhost/assets/xampp.png" />XAMPP</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>