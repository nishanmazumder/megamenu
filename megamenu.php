<?php

/**
 * Plugin Name:       Mega Menu - Elementor
 * Plugin URI:        https://www.bdsoftcreation.com/
 * Description:       Megamenu is a widgest of Elementor.
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
