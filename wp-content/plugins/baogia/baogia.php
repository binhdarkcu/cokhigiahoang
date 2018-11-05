<?php

/*
 * Plugin Name: Quản lý báo giá
 * Plugin URI: 
 * Author URI: 
 * Description: Plugin quản lý báo giá
 * Author: Admin
 * Version:1.0
 */

class WP_Video_Management {

    function __construct() {

        $this->_role = PILOT;
        add_action('admin_menu', array($this, 'wpa_add_menu'));
        add_action('wp_enqueue_scripts', array($this, 'wpa_plugin_styles_scripts'));

        add_shortcode('video_list', array($this, 'create_video_grid_view'));
        add_shortcode('create_video_upload_form', array($this, 'video_upload_form_client'));
        register_activation_hook(__FILE__, array($this, 'wpa_install'));
        register_deactivation_hook(__FILE__, array($this, 'wpa_uninstall'));
    }

    //Adding menu
    function wpa_add_menu() {
        $hook_suffix = add_menu_page('Báo giá', 'Quản lý báo giá', 'manage_options', 'bao-gia', array($this, 'display_order_page'));

        add_action('load-' . $hook_suffix, array($this, 'wpa_admin_styles_scripts'));
    }

    //Enqueue scripts/styles for admin only
    function wpa_admin_styles_scripts() {
        wp_enqueue_style('style', plugins_url('/css/style.css', __FILE__));
        wp_enqueue_script('jquery');
        wp_enqueue_style('admin_css', plugins_url('/css/admin_css.css', __FILE__));
//        wp_enqueue_script('video-management', plugins_url('/js/video-management.js', __FILE__));
    }

    //Enqueue scripts/styles
    function wpa_plugin_styles_scripts() {
        if (!is_admin()) {
            wp_enqueue_style('video-gridview', plugins_url('/css/video-gridview.css', __FILE__));
            wp_enqueue_style('video-js', plugins_url('/css/video-js.css', __FILE__));
            wp_enqueue_script('jquery');
            wp_enqueue_script('video', plugins_url('/js/video.js', __FILE__));
        }
    }

    //Render videos management page
    function display_order_page() {
        $action = "gridview";
        if (isset($_GET ['action']) and $_GET ['action'] != '') {
            $action = trim($_GET ['action']);
        }
        if (strtolower($action) == strtolower('addnew')) {
            include_once('views/upload_form.php');
        } else {
            wp_enqueue_style('magnific-popup', plugins_url('/css/magnific-popup.css', __FILE__));
            wp_enqueue_script('jquery.magnific-popup.min', plugins_url('/js/jquery.magnific-popup.min.js', __FILE__));
            wp_enqueue_style('wp-mediaelement');
            wp_enqueue_script('wp-mediaelement');
            include_once( 'views/management.php' );
        }
    }

    //TODO: remove this
    function create_video_grid_view() {
        $this->wpa_plugin_styles_scripts();
        include_once('views/video-grid.php');
    }

    //render upload screen
    function video_upload_form_client() {
        wp_enqueue_style('style', plugins_url('/css/style.css', __FILE__));
        wp_enqueue_script('video-management', plugins_url('/js/video-management.js', __FILE__));
        include_once('views/upload_form.php');
    }

    /*
     * Actions perform on activation of plugin
     */

    function wpa_install() {
        global $wpdb;
        $table_name = $wpdb->prefix . "bao_gia";
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user_id mediumint(9) NOT NULL ,
		display_name tinytext DEFAULT '' NOT NULL,
		download_name tinytext DEFAULT '' NOT NULL,
		thumbnail tinytext DEFAULT '' NULL,
		description text NULL,
		video_format varchar(50) NOT NULL,
		duration varchar(50) NOT NULL,
                post_id mediumint(9) NOT NULL,
                is_published boolean DEFAULT false,
                created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    /*
     * Actions perform on de-activation of plugin
     */

    function wpa_uninstall() {
        
    }

}

new WP_Video_Management();
?>
