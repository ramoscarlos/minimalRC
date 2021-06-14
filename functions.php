<?php

wp_enqueue_script( 'mousetrap', 'https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.6.5/mousetrap.min.js', [], true );
wp_enqueue_script( 'minimalRC', get_template_directory_uri() . '/minimalRC.js', ['mousetrap'], true );

function add_defer_to_js( $url )
{
    // El defer nada más se aplicara a los archivos de javascript.
    if ( FALSE === strpos( $url, '.js' ) ) {
        return $url;
    }

    // Solamente modificar el js del tema.
    if ( strpos( $url, 'minimalRC.js' ) ||  strpos( $url, 'mousetrap.min.js' ) ) {
        $url = $url . "' defer='defer";
    }

    return $url;
}
add_filter( 'clean_url', 'add_defer_to_js', 11, 1 );