<?php
/**
 * Section: Why Us
 *
 * @package EasyEvents
 */

$reasons = array(
  array(
    'icon'    => 'map-pin',
    'text'    => 'Basés à Genève, actifs partout en Suisse romande',
    'slug'    => 'easyflash',
  ),
  array(
    'icon'    => 'clock',
    'text'    => 'Plus de 10 ans d\'expérience événementielle',
    'slug'    => 'easyflair',
  ),
  array(
    'icon'    => 'users',
    'text'    => 'Un groupe de spécialistes, un interlocuteur unique',
    'slug'    => 'easychallenge',
  ),
  array(
    'icon'    => 'sparkles',
    'text'    => 'Solutions sur mesure pour chaque événement',
    'slug'    => 'easyrelax',
  ),
);

$why_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'whyus_label' ) : '' ) ?: 'Pourquoi nous ?';
$why_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'whyus_title' ) : '' ) ?: 'Pourquoi choisir EasyEvents Group ?';
$why_highlight = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'whyus_highlight' ) : '' ) ?: 'EasyEvents Group';

$cf_reasons = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'whyus_items' ) : null;
if ( ! empty( $cf_reasons ) && is_array( $cf_reasons ) ) {
  $reasons = array();
  foreach ( $cf_reasons as $row ) {
    $reasons[] = array(
      'icon' => $row['whyus_icon'] ?? 'sparkles',
      'text' => $row['whyus_text'] ?? '',
      'slug' => $row['whyus_slug'] ?? 'easyflash',
    );
  }
}

$why_title_html = esc_html( $why_title );
if ( ! empty( $why_highlight ) && false !== strpos( $why_title, $why_highlight ) ) {
  $why_title_html = str_replace(
    esc_html( $why_highlight ),
    '<span class="text-gradient-festive">' . esc_html( $why_highlight ) . '</span>',
    esc_html( $why_title )
  );
}
?>

<section class="section" style="background:rgba(240,235,248,.5)">
  <div class="container">
    <!-- Header -->
    <div class="section-header animate-on-scroll">
      <span class="section-label" style="color:var(--easyflash)">
        <?php echo esc_html( $why_label ); ?>
      </span>
      <h2 class="section-title"><?php echo wp_kses_post( $why_title_html ); ?></h2>
    </div>

    <!-- Grid -->
    <div class="whyus-grid">
      <?php $i = 0; foreach ( $reasons as $r ) : $i++; ?>
        <div class="whyus-card animate-on-scroll" data-delay="<?php echo esc_attr( $i ); ?>">
          <div class="whyus-card__icon service-icon-bg--<?php echo esc_attr( $r['slug'] ); ?>">
            <?php echo easyevents_icon( $r['icon'], 28 ); ?>
          </div>
          <p class="font-heading font-bold" style="font-size:.875rem;line-height:1.6;color:var(--foreground)">
            <?php echo esc_html( $r['text'] ); ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
