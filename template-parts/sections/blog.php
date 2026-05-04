<?php
/**
 * Section: Blog & Inspirations
 *
 * @package EasyEvents
 */

$posts_data = array();

$home_blog_query = new WP_Query( array(
  'post_type'           => 'post',
  'post_status'         => 'publish',
  'posts_per_page'      => 6,
  'ignore_sticky_posts' => true,
) );

if ( $home_blog_query->have_posts() ) {
  while ( $home_blog_query->have_posts() ) {
    $home_blog_query->the_post();

    $post_categories = get_the_category();
    $primary_cat     = ! empty( $post_categories ) ? $post_categories[0] : null;
    $category_name   = $primary_cat ? $primary_cat->name : 'Article';
    $category_slug   = $primary_cat ? $primary_cat->slug : 'secondary';

    $posts_data[] = array(
      'category'      => $category_name,
      'categorySlug'  => $category_slug,
      'date'          => get_the_date(),
      'title'         => get_the_title(),
      'excerpt'       => get_the_excerpt(),
      'image'         => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ),
      'link'          => get_permalink(),
    );
  }
  wp_reset_postdata();
}

$posts_page_id = (int) get_option( 'page_for_posts' );
$published_posts = wp_count_posts( 'post' );
$published_count = isset( $published_posts->publish ) ? (int) $published_posts->publish : 0;

$blog_label = 'Actualités';
if ( $published_count > 0 ) {
  /* translators: %d: published posts count */
  $blog_label = sprintf( _n( 'Actualités (%d article)', 'Actualités (%d articles)', $published_count, 'easyevents' ), $published_count );
}
$blog_title = 'Actualités';
$blog_subtitle = 'Retrouvez nos dernières actualités, conseils et retours d\'expérience pour préparer des événements réussis.';

$blog_cta_text = 'Tous les articles';
if ( $published_count > 0 ) {
  /* translators: %d: published posts count */
  $blog_cta_text = sprintf( _n( 'Tous les articles (%d)', 'Tous les articles (%d)', $published_count, 'easyevents' ), $published_count );
}

$blog_cta_link = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/blog/' );

// Category color map
$cat_colors = array(
  'easyflash'     => 'background:rgba(124,92,252,.15);color:var(--easyflash)',
  'easyflair'     => 'background:rgba(184,150,62,.15);color:var(--easyflair)',
  'easychallenge' => 'background:rgba(232,124,26,.15);color:var(--easychallenge)',
  'easyrelax'     => 'background:rgba(90,127,80,.15);color:var(--easyrelax)',
  'secondary'     => 'background:rgba(124,92,252,.15);color:var(--secondary)',
);
?>

<section class="section" style="background:rgba(240,235,248,.3);position:relative;overflow:hidden">
  <!-- Background texture -->
  <div style="position:absolute;inset:0;pointer-events:none;background-image:radial-gradient(circle at 20% 30%,hsla(245,80%,64%,.06) 0%,transparent 50%),radial-gradient(circle at 80% 70%,hsla(33,95%,52%,.05) 0%,transparent 50%)"></div>

  <div class="container" style="position:relative;z-index:1">
    <!-- Header -->
    <div class="animate-on-scroll" style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:1.5rem;margin-bottom:2.5rem">
      <div>
        <span style="display:inline-block;background:rgba(124,92,252,.1);color:var(--secondary);padding:.375rem 1rem;border-radius:var(--radius-full);font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.18em;margin-bottom:.75rem" class="font-heading">
          <?php echo esc_html( $blog_label ); ?>
        </span>
        <h2 class="section-title" style="text-align:left;margin-bottom:.75rem">
          <?php echo esc_html( $blog_title ); ?>
        </h2>
        <p style="color:var(--muted-foreground);max-width:32rem;font-size:.9375rem">
          <?php echo esc_html( $blog_subtitle ); ?>
        </p>
      </div>
      <div style="display:flex;align-items:center;gap:.75rem;flex-shrink:0">
        <a href="<?php echo esc_url( $blog_cta_link ); ?>" style="display:inline-flex;align-items:center;gap:.5rem;font-size:.875rem;font-weight:600;color:var(--secondary)" class="font-heading">
          <?php echo esc_html( $blog_cta_text ); ?> <?php echo easyevents_icon( 'arrow-right', 15 ); ?>
        </a>
        <button data-blog-prev aria-label="Article précédent" style="width:2.25rem;height:2.25rem;border-radius:50%;border:1px solid var(--border);background:var(--card);display:inline-flex;align-items:center;justify-content:center;color:var(--foreground);transition:all .2s">
          <?php echo easyevents_icon( 'chevron-left', 18 ); ?>
        </button>
        <button data-blog-next aria-label="Article suivant" style="width:2.25rem;height:2.25rem;border-radius:50%;border:1px solid var(--border);background:var(--card);display:inline-flex;align-items:center;justify-content:center;color:var(--foreground);transition:all .2s">
          <?php echo easyevents_icon( 'chevron-right', 18 ); ?>
        </button>
      </div>
    </div>

    <!-- Scrollable track -->
    <?php if ( ! empty( $posts_data ) ) : ?>
      <div class="blog-track">
        <?php foreach ( $posts_data as $blog_post ) :
          $color_style = isset( $cat_colors[ $blog_post['categorySlug'] ] ) ? $cat_colors[ $blog_post['categorySlug'] ] : $cat_colors['secondary'];
        ?>
          <article class="blog-card">
            <!-- Image -->
            <?php if ( ! empty( $blog_post['image'] ) ) : ?>
            <a href="<?php echo esc_url( $blog_post['link'] ); ?>" class="blog-card__img-wrap" aria-label="<?php echo esc_attr( $blog_post['title'] ); ?>">
              <img src="<?php echo esc_url( $blog_post['image'] ); ?>" alt="<?php echo esc_attr( $blog_post['title'] ); ?>" class="blog-card__img" loading="lazy">
            </a>
            <?php endif; ?>
            <!-- Content -->
            <div class="blog-card__body">
              <div>
                <span class="blog-card__cat font-heading" style="<?php echo esc_attr( $color_style ); ?>">
                  <?php echo easyevents_icon( 'tag', 10 ); ?>
                  <?php echo esc_html( $blog_post['category'] ); ?>
                </span>
                <h3 class="blog-card__title"><a href="<?php echo esc_url( $blog_post['link'] ); ?>" style="color:inherit"><?php echo esc_html( $blog_post['title'] ); ?></a></h3>
                <p class="blog-card__excerpt"><?php echo esc_html( $blog_post['excerpt'] ); ?></p>
              </div>
              <div class="blog-card__meta">
                <span style="display:flex;align-items:center;gap:.25rem">
                  <?php echo easyevents_icon( 'calendar', 11 ); ?>
                  <?php echo esc_html( $blog_post['date'] ); ?>
                </span>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <p style="color:var(--muted-foreground)">Aucun article publié pour le moment.</p>
    <?php endif; ?>
  </div>
</section>
