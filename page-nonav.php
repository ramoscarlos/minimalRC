<?php
/**
 * Template Name: Página sin barra de navegación
 * Template Post Type: page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package minimalRC
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}
?>

<?php get_footer(); ?>