<?php
/**
 * Section: Blog & Inspirations
 *
 * @package EasyEvents
 */

$posts_data = array(
  array(
    'category'      => 'Corporate',
    'categorySlug'  => 'easyflash',
    'date'          => '12 mars 2026',
    'readTime'      => '4 min',
    'title'         => '5 idées pour transformer votre soirée d\'entreprise en expérience inoubliable',
    'excerpt'       => 'De la mixologie en live aux photobooths immersifs, découvrez comment surprendre vos collaborateurs et marquer les esprits lors de votre prochain événement corporate.',
    'image'         => 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?w=800&q=80',
  ),
  array(
    'category'      => 'Mariage',
    'categorySlug'  => 'easyflair',
    'date'          => '28 fév. 2026',
    'readTime'      => '3 min',
    'title'         => 'Photobooth mariage : le must-have pour une réception moderne',
    'excerpt'       => 'Le photobooth 360° s\'impose comme l\'animation phare des mariages contemporains. Conseils et inspirations pour l\'intégrer parfaitement à votre grand jour.',
    'image'         => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&q=80',
  ),
  array(
    'category'      => 'Team Building',
    'categorySlug'  => 'easychallenge',
    'date'          => '10 fév. 2026',
    'readTime'      => '5 min',
    'title'         => 'Team building : comment renforcer la cohésion d\'équipe en 2026',
    'excerpt'       => 'Jeux collaboratifs, défis outdoor ou animations immersives — les nouvelles tendances du team building qui font la différence dans les entreprises romandes.',
    'image'         => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&q=80',
  ),
  array(
    'category'      => 'Festival',
    'categorySlug'  => 'easyrelax',
    'date'          => '3 jan. 2026',
    'readTime'      => '4 min',
    'title'         => 'Organiser un festival en Suisse romande : les clés du succès',
    'excerpt'       => 'De la logistique sanitaire aux espaces lounge, retour sur les éléments indispensables pour un festival réussi et une expérience participant au top du top.',
    'image'         => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=800&q=80',
  ),
  array(
    'category'      => 'Tendances',
    'categorySlug'  => 'secondary',
    'date'          => '18 déc. 2025',
    'readTime'      => '6 min',
    'title'         => 'Les grandes tendances événementielles pour l\'année 2026',
    'excerpt'       => 'Durabilité, immersion sensorielle, expériences hybrides… voici ce qui va façonner les événements professionnels et privés en Suisse cette année.',
    'image'         => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&q=80',
  ),
);

$cf_blog_posts = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'blog_posts' ) : null;
if ( ! empty( $cf_blog_posts ) && is_array( $cf_blog_posts ) ) {
  $posts_data = array();
  foreach ( $cf_blog_posts as $post ) {
    $image = $post['blog_image'] ?? '';
    if ( ! empty( $image ) && is_numeric( $image ) ) {
      $image = wp_get_attachment_url( $image );
    }

    $posts_data[] = array(
      'category'      => $post['blog_category'] ?? '',
      'categorySlug'  => $post['blog_category_slug'] ?? 'secondary',
      'date'          => $post['blog_date'] ?? '',
      'readTime'      => $post['blog_read_time'] ?? '',
      'title'         => $post['blog_title'] ?? '',
      'excerpt'       => $post['blog_excerpt'] ?? '',
      'image'         => $image,
    );
  }
}

$blog_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'blog_label' ) : '' ) ?: 'Blog & Inspirations';
$blog_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'blog_title' ) : '' ) ?: 'Idées, tendances & coulisses';
$blog_subtitle = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'blog_subtitle' ) : '' ) ?: 'Conseils événementiels, retours d\'expérience et inspirations pour créer des moments qui marquent.';
$blog_cta_text = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'blog_cta_text' ) : '' ) ?: 'Tous les articles';
$blog_cta_link = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'blog_cta_link' ) : '' ) ?: '/blog';

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
          <?php echo esc_html( $blog_cta_text ); ?> <?php echo easyevents_icon( 'arrow-up-right', 15 ); ?>
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
    <div class="blog-track">
      <?php foreach ( $posts_data as $post ) :
        $color_style = isset( $cat_colors[ $post['categorySlug'] ] ) ? $cat_colors[ $post['categorySlug'] ] : $cat_colors['secondary'];
      ?>
        <article class="blog-card">
          <!-- Image -->
          <?php if ( ! empty( $post['image'] ) ) : ?>
          <div class="blog-card__img-wrap">
            <img src="<?php echo esc_url( $post['image'] ); ?>" alt="<?php echo esc_attr( $post['title'] ); ?>" class="blog-card__img" loading="lazy">
          </div>
          <?php endif; ?>
          <!-- Content -->
          <div class="blog-card__body">
            <div>
              <span class="blog-card__cat font-heading" style="<?php echo esc_attr( $color_style ); ?>">
                <?php echo easyevents_icon( 'tag', 10 ); ?>
                <?php echo esc_html( $post['category'] ); ?>
              </span>
              <h3 class="blog-card__title"><?php echo esc_html( $post['title'] ); ?></h3>
              <p class="blog-card__excerpt"><?php echo esc_html( $post['excerpt'] ); ?></p>
            </div>
            <div class="blog-card__meta">
              <span style="display:flex;align-items:center;gap:.25rem">
                <?php echo easyevents_icon( 'calendar', 11 ); ?>
                <?php echo esc_html( $post['date'] ); ?>
              </span>
              <span style="display:flex;align-items:center;gap:.25rem">
                <?php echo easyevents_icon( 'clock', 11 ); ?>
                <?php echo esc_html( $post['readTime'] ); ?>
              </span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
