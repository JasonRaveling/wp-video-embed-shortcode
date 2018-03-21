<?php

add_shortcode('vimeo', ' wunrav_vimeo_shortcode');
function wunrav_vimeo_shortcode( $atts, $content = null ){
    extract( shortcode_atts(array("height" => '', "width" => ''), $atts) );

    $vimeo = '<div class="wunrav-video-wrapper">';
    $vimeo = $vimeo . get_vimeo($content, $width, $height, true);
    $vimeo = $vimeo . '</div>';

    return $vimeo;
}
