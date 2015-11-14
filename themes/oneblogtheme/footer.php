</div><!-- primary -->


<?php if (!is_search()) : ?>
<div class="footer-widgets">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<?php if (is_active_sidebar('one-footer')) { ?>
				<?php dynamic_sidebar( 'one-footer' ); ?>
			<?php } ?>
			</div>
		</div>
	</div>
</div>

<footer class="global-footer" id="globalFooter">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php $one_blog_theme = wp_get_theme(); ?>
				&copy; <?php echo date("Y"); ?> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
				-
				Powered by <a href="<?php echo $one_blog_theme->get('ThemeURI'); ?>"><?php echo $one_blog_theme->get('Name'); ?></a>
				-
				All Rights Reserved. Earnings Disclaimer
				-
				Privacy Policy
			</div>
		</div>
	</div>
</footer>
<?php endif; ?>

<?php wp_footer(); ?>

</div>
</body>
</html>