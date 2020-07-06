<?php

/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$project_args = array(
	'post_type' => 'project',
	'posts_per_page' => 2,
	'post_status' => 'publish',
	'orderby' => 'rand',
	'post__not_in' => array(get_the_ID())
);

$context         = Timber::context();
$timber_post     = Timber::query_post();
$context['post'] = $timber_post;
$context['projects'] = new Timber\PostQuery($project_args);

if (post_password_required($timber_post->ID)) {
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig'), $context);
}
