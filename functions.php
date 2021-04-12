<?php
/**
 * uber functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uber
 */
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_filter('acf/settings/remove_wp_meta_box', '__return_false', 20);
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'uber_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function uber_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on uber, use a find and replace
		 * to change 'uber' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'uber', get_template_directory() . '/languages' );

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
		// register_nav_menus(
		// 	array(
		// 		'menu-1' => esc_html__( 'Primary', 'uber' ),
		// 	)
		// );

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
				'uber_custom_background_args',
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
add_action( 'after_setup_theme', 'uber_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uber_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uber_content_width', 640 );
}
add_action( 'after_setup_theme', 'uber_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uber_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'uber' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'uber' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'uber_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uber_scripts() {
	wp_enqueue_style( 'uber-style', get_template_directory_uri() .'/asset/styles/main.min.css', array(), _S_VERSION );
	

	wp_enqueue_script( 'uber-navigation', get_template_directory_uri() . '/asset/js/main.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_deregister_script('jquery'); //отключаю стандартную jquery
	wp_register_script('jquery', get_template_directory_uri() . '/asset/js/jquery-3.5.1.min.js');//регистрирую более новую версию jquery
	wp_enqueue_script('jquery');// и подключаю её
}
add_action( 'wp_enqueue_scripts', 'uber_scripts' );

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

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyBbTusGIvz8V9EsxE4J5RSCHwknYN9lrYI'; // Ваш ключ Google API
	
	return $api;
	
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
//Создаём меню
add_theme_support('menus');//activate menus
add_filter( 'nav_menu_link_attributes', 'filter_change_class_link', 10, 3 ); //вешаем фильтр на хук. фильтр меняет классы у <a>
function filter_change_class_link( $atts, $item, $args){
	if ($args->menu === 'Main'){ //если меню-MAin
		$atts['class'] = 'header__nav-item'; //то каждому элементу <a> присвоить класс 'header__nav-item'
		if($item->current  ){//если страница текущая, то тогда 
			$atts['class'] = $atts['class'] . ' header__nav-item-active';//добовляем класс активности
			$link_post = $atts['class'];
		}//проверяю наличие данных постов и нахождение элемента меню в положении "игрушки"
		if ( $item->ID === 200 &&  (in_category('soft') || in_category('educ_toys')) ){//добовляем класс активности когда захожу в произвольный пост
			$atts['class'] = $atts['class'] . ' header__nav-item-active';
			
		}
		if($item->ID === 200 &&  (is_page(219) || is_page(223))) {//проверяю наличие данных страниц и нахождение элемента меню в положении "игрушки"
			$atts['class'] = $atts['class'] . ' header__nav-item-active';
		}
	};
	
	return $atts;
}	
?>
