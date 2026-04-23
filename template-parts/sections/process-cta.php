<?php
/**
 * Section: Process + CTA
 *
 * @package EasyEvents
 */

$steps = array(
  array(
    'icon'  => 'message-square',
    'label' => 'Vous nous parlez de votre événement',
    'slug'  => 'easyflash',
  ),
  array(
    'icon'  => 'puzzle',
    'label' => 'Nous assemblons les services adaptés',
    'slug'  => 'easychallenge',
  ),
  array(
    'icon'  => 'party-popper',
    'label' => 'Nous coordonnons la prestation le jour J',
    'slug'  => 'easyrelax',
  ),
);

$service_colors = array(
  'easyflash'     => '#7c5cfc',
  'easychallenge' => '#e87c1a',
  'easyrelax'     => '#5a7f50',
);
?>

<section id="cta-final" class="section">
  <div class="container">
    <!-- Process header -->
    <div class="section-header animate-on-scroll">
      <span class="section-label" style="color:var(--secondary)">Comment ça marche</span>
      <h2 class="section-title">En 3 étapes simples</h2>
    </div>

    <!-- Steps -->
    <div class="process-grid">
      <?php $i = 0; foreach ( $steps as $s ) : $i++;
        $color = isset( $service_colors[ $s['slug'] ] ) ? $service_colors[ $s['slug'] ] : '#7c5cfc';
      ?>
        <div class="process-step animate-on-scroll" data-delay="<?php echo esc_attr( $i ); ?>">
          <div class="process-step__icon service-icon-bg--<?php echo esc_attr( $s['slug'] ); ?>">
            <?php echo easyevents_icon( $s['icon'], 28 ); ?>
            <span class="process-step__num" style="background:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $i ); ?></span>
          </div>
          <p class="font-heading" style="font-weight:600;font-size:.875rem;color:var(--foreground)">
            <?php echo esc_html( $s['label'] ); ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- CTA block -->
    <div class="cta-block animate-on-scroll">
      <div class="cta-block__dots"></div>
      <h2 class="font-heading" style="position:relative;font-size:clamp(1.75rem,4vw,2.5rem);font-weight:800;color:#fff;margin-bottom:1rem;letter-spacing:-.02em">
        Parlons de votre prochain événement
      </h2>
      <p style="position:relative;color:rgba(255,255,255,.7);font-size:1.125rem;margin-bottom:2rem;max-width:36rem;margin-left:auto;margin-right:auto;line-height:1.7">
        Que vous soyez agence ou entreprise, nous créons des expériences sur mesure en Suisse romande.
      </p>
      <div style="position:relative">
        <a href="#services" class="btn btn-hero-outline">Découvrir nos services</a>
      </div>
    </div>
  </div>
</section>
