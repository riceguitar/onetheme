<?php get_header(); ?>

<?php do_action( 'one_above_content'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="<?php one_col_width('content'); ?>">
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					
					// Load the Content Template based on Post Format
					get_template_part( 'content/content', get_post_format() );

					// Marketing Closer
					get_template_part( 'partials/post', 'closer');

					// Load Comments if allowed
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				} // while
			} // if
			?>

			<nav class="post-nav">
				<?php posts_nav_link(); ?>
			</nav>
			
		</div>
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>