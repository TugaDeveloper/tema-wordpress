<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc;

final class Init
{
	/**
	 * Colocar todas as classes numa array
	 * @return array Lista completa de classes
	 */
	public static function get_services() 
	{
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class
		];
	}

	/**
	 * Loop de classes, inicialização
	 * e chama o método register() se existir
	 * @return
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Inicializa a classe
	 * @param  class $class    Classe da array dos serviços
	 * @return class instance  Nova instância da classe
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}