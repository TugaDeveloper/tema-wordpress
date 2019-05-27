<?php 
/**
 * @package  GowebPlugin
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $managers = array();

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/goweb-plugin.php';

		$this->managers = array(
			'cpt_manager' => 'Ativar Posts Personalizados', 
			'taxonomy_manager' => 'Ativar gestor de taxonomia',
			'media_widget' => 'Ativar gesto de widgets media',
			'gallery_manager' => 'Ativar gestor de galerias',
			'testimonial_manager' => 'Ativar gestor de testemunhos',
			'templates_manager' => 'Ativar gestor de templates',
			'login_manager' => 'Ativar gestor de logins',
			'membership_manager' => 'Ativar gestor de utilizadores',
			'chat_manager' => 'Ativar gestor de chat'
		);
	}

	public function activated( string $key )
	{
		$option = get_option( 'goweb_plugin' );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}