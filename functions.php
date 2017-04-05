<?php

/*
*	ERROR REPORTING
ini_set('display_errors','1'); 
ini_set('display_startup_errors','1'); 
error_reporting (E_ALL);include('index.php'); 
*/

/* 
* 	Basic wordpress setup functions
*/

// include custom features
include ('scripts/project-post-type.php');
include ('scripts/project-metabox-add.php');

// Enque Scripts and Styles
function my_portfolio_scripts(){	
	
	wp_enqueue_style('fonts_style', get_template_directory_uri().'/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('utility_style', get_template_directory_uri().'/css/utility.css');
	wp_enqueue_style('main_style', get_template_directory_uri().'/css/style.css');
	wp_enqueue_script('mainjs', get_template_directory_uri().'/scripts/main.js', array('jquery'), null, true);
	

	
};

add_action( 'wp_enqueue_scripts', 'my_portfolio_scripts' );
