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
 * Mega Menu & Sidebar cart init
 */

require(plugin_dir_path(__FILE__) . 'widgets/class-activation.php');
require plugin_dir_path(__FILE__) . 'cart-sidebar/includes/class-woo-amc.php';
require(plugin_dir_path(__FILE__) . 'admin/class-discount.php');

function nm_mega_menu_package()
{
	$mega = new Elementor_Widegets_Register();
	$mega->init();

	$sidecart = new WooAmc();
	$sidecart->run();
}
nm_mega_menu_package();
