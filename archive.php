<?php
/**
 * Archive / Blog index template
 *
 * Falls back to this for category, tag, date archives and the default blog index.
 * Uses the same card design as the Blog page template.
 *
 * @package EasyEvents
 */

get_header();

/* ── Category color mapping ─────────────────────── */
$cat_color_map = array(
	'easyflair'     => array( 'bg' => 'rgba(184,150,62,.15)', 'color' => 'var(--easyflair)' ),
	'easyflash'     => array( 'bg' => 'rgba(124,92,252,.15)', 'color' => 'var(--easyflash)' ),
	'easychallenge' => array( 'bg' => 'rgba(232,124,26,.15)', 'color' => 'var(--easychallenge)' ),
	'easyrelax'     => array( 'bg' => 'rgba(90,127,80,.15)',  'color' => 'var(--easyrelax)' ),
	'easytoilets'   => array( 'bg' => 'rgba(240,65,88,.15)',  'color' => 'var(--easytoilets)' ),
);
$default_cat_color = array( 'bg' => 'rgba(124,92,252,.15)', 'color' => 'var(--secondary)' );

/* ── Archive title ──────────────────────────────── */
$archive_title = 'Blog & Inspirations';
if ( is_category() ) {
	$archive_title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$archive_title = single_tag_title( '', false );
} elseif ( is_date() ) {
  $year  = (int) get_query_var( 'year' );
  $month = (int) get_query_var( 'monthnum' );
  $day   = (int) get_query_var( 'day' );

  if ( $year && $month && $day ) {
    $archive_title = wp_date( get_option( 'date_format' ), mktime( 0, 0, 0, $month, $day, $year ) );
  } elseif ( $year && $month ) {
    $archive_title = wp_date( 'F Y', mktime( 0, 0, 0, $month, 1, $year ) );
  } elseif ( $year ) {
    $archive_title = (string) $year;
  }
}
?>

<main id="main" class="site-main">

  <!-- Hero -->
  <section class="blog-hero">
    <div class="container" style="position:relative;z-index:1">
      <div class="blog-hero__badge">
        <span class="blog-hero__badge-dot"></span>
        Blog
      </div>
      <h1 class="blog-hero__title font-heading"><?php echo esc_html( $archive_title ); ?></h1>
      <?php if ( category_description() ) : ?>
        <p class="blog-hero__desc"><?php echo esc_html( wp_strip_all_tags( category_description() ) ); ?></p>
      <?php else : ?>
        <p class="blog-hero__desc">Conseils événementiels, retours d'expérience et inspirations pour créer des moments qui marquent.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Content -->
  <section class="section" style="padding-top:3rem">
    <div class="container">

      <?php if ( have_posts() ) : ?>
        <div class="blog-grid">
          <?php
          $post_index = 0;
          while ( have_posts() ) : the_post();
            $post_index++;
            $post_cats   = get_the_category();
            $primary_cat = ! empty( $post_cats ) ? $post_cats[0] : null;
            $cat_slug    = $primary_cat ? $primary_cat->slug : '';
            $cat_name    = $primary_cat ? $primary_cat->name : '';
            $c           = isset( $cat_color_map[ $cat_slug ] ) ? $cat_color_map[ $cat_slug ] : $default_cat_color;
            $cat_style   = 'background:' . $c['bg'] . ';color:' . $c['color'];

            $content    = get_post_field( 'post_content', get_the_ID() );
            $word_count = str_word_count( wp_strip_all_tags( $content ) );
            $read_time  = max( 1, ceil( $word_count / 200 ) );
            $author_name = get_the_author();
            $author_initial = mb_strtoupper( mb_substr( $author_name, 0, 1 ) );
          ?>
            <article class="blog-archive-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="blog-archive-card__img-wrap" aria-label="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail( 'medium_large', array(
                    'class' => 'blog-archive-card__img',
                    'loading' => $post_index <= 3 ? 'eager' : 'lazy',
                  ) ); ?>
                  <?php if ( $cat_name ) : ?>
                    <span class="blog-archive-card__cat-badge" style="<?php echo esc_attr( $cat_style ); ?>">
                      <?php echo easyevents_icon( 'tag', 9 ); ?>
                      <?php echo esc_html( $cat_name ); ?>
                    </span>
                  <?php endif; ?>
                </a>
              <?php endif; ?>

              <div class="blog-archive-card__body">
                <h2 class="blog-archive-card__title">
                  <a href="<?php the_permalink(); ?>" style="color:inherit"><?php the_title(); ?></a>
                </h2>
                <p class="blog-archive-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>

                <div class="blog-archive-card__meta">
                  <span class="blog-archive-card__author-avatar" style="background:<?php echo esc_attr( $c['color'] ); ?>">
                    <?php echo esc_html( $author_initial ); ?>
                  </span>
                  <span class="blog-archive-card__meta-item"><?php echo esc_html( $author_name ); ?></span>
                  <span class="blog-archive-card__meta-item" style="opacity:.5">·</span>
                  <span class="blog-archive-card__meta-item">
                    <?php echo easyevents_icon( 'clock', 11 ); ?>
                    <?php echo esc_html( $read_time ); ?> min
                  </span>
                  <span class="blog-archive-card__meta-item" style="opacity:.5">·</span>
                  <span class="blog-archive-card__meta-item">
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                  </span>
                  <a href="<?php the_permalink(); ?>" class="blog-archive-card__read-more">
                    Lire <?php echo easyevents_icon( 'arrow-right', 12 ); ?>
                  </a>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="blog-pagination">
          <?php
          the_posts_pagination( array(
            'prev_text' => easyevents_icon( 'chevron-left', 16 ) . ' <span>Précédent</span>',
            'next_text' => '<span>Suivant</span> ' . easyevents_icon( 'chevron-right', 16 ),
          ) );
          ?>
        </div>

      <?php else : ?>
        <div class="blog-empty">
          <div class="blog-empty__icon">
            <?php echo easyevents_icon( 'book-open', 24 ); ?>
          </div>
          <p class="blog-empty__title">Aucun article pour le moment</p>
          <p>Revenez bientôt pour découvrir nos conseils et inspirations événementiels.</p>
        </div>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php
get_footer();
