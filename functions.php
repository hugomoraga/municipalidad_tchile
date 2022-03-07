<?php
/**
 * municipalidad_tchile functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package municipalidad_tchile
 */
require get_template_directory() . '/inc/includes.php';


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}



if ( ! function_exists( 'municipalidad_tchile_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function municipalidad_tchile_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on municipalidad_tchile, use a find and replace
		 * to change 'municipalidad_tchile' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'municipalidad_tchile', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Default Menu', 'municipalidad_tchile' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'municipalidad_tchile_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'municipalidad_tchile_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function municipalidad_tchile_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'municipalidad_tchile_content_width', 640 );
}
add_action( 'after_setup_theme', 'municipalidad_tchile_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function municipalidad_tchile_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'municipalidad_tchile' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'municipalidad_tchile' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'municipalidad_tchile_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function municipalidad_tchile_scripts() {
//	wp_style_add_data( 'municipalidad_tchile-style', 'rtl', 'replace' );
wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css');

wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_script( 'municipalidad_tchile-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'municipalidad_tchile_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"sub-menu dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');



function declare_menus() {
	register_nav_menu('topbar', 'Topbar');
	register_nav_menu('search_sugestions', 'sugerencias de búsqueda');
	register_nav_menu('menu_servicios', 'Servicios');

	register_nav_menu('footer_menu', 'Links del footer');
	


  }
  add_action( 'init', 'declare_menus' );


  function get_menu_items_by_slug($menu_slug) {
    $menu_items = array();
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) ) {
        $menu = get_term( $locations[ $menu_slug ] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
    }
    return $menu_items;
}


function get_sugestion_title($item, $max_lenght=30){
    $title = $item->title;
    if (strlen($title) > $max_lenght)
        $title = substr( $title, 0, $max_lenght-3). '...';
    return $title;
}


add_action( 'init', 'informacion' );
function informacion() {
	$args = [
		'label'  => esc_html__( 'Informaciones', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Informaciones', 'municipalidad' ),
			'name_admin_bar'     => esc_html__( 'informacion', 'municipalidad' ),
			'add_new'            => esc_html__( 'Agregar informacion', 'municipalidad' ),
			'add_new_item'       => esc_html__( 'Agregar nueva informacion', 'municipalidad' ),
			'new_item'           => esc_html__( 'Nueva informacion', 'municipalidad' ),
			'edit_item'          => esc_html__( 'Editar informacion', 'municipalidad' ),
			'view_item'          => esc_html__( 'View informacion', 'municipalidad' ),
			'update_item'        => esc_html__( 'View informacion', 'municipalidad' ),
			'all_items'          => esc_html__( 'Todas las Informaciones', 'municipalidad' ),
			'search_items'       => esc_html__( 'Search Informaciones', 'municipalidad' ),
			'parent_item_colon'  => esc_html__( 'Parent informacion', 'municipalidad' ),
			'not_found'          => esc_html__( 'No Informaciones found', 'municipalidad' ),
			'not_found_in_trash' => esc_html__( 'No Informaciones found in Trash', 'municipalidad' ),
			'name'               => esc_html__( 'Informaciones', 'municipalidad' ),
			'singular_name'      => esc_html__( 'informacion', 'municipalidad' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-post',
		'supports' => [
			'title',
			'editor',
			'author',
			'thumbnail',
		],
		'taxonomies' => [
			'category',
		],
		'rewrite' => true
	];

	register_post_type( 'informacion', $args );
}

add_action( 'init', 'ordenanza' );
function ordenanza() {
	$args = [
		'label'  => esc_html__( 'ordenanzas', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'ordenanzas', 'municipalidad' ),
			'name_admin_bar'     => esc_html__( 'ordenanza', 'municipalidad' ),
			'add_new'            => esc_html__( 'Agregar ordenanza', 'municipalidad' ),
			'add_new_item'       => esc_html__( 'Agregar nueva ordenanza', 'municipalidad' ),
			'new_item'           => esc_html__( 'Nueva ordenanza', 'municipalidad' ),
			'edit_item'          => esc_html__( 'Editar ordenanza', 'municipalidad' ),
			'view_item'          => esc_html__( 'Ver ordenanza', 'municipalidad' ),
			'update_item'        => esc_html__( 'Ver ordenanza', 'municipalidad' ),
			'all_items'          => esc_html__( 'Todas las ordenanzas', 'municipalidad' ),
			'search_items'       => esc_html__( 'Buscar ordenanzas', 'municipalidad' ),
			'parent_item_colon'  => esc_html__( 'Ordenanza padre', 'municipalidad' ),
			'not_found'          => esc_html__( 'No ordenanzas found', 'municipalidad' ),
			'not_found_in_trash' => esc_html__( 'No ordenanzas found in Trash', 'municipalidad' ),
			'name'               => esc_html__( 'ordenanzas', 'municipalidad' ),
			'singular_name'      => esc_html__( 'ordenanza', 'municipalidad' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-post',
		'supports' => [
			'title',
			'author',
			'thumbnail',
		],
		'taxonomies' => [
			'category',
		],
		'rewrite' => true
	];

	register_post_type( 'ordenanza', $args );
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


if ( get_query_var('foogallery') ) {

    // If so echo the value
    echo get_query_var('foogallery');

}


add_action( 'init', 'galeria' );
function galeria() {
	$args = [
		'label'  => esc_html__( 'Galerias', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Galerias', 'municipalidad_tchile' ),
			'name_admin_bar'     => esc_html__( 'Galeria', 'municipalidad_tchile' ),
			'add_new'            => esc_html__( 'Añadir Galeria', 'municipalidad_tchile' ),
			'add_new_item'       => esc_html__( 'Añadir nueva Galeria', 'municipalidad_tchile' ),
			'new_item'           => esc_html__( 'Nueva Galeria', 'municipalidad_tchile' ),
			'edit_item'          => esc_html__( 'Editat Galeria', 'municipalidad_tchile' ),
			'view_item'          => esc_html__( 'Ver Galeria', 'municipalidad_tchile' ),
			'update_item'        => esc_html__( 'Actualizar Galeria', 'municipalidad_tchile' ),
			'all_items'          => esc_html__( 'Todas las Galerias', 'municipalidad_tchile' ),
			'search_items'       => esc_html__( 'Buscar Galerias', 'municipalidad_tchile' ),
			'parent_item_colon'  => esc_html__( 'Galeria Padre', 'municipalidad_tchile' ),
			'not_found'          => esc_html__( 'Galeria no encontrada', 'municipalidad_tchile' ),
			'not_found_in_trash' => esc_html__( 'No se encontraron galerias en la papelera.', 'municipalidad_tchile' ),
			'name'               => esc_html__( 'Galerias', 'municipalidad_tchile' ),
			'singular_name'      => esc_html__( 'Galeria', 'municipalidad_tchile' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-format-gallery',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		'taxonomies' => [
			'category',
		],
		'rewrite' => true
	];

	register_post_type( 'galeria', $args );
}

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Noticia';
        $labels->singular_name = 'Noticias';
        $labels->add_new = 'Añadir Noticia';
        $labels->add_new_item = 'Añadir nueva Noticia';
        $labels->edit_item = 'Editar Noticia';
        $labels->new_item = 'Noticia';
        $labels->view_item = 'Ver Noticia';
        $labels->search_items = 'Buscar Noticias' ;
        $labels->not_found = 'No se encontraron noticias';
        $labels->not_found_in_trash = 'No se encontraron Noticias';
        $labels->all_items = 'Todas las noticias';
        $labels->menu_name = 'Noticias';
        $labels->name_admin_bar = 'Noticias';
}

add_action( 'init', 'concurso_publico' );
function concurso_publico() {
	$args = [
		'label'  => esc_html__( 'Concursos Publicos', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Concursos publicos', 'municipalidad' ),
			'name_admin_bar'     => esc_html__( 'Concurso publico', 'municipalidad' ),
			'add_new'            => esc_html__( 'Agregar concurso publico', 'municipalidad' ),
			'add_new_item'       => esc_html__( 'Agregar nueva concurso publico', 'municipalidad' ),
			'new_item'           => esc_html__( 'Nueva concurso publico', 'municipalidad' ),
			'edit_item'          => esc_html__( 'Editar concurso publico', 'municipalidad' ),
			'view_item'          => esc_html__( 'Ver concurso publico', 'municipalidad' ),
			'update_item'        => esc_html__( 'Ver concurso publico', 'municipalidad' ),
			'all_items'          => esc_html__( 'Todas las concursos publicos', 'municipalidad' ),
			'search_items'       => esc_html__( 'Buscar concursos publicos', 'municipalidad' ),
			'parent_item_colon'  => esc_html__( 'concurso publico padre', 'municipalidad' ),
			'not_found'          => esc_html__( 'No concursos publicos encontrados', 'municipalidad' ),
			'not_found_in_trash' => esc_html__( 'No concursos publicos encontrados', 'municipalidad' ),
			'name'               => esc_html__( 'concursos publicos', 'municipalidad' ),
			'singular_name'      => esc_html__( 'concurso publico', 'municipalidad' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-post',
		'supports' => [
			'title',
			'author',
			'thumbnail',
		],
		'taxonomies' => [
			'category',
		],
		'rewrite' => true
	];

	register_post_type( 'concurso_publico', $args );
}


function custom_button_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'src'    => '',
        'title'  => '',
        'target' => '',
        'text'   => '',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    // Returns the button with a link
    if ( $src ) {
 
        $link_attr = array(
            'href'   => esc_url( $src ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => 'btn btn-primary m-2 text-white'
        );
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
 
 
        return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
 
    }
 
    // Return as span when no link defined
    else {
 
        return '<span class="custombutton"><span>' . do_shortcode( $content ) . '</span></span>';
 
    }
 
}
add_shortcode( 'button_link', 'custom_button_shortcode' );


function add_categories_to_page() {  
    // Add tag metabox to page
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of your theme functions.php file 
add_action( 'init', 'add_categories_to_page' );


 

function slider_eventos() {
	ob_start();
	get_template_part('components/slider-eventos');
	return ob_get_clean();   
 } 
 add_shortcode( 'slider_eventos', 'slider_eventos' );

 
 add_filter('pre_get_posts', 'query_post_type');
 function query_post_type($query) {
   if(is_category() || is_tag()) {
	 $post_type = get_query_var('post_type');
	 if($post_type)
		 $post_type = $post_type;
	 else
		 $post_type = array('post','informacion', 'page');
	 $query->set('post_type',$post_type);
	 return $query;
	 }
 }