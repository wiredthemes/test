<?php
// Translation
load_theme_textdomain('Inhouse', TEMPLATEPATH.'/languages');

// Default RSS feed links
add_theme_support('automatic-feed-links');

// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');

// Register Navigation
register_nav_menu('main_navigation', 'Main Navigation');
register_nav_menu('top_navigation', 'Top Navigation');



// Content Width
if (!isset( $content_width )) $content_width = 1000;

/* Options Framework */
require_once('admin/index.php');

// Auto plugin activation
if(get_option('inhouse_int_plugins', '0') == '0') {
	global $wpdb;
	$wpdb->query("UPDATE ". $wpdb->options ." SET option_value = 'a:0:{}' WHERE option_name = 'active_plugins';");
	$wpdb->query("UPDATE ". $wpdb->sitemeta ." SET meta_value = 'a:0:{}' WHERE meta_key = 'active_plugins';");
	update_option('inhouse_int_plugins', '1');
}

if(get_option('inhouse_int_plugins', '0') == '1') {
	/**************************/
	/* Include LayerSlider WP */
	/**************************/

	$layerslider = get_template_directory() . '/base/plugins/LayerSlider/layerslider.php';

	include $layerslider;
	
	$layerslider_last_version = get_option('inhouse_layerslider_last_version', '1.0');

	// Activate the plugin if necessary
	if(get_option('inhouse_layerslider_activated', '0') == '0') {
		// Run activation script
		layerslider_activation_scripts();

		// Save a flag that it is activated, so this won't run again
		update_option('inhouse_layerslider_activated', '1');

		// Save the current version number of LayerSlider
		update_option('inhouse_layerslider_last_version', $GLOBALS['lsPluginVersion']);

	// Do version check
	} else if(version_compare($GLOBALS['lsPluginVersion'], $layerslider_last_version, '>')) {
		// Run again activation scripts for possible adjustments
		layerslider_activation_scripts();

		// Update the version number
		update_option('inhouse_layerslider_last_version', $GLOBALS['lsPluginVersion']);
	}

	/**************************/
	/* Include RevSlider WP */
	/**************************/

	$revslider = get_template_directory() . '/base/plugins/revslider/revslider.php';
	include $revslider;

	// Activate the plugin if necessary
	if(get_option('inhouse_revslider_activated', '0') == '0') {
		if(!class_exists('RevSliderAdmin')) {
			$revslider_admin_script = get_template_directory() . '/base/plugins/revslider/revslider_admin.php';
			include $revslider_admin_script;
		}

	    // Run activation script
	    $revslider_admin = new RevSliderAdmin($revslider);
	    $revslider_admin->onActivate();

	    // Save a flag that it is activated, so this won't run again
	    update_option('inhouse_revslider_activated', '1');
	}

	/**************************/
	/* Include Posts Type Order */
	/**************************/

	$pto = get_template_directory() . '/base/plugins/post-types-order/post-types-order.php';
	if($data['post_type_order']) {
		include $pto;
	}

	/************************************************/
	/* Include Previous / Next Post Pagination Plus */
	/************************************************/
	$pnp = 	get_template_directory() . '/base/plugins/ambrosite-post-link-plus.php';
	include $pnp;
}

// Double check if rev slider table exists
/*if(get_option('inhouse_revslider_activated', '0') == '1') {
	global $wpdb;
	$revslider_db_exists = $wpdb->get_results("SHOW TABLES LIKE '".$wpdb->prefix."revslider_slides'");
	if(!$revslider_db_exists) {
		if(!class_exists('RevSliderAdmin')) {
			$revslider_admin_script = get_template_directory() . '/base/plugins/revslider/revslider_admin.php';
			include $revslider_admin_script;
		}

    	// Run activation script
    	$revslider_admin = new RevSliderAdmin($revslider);
    	$revslider_admin->onActivate();
	}

	$revslider_siteid_exists = $wpdb->get_results("SHOW COLUMNS FROM ".$wpdb->prefix."revslider_sliders LIKE 'siteid'");
	if(!$revslider_siteid_exists) {
		if(!class_exists('RevSliderAdmin')) {
			$revslider_admin_script = get_template_directory() . '/base/plugins/revslider/revslider_admin.php';
			include $revslider_admin_script;
		}

    	// Run activation script
    	$revslider_admin = new RevSliderAdmin($revslider);
    	$revslider_admin->onActivate();

    	$wpdb->query("ALTER TABLE ".$wpdb->prefix."revslider_sliders ADD COLUMN siteid int");
	}
}*/


// Check for theme updates
/*if($data['tf_username'] && $data['tf_api']) {
	$envato = get_template_directory() . '/base/plugins/envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php';
	include $envato;
	$upgrader = new Envato_WordPress_Theme_Upgrader($data['tf_username'], $data['tf_api']);
	$check_upgrade = $upgrader->check_for_theme_update('Inhouse');
	var_dump($check_upgrade);
	if($check_upgrade->updated_themes_count && $data['tf_update']) {
		$upgrader->upgrade_theme();
	}
}*/

// Metaboxes
include_once('extend/metaboxes/metaboxes.php');

// Extend Visual Composer
include_once('extend/shortcodes/shortcodes.php');

// Widgets
include_once('extend/widgets/widgets.php');

// Custom Functions
include_once('extend/functions/theme-functions.php');

// Plugins
include_once('base/plugins/multiple_sidebars.php');

// Add post thumbnail functionality
add_theme_support('post-thumbnails');
add_image_size('blog-large', 669, 272, true);
add_image_size('blog-medium', 320, 202, true);
add_image_size('tabs-img', 52, 50, true);
add_image_size('related-img', 180, 138, true);
add_image_size('portfolio-one', 540, 272, true);
add_image_size('portfolio-two', 460, 295, true);
add_image_size('portfolio-three', 300, 214, true);
add_image_size('portfolio-four', 220, 161, true);
add_image_size('portfolio-full', 940, 400, true);
add_image_size('recent-posts', 660, 405, true);
add_image_size('recent-works-thumbnail', 66, 66, true);

// Register widgetized locations
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'inhouse-blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="heading"><h3>',
		'after_title' => '</h3></div>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 1',
		'id' => 'inhouse-footer-widget-1',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 2',
		'id' => 'inhouse-footer-widget-2',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 3',
		'id' => 'inhouse-footer-widget-3',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 4',
		'id' => 'inhouse-footer-widget-4',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '<div style="clear:both;"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// Register custom post types
add_action('init', 'wired_init');
function wired_init() {
	global $data;
	register_post_type(
		'inhouse_portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Portfolio'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => $data['portfolio_slug']),
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			'can_export' => true,
		)
	);

	register_taxonomy('portfolio_category', 'inhouse_portfolio', array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));
	register_taxonomy('portfolio_skills', 'inhouse_portfolio', array('hierarchical' => true, 'label' => 'Skills', 'query_var' => true, 'rewrite' => true));

}

// How comments are displayed
function inhouse_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<?php $add_below = ''; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	
		<div class="the-comment">
			<div class="avatar">
				<?php echo get_avatar($comment, 54); ?>
			</div>
			
			<div class="comment-box">
			
				<div class="comment-author meta">
					<strong><?php echo get_comment_author_link() ?></strong>
					<?php printf(__('%1$s at %2$s', 'Inhouse'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__(' - Edit', 'Inhouse'),'  ','') ?><?php comment_reply_link(array_merge( $args, array('reply_text' => __(' - Reply', 'Inhouse'), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			
				<div class="comment-text">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php echo __('Your comment is awaiting moderation.', 'Inhouse') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
			
			</div>
			
		</div>

<?php }

/*function wired_SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','wired_SearchFilter');*/

add_filter('wp_get_attachment_link', 'inhouse_pretty');
function inhouse_pretty($content) {
	$content = preg_replace("/<a/","<a rel=\"prettyPhoto[postimages]\"",$content,1);
	return $content;
}

require_once('base/plugins/multiple-featured-images/multiple-featured-images.php');

if( class_exists( 'kdMultipleFeaturedImages' )  && !$data['legacy_posts_slideshow']) {
		$i = 2;

		while($i <= $data['posts_slideshow_number']) {
	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'post',      // Set this to post or page
	                'labels' => array(
	                    'name'      => 'Featured image '.$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'page',      // Set this to post or page
	                'labels' => array(
	                    'name'      => 'Featured image '.$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'inhouse_portfolio',      // Set this to post or page
	                'labels' => array(
	                    'name'      => 'Featured image '.$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $i++;
    	}

}

function inhouse_excerpt_length( $length ) {
	global $data;
	
	if(isset($data['excerpt_length_blog'])) {
		return $data['excerpt_length_blog'];
	}
}
add_filter('excerpt_length', 'inhouse_excerpt_length', 999);

function inhouse_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name', // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'smof_options', // link ID, defaults to a sanitized title value
		'title' => __('Theme Options'), // link title
		'href' => admin_url( 'themes.php?page=optionsframework'), // name of file
		'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
	));
}
add_action( 'wp_before_admin_bar_render', 'inhouse_admin_bar_render' );

add_filter('upload_mimes', 'inhouse_filter_mime_types');
function inhouse_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}


function tf_content($limit, $strip_html) {
	global $data;

	$test_strip_html = $strip_html;

	if(is_string($strip_html) == true && $strip_html == 'true') {
		$test_strip_html = true;
	}

	if(is_string($strip_html) == true && $strip_html == 'false') {
		$test_strip_html = false;
	}

	if($test_strip_html) {
		$raw_content = strip_shortcodes( strip_tags( get_the_content() ) );
	} else {
		$raw_content = strip_shortcodes( get_the_content() );
	}

	if($raw_content) {
		$content = explode(' ', $raw_content, $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).' &#91;...&#93;';
		} else {
		$content = implode(" ",$content);
		}	
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}
}



function inhouse_scripts() {
	if (!is_admin()) {
	wp_reset_query();
    wp_enqueue_script( 'jquery', false, array(), false, true);

    wp_deregister_script( 'modernizr' );
    wp_register_script( 'modernizr', get_bloginfo('template_directory').'/js/modernizr.js', array(), false, true);
	wp_enqueue_script( 'modernizr' );

    wp_deregister_script( 'jquery.elastislide' );
    wp_register_script( 'jquery.elastislide', get_bloginfo('template_directory').'/js/jquery.elastislide.js', array(), false, true);
	wp_enqueue_script( 'jquery.elastislide' );

    wp_deregister_script( 'jquery.prettyPhoto' );
    wp_register_script( 'jquery.prettyPhoto', get_bloginfo('template_directory').'/js/jquery.prettyPhoto.js', array(), false, true);
	wp_enqueue_script( 'jquery.prettyPhoto' );

    wp_deregister_script( 'jquery.isotope' );
    wp_register_script( 'jquery.isotope', get_bloginfo('template_directory').'/js/jquery.isotope.min.js', array(), false, true);
	wp_enqueue_script( 'jquery.isotope' );

    wp_deregister_script( 'jquery.flexslider' );
    wp_register_script( 'jquery.flexslider', get_bloginfo('template_directory').'/js/jquery.flexslider-min.js', array(), false, false);
	wp_enqueue_script( 'jquery.flexslider' );

    wp_deregister_script( 'jquery.cycle' );
    wp_register_script( 'jquery.cycle', get_bloginfo('template_directory').'/js/jquery.cycle.lite.js', array(), false, true);
	wp_enqueue_script( 'jquery.cycle' );

    wp_deregister_script( 'jquery.fitvids' );
    wp_register_script( 'jquery.fitvids', get_bloginfo('template_directory').'/js/jquery.fitvids.js', array(), false, false);
	wp_enqueue_script( 'jquery.fitvids' );

    wp_deregister_script( 'jquery.hoverIntent' );
    wp_register_script( 'jquery.hoverIntent', get_bloginfo('template_directory').'/js/jquery.hoverIntent.minified.js', array(), false, true);
	wp_enqueue_script( 'jquery.hoverIntent' );

    wp_deregister_script( 'jquery.easing' );
    wp_register_script( 'jquery.easing', get_bloginfo('template_directory').'/js/jquery.easing.js', array(), false, false);
	wp_enqueue_script( 'jquery.easing' );

    wp_deregister_script( 'jquery.eislideshow' );
    wp_register_script( 'jquery.eislideshow', get_bloginfo('template_directory').'/js/jquery.eislideshow.js', array(), false, true);
	wp_enqueue_script( 'jquery.eislideshow' );

    wp_deregister_script( 'froogaloop' );
    wp_register_script( 'froogaloop', get_bloginfo('template_directory').'/js/froogaloop.js', array(), false, true);
	wp_enqueue_script( 'froogaloop' );

    wp_deregister_script( 'jquery.placeholder' );
    wp_register_script( 'jquery.placeholder', get_bloginfo('template_directory').'/js/jquery.placeholder.js', array(), false, true);
	wp_enqueue_script( 'jquery.placeholder' );

    wp_deregister_script( 'jquery.waypoint' );
    wp_register_script( 'jquery.waypoint', get_bloginfo('template_directory').'/js/jquery.waypoint.js', array(), false, true);
	wp_enqueue_script( 'jquery.waypoint' );
	
    wp_deregister_script( 'inhouse' );
    wp_register_script( 'inhouse', get_bloginfo('template_directory').'/js/init.js', array(), false, true);
	wp_enqueue_script( 'inhouse' );
	}
}
add_action('init', 'inhouse_scripts');

add_filter('jpeg_quality', 'inhouse_image_full_quality');
add_filter('wp_editor_set_quality', 'inhouse_image_full_quality');
function inhouse_image_full_quality($quality) {
    return 100;
}

add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
	$get_count = preg_match_all('#\((.*?)\)#', $links, $matches);

	//var_dump($matches);
	if($matches) {
		$i = 0;
		foreach($matches[0] as $val) {
			//var_dump($val);
			$links = str_replace('</a> '.$val, ' '.$val.'</a>', $links);
			$i++;
		}
	}

	return $links;
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

add_filter('pre_get_posts','inhouse_SearchFilter');
function inhouse_SearchFilter($query) {
	global $data;
	if($query->is_search) {
		if($data['search_content'] == 'Only Posts') {
			$query->set('post_type', 'post');
		}

		if($data['search_content'] == 'Only Pages') {
			$query->set('post_type', 'page');
		}
	}
	return $query;
}