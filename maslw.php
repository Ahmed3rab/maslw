<?php
/**
 * Plugin Name: Mobile App Store Links
 * Plugin URI: https://github.com/Ahmed3rab/maslw-wordpress
 * Description: A widget that displays your mobile app store links
 * Version: 1.0
 * Author: Ahmed Arab
 * Author URI: https://github.com/Ahmed3rab
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/*
    Mobile App Store Links  is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2 as published by
    the Free Software Foundation.

    Mobile App Store Links  is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Mobile App Store Links . If not, see https://www.gnu.org/licenses/gpl-2.0.html .
*/

// Exit if accessed directly
if (!defined('ABSPATH')){
    exit;
}

// Load scripts
require_once(plugin_dir_path(__file__) . '/includes/maslw-scripts.php');

// Load Main Class
require_once(plugin_dir_path(__file__) . '/includes/maslw-class.php');

// Register Widget

function register_maslw(){
    register_widget('MASLW_Widget');
}

// Hook Function
add_action('widgets_init', 'register_maslw');
