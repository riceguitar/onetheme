<?php if (is_single() || is_page()) { ?>

	<div class="sidebar-right col-md-4 col-lg-3 hidden-sm hidden-xs">
		<?php dynamic_sidebar( 'one-sidebar' ); ?>
	</div>

<?php } elseif (is_home() || is_archive()) { ?>

	<?php if (is_active_sidebar('one-midbar')) { ?>
		<div class="sidebar-mid col-lg-2 hidden-md hidden-sm hidden-xs">
			<?php dynamic_sidebar( 'one-midbar' ); ?>
		</div>
	<?php } ?>

	<div class="sidebar-right col-sm-4 col-md-4 col-lg-3 hidden-xs">
		<?php dynamic_sidebar( 'one-sidebar' ); ?>
	</div>

<?php } ?>
