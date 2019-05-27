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
class TemplateController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'templates_manager' ) ) return;

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
				'page_title' => 'Gestor de Templates', 
				'menu_title' => 'Gestor de Templates', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_templates', 
				'callback' => array( $this->callbacks, 'adminTemplates' )
			)
		);
	}
}