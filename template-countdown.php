<?php
/**
 * Template Name: Template Countdown
 */
?>
<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<div class="countdown">
  <div class="wrapper">
    <div class="content">
        <img width="250" height="250" class="logo shadowed" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tgv.logo.png">

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
    </div>
    <div class="sidebar">
      <h2>GESCHÄFTSSTELLE</h2>

      Albert-Einstein-Str. 20<br>
      71717 Beilstein<br><br>

      Tel 07062-5753<br>
      Fax 07062-916736<br>
      <a href="mailto:info@tgveintrachtbeilstein.de">info@tgveintrachtbeilstein.de</a><br><br>

      Öffnungszeiten:<br>
      Dienstag 09.30 Uhr - 13.30 Uhr<br>
      Freitag 14.00 Uhr - 18.00 Uhr<br>
    </div>
  </div>
<div>
