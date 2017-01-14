<?php
/**
 * Template Name: Template Club
 */
?>
<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<div class="wrap" role="document">
  <div class="container">
    <?php get_template_part('templates/club'); ?>
    <div class="content row">
      <main class="main col s12">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.container -->
</div><!-- /.wrap -->
