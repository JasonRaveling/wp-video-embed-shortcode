<?php

// Print youtube video
function wunrav_get_youtube($url, $width = 1400, $height, $type, $return = false) {

    if ( ! $height && $width != 1400 ) {
	$height = $width * 0.562;
    } else {
	$height = 788;
    }

    if ( !$type == 'youtube' || !$type == 'youtu.be' ){
        $type = ( preg_match('/youtu.be\//', $url) ? 'youtu.be' : 'youtube' );
    }

    if( $type == 'youtube' ){
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $id);
    }else{
        preg_match('/youtu.be\/([^\\?\\&]+)/', $url, $id);
    }

    $attr = "";
    if( strpos($url, 'autoplay=1') > 0 ) $attr = "&autoplay=1";
    if( strpos($url, 'rel=0') > 0 ) $attr = $attr . "&rel=0";

    $iframe = '<iframe src="//www.youtube.com/embed/' . $id[1] . '?wmode=transparent&color=white&rel=0&showinfo=0' . $attr . '" width="' . $width . '" height="' . $height . '" allowfullscreen></iframe>';

    if( !$return ){
	echo $iframe;
    }else{
	return $iframe; 
    }

}

add_shortcode('youtube', 'wunrav_youtube_shortcode');
function wunrav_youtube_shortcode( $atts, $content = null ){

    extract( shortcode_atts(array("height" => '', "width" => '1400', "align" => 'aligncenter'), $atts) );

    // set alignment in the shortcode with align="alignleft"
    if ( $align == 'alignleft' || $align == 'left' ) {
        $align = "alignleft";
    } elseif ( $align == 'alignright' || $align == 'right' ) {
        $align = "alignright";
    } else {
        $align = "aligncenter";
    }

    $youtube = '<div class="wunrav-video-wrapper ' . $align . '">';
    $youtube .= wunrav_get_youtube($content, $width, $height, '', true);
    $youtube .= '</div>';

    return $youtube;

}
