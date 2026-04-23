<?php
/**
 * EasyFlash — Full service page (100% React fidelity)
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ── Palette ─────────────────────────────────────── */
$C = array(
  'dark'    => '#1a1632',
  'darker'  => '#12102a',
  'mid'     => '#2a2450',
  'accent'  => '#7c5cfc',
  'accentL' => '#9b85fd',
  'muted'   => '#6b6590',
  'cream'   => '#f6f4fb',
  'beige'   => '#edeaf5',
);

/* ── Data ────────────────────────────────────────── */
$keywords = array( 'PhotoBooth', 'Impression HD', 'Vidéo 360°', 'Iris', 'Événements', 'Sur mesure', 'Genève', 'Animation photo' );

$testimonials = array(
  array( 'text' => 'Le photobooth EasyFlash a fait sensation ! Les invités en parlent encore. Les tirages étaient magnifiques et l\'équipe très professionnelle.', 'author' => 'Mariage', 'company' => 'Julie &amp; Thomas' ),
  array( 'text' => 'Le 360° a été l\'attraction numéro un de notre soirée corporate. Vidéos spectaculaires, partage instantané. On recommande à 100% !', 'author' => 'Gala d\'entreprise', 'company' => 'Laurent M.' ),
  array( 'text' => 'Service impeccable du début à la fin. Le Miroir a ajouté une touche glamour parfaite à notre événement. Merci EasyFlash !', 'author' => 'Anniversaire', 'company' => 'Sandra K.' ),
);
$testimonials = ee_get_testimonials( $post_id, $testimonials );

$products = array(
  array(
    'id'           => 'easybox-iris',
    'name'         => 'EasyBox Iris',
    'locationTitle'=> 'Location Photobooth IRIS',
    'isNew'        => true,
    'tag'          => null,
    'tagline'      => 'Bien plus qu\'un photobooth. Une animation exclusive dédiée aux événements professionnels.',
    'desc'         => 'Capturez l\'iris de vos invités et offrez une expérience unique. Disponible à Genève et dans toute la Suisse — une animation innovante, encore rare en événementiel.',
    'longDesc'     => "Aujourd'hui EasyFlash vous propose une animation PhotoBooth Iris unique en événementiel, dédiée aux soirées d'entreprise, événements corporate, lancements de produit, cocktails professionnels, séminaires et inaugurations.\n\nUne expérience visuelle haut de gamme qui capture l'iris de vos invités et le transforme en création artistique. Aucune préparation n'est nécessaire : nous installons le PhotoBooth Iris, accompagnons vos invités et gérons l'intégralité de la prestation.\n\nDevant notre PhotoBooth Iris événementiel, vos invités découvrent une expérience exclusive pensée spécifiquement pour les événements d'entreprise et les agences événementielles. Cette animation innovante attire l'attention, crée de l'interaction et valorise durablement votre image de marque.\n\nChaque participant repart avec une création visuelle unique, livrée en version numérique haute définition, envoyée instantanément via une solution simple et fluide.",
    'precisions'   => array(
      'Le PhotoBooth Iris EasyFlash est conçu pour s\'intégrer parfaitement à vos événements professionnels, sans contrainte technique.',
      'Mode Iris exclusif : capture de l\'œil et transformation en création visuelle artistique unique.',
      'Chaque création est personnalisable avec votre identité visuelle (logo, slogan, habillage graphique).',
    ),
    'price'    => '1790.-',
    'currency' => 'CHF',
    'image'    => 'https://www.easyflash.ch/wp-content/uploads/2018/03/PhotoBooth-Iris-banner.jpeg',
    'features' => array(
      'Livraison &amp; installation clé en main par notre équipe EasyFlash',
      'Durée flexible &amp; créations numériques illimitées en Haute Définition',
      'Mode Iris exclusif : capture et transformation artistique de l\'iris',
      'Envoi instantané sur smartphone via Wi-Fi / lien sécurisé en 24h–48h',
      'Personnalisation avancée : logo, identité visuelle, habillage, interface, email brandé',
      'Options premium : formats spécifiques, rendus artistiques, personnalisation événementielle',
      'Démontage &amp; récupération inclus par notre équipe',
    ),
    'specs'    => array(
      array( 'label' => 'Public cible', 'value' => 'Événements corporate &amp; professionnels' ),
      array( 'label' => 'Installation', 'value' => 'Clé en main par EasyFlash' ),
      array( 'label' => 'Mode', 'value' => 'Capture d\'iris exclusive' ),
      array( 'label' => 'Livrable', 'value' => 'Création numérique HD' ),
      array( 'label' => 'Partage', 'value' => 'Wi-Fi instantané + liens 24h–48h' ),
      array( 'label' => 'Disponibilité', 'value' => 'Genève &amp; toute la Suisse' ),
    ),
  ),
  array(
    'id'           => 'easybox-bw',
    'name'         => 'EasyBox B&amp;W',
    'locationTitle'=> 'Location Photobooth EasyBox Noir &amp; Blanc',
    'isNew'        => false,
    'tag'          => 'Prestige',
    'tagline'      => 'L\'élégance intemporelle en noir &amp; blanc',
    'desc'         => 'L\'EasyBox B&amp;W transforme chaque cliché en une œuvre artistique au rendu noir et blanc raffiné. Idéale pour les galas, mariages chic et événements corporate, elle confère à vos photos un charme intemporel qui tranche avec l\'ordinaire.',
    'longDesc'     => "Vous souhaitez offrir à vos invités une expérience photo empreinte d'élégance classique ? L'EasyBox B&W réinvente le photobooth avec un rendu exclusivement en noir et blanc de haute qualité.\n\nContrairement à un simple filtre, notre traitement noir et blanc est calibré pour sublimer les contrastes et la lumière, donnant à chaque tirage un rendu digne d'un photographe de mode.\n\nParfaitement personnalisable, la borne peut être habillée aux couleurs de votre événement et chaque cadre peut intégrer votre logo ou slogan. Le partage numérique reste instantané, via QR code, pour les invités qui souhaitent conserver un souvenir digital.",
    'precisions'   => array(
      'Le rendu noir &amp; blanc est calibré professionnellement — ce n\'est pas un simple filtre mais un traitement photographique précis.',
      'La borne est habillée en noir mat pour s\'intégrer discrètement dans les décors luxueux.',
      'L\'arrière-plan entièrement personnalisable permet d\'incruster votre logo ou un fond dédié à l\'événement.',
    ),
    'price'    => '490.-',
    'currency' => 'CHF',
    'image'    => 'https://www.easyflash.ch/wp-content/uploads/2020/04/location-photomaton.jpg',
    'features' => array(
      'Rendu noir &amp; blanc de haute qualité',
      'Impression HD instantanée (format 10×15 cm)',
      'Personnalisation du cadre et de l\'interface',
      'Galerie numérique partageable via QR code',
      'Technicien sur place inclus',
      'Livraison, installation &amp; récupération incluses',
    ),
    'specs'    => array(
      array( 'label' => 'Espace requis', 'value' => '3 m × 3 m minimum' ),
      array( 'label' => 'Alimentation', 'value' => 'Prise murale standard dédiée' ),
      array( 'label' => 'Capacité', 'value' => '1 à 4 personnes' ),
      array( 'label' => 'Rendu', 'value' => 'Noir &amp; blanc calibré HD' ),
      array( 'label' => 'Partage', 'value' => 'QR code + liens 24h–48h' ),
      array( 'label' => 'Installation', 'value' => 'Livraison &amp; montage inclus' ),
    ),
  ),
  array(
    'id'           => 'easybox-miroir',
    'name'         => 'EasyBox Miroir',
    'locationTitle'=> 'Location Photobooth EasyBox Miroir',
    'isNew'        => false,
    'tag'          => 'Glamour',
    'tagline'      => 'Miroir, mon beau miroir... dis-moi qui est la plus belle ?',
    'desc'         => 'Le Photobooth EasyBox Miroir est l\'attraction que tout le monde veut ! Innovant par sa taille, son écran tactile géant et ses effets — une véritable touche de glamour qui se fond à merveille dans n\'importe quelle déco.',
    'longDesc'     => "Le Photobooth EasyBox Miroir dégage un fort pouvoir d'attraction et de séduction, le mélange parfait pour charmer vos invités et graver à jamais cet évènement dans leurs esprits.\n\nDevant le Photobooth EasyBox Miroir, vos convives laisseront libre cours à leur imagination. Avec ou sans accessoires, cette borne simple d'utilisation permettra à chacun de marquer de sa présence cet événement inoubliable.\n\nLes photos seront imprimées instantanément sur papier. Vous aurez également la possibilité d'envoyer les photos sur votre téléphone via une connexion Wi-Fi intégrée.",
    'precisions'   => array(
      'L\'EasyBox Miroir est un écran pleine hauteur (format portrait) qui fonctionne comme un vrai miroir interactif.',
      'Les animations et les messages à l\'écran sont entièrement personnalisables selon votre thème d\'événement.',
      'L\'arrière-plan étant personnalisable, il est possible d\'incruster un fond avec votre logo ou décor virtuel.',
    ),
    'price'    => '690.-',
    'currency' => 'CHF',
    'image'    => 'https://www.easyflash.ch/wp-content/uploads/2019/12/easyflash-miroir2.jpg',
    'features' => array(
      'Photos numériques illimitées en qualité Haute Définition',
      '3 modes : Print / GIF / Boomerang (courte vidéo en boucle)',
      'Impression et/ou envoi sur smartphone instantanés (via Wi-Fi)',
      'Lien vers vos photos numériques en 24h–48h',
      'Personnalisation possible : logo, slogan ou toile de fond',
      'Packs d\'accessoires en option',
      'Livraison &amp; montage, démontage &amp; récupération par EasyFlash',
    ),
    'specs'    => array(
      array( 'label' => 'Format', 'value' => 'Miroir pleine hauteur (portrait)' ),
      array( 'label' => 'Espace requis', 'value' => '3 m × 3 m minimum' ),
      array( 'label' => 'Alimentation', 'value' => 'Prise murale standard dédiée' ),
      array( 'label' => 'Capacité', 'value' => '1 à 5 personnes' ),
      array( 'label' => 'Partage', 'value' => 'Instantané + liens 24h–48h' ),
      array( 'label' => 'Installation', 'value' => 'Livraison &amp; montage inclus' ),
    ),
  ),
  array(
    'id'           => 'easybox-360',
    'name'         => 'EasyBox 360°',
    'locationTitle'=> 'Location Photobooth EasyBox Rotatif 360°',
    'isNew'        => false,
    'tag'          => 'Best-seller',
    'tagline'      => 'Plus qu\'un divertissement, voici une animation innovante, le Photobooth rotatif 360°',
    'desc'         => 'Créez en direct vos vidéos en mode Selfies 360° — une nouvelle avancée dans l\'animation photo en exclusivité chez EasyFlash ! Dans nos studios, nous avons élaboré un nouveau concept unique dans le secteur de l\'animation photo, mêlant photographie et cinématographie. À découvrir absolument !',
    'longDesc'     => "Vous aimeriez que vos photos aient un rendu plus dynamique ? Un effet unique et hyper proche de la réalité ? Alors vous avez trouvé le divertissement idéal pour épater vos invités. Offrez-leur un rendu digne de l'univers du cinéma…\n\nLa technologie de notre photobooth EasyBox rotatif 360° permet d'assembler une multitude de prises de vue et produira un mini film à l'effet WOUHAOU garanti !\n\nCette animation est totalement personnalisable ! Grâce à l'interface logiciel et le matériel fournis, vous pouvez sélectionner vos effets 360°, vos arrière-plans, ajouter votre logo, un produit, une marque, un événement… Vous avez carte blanche !\n\nEnfin, chaque rendu peut être immédiatement partagé sur vos réseaux sociaux et créer le buzz.",
    'precisions'   => array(
      'Le Photobooth EasyBox Rotatif 360° est une plate-forme de 80 cm de diamètre qui peut accueillir confortablement 2 à 3 personnes (max).',
      'La prise de vue est effectuée par un vidéobooth fixe : seuls les participants tournent.',
      'L\'arrière-plan étant fixe, il est possible d\'incruster un fond personnalisable.',
    ),
    'price'    => '690.-',
    'currency' => 'CHF',
    'image'    => 'https://www.easyflash.ch/wp-content/uploads/2018/03/photoboth-360-994x1024.jpeg',
    'features' => array(
      'Vidéos illimitées en qualité Haute Définition',
      'Envoi sur smartphone instantané (via Wi-Fi) puis envoi des liens en 24h–48h via WeTransfer',
      'Personnalisation possible : logo ou slogan sur la vidéo',
      'Packs d\'accessoires en option',
      'Alimentation : prise murale standard dédiée (sans multiprise)',
      'Espace requis : 4 m × 4 m minimum',
      'Livraison &amp; montage, démontage &amp; récupération par EasyFlash',
    ),
    'specs'    => array(
      array( 'label' => 'Plateforme', 'value' => '80 cm de diamètre' ),
      array( 'label' => 'Capacité', 'value' => '2 à 3 personnes max' ),
      array( 'label' => 'Espace requis', 'value' => '4 m × 4 m minimum' ),
      array( 'label' => 'Alimentation', 'value' => 'Prise murale standard dédiée (sans multiprise)' ),
      array( 'label' => 'Partage', 'value' => 'Wi-Fi instantané + liens 24h–48h' ),
      array( 'label' => 'Installation', 'value' => 'Livraison &amp; montage inclus' ),
    ),
  ),
);

$values = array(
  array( 'icon' => 'award',    'title' => 'Professionnalisme', 'desc' => 'Nous mettons notre professionnalisme à votre service. Soucieux de produire un service de qualité, toute notre équipe est à votre écoute.' ),
  array( 'icon' => 'eye',      'title' => 'Transparence',      'desc' => 'Pour garantir une prestation de qualité, nous établirons votre devis personnalisé selon vos souhaits, sans surprise.' ),
  array( 'icon' => 'sliders',  'title' => 'Personnalisation',  'desc' => 'Nos prestations EasyBox sont entièrement personnalisables afin de répondre au mieux à vos attentes.' ),
);

$stats = array(
  array( 'value' => '2009',  'label' => 'Fondé à Genève' ),
  array( 'value' => '500+',  'label' => 'Événements couverts' ),
  array( 'value' => '4',     'label' => 'Modèles de PhotoBooth' ),
  array( 'value' => '24h',   'label' => 'Réponse garantie' ),
);

$stats = ee_get_stats( $post_id, $stats );

$faqItems = array(
  array( 'q' => 'Quelle est la différence entre l\'EasyBox, l\'EasyBox 360° et l\'EasyBox Miroir ?', 'a' => 'L\'EasyBox est notre borne photo classique : simple, élégante et facile d\'utilisation. L\'EasyBox 360° capture une vidéo panoramique à 360° de vos invités pour un effet spectaculaire. L\'EasyBox Miroir est un grand écran miroir interactif qui propose des filtres et animations en temps réel. Chaque modèle est personnalisable aux couleurs de votre événement.' ),
  array( 'q' => 'Les impressions sont-elles incluses dans la location ?', 'a' => 'Oui, toutes nos formules incluent l\'impression photo illimitée en format instamatiç (10×15 cm) sur place. Les photos sont également disponibles en téléchargement numérique via QR code ou par e-mail après l\'événement.' ),
  array( 'q' => 'Est-il possible de personnaliser le cadre photo et l\'interface ?', 'a' => 'Absolument. Nous créons un habillage graphique sur-mesure (logo, couleurs, message) pour le cadre de chaque photo ainsi que pour l\'interface de la borne. Envoyez-nous votre charte graphique et nous nous occupons du reste.' ),
  array( 'q' => 'Combien de temps faut-il pour installer une borne ?', 'a' => 'Le montage standard prend entre 30 et 45 minutes. Nous arrivons généralement 1h avant le début de votre événement pour garantir un démarrage sans stress. Un technicien reste sur place toute la durée de la prestation.' ),
  array( 'q' => 'Dans quelle zone géographique intervenez-vous ?', 'a' => 'Nous intervenons principalement en Suisse romande (Genève, Lausanne, Vaud, Valais, Neuchâtel, Fribourg). Des prestations en France voisine ou en Suisse alémanique sont possibles — contactez-nous pour un devis incluant les frais de déplacement.' ),
  array( 'q' => 'Comment se déroule la réservation ?', 'a' => 'C\'est simple : (1) Remplissez notre formulaire de devis en indiquant la date, le lieu et le type d\'événement. (2) Nous revenons vers vous sous 24h avec une offre personnalisée. (3) Validation par acompte de 30 % — le solde est réglé le jour J.' ),
);

$faqItems     = ee_get_faq( $post_id, $faqItems );

$icons_map = array( 'easyflair' => 'wine', 'easyflash' => 'camera', 'easychallenge' => 'trophy', 'easyrelax' => 'coffee', 'easytoilets' => 'droplets' );

/* ── Carbon Fields overrides ──────────────────── */
if ( function_exists( 'carbon_get_post_meta' ) ) {
	$_cf = carbon_get_post_meta( $post_id, 'ef_products' );
	if ( ! empty( $_cf ) ) {
		$products = array();
		foreach ( $_cf as $_r ) {
			$products[] = array(
				'id'            => $_r['product_id'] ?? '',
				'name'          => $_r['product_name'] ?? '',
				'locationTitle' => $_r['product_location_title'] ?? '',
				'isNew'         => ! empty( $_r['product_is_new'] ),
				'tag'           => $_r['product_tag'] ?: null,
				'tagline'       => $_r['product_tagline'] ?? '',
				'desc'          => $_r['product_desc'] ?? '',
				'longDesc'      => $_r['product_long_desc'] ?? '',
				'precisions'    => ee_lines_to_array( $_r['product_precisions'] ?? '' ),
				'price'         => $_r['product_price'] ?? '',
				'currency'      => $_r['product_currency'] ?: 'CHF',
				'image'         => ee_cf_image( $_r['product_image'] ?? 0 ),
				'features'      => ee_lines_to_array( $_r['product_features'] ?? '' ),
				'specs'         => ee_parse_specs( $_r['product_specs'] ?? '' ),
			);
		}
	}

	$_cf = carbon_get_post_meta( $post_id, 'ef_values' );
	if ( ! empty( $_cf ) ) { $values = array(); foreach ( $_cf as $_r ) { $values[] = array( 'icon' => $_r['value_icon'] ?? '', 'title' => $_r['value_title'] ?? '', 'desc' => $_r['value_desc'] ?? '' ); } }

	$_kw = carbon_get_post_meta( $post_id, 'ef_keywords' );
	if ( ! empty( $_kw ) ) { $keywords = array_map( 'trim', explode( ',', $_kw ) ); }
}
?>

<?php if ( ee_show_section( $post_id, 'hero' ) ) : ?>
<!-- ━━━━ HERO ━━━━ -->
<section class="service-hero service-hero--parallax" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
  <div class="service-hero__bg">
    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/homepage-banner-box.jpg' ) ); ?>" alt="EasyFlash PhotoBooth" class="service-hero__img" loading="eager">
    <div class="service-hero__overlay-1" style="background:linear-gradient(150deg,<?php echo esc_attr( $C['dark'] ); ?>ee 0%,<?php echo esc_attr( $C['dark'] ); ?>c8 48%,<?php echo esc_attr( $C['accent'] ); ?>28 100%)"></div>
    <div class="service-hero__overlay-2" style="background:radial-gradient(ellipse at 75% 25%,<?php echo esc_attr( $C['accent'] ); ?>1a 0%,transparent 60%)"></div>
    <div class="service-hero__overlay-3" style="background:radial-gradient(ellipse at 20% 80%,<?php echo esc_attr( $C['accentL'] ); ?>0c 0%,transparent 50%)"></div>
    <div class="service-hero__overlay-bottom" style="background:linear-gradient(to top,<?php echo esc_attr( $C['dark'] ); ?>aa 0%,transparent 55%)"></div>
  </div>
  <div class="container service-hero__content">
    <nav class="service-hero__breadcrumb" aria-label="Fil d'Ariane">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a><span>›</span><span>Services</span><span>›</span><span class="current">EasyFlash</span>
    </nav>
    <div class="service-hero__pill" style="border-color:<?php echo esc_attr( $C['accent'] ); ?>35">
      <?php echo easyevents_icon( 'camera', 13 ); ?>
      <span><?php echo esc_html( ee_get( $post_id, 'hero_badge', 'EasyFlash · Location de PhotoBooth' ) ); ?></span>
    </div>
    <div style="max-width:42rem">
      <?php $custom_title = ee_get( $post_id, 'hero_title', '' ); ?>
      <?php if ( $custom_title ) : ?>
        <h1 class="hero__title"><?php echo esc_html( $custom_title ); ?></h1>
      <?php else : ?>
        <h1 class="hero__title">Location de <span style="color:<?php echo esc_attr( $C['accentL'] ); ?>">PhotoBooth</span> en Suisse</h1>
      <?php endif; ?>
      <p class="hero__desc"><?php echo esc_html( ee_get( $post_id, 'hero_subtitle', 'Implanté à Genève depuis 2009, EasyFlash propose des bornes photo entièrement personnalisables pour offrir un élément de distraction unique à vos invités.' ) ); ?></p>
      <div class="hero__actions">
        <a href="#devis" class="btn btn-hero" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( ee_get( $post_id, 'hero_cta_1', 'Obtenir un devis' ) ); ?></a>
        <a href="#produits" class="btn btn-hero-outline"><?php echo esc_html( ee_get( $post_id, 'hero_cta_2', 'Voir nos modèles' ) ); ?> <?php echo easyevents_icon( 'arrow-right', 16 ); ?></a>
      </div>
    </div>
    <div class="stats-grid">
      <?php foreach ( $stats as $s ) : ?>
        <div class="stat-card"><p class="stat-card__value" style="color:<?php echo esc_attr( $C['accentL'] ); ?>"><?php echo esc_html( $s['value'] ); ?></p><p class="stat-card__label"><?php echo esc_html( $s['label'] ); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'marquee' ) ) : ?>
<!-- ━━━━ MARQUEE ━━━━ -->
<div class="marquee" style="background:<?php echo esc_attr( $C['beige'] ); ?>;border-color:<?php echo esc_attr( $C['muted'] ); ?>15">
  <div class="marquee__track" aria-hidden="true">
    <?php foreach ( array_merge( $keywords, $keywords, $keywords, $keywords ) as $w ) : ?>
      <span class="marquee__word"><?php echo esc_html( $w ); ?><span class="marquee__dot" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span></span>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'products' ) ) : ?>
<!-- ━━━━ PRODUCT TABS ━━━━ -->
<section id="produits" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span>Notre collection<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Découvrez les PhotoBooth <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">EasyBox</span></h2>
      <p class="svc-subtitle" style="color:<?php echo esc_attr( $C['muted'] ); ?>">Notre équipe est à votre écoute pour vous aider à choisir la borne photo idéale pour votre évènement.</p>
    </div>

    <!-- Tab buttons -->
    <div class="product-tabs" data-tabs="easyflash-products">
      <?php foreach ( $products as $i => $p ) : ?>
        <button class="product-tab <?php echo $p['id'] === 'easybox-bw' ? 'product-tab--active' : ''; ?>" data-panel="<?php echo esc_attr( $p['id'] ); ?>" style="--tab-accent:<?php echo esc_attr( $C['accent'] ); ?>">
          <?php echo esc_html( $p['name'] ); ?>
          <?php if ( $p['isNew'] ) : ?><span class="product-tab__badge product-tab__badge--new">New</span><?php endif; ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Tab panels -->
    <?php
    $panel_imgs = array(
      'easybox-iris'   => get_theme_file_uri( 'assets/images/cabines-easyflash-300x200.jpg' ),
      'easybox-bw'     => get_theme_file_uri( 'assets/images/easybox-iris-300x200.jpg' ),
      'easybox-miroir' => get_theme_file_uri( 'assets/images/easybox-360-300x200.jpg' ),
      'easybox-360'    => get_theme_file_uri( 'assets/images/cabines-easyflash-300x200.jpg' ),
    );
    ?>
    <?php foreach ( $products as $i => $p ) : ?>
      <div class="product-panel <?php echo $p['id'] === 'easybox-bw' ? 'product-panel--active' : ''; ?>" id="<?php echo esc_attr( $p['id'] ); ?>">
        <!-- Header: 2-col intro (text left / image right) -->
        <div style="display:flex;align-items:center;gap:2.5rem;margin-bottom:2.5rem;flex-wrap:wrap">
          <!-- Left: badges + title + tagline + desc -->
          <div style="flex:1;min-width:260px">
            <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:.75rem">
              <?php if ( $p['isNew'] ) : ?><span class="product-badge product-badge--new"><?php echo easyevents_icon( 'sparkles', 10 ); ?> Nouveau</span><?php endif; ?>
              <?php if ( ! empty( $p['tag'] ) && ! $p['isNew'] ) : ?><span class="product-badge" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( $p['tag'] ); ?></span><?php endif; ?>
            </div>
            <h3 class="product-panel__title" style="margin-bottom:.5rem"><?php echo wp_kses_post( $p['locationTitle'] ); ?></h3>
            <p class="product-panel__tagline" style="color:<?php echo esc_attr( $C['accent'] ); ?>;margin-bottom:.75rem"><?php echo wp_kses_post( $p['tagline'] ); ?></p>
            <p class="product-panel__desc"><?php echo wp_kses_post( $p['desc'] ); ?></p>
          </div>
          <!-- Right: image card -->
          <?php if ( ! empty( $panel_imgs[ $p['id'] ] ) ) : ?>
          <div style="flex-shrink:0;width:300px;border-radius:1rem;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,.12);position:relative">
            <img src="<?php echo esc_url( $panel_imgs[ $p['id'] ] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>" style="width:300px;height:200px;object-fit:cover;display:block" loading="lazy">
            <div style="position:absolute;bottom:0;left:0;right:0;padding:.6rem 1rem;background:linear-gradient(to top,rgba(28,22,50,.75) 0%,transparent 100%)">
              <span style="color:#fff;font-size:.75rem;font-weight:600;letter-spacing:.04em"><?php echo esc_html( $p['name'] ); ?></span>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="product-panel__header" style="display:none"><!-- kept for CSS compat --></div>

        <!-- Long description -->
        <div class="product-panel__longdesc">
          <?php foreach ( explode( "\n\n", $p['longDesc'] ) as $para ) : ?>
            <p><?php echo esc_html( $para ); ?></p>
          <?php endforeach; ?>
        </div>

        <!-- Precisions -->
        <div class="product-panel__precisions">
          <h4>Quelques précisions...</h4>
          <ul>
            <?php foreach ( $p['precisions'] as $note ) : ?>
              <li><span class="precision-dot" style="color:<?php echo esc_attr( $C['accent'] ); ?>"></span><?php echo wp_kses_post( $note ); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Features + Image -->
        <div class="product-panel__features-grid">
          <div>
            <h4 style="font-weight:800;font-size:1.25rem;margin-bottom:1.5rem">Les <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">+</span> de la borne photo <?php echo esc_html( $p['name'] ); ?></h4>
            <ul class="features-list">
              <?php foreach ( $p['features'] as $f ) : ?>
                <li><?php echo easyevents_icon( 'check-circle', 16 ); ?><span><?php echo wp_kses_post( $f ); ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="product-panel__image <?php echo $p['id'] === 'easybox-360' ? 'product-panel__image--contain' : ''; ?>">
            <img src="<?php echo esc_url( $p['image'] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>" loading="lazy">
            <div class="product-img-overlay"></div>
            <?php if ( $p['isNew'] ) : ?><span class="product-img-badge product-img-badge--new"><?php echo easyevents_icon( 'sparkles', 11 ); ?> Nouveau</span>
            <?php elseif ( ! empty( $p['tag'] ) ) : ?><span class="product-img-badge" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( $p['tag'] ); ?></span>
            <?php endif; ?>
          </div>
        </div>

        <!-- Specs -->
        <div class="specs-grid">
          <?php foreach ( $p['specs'] as $s ) : ?>
            <div class="spec-item"><p class="spec-item__label"><?php echo wp_kses_post( $s['label'] ); ?></p><p class="spec-item__value"><?php echo wp_kses_post( $s['value'] ); ?></p></div>
          <?php endforeach; ?>
        </div>

        <!-- Price -->
        <div class="product-price">
          <p class="product-price__label">À partir de</p>
          <p class="product-price__amount"><?php echo esc_html( $p['price'] ); ?><span class="product-price__currency"><?php echo esc_html( $p['currency'] ); ?></span></p>
          <p class="product-price__name"><?php echo esc_html( $p['name'] ); ?></p>
          <a href="#devis" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Obtenir mon devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>

        <!-- Per-product bonus section -->
        <div class="product-bonus-divider"></div>

        <?php if ( $p['id'] === 'easybox-iris' ) : ?>
        <!-- IRIS BONUS -->
        <div class="product-bonus">
          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">1. Découvrez le PhotoBooth IRIS</h4>
            <p class="product-bonus__desc">Le PhotoBooth Iris est proposé dans une version unique, conçue spécialement pour les événements professionnels.</p>
            <p class="product-bonus__desc">Son design sobre et élégant s'intègre parfaitement aux soirées d'entreprise, événements corporate et animations haut de gamme.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">À partir de 1790.- CHF</p>
            <div class="product-bonus__single-img" style="max-width:24rem;margin:0 auto">
              <img src="https://www.easyflash.ch/wp-content/uploads/2018/03/PhotoBooth-IRIS-Black.png" alt="Version exclusive PhotoBooth IRIS" loading="lazy">
              <p class="product-bonus__img-label">Version exclusive PhotoBooth IRIS</p>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">2. Personnalisez votre visuel (le petit plus)</h4>
            <p class="product-bonus__desc">Avec EasyFlash, la personnalisation du visuel de votre création Iris est prise en charge par notre équipe.</p>
            <p class="product-bonus__desc">Vous nous transmettez votre logo, un slogan ou un message, et nous intégrons ces éléments directement sur le cadre autour de l'iris, dans le respect de votre identité visuelle.</p>
            <p class="product-bonus__desc">Conçu pour les événements d'entreprise (soirée corporate, lancement de produit, séminaire, cocktail, inauguration…) avec une personnalisation élégante et discrète.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">Prix offert</p>
            <div class="product-bonus__grid product-bonus__grid--3">
              <?php foreach ( array(
                'https://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-1.jpeg',
                'https://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-2.jpeg',
                'https://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-3.jpeg',
                'https://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-4.jpeg',
              ) as $idx => $img_url ) : ?>
                <div class="product-bonus__img-card"><img src="<?php echo esc_url( $img_url ); ?>" alt="Template Iris <?php echo $idx + 1; ?>" loading="lazy"></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__steps-box">
            <h4 class="product-bonus__title">Comment ça marche ? Une expérience unique, en toute simplicité…</h4>
            <div class="product-bonus__steps product-bonus__steps--5">
              <?php
              $iris_steps = array(
                array( 'icon' => 'camera',  'label' => 'Positionnement', 'desc' => 'Placez-vous devant le PhotoBooth Iris, conçu pour une capture précise et élégante.' ),
                array( 'icon' => 'sliders', 'label' => 'Interface tactile', 'desc' => 'Notre équipe lance le processus. L\'interface guide chaque prise pour un résultat optimal.' ),
                array( 'icon' => 'eye',     'label' => 'Capture de l\'iris', 'desc' => 'La prise de vue est réalisée en quelques secondes. Chaque iris devient une œuvre unique.' ),
                array( 'icon' => 'sparkles','label' => 'Personnalisation', 'desc' => 'Nous intégrons votre logo ou message autour de l\'iris pour un rendu à votre image.' ),
                array( 'icon' => 'award',   'label' => 'Réception &amp; partage', 'desc' => 'Imprimé, envoyé sur smartphone ou partagé sur les réseaux sociaux.' ),
              );
              foreach ( $iris_steps as $step ) : ?>
                <div class="product-bonus__step">
                  <div class="product-bonus__step-icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>10"><?php echo easyevents_icon( $step['icon'], 18 ); ?></div>
                  <p class="product-bonus__step-label"><?php echo esc_html( $step['label'] ); ?></p>
                  <p class="product-bonus__step-desc"><?php echo wp_kses_post( $step['desc'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="text-center" style="margin-top:1.5rem">
              <a href="/#contact" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Obtenir une estimation gratuite</a>
            </div>
          </div>

          <!-- Iris FAQ -->
          <div class="product-bonus__faq">
            <h4 class="product-bonus__title text-center">FAQ</h4>
            <div class="faq-items">
              <?php
              $iris_faq = array(
                array( 'q' => 'Qu\'est-ce qu\'un PhotoBooth Iris ?', 'a' => 'Le PhotoBooth Iris est une animation événementielle exclusive qui capture l\'iris de vos invités et le transforme en une création visuelle artistique unique, envoyée instantanément en haute définition.' ),
                array( 'q' => 'Le PhotoBooth Iris est-il adapté aux événements d\'entreprise ?', 'a' => 'Absolument. Il est spécialement conçu pour les soirées d\'entreprise, lancements de produit, séminaires, cocktails corporate et inaugurations. C\'est une animation haut de gamme qui valorise l\'image de marque.' ),
                array( 'q' => 'Peut-on personnaliser le visuel avec un logo ou un slogan ?', 'a' => 'Oui. Nous intégrons votre identité visuelle (logo, slogan, message) directement autour de la création iris. La personnalisation est incluse dans la prestation.' ),
                array( 'q' => 'Combien de personnes peuvent participer au PhotoBooth Iris ?', 'a' => 'La durée est flexible et les créations sont illimitées. Tous vos invités peuvent participer — la prestation est dimensionnée selon la taille de votre événement.' ),
                array( 'q' => 'Sur quels types d\'événements installer un PhotoBooth Iris ?', 'a' => 'Soirée d\'entreprise, lancement de produit, séminaire, cocktail corporate, inauguration, gala, événement de prestige — toute occasion où vous souhaitez offrir une animation mémorable et différenciante.' ),
              );
              foreach ( $iris_faq as $fi => $fitem ) : ?>
                <div class="faq-item product-bonus__faq-item" style="border-color:<?php echo esc_attr( $C['accent'] ); ?>20">
                  <button class="faq-trigger" style="color:<?php echo esc_attr( $C['dark'] ); ?>" aria-expanded="false">
                    <span><?php echo esc_html( $fitem['q'] ); ?></span>
                    <span class="faq-chevron"><?php echo easyevents_icon( 'chevron-right', 16 ); ?></span>
                  </button>
                  <div class="faq-content" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">
                    <p><?php echo esc_html( $fitem['a'] ); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if ( $p['id'] === 'easybox-bw' ) : ?>
        <!-- B&W BONUS -->
        <div class="product-bonus">
          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">1. Choisissez votre PhotoBooth EasyBox</h4>
            <p class="product-bonus__desc">Nos Photobooth peuvent avoir 2 finitions différentes (noire ou bois).</p>
            <p class="product-bonus__desc">Nous avons également une version avec le pied plus court pour une prise de photo assise.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">A partir de 349.-CHF</p>
            <div class="product-bonus__grid product-bonus__grid--2" style="max-width:42rem;margin:0 auto">
              <?php foreach ( array(
                array( 'name' => 'Black Box', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/04/location-photobooth.jpg' ),
                array( 'name' => 'Wood Box', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/04/photobooth-mariage-1.jpg' ),
              ) as $box ) : ?>
                <div class="product-bonus__img-card product-bonus__img-card--labeled">
                  <img src="<?php echo esc_url( $box['image'] ); ?>" alt="<?php echo esc_attr( $box['name'] ); ?>" loading="lazy">
                  <p class="product-bonus__img-label"><?php echo esc_html( $box['name'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">2. Choisissez votre pack d'accessoires indispensables</h4>
            <p class="product-bonus__desc">Pour agrémenter vos photos, nous vous proposons un choix de 3 packs d'accessoires.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">À partir de 29.- CHF</p>
            <div class="product-bonus__grid product-bonus__grid--4">
              <?php foreach ( array(
                array( 'label' => 'Accessoires Cadres', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-cadre-contour.jpg' ),
                array( 'label' => 'Accessoires Props', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-props-contour.jpg' ),
                array( 'label' => 'Accessoires Pancartes', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-pancarte-contour.jpg' ),
                array( 'label' => 'Accessoires Premium', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-premium-contour.jpg' ),
              ) as $acc ) : ?>
                <div class="product-bonus__acc-card">
                  <img src="<?php echo esc_url( $acc['image'] ); ?>" alt="<?php echo esc_attr( $acc['label'] ); ?>" loading="lazy">
                  <p><?php echo esc_html( $acc['label'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">3. Choisissez votre template (le petit plus)</h4>
            <p class="product-bonus__desc">Ajoutez un cadre graphique personnalisé pour renforcer votre identité visuelle.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">Prix offert</p>
            <div class="product-bonus__grid product-bonus__grid--3">
              <?php foreach ( array(
                'https://www.easyflash.ch/wp-content/uploads/2019/11/template4.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2019/11/template5.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2019/11/template13.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2019/11/template15.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2019/11/template17.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2019/11/template18.jpg',
              ) as $idx => $tpl ) : ?>
                <div class="product-bonus__img-card product-bonus__img-card--square"><img src="<?php echo esc_url( $tpl ); ?>" alt="Template <?php echo $idx + 1; ?>" loading="lazy"></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">4. Choisissez votre toile de fond (la touche finale)</h4>
            <p class="product-bonus__desc">Sélectionnez un fond adapté à l'ambiance de votre événement.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">À partir de 149.- CHF</p>
            <div class="product-bonus__grid product-bonus__grid--5">
              <?php foreach ( array(
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5472.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5437.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5615.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5555.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5653.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/C-50.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5627.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5655.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5449.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5681.jpg',
              ) as $idx => $fond ) : ?>
                <div class="product-bonus__img-card product-bonus__img-card--fond"><img src="<?php echo esc_url( $fond ); ?>" alt="Fond <?php echo $idx + 1; ?>" loading="lazy"></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__steps-box">
            <h4 class="product-bonus__title">Comment ça marche ? Un vrai jeu d'enfant...</h4>
            <div class="product-bonus__steps product-bonus__steps--5">
              <?php
              $bw_steps = array(
                array( 'icon' => 'camera',       'label' => 'Préparation' ),
                array( 'icon' => 'check-circle', 'label' => 'Validation' ),
                array( 'icon' => 'star',         'label' => 'Prise de vue' ),
                array( 'icon' => 'tag',          'label' => 'Impression' ),
                array( 'icon' => 'award',        'label' => 'Partage' ),
              );
              foreach ( $bw_steps as $step ) : ?>
                <div class="product-bonus__step">
                  <div class="product-bonus__step-icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>10"><?php echo easyevents_icon( $step['icon'], 18 ); ?></div>
                  <p class="product-bonus__step-label"><?php echo esc_html( $step['label'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="text-center" style="margin-top:1.5rem">
              <a href="/#contact" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Obtenir une estimation gratuite</a>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if ( $p['id'] === 'easybox-miroir' ) : ?>
        <!-- MIROIR BONUS -->
        <div class="product-bonus">
          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">1. Choisissez votre pack d'accessoires indispensables</h4>
            <p class="product-bonus__desc">Pour agrémenter vos photos, nous vous proposons un choix de 3 packs d'accessoires.</p>
            <ul class="product-bonus__list">
              <li>— Pack Standard (cadres, panneaux ou props)</li>
              <li>— Pack Premium (divers tailles et couleurs de chapeaux &amp; lunettes...)</li>
              <li>— Pack sur mesure (accessoires spécialement achetés pour votre évènement en fonction de votre thème)</li>
            </ul>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">À partir de 29.- CHF</p>
            <div class="product-bonus__grid product-bonus__grid--4">
              <?php foreach ( array(
                array( 'label' => 'Accessoires Cadres', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-cadre-contour.jpg' ),
                array( 'label' => 'Accessoires Props', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-props-contour.jpg' ),
                array( 'label' => 'Accessoires Pancartes', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-pancarte-contour.jpg' ),
                array( 'label' => 'Accessoires Premium', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-premium-contour.jpg' ),
              ) as $acc ) : ?>
                <div class="product-bonus__acc-card">
                  <img src="<?php echo esc_url( $acc['image'] ); ?>" alt="<?php echo esc_attr( $acc['label'] ); ?>" loading="lazy">
                  <p><?php echo esc_html( $acc['label'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">2. Choisissez votre template (le petit plus)</h4>
            <p class="product-bonus__desc">Avec EasyFlash, rien de plus simple que de personnaliser le contour de vos photos en quelques clics !</p>
            <p class="product-bonus__desc">Un choix de plusieurs centaines de templates pour tous les types d'évènements (mariage, entreprise, anniversaire, baby shower...).</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">Prix offert</p>
            <div class="product-bonus__grid product-bonus__grid--3">
              <?php foreach ( array(
                'https://www.easyflash.ch/wp-content/uploads/2020/03/template-6.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/template-3.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/template-1-1.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/template-4.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/template-8.png',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/template-5.jpg',
              ) as $idx => $tpl ) : ?>
                <div class="product-bonus__img-card product-bonus__img-card--square"><img src="<?php echo esc_url( $tpl ); ?>" alt="Template <?php echo $idx + 1; ?>" loading="lazy"></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">3. Choisissez votre toile de fond (la touche finale)</h4>
            <p class="product-bonus__desc">Nous mettons à votre disposition un large choix de toiles de fond pour tous types d'événements.</p>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">À partir de 79.- CHF</p>
            <div class="product-bonus__grid product-bonus__grid--5">
              <?php foreach ( array(
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5472.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5437.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5615.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5555.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5653.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/C-50.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5627.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5655.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5449.jpg',
                'https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5681.jpg',
              ) as $idx => $fond ) : ?>
                <div class="product-bonus__img-card product-bonus__img-card--fond"><img src="<?php echo esc_url( $fond ); ?>" alt="Fond <?php echo $idx + 1; ?>" loading="lazy"></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="product-bonus__steps-box">
            <h4 class="product-bonus__title">Comment ça marche ? Facile...</h4>
            <div class="product-bonus__steps product-bonus__steps--5">
              <?php
              $miroir_steps = array(
                array( 'icon' => 'camera',  'label' => 'Positionnement' ),
                array( 'icon' => 'sliders', 'label' => 'Démarrage' ),
                array( 'icon' => 'star',    'label' => 'Prise de vue' ),
                array( 'icon' => 'tag',     'label' => 'Impression' ),
                array( 'icon' => 'award',   'label' => 'Partage' ),
              );
              foreach ( $miroir_steps as $step ) : ?>
                <div class="product-bonus__step">
                  <div class="product-bonus__step-icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>10"><?php echo easyevents_icon( $step['icon'], 18 ); ?></div>
                  <p class="product-bonus__step-label"><?php echo esc_html( $step['label'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="text-center" style="margin-top:1.5rem">
              <a href="/#contact" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Obtenir une estimation gratuite</a>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if ( $p['id'] === 'easybox-360' ) : ?>
        <!-- 360° BONUS -->
        <div class="product-bonus">
          <div class="product-bonus__section">
            <div class="product-bonus__video">
              <video src="https://www.easyflash.ch/wp-content/uploads/2020/11/video-photoboth-360-degree.mp4" autoplay muted loop playsinline></video>
            </div>
          </div>

          <div class="product-bonus__section text-center">
            <h4 class="product-bonus__title">1. Choisissez votre pack d'accessoires indispensables</h4>
            <p class="product-bonus__desc">Pour agrémenter vos vidéos, nous vous proposons un choix de 3 packs d'accessoires.</p>
            <ul class="product-bonus__list">
              <li>— Pack Standard (cadres, panneaux ou props)</li>
              <li>— Pack Premium (divers tailles et couleurs de chapeaux &amp; lunettes...)</li>
              <li>— Pack sur mesure (accessoires spécialement achetés pour votre événement en fonction de votre thème)</li>
            </ul>
            <p class="product-bonus__price" style="color:<?php echo esc_attr( $C['accent'] ); ?>">À partir de 29.- CHF</p>
            <div class="product-bonus__grid product-bonus__grid--4">
              <?php foreach ( array(
                array( 'label' => 'Accessoires Cadres', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-cadre-contour.jpg' ),
                array( 'label' => 'Accessoires Props', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-props-contour.jpg' ),
                array( 'label' => 'Accessoires Pancartes', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-pancarte-contour.jpg' ),
                array( 'label' => 'Accessoires Premium', 'image' => 'https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-premium-contour.jpg' ),
              ) as $acc ) : ?>
                <div class="product-bonus__acc-card">
                  <img src="<?php echo esc_url( $acc['image'] ); ?>" alt="<?php echo esc_attr( $acc['label'] ); ?>" loading="lazy">
                  <p><?php echo esc_html( $acc['label'] ); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'testimonials' ) ) : ?>
<!-- ━━━━ TESTIMONIALS ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['beige'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span>Témoignages<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Avis <span class="italic" style="color:<?php echo esc_attr( $C['accent'] ); ?>">clients</span></h2>
    </div>
    <div class="testimonials-grid animate-on-scroll">
      <?php foreach ( $testimonials as $t ) : ?>
        <div class="testimonial-card" style="border-color:<?php echo esc_attr( $C['muted'] ); ?>10">
          <div class="testimonial-stars"><?php for ( $j = 0; $j < 5; $j++ ) echo easyevents_icon( 'star', 12 ); ?></div>
          <p class="testimonial-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">"<?php echo wp_kses_post( $t['text'] ); ?>"</p>
          <div class="testimonial-author" style="border-color:<?php echo esc_attr( $C['muted'] ); ?>12">
            <div class="testimonial-avatar" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( mb_substr( $t['company'], 0, 1 ) ); ?></div>
            <div><p class="testimonial-name" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo esc_html( $t['author'] ); ?></p><p class="testimonial-role" style="color:<?php echo esc_attr( $C['muted'] ); ?>"><?php echo wp_kses_post( $t['company'] ); ?></p></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'brand' ) ) : ?>
<!-- ━━━━ BRAND CTA BLOCK ━━━━ -->
<section id="devis" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="brand-block animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
      <div class="brand-block__dots"></div>
      <div class="brand-block__glow" style="background:radial-gradient(ellipse at 80% 40%,<?php echo esc_attr( $C['accent'] ); ?>14,transparent 60%)"></div>
      <div class="brand-block__inner brand-block__inner--2col">
        <div class="brand-block__text">
          <span class="svc-label" style="color:<?php echo esc_attr( $C['accentL'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accentL'] ); ?>40"></span>PhotoBooth &amp; Bornes photo</span>
          <h2 style="color:#fff">Easy<span class="italic" style="color:<?php echo esc_attr( $C['accentL'] ); ?>">Flash</span></h2>
          <p style="color:rgba(255,255,255,.5)">Depuis 2009, EasyFlash anime vos événements avec des bornes photo haut de gamme et des technologies innovantes. Du mariage au gala d'entreprise, nous créons des souvenirs uniques pour vos invités.</p>
          <div class="brand-tags">
            <?php foreach ( array( 'Clé en main', 'Depuis 2009', 'Impression HD', 'Suisse romande' ) as $tag ) : ?>
              <span style="color:<?php echo esc_attr( $C['accentL'] ); ?>;border-color:<?php echo esc_attr( $C['accentL'] ); ?>25;background:<?php echo esc_attr( $C['accentL'] ); ?>08"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
          <a href="/#contact" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Demander votre devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>
        <div class="brand-block__mosaic">
          <div class="brand-block__mosaic-grid">
            <div class="brand-block__img-wrap brand-block__img-wrap--float" data-float-y="10" data-float-dur="7">
              <img src="https://www.easyflash.ch/wp-content/uploads/2020/04/location-photomaton.jpg" alt="EasyBox" loading="lazy">
            </div>
            <div class="brand-block__mosaic-col">
              <div class="brand-block__img-wrap brand-block__img-wrap--float" data-float-y="8" data-float-dur="8" data-float-delay="0.5">
                <img src="https://www.easyflash.ch/wp-content/uploads/2019/12/easyflash-miroir2.jpg" alt="EasyBox Miroir" loading="lazy">
              </div>
              <div class="brand-block__img-wrap brand-block__img-wrap--float" data-float-y="6" data-float-dur="6" data-float-delay="1">
                <img src="https://www.easyflash.ch/wp-content/uploads/2018/03/photoboth-360-994x1024.jpeg" alt="EasyBox 360" loading="lazy">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'values' ) ) : ?>
<!-- ━━━━ VALUES ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span>Notre engagement<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Pourquoi choisir <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">EasyFlash</span> ?</h2>
    </div>
    <div class="values-grid values-grid--3 animate-on-scroll">
      <?php foreach ( $values as $v ) : ?>
        <div class="value-card" style="border-color:<?php echo esc_attr( $C['muted'] ); ?>12">
          <div class="value-card__icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>15"><?php echo easyevents_icon( $v['icon'], 24 ); ?></div>
          <h3 style="color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo esc_html( $v['title'] ); ?></h3>
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88"><?php echo esc_html( $v['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'crosssell' ) ) : ?>
<!-- ━━━━ CROSS-SELL ━━━━ -->
<section class="svc-section svc-section--dark" style="background:<?php echo esc_attr( $C['darker'] ); ?>">
  <div class="container">
    <div class="crosssell-header animate-on-scroll">
      <div>
        <span class="svc-label" style="color:<?php echo esc_attr( $C['accentL'] ); ?>">EasyEvents Group</span>
        <h2 style="color:#fff">Découvrez aussi nos <span style="color:<?php echo esc_attr( $C['accentL'] ); ?>">autres expertises</span></h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:<?php echo esc_attr( $C['accentL'] ); ?>">Voir tous les services <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
    </div>
    <div class="crosssell-grid animate-on-scroll">
      <?php foreach ( $others as $other ) :
        $other_page  = get_page_by_path( 'services/' . $other['slug'] );
        $other_thumb = $other_page && has_post_thumbnail( $other_page ) ? get_the_post_thumbnail_url( $other_page, 'medium_large' ) : ( isset( $img[ $other['slug'] ] ) ? $img[ $other['slug'] ] : '' );
        if ( 'easyrelax' === $other['slug'] ) {
          $other_thumb = get_theme_file_uri( 'assets/images/easyrelax hero.png' );
        }
        $other_icon  = isset( $icons_map[ $other['slug'] ] ) ? $icons_map[ $other['slug'] ] : 'star';
      ?>
        <a href="<?php echo esc_url( home_url( '/services/' . $other['slug'] . '/' ) ); ?>" class="crosssell-card">
          <?php if ( $other_thumb ) : ?><img src="<?php echo esc_url( $other_thumb ); ?>" alt="<?php echo esc_attr( $other['label'] ); ?>" class="crosssell-card__img" loading="lazy"><?php endif; ?>
          <div class="crosssell-card__overlay"></div>
          <div class="crosssell-card__content">
            <div class="crosssell-card__icon"><?php echo easyevents_icon( $other_icon, 15 ); ?></div>
            <h3><?php echo esc_html( $other['label'] ); ?></h3>
            <p><?php echo esc_html( $other['tagline'] ); ?></p>
          </div>
          <div class="crosssell-card__arrow"><?php echo easyevents_icon( 'arrow-right', 12 ); ?></div>
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
        <span class="svc-label" style="color:<?php echo esc_attr( $C['muted'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['muted'] ); ?>60"></span>FAQ</span>
        <h2 style="color:<?php echo esc_attr( $C['dark'] ); ?>">Questions <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">fréquentes</span></h2>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88">Tout ce que vous devez savoir sur nos photobooths et bornes photo avant de réserver.</p>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;font-size:.875rem">Une question spécifique ? Contactez-nous directement.</p>
        <a href="tel:<?php echo esc_attr( str_replace(' ', '', ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ) ); ?>" class="faq-phone-btn" style="background:<?php echo esc_attr( $C['dark'] ); ?>;color:<?php echo esc_attr( $C['cream'] ); ?>"><?php echo easyevents_icon( 'phone', 14 ); ?> <?php echo esc_html( ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ); ?></a>
      </div>
      <div class="faq-items animate-on-scroll">
        <?php foreach ( $faqItems as $i => $item ) : ?>
          <div class="faq-item" style="border-color:<?php echo esc_attr( $C['muted'] ); ?>12">
            <button class="faq-trigger" style="color:<?php echo esc_attr( $C['dark'] ); ?>" aria-expanded="false">
              <span><?php echo esc_html( $item['q'] ); ?></span>
              <span class="faq-chevron"><?php echo easyevents_icon( 'chevron-right', 16 ); ?></span>
            </button>
            <div class="faq-content" style="color:<?php echo esc_attr( $C['dark'] ); ?>88">
              <p><?php echo esc_html( $item['a'] ); ?></p>
            </div>
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
