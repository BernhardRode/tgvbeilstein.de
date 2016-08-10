<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<div class="wrap" role="document">
  <div class="content row">
    <main class="main">
      <?php get_template_part('templates/page', 'header'); ?>
      <?php get_template_part('templates/content', 'office'); ?>
    </main><!-- /.main -->
    <?php if (Setup\display_sidebar()) : ?>
      <aside class="sidebar">
        <?php include Wrapper\sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>
  </div><!-- /.content -->
</div><!-- /.wrap -->

