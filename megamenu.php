<?php

/**
 * Plugin Name:       Mega Menu - Elementor
 * Plugin URI:        https://github.com/nishanmazumder/megamenu/tree/plugin
 * Description:       Megamenu is a widgest of Elementor. Available option menu, cart-sidebar e.t.c.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            BDSOFTcr
 * Author URI:        https://www.bdsoftcreation.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       btc-price-text-domain
 * Domain Path:       /languages
 */


//Scripts
require(plugin_dir_path(__FILE__) . 'mega-script.php');

//Mega Menu
require(plugin_dir_path(__FILE__) . 'mega-front.php');

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WAMC_INCONVER_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 */
function activate_woocommerce_ajax_mini_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'cart-sidebar/includes/class-woo-amc-activator.php';
    WooAmcActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_woocommerce_ajax_mini_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'cart-sidebar/includes/class-woo-amc-deactivator.php';
    WooAmcDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_ajax_mini_cart' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_ajax_mini_cart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'cart-sidebar/includes/class-woo-amc.php';

/**
 * Begins execution of the plugin.
 */
function run_woocommerce_ajax_mini_cart() {

	$plugin = new WooAmc();
	$plugin->run();

}
run_woocommerce_ajax_mini_cart();
