<?php
/**
 * Template Name: Template Homepage
 */
?>
<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<?php //get_template_part('templates/slider'); ?>
<div class="wrap" role="document">
  <?php //get_template_part('templates/section', 'slider'); ?>
  <div class="container">
    <div class="content row">
      <main class="main">
        <?php // while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/blog', 'page'); ?>
        <?php // endwhile; ?>
      </main><!-- /.main -->
      <?php if (Setup\display_sidebar()) : ?>
        <aside class="sidebar">
          <?php include Wrapper\sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.container -->
  <?php // get_template_part('templates/section', 'beilstein'); ?>
  <?php // get_template_part('templates/section', 'mitglied'); ?>
  <?php get_template_part('templates/section', 'sponsors'); ?>

</div><!-- /.wrap -->
