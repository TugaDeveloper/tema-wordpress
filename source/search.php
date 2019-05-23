<?php

get_header();?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php
if (have_posts()) : ?>

    <h2> Resultados de Pesquisa para: <?php the_search_query(); ?></h2>

<?php

    while (have_posts()) : the_post();

    /*Template do content*/

    get_template_part('content', get_post_format());

    endwhile;

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

</main> <!-- .site-main -->
</div> <!-- .site-content -->

<?php
get_footer();

?>