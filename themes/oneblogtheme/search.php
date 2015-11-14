<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php get_search_form(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7 results-col">


			<?php if (get_search_query() !== '') { ?>
			<div class="search-results-wrapper">
				<?php 

				if (have_posts()) {
					while (have_posts()) {
						the_post();  
						get_template_part( 'content/content', 'search' );
					}
				} else {
					echo '<h1>We didn\'t find any results for your keywords.</h1>';
				}
				?>

				<?php if (get_next_posts_link() || get_previous_posts_link()) { ?>
				<nav class="post-nav">
					<div class="pull-left post-nav-prev"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i><span>Previous</span>' ); ?></div>
					<div class="pull-right post-nav-next"><?php next_posts_link( '<span>Next</span><i class="fa fa-chevron-right"></i>'); ?></div>
				</nav>
				<?php } ?>

				<?php wp_reset_query(); ?>

			</div>
			<?php } else { ?>
			<?php } ?>
			
		</div>

		<div class="col-md-5 hidden-sm hidden-xs">
			<?php if (is_active_sidebar('one-search-results')) { ?>
			<div class="search-widgets">
				<?php dynamic_sidebar( 'one-search-results' ); ?>
			</div>
			<?php } ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>