<div class="slider-container">
  <div class="content-wrapper">
    <div class="container">
      <h2>Herzlich Willkommen</h2>
      <h1>Turn- und Gesangsverein</h1>
      <h1>Eintracht Beilstein</h1>
      <h3>1823 e.V.</h3>
    </div>
  </div>
  <div class="scroll-down-wrapper">
    <div class="scroll-down">&#x21D3;</div>
  </div>
</div>

<div class="blog-header-space content">
  <div class="row">
    <div class="col s12">
      <?php
        $args = array(
          'posts_per_page'   => 5,
          'offset'           => 0,
          'category_name'    => 'Allgemein',
          'orderby'          => 'date',
          'order'            => 'DESC',
          'post_type'        => 'post',
          'post_status'      => 'publish',
          'suppress_filters' => true
        );
        $posts_array = get_posts( $args );

        if (sizeof($posts_array) > 0 ):
          foreach ( $posts_array as $post ) : setup_postdata( $post );
            ?>
              <div class="card">
                <div class="card-content">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="card-title activator grey-text text-darken-4"><?php the_title(); ?></span>
                  </a>
                  <div>
                    <?php the_content(); ?>
                  </div>
                </div>
                <div class="card-action">
                  <div class="chip">
                    <?php
                      echo get_avatar( get_the_author_meta( 'user_email' ), 40 );
                    ?>
                    <?php
                      echo get_the_author();
                    ?>
                  </div>
                  <div class="chip">
                    <?php
                      echo get_the_date();
                    ?>
                  </div>
                  <?php
                    $tags = get_the_tags();
                    if ($tags) {
                      foreach($tags as $tag) {
                        echo '<div class="chip">' . $tag->name . '</div>';
                      }
                    }
                  ?>
                  <?php
                    $categories = get_the_category();
                    if ($categories) {
                      foreach($categories as $category) {
                        echo '<div class="chip">' . $category->name . '</div>';
                      }
                    }
                  ?>
                </div>
              </div>
            <?php
          endforeach;
        endif;
        wp_reset_postdata();
      ?>
    </div>
  </div>
</div>

<div class="headline row">
  <div class="col s8 offset-s4 right-align">
    <h1>Aktuelles aus den Abteilungen</h1>
  </div>
</div>


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
                  <img class="icon" src="<? echo $fields['piktogramm']; ?>" height="100" width="100">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Abteilung <?php echo $abteilung; ?></span>
                    <ul class="collection" style="border:none;">
                      <?php
                      foreach ( $posts_array as $post ) : setup_postdata( $post );
                        ?>
                          <li class="collection-item">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                              <span class="title">
                                <?php the_title(); ?>
                              </span>
                            </a>
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
