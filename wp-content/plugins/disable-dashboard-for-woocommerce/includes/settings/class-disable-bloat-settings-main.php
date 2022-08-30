<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( !class_exists( 'Disable_WC_Bloat_Settings_Main' ) ) {
    class Disable_WC_Bloat_Settings_Main extends Disable_WC_Bloat_Settings_Section
    {
        function __construct()
        {
            $this->id = '';
            $this->desc = __( 'Main settings', 'disable-dashboard-for-woocommerce' );
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
                    'desc' => '<span class="dashicons dashicons-performance"></span>',
                ),
                array(
                    'type' => 'sectionend',
                ),
                array(
                    'name' => __( 'Main Settings - WooCommerce Bloat', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Using options from this tab, you will be able to turn off general WooCommerce functionalities which are not required to run your store. These features cannot be disabled using standard WooCommerce configuration options.<hr>', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                // WooCommerce Admin title
                array(
                    'name' => __( 'WooCommerce Admin', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'WooCommerce Admin’s features continue to become increasingly blended into the merchant experience in WooCommerce. Using the options below, you can effectively disable WooCommerce Admin, Analytics, Home screen and other features that are making your admin panel slower.', 'disable-dashboard-for-woocommerce' ),
                ),
                // WooCommerce Admin, Analytics tab, Notification bar
                array(
                    'name'     => __( 'WooCommerce Admin', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will completely disable WooCommerce Admin, Analytics tab and Notification bar. Home screen feature will also be disabled. <strong><span style="color:red">Note:</span> Reload the page after saving changes to see the results.</strong>', 'disable-dashboard-for-woocommerce.' ),
                    'id'       => 'wcbloat_admin_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce Admin', 'disable-dashboard-for-woocommerce' ),
                    'default'  => 'yes',
                ),
                // Marketing Hub
                array(
                    'name'     => __( 'Marketing Hub', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will completely disable WooCommerce Marketing Hub. Coupon menu entry will stay accessible the old way (WooCommerce -> Coupons).' ),
                    'id'       => 'wcbloat_marketing_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Marketing Hub', 'disable-dashboard-for-woocommerce' ),
                    'default'  => 'yes',
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'WooCommerce promotions', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'WooCommerce is constantly trying to promote and advertise add-ons by adding nags to your admin panel. Now you can turn off or hide them.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Connect your store to WooCommerce.com to receive extensions updates and support. message for WooCommerce.com plugins
                array(
                    'name'     => __( 'WooCommerce.com notice', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Disables notice from WooCommerce.com plugins: <code>Connect your store to WooCommerce.com to receive extensions updates and support</code>.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wc_helper_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce.com notice', 'disable-dashboard-for-woocommerce' ),
                    'default'  => 'yes',
                ),
                // Disable Marketplace Suggestions
                array(
                    'name'     => __( 'Marketplace Suggestions', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will disable Marketplace Suggestions. Suggestions are visible on the product edit page and on the Orders pages.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wc_marketplace',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce Marketplace Suggestions', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable Extensions & My Subscriptions submenu
                array(
                    'name'     => __( 'Extensions & My Subscriptions submenus', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Hide Extensions & My Subscriptions submenus in the WooCommerce menu in your admin panel menu. <strong>Reload the page after saving changes to see the results.</strong>', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_remove_addon_submenu',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Extensions & My Subscriptions submenus', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable Recommended shipping solutions metabox
                array(
                    'name'     => __( 'Recommended shipping solutions metabox', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Recommended shipping solutions metabox is appearing on Shipping configurations pages in WooCommerce and is primarily used for advertisement.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'woocommerce_settings_shipping_recommendations_hidden',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Recommended shipping solutions metabox', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable Recommended payments plugins metabox
                array(
                    'name'     => __( 'Recommended payments plugins metabox', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Recommended payments plugins metabox is appearing on Payments configuration pages in WooCommerce and is primarily used for advertisement.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'woocommerce_setting_payments_recommendations_hidden',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Recommended payments plugins metabox', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                // WooCommerce back-end scripts
                array(
                    'name' => __( 'WooCommerce back-end scripts', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Speed up your site by turning off unwanted scripts that are being loaded in the background in admin panel.', 'disable-dashboard-for-woocommerce' ) . $buy_pro_bar,
                ),
                // Disable WooCommerce Status Meta Box
                array(
                    'name'     => __( 'WooCommerce Status Meta Box', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Enabling this option will remove WooCommerce Status Meta Box from WordPress Dashboard.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wc_status_meta_box_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce Status Meta Box', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable WooCommerce Blocks (back-end) PRO
                array(
                    'name'              => __( 'WooCommerce Blocks (back-end)', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Activating this option will disable WooCommerce Blocks scripts from loading in the admin panel. The WordPress Block Editor will load and run faster, but WooCommerce Blocks won\'t be available to add from the Block Editor level.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wc_blocks_backend_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable WooCommerce Blocks (back-end)', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                // Your Store's Front-end
                array(
                    'name' => __( 'Your Store\'s Front-end', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'By default, quite a lot of scripts and styles is automatically loading while browsing the front-end of your shop. Use the options below to disable them.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable WooCommerce Widgets
                array(
                    'name'     => __( 'WooCommerce Widgets', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'WooCommerce by default comes with a lot of widgets installed. They often are not used at all, but can add backend load and front-end load. Use this option to disable the WooCommerce widgets. <strong>Warning: </strong>Please make sure that you are not using any of WooCommerce Widgets anywhere in your site.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wc_widgets_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce Widgets', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable WooCommerce Scripts and Styles
                $settings_wcbloat[] = array(
                    'name'     => __( 'WooCommerce scripts and styles', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Use this option to disable WooCommerce scripts (javascript) and styles (CSS) everywhere except on product, cart and checkout pages.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wc_scripts_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce scripts and styles', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable WooCommerce Cart Fragments
                $settings_wcbloat[] = array(
                    'name'     => __( 'WooCommerce Cart Fragments', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'The cart fragments feature is used to update the cart total without refreshing the page. <strong>Warning:</strong> Disabling it will speed up your store, but may result in wrong calculations in mini cart. Use with caution.' ),
                    'id'       => 'wcbloat_wc_fragmentation_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable WooCommerce Cart Fragments', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable WooCommerce Blocks (front-end) PRO
                array(
                    'name'              => __( 'WooCommerce Blocks (front-end)', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'WooCommerce Blocks module loads tons of CSS files (200 KB) in your site front-end. Activating this option will turn off loading the WooCommerce Blocks in your store and should improve page loading speed. If you are using any of the Blocks, they won\'t display after enabling this option.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wc_blocks_frontend_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable WooCommerce Blocks (front-end)', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable unnecessary Stripe scripts PRO
                array(
                    'name'              => __( 'Stripe scripts', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Enabling this option will disable Stripe Payment Request Button on all product pages. The Stripe scripts won\'t be loaded on the product pages so the pages should be loading faster.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wc_stripe_scripts_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable unnecessary Stripe scripts', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
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
return new Disable_WC_Bloat_Settings_Main();