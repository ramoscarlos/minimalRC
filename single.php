<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main-content" class="content entrada">
    <div class="container-fluid">
        <div class="titulo">
            <div class="container section">
                <div class="columns">
                    <div class="column is-10-widescreen is-offset-1-widescreen is-12">
                        <h2 class="title has-text-centered"><?php the_title(); ?></h2>
                        <span class="fecha"><span class="publicado">Publicado: </span><?php the_date('Y-m-d'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container section">
        <div class="columns">
            <div class="column is-10-widescreen is-offset-1-widescreen is-12">
                <?php the_content('<p class="serif">Leer entrada completa &raquo;</p>'); ?>

                <div class="hr"></div>

                <div class="navigation">
                    <div class="columns">
                        <?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
                        <div class="column has-text-left">
                            <span>Anterior</span>
                            <br>
                            <span><?php previous_post_link('%link'); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
                        <div class="column has-text-right">
                            <span>Siguiente</span>
                            <br>
                            <span class="has-text-right"><?php next_post_link('%link'); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div> <!-- /end .navigation -->
            </div><!-- /end .column -->
        </div><!-- /end .columns -->
    </div><!-- /end .container -->
</div><!-- /end .content -->

<div class="container-fluid pie-de-pagina">
    <div id="comments" class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10-widescreen is-offset-1-widescreen is-12">
            <?php if(comments_open()) : ?>
                <?php comments_template(); ?>
            <?php else : ?>
            <?php endif; ?>
                </div><!-- /end .column -->
            </div><!-- /end .columns -->
        </div><!-- /end .container -->
    </div><!-- /end .content -->
</div>

<?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>


<?php get_footer(); ?>