<?php
/**
 * Template Name: Service Page
 *
 * Service detail page template.
 * Dispatches to per-service template parts for 100% fidelity with React.
 *
 * @package EasyEvents
 */

get_header();

$slug     = get_post_field( 'post_name', get_the_ID() );
$services = easyevents_services();
$current  = null;
foreach ( $services as $s ) {
  if ( $s['slug'] === $slug ) {
    $current = $s;
    break;
  }
}

if ( ! $current ) {
  $current = array(
    'slug'    => $slug,
    'label'   => get_the_title(),
    'tagline' => '',
    'icon'    => 'star',
    'color'   => '#7c5cfc',
  );
}

// Other services for cross-sell
$others = array_filter( $services, function( $s ) use ( $slug ) {
  return $s['slug'] !== $slug;
} );

// Thumbnail
$thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
$post_id   = get_the_ID();
$hero_custom_image = ee_get( $post_id, 'hero_image', '' );

if ( ! empty( $hero_custom_image ) ) {
  $thumb_url = esc_url_raw( $hero_custom_image );
}

// Default hero images per service (used as fallback if no featured image set)
$service_hero_images = array(
  'easyflair'      => get_theme_file_uri( 'assets/images/easyflair-bar.jpg' ),
  'easyflash'      => get_theme_file_uri( 'assets/images/homepage-banner-box.jpg' ),
  'easychallenge'  => get_theme_file_uri( 'assets/images/easychallenge-team.jpg' ),
  'easyrelax'      => get_theme_file_uri( 'assets/images/easyrelax hero.png' ),
  'easytoilets'    => get_theme_file_uri( 'assets/images/easytoilet.png' ),
);
if ( ! $thumb_url && isset( $service_hero_images[ $slug ] ) ) {
  $thumb_url = $service_hero_images[ $slug ];
}

// Common images map — available to all service templates
$img = array(
  'hero'             => get_theme_file_uri( 'assets/images/hero-event.jpg' ),
  'easyflair'        => get_theme_file_uri( 'assets/images/easyflair-bar.jpg' ),
  'easyflash'        => get_theme_file_uri( 'assets/images/homepage-banner-box.jpg' ),
  'easychallenge'    => get_theme_file_uri( 'assets/images/easychallenge-team.jpg' ),
  'easytoilets'      => get_theme_file_uri( 'assets/images/easytoilet.png' ),
  'easyrelax'        => get_theme_file_uri( 'assets/images/easyrelax hero.png' ),
  'blackbox'         => get_theme_file_uri( 'assets/images/blackbox.jpg' ),
  'wood'             => get_theme_file_uri( 'assets/images/wood.jpg' ),
  'easyrelax-1'      => get_theme_file_uri( 'assets/images/easyrelax  (1).png' ),
  'easyrelax-2'      => get_theme_file_uri( 'assets/images/easyrelax-home-3-1019x1024.jpg' ),
  'easyrelax-3'      => get_theme_file_uri( 'assets/images/easyrelax-home-4-1024x1004.jpg' ),
  'easyrelax-4'      => get_theme_file_uri( 'assets/images/easyrelax-home-6-1024x1021.jpg' ),
  'easyrelax-11'     => get_theme_file_uri( 'assets/images/easyrelax-11-1024x1006.jpg' ),
  'easyrelax-12'     => get_theme_file_uri( 'assets/images/easyrelax-12-1014x1024.jpg' ),
  'easyrelax-13'     => get_theme_file_uri( 'assets/images/easyrelax-13-1018x1024.jpg' ),
  'easychallenge-brand-b' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Duel-du-rire-2.jpg',
  'easychallenge-brand-c' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/SlideBall.jpg',
);

$img_overrides = get_post_meta( $post_id, '_ee_section_images', true );
if ( is_array( $img_overrides ) ) {
  foreach ( $img_overrides as $key => $url ) {
    if ( isset( $img[ $key ] ) && ! empty( $url ) ) {
      $img[ $key ] = esc_url_raw( $url );
    }
  }
}
?>

<main id="main" class="site-main">
  <?php
  // Dispatch to per-service template part
  $template_file = locate_template( 'template-parts/services/' . $slug . '.php' );
  if ( $template_file ) {
    include $template_file;
  } else {
    // Fallback for unknown services
    echo '<section class="section"><div class="container"><h1>' . esc_html( $current['label'] ) . '</h1>';
    if ( have_posts() ) { while ( have_posts() ) { the_post(); the_content(); } }
    echo '</div></section>';
  }
  ?>
</main>

<?php
get_footer();
