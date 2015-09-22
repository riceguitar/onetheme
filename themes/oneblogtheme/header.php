<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<meta charset="utf-8" />

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if (!is_search()) : ?>
<?php get_template_part( 'partials/search', 'over' ); ?>
<section class="global-header">

	<div class="container">
		<div class="global-title">
			<?php if (get_theme_mod('one_site_logo')) : ?>
			    <div class='site-logo'>
			        <a href="<?php echo get_site_url(); ?>" rel="home" name="<?php bloginfo( 'name' ); ?>">
			        <img src="<?php echo esc_url(get_theme_mod('one_site_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" id="site-logo-image">
			        </a>
			    </div>
			<?php else : ?>
			    <hgroup>
			        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
			        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
			    </hgroup>
			<?php endif; ?>
		</div>

		<nav id="global-nav" class="global-nav">
			<?php
			wp_nav_menu( array(
				'menu' => 'Main Website Menu'
			));
			?>

			<?php
				// search trigger
				// facebook link
				// twitter link
				// linkedin link
				// subscribe link
			?>
		</nav>

		<div id="global-social" class="global-social pull-right">
			<a href="" id="search-trigger"><i class="fa fa-search"></i></a>
			<?php if (get_theme_mod('one_site_social_fb')) { echo '<a href="'.get_theme_mod('one_site_social_fb').'" class="global-social-fb"><i class="fa fa-facebook"></i></a>'; } ?>
			<?php if (get_theme_mod('one_site_social_twitter')) { echo '<a href="'.get_theme_mod('one_site_social_twitter').'" class="global-social-twitter"><i class="fa fa-twitter"></i></a>'; } ?>
			<?php if (get_theme_mod('one_site_social_gplus')) { echo '<a href="'.get_theme_mod('one_site_social_gplus').'" class="global-social-gplus"><i class="fa fa-google-plus"></i></a>'; } ?>
			<?php if (get_theme_mod('one_site_social_linkedin')) { echo '<a href="'.get_theme_mod('one_site_social_linkedin').'" class="global-social-linkedin"><i class="fa fa-linkedin"></i></a>'; } ?>
		</div>

	</div><!-- //container -->

</section>
<?php endif; ?>
