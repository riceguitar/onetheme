<?php get_header(); ?>

<?php do_action( 'one_above_content'); ?>

<div class="container">

	<div class="row">
		<div class="<?php one_col_width('content'); ?>">
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();  
			?>
			<?php if (
				has_post_format('image') || 
				has_post_format('quote') ||
				has_post_format('video')) 
			{ ?>
				<?php get_template_part( 'content/content-short', get_post_format() ); ?>
			<?php } else { ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'partials/post', 'meta-head' ); ?>
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
					<?php one_sharing_all(); ?>
				</article>
			<?php } ?>
			<?php 
				} // while
			} // if
			?>

			<nav class="post-nav">
				<div class="pull-left post-nav-prev"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i><span>Previous</span>' ); ?></div>
				<div class="pull-right post-nav-next"><?php next_posts_link( '<span>Next</span><i class="fa fa-chevron-right"></i>'); ?></div>
			</nav>
			
		</div>
		<?php if (is_active_sidebar('one-midbar')) { ?>
			<div class="<?php one_col_width('mid_bar'); ?>">
				<?php dynamic_sidebar( 'one-midbar' ); ?>
			</div>
		<?php } ?>
		<div class="<?php one_col_width('side_bar'); ?>">
			<?php dynamic_sidebar( 'one-sidebar' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>