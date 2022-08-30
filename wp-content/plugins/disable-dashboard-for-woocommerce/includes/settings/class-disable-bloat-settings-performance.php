<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( !class_exists( 'Disable_WC_Bloat_Settings_Site_Performance' ) ) {
    class Disable_WC_Bloat_Settings_Site_Performance extends Disable_WC_Bloat_Settings_Section
    {
        function __construct()
        {
            $this->id = 'performance';
            $this->desc = sprintf( __( 'Site performance', 'disable-dashboard-for-woocommerce' ) );
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
                    'desc' => '<span class="dashicons dashicons-admin-site-alt"></span>',
                ),
                array(
                    'type' => 'sectionend',
                ),
                array(
                    'name' => __( 'Site performance', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Page load time is very important for your visitors. To improve page load time, try to disable scripts, features, and unnecessary queries:<hr>', 'disable-dashboard-for-woocommerce' ),
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                array(
                    'name' => __( 'Speed up your site', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Use the settings from this section to reduce page load time on the front-end of your WordPress site. Before disabling them, please make sure that you will not use any of these features - so they can be safely turned off.', 'disable-dashboard-for-woocommerce' ) . $buy_pro_bar,
                ),
                // Disable Password Strength Meter
                array(
                    'name'     => __( 'Password Strength Meter', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'Removes the WordPress and WooCommerce password strength meter scripts (over 400 KB) from non-essential pages.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_password_meter_disable',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Disable Password Strength Meter', 'disable-dashboard-for-woocommerce' ),
                ),
                // Load comment script only when needed
                array(
                    'name'     => __( 'Comments scripts', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'By default, WordPress Comments javascript files are loaded everywhere on your site. This option will load the Comments script only when needed (on single posts and pages with existing comments).', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_load_comment_scripts_when_needed',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Load Comments script only when needed', 'disable-dashboard-for-woocommerce' ),
                ),
                // Prevent auto-linking URLs in comments
                array(
                    'name'     => __( 'Auto-linking URLs in comments', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip' => __( 'In a standard WordPress installation, adding clickable links to the comments is made on the fly while generating the page which may be time- and resource-consuming. This option will prevent auto-linking URLs in comments.', 'disable-dashboard-for-woocommerce' ),
                    'id'       => 'wcbloat_prevent_linking_url_comments',
                    'type'     => 'checkbox',
                    'desc'     => __( 'Prevent auto-linking URLs in comments', 'disable-dashboard-for-woocommerce' ),
                ),
                // Remove DNS prefetch to s.w.org PRO
                array(
                    'name'              => __( 'DNS prefetch to s.w.org', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'DNS prefetching is an attempt to resolve domain names before a user tries to follow a link. Activating this option will remove DNS prefetch to s.w.org and may result in page load optimization.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_remove_dns_prefetch',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove DNS prefetch to s.w.org', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable Sidebar WordPress Widgets PRO
                $settings_wcbloat[] = array(
                    'name'              => __( 'Disable Sidebar WordPress Widgets', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'WordPress by default comes with a lot of widgets installed. They often are not used at all, but can add backend load and front-end load. Use this option to disable the widgets.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_sidebar_widgets_disable',
                    'type'              => 'multiselect',
                    'class'             => $is_premium_multiselect,
                    'css'               => 'width:600px;height:164px',
                    'desc'              => $is_pro_badge . __( 'Disable Sidebar WordPress Widgets. The <strong>ones you choose will be disabled</strong>, and the <strong>ones that had not been selected</strong> will stay <strong>active</strong>.<br>Please make sure that you are not using any of WooCommerce Widgets anywhere in your site.', 'disable-dashboard-for-woocommerce' ),
                    'options'           => array(
                    'archives'   => 'Archives',
                    'audio'      => 'Audio',
                    'block'      => 'Block',
                    'calendar'   => 'Calendar',
                    'categories' => 'Categories',
                    'html'       => 'Custom HTML',
                    'gallery'    => 'Gallery',
                    'image'      => 'Image',
                    'meta'       => 'Meta',
                    'navigation' => 'Navigation Menu',
                    'pages'      => 'Pages',
                    'rss'        => 'RSS',
                    'comments'   => 'Recent Comments',
                    'posts'      => 'Recent Posts',
                    'search'     => 'Search',
                    'tag'        => 'Tag Cloud',
                    'text'       => 'Text',
                    'video'      => 'Video',
                ),
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove WordPress Meta Generator Tag PRO
                array(
                    'name'              => __( 'WordPress & WooCommerce Meta Generator Tag', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Meta Generator Tag displays the WordPress & WooCommerce version number. Removing the meta generator tag protects you against attacks and may reduce your web page\'s size. <br> Use this option to disable the Meta Tag generated by WordPress, WooCommerce, and many other plugins that hook up with the wp_generator action.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_wp_meta_generator_disable',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove WordPress & WooCommerce Meta Generator Tag', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove emoji styles and scripts PRO
                array(
                    'name'              => __( 'Emoji styles and scripts', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Remove the code bloat used to add support for emojis in older browsers. Emoticons and emojis will still work in browsers that have built-in support for them.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_remove_emoji_scripts',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove emoji styles and scripts', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                array(
                    'type' => 'sectionend',
                    'id'   => 'wcbloat_general',
                ),
                // Remove unwanted scripts from header section
                array(
                    'name' => __( 'Remove scripts from Header', 'disable-dashboard-for-woocommerce' ),
                    'type' => 'title',
                    'id'   => 'wcbloat_general',
                    'desc' => __( 'Remove unwanted scripts from the Header section of your site. The header section is used on all of your subpages and in most cases you do not need to load all the default scripts. Use the option below to turn them off.', 'disable-dashboard-for-woocommerce' ),
                ),
                // Remove RSS Feed Links PRO
                array(
                    'name'              => __( 'RSS Feed Links', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'If you do not use RSS feeds, you can safely turn them off without losing any functionality. Links to RSS Feeds will be removed from the plugin header, but the process of generating RSS feeds will still be active.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_remove_rss_links',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove RSS Feed Links', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Disable the RSS feeds PRO
                array(
                    'name'              => __( 'RSS feeds', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'You can also completely disable the RSS generation process by activating this option. If it is a feature that you do not plan to use, you can disable RSS Feeds.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_all_feeds',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Disable all RSS feeds', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove Feed Generator Tag PRO
                array(
                    'name'              => __( 'Feed Generator Tag', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'This option will Remove the Generator Tag From RSS Feeds', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_remove_feed_generator_tag',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove the Generator Tag From RSS Feeds', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove Link to the WLW Manifest File PRO
                array(
                    'name'              => __( 'Windows Live Writer', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'If are not using software called Windows Live Writer, you can safely turn off this feature that is added to your header by default.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_wlw_link',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove Link to the Windows Live Writer Manifest File', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove RSD link PRO
                array(
                    'name'              => __( 'RSD Link', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'RSD link is a tag that is added to your Header by default. The RSD link is used by software blog clients. If you access your site admin panel from the browser then it is safe for you to remove the RSD Link.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_disable_rsd_link',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove RSD link', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
                // Remove Shortlink From HTTP Header PRO
                array(
                    'name'              => __( 'Shortlink', 'disable-dashboard-for-woocommerce' ),
                    'desc_tip'          => __( 'Shortlink is the shorter version of the post or page URL. Shortlink (enabled in WordPress by default) creates a separate request on every page.', 'disable-dashboard-for-woocommerce' ),
                    'id'                => 'wcbloat_remove_shortlink',
                    'type'              => 'checkbox',
                    'desc'              => __( 'Remove Shortlink From HTTP Header', 'disable-dashboard-for-woocommerce' ) . $is_pro_badge,
                    'custom_attributes' => $is_premium_readonly,
                ),
            );
            return $settings;
        }
    
    }
}