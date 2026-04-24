<?php
/**
 * EasyRelax — Full service page (100% React fidelity)
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$C = array(
  'dark'   => '#1b2a1e',
  'darker' => '#131f15',
  'mid'    => '#2a3d2d',
  'olive'  => '#6b7c5b',
  'green'  => '#5a7f50',
  'greenL' => '#8baa6e',
  'cream'  => '#f5f2ec',
  'beige'  => '#ede8df',
);

$keywords = array( 'Relaxation', 'Rejuvenation', 'Wellness', 'Harmony', 'Revitalization' );

$galleryImages = array(
  get_theme_file_uri( 'assets/images/easyrelax-home-2-1024x1014.jpg' ),
  get_theme_file_uri( 'assets/images/easyrelax-home-3-1019x1024.jpg' ),
  get_theme_file_uri( 'assets/images/easyrelax-home-4-1024x1004.jpg' ),
  get_theme_file_uri( 'assets/images/easyrelax-home-6-1024x1021.jpg' ),
  get_theme_file_uri( 'assets/images/blackbox-easyrelax.jpg' ),
);

$formulas = array(
  array( 'id' => 'relax-corner', 'name' => 'Formule Relax Corner', 'desc' => 'Un espace bien-être discret et efficace, parfait pour les séminaires et événements d\'entreprise.', 'includes' => array('2 à 4 fauteuils massants premium','Installation &amp; configuration incluses','Technicien EasyRelax sur place','Durée flexible (demi-journée ou journée complète)') ),
  array( 'id' => 'relax-lounge', 'name' => 'Formule Relax Lounge', 'desc' => 'Un véritable espace lounge bien-être pensé pour transformer vos événements corporate en expériences sensorielles.', 'includes' => array('4 à 8 fauteuils massants premium','Aménagement scénographique inclus','Décoration végétale &amp; ambiance sonore','Hôtesse dédiée (option disponible)','Durée flexible') ),
  array( 'id' => 'option-hotesse', 'name' => 'Option Hôtesse', 'desc' => 'Ajoutez une dimension humaine avec nos hôtesses formées à l\'accueil wellness.', 'includes' => array('1 ou 2 hôtesses formées wellness','Accueil &amp; guidage des participants','Gestion du temps de massage','Tenue professionnelle assortie') ),
  array( 'id' => 'installation', 'name' => 'Installation clé en main', 'desc' => 'Notre équipe prend en charge l\'intégralité de la logistique : livraison, installation et récupération.', 'includes' => array('Livraison &amp; transport inclus','Installation &amp; mise en service sur place','Récupération &amp; démontage inclus','Responsable technique dédié') ),
  array( 'id' => 'devis-en-ligne', 'name' => 'Devis en ligne immédiat', 'desc' => 'Obtenez une estimation personnalisée en moins de 2 minutes via notre formulaire en ligne.', 'includes' => array('Formulaire simple &amp; rapide','Réponse sous 24h garantie','Offre personnalisée','Sans engagement') ),
);

$testimonials = array(
  array( 'text' => 'Une vraie parenthèse de détente pendant notre séminaire. Les collaborateurs ont adoré et l\'organisation était parfaite.', 'author' => 'Séminaire', 'company' => 'Claire D.' ),
  array( 'text' => 'Service premium, installation rapide et expérience relaxante de grande qualité. Nous referons appel à EasyRelax.', 'author' => 'Événement corporate', 'company' => 'Nicolas R.' ),
  array( 'text' => 'Les fauteuils massants ont apporté une vraie valeur ajoutée à notre salon professionnel. Très apprécié des visiteurs.', 'author' => 'Salon', 'company' => 'Sophie M.' ),
);
$testimonials = ee_get_testimonials( $post_id, $testimonials );

$faqItems = array(
  array( 'q' => "Qu'est-ce qu'EasyRelax ?", 'a' => "EasyRelax est un service de location de fauteuils massants premium pour vos événements professionnels et corporate. Nous livrons, installons et gérons l'espace bien-être directement sur votre lieu d'événement, dans toute la Suisse." ),
  array( 'q' => "EasyRelax est-il adapté aux événements d'entreprise ?", 'a' => "Absolument. EasyRelax est spécialement conçu pour les séminaires, lancements de produits, journées d'entreprise, salons professionnels et événements corporate." ),
  array( 'q' => "Combien de temps dure une session de massage ?", 'a' => "Les sessions sont flexibles : de 10 à 20 minutes selon votre configuration. Notre équipe gère le planning pour que tous vos invités en profitent." ),
  array( 'q' => "Dans quelle zone intervenez-vous ?", 'a' => "Nous couvrons toute la Suisse. Nous sommes très présents à Genève et en Suisse romande, et nous intervenons également dans le reste de la Suisse ainsi qu'à la frontière française." ),
  array( 'q' => "Comment se déroule la réservation ?", 'a' => "Remplissez notre formulaire en ligne. Nous revenons sous 24h avec une offre personnalisée et un acompte de 30% pour confirmer." ),
);

$faqItems     = ee_get_faq( $post_id, $faqItems );

$icons_map = array( 'easyflair' => 'wine', 'easyflash' => 'camera', 'easychallenge' => 'trophy', 'easyrelax' => 'coffee', 'easytoilets' => 'droplets' );

/* ── Carbon Fields overrides ──────────────────── */
if ( function_exists( 'carbon_get_post_meta' ) ) {
	$_cf = carbon_get_post_meta( $post_id, 'er_gallery' );
	if ( ! empty( $_cf ) ) { $galleryImages = array(); foreach ( $_cf as $_r ) { $url = ee_cf_image( $_r['gallery_image'] ?? 0 ); if ( $url ) $galleryImages[] = $url; } }

	$_cf = carbon_get_post_meta( $post_id, 'er_formulas' );
	if ( ! empty( $_cf ) ) { $formulas = array(); foreach ( $_cf as $_i => $_r ) { $formulas[] = array( 'id' => sanitize_title( $_r['formula_name'] ?? 'formula-' . $_i ), 'name' => $_r['formula_name'] ?? '', 'desc' => $_r['formula_desc'] ?? '', 'includes' => ee_lines_to_array( $_r['formula_includes'] ?? '' ) ); } }

	$_kw = carbon_get_post_meta( $post_id, 'er_keywords' );
	if ( ! empty( $_kw ) ) { $keywords = array_map( 'trim', explode( ',', $_kw ) ); }
}
?>

<?php if ( ee_show_section( $post_id, 'hero' ) ) : ?>
<!-- ━━━━ HERO ━━━━ -->
<section class="service-hero service-hero--parallax" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
  <div class="service-hero__bg">
    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/easyrelax hero.png' ) ); ?>" alt="EasyRelax — Bien-être événementiel" class="service-hero__img" loading="eager">
    <div class="service-hero__overlay-1" style="background:linear-gradient(150deg,<?php echo esc_attr( $C['dark'] ); ?>ee 0%,<?php echo esc_attr( $C['dark'] ); ?>c8 48%,<?php echo esc_attr( $C['green'] ); ?>28 100%)"></div>
    <div class="service-hero__overlay-2" style="background:radial-gradient(ellipse at 75% 25%,<?php echo esc_attr( $C['greenL'] ); ?>1a 0%,transparent 60%)"></div>
    <div class="service-hero__overlay-3" style="background:linear-gradient(to top,<?php echo esc_attr( $C['dark'] ); ?>aa 0%,transparent 55%)"></div>
  </div>
  <div class="container service-hero__content">
    <nav class="service-hero__breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Accueil</a><span>›</span><span>Services</span><span>›</span><span class="current">EasyRelax</span></nav>
    <div class="service-hero__pill" style="border-color:<?php echo esc_attr( $C['green'] ); ?>35"><?php echo easyevents_icon( 'leaf', 13 ); ?><span><?php echo esc_html( ee_get( $post_id, 'hero_badge', 'EasyRelax · Bien-être événementiel' ) ); ?></span></div>
    <div style="max-width:42rem">
      <?php $custom_title = ee_get( $post_id, 'hero_title', '' ); ?>
      <?php if ( $custom_title ) : ?>
        <h1 class="hero__title"><?php echo esc_html( $custom_title ); ?></h1>
      <?php else : ?>
        <h1 class="hero__title">La Pause <span style="color:<?php echo esc_attr( $C['greenL'] ); ?>">Bien-Être</span> pour vos Événements</h1>
      <?php endif; ?>
      <p class="hero__desc"><?php echo esc_html( ee_get( $post_id, 'hero_subtitle', 'Nos fauteuils massants offrent une expérience de relaxation inoubliable lors de vos séminaires, salons ou événements corporate dans toute la Suisse.' ) ); ?></p>
      <div class="hero__actions">
        <a href="https://invoice.easyrelax.ch/?utm_source=EasyEvents" class="btn btn-hero" style="background:<?php echo esc_attr( $C['green'] ); ?>"><?php echo esc_html( ee_get( $post_id, 'hero_cta_1', 'Simuler une offre' ) ); ?></a>
        <a href="#formules" class="btn btn-hero-outline"><?php echo esc_html( ee_get( $post_id, 'hero_cta_2', 'Voir les formules' ) ); ?> <?php echo easyevents_icon( 'arrow-right', 16 ); ?></a>
      </div>
    </div>
    <div class="stats-grid">
      <?php
      $default_stats = array(
        array( 'value' => '98%', 'label' => 'Clients satisfaits' ),
        array( 'value' => '500+', 'label' => 'Événements couverts' ),
        array( 'value' => 'Clé en main', 'label' => 'Installation incluse' ),
        array( 'value' => '24h', 'label' => 'Réponse garantie' ),
      );
      foreach ( ee_get_stats( $post_id, $default_stats ) as $s ) : ?>
        <div class="stat-card"><p class="stat-card__value" style="color:<?php echo esc_attr( $C['greenL'] ); ?>"><?php echo esc_html( $s['value'] ); ?></p><p class="stat-card__label"><?php echo esc_html( $s['label'] ); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'gallery' ) ) : ?>
<!-- ━━━━ GALLERY ━━━━ -->
<section class="gallery-section" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
  <div class="gallery-fade gallery-fade--top" style="background:linear-gradient(to bottom,<?php echo esc_attr( $C['dark'] ); ?>,transparent)"></div>
  <div class="gallery-fade gallery-fade--bottom" style="background:linear-gradient(to top,<?php echo esc_attr( $C['dark'] ); ?>,transparent)"></div>
  <div class="gallery-track">
    <?php foreach ( $galleryImages as $gi => $gimg ) : ?>
      <div class="gallery-item"><img src="<?php echo esc_url( $gimg ); ?>" alt="EasyRelax fauteuil <?php echo $gi + 1; ?>" loading="lazy"></div>
    <?php endforeach; ?>
  </div>
  <p class="gallery-hint">← glissez pour naviguer →</p>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'intro' ) ) : ?>
<!-- ━━━━ VOTRE MOMENT DE DÉTENTE ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="two-col-layout">
      <!-- Text -->
      <div class="animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['olive'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['olive'] ); ?>"></span>Une pause bien-être</span>
        <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:left">VOTRE MOMENT<br><span class="italic" style="color:<?php echo esc_attr( $C['green'] ); ?>;font-weight:400">DE DÉTENTE</span></h2>
        <div class="intro-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>99">
          <p>Offrez à vos équipes une expérience unique de relaxation. Avec nos fauteuils massants haut de gamme, chaque pause devient un instant de bien-être qui favorise l'énergie, la motivation et la performance.</p>
          <p>Que ce soit pour un séminaire, un salon ou une journée au bureau, EasyRelax s'installe <strong style="color:<?php echo esc_attr( $C['dark'] ); ?>">clé en main</strong> pour transformer vos pauses en véritables moments de sérénité.</p>
        </div>
        <a href="#formules" class="btn btn-service" style="background:<?php echo esc_attr( $C['green'] ); ?>">Voir les tarifs <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
      </div>
      <!-- Image + floating elements -->
      <div class="animate-on-scroll" style="position:relative">
        <div class="intro-image intro-image--rounded intro-image--parallax"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/easyrelax  (1).png' ) ); ?>" alt="Espace détente EasyRelax"></div>
        <!-- Floating testimonial -->
        <div class="floating-testimonial" style="background:rgba(255,255,255,.92);border-color:<?php echo esc_attr( $C['olive'] ); ?>15">
          <div class="testimonial-stars"><?php for($j=0;$j<5;$j++) echo easyevents_icon('star',11); ?></div>
          <p class="testimonial-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">"Une prestation impeccable. Nos équipes ont beaucoup apprécié ce moment de détente, une vraie valeur ajoutée."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar" style="background:<?php echo esc_attr( $C['green'] ); ?>">CD</div>
            <div><p class="testimonial-name" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Claire Dubois</p><p class="testimonial-role" style="color:<?php echo esc_attr( $C['olive'] ); ?>">Directrice Communication</p></div>
          </div>
        </div>
        <!-- Badge -->
        <div class="floating-badge" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
          <span style="color:<?php echo esc_attr( $C['greenL'] ); ?>">98%</span><span>satisfaits</span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'marquee' ) ) : ?>
<!-- ━━━━ MARQUEE ━━━━ -->
<div class="marquee" style="background:<?php echo esc_attr( $C['beige'] ); ?>;border-color:<?php echo esc_attr( $C['olive'] ); ?>18">
  <div class="marquee__track">
    <?php foreach ( array_merge( $keywords, $keywords, $keywords, $keywords ) as $w ) : ?>
      <span class="marquee__word"><span style="color:<?php echo esc_attr( $C['green'] ); ?>">✦</span><?php echo esc_html( $w ); ?></span>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'immersive' ) ) : ?>
<!-- ━━━━ DÉCOUVREZ LA PAUSE BIEN-ÊTRE (Immersive) ━━━━ -->
<section class="immersive-section" style="background:linear-gradient(135deg,<?php echo esc_attr( $C['dark'] ); ?> 0%,<?php echo esc_attr( $C['mid'] ); ?> 50%,<?php echo esc_attr( $C['green'] ); ?> 100%)">
  <div class="immersive-section__overlay" style="background:radial-gradient(ellipse at 30% 60%,<?php echo esc_attr( $C['green'] ); ?>30 0%,transparent 60%)"></div>
  <div class="container" style="position:relative;z-index:2">
    <div class="two-col-layout">
      <div class="animate-on-scroll">
        <p class="svc-label" style="color:rgba(255,255,255,.5)">The Wellness Break</p>
        <h2 style="color:#fff;font-size:3rem;font-weight:800;letter-spacing:-.02em">EASYRELAX</h2>
        <p style="color:<?php echo esc_attr( $C['greenL'] ); ?>;font-size:.875rem;letter-spacing:.2em;text-transform:uppercase;margin-bottom:2rem">Relax. Recharge. Perform.</p>
        <h3 style="color:#fff;font-size:1.5rem;font-weight:700;margin-bottom:1.5rem">Découvrez la Pause<br><span class="italic" style="color:<?php echo esc_attr( $C['greenL'] ); ?>;font-weight:400">Bien-Être</span></h3>
        <p style="color:rgba(255,255,255,.55);font-size:.9375rem;line-height:1.7;max-width:30rem;margin-bottom:2.5rem">Transformez vos événements et vos journées au bureau en véritables instants de détente. Nos fauteuils massants premium offrent à vos collaborateurs une expérience unique pour se ressourcer.</p>
        <a href="#formules" class="btn btn-service" style="background:<?php echo esc_attr( $C['green'] ); ?>">Voir les formules <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
      </div>
      <div class="immersive-images animate-on-scroll">
        <div class="immersive-img immersive-img--float-1"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/relax-chaise.png' ) ); ?>" alt="Fauteuil massant"></div>
        <div class="immersive-img immersive-img--float-2"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/massage-chair-corporate-wellness-relaxation.png' ) ); ?>" alt="EasyRelax setup"></div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'formulas' ) ) : ?>
<!-- ━━━━ FORMULAS ACCORDION ━━━━ -->
<section id="formules" class="svc-section" style="background:<?php echo esc_attr( $C['beige'] ); ?>">
  <div class="container">
    <div class="two-col-layout two-col-layout--sticky">
      <!-- Devis card (sticky) -->
      <div class="devis-card animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
        <div class="devis-card__glow" style="background:radial-gradient(circle,<?php echo esc_attr( $C['green'] ); ?>20,transparent 70%)"></div>
        <span class="svc-label" style="color:<?php echo esc_attr( $C['greenL'] ); ?>">Devis en ligne</span>
        <h3 style="color:#fff">OBTENEZ VOTRE DEVIS EN LIGNE</h3>
        <p style="color:rgba(255,255,255,.5)">Calculez en quelques clics le coût de votre espace bien-être EasyRelax. Choisissez votre formule et recevez immédiatement votre devis personnalisé.</p>
        <a href="https://invoice.easyrelax.ch/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['green'] ); ?>">Faire mon devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
      </div>

      <!-- Accordion -->
      <div>
        <div class="animate-on-scroll">
          <h2 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-size:1.875rem;font-weight:800;margin-bottom:.25rem">Notre Approche du Bien-Être</h2>
          <h2 style="color:<?php echo esc_attr( $C['green'] ); ?>;font-size:1.875rem;font-weight:400;font-style:italic;margin-bottom:2.5rem">en Entreprise</h2>
        </div>
        <div class="formula-accordion animate-on-scroll">
          <?php foreach ( $formulas as $f ) : ?>
            <div class="faq-item faq-item--formula" style="border-color:<?php echo esc_attr( $C['olive'] ); ?>15">
              <button class="faq-trigger" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><span><?php echo esc_html( $f['name'] ); ?></span><span class="faq-chevron"><?php echo easyevents_icon( 'chevron-right', 16 ); ?></span></button>
              <div class="faq-content" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">
                <p><?php echo esc_html( $f['desc'] ); ?></p>
                <ul class="formula-includes">
                  <?php foreach ( $f['includes'] as $item ) : ?>
                    <li><?php echo easyevents_icon( 'check', 14 ); ?><?php echo wp_kses_post( $item ); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'testimonials' ) ) : ?>
<!-- ━━━━ TESTIMONIALS ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['beige'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['green'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['green'] ); ?>"></span>Témoignages<span class="svc-label__line" style="background:<?php echo esc_attr( $C['green'] ); ?>"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Avis <span class="italic" style="color:<?php echo esc_attr( $C['green'] ); ?>">clients</span></h2>
    </div>
    <div class="testimonials-grid animate-on-scroll">
      <?php foreach ( $testimonials as $t ) : ?>
        <div class="testimonial-card" style="border-color:<?php echo esc_attr( $C['olive'] ); ?>10">
          <div class="testimonial-stars"><?php for ( $j = 0; $j < 5; $j++ ) echo easyevents_icon( 'star', 12 ); ?></div>
          <p class="testimonial-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">"<?php echo wp_kses_post( $t['text'] ); ?>"</p>
          <div class="testimonial-author" style="border-color:<?php echo esc_attr( $C['olive'] ); ?>12">
            <div class="testimonial-avatar" style="background:<?php echo esc_attr( $C['green'] ); ?>"><?php echo esc_html( substr( $t['company'], 0, 1 ) ); ?></div>
            <div><p class="testimonial-name" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo esc_html( $t['author'] ); ?></p><p class="testimonial-role" style="color:<?php echo esc_attr( $C['olive'] ); ?>"><?php echo wp_kses_post( $t['company'] ); ?></p></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'brand' ) ) : ?>
<!-- ━━━━ BRAND BLOCK ━━━━ -->
<section id="devis" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="brand-block animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
      <div class="brand-block__dots"></div>
      <div class="brand-block__glow" style="background:radial-gradient(ellipse at 80% 40%,<?php echo esc_attr( $C['green'] ); ?>14,transparent 60%)"></div>
      <div class="brand-block__inner brand-block__inner--2col">
        <div class="brand-block__text">
          <span class="svc-label" style="color:<?php echo esc_attr( $C['greenL'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['greenL'] ); ?>40"></span>Boostez le bien-être en entreprise</span>
          <h2 style="color:#fff">Easy<span class="italic" style="color:<?php echo esc_attr( $C['greenL'] ); ?>">Relax</span></h2>
          <p style="color:rgba(255,255,255,.5)">Une solution simple et efficace pour intégrer la détente dans vos événements et vos bureaux. Nos fauteuils massants premium offrent à vos collaborateurs une pause qui recharge l'énergie, stimule la motivation et améliore la productivité.</p>
          <div class="brand-tags">
            <?php foreach ( array( 'Clé en main', 'Premium', 'Flexible', 'Suisse' ) as $tag ) : ?>
              <span style="color:<?php echo esc_attr( $C['greenL'] ); ?>;border-color:<?php echo esc_attr( $C['greenL'] ); ?>25;background:<?php echo esc_attr( $C['greenL'] ); ?>08"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
          <a href="#formules" class="btn btn-service" style="background:<?php echo esc_attr( $C['green'] ); ?>">Découvrir les formules <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>
        <div class="brand-block__images brand-block__images--mosaic">
          <div class="brand-block__img-wrap brand-block__img-wrap--float-a"><img src="<?php echo esc_url( $img['easyrelax-11'] ); ?>" alt="Fauteuil massant" loading="lazy"></div>
          <div class="brand-block__img-wrap brand-block__img-wrap--float-b"><img src="<?php echo esc_url( $img['easyrelax-12'] ); ?>" alt="EasyRelax setup" loading="lazy"></div>
          <div class="brand-block__img-wrap brand-block__img-wrap--float-c"><img src="<?php echo esc_url( $img['easyrelax-13'] ); ?>" alt="Massage événement" loading="lazy"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'crosssell' ) ) : ?>
<!-- ━━━━ CROSS-SELL ━━━━ -->
<section class="svc-section svc-section--dark" style="background:<?php echo esc_attr( $C['darker'] ); ?>">
  <div class="container">
    <div class="crosssell-header animate-on-scroll">
      <div><span class="svc-label" style="color:<?php echo esc_attr( $C['greenL'] ); ?>">EasyEvents Group</span><h2 style="color:#fff">Découvrez nos <span style="color:<?php echo esc_attr( $C['greenL'] ); ?>">autres expertises</span></h2></div>
      <a href="<?php echo esc_url( home_url('/') ); ?>" style="color:<?php echo esc_attr( $C['greenL'] ); ?>">Tous les services <?php echo easyevents_icon('arrow-right',14); ?></a>
    </div>
    <div class="crosssell-grid animate-on-scroll">
      <?php foreach ( $others as $other ) :
        $op = get_page_by_path('services/'.$other['slug']);
        $ot = $op && has_post_thumbnail($op) ? get_the_post_thumbnail_url($op,'medium_large') : ( isset( $img[ $other['slug'] ] ) ? $img[ $other['slug'] ] : '' );
        if ( 'easyrelax' === $other['slug'] ) {
          $ot = get_theme_file_uri( 'assets/images/easyrelax hero.png' );
        } elseif ( 'easyflair' === $other['slug'] ) {
          $ot = get_theme_file_uri( 'assets/images/Formule-barman-02.jpg' );
        } elseif ( 'easytoilets' === $other['slug'] ) {
          $ot = get_theme_file_uri( 'assets/images/easytoilets-banner2.jpg' );
        }
        $oi = isset($icons_map[$other['slug']]) ? $icons_map[$other['slug']] : 'star';
      ?>
        <a href="<?php echo esc_url( home_url('/services/'.$other['slug'].'/') ); ?>" class="crosssell-card">
          <?php if ($ot) : ?><img src="<?php echo esc_url($ot); ?>" alt="<?php echo esc_attr($other['label']); ?>" class="crosssell-card__img" loading="lazy"><?php endif; ?>
          <div class="crosssell-card__overlay"></div>
          <div class="crosssell-card__content"><div class="crosssell-card__icon"><?php echo easyevents_icon($oi,15); ?></div><h3><?php echo esc_html($other['label']); ?></h3><p><?php echo esc_html($other['tagline']); ?></p></div>
          <div class="crosssell-card__arrow"><?php echo easyevents_icon('arrow-right',12); ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'faq' ) ) : ?>
<!-- ━━━━ FAQ ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-sidebar animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['olive'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['olive'] ); ?>60"></span>FAQ</span>
        <h2 style="color:<?php echo esc_attr( $C['dark'] ); ?>">Questions <span style="color:<?php echo esc_attr( $C['green'] ); ?>">fréquentes</span></h2>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88">Tout ce que vous devez savoir sur EasyRelax avant de réserver votre prestation bien-être.</p>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;font-size:.875rem">Une question spécifique ? Contactez-nous directement.</p>
        <a href="tel:<?php echo esc_attr( str_replace(' ', '', ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ) ); ?>" class="faq-phone-btn" style="background:<?php echo esc_attr( $C['dark'] ); ?>;color:<?php echo esc_attr( $C['cream'] ); ?>"><?php echo easyevents_icon('phone',14); ?> <?php echo esc_html( ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ); ?></a>
      </div>
      <div class="faq-items animate-on-scroll">
        <?php foreach ( $faqItems as $item ) : ?>
          <div class="faq-item" style="border-color:<?php echo esc_attr( $C['olive'] ); ?>12">
            <button class="faq-trigger" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><span><?php echo esc_html( $item['q'] ); ?></span><span class="faq-chevron"><?php echo easyevents_icon('chevron-right',16); ?></span></button>
            <div class="faq-content" style="color:<?php echo esc_attr( $C['dark'] ); ?>88"><p><?php echo esc_html( $item['a'] ); ?></p></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'contact' ) ) : ?>
<?php get_template_part( 'template-parts/sections/contact' ); ?>
<?php endif; ?>
