<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if ( ! class_exists( 'Disable_WC_Bloat_Settings_Section' ) ) :

class Disable_WC_Bloat_Settings_Section {
	
	

	function __construct() {
		add_filter( 'woocommerce_get_sections_wc_bloat',              array( $this, 'settings_section' ) );
		add_filter( 'woocommerce_get_settings_wc_bloat_' . $this->id, array( $this, 'get_settings' ), PHP_INT_MAX );
		
		
	}

	function settings_section( $sections ) {
		$sections[ $this->id ] = $this->desc;
		return $sections;
		

	}

}

endif;
