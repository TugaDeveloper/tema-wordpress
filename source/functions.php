<?php

function resources(){

    wp_enqueue_style('style', get_stylesheet_uri ());
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), true);
    wp_enqueue_script('burger-menu', get_template_directory_uri() .'/js/burger-menu.js', array('jquery'), true);
    wp_enqueue_script('scroll.js', get_template_directory_uri() . '/js/scroll.js', array ('jquery'));
   
    wp_enqueue_style( 'bootstrap.js', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css', array(), 20141119 );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/bootstrap/css/style.css', array(), 20141119 );
    // all scripts
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/bootstrap/js/scripts.js', array('jquery'), '20120206', true );
}


//Burger Menu
/*function wpmu_burger_menu_scripts(){

    wp_enqueue_script('burger-menu-script', get_stylesheet_directory_uri() .'/js/burger-menu.js', array('jquery'));

}*/
//add_action('wp_enqueue_scripts', 'wpmu_burger_menu_scripts');
add_action('wp_enqueue_scripts', 'resources');





//Top Ancestor


function get_top_ancestor_id(){

    global $post;

    if($post->post_parent){
       $ancestors = array_reverse(get_post_ancestors($post->ID));
       return $ancestors[0];
    }

    return $post->ID; 

}

//Page Children

function has_children(){

    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}


//Customize Excerpt Words

function custom_excerpt_length(){

    return 25;

}

add_filter('excerpt_length', 'custom_excerpt_length');


function theme_image_tweaks(){

    //Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
        'social' => __('Social Menu')
    ));

    //Featured Image Support

    add_theme_support('post-thumbnails');

    add_image_size('small-thumbnail', 180, 120, true);

    add_image_size('banner-image', 920, 210, array('left', 'top'));

    //Post Format
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}

add_action('after_setup_theme', 'theme_image_tweaks');

//Custom Background
$args = array(
	'default-color' => '',
	'default-image' => '%1$s/img/background.jpg',
);
add_theme_support( 'custom-background', $args );

//Widget Location

function widgetInit(){

    register_sidebar( array(
        'name'=> 'Barra Lateral',
        'id' => 'sidebar1',
        'before_widget' => '<div class=""widget-item>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="my-special-class">',
        'after_title' => '</h4>'
    ));

    register_sidebar( array(
        'name'=> 'Footer Widget',
        'id' => 'footer1',
        'before_widget' => '<div class=""widget-item>',
        'after_widget' => '</div>'
    ));

    register_sidebar( array(
        'name'=> 'Footer Widget 2',
        'id' => 'footer2',
        'before_widget' => '<div class=""widget-item>',
        'after_widget' => '</div>'
    ));

    register_sidebar( array(
        'name'=> 'Footer Widget 3',
        'id' => 'footer3',
        'before_widget' => '<div class=""widget-item>',
        'after_widget' => '</div>'
    ));

    register_sidebar( array(
        'name' => 'Footer Widget 4',
        'id' => 'footer4',
        'before_widget' => '<div class=""widget-item>',
        'after_widget' => '</div>'
    ));

}

add_action('widgets_init', 'widgetInit');

//Customize Appearence

function themeCustomizeRegister( $wp_customize ){

    $wp_customize->add_setting('linkColor', array(

        'default' => '#006ec3',
        'transport' => 'refresh',

    ));

    $wp_customize->add_setting('btnColor', array(

        'default' => '#006ec3',
        'transport' => 'refresh',

    ));

	$wp_customize->add_setting('btnHoverColor', array(
		'default' => '#004C87',
		'transport' => 'refresh',
    ));
    
    $wp_customize->add_setting('fontColor', array(
        'default' => '#111',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('menuColor', array(
        'default' => '#111',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('bgColor', array(
        'default' => '#FFF',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('menuBgColor', array(
        'default' => '#222222',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('menuLineColor', array(
        'default' => '#bac833',
        'transport' => 'refresh',
    ));

    $wp_customize->add_section('standardColor', array(

        'title' => __('Cores', 'tema'),
        'priority' => 30,

    )); 

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'linkColorControl', array(

        'label' => __('Cor Link', 'tema'),
        'section' => 'standardColor',
        'settings' =>  'linkColor',

    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'btnColorControl', array(

        'label' => __('Cor Button', 'tema'),
        'section' => 'standardColor',
        'settings' =>  'btnColor',

    )));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btnHoverColorControl', array(
		'label' => __('Outra Cor Button', 'tema'),
		'section' => 'standardColor',
		'settings' => 'btnHoverColor',
	) ) );
    
    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'fontColor', array(
        'label' => __('Cor Tipografia', 'tema'),
        'section' => 'standardColor',
        'settings' => 'fontColor'
    ) ) );
    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'menuColor', array(
        'label' => __('Cor Menu', 'tema'),
        'section' => 'standardColor',
        'settings' => 'menuColor',
    ) ) );

    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'bgColor', array(
        'label' => __('Cor Fundo', 'tema'),
        'section' => 'standardColor',
        'settings' => 'bgColor',
    ) ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menuBgColor', array(
        'label' => __('Cor Fundo Menu', 'tema'),
        'section' => 'standardColor',
        'settings' => 'menuBgColor',
    ) ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menuLineColor', array(
        'label' => __('Cor Linhas Menu', 'tema'),
        'section' => 'standardColor',
        'settings' => 'menuLineColor'
    ) ) );
}

add_action('customize_register', 'themeCustomizeRegister');

//Output Color Pick
function custom_css(){?>

    <style type="text/css">

        a:link,
        a:visited{

            color: <?php echo get_theme_mod('linkColor'); ?>

        }

        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited{

            background-color: <?php echo get_theme_mod('btnColor'); ?>
            color: <?php echo get_theme_mod('linkColor'); ?>

        }

        .btn-a,
        .btn-a:link,
        .btn-a:visited,
         div.header-search #searchsubmit{

            background-color: <?php echo get_theme_mod('btnColor'); ?>

        }

        .btn-a:hover,
		div.header-search #searchsubmit:hover {
			background-color: <?php echo get_theme_mod('btnHoverColor'); ?>;
		}

		.btn-a:hover,
		div.header-search #searchsubmit:hover {
			background-color: <?php echo get_theme_mod('btnHoverColor'); ?>;
        }
        
        body{
            color: <?php echo get_theme_mod('fontColor'); ?>;
        }

        .site-header nav ul li a:hover {
	        background-color: <?php echo get_theme_mod('menuColor'); ?>;
        }

        div.container{
            background: <?php echo get_theme_mod('bgColor'); ?>;
        }

        #menu-primary-menu{
            background-color: <?php echo get_theme_mod('menuBgColor'); ?>
        }

        .site-header nav ul li a:link,
        .site-header nav ul li a:visited {
            border-color: <?php echo get_theme_mod('menuLineColor'); ?>
        }
    </style>

<?php }


add_action ('wp_head', 'custom_css');