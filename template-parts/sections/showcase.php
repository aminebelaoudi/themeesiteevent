<?php
/**
 * Section: Showcase (filterable gallery)
 *
 * @package EasyEvents
 */

$tabs = array( 'Tous', 'Corporate', 'Mariage', 'Team Building', 'Festival' );

$showcase_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'showcase_label' ) : '' ) ?: 'Réalisations';
$showcase_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'showcase_title' ) : '' ) ?: 'Nos derniers événements';
$showcase_cta_text = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'showcase_cta_text' ) : '' ) ?: 'Voir tous les événements';
$showcase_cta_link = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'showcase_cta_link' ) : '' ) ?: '#';

// Default events — can be overridden via Carbon Fields
$events = array(
  array(
    'image'    => get_theme_file_uri( 'assets/images/easyflair-bar.jpg' ),
    'title'    => 'Cocktail d\'entreprise à Genève',
    'service'  => 'EasyFlair + EasyFlash',
    'category' => 'Corporate',
  ),
  array(
    'image'    => get_theme_file_uri( 'assets/images/easyflash-photobooth.jpg' ),
    'title'    => 'Soirée de gala — Vidéo 360°',
    'service'  => 'EasyFlash',
    'category' => 'Corporate',
  ),
  array(
    'image'    => get_theme_file_uri( 'assets/images/easychallenge-team.jpg' ),
    'title'    => 'Team building outdoor — Lausanne',
    'service'  => 'EasyChallenge',
    'category' => 'Team Building',
  ),
  array(
    'image'    => get_theme_file_uri( 'assets/images/hero-event.jpg' ),
    'title'    => 'Mariage premium — Lac Léman',
    'service'  => 'EasyFlair + EasyFlash + EasyRelax',
    'category' => 'Mariage',
  ),
  array(
    'image'    => get_theme_file_uri( 'assets/images/easyflair-bar.jpg' ),
    'title'    => 'Festival d\'été — Nyon',
    'service'  => 'EasyFlair + EasyToilets',
    'category' => 'Festival',
  ),
  array(
    'image'    => get_theme_file_uri( 'assets/images/easychallenge-team.jpg' ),
    'title'    => 'Séminaire immersif — Montreux',
    'service'  => 'EasyChallenge + EasyRelax',
    'category' => 'Corporate',
  ),
);

// Try to get Carbon Fields showcase data (safe if plugin not active)
$cf_events = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'showcase_items' ) : null;
if ( ! empty( $cf_events ) && is_array( $cf_events ) ) {
  $events = array();
  foreach ( $cf_events as $item ) {
    $events[] = array(
      'title'    => $item['showcase_title'] ?? ( $item['title'] ?? '' ),
      'service'  => $item['showcase_service'] ?? ( $item['service'] ?? '' ),
      'category' => $item['showcase_category'] ?? ( $item['category'] ?? 'Corporate' ),
      'image'    => $item['showcase_image'] ?? ( $item['image'] ?? '' ),
    );
  }
}

// Fallback image when an item has no media attached.
$showcase_fallback_image = function( $service_text ) {
  $service_text = strtolower( (string) $service_text );
  if ( strpos( $service_text, 'easychallenge' ) !== false ) {
    return get_theme_file_uri( 'assets/images/easychallenge-team.jpg' );
  }
  if ( strpos( $service_text, 'easyflash' ) !== false ) {
    return get_theme_file_uri( 'assets/images/easyflash-photobooth.jpg' );
  }
  if ( strpos( $service_text, 'easyflair' ) !== false ) {
    return get_theme_file_uri( 'assets/images/easyflair-bar.jpg' );
  }
  if ( strpos( $service_text, 'easytoilets' ) !== false ) {
    return get_theme_file_uri( 'assets/images/easytoilet.png' );
  }
  return get_theme_file_uri( 'assets/images/hero-event.jpg' );
};
?>

<section id="showcase" class="section" style="background:rgba(240,235,248,.3)">
  <div class="container">
    <!-- Header -->
    <div class="section-header animate-on-scroll">
      <span style="display:inline-block;background:rgba(124,92,252,.1);color:var(--secondary);padding:.375rem 1rem;border-radius:var(--radius-full);font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.18em;margin-bottom:.75rem" class="font-heading">
        <?php echo esc_html( $showcase_label ); ?>
      </span>
      <h2 class="section-title"><?php echo esc_html( $showcase_title ); ?></h2>
    </div>

    <!-- Filter tabs -->
    <div class="filter-tabs animate-on-scroll">
      <?php foreach ( $tabs as $index => $tab ) :
        $filter_val = ( $tab === 'Tous' ) ? 'all' : $tab;
      ?>
        <button class="filter-tab<?php echo $index === 0 ? ' filter-tab--active' : ''; ?>" data-filter="<?php echo esc_attr( $filter_val ); ?>">
          <?php echo esc_html( $tab ); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Gallery grid -->
    <div class="showcase-grid">
      <?php $i = 0; foreach ( $events as $e ) : $i++;
        $img_url = '';
        if ( ! empty( $e['image'] ) ) {
          $img_url = is_numeric( $e['image'] ) ? wp_get_attachment_url( $e['image'] ) : $e['image'];
        }
        if ( empty( $img_url ) ) {
          $img_url = $showcase_fallback_image( $e['service'] ?? '' );
        }
      ?>
        <div class="showcase-card animate-on-scroll" data-delay="<?php echo esc_attr( min( $i, 5 ) ); ?>" data-category="<?php echo esc_attr( $e['category'] ); ?>">
          <?php if ( $img_url ) : ?>
            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $e['title'] ); ?>" class="showcase-card__img" loading="lazy">
          <?php endif; ?>
          <div class="showcase-card__overlay"></div>
          <div class="showcase-card__hover"></div>
          <span class="showcase-card__cat"><?php echo esc_html( $e['category'] ); ?></span>
          <div class="showcase-card__text">
            <p class="showcase-card__title"><?php echo esc_html( $e['title'] ); ?></p>
            <p class="showcase-card__service"><?php echo esc_html( $e['service'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- CTA -->
    <div class="text-center">
      <a href="<?php echo esc_url( $showcase_cta_link ); ?>" class="btn btn-outline">
        <?php echo esc_html( $showcase_cta_text ); ?>
        <?php echo easyevents_icon( 'arrow-right', 16 ); ?>
      </a>
    </div>
  </div>
</section>
