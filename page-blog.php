<?php
/**
 * Template Name: Blog
 *
 * Blog listing page — displays all posts as clean cards, 16 per page.
 *
 * @package EasyEvents
 */

get_header();

/* ── Pagination ─────────────────────────────────── */
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

/* ── Query ──────────────────────────────────────── */
$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 16,
	'paged'          => $paged,
) );
?>

<main id="main" class="site-main">

  <!-- ═══ ANIMATED DARK HERO ════════════════════ -->
  <section class="blog-hero-light">
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

      <?php if ( $blog_query->have_posts() ) : ?>
        <div class="blog-card-grid">
          <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="blog-simple-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="blog-simple-card__img-wrap">
                  <?php the_post_thumbnail( 'medium_large', array(
                    'class'   => 'blog-simple-card__img',
                    'loading' => 'lazy',
                  ) ); ?>
                </div>
              <?php endif; ?>

              <h2 class="blog-simple-card__title font-heading"><?php the_title(); ?></h2>

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
        </div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </section>

</main>

<?php
get_footer();
