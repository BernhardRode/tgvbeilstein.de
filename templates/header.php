<header class="app">
  <div class="row row-without-margin">
    <div class="col s2">
      <a href="/" class="brand-logo">
        <img width="140" height="140" class="logo shadowed" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tgv.logo.svg">
      </a>
    </div>
    <div class="col s10">
      <div class="row row-without-margin">
        <div class="col s12 right-align club-bar">
          <div class="menu">
            <ul>
              <li class="page_item">
                <a href="/verein">
                  Verein
                </a>
              </li>
              <li class="page_item">
                <a href="/geschaeftsstelle">
                  Geschäftsstelle
                </a>
              </li>
              <li class="page_item">
                <a href="/impressum">
                  Impressum
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row row-without-margin">
        <div class="col s4">
          <h2>Turn- &amp; Gesang Verein</h2>
          <h1>"Eintracht" Beilstein 1823 e.V.</h1>
        </div>
        <div class="col s8">
          <nav role="navigation">
            <ul class="main-navigation">
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
                    ?>
                      <li>
                        <a href="<?php the_permalink() ?>" title="Abteilung <?php the_title_attribute(); ?>">
                          <img class="icon" src="<? echo $fields['piktogramm']; ?>">
                        </a>
                      </li>
                    <?php
                  endwhile;
                }
                wp_reset_query();
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
