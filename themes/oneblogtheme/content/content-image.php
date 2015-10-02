<?php
/**
 * Used to display images
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-meta">
		<div class="post-meta-item post-meta-cats"><?php one_category_colors(); //echo get_the_category_list( __( ', ', 'one_theme' ) ); ?></div>
		<div class="post-meta-item post-meta-time"><?php the_date('l, F j, Y', '<time>', '</time>'); ?></div>
		<?php if (function_exists('wpp_get_views')) { ?>
			<div class="post-meta-item post-meta-view-count"><i class="fa fa-eye"></i> <?php echo wpp_get_views(get_the_ID()); ?></div>
		<?php } ?>
	</div>
	<?php if (has_post_thumbnail()) { ?>
	<div class="post-image">
		<?php the_post_thumbnail('large'); ?>
	</div>
	<div class="post-image-content">
		<?php the_content(); ?>
	</div>
	<?php } else { ?>
		<p>This post needs a featured image.</p>
	<?php } ?>
	<?php one_sharing_all(); ?>

</article>