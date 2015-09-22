<?php
/**
 * Used to display videos
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'partials/post', 'meta-head' ); ?>
	<?php if (get_field('one_featured_video')) { ?>
		<div class="post-video">
			<div class="embed-container">
				<?php the_field('one_featured_video'); ?>
			</div>
		</div>
	<?php } ?>
	<div itemprop="articleBody" class="article-margin article-bottom">
		<?php 
			the_content();
		?>
	</div>
	<?php one_sharing_all(); ?>
</article>