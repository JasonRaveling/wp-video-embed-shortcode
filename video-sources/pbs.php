<?php

// shortcode for PBS portal player
add_shortcode('pbs', 'wunrav_pbsVid_shortcode');

function wunrav_pbsVid_shortcode( $atts, $content = null ){
    extract( shortcode_atts(array("height" => '', "width" => '800', "align" => 'aligncenter'), $atts) );

    if ( $align == 'alignleft' || $align == 'left' ) {
        $align = "alignleft";
    } elseif ( $align == 'alignright' || $align == 'right' ) {
        $align = "alignright";
    } else {
        $align = "aligncenter";
    }
    
    $youtube = '<div class="wunrav-video-wrapper ' . $align . '">';
    $youtube .= get_pbsPortalVid($content, $width, $height, true);
    $youtube .= '</div>';

    return $youtube;
}


// Print PBS portal video
function wunrav_get_pbsVid($vidID, $width = 800, $height, $return = false){

    if ( ! $height && $width != 800 ) {
	$height = $width * 0.562;
    } else {
	$height = 450;
    }

    $iframe = '<iframe marginheight="0" scrolling="no" frameborder="0" src="//player.pbs.org/portalplayer/' . $vidID . '" width="' . $width . '" height="' . $height . '" allowfullscreen></iframe>';

    if( !$return ){
        echo $iframe;
    }else{
        return $iframe; 
    }

}
