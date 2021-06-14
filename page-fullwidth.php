<?php
/**
 * Template Name: Pantalla completa
 * Template Post Type: page
 *
 * Plantilla para páginas de ancho completo.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package minimalRC
 */

get_header(); ?>

<div class="container-fluid">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content('<p class="serif">Leer entrada completa &raquo;</p>'); ?>
	<?php endwhile; ?>
	<?php endif; ?>

</div><!-- /end .container-fluid -->

<?php get_footer(); ?>