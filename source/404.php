<?php
/**
 * Página para erro 404 (página não encontrada)
 * 
 * @package WordPress
 * @subpackage tema
 * @since tema 1.0
 * 
 */

 get_header(); ?>

 <div id="primary" class="content-area">

    <main id="main" class ="site-main" role="main">

        <section class="error 404 not-found">

            <header class="page-header">

                <h1 class="page-title"><?php _e( 'Oops! A página não foi encontrada.', 'tema' ); ?> </h1>

            </header><!-- Page Header -->

            <div class="page-content">

                <p><?php _e ('Parece que nada foi encontrado, tente pesquisar.', 'tema'); ?> </p>

                <!--<div id="main" class="error-gif">
                
                    <img src="https://media.tenor.com/images/71656fc182ad63d50fbcd7c5496aa09d/tenor.gif">
                
                 </div>--><!-- Error GIF -->

            </div> <!-- Page Content -->

        </section><!-- Section error 404 -->
    
    </main><!-- Site Main -->

<?php get_sidebar ('content-bottom'); ?>

 </div><!-- Content Area -->

 <?php get_sidebar(); ?>
 
 <?php get_footer(); ?>