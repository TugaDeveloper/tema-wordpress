<?php 
/**
 * @package  GowebPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class TestimonialController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'testimonial_manager' ) ) return;

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'goweb_plugin', 
				'page_title' => 'Gestor de testemunhos', 
				'menu_title' => 'Gestor de testemunhos', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_testimonial', 
				'callback' => array( $this->callbacks, 'adminTestimonial' )
			)
		);
	}
}