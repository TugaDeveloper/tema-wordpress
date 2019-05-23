<?php

get_header(); ?>
	
	<!-- site-content -->
	<div class="site-content clearfix">
		
        <h3> Este é o meu blog; esta é a página principal </h3>

			    <?php if (have_posts()) :
				while (have_posts()) : the_post();

				the_content();

				endwhile;

				else :
					echo '<p>No content found</p>';

                endif;?>

        <div class="home-columns clearfix">

                <div class="one-half">
                <?php
        
                    //Loop de posts

                    $postsOpiniao = new WP_Query('cat=7&posts_per_page=2');

                    if ($postsOpiniao->have_posts()):

                        while($postsOpiniao->have_posts()) : $postsOpiniao->the_post(); ?>

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <?php the_excerpt(); ?>

                        <?php endwhile;

                    else:
                        //
                    
                    endif;
                    
                    wp_reset_postdata();

                    ?>
                </div><!--one-half-->

               <!-- <span class="horiz-center"><a href="<?php echo get_category_link(7); ?>" class="btn-a">
                    Ver tudo da categoria
                </a> -->
                </span>

                <div class="one-half last">

                <?php
        
                    $postsUncategorized = new WP_Query('cat=1&posts_per_page=3');

                    if ($postsUncategorized->have_posts()):

                        while($postsUncategorized->have_posts()) : $postsUncategorized->the_post(); ?>

                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                            <?php the_excerpt(); ?>

                        <?php endwhile;
                        
                    else:
                        //

                    endif;

                    wp_reset_postdata();
        
                ?>

                </div><!--two-half last-->

        </div><!--home-columns clearfix-->
              

	</div><!-- /site-content -->
	
	<?php get_footer();

?>