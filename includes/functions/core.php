<?php
namespace WP_API_Grid\Core;

/**
 * Default setup routine
 *
 * @uses add_action()
 * @uses do_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'i18n' ) );
	add_action( 'init', $n( 'init' ) );

	// Add an image grid shortcode
	add_shortcode( 'api_image_grid', 'WP_API_Grid\Core\api_image_grid_shortcode' );

	do_action( 'apigrid_loaded' );
}

/**
 * Handle the image grid shortcode.
 * @return [type] [description]
 */
function api_image_grid_shortcode() {
	wp_enqueue_script( 'onscreen', APIGRID_URL . 'assets/js/vendor/jquery.onscreen.js', array( 'jquery' ), APIGRID_VERSION, true );
	wp_enqueue_script( 'api_ig', APIGRID_URL . 'assets/js/wp-api-grid.js', array( 'wp-api', 'jquery-masonry' ), APIGRID_VERSION, true );
	wp_enqueue_style( 'api_ig', APIGRID_URL . 'assets/css/wp-api-grid.css', array(), APIGRID_VERSION );
	echo '<div class="api-image-gallery-container"></div>"';
}
/**
 * Registers the default textdomain.
 *
 * @uses apply_filters()
 * @uses get_locale()
 * @uses load_textdomain()
 * @uses load_plugin_textdomain()
 * @uses plugin_basename()
 *
 * @return void
 */
function i18n() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'apigrid' );
	load_textdomain( 'apigrid', WP_LANG_DIR . '/apigrid/apigrid-' . $locale . '.mo' );
	load_plugin_textdomain( 'apigrid', false, plugin_basename( APIGRID_PATH ) . '/languages/' );
}

/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @uses do_action()
 *
 * @return void
 */
function init() {
	do_action( 'apigrid_init' );
}

/**
 * Activate the plugin
 *
 * @uses init()
 * @uses flush_rewrite_rules()
 *
 * @return void
 */
function activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	init();
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate() {

}
