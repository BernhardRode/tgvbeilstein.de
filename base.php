<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <?php if ( !is_page_template ( 'template-countdown.php' ) ): ?>
      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>
      <?php include Wrapper\template_path(); ?>
      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>
    <?php else: ?>
      <?php include Wrapper\template_path(); ?>
    <?php endif; ?>
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Source+Sans+Pro:400,300,700:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>
  </body>
</html>
