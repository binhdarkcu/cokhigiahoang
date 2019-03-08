<?php
include_once( plugin_dir_path(__FILE__) . '/uti/constants.php');
/*
 * Plugin Name: Quản lý báo giá
 * Plugin URI: 
 * Author URI: 
 * Description: Plugin quản lý báo giá
 * Author: Admin
 * Version:1.0
 */

class WP_Order_Management {

    function __construct() {

        add_action('admin_menu', array($this, 'wpa_add_menu'));

        register_activation_hook(__FILE__, array($this, 'wpa_install'));
        register_deactivation_hook(__FILE__, array($this, 'wpa_uninstall'));
    }

    //Adding menu
    function wpa_add_menu() {
        //Plugin dashboard page
        $hook_suffix = add_menu_page('Báo giá', 'Quản lý báo giá', 'manage_options', 'bao-gia', array($this, 'display_order_page'));
        add_action('load-' . $hook_suffix, array($this, 'wpa_admin_styles_scripts'));
        
        // Bao gia detail page
        $hook_for_detail_page = add_menu_page('custom_page', 'custom', 'manage_options','chi-tiet-bao-gia', array($this, 'show_order_detail_page'));
        add_action('load-' . $hook_for_detail_page, array($this, 'wpa_detail_page_scripts'));
        remove_menu_page('chi-tiet-bao-gia');
    }

    function wpa_detail_page_scripts(){
        wp_enqueue_script('baoGiaDetail', plugins_url('/js/bao-gia-detail.js', __FILE__));
        wp_enqueue_script('jQueryPrint', plugins_url('/libs/print/jQuery.print.js', __FILE__));
        wp_enqueue_style('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.css', __FILE__));
        wp_enqueue_style('baoGiaChiTietCSS', plugins_url('/css/bao-gia-chi-tiet.css', __FILE__));
        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
    }
    
    
    function wpa_admin_styles_scripts() {
        wp_enqueue_style('jquery.dataTables', plugins_url('/libs/DataTables-1.10.18/css/jquery.dataTables.css', __FILE__));
        wp_enqueue_style('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.css', __FILE__));
        wp_enqueue_style('iziModal', plugins_url('/libs/iziModal/iziModal.min.css', __FILE__));
        wp_enqueue_style('style', plugins_url('/css/style.css', __FILE__));
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery.dataTables', plugins_url('/libs/DataTables-1.10.18/js/jquery.dataTables.js', __FILE__));
        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
        wp_enqueue_script('iziModal', plugins_url('/libs/iziModal/iziModal.min.js', __FILE__));
        wp_enqueue_script('jQueryPrint', plugins_url('/libs/print/jQuery.print.js', __FILE__));
        wp_enqueue_script('custom', plugins_url('/js/custom.js', __FILE__));
        wp_localize_script('custom', 'plugin_api', array(
            'get_list_url' => plugins_url('api/get-list.php', __FILE__),
            'page_chi_tiet_url' => get_admin_url().'admin.php?page=chi-tiet-bao-gia',
            'statuses' => array(DA_XEM, DA_BAO_GIA, DA_THANH_TOAN, HOAN_THANH)
        ));
    }

    function show_order_detail_page(){
        include_once ('views/detail.php');
    }
    
    function display_order_page() {
        
        include_once( 'views/management.php' );
    }

    /*
     * Actions perform on activation of plugin
     */

    function wpa_install() {
        global $wpdb;
        $table_name = $wpdb->prefix . "bao_gia";
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
		full_name tinytext DEFAULT '' NOT NULL,
		phone_number tinytext DEFAULT '' NOT NULL,
		email tinytext DEFAULT '' NOT NULL,
		company tinytext NULL,
		status tinytext DEFAULT '' NOT NULL,
		order_detail text NULL,
                is_deleted boolean DEFAULT false,
                token tinytext NULL,
                token_timestamp INT UNSIGNED DEFAULT 0,
                created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		PRIMARY KEY (id)
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

new WP_Order_Management();
?>
