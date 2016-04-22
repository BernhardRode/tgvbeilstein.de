<div class="slider-section">
  <div class="slider js_slider">
    <?php
      $args=array(
        'posts_per_page' => 5,
        'post__in'  => get_option( 'sticky_posts' ),
        'ignore_sticky_posts' => 1
      );
      $slide_counter = 0;
      $special_query_results = new WP_Query($args);
      if( $special_query_results->have_posts() ) {
        ?>
        <div class="slider-slides-wrapper frame js_frame">
          <ul class="slides js_slides">
            <?php
            while ($special_query_results->have_posts()) : $special_query_results->the_post();
              $fields = get_fields();
              ?>
                <li class="slide js_slide slide-<?php echo $slide_counter; ?> <?php if ($slide_counter==0) { echo 'slide-active'; }; ?>">
                  <?php the_title(); ?>
                  <?php echo  $slide_counter++; ?>
                </li>
              <?php
              $slide_counter++;
            endwhile;
            ?>
          </ul>
        </div>
        <?php
      }
      wp_reset_query();
    ?>
  </div>
</div>
