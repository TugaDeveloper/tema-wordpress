<?php 
/**
 * @package  GowebPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Goweb Plugin', 
				'menu_title' => 'Goweb', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'goweb_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_cpt', 
				'callback' => array( $this->callbacks, 'adminCpt' )
			),
			array(
				'parent_slug' => 'goweb_plugin', 
				'page_title' => 'Taxonomias Personalizadas', 
				'menu_title' => 'Taxonomias', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_taxonomies', 
				'callback' => array( $this->callbacks, 'adminTaxonomy' )
			),
			array(
				'parent_slug' => 'goweb_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'goweb_widgets', 
				'callback' => array( $this->callbacks, 'adminWidget' )
			)
		);
	}

	public function setSettings()
	{

		$args = array(array(
			'option_group' => 'goweb_plugin_settings',
			'option_name' => 'goweb_plugin',
			'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
		)
	);

		/*foreach ($this->managers as $key => $value){
			$args[] = array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => $key,
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			);
		}*/

		/*$args = array(
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'cpt_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'taxonomy_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'media_widget',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'gallery_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'testimonial_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'templates_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'membership_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			array(
				'option_group' => 'goweb_plugin_settings',
				'option_name' => 'chat_manager',
				'callback' => array( $this->callbacks, 'checkboxSanitize' )
			),
			
		);*/

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'goweb_admin_index',
				'title' => 'Settings Manager',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'goweb_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{

		$args = array();

		foreach ( $this->managers as $key => $value ){
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'option_name' => 'goweb_plugin',
					'label_for' => $key,
					'class' => 'ui-toogle'
				)
			);
		}

		/*$args = array(
			array(
				'id' => 'cpt_manager',
				'title' => 'Ativar posts personalizados',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'taxonomy_manager',
				'title' => 'Ativar taxonomia personalizada',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),
			
			array(
				'id' => 'media_widget',
				'title' => 'Ativar widgets personalizados',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'gallery_manager',
				'title' => 'Ativar galeria personalizada',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'testimonial_manager',
				'title' => 'Ativar testemunhos personalizados',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'templates_manager',
				'title' => 'Ativar templates personalizados',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'login_manager',
				'title' => 'Ativar gestor de login personalizado',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'membership_manager',
				'title' => 'Ativar gestor de utilizadores personalizado',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

			array(
				'id' => 'chat_manager',
				'title' => 'Ativar gestor de chat personalizado',
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'goweb_plugin',
				'section' => 'goweb_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toogle'
				)
			),

		);*/

		$this->settings->setFields( $args );
	}
}