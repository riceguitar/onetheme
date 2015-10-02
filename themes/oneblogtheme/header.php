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

	<div class="container-fluid">
		<div class="global-title">
			<?php if (get_theme_mod('one_site_logo')) : ?>
			    <div class='site-logo'>
			        <a href="<?php echo get_site_url(); ?>" rel="home" name="<?php bloginfo( 'name' ); ?>">
			        <img src="<?php echo esc_url(get_theme_mod('one_site_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" id="site-logo-image">
			        <span id="site-logo-name"><?php bloginfo( 'name' ); ?></span>
			        </a>
			    </div>
			<?php else : ?>
			    <hgroup>
			        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
			        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
			    </hgroup>
			<?php endif; ?>
		</div>

		<nav id="global-nav" class="global-nav hidden-xs">
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

		<div id="global-social" class="global-social pull-right hidden-xs">
			<a href="" id="search-trigger"><i class="fa fa-search"></i></a>
			<?php if (get_theme_mod('one_site_social_fb')) { echo '<a href="'.get_theme_mod('one_site_social_fb').'" class="global-social-fb"><i class="fa fa-facebook"></i></a>'; } ?>
			<?php if (get_theme_mod('one_site_social_twitter')) { echo '<a href="'.get_theme_mod('one_site_social_twitter').'" class="global-social-twitter"><i class="fa fa-twitter"></i></a>'; } ?>
			<?php if (get_theme_mod('one_site_social_gplus')) { echo '<a href="'.get_theme_mod('one_site_social_gplus').'" class="global-social-gplus"><i class="fa fa-google-plus"></i></a>'; } ?>
			<?php if (get_theme_mod('one_site_social_linkedin')) { echo '<a href="'.get_theme_mod('one_site_social_linkedin').'" class="global-social-linkedin"><i class="fa fa-linkedin"></i></a>'; } ?>
		</div>

		<div id="global-nav-mobile" class="global-nav-mobile pull-right hidden-sm hidden-md hidden-lg">
			<?php if (is_active_sidebar('one-mobile-player')) { ?>
				<a href="" id="podcast-trigger"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-podcast.png" /></a>
			<?php } ?>
			<a href="" id="search-trigger-mobile"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-search.png" /></a>
			<a href="" id="menu-trigger-mobile"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-hamburger.png" /></a>
		</div>

	</div><!-- //container -->

</section>

<!-- Mobile Navigation -->
<div id="global-nav-mobile-search" class="global-nav-mobile-search hidden-sm hidden-md hidden-lg">
	<?php
	wp_nav_menu( array(
		'menu' => 'Main Website Menu',
		'menu_id' => 'mobile-nav'
	));
	?>
</div>
<!-- // Mobile Navigation -->

<?php if (is_active_sidebar('one-mobile-player')) { ?>
	<!-- Mobile Podcast Player -->
	<div id="mobile-podcast-player" class="mobile-podcast-player hidden-sm hidden-md hidden-lg">
			<?php dynamic_sidebar( 'one-mobile-player' ); ?>
	</div>
	<!-- // Mobile Podcast Player -->
<?php } ?>


<?php endif; ?>
