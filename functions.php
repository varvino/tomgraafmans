<?php
#############################################################
# Theme Support
#############################################################

function portfolio_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-formats', ['aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status']);
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'portfolio_features');

#############################################################
# CSS & JS files
#############################################################
function portfolio_files()
{
    #############################################################
    # Styles
    #############################################################
    wp_enqueue_style('dashicons');

    wp_enqueue_style('portfolio-fonts', 'https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap');
    wp_enqueue_style('portfolio-styles', get_theme_file_uri('/assets/css/main.min.css'), null, microtime());
    #############################################################
    # Scripts
    #############################################################
    wp_enqueue_script('portfolio-scripts', get_theme_file_uri('/assets/js/custom.min.js'), null, microtime(), true);
    wp_enqueue_script('glide-js', 'https://unpkg.com/@glidejs/glide', null, array(), true);
}

add_action('wp_enqueue_scripts', 'portfolio_files');

#############################################################
# Menus
#############################################################
function register_menus()
{
    register_nav_menus([
        'header-menu' => __('Header Menu'),
        'footer-menu' => __('Footer Menu'),
    ]);
}
add_action('init', 'register_menus');

#############################################################
# Custom Functions
#############################################################
#############################################################
# Metatags
#############################################################
function add_to_head()
{
?>
    <!-- Primary Meta Tags -->
    <meta name="title" content="<?php bloginfo('name'); ?> – <?php bloginfo('description'); ?>">
    <meta name="description" content="Welkom op mijn WordPress-developer portfolio, hier vindt u mijn meest recente werk.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php
}
add_action('wp_head', 'add_to_head');

#############################################################
# Excerpt Length
#############################################################
function portfolio_custom_excerpt_length($length)
{
    return 23;
}
add_filter('excerpt_length', 'portfolio_custom_excerpt_length', 999);

#############################################################
# Excerpt More
#############################################################

function portfolio_excerpt_more($more)
{
    return '..';
}
add_filter('excerpt_more', 'portfolio_excerpt_more');

#############################################################
# Custom Body Classes
#############################################################
function custom_class($classes)
{
    if (is_page_template('page-sitemap.php')) {
        $classes[] = 'sitemap';
    }
    return $classes;
}

add_filter('body_class', 'custom_class');

#############################################################
# Breadcrumbs Function
########
# Credit: https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
#############################################################
include_once 'breadcrumbs-setup.php';
