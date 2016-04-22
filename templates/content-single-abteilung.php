<?php
  require dirname(__FILE__) . '/../lib/helpers.php';
?>
<div class="abteilung">
  <?php
    $fields = get_fields();
  ?>
  <section class="uebersicht">
    <div class="piktogramm">
      <?php
        tgv_pictogram( $fields['piktogramm'], 'Abteilung '.get_the_title());
      ?>
    </div>
    <div class="informationen">
      <h1><span class="muted">Abteilung</span><br><?php the_title(); ?></h1>
      <ul>
        <?php
          if (strlen($fields['e-mail']) > 0):
          ?>
            <li class="contact email">
              <span class="label">E-Mail: </span>
              <a href="mailto:<?php echo $fields['e-mail']; ?>">
                <span class="link"><?php echo $fields['e-mail']; ?></a>
              </a>
            </li>
          <?php
          endif;
          if (strlen($fields['webseite']) > 0):
          ?>
            <li class="contact website">
              <span class="label">Webseite: </span>
              <a href="<?php echo $fields['webseite']; ?>" target="_blank">
                <span class="link"><?php echo $fields['webseite']; ?></span>
              </a>
            </li>
          <?php
          endif;
        ?>
      </ul>
    </div>
  </section>

  <?php
    if (isset($fields['hintergrund'])):
    ?>
      <style>
        @media only screen and (min-width: 800px) {
          .wrap { background-image: url('<?php echo $fields['hintergrund']; ?>'); }
        }
      </style>
    <?php
    endif;
  ?>

  <?php if ($fields['personen'] && sizeof($fields['personen']) > 0):?>
    <section class="personen">
      <h2>Abteilungsleitung</h2>
      <ul>
        <?php
          foreach($fields['personen'] as $person) {
            ?>
              <li>
                <?php
                  tgv_extend_person($person);
                  tgv_render_person($person);
                ?>
              </li>
            <?php
          }
        ?>
      </ul>
    </section>
  <?php endif; ?>


  <section class="content">
    <?php the_post(); ?>
  </section>

  <?php
    $args=array(
      'orderby' => 'title',
      'order'   => 'ASC',
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'ignore_sticky_posts'=> 1,
    );

    if ($fields['angezeigte_kategorien'] && sizeof($fields['angezeigte_kategorien']) > 0) {
      $args['category__in']=$fields['angezeigte_kategorien'];
    }

    $special_query_results = new WP_Query($args);

    if( $special_query_results->have_posts() ):
      ?>
      <section class="neuigkeiten">
        <h2>Neuigkeiten</h2>
        <div class="liste">
          <?php
            while ($special_query_results->have_posts()) : $special_query_results->the_post();
              $fields = get_fields();
              ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                      <?php
                        the_content();

                        if ( '' !== get_the_author_meta( 'description' ) ) {
                          get_template_part( 'templates/biography' );
                        }
                      ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                      <?php twentysixteen_entry_meta(); ?>
                    </footer><!-- .entry-footer -->
                  </article><!-- #post-## -->
                <?php endwhile; ?>
              <?php
        ?>
      </section>
      <?php
    endif;
  ?>
</div>
