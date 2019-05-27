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
class CustomTaxonomyController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'taxonomy_manager' ) ) return;

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
				'page_title' => 'Taxonomias Personalizadas', 
				'menu_title' => 'Gestor de Taxonomias', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_taxonomy', 
				'callback' => array( $this->callbacks, 'adminTaxonomy' )
			)
		);
	}
}