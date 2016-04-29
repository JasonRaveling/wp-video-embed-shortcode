<?php

add_shortcode('youtube', 'wunrav_youtube_shortcode');
function wunrav_youtube_shortcode( $atts, $content = null ){
  extract( shortcode_atts(array("height" => '', "width" => ''), $atts) );

  $youtube = '<div style="max-width: 100%;">';
  $youtube .= get_youtube($content, $width, $height, '', true);
  $youtube .= '</div>';

  return $youtube;
}

// Print youtube video
function get_youtube($url, $width = 640, $height = 360, $type, $return = false){ // OLD VARS width: 640; height: 360 < JRav
  if ( !$type == 'youtube' || !$type == 'youtu.be' ){
    $type = ( preg_match('/youtu.be\//', $url) ? 'youtu.be' : 'youtube' );
  }

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
    echo '<iframe src="http://www.youtube.com/embed/' . $id[1] . '?wmode=transparent' . $attr . '" allowfullscreen></iframe>';
  }else{
    return '<iframe src="http://www.youtube.com/embed/' . $id[1] . '?wmode=transparent' . $attr . '" allowfullscreen></iframe>';
  }
}
