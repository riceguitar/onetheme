<?php
/**
* Template Name: Full Width Page (No Sidebar)
* Description: Displays front page widgets and slider areas along with custom loops.
*/
?>

<?php get_header(); ?>

<?php do_action( 'one_above_content'); ?>

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();  
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php //get_template_part( 'partials/post', 'meta-head' ); ?>
					<h2 itemprop="headline" class="post-title article-margin">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php if (get_field('one_post_subtitle')) : ?>
						<h3 itemprop="subheadline" class="post-subheadline article-margin">
							<?php the_field('one_post_subtitle'); ?>
						</h3>
					<?php endif; ?>
					<?php if (has_post_thumbnail()) { ?>
					<div class="post-image">
						<?php the_post_thumbnail('large'); ?> 
					</div>
					<?php } ?>
					<div itemprop="articleBody" class="post-body article-margin article-bottom">
						<?php 
							the_content();
						?>
					</div>
					<?php //one_sharing_all(); ?>
				</article>
			<?php
				} // while
			} // if
			?>

			
		</div>

	</div>
</div>

<?php get_footer(); ?>