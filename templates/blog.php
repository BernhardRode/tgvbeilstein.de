<div class="content row">
  <div class="col s12">
    <?php
      $type = 'abteilung';
      $args=array(
        'orderby' => 'title',
        'order'   => 'ASC',
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'ignore_sticky_posts'=> 1
      );
      $special_query_results = new WP_Query($args);
      if( $special_query_results->have_posts() ) {
        while ($special_query_results->have_posts()) : $special_query_results->the_post();
          $fields = get_fields();
          $abteilung = get_the_title();

          $args = array(
            'posts_per_page'   => 5,
            'offset'           => 0,
            'category_name'    => $abteilung,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true
          );
          $posts_array = get_posts( $args );

          if (sizeof($posts_array) > 0 ):
            ?>
              <div class="card horizontal">
                <div class="card-image">
                  <img class="icon" src="<? echo $fields['piktogramm']; ?>">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Abteilung <?php echo $abteilung; ?></span>
                    <ul class="collection" style="border:none;">
                      <?php
                      foreach ( $posts_array as $post ) : setup_postdata( $post );
                        ?>
                          <li class="collection-item">
                            <span class="title">
                              <?php the_title(); ?>
                            </span>
                          </li>
                        <?php
                      endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            <?php
          endif;

          wp_reset_postdata();
        endwhile;
      }
      wp_reset_query();
    ?>
  </div>
</div>
