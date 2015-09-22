<?php get_header(); ?>

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<?php get_search_form(); ?>

<?php if (get_search_query() !== '') { ?>

			<?php
				global $wp_query;
				echo $wp_query->found_posts.' results found.';
			?>
	
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();  
			?>

					<?php get_template_part( 'content/content', 'search' ); ?>
				
			<?php 
				} // while
			} // if
			?>

			<nav class="post-nav">
				<div class="pull-left post-nav-prev"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i><span>Previous</span>' ); ?></div>
				<div class="pull-right post-nav-next"><?php next_posts_link( '<span>Next</span><i class="fa fa-chevron-right"></i>'); ?></div>
			</nav>

<?php } ?>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>