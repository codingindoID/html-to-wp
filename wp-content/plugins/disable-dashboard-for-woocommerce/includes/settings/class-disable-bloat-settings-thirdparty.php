<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( !class_exists( 'Disable_WC_Bloat_Settings_Thirdparty' ) ) {
    class Disable_WC_Bloat_Settings_Thirdparty extends Disable_WC_Bloat_Settings_Section
    {
        function __construct()
        {
            $this->id = 'thirdparty';
            $this->desc = sprintf( __( 'Third-party plugins bloat', 'disable-dashboard-for-woocommerce' ) );
            parent::__construct();
        }
        
        function get_settings()
        {
            
            if ( wcbloat_fs()->is_free_plan() ) {
                $buy_pro_bar = __( '<p style="padding: 10px; background-color: white; max-width: 700px;">Get <a href="https://disablebloat.com/?utm_source=settings&utm_medium=referral&utm_campaign=Buy+PRO+Bar" target="_blank">Disable Bloat for WordPress & WooCommerce PRO</a> to unlock the<span class="wcbloat-pro-label">PRO</span>options.', 'disable-dashboard-for-woocommerce' );
                $is_premium_readonly = array(
                    'disabled' => 'disabled',
                );
                $is_pro_badge = '<span class="wcbloat-pro-label">PRO</span>';
                $is_premium_multiselect = '';
            }
            
            $settings = array(
                array(
                    'type' => 'title',
                    'desc' => '<span class="dashicons dashicons-admin-plugins"></span>',
                ),
                array(
                    'type' => 'sectionend',
                ),
                array(
                    'name' => __( 'Third-party plugins bloat', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'The plugin integrates with third-party plugins. Using the options from this section, you can hide or turn off unwanted User Interface elements that these plugins add to your admin panel by default. Options for the supported plugin will be always presented on this screen - the plugin does not detect if you have a specific plugin installed.<hr>', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'name' => __( 'Jetpack', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'WordPress often encourages you to install Jetpack and connect your site to WordPress.com. If you do not want Jetpack, you can remove the installation notice. If you are using Jetpack, you can disable Jetpack promotions.', 'disable-dashboard-for-woocommerce' ),
                ),
                // remove Jetpack installation notice
                array(
                    'name'     => __( 'Jetpack installation notice', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will remove Jetpack installation notice.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_jetpack_installation_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Remove Jetpack installation notice', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable Jetpack ads
                array(
                    'name'     => __( 'Jetpack promotions', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will disable Jetpack-related notices that promote services like the backup services VaultPress or WordPress Apps. Works only if you have Jetpack installed.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_jetpack_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Jetpack promotions', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Elementor', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Elementor is a great tool, but it may also lead to cluttering your WordPress Dashboard.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable Elementor overview Dashboard widget
                array(
                    'name'     => __( 'Elementor Dashboard widget', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will disable Elementor overview widget shown in WordPress Dashboard. Works only if you are using Elementor.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_elementor_widget_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Elementor Dashboard widget', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'SkyVerge', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'SkyVerge plugins are adding their own top-level admin menu item with their Dashboard. You may not want to use it.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable SkyVerge Dashboard
                array(
                    'name'     => __( 'SkyVerge Dashboard', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will disable SkyVerge Dashboard. Works only if you are using SkyVerge plugins.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wc_skyverge_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable SkyVerge Dashboard', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                // Disable Yoast PRO
                array(
                    'name' => __( 'Yoast SEO', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Yoast is a very handy plugin, but it may add to your admin panel some elements that would not be your first choice.', 'disable-dashboard-for-woocommerce' ) . $buy_pro_bar,
                ),
                array(
                    'name'              => __( 'Ads, Premium nags, Premium menu', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'If you do not want Yoast to scream about the premium version at all times, use this option. This option will disable Ads, Premium nags, Premium menu.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_yoast_premium_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable Ads, Premium nags, Premium menu', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'name'              => __( 'Yoast SEO Admin bar item', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will hide Yoast SEO item from WordPress Admin bar.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_yoast_admin_bar_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable Yoast SEO Admin bar item', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'name'              => __( 'Remove HTML Comments from the Front-end', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Yoast SEO does include some HTML commented-out code on your site’s front. It may lead to weaker page performance.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_yoast_html_comments_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove Yoast HTML Comments from the Front-end', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'name'              => __( 'Remove Yoast SEO Dashboard widget', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will Remove the Yoast SEO widget from your WordPress Dashboard.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_yoast_widget_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove Yoast SEO Dashboard widget', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Contact Form 7', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                ),
                // Disable Contact Form 7 JavaScript and CSS stylesheet on every page PRO
                array(
                    'name'              => __( 'Contact Form 7 JavaScript and CSS', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will disable Contact Form 7 JavaScript and CSS files from loading on every page. Works only if you are using Contact Form 7. Please remember to add the scripts manually to your contact page.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_cf7_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable Contact Form 7 JavaScript and CSS', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'UpDraftPlus', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                ),
                // Hide “UpdraftPlus” on admin toolbar PRO
                array(
                    'name'              => __( 'Hide “UpdraftPlus” on admin toolbar', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will hide “UpdraftPlus” on admin toolbar. Works only if you are using “UpdraftPlus”. Please remember to add the scripts manually to your contact page.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_updraftplus_menubar_disable',
                    'type'              => 'checkbox',
                    'css'               => 'min-width:300px;color: gray;',
                    'desc'              => __( 'Hide “UpdraftPlus” on admin toolbar', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Advanced Custom Fields', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                ),
                // Advanced Custom Fields: Remove admin interface PRO
                array(
                    'name'              => __( 'Hide Advanced Custom Fields admin menu', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will hide Advanced Custom Fields admin interface. Custom Fields admin menu item won\'t be available.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_acf_hide_menu',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Hide Advanced Custom Fields admin menu', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'WPML', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                ),
                // Remove WPML Meta Generator Tag PRO
                array(
                    'name'              => __( 'Remove WPML Meta Generator Tag', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will remove WPML Meta Generator Tag from WordPress Header.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wpml_remove_meta',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove WPML Meta Generator Tag', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
            );
            return $settings;
        }
    
    }
}