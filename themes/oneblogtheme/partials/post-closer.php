<?php if (is_active_sidebar('one-post-closer')) { ?>
	<div class="post-closer">
		<div class="row">
			<?php
			$format = get_post_format();
			if ( false === $format ) {
			?>
			<div class="col-md-10 col-md-offset-2">
			<?php } else { ?>
			<div class="col-md-12">
			<?php } ?>
			<?php dynamic_sidebar( 'one-post-closer' ); ?>
			</div>
			
		</div>
	</div>
<?php } ?>