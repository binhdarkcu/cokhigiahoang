<?php

/*
 * Plugin Name: Quản lý cài đặt sản phẩm
 * Plugin URI: 
 * Author URI: 
 * Description: Plugin quản lý cài đặt sản phẩm
 * Author: Admin
 * Version:1.0
 */

class WP_GHProduct_Management {

    function __construct() {

        add_action('admin_menu', array($this, 'wpa_add_menu'));
//        add_action( 'admin_enqueue_scripts', array($this, 'load_custom_styles') );
        
        register_activation_hook(__FILE__, array($this, 'wpa_install'));
        register_deactivation_hook(__FILE__, array($this, 'wpa_uninstall'));
    }

    //Adding menu
    function wpa_add_menu() {
        $hook_suffix = add_menu_page('Báo giá', 'Quản lý cài đặt', 'manage_options', 'cai-dat', array($this, 'display_order_page'));
        
        $hook_city =  add_submenu_page( 'cai-dat', 'Thành phố', 'Thành phố', 'administrator', 'thanh-pho', array($this, 'load_thanh_pho'));
        $hook_gian_giao = add_submenu_page( 'cai-dat', 'Bán/thuê giàn giáo nêm', 'Bán/thuê giàn giáo nêm', 'administrator', 'ban-thue-gian-giao', array($this, 'loa_gian_giao'));
        $hook_mua_VTH_500kg = add_submenu_page( 'cai-dat', 'Mua - vận thăng hàng - 500kg', 'Mua - VTH - 500kg', 'administrator', 'mua-vth-500kg', array($this, 'load_mua_vth_500kg'));
        add_submenu_page( 'cai-dat', 'Mua - vận thăng hàng - 1000kg', 'Mua - VTH - 1000kg', 'administrator', 'mua-vth-1000kg', array($this, 'load_mua_vth_1000kg'));
        add_submenu_page( 'cai-dat', 'Thuê - vận thăng hàng - 500kg', 'Thuê - VTH - 500kg', 'administrator', 'thue-vth-500kg', array($this, 'load_thue_vth_500kg'));
        add_submenu_page( 'cai-dat', 'Thuê - vận thăng hàng - 1000kg', 'Thuê - VTH - 1000kg', 'administrator', 'thue-vth-1000kg', array($this, 'load_thue_vth_1000kg'));

        add_action('load-' . $hook_suffix, array($this, 'wpa_admin_styles_scripts'));
        add_action('load-' . $hook_city, array($this, 'load_thanh_pho_styles'));
        add_action('load-' . $hook_gian_giao, array($this, 'load_gian_giao_styles'));
        add_action('load-' . $hook_mua_VTH_500kg, array($this, 'load_mua_VTH_500kg_styles'));
    }

    function load_custom_styles(){
        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
    }
    
    function wpa_admin_styles_scripts() {
//        wp_enqueue_style('jquery.dataTables', plugins_url('/libs/DataTables-1.10.18/css/jquery.dataTables.css', __FILE__));
//        wp_enqueue_style('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.css', __FILE__));
//        wp_enqueue_style('iziModal', plugins_url('/libs/iziModal/iziModal.min.css', __FILE__));
//        wp_enqueue_style('style', plugins_url('/css/style.css', __FILE__));
//        wp_enqueue_script('jquery');
//        wp_enqueue_script('jquery.dataTables', plugins_url('/libs/DataTables-1.10.18/js/jquery.dataTables.js', __FILE__));
//        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
//        wp_enqueue_script('iziModal', plugins_url('/libs/iziModal/iziModal.min.js', __FILE__));
//        wp_enqueue_script('custom', plugins_url('/js/custom.js', __FILE__));
    }

    //******************************************LOAD STYLES AND SCRIPTS*******************************
    function load_mua_VTH_500kg_styles(){
        wp_enqueue_style('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.css', __FILE__));
        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
        wp_enqueue_style('global_css', plugins_url('/css/global_css.css', __FILE__));
        wp_enqueue_style('gian_giao', plugins_url('/css/mua_VTH_500kg.css', __FILE__));
        wp_enqueue_script('gian_giao', plugins_url('/js/mua_VTH_500kg.js', __FILE__));
        wp_enqueue_script('support_func', plugins_url('/js/support_func.js', __FILE__)); 
    }
    
    function load_gian_giao_styles(){
        wp_enqueue_style('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.css', __FILE__));
        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
        wp_enqueue_style('global_css', plugins_url('/css/global_css.css', __FILE__));
        wp_enqueue_style('gian_giao', plugins_url('/css/gian_giao.css', __FILE__));
        wp_enqueue_script('gian_giao', plugins_url('/js/gian_giao.js', __FILE__));
        wp_enqueue_script('support_func', plugins_url('/js/support_func.js', __FILE__));
    }
    
    function load_thanh_pho_styles(){
        wp_enqueue_style('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.css', __FILE__));
        wp_enqueue_script('jqueryToast', plugins_url('/libs/jqueryToast/jquery.toast.min.js', __FILE__));
        wp_enqueue_style('global_css', plugins_url('/css/global_css.css', __FILE__));
        wp_enqueue_style('thanh_pho', plugins_url('/css/thanh_pho.css', __FILE__));
        wp_enqueue_script('support_func', plugins_url('/js/support_func.js', __FILE__));
        wp_enqueue_script('thanh_pho', plugins_url('/js/thanh_pho.js', __FILE__));
    }
    
    //***************************************** LOAD VIEWS********************************************
    function load_mua_vth_500kg(){
        include_once( 'views/mua-vth-500kg.php' );
    }
    
    function load_mua_vth_1000kg(){
        include_once( 'views/mua-vth-1000kg.php' );
    }
    
    function load_thue_vth_500kg(){
        include_once( 'views/thue-vth-500kg.php' );
    }
    
    function load_thue_vth_1000kg(){
        include_once( 'views/thue-vth-1000kg.php' );
    }
    
    function load_thanh_pho(){
        include_once( 'views/thanh-pho.php' );
    }
    
    function loa_gian_giao(){
        include_once( 'views/gian-giao-nem.php' );
    }
    
    function display_order_page() {
        include_once( 'views/management.php' );
    }

    /*
     * Actions perform on activation of plugin
     */

    function wpa_install() {
        global $wpdb;
        $table_name = $wpdb->prefix . "baogia_settings";
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		setting_key tinytext DEFAULT '' NOT NULL,
		setting_value text NULL,
                is_deleted boolean DEFAULT false,
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

new WP_GHProduct_Management();
?>
