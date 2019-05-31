<?php
/**
 * @package  GowebPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();


		if (! get_option('goweb_plugin')){
			update_option('goweb_plugin', $default);
		}

		if (! get_option('goweb_plugin_cpt')){
			update_option('goweb_plugin_cpt', $default);
		}

		if (! get_option('goweb_plugin_tax')){
			update_option('goweb_plugin_tax', $default);
		}
	}
}