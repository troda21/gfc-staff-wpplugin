<?php
/*
Plugin Name: GFC Staff
Plugin URI: http://gfconline.com
Description: A Plugin that displays the staff of GFC.
Version: 1.0
Author: Tim Roda @ GFC
Author URI: http://gfconline.com/
License: GPLv2
*/

$directory = plugin_dir_path( __FILE__ );

// include the Staff Post Type to be created
include_once($directory . 'includes/staff-post-types.php');

// include the Meta Boxes to be created
include_once($directory . 'includes/staff-meta-boxes.php');

// include the shortcodes to be used
include_once($directory . 'includes/staff-shortcodes.php');



?>