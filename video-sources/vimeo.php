<?php

function wunrav_get_vimeo( $url, $width, $height, $return = false ) {

    if ( ! $height && $width != 1400 ) {
        $height = $width * 0.562;
    } else {
        $height = 788;
    }

    preg_match('/vimeo\.com\/(\d+)/', $url, $id);

    $iframe = '<iframe src="https://player.vimeo.com/video/' . $id[1] . '?title=0&byline=0&portrait=0" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

    if( !$return ){
        echo $iframe;
    } else {
        return $iframe;
    }
}

add_shortcode('vimeo', 'wunrav_vimeo_shortcode');
function wunrav_vimeo_shortcode( $atts, $content = null ){

    extract( shortcode_atts(array("height" => '', "width" => '1400', "align" => "aligncenter"), $atts) );

    // set alignment in the shortcode with align="alignleft"
    if ( $align == 'alignleft' || $align == 'left' ) {
        $align = "alignleft";
    } elseif ( $align == 'alignright' || $align == 'right' ) {
        $align = "alignright";
    } else {
        $align = "aligncenter";
    }

    $vimeo  = '<div class="wunrav-video-wrapper ' . $align . '">';
    $vimeo .= wunrav_get_vimeo($content, $width, $height, true);
    $vimeo .= '</div>';

    return $vimeo;
}
