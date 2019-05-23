<?php

    get_header();

?>

<div class="site-content clearfix">

    <div class="main-column">

    <?php

        if (have_posts()) :
            while (have_posts()) : the_post();

            if (get_post_format() == false) {

                    get_template_part('content', 'single');

            } else {

                    get_template_part('content', get_post_format());

            }

            comments_template();

        endwhile;

        else :

            echo '<p>Não foi encontrado conteúdo</p>';
    
        endif;

    ?>

    </div> <!--main-column-->

    <?php get_sidebar(); ?>

</div> <!--site-content clearfix-->