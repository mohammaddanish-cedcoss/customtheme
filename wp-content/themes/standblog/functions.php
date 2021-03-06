<?php
/**
 * Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blog, use a find and replace
		 * to change 'blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blog', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'blog' ),
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
				'blog_custom_background_args',
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
add_action( 'after_setup_theme', 'blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_scripts() {
	wp_enqueue_style( 'blog-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'blog-style', 'rtl', 'replace' );
	// include css.
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/templatemo-stand-blog.css', _S_VERSION, '1.0', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', _S_VERSION, '1.0', 'all' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css', _S_VERSION, '1.0', 'all' );
	wp_enqueue_style( 'flex-slider', get_template_directory_uri() . '/assets/css/flex-slider.css', _S_VERSION, '1.0', 'all' );

	// include js.
	wp_enqueue_script( 'blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/assets/js/owl.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'accordions', get_template_directory_uri() . '/assets/js/accordions.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );

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

/**
 * Add nav link class in <a> tag.
 */
function add_menu_link_class( $atts, $item, $args ) {
	$atts['class'] = 'nav-link';
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

/**Register new menu*/
function register_my_menu() {
	register_nav_menu( 'new-menu', __( 'Secondary' ) );
}
add_action( 'init', 'register_my_menu' );

/**ADD CUSTOM COMMENT LAYOUT.*/
function mytheme_comment( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php
	if ( 'div' !== $args['style'] ) {
		?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
	<?php } ?>
	<div class="comment-author vcard">
	<?php
	if ( ( $args['avatar_size'] ) !== 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
	}
	printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() );
	?>
	</div>
	<?php
	if ( '$comment->comment_approved' === '0' ) {
		?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' ); ?><br/>
		<?php } ?>
		<div class="comment-meta commentmetadata">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s' ), esc_html( get_comment_date() ), esc_html( get_comment_time() ) );
			?>
			<?php
			edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>

		<?php comment_text(); ?>

		<div class="reply">
		<?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					)
				)
			);
		?>
		</div>
		<?php
		if ( 'div' !== $args['style'] ) :
			?>
		</div>
			<?php
				endif;
}

