<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/

*/

get_header();?>

<!--<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">-->

<div class="site-content clearfix">

<div class="main-column">

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
    
    get_template_part('content', get_post_format());
    get_comments();?>
   

<?php endwhile;

     else :
        echo "<p>Não foi encontrado conteúdo</p>";

    /*the_posts_pagination(
            array(
                'prev_text'          => __( 'Previous page', 'tema' ),
                'next_text'          => __( 'Next page', 'tema' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'tema' ) . ' </span>',
            )
        );*/

    endif;?>

</div><!--Main Column-->

<div class="secondary-column">

    <p> <?php dynamic_sidebar('sidebar1'); ?> </p>

</div> <!--Secondary Column -->

</div>





<!--</main>  .site-main 
</div>  .site-content -->

<?php
get_footer();

?>

<?php /* --> Este código foi movido para o ficheiro archive.php <--
    
    <article class="post <?php if (has_post_thumbnail()) {?> has-thumbnail <?php }  ?>">
            
    <div class="post-thumbnail">

        <a href="<?php the_permalink ();?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>

    </div> <!--post-thumbnail-->

    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <!--Não Está a Funcionar, data não aparece, rever no futuro-->
    <p class="post-info"> <?php the_time('d/m/Y'); ?> |
    by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
    <?php the_author();
    
    ?> </a> | Posted in

    <?php

        $categories = get_the_category();
        $separator = ", ";
        $output = '';

        if($categories){

            foreach($categories as $category){

                $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;

            }
            
            echo trim($output, $separator);

        }

    ?>


    </p>
    <!-- Acaba o mau funcionamento aqui -->


<?php if ($post->post_excerpt) { ?>
    
    <p>

    <?php echo get_the_excerpt(); ?>

    <a href="<?php the_permalink(); ?>">Read more&raquo;</a>
    
    </p>
    
<?php } else {
    
    the_content();
    
} ?>

</article>*/?>