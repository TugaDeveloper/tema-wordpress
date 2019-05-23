<?php

/*
Template Name: Footer Layout
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();?>

        <article class="post page">
            <h2><?php the_title(); ?></a></h2>

            <div class="info-box">
                <h4> Ler com atenção! </h4>
                <p> Eu, enquanto indivíduo, não me responsabilizo por quaisquer danos a terceiros
                    resultantes da leitura deste blog.
                </p>
            </div> <!-- info-box -->

            <?php the_content(); ?>
            
        </article>

    <?endwhile;

    else :
        echo "<p>Não foi encontrado conteúdo</p>";

    endif;

get_footer();
?>