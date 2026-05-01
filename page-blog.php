<?php
/**
 * Template Name: Blog
 *
 * Blog listing page — displays posts as premium cards with category filtering.
 *
 * @package EasyEvents
 */

get_header();

/* ── Pagination ─────────────────────────────────── */
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

/* ── Category filter ────────────────────────────── */
$current_cat = isset( $_GET['cat'] ) ? absint( $_GET['cat'] ) : 0;

/* ── Query ──────────────────────────────────────── */
$args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $paged,
);

if ( $current_cat ) {
	$args['cat'] = $current_cat;
}

$blog_query = new WP_Query( $args );

/* ── All categories ─────────────────────────────── */
$categories = get_categories( array(
	'orderby'    => 'count',
	'order'      => 'DESC',
	'hide_empty' => true,
) );

/* ── Category color mapping ─────────────────────── */
$cat_color_map = array(
	'easyflair'     => array( 'bg' => 'rgba(184,150,62,.15)', 'color' => 'var(--easyflair)' ),
	'easyflash'     => array( 'bg' => 'rgba(124,92,252,.15)', 'color' => 'var(--easyflash)' ),
	'easychallenge' => array( 'bg' => 'rgba(232,124,26,.15)', 'color' => 'var(--easychallenge)' ),
	'easyrelax'     => array( 'bg' => 'rgba(90,127,80,.15)',  'color' => 'var(--easyrelax)' ),
	'easytoilets'   => array( 'bg' => 'rgba(240,65,88,.15)',  'color' => 'var(--easytoilets)' ),
);
$default_cat_color = array( 'bg' => 'rgba(124,92,252,.15)', 'color' => 'var(--secondary)' );

/**
 * Return the style string for a category badge.
 */
if ( ! function_exists( 'easyevents_blog_cat_style' ) ) {
  function easyevents_blog_cat_style( $cat_slug, $cat_color_map, $default_cat_color ) {
    $c = isset( $cat_color_map[ $cat_slug ] ) ? $cat_color_map[ $cat_slug ] : $default_cat_color;
    return 'background:' . $c['bg'] . ';color:' . $c['color'];
  }
}

/**
 * Estimate reading time.
 */
if ( ! function_exists( 'easyevents_reading_time' ) ) {
  function easyevents_reading_time( $post_id ) {
    $content    = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $minutes    = max( 1, ceil( $word_count / 200 ) );
    return $minutes . ' min';
  }
}
?>

<main id="main" class="site-main">

  <!-- Hero compact -->
  <section class="blog-hero">
    <div class="container" style="position:relative;z-index:1">
      <div class="blog-hero__badge">
        <span class="blog-hero__badge-dot"></span>
        Blog
      </div>
      <h1 class="blog-hero__title font-heading">Blog <em class="text-gradient-festive">&</em> Inspirations</h1>
      <p class="blog-hero__desc">
        Conseils événementiels, retours d'expérience et inspirations pour créer des moments qui marquent.
      </p>
    </div>
  </section>

  <!-- Content area -->
  <section class="section" style="padding-top:3rem">
    <div class="container">

      <!-- Category filters -->
      <?php if ( ! empty( $categories ) ) : ?>
        <div class="blog-filters">
          <a href="<?php echo esc_url( get_permalink() ); ?>"
             class="filter-tab<?php echo ! $current_cat ? ' filter-tab--active' : ''; ?>">
            Tous
          </a>
          <?php foreach ( $categories as $cat ) : ?>
            <a href="<?php echo esc_url( add_query_arg( 'cat', $cat->term_id, get_permalink() ) ); ?>"
               class="filter-tab<?php echo $current_cat === (int) $cat->term_id ? ' filter-tab--active' : ''; ?>">
              <?php echo esc_html( $cat->name ); ?>
              <span style="opacity:.5;font-size:.75rem;margin-left:.125rem">(<?php echo esc_html( $cat->count ); ?>)</span>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Posts grid -->
      <?php if ( $blog_query->have_posts() ) : ?>
        <div class="blog-grid">
          <?php
          $post_index = 0;
          while ( $blog_query->have_posts() ) :
            $blog_query->the_post();
            $post_index++;

            $is_featured  = ( $post_index === 1 && $paged === 1 && ! $current_cat );
            $post_cats    = get_the_category();
            $primary_cat  = ! empty( $post_cats ) ? $post_cats[0] : null;
            $cat_slug     = $primary_cat ? $primary_cat->slug : '';
            $cat_name     = $primary_cat ? $primary_cat->name : '';
            $cat_style    = easyevents_blog_cat_style( $cat_slug, $cat_color_map, $default_cat_color );
            $read_time    = easyevents_reading_time( get_the_ID() );
            $author_name  = get_the_author();
            $author_initial = mb_strtoupper( mb_substr( $author_name, 0, 1 ) );
          ?>
            <article class="blog-archive-card<?php echo $is_featured ? ' blog-archive-card--featured' : ''; ?>">
              <!-- Image -->
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="blog-archive-card__img-wrap" aria-label="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail( $is_featured ? 'large' : 'medium_large', array(
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

              <!-- Body -->
              <div class="blog-archive-card__body">
                <h2 class="blog-archive-card__title">
                  <a href="<?php the_permalink(); ?>" style="color:inherit"><?php the_title(); ?></a>
                </h2>
                <p class="blog-archive-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>

                <!-- Meta -->
                <div class="blog-archive-card__meta">
                  <span class="blog-archive-card__author-avatar" style="background:<?php echo esc_attr( isset( $cat_color_map[ $cat_slug ] ) ? $cat_color_map[ $cat_slug ]['color'] : 'var(--secondary)' ); ?>">
                    <?php echo esc_html( $author_initial ); ?>
                  </span>
                  <span class="blog-archive-card__meta-item">
                    <?php echo esc_html( $author_name ); ?>
                  </span>
                  <span class="blog-archive-card__meta-item" style="opacity:.5">·</span>
                  <span class="blog-archive-card__meta-item">
                    <?php echo easyevents_icon( 'clock', 11 ); ?>
                    <?php echo esc_html( $read_time ); ?>
                  </span>
                  <span class="blog-archive-card__meta-item" style="opacity:.5">·</span>
                  <span class="blog-archive-card__meta-item">
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                      <?php echo esc_html( get_the_date() ); ?>
                    </time>
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
          echo paginate_links( array(
            'total'     => $blog_query->max_num_pages,
            'current'   => $paged,
            'prev_text' => easyevents_icon( 'chevron-left', 16 ) . ' <span>Précédent</span>',
            'next_text' => '<span>Suivant</span> ' . easyevents_icon( 'chevron-right', 16 ),
            'type'      => 'list',
          ) );
          ?>
        </div>

      <?php else : ?>
        <!-- Empty state -->
        <div class="blog-empty">
          <div class="blog-empty__icon">
            <?php echo easyevents_icon( 'book-open', 24 ); ?>
          </div>
          <p class="blog-empty__title">Aucun article pour le moment</p>
          <p>Revenez bientôt pour découvrir nos conseils et inspirations événementiels.</p>
          <?php if ( $current_cat ) : ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-outline" style="margin-top:1.5rem">
              Voir tous les articles
            </a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

    </div>
  </section>

</main>

<?php
get_footer();
