<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( !class_exists( 'Disable_WC_Bloat_Settings_Core' ) ) {
    class Disable_WC_Bloat_Settings_Core extends Disable_WC_Bloat_Settings_Section
    {
        function __construct()
        {
            $this->id = 'core';
            $this->desc = sprintf( __( 'WordPress Core', 'disable-dashboard-for-woocommerce' ) );
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
                    'desc' => '<span class="dashicons dashicons-code-standards"></span>',
                ),
                array(
                    'type' => 'sectionend',
                ),
                array(
                    'name' => __( 'WordPress Core', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'WordPress by default comes with a lot of powerful features. In fact, you will probably never use some of them. Disabling them will not only improve performance but will also give your site a higher security level. Disabling them can prevent attacks and make your WordPress site and admin panel faster.<hr>', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Updates', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Keeping your website updated is important. But some people prefer to do it manually. In these cases, using a built-in update system is not recommended, as it is highly resource-consuming.', 'disable-dashboard-for-woocommerce' ) . $buy_pro_bar,
                ),
                // Disable themes auto-updates
                array(
                    'name'     => __( 'Themes auto-updates', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will disable the automatic updates feature for themes. You will still be able to update the themes by manually clicking the <code>Update</code> button on the Plugins list, but plugins will never be updated automatically.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_themes_auto_update_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable themes auto-updates', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable plugins auto-updates
                array(
                    'name'     => __( 'Plugins auto-updates', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'This option will disable the automatic updates feature for plugins. You will still be able to update the plugins by manually clicking the <code>Update</code> button on the Plugins list, but plugins will never be updated automatically.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_plugins_auto_update_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable plugins auto-updates', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable all WordPress core updates PRO
                array(
                    'name'              => __( 'WordPress core updates', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This allows you to disable all WordPress core updates, including automatic updates. WordPress will not check for core updates and will not notify the users about the update availability.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_core_update_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable all WordPress core updates', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Speed and security', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'If you leave some of the core WordPress features active, they may result in a bloated database, lower security level, and lack of website speed optimization. Use the options below to disable some of the core features that are enabled in the default WordPress installation.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Disable XML-RPC API PRO
                array(
                    'name'              => __( 'XML-RPC API', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will disable the XML-RPC API functionality. XML-RPC is a specification that enables the communication between WordPress and other systems. If you disable XML-RPC, you will not be able to receive pingbacks and trackbacks.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_xml_rpc_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable XML-RPC API', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable File Editor PRO
                array(
                    'name'              => __( 'File Editor', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will disable the file editing tool in your WordPress admin panel. This disables the plugin and theme editors. Since editing plugin and theme files can be safely done manually over FTP and are not recommended to be done in the admin panel, you can safely disable this feature.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_file_editor_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable File Editor', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable post revisions PRO
                array(
                    'name'              => __( 'Post revisions', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'By default, WordPress uses post revisions to save each post revision in your database. It cannot be turned off using standard WordPress settings. You may want to disable revisions to reduce the WordPress database size.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_post_revisions_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable post revisions', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable Application Passwords PRO
                array(
                    'name'              => __( 'Application Passwords', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Application Passwords feature allows external applications to request some permissions on your website. Not every website needs APIs, and granting permission for an external application can lead to security issues. Activating this option will turn the Application Passwords feature off.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_app_passwords_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable Application Passwords', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable WordPress Heartbeat API PRO
                array(
                    'name'              => __( 'WordPress Heartbeat API', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'The WordPress Heartbeat API is a feature that provides real-time communication between the server and the browser when you are logged into your admin panel. Unfortunately, the AJAX requests from the API can pile up and generate high CPU usage, leading to server performance issues.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_heartbeat_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable WordPress Heartbeat API', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove script/style version parameter PRO
                array(
                    'name'              => __( 'Remove script/style version parameter', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Exposing your scripts\' versions to the public may not be a good idea and may be a potential security threat. This option will remove the script/style version parameter for your site front-end.
', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_remove_script_style_ver',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove script/style version parameter', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
            );
            return $settings;
        }
    
    }
}