<?php
/**
 * The template for displaying comments
*/
?>

<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="row">
	<?php if (!get_post_format()) { ?>
	<div class="col-md-10 col-md-offset-2">
	<?php } else { ?>
	<div class="col-md-12">
	<?php } ?>
		<div id="comments" class="comments-area">

			<h3 class="comment-head">
			Leave a Comment
			</h3>
			<div class="comment-form-top">
				<i class="fa fa-commenting-o"></i>
				<?php
					printf(_nx('1 Comment', '%1$s comments', get_comments_number(), 'comments', 'twentyfifteen'),
					number_format_i18n(get_comments_number()), get_the_title());
				?>
			</div>
			<?php comment_form(); ?>

			<?php if ( have_comments() ) : ?>
				<?php
					//printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
						//number_format_i18n( get_comments_number() ), get_the_title() );
				?>

				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'style'       => 'ol',
							'short_ping'  => true,
							'avatar_size' => 56,
						) );
					?>
				</ol><!-- .comment-list -->

			<?php endif; // have_comments() ?>

			<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
			<?php endif; ?>

		</div><!-- .comments-area -->
	</div>
</div>
