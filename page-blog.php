<?php
/**
 * Template Name: Blog
 *
 * Blog listing page — displays posts as clean cards with animated light hero.
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
?>

<main id="main" class="site-main">

  <!-- ═══ ANIMATED LIGHT HERO ═══════════════════ -->
  <section class="blog-hero-light">
    <!-- Floating orbs -->
    <div class="blog-hero-light__orb blog-hero-light__orb--1"></div>
    <div class="blog-hero-light__orb blog-hero-light__orb--2"></div>
    <div class="blog-hero-light__orb blog-hero-light__orb--3"></div>

    <div class="container" style="position:relative;z-index:2">
      <div class="blog-hero-light__badge font-heading">
        <span class="blog-hero-light__badge-dot"></span>
        Blog
      </div>
      <h1 class="blog-hero-light__title font-heading">
        Blog <em class="text-gradient-festive">&</em> Inspirations
      </h1>
      <p class="blog-hero-light__desc">
        Conseils événementiels, retours d'expérience et inspirations pour créer des moments qui marquent.
      </p>
    </div>
  </section>

  <!-- ═══ CONTENT ═══════════════════════════════ -->
  <section class="section" style="padding-top:2rem">
    <div class="container">

      <!-- Category filters -->
      <?php if ( ! empty( $categories ) ) : ?>
        <div class="blog-filters">
          <a href="<?php echo esc_url( get_permalink() ); ?>"
             class="filter-tab<?php echo ! $current_cat ? ' filter-tab--active' : ''; ?>">
            Tous
          </a>
          <?php foreach ( $categories as $cat ) :
            $c = isset( $cat_color_map[ $cat->slug ] ) ? $cat_color_map[ $cat->slug ] : $default_cat_color;
          ?>
            <a href="<?php echo esc_url( add_query_arg( 'cat', $cat->term_id, get_permalink() ) ); ?>"
               class="filter-tab<?php echo $current_cat === (int) $cat->term_id ? ' filter-tab--active' : ''; ?>">
              <?php echo esc_html( $cat->name ); ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Posts grid -->
      <?php if ( $blog_query->have_posts() ) : ?>
        <div class="blog-card-grid">
          <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
            $post_cats   = get_the_category();
            $primary_cat = ! empty( $post_cats ) ? $post_cats[0] : null;
            $cat_slug    = $primary_cat ? $primary_cat->slug : '';
            $c           = isset( $cat_color_map[ $cat_slug ] ) ? $cat_color_map[ $cat_slug ] : $default_cat_color;
          ?>
            <a href="<?php the_permalink(); ?>" class="blog-simple-card">
              <!-- Image -->
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="blog-simple-card__img-wrap">
                  <?php the_post_thumbnail( 'medium_large', array(
                    'class'   => 'blog-simple-card__img',
                    'loading' => 'lazy',
                  ) ); ?>
                </div>
              <?php endif; ?>

              <!-- Title -->
              <h2 class="blog-simple-card__title font-heading"><?php the_title(); ?></h2>

              <!-- Date -->
              <div class="blog-simple-card__date">
                <?php echo easyevents_icon( 'calendar', 12 ); ?>
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                  <?php echo esc_html( get_the_date() ); ?>
                </time>
              </div>
            </a>
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
