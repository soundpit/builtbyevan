<?php

	define ('URL', get_template_directory_uri());

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Built By Evan | 
		
		<?php 
		
		if (is_front_page()){
			echo "Welcome";
		}else{
			the_title(); 
		} ?>
	</title>
	<meta name="description" content="My Portfolio">
	<meta name="Evan Scofield" content="Portfolio">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet">
	<!-- <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/utility.css">
	<link rel="stylesheet" href="css/style.css"> -->
	
	<?php wp_head(); ?>
	
</head>

<body>

<div class="container">
	<div class="content-inside">
<header>
	<div class="row">
		<div class="col-6">
		<h1 id="logo"><a href="<?php echo get_home_url(); ?>">Built<span id="by">By</span>Evan<span id="com">.com</span></a></h1>
		</div>	
		<div class="col-6">
			<input id="button" type="button" value="Contact Me">
		</div>
	</div>
</header>