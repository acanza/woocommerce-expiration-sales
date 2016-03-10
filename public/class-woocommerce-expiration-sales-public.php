<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://woodemia.com/quien-esta-detras-de-woodemia/
 * @since      1.0.0
 *
 * @package    Woocommerce_Expiration_Sales
 * @subpackage Woocommerce_Expiration_Sales/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Expiration_Sales
 * @subpackage Woocommerce_Expiration_Sales/public
 * @author     Antonio Cantero <contacto@woodemia.com>
 */
class Woocommerce_Expiration_Sales_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Expiration_Sales_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Expiration_Sales_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woocommerce-expiration-sales-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Expiration_Sales_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Expiration_Sales_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woocommerce-expiration-sales-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Show the expiration sales date
	 *
	 * @since    1.0.0
	 */
	public function show_expiration_sale_date() {

		global $product;
		$expirations_dates = array();
		$expration_sales_date_message = 'OFERTA válida hasta el';
		
		if ( $product->product_type == 'variable' ) {

  		  	// Obtiene el id de la variación por defecto
			$variation_default_attributes = $product->get_variation_default_attributes();
			$variation_default_attributes = $this->add_prefix_key( $variation_default_attributes, 'attribute_' );
			$default_variation_id = $product->get_matching_variation( $variation_default_attributes );
			$available_variations = $product->get_available_variations();

			foreach ( $available_variations as $key => $variation_info ) {

				$expiration_sale_date = get_post_meta( $variation_info[ 'variation_id' ], '_sale_price_dates_to', true )? date( "d-m-Y", get_post_meta( $variation_info[ 'variation_id' ], '_sale_price_dates_to', true ) ) : '';

				if ( !empty( $expiration_sale_date ) ) {

					if ( $default_variation_id == $variation_info[ 'variation_id' ] ) {

						echo '<div id="variation-'. $variation_info[ 'variation_id' ] .'" class="expiration-sale-date" style="margin-top: 10px;margin-bottom: 10px;padding: 5px;color: #FF5C5C;border: 1px solid;text-align: center;"> '. $expration_sales_date_message .' '. $expiration_sale_date .'</div>';
					}else{

						echo '<div id="variation-'. $variation_info[ 'variation_id' ] .'" class="expiration-sale-date" style="margin-top: 10px;margin-bottom: 10px;padding: 5px;color: #FF5C5C;border: 1px solid;text-align: center; display:none;"> '. $expration_sales_date_message .' '. $expiration_sale_date .'</div>';
					}
				}
			}
		}elseif ( $product->product_type == 'simple' ) {

			$expiration_sale_date = get_post_meta( $product->post->ID, '_sale_price_dates_to', true )? date( "d-m-Y", get_post_meta( $product->post->ID, '_sale_price_dates_to', true ) ) : '';

			if ( !empty( $expiration_sale_date ) ) {
				echo '<div style="margin-top: 10px;margin-bottom: 10px;padding: 5px;color: #FF5C5C;border: 1px solid;text-align: center;"> '. $expration_sales_date_message .' '. $expiration_sale_date .'</div>';
			}
		}
	}

	/**
	 * Change array key
	 *
	 * @since    1.0.0
	 */
	private function add_prefix_key( $array, $prefix ) {
	
	    $keys_with_prefix = array_map( function( $k ) use ( $prefix ) { return $prefix . $k; }, array_keys( $array ) );
	
	    return array_combine( $keys_with_prefix, $array );
	}
}
