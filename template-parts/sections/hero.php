<?php
/**
 * Section: Hero
 *
 * @package EasyEvents
 */

// Carbon Fields data (with sensible defaults) — safe if plugin not active
$hero_image    = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_image' ) : '';
$hero_badge    = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_badge' ) : '' ) ?: 'Genève · Suisse romande';
$hero_title    = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_title' ) : '' ) ?: 'EasyEvents, Une offre complète pour des expériences inoubliables !';
$hero_hl       = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_highlight' ) : '' ) ?: 'événementiel';
$hero_subtitle = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_subtitle' ) : '' ) ?: 'Groupe composé de cinq sociétés complémentaires, collaborant avec des agences événementielles.';
$hero_cta      = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_cta_text' ) : '' ) ?: 'Découvrir nos services';
$hero_cta_url  = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'hero_cta_link' ) : '' ) ?: '#services';

// Highlight word replacement
$title_html = str_replace(
  $hero_hl,
  '<span class="text-gradient-festive">' . esc_html( $hero_hl ) . '</span>',
  esc_html( $hero_title )
);

$image_url = $hero_image ? wp_get_attachment_url( $hero_image ) : get_theme_file_uri( 'assets/images/hero-event.jpg' );
$services  = easyevents_services();
?>

<section class="hero">
  <!-- Background image -->
  <div class="hero__bg">
    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $hero_badge ); ?>" class="hero__img" loading="eager">
    <div class="hero__overlay-1"></div>
    <div class="hero__overlay-2"></div>
    <div class="hero__overlay-3"></div>
  </div>

  <div class="container hero__content">
    <!-- Badge -->
    <div class="hero__badge">
      <span class="hero__badge-dot"></span>
      <span><?php echo esc_html( $hero_badge ); ?></span>
    </div>

    <div style="max-width:42rem">
      <!-- Title -->
      <h1 class="hero__title"><?php echo wp_kses_post( $title_html ); ?></h1>

      <!-- Subtitle -->
      <p class="hero__desc"><?php echo esc_html( $hero_subtitle ); ?></p>

      <!-- CTA -->
      <div class="hero__actions">
        <a href="<?php echo esc_url( $hero_cta_url ); ?>" class="btn btn-hero">
          <?php echo esc_html( $hero_cta ); ?>
        </a>
      </div>

      <!-- Service dots -->
      <div class="hero__services">
        <?php foreach ( $services as $s ) : ?>
          <span class="hero__service-dot">
            <span style="background:<?php echo esc_attr( $s['color'] ); ?>"></span>
            <?php echo esc_html( $s['label'] ); ?>
          </span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
