<?php require 'core/init.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>Products</title>
	<!-- Compiled and minified materialize C5S -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<?php
		$request_uri = $_SERVER['REQUEST_URI'];
	?>
	<nav>
		<div class="nav-wrapper grey darken-1">
			<div class="container">
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<li <?php if( $request_uri === '/' ){ echo 'class="active"'; } ?>><a href="/">Products</a></li>
					<li  <?php if( $request_uri === '/add.php' ){ echo 'class="active"'; } ?>><a href="add.php">Add New Product</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container"><br><br><br>