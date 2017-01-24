<?php while (have_posts()) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row headline">
      <div class="col s8 offset-s4 right-align">
        <header class="entry-header">
          <?php the_title( '<h1 class="single-entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <div class="entry-content">
              <?php
                // Declare global $more (before the loop).
                global $more;

                // Set (inside the loop) to display all content, including text below more.
                $more = 1;

                the_content();

                wp_link_pages( array(
                  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                  'after'       => '</div>',
                  'link_before' => '<span>',
                  'link_after'  => '</span>',
                  'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                  'separator'   => '<span class="screen-reader-text">, </span>',
                ) );

                if ( '' !== get_the_author_meta( 'description' ) ) {
                  get_template_part( 'templates/biography' );
                }
              ?>
            </div><!-- .entry-content -->
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
    </div>
  </article><!-- #post-## -->
<?php endwhile; ?>

