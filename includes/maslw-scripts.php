<?php

// Add necessary scripts
function maslw_add_scripts(){
	// css
	wp_enqueue_style('maslw-styles', plugins_url(). '/maslw/css/main.css');
}

function maslw_add_admin_scripts(){
	// WP media upload
	wp_enqueue_script('media-upload');
	wp_enqueue_media();

	wp_enqueue_script('maslw-scripts', plugins_url(). '/maslw/js/main.js');
}

add_action('wp_enqueue_scripts', 'maslw_add_scripts');
add_action('admin_enqueue_scripts', 'maslw_add_admin_scripts');
