<?php 
/**
 * @package  GowebPlugin
 */
namespace Inc\Base;

/*use Inc\Api\SettingsApi;*/
use Inc\Base\BaseController;
use Inc\Api\Widgets\MediaWidget;
/*use Inc\Api\Callbacks\AdminCallbacks;*

/**
* 
*/
class WidgetController extends BaseController
{
	//public $callbacks;

	//public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'media_widget' ) ) return;

		$media_widget = new MediaWidget();
		
		$media_widget->register();

		/*$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();*/
	}

	/*public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'goweb_plugin', 
				'page_title' => 'Gestor de chat', 
				'menu_title' => 'Gestor de chat', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_chat', 
				'callback' => array( $this->callbacks, 'adminChat' )
			)
		);
	}*/
}