<div class="post-meta article-margin article-top">
	<div class="post-meta-item post-meta-cats"><?php one_category_colors(); //echo get_the_category_list( __( ', ', 'one_theme' ) ); ?></div>
	<div class="post-meta-item"><time><?php echo get_the_date('l, F j, Y', get_the_ID()); ?></time></div>
	<?php if (function_exists('wpp_get_views')) { ?>
		<div class="post-meta-item hidden-xs"><i class="fa fa-eye"></i> <?php echo wpp_get_views(get_the_ID()); ?></div>
	<?php } ?>
</div>