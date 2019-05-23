<?php
/**
 * Página para os comentários
 * @package WordPress
 * @subpackage tema
 * @since Tema 1.0
*/

if(post_password_required()){
	return;
}
?>

<div id="comments" class="comments-area">

<?php if (have_comments()) : ?>

	<h2 class="comments-title">

		<?php
			$comments_number = get_comments_number();
		if ('1' === $comments_number){
			printf( _x('Comentários sobre &ldquo;%s&rdquo;', 'comments title', 'tema'), get_the_title() );
		
		}else{
			printf(

				_nx(
					'%1$s Comentários &ldquo;%2$s&rdquo;',
					'%1$s Comentários &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'tema'
				),
				number_format_i18n($comments_number),
				get_the_title()
			);
		}
		?>

	</h2> <!-- comments-title --> 

	<?php the_comments_navigation(); ?>

	<ol class='comment-list'>
		<?php 
			wp_list_comments(
				array(
					'style' => 'ol',
					'short_ping' => true,
					'avatar_size' => 0,
				)
			);
		?>
	</ol> <!-- comment-list -->

	<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php

	if (! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
		?>
	<p class="no-comments"> <?php _e('Comments Closed', 'tema'); ?> </p>
	<?php endif; ?>

	<?php 
		comment_form(
			array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h2>',
			)	
		); 
	?>
</div> <!-- comments-area -->
