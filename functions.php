<?php

include_once 'custom_breadcrumbs.php';

/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {

	add_action(
		'admin_notices',
		function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function ($template) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site
{
	/** Add timber support. */
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_filter('timber/context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		add_action('init', array($this, 'register_post_types'));
		add_action('init', array($this, 'register_taxonomies'));
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types()
	{
	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies()
	{
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context($context)
	{
		// Projects
		$project_args = array(
			'post_type' => 'project',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'orderby' => 'rand',
		);

		// Header Menu
		$header_menu_args = array([
			'theme_location' => 'header-menu'
		]);

		// Footer Menu
		$footer_menu_args = array([
			'theme_location' => 'footer-menu'
		]);

		$context['projects'] = new Timber\PostQuery($project_args);
		$context['header_menu']  = new Timber\Menu('header-menu', $header_menu_args);
		$context['footer_menu']  = new Timber\Menu('footer-menu', $footer_menu_args);

		$context['site']  = $this;

		return $context;
	}

	public function theme_supports()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support('menus');
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig($twig)
	{
		// Add Breadcrumbs
		$twig->addFunction(new Timber\Twig_Function('custom_breadcrumbs', 'custom_breadcrumbs'));
		// Add Breadcrumbs END

		return $twig;
	}
}

new StarterSite();

function portfolio_styles()
{
	wp_enqueue_style('dashicons');
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap', array(), null);
	wp_enqueue_style('portfolio_styles', get_theme_file_uri() . '/assets/css/main.min.css', microtime());
}

add_action('wp_enqueue_scripts', 'portfolio_styles');

function portfolio_scripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('portfolio_vendor_scripts', get_theme_file_uri() . '/assets/js/vendor.min.js', array('jquery'), microtime(), true);
	wp_enqueue_script('portfolio_custom_scripts', get_theme_file_uri() . '/assets/js/custom.min.js', null, microtime(), true);
}

add_action('wp_enqueue_scripts', 'portfolio_scripts');

function portfolio_inits()
{
	echo '<script>
	jQuery(function($){
		$(".owl-carousel").owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			responsive: { 0: {items: 1}}
			});
	});
	</script>';
}

add_action('wp_footer', 'portfolio_inits', 999);

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
