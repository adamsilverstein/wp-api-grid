<?php
/**
 * Plugin Name: WP API Grid
 * Plugin URI:  http://wordpress.org/plugins
 * Description: An API powered image grid.
 * Version:     0.1.0
 * Author:      Adam Silverstein
 * Author URI:
 * License:     GPLv2+
 * Text Domain: apigrid
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2015 10up (email : info@10up.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using yo wp-make:plugin
 * Copyright (c) 2015 10up, LLC
 * https://github.com/10up/generator-wp-make
 */

// Useful global constants
define( 'APIGRID_VERSION', '0.1.0' );
define( 'APIGRID_URL',     plugin_dir_url( __FILE__ ) );
define( 'APIGRID_PATH',    dirname( __FILE__ ) . '/' );
define( 'APIGRID_INC',     APIGRID_PATH . 'includes/' );

// Include files
require_once APIGRID_INC . 'functions/core.php';


// Activation/Deactivation
register_activation_hook( __FILE__, '\WP_API_Grid\Core\activate' );
register_deactivation_hook( __FILE__, '\WP_API_Grid\Core\deactivate' );

// Bootstrap
WP_API_Grid\Core\setup();
