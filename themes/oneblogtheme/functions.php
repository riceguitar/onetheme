<?php
// ************* Load JS
function one_theme_js() {
	wp_enqueue_script( 'one_theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'one_theme_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js' );
	//wp_enqueue_script( 'one_theme_waypoints', get_template_directory_uri() . '/js/waypoints.js' );
	wp_enqueue_script( 'one_theme_stickykit', get_template_directory_uri() . '/js/sticky-kit.js' );
	wp_enqueue_script( 'one_theme_fancyjs', get_template_directory_uri() . '/js/fancy/jquery.fancybox.pack.js' );
}
add_action( 'wp_enqueue_scripts', 'one_theme_js' );

// ************* Load CSS
function one_theme_css() {
	wp_enqueue_style( 'one-theme-info', get_stylesheet_uri(), 1);
	wp_enqueue_style( 'one-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.css', 5);
	//wp_enqueue_style( 'one-brand-font', get_template_directory_uri() . '/css/fonts.css', 6);
	wp_enqueue_style( 'one-brand-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic', 6);
	wp_enqueue_style( 'one-heading-font', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700');
	wp_enqueue_style( 'one-heading-font-two', 'https://fonts.googleapis.com/css?family=Oswald:400,700');
	wp_enqueue_style( 'one-fa', '//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', 7);
	wp_enqueue_style( 'one-fancy-css', get_template_directory_uri() . '/js/fancy/jquery.fancybox.css', 8);
	wp_enqueue_style( 'one-bars', get_template_directory_uri() . '/css/bars.css', 12);
	wp_enqueue_style( 'one-style', get_template_directory_uri() . '/css/style.css', 10);
	wp_enqueue_style( 'one-print', get_template_directory_uri() . '/css/print.css', '10', '','print');
}
add_action( 'wp_enqueue_scripts', 'one_theme_css' );

// ************* Register Navs
register_nav_menus(array(
	'one_main_nav' => 'Main Website Menu',
	'one_footer_nav' => 'Footer Menu',
));

// ************* Add Post Supports
add_theme_support(
	'post-formats',
	array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio')
);

add_theme_support( 
	'post-thumbnails' 
); 

add_theme_support(
	'title-tag'
);

add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );

add_image_size( 'quote-widget', 350, 670, array( 'center', 'center' ) );
add_image_size( 'quote-widget-square', 670, 670, array( 'center', 'center' ) );
add_image_size( 'search-thumb', 500, 500, array( 'center', 'center' ) );

// ************* Customizer
function one_theme_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'one_logo_section',
		array(
			'title'       => __( 'Logo', 'one_theme' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		)
	);
	$wp_customize->add_section(
		'one_social_media', 
		array(
			'title'    => __('Social Media', 'one_theme'),
			'description' => 'Enter the URLs to any of the social media pages you have. Links will display automatically.',
			'priority' => 40,
    	)
	);
	$wp_customize->add_section(
		'one_design_options', 
		array(
			'title'    => __('Design Options', 'one_theme'),
			'description' => 'You can control several design options here.',
			'priority' => 40,
    	)
	);
	$wp_customize->add_section(
		'one_mobile_options', 
		array(
			'title'    => __('Mobile Options', 'one_theme'),
			'description' => 'You can control options that effect moble only.',
			'priority' => 50,
    	)
	);

	$wp_customize->add_setting('one_site_logo', array('capability' => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_logo_mobile', array('capability' => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_social_fb', array('capability'  => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_social_twitter', array('capability'  => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_social_gplus', array('capability'  => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_social_linkedin', array('capability'  => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_design_sticky_widget_mid', array('capability' => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_design_sticky_widget_right', array('capability' => 'edit_theme_options'));
	$wp_customize->add_setting('one_site_mobile_message', array('capability' => 'edit_theme_options'));
 
    $wp_customize->add_control(
    	'one_theme_social_fb', 
		array(
			'label'      => __('Facebook URL', 'one_theme'),
			'section'    => 'one_social_media',
			'settings'   => 'one_site_social_fb',
		)
	);
	$wp_customize->add_control(
    	'one_theme_social_twitter', 
		array(
			'label'      => __('Twitter URL', 'one_theme'),
			'section'    => 'one_social_media',
			'settings'   => 'one_site_social_twitter',
		)
	);
	$wp_customize->add_control(
    	'one_theme_social_gplus', 
		array(
			'label'      => __('Google+ URL', 'one_theme'),
			'section'    => 'one_social_media',
			'settings'   => 'one_site_social_gplus',
		)
	);
	$wp_customize->add_control(
    	'one_theme_social_linkedin', 
		array(
			'label'      => __('LinkedIn URL', 'one_theme'),
			'section'    => 'one_social_media',
			'settings'   => 'one_site_social_linkedin',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control( 
			$wp_customize, 'one_site_logo', array(
				'label'    => __( 'Logo', 'one_theme' ),
				'section'  => 'one_logo_section',
				'settings' => 'one_site_logo',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control( 
			$wp_customize, 'one_site_logo_mobile', array(
				'label'    => __( 'Logo', 'one_theme' ),
				'section'  => 'one_logo_section',
				'settings' => 'one_site_logo_mobile',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
	    	'one_theme_design_sticky_widget_right', 
			array(
				'label'      => __('Enable Sticky Widgets (Right)', 'one_theme'),
				'section'    => 'one_design_options',
				'settings'   => 'one_site_design_sticky_widget_right',
				'type'		 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
	    	'one_theme_design_sticky_widget_mid', 
			array(
				'label'      => __('Enable Sticky Widgets (Mid)', 'one_theme'),
				'section'    => 'one_design_options',
				'settings'   => 'one_site_design_sticky_widget_mid',
				'type'		 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
	    	'one_theme_mobile_message', 
			array(
				'label'      => __('Mobile Message', 'one_theme'),
				'section'    => 'one_mobile_options',
				'settings'   => 'one_site_mobile_message',
				'type'		 => 'textarea',
			)
		)
	);
}
add_action( 'customize_register', 'one_theme_customizer' );

// ************* Column Width
function one_col_width($type) {
	if ($type == 'content') {
		if (is_active_sidebar('one-midbar') && !is_single()) {
			$colsize = 7;
		} else {
			$colsize = 9;
		}
	} elseif ($type == 'mid_bar') {
		$colsize = 2;
	} elseif ($type == 'side_bar') {
		if (is_single()) {
			$colsize = 3;
		} else {
			$colsize = 3;
		}
	} else {
		$colsize = 1;
	}
	echo 'col-md-'.$colsize;
}

// *************** Widget Areas
function one_widgets() {
	register_sidebar(array(
		'name'          => 'Side Bar',
		'id'            => 'one-sidebar',
		'description'   => 'This is the website\'s main right sidebar. This is a good place to put things like category lists.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="one-widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => 'Middle Bar',
		'id'            => 'one-midbar',
		'description'   => 'This is an optional Middle Bar between the primary content column and sidebar. It\'s a thin area, choose your widgets wisely',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="one-widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => 'Footer Widgets',
		'id'            => 'one-footer',
		'description'   => 'This is an optional Footer widget area. It was designed for showing logos.',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="one-widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Post Closer Widgets',
		'id'            => 'one-post-closer',
		'description'   => 'This is an optional widget area, on the bottom of each post content.',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="one-widget-title" style="display: none;">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Search Results Widgets',
		'id'            => 'one-search-results',
		'description'   => 'This is an optional widget area, on the sidebar of search results.',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="one-widget-title" style="display: none;">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Mobile Podcast Widgets',
		'id'            => 'one-mobile-player',
		'description'   => 'This is an optional widget area, that enables you to put a podcast player for mobile.',
		'before_widget' => '<div class="widget mobile-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="one-widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action( 'widgets_init', 'one_widgets' );

// ************* Homepage Slider
function one_blog_slider() {
	if  (is_front_page() && function_exists('soliloquy')) {
		echo '
		<div class="home-slider-container hidden-xs">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="home-slider">';
							soliloquy('home-page-slider', 'slug');
						echo '</div>
					</div>
				</div>
			</div>
		</div>
		';
	}
}
add_action( 'one_above_content', 'one_blog_slider');

// ************* Cateogry List
function one_category_list() {
	echo '<section class="category-list hidden-xs">
			<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<ul class="category-list-top">';
			wp_list_categories(array(
				'title_li' => __( '' ),
			));
	echo '</ul></div></div></div></section>';
}
add_action( 'one_above_content', 'one_category_list');

// ************* Category Colors
function one_category_colors() {
	$categories = get_the_category();
	$separator = ' ';
	$output = '';
	if($categories){
		$output .= '<div class="post-cat-list">';
	    foreach($categories as $category) {
	    	//$rl_category_color = rl_color($category->cat_ID);
	    	$rl_category_color = get_field('one_category_color', $category);
			$output .= '<a href="'.get_category_link( $category->term_id ).'" style="border-color:'.$rl_category_color.';" class="cat-list-item">'.$category->cat_name.'</a>'.$separator;
	    }
	    $output .= '</div>';
		echo trim($output, $separator);
	}
}

// **************** Sharing Links
function one_sharing($type, $icon) {

	$share_fbapp_id = '';
	$share_url = get_permalink();
	$share_title = get_the_title();
	
	if ($type == 'facebook') {
		$share_link = 'https://www.facebook.com/sharer/sharer.php?u='.$share_url;
	} elseif ($type == 'twitter') {
		$share_link = 'https://twitter.com/intent/tweet?url='.$share_url.'&text='.$share_title.'&via=leadertribe';
	} elseif ($type == 'google-plus') {
		$share_link = 'https://plus.google.com/share?url='.$share_url;
	} elseif ($type == 'linkedin') {
		$share_link = 'https://www.linkedin.com/shareArticle?mini=true&url='.$share_url.'&title='.$share_title.'&source=LeaderTribe';
	} elseif ($type == 'print') {
		$share_link = $share_url.'#print';
	} elseif ($type == 'email') {
		$share_email_text = rawurlencode('Hey,

I wanted to share this post from Leader Tribe with you.

'.get_permalink().'

Thanks!');
		$share_link = 'mailto:?subject='.get_the_title().'&body='.$share_email_text;
	} else {
		echo '<!-- '. $type .' is not supported -->';
	}

	$share_output = '<a href="';
	$share_output .= $share_link;
	$share_output .= '" class="one-share-'.$type.' share-network">';
	if ($icon) {
		$share_output .= '<i class="fa fa-'.$icon.'"></i>';
	}
	$share_output .= '</a>';
	echo $share_output;
}

function one_sharing_all () {
	if (is_single()) {
		echo '<div class="post-sharing remove-social clearfix">';
	} else {
		echo '<div class="post-sharing clearfix">';
	}
		one_sharing('facebook', 'facebook');
		one_sharing('twitter', 'twitter');
		one_sharing('linkedin', 'linkedin');
		one_sharing('google-plus', 'google-plus');
		one_sharing('email', 'envelope-o');
		one_sharing('print', 'print');
		if (!has_post_format()) {
			echo '<a href="#" class="back-to-top">Top Up</a>';
		}
	echo '</div>';
}

function one_sharing_fb_js () {
	echo '
		<!-- Load Facebook SDK for JavaScript -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=155021855862";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, \'script\', \'facebook-jssdk\'));</script>
	';
}
//add_action( 'one_above_content', 'one_sharing_fb_js');

function one_read_more() {
	return '<p><a class="read-more" href="' . get_permalink() . '">Read More</a></p>';
}
add_filter( 'the_content_more_link', 'one_read_more' );

// Search Overlay
if (is_search()) {
	show_admin_bar(false);
}

// Mailchimp Subscriber Count
function display_mc_subscriber_count() {
	if(class_exists("yksemeBase")) {
		$mailChimp = new yksemeBase();
		$list = $mailChimp->getListsData();
		$list_id = key($list);
		echo '<script>
			jQuery(function() {
			jQuery(".mailchimpCountTarget").text("'.$list['subscriber-count']['subscriber-count-'.$list_id].'");
		});
		</script>';
	}
}
add_action( 'one_above_content' , 'display_mc_subscriber_count' );

// Build Category Colors
function show_categories($excl=''){
   $categories = get_categories(array(
   		'hide_empty' => false
   	));
	echo '<style>';
	foreach ($categories as $cat) {
		echo '.category-list .category-list-top .cat-item-'.$cat->cat_ID.' a:hover {box-shadow: 0 -3px 0px '. get_field('one_category_color', $cat) . ' inset;}';
	}

	foreach ($categories as $cat) {
		echo '.category-list .category-list-top .current-cat.cat-item-'.$cat->cat_ID.' a {box-shadow: 0 -3px 0px '. get_field('one_category_color', $cat) . ' inset;}';
	}
	echo '</style>';
}
add_action('wp_head', 'show_categories');

// Fixed Widgets Option
function one_fixed_mid() {
	if (get_theme_mod('one_site_design_sticky_widget_mid')) {
		echo "
			stickyMidbarID = jQuery('.sidebar-mid aside:last-child').attr('ID');
  			jQuery('#'+stickyMidbarID).sticky({topSpacing:20, bottomSpacing:200});
		";
	}
}

function one_fixed_right() {
	if (get_theme_mod('one_site_design_sticky_widget_right')) {
		echo "
			stickySidebarID = jQuery('.sidebar-right aside:last-child').attr('ID');
  			jQuery('#'+stickySidebarID).sticky({topSpacing:20, bottomSpacing:200});
		";
	}
}

function one_fixed_toggle() {
	echo '<script type="text/javascript">';
		one_fixed_right();
		one_fixed_mid();
	echo '</script>';
}
add_action( 'wp_footer', 'one_fixed_toggle' );

function one_scroll_away() {
	if (is_single()) {
		echo '<script type="text/javascript">';
		echo "
			jQuery(function($){
		      var _top = $(window).scrollTop();
		      var _direction;
		      $(window).scroll(function(){
		          var _cur_top = $(window).scrollTop();
		          if((_top < _cur_top) && ($(window).scrollTop() > 24))
		          {
		              jQuery('.global-header').addClass('hide-away');
		              jQuery('.post-sharing').removeClass('remove-social');
		          }
		          else
		          {
		              jQuery('.global-header').removeClass('hide-away');
		              jQuery('.post-sharing').addClass('remove-social');
		          }
		          _top = _cur_top;
		      });
		  });
		";
		echo '</script>';
	}
}
add_action( 'wp_footer', 'one_scroll_away' );



// Change Search Results Count
function change_wp_search_size($query) {
	if ( $query->is_search ) // Make sure it is a search page
		$query->query_vars['posts_per_page'] = 100; // Change 10 to the number of posts you would like to show

	return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

// Change Default Page Template Name
function yourprefix_filter_gettext( $translation, $text, $domain ) {
    if ( $text == 'Default Template' ) {
        return __( 'Page with Right Sidebar', 'one_theme' );
    }
    return $translation;
}
add_filter( 'gettext', 'yourprefix_filter_gettext', 10, 3 );  

// Gravity forms return on confirm
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_tabindex', '__return_false' );



