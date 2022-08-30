<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( !class_exists( 'Disable_WC_Bloat_Settings_Admin' ) ) {
    class Disable_WC_Bloat_Settings_Admin extends Disable_WC_Bloat_Settings_Section
    {
        function __construct()
        {
            $this->id = 'admin-panel-bloat';
            $this->desc = sprintf( __( 'Admin panel optimization', 'disable-dashboard-for-woocommerce' ) );
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
                    'desc' => '<span class="dashicons dashicons-hammer"></span>',
                ),
                array(
                    'type' => 'sectionend',
                ),
                array(
                    'name' => __( 'Admin panel optimization', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'By default, the WordPress admin panel is cluttered with preinstalled elements that may distract you from your work. You can simplify your WordPress admin panel by hiding or turning them off.<hr>', 'disable-dashboard-for-woocommerce' ) . $buy_pro_bar,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Clean admin interface', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'If you love a simple and flexible interface, use the options below to maximize your performance while browsing through the WordPress admin panel. By removing unnecessary elements, you will be 100% focused on your tasks.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Hide update notice for non-admin users
                array(
                    'name'     => __( 'Hide update notice for non-admin users', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'The next time any user with the Role set as Subscriber, Contributor, Author, or Editor access the WordPress back-end, they will not be prompted to update the WordPress core. The notification will continue to display for admin users.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_wp_update_nag_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Hide update notice for non-admin users', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable Dashboard widgets PRO
                array(
                    'title'             => __( 'Disable WordPress Dashboard widgets', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'WordPress by default comes with a lot of Dashboard widgets installed. They often are not used at all, but can add backend load and front-end load. Choose Dashboard Widgets you would like to disable for this site.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_dashboard_widgets_disable',
                    'default'           => '',
                    'type'              => 'multiselect',
                    'class'             => $is_premium_multiselect,
                    'desc'              => $is_pro_badge . __( 'Choose which of the WordPress Dashboard Widgets should be disabled. The <strong>ones you choose will be disabled</strong>, and the <strong>ones that had not been selected</strong> will stay <strong>active</strong>.', 'disable-dashboard-for-woocommerce' ),
                    'options'           => array(
                    'site_health' => 'Site Health Status',
                    'at_a_glance' => 'At a Glance',
                    'activity'    => 'Activity',
                    'draft'       => 'Quick Draft',
                    'news'        => 'WordPress Events and News',
                    'welcome'     => 'Welcome panel',
                ),
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove the WordPress logo ("W") from the admin bar PRO
                array(
                    'name'              => __( 'WordPress logo in the admin bar', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will hide the WordPress logo in the upper left corner. The logo won\'t be visible in your admin panel and in your site (on the admin bar visible on the front-end after logging in.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_w_logo_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove the WordPress logo (“W”) from the admin bar', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove admin footer text PRO
                array(
                    'name'              => __( 'Admin footer text', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option hides the text at the bottom of the WordPress admin: <code>Thank you for creating with WordPress</code> on the bottom left, and the WordPress version on the bottom right.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_footer_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove admin footer text', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'WordPress login page', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'There are situations when you may prefer to hide or change the standard WordPress branding on the Login Page.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Hide WordPress logo on the WordPress Login Page PRO
                array(
                    'name'              => __( 'Hide WordPress logo on the Login Page', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Hide WordPress logo on the WordPress Login Page', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_hide_wp_logo_on_login_page',
                    'desc'              => __( 'Hide standard WordPress Logo from Login Page', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'type'              => 'checkbox',
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Change the Logo URL on the WordPress Login Page PRO
                array(
                    'name'              => __( 'Change the Logo Link', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'By default, the WordPress login page displays the WordPress logo which is linking to WordPress.org site. After activating this option, the logo on the login page will be linking to your site\'s homepage.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_logo_url_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Change the Logo Link on the WordPress Login Page' . $is_pro_badge, 'disable-dashboard-for-woocommerce' ),
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Change the Logo title the WordPress Login Page PRO
                array(
                    'name'              => __( 'Change the Logo title parameter', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'By default, the WordPress Logo displayed on the WordPress Login Page has a title parameter that says <code>Powered by WordPress</code>. After activating this option, it will match your Site Name.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_logo_title',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Change the Logo title parameter on the WordPress Login Page' . $is_pro_badge, 'disable-dashboard-for-woocommerce' ),
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable WordPress Login Language Switcher PRO
                array(
                    'name'              => __( 'Disable WordPress Login Language Switcher', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will disable the language selector which allows users to switch languages from a dropdown on the login screen if more than one language is enabled on your WordPress installation.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_language_select_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable WordPress Login Language Switcher' . $is_pro_badge, 'disable-dashboard-for-woocommerce' ),
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