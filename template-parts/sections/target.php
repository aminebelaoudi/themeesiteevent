<?php
/**
 * Section: Target / Pour qui
 *
 * @package EasyEvents
 */

$targets = array(
  array(
    'icon'  => 'briefcase',
    'title' => 'Pour les agences événementielles',
    'desc'  => 'Un partenaire unique pour coordonner bars, photobooths et animations, en marque blanche ou en co-production.',
  ),
  array(
    'icon'  => 'building',
    'title' => 'Pour les entreprises',
    'desc'  => 'Soirées d\'entreprise, séminaires, lancements et team building clés en main en Suisse romande.',
  ),
);
?>

<section id="targets" class="section">
  <div class="container">
    <!-- Header -->
    <div class="section-header animate-on-scroll">
      <span class="section-label" style="color:var(--secondary)">Pour qui ?</span>
      <h2 class="section-title">Des solutions adaptées à vos besoins</h2>
    </div>

    <!-- Grid -->
    <div class="target-grid">
      <?php $i = 0; foreach ( $targets as $t ) : $i++; ?>
        <div class="target-card animate-on-scroll" data-delay="<?php echo esc_attr( $i ); ?>">
          <div class="target-card__icon">
            <?php echo easyevents_icon( $t['icon'], 28 ); ?>
          </div>
          <h3 class="target-card__title"><?php echo esc_html( $t['title'] ); ?></h3>
          <p style="color:var(--muted-foreground);line-height:1.7"><?php echo esc_html( $t['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
