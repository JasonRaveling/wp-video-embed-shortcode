<?php

add_shortcode('youtube', 'wunrav_youtube_shortcode');
function wunrav_youtube_shortcode( $atts, $content = null ){
  extract( shortcode_atts(array("height" => '', "width" => ''), $atts) );

  $youtube = '<div class="wunrav_youtube_wrapper">';
  $youtube .= wunrav_get_youtube($content, $width, $height, '', true);
  $youtube .= '</div>';

  return $youtube;
}

// Print youtube video
function wunrav_get_youtube($url, $width, $height, $type, $return = false){
  if ( ! $height ) {
    $height = '400';
  } elseif ( ! $width ) {
    $width = '700';
  }

  $type = ( preg_match('/youtu.be\//', $url) ? 'youtu.be' : 'youtube' );

  if( $type == 'youtube' ){
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$id);
    $vidType = "youtube"; // debuging
  }else{
    preg_match('/youtu.be\/([^\\?\\&]+)/', $url, $id);
    $vidType = "be"; // debuging
  }

  $attr = "";
  if( strpos($url, 'autoplay=1') > 0 ) $attr = "&autoplay=1";
  if( strpos($url, 'rel=0') > 0 ) $attr = $attr . "&rel=0";

  if( !$return ){
    echo '<iframe src="http://www.youtube.com/embed/' . $id[1] . '?wmode=transparent' . $attr . '" height="' . $height . '" width="' . $width . '" frameborder="0" allowfullscreen></iframe>';
  }else{
    return '<iframe src="http://www.youtube.com/embed/' . $id[1] . '?wmode=transparent' . $attr . '" height="' . $height . '" width="' . $width . '" frameborder="0" allowfullscreen></iframe>';
  }
}
