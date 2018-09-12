<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}


function theme_scripts(){
	$parts = parse_url(site_url());
	$domain_url = $parts['scheme'] . '://' . $parts['host'];

    if ( !is_admin() ) {
		wp_register_script('particles', ASSETS_URL . '/assets/scripts/particle/particles.min.js', array(), false, true);
		wp_register_script('swiper','https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js', false, false, true);
		wp_register_script('main', ASSETS_URL . '/assets/scripts/main.js', array('particles'), false, true);
		
		wp_enqueue_script('particles');
		wp_enqueue_script('swiper');
		wp_enqueue_script('main');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/main.css';

	if( $styles_path ) {
		wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Kaushan+Script|Lora:400,700|Roboto:300i,400,700&amp;subset=latin-ext', array(), false, 'all');
		wp_register_style('swiper',  'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css', array(), false, 'all');
		wp_register_style('main-css', ASSETS_URL . '/assets/style/css/main.css', array(), false, 'all');

		wp_enqueue_style('google-fonts');
		wp_enqueue_style('swiper');
		wp_enqueue_style('main-css');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation' ) 
	));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
//'Testimonials' => 'Testimonial'

);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function dump($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

class Walker_Menu_With_Icons extends Walker {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    /**
     * At the start of each element, output a <li> <i> and <a> tag structure.
     * 
     * Note: Menu objects include nav_navigation_icon, url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= sprintf( "\n<li><i class='%s'></i><a href='%s'%s>%s</a></li>\n",
			$item->nav_navigation_icon,
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }
}

function create_posttype() {
	register_post_type( 'projects',
		array(
			'labels' => array(
			'name' => __( 'Projects' ),
			'singular_name' => __( 'Project' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => __('projects')),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail')
		)
	);
}
add_action( 'init', 'create_posttype' );

function create_project_taxonomy() {
	register_taxonomy(
		'project-category',
		'projects',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => __('project-category') ),
			'hierarchical' => true,
		)
	);
}

add_action( 'init', 'create_project_taxonomy' );

add_image_size('work_image', 274, 238, true);
add_image_size('blog_image', 346, 210, true);
add_image_size('profile_image', 250, 350, true);

?>
