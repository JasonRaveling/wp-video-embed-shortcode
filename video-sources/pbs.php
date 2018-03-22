<?php

// Print PBS portal video
function wunrav_get_pbsvid( $vidID, $width, $height, $return = false ){

    if ( ! $height && $width != 1400 ) {
	$height = $width * 0.562;
    } else {
	$height = 788;
    }

    $iframe = '<iframe marginheight="0" scrolling="no" frameborder="0" src="//player.pbs.org/portalplayer/' . $vidID . '" width="' . $width . '" height="' . $height . '" allowfullscreen></iframe>';

    if( !$return ){
        echo $iframe;
    } else {
        return $iframe; 
    }

}

add_shortcode('pbsvid', 'wunrav_pbsvid_shortcode');
function wunrav_pbsvid_shortcode( $atts, $content = null ){

    extract( shortcode_atts(array("height" => '', "width" => '1400', "align" => 'aligncenter'), $atts) );

    // set alignment in the shortcode with align="alignleft"
    if ( $align == 'alignleft' || $align == 'left' ) {
        $align = "alignleft";
    } elseif ( $align == 'alignright' || $align == 'right' ) {
        $align = "alignright";
    } else {
        $align = "aligncenter";
    }
    
    $pbsvid  = '<div class="wunrav-video-wrapper ' . $align . '">';
    $pbsvid .= wunrav_get_pbsvid($content, $width, $height, true);
    $pbsvid .= '</div>';

    return $pbsvid;
}
