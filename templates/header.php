<header>
  <div class="container">
    <div class="top">
      <nav role="navigation" class="sub-nav" id="sub-nav">
        <ul id="sub-nav-list">
          <li>
            <a href="/verein">Verein</a>
          </li>
          <li>
            <a href="/geschaeftsstelle">Geschäftsstelle</a>
          </li>
          <li>
            <a href="/impressum">Impressum</a>
          </li>
        </ul>
      </nav>
      <a href="/" title="TGV Eintracht Beilstein">
        <div>
          <span>Offizielle Webseite des</span>
          <b>TGV</b> "Eintracht" Beilstein 1823 e.V.
        </div>
        <img width="150" height="150" class="logo shadowed" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tgv.logo.png">
      </a>
    </div>
  </div>
  <nav role='navigation' class="main-nav" id="main-nav">
    <ul id="main-nav-list">
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
                  <div>
                    <span>Abteilung</span>
                    <?php the_title(); ?>
                  </div>
                </a>
              </li>
            <?php
          endwhile;
        }
        wp_reset_query();
      ?>
    </ul>
  </nav>
</header>
