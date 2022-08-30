<?php

/**
 * Plugin Name: Disable Bloat for WordPress & WooCommerce
 * Plugin URI: https://disablebloat.com/
 * Description: All-in-One solution to speed up your WordPress & WooCommerce site. Remove unnecessary features and make your site faster and cleaner.
 * Version: 3.0.3
 * Author: Disable Bloat
 * Developer: Disable Bloat
 * Author URI: https://disablebloat.com/
 * Text Domain: disable-dashboard-for-woocommerce
 * Domain Path: /languages
 * Requires at least: 4.5
 * Tested up to: 6.0
 * Requires PHP: 5.6
 * WC requires at least: 4.0
 * WC tested up to: 6.6
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'wcbloat_fs' ) ) {
    wcbloat_fs()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    if ( !function_exists( 'wcbloat_fs' ) ) {
        
        if ( !function_exists( 'wcbloat_fs' ) ) {
            // Create a helper function for easy SDK access.
            function wcbloat_fs()
            {
                global  $wcbloat_fs ;
                
                if ( !isset( $wcbloat_fs ) ) {
                    // Activate multisite network integration.
                    if ( !defined( 'WP_FS__PRODUCT_10157_MULTISITE' ) ) {
                        define( 'WP_FS__PRODUCT_10157_MULTISITE', true );
                    }
                    // Include Freemius SDK.
                    require_once dirname( __FILE__ ) . '/includes/freemius/start.php';
                    $wcbloat_fs = fs_dynamic_init( array(
                        'id'             => '10157',
                        'slug'           => 'disable-dashboard-for-woocommerce',
                        'premium_slug'   => 'disable-dashboard-for-woocommerce-pro',
                        'type'           => 'plugin',
                        'public_key'     => 'pk_16f665643a809fd13e01f8a3d1381',
                        'is_premium'     => false,
                        'premium_suffix' => 'PRO',
                        'has_addons'     => false,
                        'has_paid_plans' => true,
                        'menu'           => array(
                        'contact' => false,
                        'support' => false,
                        'pricing' => false,
                    ),
                        'pricing'        => false,
                        'anonymous_mode' => !function_exists( 'is_anonymous_mode_disabled__premium_only' ) || !is_anonymous_mode_disabled__premium_only(),
                        'is_live'        => true,
                    ) );
                }
                
                return $wcbloat_fs;
            }
            
            // Init Freemius.
            wcbloat_fs();
            // Signal that SDK was initiated.
            do_action( 'wcbloat_fs_loaded' );
        }
    
    }
    if ( function_exists( 'fs_override_i18n' ) ) {
        fs_override_i18n( array(
            'opt-in' => __( '', 'disable-dashboard-for-woocommerce' ),
        ), 'disable-dashboard-for-woocommerce' );
    }
    // Freemius END
    // Check if WooCommerce is active
    function wcbloat_woo_not_activated()
    {
        ?>
    <div class="notice notice-error is-dismissible">
        <p><?php 
        _e( '<strong>Disable Bloat for WordPress & WooCommerce</strong> requires WooCommerce to be installed and activated.', 'disable-dashboard-for-woocommerce' );
        ?></p>
    </div>
    <?php 
    }
    
    $wcbloat_plugin = 'woocommerce/woocommerce.php';
    
    if ( !in_array( $wcbloat_plugin, apply_filters( 'active_plugins', get_option( 'active_plugins', array() ) ) ) && !(is_multisite() && array_key_exists( $wcbloat_plugin, get_site_option( 'active_sitewide_plugins', array() ) )) ) {
        add_action( 'admin_notices', 'wcbloat_woo_not_activated' );
        return;
    }
    
    /**
     * WooCommerce version.
     */
    $wc_version = ( function_exists( 'wc_version' ) ? wc_version() : null );
    if ( $wc_version === null && defined( 'WC_VERSION' ) ) {
        $wc_version = WC_VERSION;
    }
    if ( !class_exists( 'Disable_WC_Bloat' ) ) {
        final class Disable_WC_Bloat
        {
            public  $version = '3.0.0' ;
            protected static  $_instance = null ;
            public static function instance()
            {
                if ( is_null( self::$_instance ) ) {
                    self::$_instance = new self();
                }
                return self::$_instance;
            }
            
            function __construct()
            {
                // Set up localisation
                load_plugin_textdomain( 'disable-dashboard-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
                // Include required files
                $this->includes();
                // Admin
                if ( is_admin() ) {
                    $this->admin();
                }
            }
            
            function action_links( $links )
            {
                $custom_links = array();
                $custom_links[] = '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=wc_bloat' ) . '">' . __( 'Settings', 'woocommerce' ) . '</a>';
                if ( !wcbloat_fs()->is_premium() ) {
                    $custom_links[] = '<a href="https://disablebloat.com/?utm_source=plugins_list&utm_medium=referral&utm_campaign=Plugin+links" target="_blank"><b>' . __( 'Upgrade', 'disable-dashboard-for-woocommerce' ) . '</b></a>';
                }
                
                if ( wcbloat_fs()->is_plan( 'pro' ) ) {
                    $wcbloat_account_url = wcbloat_fs()->get_account_url();
                    $custom_links[] = '<a href="' . $wcbloat_account_url . '">' . __( 'My Account', 'disable-dashboard-for-woocommerce' ) . '</a>';
                }
                
                return array_merge( $custom_links, $links );
            }
            
            /**
             * Include core files
             */
            function includes()
            {
                $this->core = (require_once 'includes/class-disable-bloat-core.php');
                $this->core = (require_once 'includes/functions/disable-bloat-functions_free.php');
            }
            
            function admin()
            {
                add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );
                // Settings
                add_filter( 'woocommerce_get_settings_pages', array( $this, 'add_woocommerce_settings_tab' ) );
                require_once 'includes/settings/class-disable-bloat-settings-section.php';
                $this->settings = array();
                $this->settings['general'] = (require_once 'includes/settings/class-disable-bloat-settings-main.php');
                require_once 'includes/settings/class-disable-bloat-settings-admin.php';
                $this->settings['admin'] = new Disable_WC_Bloat_Settings_Admin( 1 );
                require_once 'includes/settings/class-disable-bloat-settings-performance.php';
                $this->settings['performance'] = new Disable_WC_Bloat_Settings_Site_Performance( 1 );
                require_once 'includes/settings/class-disable-bloat-settings-wpcore.php';
                $this->settings['core'] = new Disable_WC_Bloat_Settings_Core( 1 );
                require_once 'includes/settings/class-disable-bloat-settings-block.php';
                $this->settings['block'] = new Disable_WC_Bloat_Settings_Block_Editor( 1 );
                require_once 'includes/settings/class-disable-bloat-settings-thirdparty.php';
                $this->settings['thirdparty'] = new Disable_WC_Bloat_Settings_Thirdparty( 1 );
            }
            
            /**
             * Add settings tab to WooCommerce settings.
             */
            function add_woocommerce_settings_tab( $settings )
            {
                $settings[] = (require_once 'includes/settings/class-disable-bloat-settings.php');
                return $settings;
            }
        
        }
    }
    if ( !function_exists( 'disable_woocommerce_bloat' ) ) {
        /**
         * Returns the main instance of Disable_WC_Bloat to prevent the need to use globals.
         */
        function disable_woocommerce_bloat()
        {
            return Disable_WC_Bloat::instance();
        }
    
    }
    disable_woocommerce_bloat();
    // Add CSS stylesheet file to the plugin Settings page
    function wcbloat_custom_wp_admin_style()
    {
        $url = '//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        
        if ( strpos( $url, 'tab=wc_bloat' ) !== false ) {
            wp_register_style( 'wcbloat_wp_admin_css', plugin_dir_url( __FILE__ ) . 'assets/css/disable-bloat-admin-style.css' );
            wp_enqueue_style( 'wcbloat_wp_admin_css' );
        }
    
    }
    
    add_action( 'admin_enqueue_scripts', 'wcbloat_custom_wp_admin_style' );
}
