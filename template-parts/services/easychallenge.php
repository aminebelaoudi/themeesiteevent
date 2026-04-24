<?php
/**
 * EasyChallenge — Full service page (100% React fidelity)
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$C = array(
  'dark'    => '#2a1a08',
  'darker'  => '#1f1406',
  'mid'     => '#3d2a10',
  'accent'  => '#e87c1a',
  'accentL' => '#f59e3b',
  'muted'   => '#8a7258',
  'cream'   => '#fdf8f2',
  'beige'   => '#f5ede2',
);

$keywords = array( 'Team Building', 'Émission TV', 'Outdoor', 'Cohésion', 'Défis', 'Sur mesure', 'Genève', 'Vidéo Best Of' );

$testimonials = array(
  array( 'text' => 'Une expérience incroyable ! Nos équipes en parlent encore. L\'ambiance était au top et l\'animateur exceptionnel. Un vrai moment de cohésion.', 'author' => 'Séminaire', 'company' => 'HR Team, Deloitte' ),
  array( 'text' => 'L\'Odyssée a transformé notre journée de team building. Les épreuves étaient variées, fun et accessibles à tous. On recommande vivement !', 'author' => 'Team Building', 'company' => 'Christophe B.' ),
  array( 'text' => 'L\'Émission TV façon Vendredi tout est permis, c\'est génial ! On a ri du début à la fin. La vidéo souvenir est la cerise sur le gâteau.', 'author' => 'Anniversaire', 'company' => 'Marie &amp; ses amis' ),
);$testimonials = ee_get_testimonials( $post_id, $testimonials );
$products = array(
  array(
    'id'        => 'emission-grand',
    'name'      => "Émission",
    'subtitle'  => 'À partir de 8 personnes',
    'tag'       => 'Best-seller',
    'tagline'   => 'Aujourd\'hui tout est permis',
    'desc'      => "L'émission, une idée de jeux team building parfaite pour des activités après un séminaire. Cette animation immersive s'inspire de l'émission culte et propose une série de défis ludiques et variés. Conviviale et accessible à tous, elle favorise la cohésion d'équipe et le dépassement de soi.",
    'longDesc'  => "Adaptée à la durée de votre événement et au nombre de participants, elle garantit un moment unique et mémorable avec un minimum de trois épreuves. Idéale pour renforcer l'esprit d'équipe et partager un instant de détente après une journée de travail.\n\nÀ l'issue de l'activité, une vidéo d'une minute mettant en lumière les moments forts vous sera transmise sous 72 à 96 heures ouvrées. Sur demande, une version étendue, déclinée en différents formats, peut être réalisée en option.",
    'sessions'  => null,
    'sessionNote' => null,
    'videoNote' => 'Recevez un souvenir unique : votre vidéo personnalisée, montée avec soin dans un esprit d\'émission télé.',
    'videoLink' => 'https://www.easychallenge.ch/wp-content/uploads/2025/10/Anniversaire-Mike-EasyEvents.mp4',
    'partnerNote' => null,
    'partnerLink' => null,
    'price'     => '66.-',
    'priceSuffix' => 'HT / pers.',
    'currency'  => 'CHF',
    'image'     => isset( $img['easychallenge'] ) ? $img['easychallenge'] : 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Duel-du-rire-2.jpg',
    'features'  => array(
      'Animation immersive façon Émission TV avec animateur dédié',
      'Minimum 3 épreuves ludiques et variées (jusqu\'à 9)',
      'Vidéo Best Of d\'une minute transmise sous 72-96h',
      'Adaptée à la durée de votre événement',
      'Conviviale et accessible à tous les niveaux',
      'Idéale après séminaire ou journée de travail',
    ),
    'games' => array(
      array( 'name' => 'Speed Quiz', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Duel-du-rire-2.jpg', 'desc' => "L'animateur pose une question à laquelle le premier joueur doit donner 3 réponses puis buzzer dans le délai imparti. Si la réponse est correcte et respecte le temps, le tour passe au joueur suivant. En revanche, si un participant dépasse le temps, fournit une réponse incorrecte ou répète une réponse déjà donnée, il est éliminé et remplacé par un coéquipier." ),
      array( 'name' => 'Mîme en Bouche', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Mime-en-Bouche-2.jpg', 'desc' => 'Un joueur découvre un objet affiché à l\'écran et doit le faire deviner uniquement en mimant avec sa bouche et en produisant des sons, sans utiliser ses bras, jambes ou mouvements corporels. Le premier joueur qui trouve correctement prend la place du mime. Le jeu continue dans une ambiance ludique et pleine de rires.' ),
      array( 'name' => 'Les Blagues de Tonton', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Les-blagues-de-tonton-2.jpg', 'desc' => 'Deux joueurs s\'affrontent en face à face dans un duel de blagues. L\'un des joueurs lit une blague donnée par l\'animateur, en tentant de faire rire son adversaire. S\'il éclate de rire, il est éliminé et remplacé par un coéquipier. Chaque joueur marque un point pour chaque blague réussissant à faire rire.' ),
      array( 'name' => 'Haut, Bas, Droite, Gauche', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Haut-Bas-Droite-Gauche.jpg', 'desc' => 'Les participants doivent répondre le plus vite possible aux questions posées par l\'animateur en indiquant "haut", "bas", "droite", "gauche" ou un mélange des deux. Cette activité met à l\'épreuve la réactivité et la rapidité des joueurs, tout en assurant des moments de fun et de convivialité !' ),
      array( 'name' => 'Articulé à la Chaîne', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/02/Articule-a-la-Chaine-2.jpg', 'desc' => 'Les participants sont alignés les uns derrière les autres. Le premier doit faire deviner un mot au suivant en articulant clairement. Celui qui reçoit l\'indice porte le casque et ne peut entendre les autres. Cette chaîne de communication crée souvent des malentendus et des situations comiques.' ),
      array( 'name' => 'Dessiner, c\'est Gagné', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/02/Dessiner-cest-Gagne.jpg', 'desc' => 'Un joueur doit dessiner un mot ou une expression sans parler. Son équipe ou ses adversaires tentent de deviner ce qu\'il représente. Le temps est limité, ce qui met la pression et rend l\'activité encore plus palpitante. Un jeu qui vous garantit des moments de rire et de convivialité !' ),
      array( 'name' => 'ATEP Buzz', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/ATEP-BUZZ.jpg', 'desc' => 'Les participants répondent à des questions de culture générale, mais avec une subtilité : leurs deux pieds sont reliés par un lien ! Le buzzer, posé à quelques mètres, doit être atteint le plus rapidement possible. Chaque bonne réponse rapporte un point. Rapide, compétitif et amusant !' ),
      array( 'name' => "L'Écarteur de Bouche", 'image' => get_theme_file_uri( 'assets/images/LEcarteur-de-Bouche.jpg' ), 'desc' => 'Un participant doit, les lèvres écartées par un dispositif, prononcer des mots ou des expressions, afin que son équipe tente de les deviner. Le défi réside dans la difficulté à articuler clairement, rendant les indices souvent hilarants. Une expérience qui allie humour, complicité et un brin de folie !' ),
      array( 'name' => 'Le Bac du Rire', 'image' => get_theme_file_uri( 'assets/images/Le-Petit-Bac-2.jpg' ), 'desc' => 'Les participants doivent trouver des mots correspondant à des catégories (objets, prénoms, pays, animaux, etc.), en commençant par une lettre donnée. Plus il y a de bonnes réponses avant la fin du temps imparti, plus les points sont gagnés !' ),
    ),
    'specs' => array(
      array( 'label' => 'Surface', 'value' => 'Entre 36m² et 75m²' ),
      array( 'label' => 'Participants', 'value' => '8 à 180 pers.' ),
      array( 'label' => 'Réalisation', 'value' => 'Intérieur et Extérieur *' ),
      array( 'label' => 'Durée', 'value' => '~1h30 ou ~3h' ),
      array( 'label' => 'Alimentation', 'value' => '1 Prise Électrique 220v' ),
    ),
  ),
  array(
    'id'        => 'emission-petit',
    'name'      => "Émission",
    'subtitle'  => 'À partir de 2 personnes',
    'tag'       => 'Public',
    'tagline'   => 'Vivez l\'expérience EasyChallenge : L\'Émission TV grandeur nature à Genève, ouverte au public !',
    'desc'      => "Envie d'une soirée originale à Genève, différente d'un escape game ou d'un simple resto ? EasyChallenge vous propose une expérience immersive inédite, façon Émission TV type Vendredi tout est permis, où VOUS êtes les participants !",
    'longDesc'  => "Une soirée complète, rythmée, conviviale, dans un seul et même lieu, plus besoin de courir d'un jeu à un restaurant !\n\nJusqu'ici réservée aux entreprises, cette animation s'ouvre enfin au public. Formez votre équipe de 2, 4, 6, 8 ou 10 personnes et vivez ce concept unique. À partir de 12 personnes, votre groupe profite d'une session privatisée. Sinon, vous vivrez l'expérience avec d'autres challengers, tout en restant dans votre propre équipe ou en vous affrontant lors de duels, selon les épreuves.\n\nVotre soirée immersive se déroule dans un espace privatisé du restaurant partenaire La Fumisterie, à Carouge, lieu chaleureux et reconnu pour sa cuisine italienne et ses pizzas parmi les meilleures de Genève.",
    'sessions'  => array(
      array( 'name' => 'Session 1', 'items' => array( 'Dès 18h30 : apéritif au bar (en sus, facultatif)', '19h00 : début du jeu EasyChallenge (env. 1h)', '20h30 : dîner sur place (en sus, facultatif)' ) ),
      array( 'name' => 'Session 2', 'items' => array( 'Dès 18h30 : apéritif au bar (en sus, facultatif)', '19h00 : dîner sur place (en sus, facultatif)', '20h30 : début du jeu EasyChallenge (env. 1h)' ) ),
      array( 'name' => 'Session 3', 'items' => array( 'Dès 20h : apéritif au bar (en sus, facultatif)', '20h30 : dîner sur place (en sus, facultatif)', '22h00 : début du jeu EasyChallenge (env. 1h)' ) ),
    ),
    'sessionNote' => "Le prix comprend uniquement l'animation EasyChallenge. L'apéritif et le repas (facultatif) sont à la charge des participants, mais tout est réuni sur place pour une soirée fluide, festive et sans déplacement.",
    'videoNote' => 'Recevez un souvenir unique : votre vidéo personnalisée, montée avec soin dans un esprit d\'émission télé.',
    'videoLink' => 'https://www.easychallenge.ch/wp-content/uploads/2025/10/Anniversaire-Mike-EasyEvents.mp4',
    'partnerNote' => "La Fumisterie est l'un de nos partenaires.\nCuisine italienne authentique, pizzas savoureuses et vins choisis, dans une ambiance chaleureuse et conviviale.\n\nFormule repas assis disponible.",
    'partnerLink' => 'https://www.lafumisterie.ch',
    'price'     => '79.-',
    'priceSuffix' => 'TTC / pers.',
    'currency'  => 'CHF',
    'image'     => isset( $img['easychallenge'] ) ? $img['easychallenge'] : 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Haut-Bas-Droite-Gauche.jpg',
    'features'  => array(
      'Ouvert au public dès 2 personnes',
      'Session privatisée dès 12 personnes',
      'Animateur dédié façon Émission TV',
      '3 sessions au choix (18h30 / 19h / 20h)',
      'Vidéo Best Of personnalisée incluse',
      'Partenariat La Fumisterie (Carouge), repas sur place possible',
    ),
    'games' => array(
      array( 'name' => 'Haut, Bas, Droite, Gauche', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Haut-Bas-Droite-Gauche.jpg', 'desc' => 'Épreuve rapide et dynamique : répondez le plus vite possible aux questions-pièges de l\'animateur en indiquant une direction. Réactivité et rapidité sont de mise !' ),
      array( 'name' => 'Articulé à la Chaîne', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/02/Articule-a-la-Chaine-2.jpg', 'desc' => 'Les participants sont alignés les uns derrière les autres. Le premier fait deviner un mot en articulant, le suivant porte un casque. La chaîne crée des malentendus hilarants !' ),
      array( 'name' => 'Dessiner, c\'est Gagné', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/02/Dessiner-cest-Gagne.jpg', 'desc' => 'Un joueur dessine un mot ou une expression sans parler, son équipe doit deviner. Le temps est limité : créativité, communication non verbale et fous rires garantis !' ),
    ),
    'specs' => array(
      array( 'label' => 'Participants', 'value' => '2 à 10+ pers.' ),
      array( 'label' => 'Privatisation', 'value' => 'Dès 12 personnes' ),
      array( 'label' => 'Durée', 'value' => '~1h (animation)' ),
      array( 'label' => 'Lieu', 'value' => 'La Fumisterie, Carouge' ),
    ),
  ),
  array(
    'id'        => 'odyssee',
    'name'      => "L'Odyssée",
    'subtitle'  => 'Team building en plein air',
    'tag'       => 'Outdoor',
    'tagline'   => "L'Odyssée : team building en plein air, une expérience unique!",
    'desc'      => "Plongez dans L'Odyssée, une activité team building en plein air, une expérience unique parfaite pour des activités après un séminaire. Conçue pour profiter des beaux jours, cette aventure immersive propose un minimum de quatre épreuves mêlant ludisme, esprit d'équipe et dépassement de soi.",
    'longDesc'  => "Idéale pour renforcer la cohésion de groupe tout en vivant des moments inoubliables au cœur de la nature.\n\nÀ l'issue de l'activité, une vidéo Best Of mettant en lumière les moments forts vous sera transmise sous 72 à 96 heures ouvrées. Sur demande, une version étendue, déclinée en différents formats, peut être réalisée en option.\n\nNos activités sont conçues pour tous les niveaux et favorisent l'esprit d'équipe dans une ambiance sportive et décontractée.",
    'sessions'  => null,
    'sessionNote' => null,
    'videoNote' => null,
    'videoLink' => null,
    'partnerNote' => null,
    'partnerLink' => null,
    'price'     => '49.-',
    'priceSuffix' => '/ pers.',
    'currency'  => 'CHF',
    'image'     => isset( $img['easyflair'] ) ? $img['easyflair'] : 'https://www.easychallenge.ch/wp-content/uploads/2025/01/SlideBall.jpg',
    'features'  => array(
      'Activités 100% outdoor en plein air',
      'Minimum 4 épreuves sportives et ludiques',
      'Vidéo Best Of transmise sous 72-96h',
      'Adapté à tous les niveaux',
      'Idéal après séminaire ou événement corporate',
      'Disponible dans toute la Suisse',
    ),
    'games' => array(
      array( 'name' => 'SlideBall', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/SlideBall.jpg', 'desc' => 'Plongez dans l\'univers du Baseball revisité ! Sur un terrain recouvert d\'un revêtement glissant, glissez et marquez des points.' ),
      array( 'name' => 'Bubble Football', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Bubble-Football-2.jpg', 'desc' => 'Découvrez une version hilarante du football classique, équipés de bulles géantes !' ),
      array( 'name' => 'Human Bowling', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Human-Bowling.jpg', 'desc' => 'Transformez-vous en boule de bowling, glissez sur une bâche pour tenter de renverser un maximum de quilles géantes.' ),
      array( 'name' => 'Splash &amp; Slide', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Splash-Slide.jpg', 'desc' => 'Testez votre adresse et votre équilibre : les participants doivent transporter un gobelet d\'eau sur un parcours glissant.' ),
      array( 'name' => 'Gliss\'Marelle', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Gliss-Marelle.jpg', 'desc' => 'Revivez vos souvenirs d\'enfance avec la marelle revisitée sur terrain glissant !' ),
      array( 'name' => 'Strike 4', 'image' => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Strike-4.jpg', 'desc' => 'Combinez stratégie et précision : un jeu inédit mêlant puissance et pétanque sur une grille géante.' ),
    ),
    'specs' => array(
      array( 'label' => 'Surface', 'value' => 'Entre 300m² et 2000m²' ),
      array( 'label' => 'Participants', 'value' => '25 à 500 pers. / Odyssée' ),
      array( 'label' => 'Réalisation', 'value' => 'Intérieur et Extérieur' ),
      array( 'label' => 'Durée', 'value' => '~1h30 ou ~3h' ),
      array( 'label' => 'Alimentation', 'value' => '1 Prise Électrique 220v' ),
    ),
  ),
);

$values = array(
  array( 'icon' => 'message', 'title' => 'Communication', 'desc' => 'Développez la communication au sein de vos équipes grâce à des épreuves collaboratives.' ),
  array( 'icon' => 'handshake',   'title' => 'Confiance',      'desc' => 'Renforcez la confiance mutuelle et l\'esprit d\'équipe à travers des défis partagés.' ),
  array( 'icon' => 'users',   'title' => 'Cohésion',       'desc' => 'Créez des liens durables et une cohésion de groupe forte grâce à des expériences mémorables.' ),
  array( 'icon' => 'lightbulb','title' => 'Collaboration',  'desc' => 'Favorisez la collaboration et la créativité collective pour atteindre vos objectifs ensemble.' ),
);

$reasons = array(
  'Renforcer la cohésion et l\'esprit d\'équipe',
  'Améliorer la communication et la collaboration',
  'Booster la motivation et la productivité',
  'Offrir une expérience mémorable en plus ou au sein de l\'entreprise',
  'Valoriser l\'image de l\'entreprise et fidéliser les talents',
);

$stats = array(
  array( 'value' => '2009',  'label' => 'Fondé à Genève' ),
  array( 'value' => '500+',  'label' => 'Événements réalisés' ),
  array( 'value' => '3',     'label' => 'Formules disponibles' ),
  array( 'value' => '24h',   'label' => 'Réponse garantie' ),
);

$stats = ee_get_stats( $post_id, $stats );

$faqItems = array(
  array( 'q' => 'Combien de personnes faut-il pour participer ?', 'a' => "L'Émission Mini est accessible dès 2 personnes. L'Émission classique démarre à 8 personnes et peut accueillir jusqu'à 100 participants. L'Odyssée accueille de 25 à 500 personnes." ),
  array( 'q' => 'Où se déroulent les activités ?', 'a' => "L'Émission se déroule dans un espace privatisé à Genève. L'Odyssée se déroule en extérieur, dans des espaces verts adaptés à Genève et dans la région." ),
  array( 'q' => 'Est-ce adapté aux événements d\'entreprise ?', 'a' => 'Absolument ! Nos activités sont conçues pour les team buildings d\'entreprise, séminaires, journées de cohésion et événements corporate. Nous adaptons le format à vos objectifs.' ),
  array( 'q' => 'Recevons-nous une vidéo souvenir ?', 'a' => "Oui ! Chaque groupe reçoit une vidéo Best Of personnalisée, montée avec soin dans un esprit d'émission TV. La vidéo est transmise sous 72 à 96 heures ouvrées." ),
  array( 'q' => "L'Odyssée peut-elle se faire en intérieur ?", 'a' => "L'Odyssée est principalement conçue pour l'extérieur, mais certaines épreuves peuvent être adaptées en intérieur selon la météo et l'espace disponible." ),
  array( 'q' => 'Comment réserver ?', 'a' => 'Remplissez notre formulaire de devis en ligne ou appelez-nous directement. Nous revenons vers vous sous 24h avec une offre sur mesure adaptée à votre groupe et vos objectifs.' ),
);

$faqItems     = ee_get_faq( $post_id, $faqItems );

$icons_map = array( 'easyflair' => 'wine', 'easyflash' => 'camera', 'easychallenge' => 'trophy', 'easyrelax' => 'coffee', 'easytoilets' => 'droplets' );

/* ── Carbon Fields overrides ──────────────────── */
if ( function_exists( 'carbon_get_post_meta' ) ) {
	$_cf = carbon_get_post_meta( $post_id, 'ec_products' );
	if ( ! empty( $_cf ) ) {
		$products = array();
		foreach ( $_cf as $_r ) {
			$pid = $_r['product_id'] ?? '';
			/* sessions from separate CF field */
			$_all_sess = carbon_get_post_meta( $post_id, 'ec_sessions' );
			$sess = null;
			if ( ! empty( $_all_sess ) ) {
				$sess = array();
				foreach ( $_all_sess as $_s ) {
					if ( ( $_s['session_product'] ?? '' ) === $pid ) {
						$sess[] = array( 'name' => $_s['session_name'] ?? '', 'items' => ee_lines_to_array( $_s['session_items'] ?? '' ) );
					}
				}
				if ( empty( $sess ) ) $sess = null;
			}
			/* games from separate CF field */
			$_all_games = carbon_get_post_meta( $post_id, 'ec_games' );
			$games = array();
			if ( ! empty( $_all_games ) ) {
				foreach ( $_all_games as $_g ) {
					if ( ( $_g['game_product'] ?? '' ) === $pid ) {
						$games[] = array( 'name' => $_g['game_name'] ?? '', 'image' => ee_cf_image( $_g['game_image'] ?? 0 ), 'desc' => $_g['game_desc'] ?? '' );
					}
				}
			}
			$products[] = array(
				'id'          => $pid,
				'name'        => $_r['product_name'] ?? '',
				'subtitle'    => $_r['product_subtitle'] ?? '',
				'tag'         => $_r['product_tag'] ?: null,
				'tagline'     => $_r['product_tagline'] ?? '',
				'desc'        => $_r['product_desc'] ?? '',
				'longDesc'    => $_r['product_long_desc'] ?? '',
				'sessions'    => $sess,
				'sessionNote' => $_r['product_session_note'] ?: null,
				'videoNote'   => $_r['product_video_note'] ?: null,
				'videoLink'   => $_r['product_video_link'] ?: null,
				'partnerNote' => $_r['product_partner_note'] ?: null,
				'partnerLink' => $_r['product_partner_link'] ?: null,
				'price'       => $_r['product_price'] ?? '',
				'priceSuffix' => $_r['product_price_suffix'] ?? '',
				'currency'    => $_r['product_currency'] ?: 'CHF',
				'image'       => ee_cf_image( $_r['product_image'] ?? 0 ),
				'features'    => ee_lines_to_array( $_r['product_features'] ?? '' ),
				'games'       => $games,
				'specs'       => ee_parse_specs( $_r['product_specs'] ?? '' ),
			);
		}
	}

	$_cf = carbon_get_post_meta( $post_id, 'ec_values' );
	if ( ! empty( $_cf ) ) { $values = array(); foreach ( $_cf as $_r ) { $values[] = array( 'icon' => $_r['value_icon'] ?? '', 'title' => $_r['value_title'] ?? '', 'desc' => $_r['value_desc'] ?? '' ); } }

	$_cf_reasons = carbon_get_post_meta( $post_id, 'ec_reasons' );
	if ( ! empty( $_cf_reasons ) ) { $reasons = ee_lines_to_array( $_cf_reasons ); }

	$_kw = carbon_get_post_meta( $post_id, 'ec_keywords' );
	if ( ! empty( $_kw ) ) { $keywords = array_map( 'trim', explode( ',', $_kw ) ); }
}
?>

<?php if ( ee_show_section( $post_id, 'hero' ) ) : ?>
<!-- ━━━━ HERO ━━━━ -->
<section class="service-hero" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
  <div class="service-hero__bg">
    <img src="<?php echo esc_url( $thumb_url ? $thumb_url : $img['easychallenge'] ); ?>" alt="EasyChallenge Team Building" class="service-hero__img" loading="eager">
    <div class="service-hero__overlay-1"></div>
    <div class="service-hero__overlay-2"></div>
    <div class="service-hero__overlay-3"></div>
    <div class="service-hero__overlay-bottom"></div>
  </div>
  <div class="container service-hero__content">
    <nav class="service-hero__breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Accueil</a><span>›</span><span>Services</span><span>›</span><span class="current">EasyChallenge</span></nav>
    <div class="service-hero__pill" style="border-color:<?php echo esc_attr( $C['accent'] ); ?>35"><?php echo easyevents_icon( 'trophy', 13 ); ?><span><?php echo esc_html( ee_get( $post_id, 'hero_badge', 'EasyChallenge · Team Building' ) ); ?></span></div>
    <div style="max-width:42rem">
      <?php $custom_title = ee_get( $post_id, 'hero_title', '' ); ?>
      <?php if ( $custom_title ) : ?>
        <h1 class="hero__title"><?php echo esc_html( $custom_title ); ?></h1>
      <?php else : ?>
        <h1 class="hero__title">Créez des <span style="color:<?php echo esc_attr( $C['accentL'] ); ?>">Souvenirs</span>, pas des Résultats</h1>
      <?php endif; ?>
      <p class="hero__desc"><?php echo esc_html( ee_get( $post_id, 'hero_subtitle', 'Team building innovant en Suisse : Émission TV immersive et activités outdoor pour renforcer la cohésion de vos équipes.' ) ); ?></p>
      <div class="hero__actions">
        <a href="#devis" class="btn btn-hero" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( ee_get( $post_id, 'hero_cta_1', 'Demander un devis' ) ); ?></a>
        <a href="#formules" class="btn btn-hero-outline"><?php echo esc_html( ee_get( $post_id, 'hero_cta_2', 'Voir les formules' ) ); ?> <?php echo easyevents_icon( 'arrow-right', 16 ); ?></a>
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
  <div class="marquee__track">
    <?php foreach ( array_merge( $keywords, $keywords, $keywords, $keywords ) as $w ) : ?>
      <span class="marquee__word"><?php echo esc_html( $w ); ?><span class="marquee__dot" style="background:<?php echo esc_attr( $C['accent'] ); ?>"></span></span>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'why' ) ) : ?>
<!-- ━━━━ WHY TEAM BUILDING ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="two-col-layout">
      <div class="animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>60"></span>Pourquoi nous choisir</span>
        <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:left">Pourquoi faire une activité <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">Team Building</span> ?</h2>
        <ul class="reasons-list">
          <?php foreach ( $reasons as $r ) : ?>
            <li><span class="reason-check" style="background:<?php echo esc_attr( $C['accent'] ); ?>15"><?php echo easyevents_icon( 'check', 13 ); ?></span><?php echo esc_html( $r ); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="animate-on-scroll">
        <div class="intro-image"><img src="<?php echo esc_url( $img['easychallenge'] ); ?>" alt="Team building EasyChallenge"></div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'products' ) ) : ?>
<!-- ━━━━ PRODUCT TABS ━━━━ -->
<section id="formules" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span>Nos formules<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Choisissez votre <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">expérience</span></h2>
      <p class="svc-subtitle" style="color:<?php echo esc_attr( $C['muted'] ); ?>">Trois formules pour tous les formats : du duo au grand groupe, en intérieur comme en extérieur.</p>
    </div>

    <div class="product-tabs" data-tabs="easychallenge-products">
      <?php foreach ( $products as $i => $p ) : ?>
        <button class="product-tab<?php echo $i === 0 ? ' product-tab--active' : ''; ?><?php echo ! empty( $p['tag'] ) ? ' product-tab--has-badge' : ''; ?>" data-panel="<?php echo esc_attr( $p['id'] ); ?>" style="--tab-accent:<?php echo esc_attr( $C['accent'] ); ?>">
          <?php echo $p['id'] === 'odyssee' ? easyevents_icon( 'tree-pine', 14 ) : easyevents_icon( 'tv', 14 ); ?>
          <span style="display:flex;flex-direction:column;align-items:center;gap:.1rem;line-height:1.2">
            <span><?php echo esc_html( $p['name'] ); ?></span>
            <?php if ( ! empty( $p['subtitle'] ) ) : ?><span style="font-size:.65rem;font-weight:400;opacity:.75"><?php echo esc_html( $p['subtitle'] ); ?></span><?php endif; ?>
          </span>
          <?php if ( $p['tag'] ) : ?><span class="product-tab__badge"><?php echo esc_html( $p['tag'] ); ?></span><?php endif; ?>
        </button>
      <?php endforeach; ?>
    </div>

    <?php
    $panel_imgs = array(
      'emission-grand' => get_theme_file_uri( 'assets/images/aujourdhui-tout-est-permis-768x444.jpg' ),
      'emission-petit' => get_theme_file_uri( 'assets/images/emission-tv-r5u6n95w7rlhyvx2dqy0t5jf13l0ycxu6i2rags53g.jpg' ),
      'odyssee'        => get_theme_file_uri( 'assets/images/Odyssee-768x516.jpg' ),
    );
    $feature_imgs = array(
      'emission-grand' => get_theme_file_uri( 'assets/images/groupe-moins-de-10-pers.jpg' ),
      'emission-petit' => get_theme_file_uri( 'assets/images/groupe-plus-de-10-pers.png' ),
      'odyssee'        => 'https://www.easychallenge.ch/wp-content/uploads/2025/01/Bubble-Football-2.jpg',
    );
    ?>

    <?php foreach ( $products as $i => $p ) : ?>
      <div class="product-panel<?php echo $i === 0 ? ' product-panel--active' : ''; ?>" id="<?php echo esc_attr( $p['id'] ); ?>" style="--tab-accent:<?php echo esc_attr( $C['accent'] ); ?>">
        <div style="display:flex;align-items:center;gap:2.25rem;margin-bottom:2.5rem;flex-wrap:wrap">
          <div style="flex:1;min-width:260px">
            <h3 class="product-panel__title" style="text-align:left;margin-bottom:.5rem"><?php echo esc_html( $p['name'] ); ?></h3>
            <p class="product-panel__subtitle" style="text-align:left"><?php echo esc_html( $p['subtitle'] ); ?></p>
            <p class="product-panel__tagline" style="color:<?php echo esc_attr( $C['accent'] ); ?>;text-align:left"><?php echo esc_html( $p['tagline'] ); ?></p>
            <?php if ( ! empty( $panel_imgs[ $p['id'] ] ) ) : ?>
            <div class="panel-img--mobile"><img src="<?php echo esc_url( $panel_imgs[ $p['id'] ] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>" style="width:100%;height:200px;object-fit:cover;display:block" loading="lazy"></div>
            <?php endif; ?>
            <p class="product-panel__desc" style="margin:0;text-align:left;max-width:none"><?php echo esc_html( $p['desc'] ); ?></p>
          </div>
          <?php if ( ! empty( $panel_imgs[ $p['id'] ] ) ) : ?>
            <div class="panel-img--desktop" style="flex-shrink:0;width:320px;max-width:100%;border-radius:1rem;overflow:hidden;box-shadow:0 10px 28px rgba(0,0,0,.14);position:relative">
              <img src="<?php echo esc_url( $panel_imgs[ $p['id'] ] ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>" style="width:100%;height:210px;object-fit:cover;display:block" loading="lazy">
              <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(25,17,8,.5),transparent 55%)"></div>
            </div>
          <?php endif; ?>
        </div>

        <div class="product-panel__longdesc">
          <?php foreach ( explode( "\n\n", $p['longDesc'] ) as $para ) : ?>
            <p><?php echo esc_html( $para ); ?></p>
          <?php endforeach; ?>
        </div>

        <!-- Sessions (emission-petit) -->
        <?php if ( $p['sessions'] ) : ?>
          <div class="sessions-grid">
            <?php foreach ( $p['sessions'] as $s ) : ?>
              <div class="session-card">
                <h5 style="color:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( $s['name'] ); ?></h5>
                <ul><?php foreach ( $s['items'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if ( $p['sessionNote'] ) : ?><p class="session-note"><?php echo esc_html( $p['sessionNote'] ); ?></p><?php endif; ?>
        <?php endif; ?>

        <!-- Video note -->
        <?php if ( $p['videoNote'] ) : ?>
          <div class="video-note-block" style="background:<?php echo esc_attr( $C['accent'] ); ?>08;border:1px solid <?php echo esc_attr( $C['accent'] ); ?>15">
            <div class="video-note-block__header">
              <div class="video-note-block__icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>10"><?php echo easyevents_icon( 'star', 22 ); ?></div>
              <h4>Vidéo <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">Best Of</span></h4>
              <p><?php echo esc_html( $p['videoNote'] ); ?></p>
            </div>
            <?php if ( $p['videoLink'] ) : ?>
              <div class="video-note-block__player">
                <video controls playsinline preload="metadata"><source src="<?php echo esc_url( $p['videoLink'] ); ?>" type="video/mp4"></video>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <!-- Features + Image -->
        <div class="product-panel__features-grid">
          <div class="product-panel__features">
            <h4 style="font-weight:800;font-size:1.25rem;margin-bottom:1.5rem">Les <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">+</span> de <?php echo esc_html( $p['name'] ); ?></h4>
            <ul class="features-list">
              <?php foreach ( $p['features'] as $f ) : ?>
                <li><?php echo easyevents_icon( 'check-circle', 16 ); ?><span><?php echo esc_html( $f ); ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php
          $feat_img = ! empty( $feature_imgs[ $p['id'] ] ) ? $feature_imgs[ $p['id'] ] : $p['image'];
          ?>
          <?php if ( $feat_img ) : ?>
            <div class="product-panel__image" style="height:320px;position:relative">
              <img src="<?php echo esc_url( $feat_img ); ?>" alt="<?php echo esc_attr( $p['name'] ); ?>">
              <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.4),transparent,transparent)"></div>
              <?php if ( $p['tag'] ) : ?><div class="product-panel__image-tag" style="background:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo esc_html( $p['tag'] ); ?></div><?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Games -->
        <?php if ( ! empty( $p['games'] ) ) : ?>
          <div class="games-section">
            <h4>Les <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">épreuves</span></h4>
            <div class="games-grid">
              <?php foreach ( $p['games'] as $g ) : ?>
                <div class="game-card">
                  <?php if ( $g['image'] ) : ?>
                    <div class="game-card__img">
                      <img src="<?php echo esc_url( $g['image'] ); ?>" alt="<?php echo esc_attr( $g['name'] ); ?>" loading="lazy">
                      <div class="game-card__img-overlay"></div>
                      <h5 class="game-card__img-name"><?php echo esc_html( $g['name'] ); ?></h5>
                    </div>
                  <?php else : ?>
                    <div class="game-card__placeholder" style="background:<?php echo esc_attr( $C['accent'] ); ?>08">
                      <?php echo easyevents_icon( 'zap', 32 ); ?>
                      <h5 class="game-card__img-name game-card__img-name--static"><?php echo esc_html( $g['name'] ); ?></h5>
                    </div>
                  <?php endif; ?>
                  <div class="game-card__body">
                    <p><?php echo esc_html( $g['desc'] ); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Specs -->
        <div class="specs-grid">
          <?php foreach ( $p['specs'] as $s ) : ?><div class="spec-item"><p class="spec-item__label"><?php echo esc_html( $s['label'] ); ?></p><p class="spec-item__value"><?php echo esc_html( $s['value'] ); ?></p></div><?php endforeach; ?>
        </div>

        <!-- Partner note -->
        <?php if ( $p['partnerNote'] ) : ?>
          <div class="partner-note-block">
            <div class="partner-note-block__icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>10"><?php echo easyevents_icon( 'wine', 20 ); ?></div>
            <div class="partner-note-block__content">
              <h5>La Fumisterie, Carouge</h5>
              <?php foreach ( explode( "\n\n", $p['partnerNote'] ) as $para ) : ?><p><?php echo esc_html( $para ); ?></p><?php endforeach; ?>
              <?php if ( $p['partnerLink'] ) : ?><a href="<?php echo esc_url( $p['partnerLink'] ); ?>" target="_blank" rel="noopener" class="partner-note-block__link" style="color:<?php echo esc_attr( $C['accent'] ); ?>">Visiter le site <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a><?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Price -->
        <div class="product-price">
          <p class="product-price__label">À partir de</p>
          <p class="product-price__amount"><?php echo esc_html( $p['price'] ); ?><span class="product-price__currency"><?php echo esc_html( $p['currency'] ); ?></span></p>
          <p class="product-price__suffix"><?php echo esc_html( $p['priceSuffix'] ); ?></p>
          <a href="#devis" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Demander mon devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>
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
          <div class="testimonial-stars"><?php for ($j=0;$j<5;$j++) echo easyevents_icon('star',12); ?></div>
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
<!-- ━━━━ BRAND CTA ━━━━ -->
<section id="devis" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="brand-block animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
      <div class="brand-block__dots"></div>
      <div class="brand-block__glow" style="background:radial-gradient(ellipse at 80% 40%,<?php echo esc_attr( $C['accent'] ); ?>14,transparent 60%)"></div>
      <div class="brand-block__inner brand-block__inner--2col">
        <div class="brand-block__text">
          <span class="svc-label" style="color:<?php echo esc_attr( $C['accentL'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accentL'] ); ?>40"></span>Team Building &amp; Animations</span>
          <h2 style="color:#fff">Easy<span class="italic" style="color:<?php echo esc_attr( $C['accentL'] ); ?>">Challenge</span></h2>
          <p style="color:rgba(255,255,255,.5)">Depuis 2018, EasyChallenge crée des expériences team building mémorables dans toute la Suisse. Émission TV immersive, activités outdoor et animations sur mesure pour renforcer la cohésion de vos équipes.</p>
          <div class="brand-tags">
            <?php foreach ( array( 'Clé en main', 'Depuis 2018', 'Vidéo incluse', 'Toute la Suisse' ) as $tag ) : ?>
              <span style="color:<?php echo esc_attr( $C['accentL'] ); ?>;border-color:<?php echo esc_attr( $C['accentL'] ); ?>25;background:<?php echo esc_attr( $C['accentL'] ); ?>08"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
          <a href="/#contact" class="btn btn-service" style="background:<?php echo esc_attr( $C['accent'] ); ?>">Demander votre devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>
        <div class="brand-block__images brand-block__images--mosaic">
          <div class="brand-block__img-wrap brand-block__img-wrap--float-a"><img src="<?php echo esc_url( $img['easychallenge'] ); ?>" alt="Team Building" loading="lazy"></div>
          <div class="brand-block__img-wrap brand-block__img-wrap--float-b"><img src="<?php echo esc_url( $img['easychallenge-brand-b'] ); ?>" alt="Duel du rire" loading="lazy"></div>
          <div class="brand-block__img-wrap brand-block__img-wrap--float-c"><img src="<?php echo esc_url( $img['easychallenge-brand-c'] ); ?>" alt="SlideBall" loading="lazy"></div>
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
      <span class="svc-label" style="color:<?php echo esc_attr( $C['accent'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span>Nos valeurs<span class="svc-label__line" style="background:<?php echo esc_attr( $C['accent'] ); ?>40"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Pourquoi choisir <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">EasyChallenge</span> ?</h2>
    </div>
    <div class="values-grid values-grid--4 animate-on-scroll">
      <?php foreach ( $values as $v ) : ?>
        <div class="value-card" style="border-color:<?php echo esc_attr( $C['muted'] ); ?>12">
          <div class="value-card__icon" style="background:<?php echo esc_attr( $C['accent'] ); ?>15;color:<?php echo esc_attr( $C['accent'] ); ?>"><?php echo easyevents_icon( $v['icon'], 24 ); ?></div>
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
      <div><span class="svc-label" style="color:<?php echo esc_attr( $C['accentL'] ); ?>">EasyEvents Group</span><h2 style="color:#fff">Découvrez nos <span style="color:<?php echo esc_attr( $C['accentL'] ); ?>">autres expertises</span></h2></div>
      <a href="<?php echo esc_url( home_url('/') ); ?>" style="color:<?php echo esc_attr( $C['accentL'] ); ?>">Tous les services <?php echo easyevents_icon('arrow-right',14); ?></a>
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
        <span class="svc-label" style="color:<?php echo esc_attr( $C['muted'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['muted'] ); ?>60"></span>FAQ</span>
        <h2 style="color:<?php echo esc_attr( $C['dark'] ); ?>">Questions <span style="color:<?php echo esc_attr( $C['accent'] ); ?>">fréquentes</span></h2>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88">Tout ce que vous devez savoir sur nos activités team building avant de réserver.</p>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;font-size:.875rem">Une question spécifique ? Contactez-nous directement.</p>
        <a href="tel:<?php echo esc_attr( str_replace(' ', '', ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ) ); ?>" class="faq-phone-btn" style="background:<?php echo esc_attr( $C['dark'] ); ?>;color:<?php echo esc_attr( $C['cream'] ); ?>"><?php echo easyevents_icon('phone',14); ?> <?php echo esc_html( ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ); ?></a>
      </div>
      <div class="faq-items animate-on-scroll">
        <?php foreach ( $faqItems as $i => $item ) : ?>
          <div class="faq-item" style="border-color:<?php echo esc_attr( $C['muted'] ); ?>12">
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
