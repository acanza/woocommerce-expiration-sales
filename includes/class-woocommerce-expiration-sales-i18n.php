<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://woodemia.com/quien-esta-detras-de-woodemia/
 * @since      1.0.0
 *
 * @package    Woocommerce_Expiration_Sales
 * @subpackage Woocommerce_Expiration_Sales/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Expiration_Sales
 * @subpackage Woocommerce_Expiration_Sales/includes
 * @author     Antonio Cantero <contacto@woodemia.com>
 */
class Woocommerce_Expiration_Sales_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woocommerce-expiration-sales',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
