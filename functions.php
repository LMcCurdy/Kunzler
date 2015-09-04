<?php

//Hide Admin Bar
add_filter('show_admin_bar', '__return_false');

//Move Yoast SEO to bottom of Page Editor
add_filter( 'wpseo_metabox_prio', function() { return 'low';});

function admin_color_scheme() {
	global $_wp_admin_css_colors;
	$_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');

if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
endif;

function register_my_menus() {
  register_nav_menus(
    array(
      'toptier' => __( 'Top Tier' ),
      'mainmenu' => __( 'Main Menu' ),
      'mobilemenu' => __( 'Mobile Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


add_filter( 'menu_image_default_sizes', function($sizes) {

  // remove the default 36x36 size
  unset($sizes['menu-24x24']);
  unset($sizes['menu-48x48']);

  // add a new size
  $sizes['menu-180x180'] = array(180,180);

  // return $sizes (required)
  return $sizes;
  
});

/*
Create a sidebar in the Widgets section
*/
/*
if ( function_exists('register_sidebars') ):
  register_sidebar(array(
    'name'=>'Logo',
	'id'=>'logo',
    'before_title'=>'',
    'after_title'=>'',
	'before_widget' => '',
	'after_widget'  => ''
  ));
endif;
*/

/*
 * Switches default core markup for search form, comment form,
 * and comments to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
));

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
add_editor_style( 'editor-style.css' );

function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

function my_init_method() {
  if (is_admin() == false ) {
    wp_deregister_script( 'jquery' );
    
    // modernizr (without media query polyfill)
    wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.2.8.3.min.js', array(), '2.8.3', true );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4', false);
    
    // FitVid (responsive video)
    wp_register_script( 'fitvids', get_template_directory_uri() . '/assets/js/libs/FitVids.js-master/jquery.fitvids.js', array('jquery'), '', true );
    wp_register_script( 'fitvids-xtra', get_template_directory_uri() . '/assets/js/fitvid.js', array(), '', true );
    
    // wp_register_scripts
    wp_register_script( 'fastclick', '//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.js', array(), '1.0.6', true );
    wp_register_script( 'hoverIntent', get_template_directory_uri() . '/assets/js/jquery.hoverIntent.js', array('jquery'), '1.8.1', true );
    wp_register_script( 'mmenu', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.3.4/js/jquery.mmenu.min.js', array('jquery'), '5.3.4', true );
    wp_register_script( 'mmenu-search', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.3.4/js/addons/jquery.mmenu.searchfield.min.js', array('jquery'), '5.3.4', true );

    wp_register_script( 'owl', get_template_directory_uri() . '/assets/js/owl-carousel/owl.carousel.min.js', array('jquery'), '12192014', true );
    wp_register_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '12192014', true );
    wp_register_script( 'cookies', get_template_directory_uri() . '/assets/js/js.cookie.js', array('jquery'), '', true );

    // register stylesheets
    wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '4.4.0', 'all' );
    wp_register_style( 'mmenu', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.3.4/css/jquery.mmenu.css', array(), '5.3.4', 'all' );
    wp_register_style( 'mmenu-search', '//cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.3.4/css/addons/jquery.mmenu.searchfield.min.css', array(), '5.3.4', 'all' );

    wp_register_style( 'owl', get_template_directory_uri() . '/assets/js/owl-carousel/owl.carousel.css', array(), '', 'all' );
    wp_register_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css', array(), '', 'all' );
    wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '', 'all' );
    wp_register_style( 'levi', get_template_directory_uri() . '/assets/css/levi.css', array(), '', 'all' );
    
	// enqueue scripts    
    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'fitvids' );
    wp_enqueue_script( 'fitvids-xtra' );
    
    wp_enqueue_script( 'fastclick' );
    wp_enqueue_script( 'hoverIntent' );
    wp_enqueue_script( 'mmenu' );
    wp_enqueue_script( 'mmenu-search' );
    wp_enqueue_script( 'owl' );
    wp_enqueue_script( 'scripts' );
    wp_enqueue_script( 'cookies' );

	// enqueue styles    
    wp_enqueue_style( 'fontawesome' );
    wp_enqueue_style( 'owl' );
    wp_enqueue_style( 'mmenu' );
    wp_enqueue_style( 'mmenu-search' );
    wp_enqueue_style( 'grid' );
    wp_enqueue_style( 'main' );
    wp_enqueue_style( 'levi' );
    
  }
  
}    
add_action('init', 'my_init_method');


/*
Remove the automatic p tag - I would advise not disabling this; makes it easier on the client to update.
*/
// remove_filter('the_content', 'wpautop');



// remove width and height from images
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


/*
function testshortcode_shortcode( $atts, $content = null ) {
	return '<article class="testshortcode">' . $content . '</article>';
}
add_shortcode( 'testshortcode', 'testshortcode_shortcode' );
*/



/**
 * Restricts certain menu items from appearing the WP Admin area. Does not
 * affect Administrator users.
 *
 * @action admin_menu
 */
 /*
function restrict_admin_menu_items() {
 	
	$user_id = get_current_user_id();
	
 	// Don't restrict Administrator users.
	if ( $user_id!="2" )
		return;
 
 	// Array of the menu item slugs you want to remove.
	$restricted = array(
		'menu-posts', // Posts
		'menu-comments', // Comments
		'menu-plugins', // Plugins
		'menu-users', // Users
		'menu-tools', // Tools
		'menu-settings', // Settings
		'toplevel_page_wpseo_dashboard', // SEO
	);
 
 	global $menu;
 
	foreach ( $menu as $item => $data ) {
 
		if ( ! isset( $data[5] ) ) {
			continue; // Move along if the current $item doesn't have a slug.
		} elseif ( in_array( $data[5], $restricted ) ) {
			unset( $menu[$item] ); // Remove the current $item from the $menu.
		}
	}
}
add_action( 'admin_menu', 'restrict_admin_menu_items' );
*/
?>
