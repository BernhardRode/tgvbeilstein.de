<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<div class="wrap" role="document">
  <div class="container">
    <div class="content row">
      <main class="main">
        <?php get_template_part('templates/content-single', get_post_type()); ?>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.container -->
</div><!-- /.wrap -->
