<?php
/**
 * EasyToilets — Full service page (100% React fidelity)
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$C = array(
  'dark'   => '#2a0d12',
  'darker' => '#1e080c',
  'mid'    => '#3d1520',
  'slate'  => '#a0566a',
  'navy'   => '#7a2038',
  'accent' => '#f04158',
  'accentL'=> '#f5718a',
  'cream'  => '#fff5f7',
  'beige'  => '#ffe4e9',
  'white'  => '#ffffff',
);

$features = array(
  array( 'icon' => 'leaf',        'title' => 'Éco-Responsable', 'desc' => 'Toutes nos unités sont équipées de dispositifs permettant de réduire la consommation d\'eau.' ),
  array( 'icon' => 'volume-2',    'title' => 'Luxueuse',        'desc' => 'Cette unité est entièrement équipée avec chauffage, un système audio et plus encore !' ),
  array( 'icon' => 'shield-check','title' => 'Notre promesse',  'desc' => 'Nous garantissons un service supérieur, rapide, convivial, professionnel et qui dépasse vos attentes.' ),
);

$eventTypes = array(
  array( 'icon' => 'party-popper',    'name' => 'Fête' ),
  array( 'icon' => 'heart',           'name' => 'Mariages et cérémonie' ),
  array( 'icon' => 'briefcase',       'name' => 'Événement Corporatif' ),
  array( 'icon' => 'graduation-cap',  'name' => 'Graduation' ),
  array( 'icon' => 'dumbbell',        'name' => 'Événement Sportif' ),
  array( 'icon' => 'megaphone',       'name' => 'Marketing expérientiel' ),
  array( 'icon' => 'film',            'name' => 'Film et tournage' ),
);

$options = array(
  array( 'icon' => 'sparkles',   'title' => 'Décor Extérieur',    'desc' => "L'addition parfaite à votre unité pour impressionner vos invités !", 'tag' => 'Option 01' ),
  array( 'icon' => 'user-check', 'title' => 'Assistant personnel', 'desc' => "Nos assistants personnels s'occuperont de répondre aux attentes de vos invités.", 'tag' => 'Option 02' ),
);

$testimonials = array(
  array( 'text' => 'Sérieux, serviable, réactif jusqu\'à la dernière minute.', 'author' => 'Toilettes mobiles', 'company' => 'Amaude N.' ),
  array( 'text' => 'Décoration autour de la remorque demandée avec notre budget a été parfaite! N\'hésitez pas à prendre EasyToilets pour vos événements.', 'author' => 'Événement privé', 'company' => 'Sarah M.' ),
  array( 'text' => 'Un grand merci pour le service qui fût au top!', 'author' => 'Mariage', 'company' => 'Julie & Thomas' ),
);
$testimonials = ee_get_testimonials( $post_id, $testimonials );

$faqItems = array(
  array( 'q' => 'Comment fonctionnent les unités ?', 'a' => "Nos unités sont entièrement autonomes avec réservoir d'eau intégré, système de chauffage et éclairage. Elles ne nécessitent aucun raccordement et fonctionnent été comme hiver." ),
  array( 'q' => 'Quelle est la capacité des unités ?', 'a' => "Nous proposons différentes tailles d'unités, de 2 à 8 cabines, adaptées à des événements de 50 à plus de 1000 personnes." ),
  array( 'q' => 'Dans quelle zone intervenez-vous ?', 'a' => 'Nous couvrons toute la Suisse. Nous sommes très présents à Genève et en Suisse romande, et nous intervenons également dans le reste de la Suisse ainsi qu\'à la frontière française.' ),
  array( 'q' => "Combien de temps à l'avance faut-il réserver ?", 'a' => 'Nous recommandons de réserver au moins 2 à 4 semaines à l\'avance pour garantir la disponibilité, surtout en haute saison (mai-septembre).' ),
  array( 'q' => "L'installation est-elle incluse ?", 'a' => 'Oui, la livraison, l\'installation et la récupération sont incluses dans nos tarifs. Notre équipe gère tout de A à Z.' ),
);

$faqItems     = ee_get_faq( $post_id, $faqItems );

$icons_map = array( 'easyflair' => 'wine', 'easyflash' => 'camera', 'easychallenge' => 'trophy', 'easyrelax' => 'coffee', 'easytoilets' => 'droplets' );

/* ── Carbon Fields overrides ──────────────────── */
if ( function_exists( 'carbon_get_post_meta' ) ) {
	$_cf = carbon_get_post_meta( $post_id, 'et_features' );
	if ( ! empty( $_cf ) ) { $features = array(); foreach ( $_cf as $_r ) { $features[] = array( 'icon' => $_r['feature_icon'] ?: 'leaf', 'title' => $_r['feature_title'] ?? '', 'desc' => $_r['feature_desc'] ?? '' ); } }

	$_cf = carbon_get_post_meta( $post_id, 'et_event_types' );
	if ( ! empty( $_cf ) ) { $eventTypes = array(); foreach ( $_cf as $_r ) { $eventTypes[] = array( 'icon' => $_r['event_icon'] ?: 'party-popper', 'name' => $_r['event_name'] ?? '' ); } }

	$_cf = carbon_get_post_meta( $post_id, 'et_options' );
	if ( ! empty( $_cf ) ) { $options = array(); foreach ( $_cf as $_r ) { $options[] = array( 'tag' => $_r['option_tag'] ?? '', 'icon' => $_r['option_icon'] ?: 'sparkles', 'title' => $_r['option_title'] ?? '', 'desc' => $_r['option_desc'] ?? '' ); } }

	$_kw = carbon_get_post_meta( $post_id, 'et_keywords' );
	if ( ! empty( $_kw ) ) { $keywords = array_map( 'trim', explode( ',', $_kw ) ); }
}
?>

<?php if ( ee_show_section( $post_id, 'hero' ) ) : ?>
<!-- ━━━━ HERO ━━━━ -->
<section class="service-hero service-hero--parallax" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
  <div class="service-hero__bg">
    <img src="<?php echo esc_url( $thumb_url ? $thumb_url : $img['easytoilets'] ); ?>" alt="EasyToilets — Sanitaires Premium" class="service-hero__img" loading="eager">
    <div class="service-hero__overlay-1" style="background:linear-gradient(150deg,<?php echo esc_attr( $C['dark'] ); ?>ee 0%,<?php echo esc_attr( $C['dark'] ); ?>c8 48%,<?php echo esc_attr( $C['accent'] ); ?>28 100%)"></div>
    <div class="service-hero__overlay-2" style="background:radial-gradient(ellipse at 75% 25%,<?php echo esc_attr( $C['accent'] ); ?>1a 0%,transparent 60%)"></div>
    <div class="service-hero__overlay-3" style="background:linear-gradient(to top,<?php echo esc_attr( $C['dark'] ); ?>aa 0%,transparent 55%)"></div>
  </div>
  <div class="container service-hero__content">
    <nav class="service-hero__breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Accueil</a><span>›</span><span>Services</span><span>›</span><span class="current">EasyToilets</span></nav>
    <div class="service-hero__pill" style="border-color:<?php echo esc_attr( $C['accent'] ); ?>35"><?php echo easyevents_icon( 'droplets', 13 ); ?><span><?php echo esc_html( ee_get( $post_id, 'hero_badge', 'EasyToilets · Sanitaires Premium' ) ); ?></span></div>
    <div style="max-width:42rem">
      <?php $custom_title = ee_get( $post_id, 'hero_title', '' ); ?>
      <?php if ( $custom_title ) : ?>
        <h1 class="hero__title"><?php echo esc_html( $custom_title ); ?></h1>
      <?php else : ?>
        <h1 class="hero__title">Unité Sanitaire <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">Luxueuse</span> sur Remorque</h1>
      <?php endif; ?>
      <p class="hero__desc"><?php echo esc_html( ee_get( $post_id, 'hero_subtitle', 'Des installations sanitaires haut de gamme pour vos événements. Impressionnez vos invités avec des unités élégantes et autonomes, livrées clé en main.' ) ); ?></p>
      <div class="hero__actions">
        <a href="https://www.easytoilets.ch/devis-en-ligne/?utm_source=EasyEvents" class="btn btn-hero" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( ee_get( $post_id, 'hero_cta_1', 'Demander votre devis' ) ); ?></a>
        <a href="#approche" class="btn btn-hero-outline"><?php echo esc_html( ee_get( $post_id, 'hero_cta_2', 'Découvrir nos services' ) ); ?> <?php echo easyevents_icon( 'arrow-right', 16 ); ?></a>
      </div>
    </div>
    <div class="stats-grid">
      <?php
      $default_stats = array(
        array( 'value' => '100%', 'label' => 'Autonome' ),
        array( 'value' => '500+', 'label' => 'Événements couverts' ),
        array( 'value' => '4 saisons', 'label' => 'Été comme hiver' ),
        array( 'value' => '24h', 'label' => 'Réponse garantie' ),
      );
      foreach ( ee_get_stats( $post_id, $default_stats ) as $s ) : ?>
        <div class="stat-card"><p class="stat-card__value" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( $s['value'] ); ?></p><p class="stat-card__label"><?php echo esc_html( $s['label'] ); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'approche' ) ) : ?>
<!-- ━━━━ NOTRE APPROCHE ━━━━ -->
<section id="approche" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="section-header section-header--center animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span>EasyToilets<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Notre <span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>;font-weight:400">approche</span></h2>
      <p style="max-width:36rem;margin:0 auto;color:<?php echo esc_attr( $C['dark'] ); ?>88">Chez <strong style="color:<?php echo esc_attr( $C['dark'] ); ?>">EasyToilets</strong>, nous offrons des installations sanitaires luxueuses et de haute qualité à vos invités. Nous proposons une variété de tailles d'unités, nous avons donc l'unité parfaite pour un événement de toute taille. Impressionnez vos invités avec cette unité élégante et efficace ! Ce petit détail peut faire une grande différence lors de votre événement.</p>
    </div>
    <div class="features-grid features-grid--3 animate-on-scroll">
      <?php foreach ( $features as $f ) : ?>
        <div class="feature-card" style="background:#fff;border-radius:1rem">
          <div class="feature-card__icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>12;color:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo easyevents_icon( $f['icon'], 20 ); ?></div>
          <h3 style="color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo esc_html( $f['title'] ); ?></h3>
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77"><?php echo esc_html( $f['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'demarquez' ) ) : ?>
<!-- ━━━━ DÉMARQUEZ-VOUS ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['beige'] ); ?>;position:relative;overflow:hidden">
  <div class="decorative-blob" style="background:radial-gradient(circle,<?php echo esc_attr( $C['accent'] ); ?>10,transparent 70%)"></div>
  <div class="container">
    <div class="two-col-layout">
      <!-- Image -->
      <div class="animate-on-scroll" style="position:relative">
        <div class="intro-image intro-image--rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/EasyToilets-002.jpg' ) ); ?>" alt="EasyToilets unité luxueuse"></div>
      </div>
      <!-- Text -->
      <div class="animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>60"></span>Premium Quality</span>
        <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:left">Démarquez<span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>;font-weight:400">-vous</span></h2>
        <div class="intro-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">
          <p>EasyToilets est considéré comme l'un des principaux fournisseurs d'équipements sanitaires et de toilettes mobiles.</p>
          <p>Quel que soit votre événement, nous vous proposerons la solution la mieux adaptée à vos besoins.</p>
          <p>Faites tourner les têtes en choisissant une unité luxueuse et haut de gamme avec chauffage, un système audio et plus encore !</p>
          <p>Nous proposons des solutions <strong style="color:<?php echo esc_attr( $C['dark'] ); ?>">clé en main</strong> et toutes les unités sont entièrement autonomes et peuvent fonctionner été comme hiver.</p>
        </div>
        <a href="https://www.easytoilets.ch/devis-en-ligne/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Demander votre devis ! <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'marquee' ) ) : ?>
<!-- ━━━━ MARQUEE (event types) ━━━━ -->
<div class="marquee" style="background:<?php echo esc_attr( $C['white'] ); ?>;border-color:<?php echo esc_attr( $C['accent'] ); ?>12">
  <div class="marquee__track">
    <?php
    $etNames = array_map( function( $e ) { return $e['name']; }, $eventTypes );
    foreach ( array_merge( $etNames, $etNames, $etNames, $etNames ) as $w ) : ?>
      <span class="marquee__word"><span style="color:<?php echo esc_attr( $C['accent'] ); ?>">✦</span><?php echo esc_html( strtoupper( $w ) ); ?></span>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'events' ) ) : ?>
<!-- ━━━━ LA SOLUTION POUR TOUS VOS ÉVÉNEMENTS ━━━━ -->
<section id="services" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="two-col-layout">
      <!-- Text + List -->
      <div class="animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>60"></span>Pour chaque occasion</span>
        <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:left">La solution pour tous vos <span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>;font-weight:400">événements</span></h2>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;margin-bottom:2rem">Nous proposons une variété de tailles d'unités, nous avons donc l'unité parfaite pour un événement de toute taille. Impressionnez vos invités avec une unité élégante et efficace !</p>
        <div class="event-types-list" style="display:grid;grid-template-columns:repeat(2,1fr);gap:.75rem">
          <?php foreach ( $eventTypes as $et ) : ?>
            <div class="event-type-item" style="display:flex;align-items:center;gap:.75rem;padding:.625rem 1rem;border-radius:.75rem;border:1px solid <?php echo esc_attr( $C['slate'] ); ?>10;background:<?php echo esc_attr( $C['white'] ); ?>">
              <div class="event-type-item__icon" style="width:2rem;height:2rem;border-radius:.5rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;background:<?php echo esc_attr( $C['accent'] ); ?>12;color:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo easyevents_icon( $et['icon'], 15 ); ?></div>
              <span style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-size:.875rem"><?php echo esc_html( $et['name'] ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;font-style:italic;font-size:.875rem;margin:1.5rem 0">Et encore plus, parlez-nous de votre projet !</p>
        <a href="https://www.easytoilets.ch/devis-en-ligne/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Demander votre devis ! <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
      </div>
      <!-- Image -->
      <div class="animate-on-scroll" style="position:relative">
        <div class="intro-image intro-image--rounded intro-image--shadow"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/EasyToilets-004-1.jpg' ) ); ?>" alt="EasyToilets pour vos événements"></div>
        <div class="floating-badge floating-badge--top-right" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
          <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">7+</span><span style="color:rgba(255,255,255,.7)">types</span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'options' ) ) : ?>
<!-- ━━━━ OPTIONS PREMIUM ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="options-header animate-on-scroll">
      <div><span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>60"></span>Options premium</span><h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:left">Allez plus <span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>;font-weight:400">loin</span></h2></div>
      <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;max-width:22rem">Ajoutez une de ces options et faites de votre événement une expérience inoubliable.</p>
    </div>
    <div class="bento-grid bento-grid--2 animate-on-scroll">
      <?php
        $option_imgs = array(
          get_theme_file_uri( 'assets/images/EasyToilets-005-1.jpg' ),
          get_theme_file_uri( 'assets/images/Assistant personnel.png' ),
        );
        foreach ( $options as $i => $opt ) : ?>
        <div class="bento-card">
          <img src="<?php echo esc_url( $option_imgs[ $i ] ); ?>" alt="<?php echo esc_attr( $opt['title'] ); ?>" class="bento-card__img" loading="lazy">
          <div class="bento-card__overlay" style="background:linear-gradient(to top,<?php echo esc_attr( $C['dark'] ); ?>f5 0%,<?php echo esc_attr( $C['dark'] ); ?>bb 35%,<?php echo esc_attr( $C['dark'] ); ?>44 70%,<?php echo esc_attr( $C['dark'] ); ?>18 100%)"></div>
          <div class="bento-card__content">
            <div class="bento-card__tag"><span style="background:<?php echo esc_attr( $C['dark'] ); ?>88;color:<?php echo esc_attr( $C['accent'] ); ?>;border:1px solid <?php echo esc_attr( $C['accent'] ); ?>20"><?php echo easyevents_icon( $opt['icon'], 12 ); ?> <?php echo esc_html( $opt['tag'] ); ?></span></div>
            <h3 style="color:#fff"><?php
              $parts = explode( ' ', $opt['title'] );
              echo esc_html( $parts[0] );
              if ( count( $parts ) > 1 ) echo '<br><span class="italic" style="color:' . esc_attr( $C['accent'] ) . ';font-weight:400">' . esc_html( $parts[1] ) . '</span>';
            ?></h3>
            <p style="color:rgba(255,255,255,.8);font-size:.875rem;max-width:22rem;margin-bottom:1.25rem"><?php echo esc_html( $opt['desc'] ); ?></p>
            <a href="https://www.easytoilets.ch/devis-en-ligne/?utm_source=EasyEvents" style="color:rgba(255,255,255,.7);font-size:.8125rem">Découvrir <?php echo easyevents_icon( 'arrow-right', 12 ); ?></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'testimonials' ) ) : ?>
<!-- ━━━━ AVIS CLIENTS ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['beige'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span>Témoignages<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Avis <span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>">clients</span></h2>
    </div>
    <div class="testimonials-grid animate-on-scroll">
      <?php foreach ( $testimonials as $t ) :
        $initials = strtoupper( substr( $t['author'], 0, 1 ) );
      ?>
        <div class="testimonial-card" style="border-color:<?php echo esc_attr( $C['slate'] ); ?>10">
          <div class="testimonial-stars"><?php for($j=0;$j<5;$j++) echo '<span style="color:' . esc_attr( $C['accent'] ) . '">' . easyevents_icon('star',12) . '</span>'; ?></div>
          <p class="testimonial-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-style:italic">"<?php echo esc_html( $t['text'] ); ?>"</p>
          <div class="testimonial-author" style="border-color:<?php echo esc_attr( $C['slate'] ); ?>12">
            <div class="testimonial-avatar" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo $initials; ?></div>
            <div><p class="testimonial-name" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo esc_html( $t['author'] ); ?></p><p class="testimonial-role" style="color:<?php echo esc_attr( $C['slate'] ); ?>"><?php echo esc_html( $t['company'] ); ?></p></div>
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
      <div class="brand-block__glow" style="background:radial-gradient(ellipse at 80% 40%,<?php echo esc_attr( $C['accent'] ); ?>12,transparent 60%)"></div>
      <div class="brand-block__inner brand-block__inner--2col">
        <div class="brand-block__text">
          <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span>Sanitaires premium</span>
          <h2 style="color:#fff">Easy<span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>">Toilets</span></h2>
          <p style="color:rgba(255,255,255,.5)">Des installations sanitaires luxueuses, autonomes et respectueuses de l'environnement. Impressionnez vos invités et faites la différence avec des unités haut de gamme, livrées et installées clé en main.</p>
          <div class="brand-tags">
            <?php foreach ( array( 'Clé en main', 'Autonome', 'Luxueuse', 'Éco-responsable' ) as $tag ) : ?>
              <span style="color:<?php echo esc_attr( $C['accent'] ); ?>;border-color:<?php echo esc_attr( $C['accent'] ); ?>25;background:<?php echo esc_attr( $C['accent'] ); ?>08"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
          <a href="https://www.easytoilets.ch/devis-en-ligne/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Demander votre devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>
        <div class="brand-block__images brand-block__images--single">
          <div class="brand-block__img-wrap brand-block__img-wrap--float"><img src="<?php echo esc_url( $img['easytoilets'] ); ?>" alt="EasyToilets" loading="lazy"></div>
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
      <div><span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>">EasyEvents Group</span><h2 style="color:#fff">Découvrez nos <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">autres expertises</span></h2></div>
      <a href="<?php echo esc_url( home_url('/') ); ?>" style="color:<?php echo esc_attr( $C['accent'] ); ?>">Tous les services <?php echo easyevents_icon('arrow-right',14); ?></a>
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
        <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>60"></span>FAQ</span>
        <h2 style="color:<?php echo esc_attr( $C['dark'] ); ?>">Questions <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">fréquentes</span></h2>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88">Tout ce que vous devez savoir sur EasyToilets avant de réserver.</p>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;font-size:.875rem">Une question spécifique ? Contactez-nous directement.</p>
        <a href="tel:<?php echo esc_attr( str_replace(' ', '', ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ) ); ?>" class="faq-phone-btn" style="background:<?php echo esc_attr( $C['dark'] ); ?>;color:<?php echo esc_attr( $C['cream'] ); ?>"><?php echo easyevents_icon('phone',14); ?> <?php echo esc_html( ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ); ?></a>
      </div>
      <div class="faq-items animate-on-scroll">
        <?php foreach ( $faqItems as $item ) : ?>
          <div class="faq-item" style="border-color:<?php echo esc_attr( $C['accent'] ); ?>10;background:#fff">
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
