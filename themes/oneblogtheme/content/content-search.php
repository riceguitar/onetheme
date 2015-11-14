<div class="search-item <?php if (has_post_format()) { echo 'search-format-'.get_post_format();  } ?>">
	<?php 
		if (has_post_format()) {
			$the_post_format = get_post_format(); 
		} else {
			$the_post_format = '';
		}
	?>
	<?php 
		if (get_the_post_thumbnail() || ($the_post_format == 'quote')) {
			$indentthis = true;
		}
	?>
	<?php 
		if ($indentthis) {
			if ($the_post_format == 'quote') {
				
			} else {
				echo '<a href="'.get_permalink().'" target="_parent">';
				the_post_thumbnail('search-thumb');
				echo '</a>';
			}
		}
	?>
	<?php if ($indentthis) { ?>
	<div class="search-indent">
	<?php } ?>

		<?php get_template_part( 'partials/search', 'meta' ); ?>
		<h4><a href="<?php the_permalink(); ?>" target="_parent"><?php the_title(); ?></a></h4>
		
		<?php if (($the_post_format == 'quote') || ($the_post_format == 'image')) { ?>
		<?php } else { ?>
			<?php the_excerpt(); ?>
		<?php } ?>

	
	<?php if ($indentthis) { ?>
	</div>
	<?php } ?>
	<div class="clearfix"></div>
</div>