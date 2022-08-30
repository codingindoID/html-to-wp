<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Disable_WC_Bloat_Settings_Settings' ) ) :

class Disable_WC_Bloat_Settings_Settings extends WC_Settings_Page {

	function __construct() {
		$this->id    = 'wc_bloat';
		$this->label = __( 'Disable Bloat', 'disable-dashboard-for-woocommerce' );
		parent::__construct();
		add_filter( 'woocommerce_admin_settings_sanitize_option', array( $this, 'maybe_unsanitize_option' ), PHP_INT_MAX, 3 );
		/**
		*
		Hide sticky sidebard
		function get_wcbloat_settings_tab_sidebar() {

		$url = get_site_url();

		$wcbloat_sidebar = '';
		$wcbloat_sidebar .= '<div class="wcbloat_settings_tab_sidebar">';
        $wcbloat_sidebar .= '<div class="wcbloat_settings_tab_sidebar_item">';
        $wcbloat_sidebar .= '<strong></strong>';
        $wcbloat_sidebar .= '<p>';
        $wcbloat_sidebar .= __( 'WooCommerce advanced settings to configure WooCommerce.', 'disable-dashboard-for-woocommerce' );
        $wcbloat_sidebar .= '</p>';
        $wcbloat_sidebar .= '</div>';
        $wcbloat_sidebar .= '<div class="wcbloat_settings_tab_sidebar_item">';
        $wcbloat_sidebar .= '<strong>Clear cache!</strong>';
        $wcbloat_sidebar .= '<p>';
        $wcbloat_sidebar .= '</a>';
        $wcbloat_sidebar .= '</div>';
		$wcbloat_sidebar .= '</div>';

		echo $wcbloat_sidebar;

		}
		*/

	}
	

	
	function maybe_unsanitize_option( $value, $option, $raw_value ) {
		return ( ! empty( $option['wcbloat_raw'] ) && 'yes' === get_option( 'wcbloat_raw_input', 'yes' ) ? $raw_value : $value );
	}

	function get_settings() {
		// Hide sticky sidebard
		// get_wcbloat_settings_tab_sidebar();
		global $current_section;
		return array_merge( apply_filters( 'woocommerce_get_settings_' . $this->id . '_' . $current_section, array() ), array(
		/**
		* Hide Reset form  
		
			array(
				'title'     => __( 'Reset Settings', 'disable-dashboard-for-woocommerce' ),
				'type'      => 'title',
				'id'        => $this->id . '_' . $current_section . '_reset_options',
			),
			array(
				'title'     => __( 'Reset section settings', 'disable-dashboard-for-woocommerce' ),
				'desc'      => '<strong>' . __( 'Reset', 'disable-dashboard-for-woocommerce' ) . '</strong>',
				'id'        => $this->id . '_' . $current_section . '_reset',
				'default'   => 'no',
				'type'      => 'checkbox',
			),

		*/
				array(
				'type'      => 'sectionend',
				'id'        => $this->id . '_' . $current_section . '_reset_options',
			),
		) );
	}

	function maybe_reset_settings() {
		global $current_section;
		if ( 'yes' === get_option( $this->id . '_' . $current_section . '_reset', 'no' ) ) {
			foreach ( $this->get_settings() as $value ) {
				if ( isset( $value['id'] ) ) {
					$id = explode( '[', $value['id'] );
					delete_option( $id[0] );
				}
			}
			add_action( 'admin_notices', array( $this, 'admin_notice_settings_reset' ) );
		}
	}

	function admin_notice_settings_reset() {
		echo '<div class="notice notice-warning is-dismissible"><p><strong>' .
			__( 'Your settings have been reset.', 'disable-dashboard-for-woocommerce' ) . '</strong></p></div>';
	}

	function save() {
		parent::save();
		$this->maybe_reset_settings();
		if ( isset( $_GET['tab'] ) && 'wc_bloat' === $_GET['tab'] ) {
			wp_safe_redirect( add_query_arg( '', '' ) );
			exit;
		}
	}

}

endif;

return new Disable_WC_Bloat_Settings_Settings();
