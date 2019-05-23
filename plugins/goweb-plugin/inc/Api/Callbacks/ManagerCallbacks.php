<?php 
/**
 * @package  GowebPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{

	public function checkboxSanitize( $input )
	{
        //return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        return ( isset($input) ? true : false );
	}

    public function adminSectionManager()
    {
        echo 'Ative as secções e funcionalidades deste plugin através das caixas 
        de verificação na lista.';
    }

    public function checkboxField($args){
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option($name);
        echo '<input type="checkbox" name=""' . $name . 'value="1" class=""' .
            $classes . '"' . ($checkbox ? 'checked' : '') . '>';
    }

}