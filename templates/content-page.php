<div class="row headline">
  <div class="col s8 offset-s4 right-align">
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
