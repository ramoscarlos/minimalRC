<?php get_header(); ?>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		<div class="post">

			<?php the_content('&raquo; More &raquo;'); ?>

		</div> <!-- /end .post -->

		<br />

		<div class="all_posts"><a href="/archives/">Ver todas las entradas &raquo;</a>
		</div> <!-- /end .all_posts -->

		<?php endwhile; ?>

		<?php else : ?>

		<h2 class="center">¡No se ha encontrado!</h2>
		<p class="center">Lo siento, pero buscas algo que no está aquí.</p>

		<?php endif; ?>

<?php get_footer(); ?>