<?php
/**
 * Plantilla para mostrar todas las páginas.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package minimalRC
 */

get_header(); ?>

<section id="main-content" class="section">
    <div class="container">
        <div class="columns is-desktop">
            <div class="column is-10-widescreen is-offset-1-widescreen is-12">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content('<p class="serif">Leer entrada completa &raquo;</p>'); ?>
    <?php endwhile; ?>
    <?php endif; ?>

            </div><!-- /end .column -->
        </div><!-- /end .columns -->
    </div><!-- /end .container -->
</section><!-- /end .section -->

<?php get_footer(); ?>
