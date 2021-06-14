<?php
/**
 * @package WordPress
 * @subpackage minimalRC
 */
/*
Template Name: Archivo
*/
?>

<?php get_header(); ?>

<section id="archive" class="section">
    <div class="container">
        <div class="columns is-desktop">
            <div class="column is-10-widescreen is-offset-1-widescreen is-12">

        <script type="text/javascript">
            var domainroot="ramoscarlos.com"
            function Gsitesearch(curobj){
                curobj.q.value="site:"+domainroot+" "+curobj.qfront.value
            }
        </script>

        <form action="http://www.google.com/search" method="get" onSubmit="Gsitesearch(this)">
            <div class="field has-addons">
                <div class="control is-expanded">
                    <input name="q" type="hidden" />
                    <input id="search-archive" name="qfront" class="input" type="text" placeholder="Presiona [Ctrl + Shift + F] para escribir aquí">
                </div>
                <div class="control">
                    <button class="button is-primary">Buscar...</button>
                </div>
            </div>
        </form>

        <table class="table is-fullwidth">
            <?php
            // Total de entradas.
            $count = wp_count_posts()->publish;

            $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) as `month`, DAYOFMONTH(post_date) as `dayofmonth`, ID, post_name, post_title FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC";
            $key = md5($query);
            $cache = wp_cache_get( 'mp_archives' , 'general');
            if ( !isset( $cache[ $key ] ) ) {
                $arcresults = $wpdb->get_results($query);
                $cache[ $key ] = $arcresults;
                wp_cache_add( 'mp_archives', $cache, 'general' );
            } else {
                $arcresults = $cache[ $key ];
            }
            if ($arcresults) {
                $last_year = 0;
                $last_month = 0;
                $last_day = 0;
                foreach ( $arcresults as $i => $arcresult ) {
                    $post_shortcut = str_pad($count, 2, '0', STR_PAD_LEFT);

                    $year = $arcresult->year;
                    $month = $arcresult->month;
                    $day = $arcresult->dayofmonth;
                    if ($year != $last_year) {
                        $last_year = $year;
                        $last_month = 0;
                        ?>
                        <tr class="year">
                            <th colspan="3" class="has-text-right"><?php echo $arcresult->year; ?></th>
                        </tr>
                        <?php
                    }
                    if ($month != $last_month) {
                      $last_month = $month;
                      ?>
                        <tr class="month">
                            <th colspan="3" class="has-text-centered"><?php echo $wp_locale->get_month($arcresult->month); ?></th>
                        </tr>
                    <?php
                }
                ?>
                    <tr class="post-entry">
                    <?php
                    if ($day != $last_day) {
                        $last_day = $day;
                    ?>
                        <td class="is-narrow has-text-right"><?php echo $arcresult->dayofmonth; ?></td>
                    <?php
                    } else {
                    ?>
                        <th></th>
                    <?php } ?>
                        <td id="main-post-<?php echo $post_shortcut; ?>" class="mousetrap-link">
                            <a id="post-link-<?php echo $post_shortcut; ?>" class="mousetrap-link-a" href="/<?php echo $arcresult->post_name; ?>">
                                <?php echo strip_tags(apply_filters('the_title', $arcresult->post_title)); ?>
                            </a>
                        </td>
                        <td class="has-text-right is-narrow is-hidden-touch is-size-4 is-family-monospace is-vcentered">
                            <span class="has-text-right">[<?php echo $post_shortcut; ?>]</span>
                        </td>
                    </tr>
                    <?php
                    $count--;
                }
            }
            ?>
        </table>

            </div><!-- /end .column -->
        </div><!-- /end .columns -->
    </div><!-- /end .container -->
</section><!-- /end .section -->

<?php get_footer(); ?>