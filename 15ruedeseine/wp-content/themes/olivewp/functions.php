<?php
/**
 * OliveWP functions and definitions
 *
 * @package OliveWP Theme
 */

// Global variables define
define('OLIVEWP_TEMPLATE_DIR_URI', get_template_directory_uri());
define('OLIVEWP_TEMPLATE_DIR', get_template_directory());

// wp_body_open function definition
if ( ! function_exists( 'wp_body_open' ) ) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/**
 * Load all core theme function files
*/
require OLIVEWP_TEMPLATE_DIR . '/inc/scripts/script.php';
require OLIVEWP_TEMPLATE_DIR . '/inc/helpers.php';
require OLIVEWP_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php';
require OLIVEWP_TEMPLATE_DIR . '/inc/customizer/customizer.php';
require OLIVEWP_TEMPLATE_DIR . '/inc/menu/default_menu_walker.php';
require OLIVEWP_TEMPLATE_DIR . '/inc/menu/olivewp_nav_walker.php';
require OLIVEWP_TEMPLATE_DIR . '/inc/theme-color/custom-color.php';
require OLIVEWP_TEMPLATE_DIR . '/partials/widgets/register-sidebars.php';

if ( ! function_exists( 'olivewp_plus_activate' ) ) {
	require OLIVEWP_TEMPLATE_DIR . '/inc/class-tgm-plugin-activation.php';	
	require OLIVEWP_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php';
	require OLIVEWP_TEMPLATE_DIR . '/inc/theme-color/color-background.php';
	require OLIVEWP_TEMPLATE_DIR . '/inc/typography/custom-typography.php';
	require OLIVEWP_TEMPLATE_DIR . '/inc/typography/webfonts.php';
}


if ( ! function_exists( 'olivewp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
		function olivewp_setup() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on olivewp, use a find and replace
			 * to change 'olivewp' to the name of your theme in all the template files.
			 */
			load_theme_textdomain( 'olivewp', OLIVEWP_TEMPLATE_DIR . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			*/
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			*/
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus(
				array(
					'primary' => esc_html__( 'Primary Menu', 'olivewp' ),
				)
			);

			// Set up the WordPress core custom background feature.
			add_theme_support('custom-background');

			// woocommerce support
        	add_theme_support('woocommerce');

        	// Woocommerce Gallery Support
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/*
			 * Add support for core custom logo.
			*/
			add_theme_support('custom-logo',
				array(
					'height'      => 45,
					'width'       => 235,
					'flex-width'  => true,
					'flex-height' => true,
					'header-text' => array('site-title', 'site-description')
				)
			);

			//About Theme
	        if(!function_exists( 'olivewp_plus_activate' )) :        
	            $olivewp_theme = wp_get_theme(); // gets the current theme
	            if ('OliveWP' == $olivewp_theme->name) {
	                if (is_admin()) {
	                    require OLIVEWP_TEMPLATE_DIR . '/admin/admin-init.php';
	                }
	            }
	        endif;

		}
endif;
add_action( 'after_setup_theme', 'olivewp_setup' );


if ( ! function_exists( 'olivewp_plus_activate' ) ) {

/**
 * Register the required plugins for this theme.
*/
    function olivewp_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
             // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => 'Spice Starter Sites',
                'slug'      => 'spice-starter-sites',
                'required'  => false,
            ),
            array(
                'name'      => 'One Click Demo Import',
                'slug'      => 'one-click-demo-import',
                'required'  => false,
            ),
        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           =>	'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => 	'',                      // Default absolute path to bundled plugins.
            'menu'         => 	'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => 	true,                    // Show admin notices or not.
            'dismissable'  => 	true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => 	'',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => 	false,                   // Automatically activate plugins after installation or not.
            'message'      => 	''                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
    add_action( 'tgmpa_register', 'olivewp_register_required_plugins' );
}


// Theme title
if (!function_exists('olivewp_head_title')) {

    function olivewp_head_title($title, $sep) {
        global $paged, $page;

        if (is_feed())
            return $title;

        // Add the site name
        $title .= get_bloginfo('name');

        // Add the site description for the home / front page
        $site_description = get_bloginfo('description');
        if ($site_description && ( is_home() || is_front_page() ))
            $title = "$title $sep $site_description";

        // Add a page number if necessary.
        if (( $paged >= 2 || $page >= 2 ) && !is_404())
            $title = "$title $sep " . sprintf(esc_html__('Page', 'olivewp' ), max($paged, $page));

        return $title;
    }

}
add_filter('wp_title', 'olivewp_head_title', 10, 2);


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function olivewp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'olivewp_content_width', 640 );
}
add_action( 'after_setup_theme', 'olivewp_content_width', 0 );