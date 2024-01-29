<?php
/**
 * @package thekua-categoryonshop
 */
/*
Plugin Name: Thekua - Product Categories on Shop
Plugin URI: https://wordpress.org/plugins/thekua-categoryonshop
Description: This plugin will help us to show All Product Categories on top of WooCommerce Shop page in Frontend.
Version: 1.0.0
Author: devinlabs
Author URI: https://www.devinlabs.com/
License: GPLv2 or later
Text Domain: thekua-categoryonshop
*/
if (!defined('ABSPATH')) {
exit;
}
if (!defined('WPINC')) {
exit;
} 
define( 'THEKUACSHOP_PATH', plugin_dir_path(__FILE__) );
 

require_once(THEKUACSHOP_PATH . 'admin/adminSetting.php');
require_once(THEKUACSHOP_PATH . 'frontend/thekua-customization.php'); 

function activate_thekua_s_plugin(){ 	 
	flush_rewrite_rules();
}
function deactivate_thekua_s_Plugin(){
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'activate_thekua_s_plugin');
register_deactivation_hook( __FILE__, 'deactivate_thekua_s_Plugin');

// Add Links Woocommerce Setting 
	 add_filter("plugin_action_links_thekua-categoryonshop/thekua-categoryonshop.php", 'thekua_settings_link' );
	 
// Woocommerce Plugin Setting Page
function thekua_settings_link( $links ){
		$settings_link = '<a href="admin.php?page=wc-settings&tab=settings_tab_thekua">Settings</a>';
		array_push($links, $settings_link);
		return $links;
}