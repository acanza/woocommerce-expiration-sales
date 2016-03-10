<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://woodemia.com/quien-esta-detras-de-woodemia/
 * @since             1.0.0
 * @package           Woocommerce_Expiration_Sales
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Expiration Sales
 * Plugin URI:        http://woodemia.com
 * Description:       With this plugin you will can show a block with the expiration sales date in the product page, in order to make the customers feel urgency.
 * Version:           1.0.0
 * Author:            Antonio Cantero
 * Author URI:        http://woodemia.com/quien-esta-detras-de-woodemia/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-expiration-sales
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-expiration-sales-activator.php
 */
function activate_woocommerce_expiration_sales() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-expiration-sales-activator.php';
	Woocommerce_Expiration_Sales_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-expiration-sales-deactivator.php
 */
function deactivate_woocommerce_expiration_sales() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-expiration-sales-deactivator.php';
	Woocommerce_Expiration_Sales_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_expiration_sales' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_expiration_sales' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-expiration-sales.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woocommerce_expiration_sales() {

	$plugin = new Woocommerce_Expiration_Sales();
	$plugin->run();

}
run_woocommerce_expiration_sales();
