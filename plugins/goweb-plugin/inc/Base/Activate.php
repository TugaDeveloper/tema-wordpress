<?php
/**
 * @package  GowebPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if (get_option('goweb_plugin')){
			return;
		}

		$default = array();

		update_option('goweb_plugin', $default);

	}
}