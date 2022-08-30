<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( !class_exists( 'Disable_WC_Bloat_Settings_Block_Editor' ) ) {
    class Disable_WC_Bloat_Settings_Block_Editor extends Disable_WC_Bloat_Settings_Section
    {
        function __construct()
        {
            $this->id = 'block';
            $this->desc = sprintf( __( 'Block Editor', 'disable-dashboard-for-woocommerce' ) );
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
                    'desc' => '<span class="dashicons dashicons-block-default"></span>',
                ),
                array(
                    'type' => 'sectionend',
                ),
                array(
                    'name' => __( 'Block Editor', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Using Block Editor can significantly slow down your page during editing posts and while browsing through your site. You can decide to either turn Gutenberg (WordPress built-in Block Editor) off completely or keep it on and only disable unnecessary features.<hr>', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Disable Gutenberg', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                ),
                // Disable Gutenberg
                array(
                    'name'     => __( 'Gutenberg', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'By enabling this option, you will turn off Gutenberg Block Editor for all supported post types (including pages). All Gutenberg action and filter hooks will be deactivated, and Gutenberg frontend scripts won’t load on your site too.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_disable_gutenberg',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Gutenberg', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Disable Gutenberg features', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'If you decide to keep Gutenberg on, you can at least maximize your experience by tweaking its features to match your needs.', 'disable-dashboard-for-woocommerce' ) . $buy_pro_bar,
                ),
                // Auto-close Welcome Guide PRO
                array(
                    'name'              => __( 'Welcome Guide', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Turn off the annoying pop-up Welcome Guide Modal. Users will still be able to open it manually via the context menu.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_autoclose_welcome_guide',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Auto-close Welcome Guide', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable the WordPress Block Directory PRO
                array(
                    'name'              => __( 'WordPress Block Directory', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'As Blocks are in fact plugins, it’s a potential security threat to use Block Directory. New Blocks are added to the Directory automatically, without human review.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_block_directory',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable WordPress Block Directory', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove the default block patterns from WordPress PRO
                array(
                    'name'              => __( 'Remove the default block patterns', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Patterns is a feature in the Block editor that lets you save and reuse patterns of many blocks. It is similar to reusable blocks, but they are not global by default.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_default_block_patterns',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove the default block patterns', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Auto-exit the Fullscreen Mode on editor load PRO
                array(
                    'name'              => __( 'Auto-exit the Fullscreen Mode on editor load', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Users will still be able to enter it manually via the context menu.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_fullscreen_editor_mode',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Auto-exit the Fullscreen Mode on editor load', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Deactivate the Template Editor PRO
                array(
                    'name'              => __( 'Deactivate the Template Editor', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'The Template Editor allows users to edit their theme\'s templates from within the Block Editor. Block themes might overwrite this setting.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_template_editor',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Deactivate the Template Editor', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
            );
            return $settings;
        }
    
    }
}