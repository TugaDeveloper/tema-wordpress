<?php

get_header();?>

<!--<div id="primary" class="content-area">
<main id="main" class="site-main" role="main"> Poderá Não ser necessário -->

<div class="site-content clearfix">

<div class="main-column">

<?php
if (have_posts()) :
?>

    <h2>  

    <?php

        if (is_category()){

            single_cat_title();

        } elseif (is_tag()){

            single_tag_title();

        } elseif (is_author()){

            the_post();
            echo 'Arquivos de Autor: ' . get_the_author();
            rewind_posts();

        } elseif (is_day()){

            echo 'Arquivos Mensais: ' . get_the_date('F Y');

        } elseif (is_month()){

            echo 'Arquivos anuais: ' . get_the_date('Y');

        } elseif (is_year()){

            echo 'Arquivo do ano';

        } else{

            echo 'Arquivos:';

        }

    ?>

    </h2>

<?php
    while (have_posts()) : the_post();

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

</div> <!-- Main Column -->
<?php get_sidebar(); ?>
</div> <!-- Site Content -->

<!--</main>  .site-main -->
<!--</div>  .site-content -->

<?php
get_footer();

?>