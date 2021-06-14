<?php

// Add necessary scripts
function maslw_add_scripts(){
	// css
	wp_enqueue_style('maslw-styles', plugins_url(). '/maslw-wordpress/css/main.css');

	// Javascript
	wp_enqueue_script('maslw-scripts', plugins_url(). '/maslw-wordpress/js/main.js');
}

add_action('wp_enqueue_scripts', 'maslw_add_scripts');
