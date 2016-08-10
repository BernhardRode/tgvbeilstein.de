<?php
  require dirname(__FILE__) . '/../lib/helpers.php';
?>
<div class="abteilung row">
  <?php
    $fields = get_fields();
  ?>
  <div class="row headline">
    <div class="col s2">
      <?php
        tgv_pictogram( $fields['piktogramm'], 'Abteilung '.get_the_title(), 75);
      ?>
    </div>
    <div class="col s8 offset-s2 right-align">
      <h1>Abteilung <?php the_title(); ?></h1>
    </div>
  </div>

  <section class="kontakt row">
    <?php
      if (strlen($fields['e-mail']) > 0):
      ?>
        <div class="chip">
          <span class="label">E-Mail: </span>
          <a href="mailto:<?php echo $fields['e-mail']; ?>">
            <span class="link"><?php echo $fields['e-mail']; ?></a>
          </a>
        </div>
      <?php
      endif;
      if (strlen($fields['webseite']) > 0):
      ?>
        <div class="chip">
          <span class="label">Webseite: </span>
          <a href="<?php echo $fields['webseite']; ?>" target="_blank">
            <span class="link"><?php echo $fields['webseite']; ?></span>
          </a>
        </div>
      <?php
      endif;
    ?>
  </section>

  <?php if ($fields['personen'] && sizeof($fields['personen']) > 0):?>
    <section class="personen">
      <h5 class="center-align">Funktionäre</h5>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
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
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?
    if (strlen(get_the_content()) > 0):
  ?>
    <section class="content">
      <h5 class="center-align">Informationen</h5>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
  <?
    endif;
  ?>

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
        <div class="row headline">
          <div class="col s8 offset-s4 right-align">
            <h1>Neuigkeiten</h1>
          </div>
        </div>
        <div class="liste">
          <?php
            while ($special_query_results->have_posts()) : $special_query_results->the_post();
              $fields = get_fields();
              ?>
                  <div class="row">
                    <div class="col s12">
                      <div class="card">
                        <div class="card-content">
                          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                              <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </header>

                            <div class="entry-content">
                              <?php
                                the_content();

                                if ( '' !== get_the_author_meta( 'description' ) ) {
                                  get_template_part( 'templates/biography' );
                                }
                              ?>
                            </div>
                          </article>
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
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php
        ?>
      </section>
      <?php
    endif;
  ?>
</div>
