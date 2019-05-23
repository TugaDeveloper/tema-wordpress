<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();?>

        <article class="post page">

            <div class="column-container clearfix">

                <div class="title-column">
                    <h2><?php the_title(); ?></a></h2>
                </div><!-- Title Column -->

                <div class="text-column">
                    <?php the_content(); ?>
                </div><!-- Text Column -->

            </div><!-- Column Container -->



           
         
        </article>

    <?endwhile;

    else :
        echo "<p>Não foi encontrado conteúdo</p>";

    endif;

get_footer();
?>