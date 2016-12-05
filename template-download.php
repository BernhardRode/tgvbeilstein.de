<?php
/**
 * Template Name: Download Page
 */
?>
<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<div class="wrap" role="document">
  <div class="container">
    <div class="content row">
      <main class="main col s12">
        <section class="downloads">
          <?php
            $type = 'download';
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
                ?>
                  <div class="card">
                    <div class="card-content">
                      <h1><?php the_title(); ?></h1>
                      <p>
                        <?php the_content(); ?>
                      </p>
                      <div class="right-align">
                        <a class="waves-effect waves-light btn red " href="<? echo $fields['datei']; ?>" title="<?php the_title_attribute(); ?>" download>
                          <i class="material-icons small left">play_for_work</i>
                          Download
                        </a>
                      </div>
                    </div>
                  </div>
                <?php
              endwhile;
            }
            wp_reset_query();
          ?>
        </section>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.container -->
</div><!-- /.wrap -->
