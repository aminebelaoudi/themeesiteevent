<?php
/**
 * Section: Services (Bento Grid)
 *
 * @package EasyEvents
 */

$services_raw = easyevents_services();

// Keep a fixed order and always include the 5 core services on homepage.
$service_order = array( 'easyflair', 'easyflash', 'easychallenge', 'easyrelax', 'easytoilets' );
$services = array();
foreach ( $service_order as $slug ) {
  if ( isset( $services_raw[ $slug ] ) ) {
    $services[] = $services_raw[ $slug ];
  }
}

$icons = array(
  'easyflair'     => 'wine',
  'easyflash'     => 'camera',
  'easychallenge' => 'trophy',
  'easyrelax'     => 'coffee',
  'easytoilets'   => 'droplets',
);

$descriptions = array(
  'easyflair'     => 'Barmans jongleurs et cocktails signatures pour vos soirées d\'entreprise, mariages et galas en Suisse romande.',
  'easyflash'     => 'Photobooth 360°, miroir magique et EasyBox pour des souvenirs personnalisés et instantanés.',
  'easychallenge' => 'Défis ludiques, émissions et jeux indoor/outdoor pour renforcer la cohésion de vos équipes.',
  'easyrelax'     => 'Fauteuils massants premium pour offrir détente et bien-être à vos invités lors de vos événements.',
  'easytoilets'   => 'Unités sanitaires mobiles haut de gamme, élégantes pour accueillir vos invités avec soin.',
);

$titles = array(
  'easyflair'     => 'Bars mobiles & Mixologie',
  'easyflash'     => 'Photobooths & Expériences photo',
  'easychallenge' => 'Team Building & Animations',
  'easyrelax'     => 'Fauteuils Massants & Bien-être',
  'easytoilets'   => 'Sanitaires Premium',
);

// Grid classes — first 2 are wide
$grid_classes = array(
  'easyflair'     => 'service-card--wide',
  'easyflash'     => 'service-card--wide',
  'easychallenge' => '',
  'easyrelax'     => '',
  'easytoilets'   => 'service-card--wide',
);

$fallback_images = array(
  'easyflair'     => get_theme_file_uri( 'assets/images/Formule-barman-02.jpg' ),
  'easyflash'     => get_theme_file_uri( 'assets/images/homepage-banner-box.jpg' ),
  'easychallenge' => get_theme_file_uri( 'assets/images/easychallenge-team.jpg' ),
  'easyrelax'     => get_theme_file_uri( 'assets/images/easyrelax hero.png' ),
  'easytoilets'   => get_theme_file_uri( 'assets/images/easytoilets-banner2.jpg' ),
);

$services_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'services_label' ) : '' ) ?: 'Nos services';
$services_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'services_title' ) : '' ) ?: 'Cinq expertises, un seul groupe';
$services_highlight = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'services_highlight' ) : '' ) ?: 'un seul groupe';
$services_desc = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'services_desc' ) : '' ) ?: 'Des spécialistes complémentaires pour couvrir chaque aspect de votre événement.';

$cf_cards = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'services_cards' ) : null;
if ( ! empty( $cf_cards ) && is_array( $cf_cards ) ) {
  foreach ( $cf_cards as $card ) {
    $slug = $card['service_slug'] ?? '';
    if ( ! $slug || ! isset( $titles[ $slug ] ) ) {
      continue;
    }
    if ( ! empty( $card['service_title'] ) ) {
      $titles[ $slug ] = $card['service_title'];
    }
    if ( ! empty( $card['service_desc'] ) ) {
      $descriptions[ $slug ] = $card['service_desc'];
    }
  }
}

$services_title_html = esc_html( $services_title );
if ( ! empty( $services_highlight ) && false !== strpos( $services_title, $services_highlight ) ) {
  $services_title_html = str_replace(
    esc_html( $services_highlight ),
    '<span class="text-gradient-gold">' . esc_html( $services_highlight ) . '</span>',
    esc_html( $services_title )
  );
}
?>

<section id="services" class="section" style="background:rgba(240,235,248,.4);position:relative;overflow:hidden">
  <!-- Ambient glow -->
  <div style="position:absolute;top:0;left:33%;width:600px;height:500px;background:rgba(124,92,252,.06);border-radius:50%;filter:blur(140px);pointer-events:none"></div>

  <div class="container" style="position:relative;z-index:1">
    <!-- Header -->
    <div class="section-header animate-on-scroll">
      <span class="section-label">
        <?php echo esc_html( $services_label ); ?>
      </span>
      <h2 class="section-title"><?php echo wp_kses_post( $services_title_html ); ?></h2>
      <p class="section-desc"><?php echo esc_html( $services_desc ); ?></p>
    </div>

    <!-- Bento grid -->
    <div class="services-grid">
      <?php $i = 0; foreach ( $services as $s ) :
        $slug       = $s['slug'];
        $icon_name  = isset( $icons[ $slug ] ) ? $icons[ $slug ] : 'star';
        $desc       = isset( $descriptions[ $slug ] ) ? $descriptions[ $slug ] : '';
        $title      = isset( $titles[ $slug ] ) ? $titles[ $slug ] : $s['label'];
        $grid       = isset( $grid_classes[ $slug ] ) ? $grid_classes[ $slug ] : '';
        $page       = get_page_by_path( 'services/' . $slug );
        $thumb_url  = $page && has_post_thumbnail( $page ) ? get_the_post_thumbnail_url( $page, 'large' ) : '';
        if ( empty( $thumb_url ) && $page ) {
          $custom_hero = get_post_meta( $page->ID, '_ee_hero_image', true );
          if ( ! empty( $custom_hero ) ) {
            $thumb_url = esc_url_raw( $custom_hero );
          }
        }
        if ( empty( $thumb_url ) && isset( $fallback_images[ $slug ] ) ) {
          $thumb_url = $fallback_images[ $slug ];
        }
        $i++;
      ?>
        <a href="<?php echo esc_url( home_url( '/services/' . $slug . '/' ) ); ?>"
           class="service-card <?php echo esc_attr( $grid ); ?> animate-on-scroll"
           data-delay="<?php echo esc_attr( $i ); ?>">

          <?php if ( $thumb_url ) : ?>
            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="service-card__img" loading="lazy">
          <?php endif; ?>

          <div class="service-card__overlay"></div>
          <div class="service-card__ring"></div>

          <!-- Number watermark -->
          <span class="service-card__number"><?php echo str_pad( $i, 2, '0', STR_PAD_LEFT ); ?></span>

          <!-- Badge -->
          <span class="service-card__badge" style="background:<?php echo esc_attr( $s['color'] ); ?>"><?php echo esc_html( $s['label'] ); ?></span>

          <!-- Arrow on hover -->
          <div class="service-card__arrow">
            <?php echo easyevents_icon( 'arrow-up-right', 16 ); ?>
          </div>

          <!-- Content -->
          <div class="service-card__content">
            <div class="service-card__icon service-icon-bg--<?php echo esc_attr( $slug ); ?>">
              <?php echo easyevents_icon( $icon_name, 18 ); ?>
            </div>
            <h3 class="service-card__title"><?php echo esc_html( $title ); ?></h3>
            <p class="service-card__desc"><?php echo esc_html( $desc ); ?></p>
          </div>

          <!-- Glow -->
          <div class="service-glow--<?php echo esc_attr( $slug ); ?>" style="position:absolute;inset:0;border-radius:inherit;opacity:0;transition:opacity .5s;pointer-events:none"></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
