<div class="post-meta">
	<div class="post-meta-item"><time><?php echo get_the_date('l, F j, Y', get_the_ID()); ?></time></div>
	<?php if (function_exists('wpp_get_views')) { ?>
		<div class="post-meta-item post-meta-view-count"><i class="fa fa-eye"></i> <?php echo wpp_get_views(get_the_ID()); ?></div>
	<?php } ?>
</div>