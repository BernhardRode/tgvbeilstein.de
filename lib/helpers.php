<?php
  function get_tgv_image($src,$title,$width=40,$height=40,$cssClass='') {
    return '<img src="'.$src.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" class="'.$cssClass.'">';
  };
  function tgv_image($src,$title,$width=40,$height=40,$cssClass='') {
    echo get_tgv_image($src,$title,$width,$height,$cssClass);
  };
  function tgv_pictogram($src,$title,$size=150) {
    echo get_tgv_image($src,$title,$size,$size,'pictogram');
  };
  function get_tgv_avatar($src,$title,$size=150) {
    return get_tgv_image($src,$title,$size,$size,'img-round');
  };
  function tgv_avatar($src,$title,$size=150) {
    echo get_tgv_avatar($src,$title,$size,$size,'img-round');
  };

  function tgv_render_person($person) {
    echo '<div class="person">';
    echo '<div class="person-avatar">';
    tgv_avatar($person->avatar,$person->post_title);
    echo '</div>';
    echo '<h3>'.$person->post_title.'</h3>';
    echo '<p>'.$person->position.'</p>';
//    echo '<div class="person-avatar">';
//    echo '<h3>'.$person->telefon.'</h3>';
//    echo '<h3>'.$person->email.'</h3>';
//    echo '</div>';
    echo '</div>';
  };

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

?>
