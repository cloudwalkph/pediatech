<?php

/* INCLUDES */
require_once('classes/wp_bootstrap_navwalker.php');

/* AFTER THEME SETUP */
if (!function_exists( 'sytian_setup' ) ) {
     function sytian_setup() { 
	 
	 	/* MENU */
        register_nav_menu('primary', __('Primary Navigation', 'sytian'));
		
		/* THEME SUPPORTS */
		add_theme_support( 'post-thumbnails' );
		
		/* WIDGETS SECTION */
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'redrock' ),
			'id'            => 'sidebar-default',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
    }
}
add_action('after_setup_theme', 'sytian_setup');

// ENQUEUE NEEDED STYLES AND SCRIPTS
function sytian_scripts() {
	wp_deregister_script( 'jquery' );
	
    // Enqueue Bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css');

    // PRINT
		wp_enqueue_style('fonts', get_template_directory_uri() . '/fonts/fonts.css');
    wp_enqueue_style('assets', get_template_directory_uri() . '/css/assets.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
		wp_enqueue_style('print', get_template_directory_uri() . '/css/print.css');

    // Enqueue modernizr
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', array(), '2.6.2');

    // Enqueue JQuery and Bootstrap JS
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-1.11.0.min.js', array(), '1.11.0', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'), '3.2.0', true);
	
		// Enqueue Plugins and Main JS
		wp_enqueue_script('plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1', true);
		wp_enqueue_script('roundabout-js', get_template_directory_uri() . '/js/vendor/jquery.roundabout.min.js', array('jquery'), '1', true);
		wp_enqueue_script('caroufredsel-js', get_template_directory_uri() . '/js/vendor/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), '1', true);
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1', true);
}

add_action('wp_enqueue_scripts', 'sytian_scripts');


// CREATE A NICELL FORMATED TITLE
function sytian_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add a page number if necessary.
    if (( $paged >= 2 || $page >= 2 ) && !is_404()) {
        $title = "$title $sep " . sprintf(__('Page %s', 'sytian'), max($paged, $page));
    }

    return $title;
}
add_filter('wp_title', 'sytian_wp_title', 10, 2);

/* EXCERPT CONTENT */
function excerpt_content($contents,$limit) {
$content = explode(' ', $contents, $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}	
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	
	return $content;
}

/* ACF PRO OPTIONS */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
add_filter('show_admin_bar', '__return_false');

/** IMAGE SIZES **/
add_image_size('logo', array(94, 107), true);
add_image_size('footer-logo-thumb', array(212, 74), true);