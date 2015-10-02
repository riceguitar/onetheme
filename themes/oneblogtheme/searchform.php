<?php
/*
Search Form
*/
?>

<form action="/" method="get" class="search-form">
	<div class="search-box">
		<input type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Enter Keywords" autofocus/>
		<label for="search">Type and press return to search this site.</label>
	</div>
	<div class="search-count">
		<?php if (get_search_query() !== '') { ?>
			<span class="search-total">
			<?php
				global $wp_query;
				echo $wp_query->found_posts;
			?>
			</span>
			<span class="search-results-label">
			Results
			</span>
		<?php } ?>
	</div>
	<a class="search-close">
	</a>
</form>

<script>
jQuery(function() {
    jQuery('#search').focus();
});
</script>