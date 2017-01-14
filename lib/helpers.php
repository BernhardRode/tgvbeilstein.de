<?php

  if( !function_exists('get_tgv_image') ):
    function get_tgv_image($src,$title,$width=40,$height=40,$cssClass='') {
      return '<img src="'.$src.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" class="'.$cssClass.'">';
    };
  endif;

  if( !function_exists('tgv_image') ):
    function tgv_image($src,$title,$width=40,$height=40,$cssClass='') {
      echo get_tgv_image($src,$title,$width,$height,$cssClass);
    };
  endif;

  if( !function_exists('tgv_pictogram') ):
    function tgv_pictogram($src,$title,$size=150) {
      echo get_tgv_image($src,$title,$size,$size,'pictogram');
    };
  endif;

  if( !function_exists('get_tgv_avatar') ):
    function get_tgv_avatar($src,$title,$size=150) {
      return get_tgv_image($src,$title,$size,$size,'img-round');
    };
  endif;

  if( !function_exists('tgv_avatar') ):
    function tgv_avatar($src,$title,$size=150) {
      echo get_tgv_avatar($src,$title,$size,$size,'img-round');
    };
  endif;

  if( !function_exists('tgv_render_person') ):
    function tgv_render_person($person) {
      echo '<div class="person">';
      echo '<div class="person-avatar">';
      tgv_avatar($person->avatar,$person->post_title);
      echo '</div>';
      echo '<h3>'.$person->post_title.'</h3>';
      echo '<p>'.$person->position.'</p>';
      echo '</div>';
    };
  endif;

  if( !function_exists('tgv_extend_person') ):
    function tgv_extend_person($person) {
      $cf = get_fields($person->ID);
      $url = wp_get_attachment_image_src(get_post_thumbnail_id( $person->ID ), 'thumbnail');
      if ($url == false) {
        $url = get_stylesheet_directory_uri() . '/assets/images/platzhalter_person.png';
      } else {
        $url = $url[0];
      }
      $person->position = $cf['position'];
      $person->telefon = $cf['telefon'];
      $person->email = $cf['e-mail'];
      $person->avatar = $url;
    };
  endif;

  if( !function_exists('tgv_render_file') ):
    function tgv_render_file($file, $title) {
      echo '<div class="file">';
      // echo '<pre>';
      // var_dump($file);
      // echo '</pre>';
      echo '<div class="file-avatar">';
      echo '<a href="' . $file['url'] . '" target="_blank" download>';
      echo '<img src="' . $file['icon'] . '">';
      echo '</a>';
      echo '</div>';
      echo '<h6>'.$title.'</h6>';
      echo '</div>';
    };
  endif;

  if( !function_exists('tgv_extend_file') ):
    function tgv_extend_file($file) {
    };
  endif;

?>
