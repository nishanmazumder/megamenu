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

 /**
 * Currently plugin version.
 */
define('NM_MEGA_MENU', '1.0.0');

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Mega Menu init
 */

require_once(plugin_dir_path(__FILE__) . 'activation.php');
$el = new Elementor_Widegets_Register();
$el->init();

//Scripts
require(plugin_dir_path(__FILE__) . 'mega-script.php');

/**
 * Sidebar cart Init
 */
require plugin_dir_path(__FILE__) . 'cart-sidebar/includes/class-woo-amc.php';
function run_woocommerce_ajax_mini_cart()
{

	$plugin = new WooAmc();
	$plugin->run();
}
run_woocommerce_ajax_mini_cart();
