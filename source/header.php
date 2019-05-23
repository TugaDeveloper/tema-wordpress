<!--
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/

*/-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
        <title> <?php bloginfo('name'); ?> </title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

    <div class="container">

    <!-- Header Site -->
        <header class="site-header">

            <div class="header-search">

                <?php get_search_form ();?>

            </div> <!-- header-search -->

            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name');  ?></a></h1>
            
            <h5><?php bloginfo('description'); ?>
            <?php if (is_page('sobre-mim')){?>
                Conheça-me melhor
            <?php } ?>
        </h5>



            <nav class="site-nav">

                <?php

                $args = array(
                    'container_class' => 'site-nav',
                    'theme_location' => 'primary',

                )
                
                ?>
                  
                  <?php wp_nav_menu($args) ?>
                
                  
                
                     
                 <a class="toggle-nav" href="#">&#9776;
                     
                 </a> 
                
                
              

            </nav>
            <div class="separator"><hr></div>
            
            <h2><div class=
            "container-img"><img src=
            "https://agency.goweb.pt/hubfs/goweb_agency_og.jpg"> 
            </div></h2>
        </header>
    <!-- /Header Site -->




