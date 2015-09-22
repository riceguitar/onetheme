<div>
<?php if (get_the_post_thumbnail()) {
	the_post_thumbnail('thumbnail');
}?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php the_excerpt(); ?>
</div>