jQuery(document).ready(function ($) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

  	// Calcula el presupuesto total
  	function refresh_table_prices() {

  	    // Obtengo el objeto JSON con toda la info sobre cada variación
  	    var selected_variation_id = $( 'input.variation_id' ).attr( 'value' );

  	    $( '.expiration-sale-date:not( #variation-' + selected_variation_id + ' ) ' ).hide( '200' );
  	    $( '#variation-' + selected_variation_id ).show( '1000' );
  	}

  	$(document).on('change','table.variations select', function(){ 

  		refresh_table_prices();
  	});

});
