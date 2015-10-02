<?php
/**
 * Used to display quotes in blog role / category / tag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'partials/post', 'meta-head' ); ?>
	<h1 itemprop="headline" class="post-title  article-margin <?php if (get_field('one_post_subtitle')) {echo 'remove-bottom-margin';} ?>">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h1>
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