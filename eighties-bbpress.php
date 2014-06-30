<?php
/*
Plugin Name: Eighties Add-on - bbPress
Version: 1.0.0
Plugin URI: http://eighties.me/add-ons/bbpress
Description: This add-on pairs the power and functionality of bbPress with the modern, sleek design of Eightes.
Author: Justin Kopepasah
Author URI: http://kopepasah.com

Copyright 2014  (email: justin@kopepasah.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Define some constants.
define( 'EIGHTIES_BBPRESS_BASENAME', plugin_basename( __FILE__ ) );
define( 'EIGHTIES_BBPRESS_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'EIGHTIES_BBPRESS_DIR_URL',  plugin_dir_url( __FILE__ ) );
define( 'EIGHTIES_BBPRESS_VERSION',  '1.0.0' );

// Compatibility check.
require_once( EIGHTIES_BBPRESS_DIR_PATH . 'includes/compatibility.php' );

// If we've made it this far, the plugin is active.

/**
 * Load textdomain.
 *
 * @since 1.0.0
 */
function eighties_bbp_load_textdomain() {
	load_plugin_textdomain( 'eighties-bbpress', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action( 'plugins_loaded', 'eighties_bbp_load_textdomain' );

// Add new template stack. Yep, this is cool.
require_once( EIGHTIES_BBPRESS_DIR_PATH . 'includes/templates.php' );

// Load necessary functions for the new template.
require_once( EIGHTIES_BBPRESS_DIR_PATH . 'template/functions.php' );