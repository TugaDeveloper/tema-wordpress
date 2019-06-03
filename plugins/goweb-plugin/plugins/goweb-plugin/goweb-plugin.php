<?php
/**
 * @package  GowebPlugin
 */
/*
Plugin Name: Plugin Goweb
Plugin URI: https://gowebagency.pt
Description: Esta é a minha primeira tentativa a criar um plugin no WordPress.
Version: 0.0.4
Author: Goweb Agency
Author URI: https://gowebagency.pt
License: GPLv2 or later
Text Domain: goweb-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Se o ficheiro for chamado diretamente, abortar
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Autoload do Composer
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Ativa o plugin
 */
function activate_goweb_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_goweb_plugin' );

/**
 * Desativa o plugin
 */
function deactivate_goweb_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_goweb_plugin' );

/**
 * Inicialização de todas as classes essenciais
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}