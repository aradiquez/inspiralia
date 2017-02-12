<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function inspiralia_fonts_url() {

    $fonts_url = '';

    $font_families = array();

	$font_families = array('Poppins:300,400,500,700','italic');

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url($fonts_url);
}
function inspiralia_scripts_styles() {
    wp_enqueue_style( 'inspiralia-fonts', inspiralia_fonts_url(), array(), null );
}
#add_action( 'wp_enqueue_scripts', 'inspiralia_scripts_styles' );
?>