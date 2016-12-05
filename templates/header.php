<nav>
  <div class="nav-wrapper">
    <div class="menu-button" id="mobile-navigation-open">
      <i class="material-icons large">clear_all</i>
    </div>
    <a href="/" class="brand-logo">
      <img class="logo shadowed" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tgv.logo.svg">
    </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="/verein">Verein</a></li>
      <li><a href="/geschaeftsstelle">Geschäftsstelle</a></li>
      <li><a href="/kalender">Termine</a></li>
      <li><a href="/downloads">Downloads</a></li>
      <li><a href="/impressum">Impressum</a></li>
    </ul>
  </div>
  <div class="main-navigation-wrapper container">
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
  </div>
  <div class="mobile-navigation" id="mobile-navigation">
    <div class="close" id="mobile-navigation-close">
      <i class="material-icons large">clear</i>
    </div>
    <div class="brand-logo-wrapper">
      <a href="/" class="brand-logo">
        <img class="logo shadowed" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tgv.logo.svg">
      </a>
    </div>
    <div>
      <a style="width:90%;" href="mailto:info@tgveintrachtbeilstein.de" class="waves-effect waves-light btn grey darken-3"><i class="material-icons left">email</i>info@tgveintrachtbeilstein.de</a>
      <a style="width:90%;" href="tel:+4970625753" class="waves-effect waves-light btn grey darken-3"><i class="material-icons left">phone</i>+49 (0) 7062 - 5753</a>
    </div>
    <ul class="abteilungen">
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
    <ul class="main">
      <li><a href="/verein">Verein</a></li>
      <li><a href="/geschaeftsstelle">Geschäftsstelle</a></li>
      <li><a href="/kalender">Termine</a></li>
      <li><a href="/downloads">Downloads</a></li>
      <li><a href="/impressum">Impressum</a></li>
    </ul>
  </div>
</nav>
