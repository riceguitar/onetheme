<?php
/**
 * Used to display quotes in blog role / category / tag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'partials/post', 'meta-head' ); ?>
	<div itemprop="articleBody" class="post-quote article-margin article-bottom">
		<?php 
			the_content();
		?>
	</div>
	<?php one_sharing_all(); ?>
</article>