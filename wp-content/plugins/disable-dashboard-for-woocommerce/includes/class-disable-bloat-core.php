<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Disable_WC_Bloat_Core' ) ) :

class Disable_WC_Bloat_Core {
	
		function __construct() {
			add_action( 'admin_init',     array( $this, 'wcbloat_start_unbloating' ) );

	}

	function wcbloat_start_unbloating() {
		// Get options
		$wcbloat_wp_dashboard_widgets_disable        = get_option('wcbloat_wp_dashboard_widgets_disable');

		
		
		
// OLD DEPRECATED MENU START
		add_filter( 'woocommerce_get_sections_advanced', 'wcbloat_add_section' );
		function wcbloat_add_section( $sections ) {
			$sections['wcbloat'] = __( 'Disable WooCommerce Bloat (deprecated)', 'disable-dashboard-for-woocommerce' );
			return $sections;
		}

/**
 * Add settings to the specific section we created before
 */
add_filter( 'woocommerce_get_settings_advanced', 'wcbloat_all_settings', 10, 2 );

		function get_wcbloat_old_page() {

        $wcbloat_old_page .= '<style>p.submit { display: none !important;}</style>';

		echo $wcbloat_old_page;

}
		
function wcbloat_all_settings( $settings, $current_section ) {
	/**
	 * Check the current section is what we want
	 **/
	if ( $current_section == 'wcbloat' ) {
		$settings_wcbloat = array();
		$settings_wcbloat[] = array(
			'name' => __( 'Disable WooCommerce Bloat Settings has moved', 'disable-dashboard-for-woocommerce' ),
			'type' => 'title',
			'desc' => __( 'Settings page has moved. It can now be found in the main WooCommerce settings as a new tab: <a href="' . admin_url( 'admin.php?page=wc-settings&tab=wc_bloat' ) . '"> <strong>Disable Bloat for WordPress & WooCommerce Settings &#10138;</strong></a>
			
This legacy page is only here for information and will be removed in one of upcoming releases.', 'disable-dashboard-for-woocommerce' ),
			'id' => 'wcbloat'
		);
		
		$settings_wcbloat[] = array(
			'type' => 'sectionend',
			'id' => 'wcbloat',
		);
		get_wcbloat_old_page();
		return $settings_wcbloat;

	/**
	 * If not, return the standard settings
	 **/
	} else {
		return $settings;
	}
}
// OLD DEPRECATED MENU END


	}

}

endif;

return new Disable_WC_Bloat_Core();
