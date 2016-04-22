<?php
/**
 * Template Name: Template Office
 */
?>
<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<div class="wrap" role="document">
  <div class="container">
    <div class="content row">
      <main class="main">
        Office

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>

        <?php get_template_part('templates/blog'); ?>
      </main><!-- /.main -->
      <?php if (Setup\display_sidebar()) : ?>
        <aside class="sidebar">
          <?php include Wrapper\sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.container -->
  <?php get_template_part('templates/map'); ?>
</div><!-- /.wrap -->
