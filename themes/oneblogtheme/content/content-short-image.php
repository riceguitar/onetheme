<?php
/**
 * Used to display images in blog role / category / tag
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail()) { ?>
	<div class="post-image">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
	</div>
	<?php } else { ?>
		<p>This post needs a featured image.</p>
	<?php } ?>
	<?php one_sharing_all(); ?>
</article>