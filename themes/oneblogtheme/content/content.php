<?php
/**
 * The default template for displaying content
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-11 col-md-offset-1">
			<div class="post-meta">
				<div class="post-meta-item"><?php one_category_colors(); //echo get_the_category_list( __( ', ', 'one_theme' ) ); ?></div>
				<div class="post-meta-item"><?php the_date('l, F j, Y', '<time>', '</time>'); ?></div>
				<?php if (function_exists('wpp_get_views')) { ?>
					<div class="post-meta-item"><i class="fa fa-eye"></i> <?php echo wpp_get_views(get_the_ID()); ?></div>
				<?php } ?>
			</div>
			<?php if (is_single()) : ?>
				<h1 itemprop="headline" class="post-title <?php if (get_field('one_post_subtitle')) {echo 'remove-bottom-margin';} ?>">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h1>
			<?php else: ?>
				<h2 itemprop="headline" class="post-title <?php if (get_field('one_post_subtitle')) {echo 'remove-bottom-margin';} ?>">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
			<?php endif; ?> 

			<?php if (get_field('one_post_subtitle')) : ?>
				<h3 itemprop="subheadline" class="post-subheadline">
					<?php the_field('one_post_subtitle'); ?>
				</h3>
			<?php endif; ?>
		</div>
	</div>
	<?php if (has_post_thumbnail()) { ?>
	<div class="post-image">
		<?php the_post_thumbnail('large'); ?> 
		<span class="post-image-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?> &nbsp;</span>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-2">
		<?php 
			echo '<div class="post-sharing clearfix">';
				one_sharing('facebook', 'facebook');
				one_sharing('twitter', 'twitter');
				one_sharing('linkedin', 'linkedin');
				one_sharing('google-plus', 'google-plus');
				one_sharing('email', 'envelope-o');
				one_sharing('print', 'print');
			echo '<a href="#" class="back-to-top">Top Up</a>';
			echo '</div>';
		?>
		</div>
		<div class="col-md-10">
			<div itemprop="articleBody" class="post-body">
				<?php 
					the_content();
				?>
			</div>
			<div class="post-closer-bar"></div>
		</div>
	</div>
</article>