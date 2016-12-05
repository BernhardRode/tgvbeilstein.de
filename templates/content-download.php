<?
  if (strlen(get_the_content()) > 0):
?>

    <div class="row">
      <div class="col s12">
        <div class="card">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
<?
  endif;
?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
