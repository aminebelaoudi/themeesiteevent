<?php
/**
 * Carbon Fields — Service page content
 * Provides admin-editable fields for all service-specific content.
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ── Helpers ─────────────────────────────────── */

/**
 * Split a textarea value into an array of non-empty trimmed lines.
 */
function ee_lines_to_array( $text ) {
	if ( empty( $text ) ) return array();
	return array_values( array_filter( array_map( 'trim', explode( "\n", $text ) ) ) );
}

/**
 * Auto-seed EasyFlash Carbon Fields defaults in admin when fields are empty.
 */
add_action( 'load-post.php', 'easyevents_seed_easyflash_carbon_defaults' );

function easyevents_seed_easyflash_carbon_defaults() {
	if ( ! is_admin() || ! function_exists( 'carbon_get_post_meta' ) || ! function_exists( 'carbon_set_post_meta' ) ) {
		return;
	}

	$post_id = isset( $_GET['post'] ) ? absint( $_GET['post'] ) : 0;
	if ( ! $post_id ) {
		return;
	}

	$post = get_post( $post_id );
	if ( ! $post || 'page' !== $post->post_type ) {
		return;
	}

	$uri = get_page_uri( $post_id );
	if ( 'easyflash' !== $post->post_name && false === strpos( (string) $uri, 'easyflash' ) ) {
		return;
	}

	$products = carbon_get_post_meta( $post_id, 'ef_products' );
	$values   = carbon_get_post_meta( $post_id, 'ef_values' );
	$keywords = carbon_get_post_meta( $post_id, 'ef_keywords' );
	$bonus    = carbon_get_post_meta( $post_id, 'ef_bonus_sections' );

	if ( empty( $products ) ) {
		carbon_set_post_meta( $post_id, 'ef_products', array(
			array(
				'product_id' => 'easybox-bw',
				'product_name' => 'EasyBox',
				'product_location_title' => 'Location Photobooth EasyBox',
				'product_is_new' => false,
				'product_tag' => 'Best-seller',
				'product_tagline' => 'Une experience photo unique pour sublimer vos evenements',
				'product_desc' => 'Creez des souvenirs inoubliables et partagez des moments d exception avec vos invites. Disponible a Geneve et dans toute la Suisse.',
				'product_long_desc' => "Qui n a jamais reve de ce moment ou convives et animation ne font qu un ?\n\nAvec l EasyBox, Easyflash vous accompagne dans la reussite de vos evenements (mariage, anniversaire, soiree corporate, inauguration...) grace a un photobooth moderne, intuitif et entierement personnalisable.\n\nAucune preparation necessaire : choisissez votre borne, personnalisez-la selon vos envies, et nous nous chargeons du reste. Notre objectif : vous offrir un moment de plaisir, que ce soit pour quelques heures, une journee ou tout un week-end.",
				'product_precisions' => "Disponible en finitions elegantes : noire ou bois\nS integre facilement a tous les styles d evenements\nVersion avec pied court disponible pour des prises de vue assises\nConfiguration flexible selon l espace et vos besoins",
				'product_price' => '349.-',
				'product_currency' => 'CHF',
				'product_image_url' => 'https://www.easyflash.ch/wp-content/uploads/2020/04/location-photomaton.jpg',
				'product_features' => "Livraison & montage de l EasyBox par vos soins ou par Easyflash\nHoraires et photos numeriques illimites en qualite Haute Definition\n3 modes : Print / GIF / Boomerang\nImpression et/ou envoi smartphone instantanes\nPersonnalisations possibles\nPacks d accessoires en option\nDemontage & recuperation par vos soins ou Easyflash",
				'product_specs' => "Finitions: Noire ou bois\nVersion assise: Pied court disponible\nModes: Print / GIF / Boomerang\nPartage: Impression + envoi smartphone via Wi-Fi\nDisponibilite: Geneve et toute la Suisse\nPrix: A partir de 349.- CHF",
			),
			array(
				'product_id' => 'easybox-miroir',
				'product_name' => 'EasyBox Miroir',
				'product_location_title' => 'Location Photobooth EasyBox Miroir',
				'product_is_new' => false,
				'product_tag' => 'Glamour',
				'product_tagline' => 'Miroir, mon beau miroir... dis-moi qui est la plus belle ?',
				'product_desc' => 'Le Photobooth EasyBox Miroir est l attraction que tout le monde veut !',
				'product_long_desc' => "Le Photobooth EasyBox Miroir degage un fort pouvoir d attraction et de seduction.\n\nDevant le Photobooth EasyBox Miroir, vos convives laisseront libre cours a leur imagination.",
				'product_precisions' => "Ecran pleine hauteur (portrait)\nAnimations et messages personnalisables\nArriere-plan personnalisable",
				'product_price' => '690.-',
				'product_currency' => 'CHF',
				'product_image_url' => 'https://www.easyflash.ch/wp-content/uploads/2019/12/easyflash-miroir2.jpg',
				'product_features' => "Photos numeriques illimitees HD\n3 modes : Print / GIF / Boomerang\nImpression et/ou envoi smartphone instantanes\nLien vers photos numeriques en 24h-48h\nPersonnalisation possible\nPacks d accessoires en option\nLivraison et montage inclus",
				'product_specs' => "Format: Miroir pleine hauteur (portrait)\nEspace requis: 3 m x 3 m minimum\nAlimentation: Prise murale standard dediee\nCapacite: 1 a 5 personnes\nPartage: Instantane + liens 24h-48h\nInstallation: Livraison & montage inclus",
			),
			array(
				'product_id' => 'easybox-360',
				'product_name' => 'EasyBox 360deg',
				'product_location_title' => 'Location Photobooth EasyBox Rotatif 360deg',
				'product_is_new' => false,
				'product_tag' => 'Tendance',
				'product_tagline' => 'Plus qu un divertissement, voici une animation innovante',
				'product_desc' => 'Creez en direct vos videos en mode Selfies 360deg.',
				'product_long_desc' => "Un rendu dynamique proche de l univers du cinema.\n\nTechnologie 360deg pour un mini film a effet WOUHAOU.",
				'product_precisions' => "Plate-forme de 80 cm de diametre\n2 a 3 personnes max\nArriere-plan personnalisable",
				'product_price' => '690.-',
				'product_currency' => 'CHF',
				'product_image_url' => 'https://www.easyflash.ch/wp-content/uploads/2018/03/photoboth-360-994x1024.jpeg',
				'product_features' => "Videos illimitees HD\nEnvoi smartphone instantane\nPersonnalisation logo/slogan\nPacks d accessoires en option\nEspace requis : 4 m x 4 m\nLivraison et montage inclus",
				'product_specs' => "Plateforme: 80 cm de diametre\nCapacite: 2 a 3 personnes max\nEspace requis: 4 m x 4 m minimum\nAlimentation: Prise murale standard dediee\nPartage: Wi-Fi instantane + liens 24h-48h\nInstallation: Livraison & montage inclus",
			),
			array(
				'product_id' => 'easybox-iris',
				'product_name' => 'EasyBox Iris',
				'product_location_title' => 'Location Photobooth IRIS',
				'product_is_new' => true,
				'product_tag' => '',
				'product_tagline' => 'Bien plus qu un photobooth. Une animation exclusive.',
				'product_desc' => 'Capturez l iris de vos invites et offrez une experience unique.',
				'product_long_desc' => "Animation PhotoBooth Iris dediee aux evenements professionnels.\n\nChaque participant repart avec une creation visuelle unique en HD.",
				'product_precisions' => "Concu pour les evenements professionnels\nMode Iris exclusif\nPersonnalisation avec identite visuelle",
				'product_price' => '1790.-',
				'product_currency' => 'CHF',
				'product_image_url' => 'https://www.easyflash.ch/wp-content/uploads/2018/03/PhotoBooth-Iris-banner.jpeg',
				'product_features' => "Installation cle en main\nCreations numeriques illimitees HD\nMode Iris exclusif\nEnvoi instantane sur smartphone\nPersonnalisation avancee\nDemontage et recuperation inclus",
				'product_specs' => "Public cible: Evenements corporate & professionnels\nInstallation: Cle en main par EasyFlash\nMode: Capture d iris exclusive\nLivrable: Creation numerique HD\nPartage: Wi-Fi instantane + liens 24h-48h\nDisponibilite: Geneve - Suisse francophone",
			),
		) );
	}

	if ( empty( $values ) ) {
		carbon_set_post_meta( $post_id, 'ef_values', array(
			array(
				'value_icon' => 'award',
				'value_title' => 'Professionnalisme',
				'value_desc' => 'Nous mettons notre professionnalisme a votre service. Toute notre equipe est a votre ecoute.',
			),
			array(
				'value_icon' => 'eye',
				'value_title' => 'Transparence',
				'value_desc' => 'Nous etablissons votre devis personnalise selon vos souhaits, sans surprise.',
			),
			array(
				'value_icon' => 'sliders',
				'value_title' => 'Personnalisation',
				'value_desc' => 'Nos prestations EasyBox sont personnalisees afin de repondre a vos attentes.',
			),
		) );
	}

	if ( empty( $keywords ) ) {
		carbon_set_post_meta( $post_id, 'ef_keywords', 'PhotoBooth, Impression HD, Video 360deg, Iris, Evenements, Sur mesure, Geneve, Animation photo' );
	}

	if ( empty( $bonus ) ) {
		carbon_set_post_meta( $post_id, 'ef_bonus_sections', array(
			array(
				'bonus_product_id' => 'easybox-iris',
				'bonus_section_key' => 'iris-1',
				'bonus_title' => '1. Decouvrez le PhotoBooth IRIS',
				'bonus_paragraphs' => "Le PhotoBooth Iris est propose dans une version unique, concue specialement pour les evenements professionnels.\nSon design sobre et elegant s integre parfaitement aux soirees d entreprise, evenements corporate et animations haut de gamme.",
				'bonus_price' => 'A partir de 1790.- CHF',
				'bonus_images' => 'https://www.easyflash.ch/wp-content/uploads/2018/03/PhotoBooth-IRIS-Black.png',
				'bonus_image_labels' => 'Version exclusive PhotoBooth IRIS',
			),
			array(
				'bonus_product_id' => 'easybox-iris',
				'bonus_section_key' => 'iris-2',
				'bonus_title' => '2. Personnalisez votre visuel (le petit plus)',
				'bonus_paragraphs' => "Avec EasyFlash, la personnalisation du visuel de votre creation Iris est prise en charge par notre equipe.\nVous nous transmettez votre logo, un slogan ou un message, et nous integrons ces elements directement sur le cadre autour de l iris, dans le respect de votre identite visuelle.\nConcu pour les evenements d entreprise (soiree corporate, lancement de produit, seminaire, cocktail, inauguration...) avec une personnalisation elegante et discrete.\nDecouvrez les possibilites de personnalisation de vos visuels en cliquant ici : https://www.easyflash.ch/templates-paysage/",
				'bonus_price' => 'Prix offert',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-1.jpeg\nhttps://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-2.jpeg\nhttps://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-3.jpeg\nhttps://www.easyflash.ch/wp-content/uploads/2018/03/template-PhotoBooth-IRIS-4.jpeg",
			),
			array(
				'bonus_product_id' => 'easybox-iris',
				'bonus_section_key' => 'iris-steps',
				'bonus_title' => 'Comment ca marche ? Une experience unique, en toute simplicite...',
				'bonus_list_items' => "Positionnement|Placez-vous devant le PhotoBooth Iris, concu pour une capture precise et elegante.\nInterface tactile|Notre equipe lance le processus. L interface guide chaque prise pour un resultat optimal.\nCapture de l iris|La prise de vue est realisee en quelques secondes. Chaque iris devient une oeuvre unique.\nPersonnalisation|Nous integrons votre logo ou message autour de l iris pour un rendu a votre image.\nReception & partage|Imprime, envoye sur smartphone ou partage sur les reseaux sociaux.",
				'bonus_cta_text' => 'Obtenir une estimation gratuite',
				'bonus_cta_url' => 'https://www.easyflash.ch/devis-easyflash/?utm_source=EasyEvents',
			),
			array(
				'bonus_product_id' => 'easybox-iris',
				'bonus_section_key' => 'iris-faq',
				'bonus_title' => 'FAQ',
				'bonus_list_items' => "Qu'est-ce qu'un PhotoBooth Iris ?|Le PhotoBooth Iris est une animation evenementielle exclusive qui capture l iris de vos invites et le transforme en une creation visuelle artistique unique, envoyee instantanement en haute definition.\nLe PhotoBooth Iris est-il adapte aux evenements d entreprise ?|Absolument. Il est specialement concu pour les soirees d entreprise, lancements de produit, seminaires, cocktails corporate et inaugurations. C est une animation haut de gamme qui valorise l image de marque.\nPeut-on personnaliser le visuel avec un logo ou un slogan ?|Oui. Nous integrons votre identite visuelle (logo, slogan, message) directement autour de la creation iris.\nCombien de personnes peuvent participer au PhotoBooth Iris ?|La duree est flexible et les creations sont illimitees.\nSur quels types d evenements installer un PhotoBooth Iris ?|Soiree d entreprise, lancement de produit, seminaire, cocktail corporate, inauguration, gala, evenement de prestige.",
			),
			array(
				'bonus_product_id' => 'easybox-bw',
				'bonus_section_key' => 'bw-1',
				'bonus_title' => '1. Choisissez votre PhotoBooth EasyBox',
				'bonus_paragraphs' => "Nos Photobooth peuvent avoir 2 finitions differentes (noire ou bois).\nNous avons egalement une version avec le pied plus court pour une prise de photo assise.",
				'bonus_price' => 'A partir de 349.-CHF',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/04/location-photobooth.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/04/photobooth-mariage-1.jpg",
				'bonus_image_labels' => "Black Box\nWood Box",
			),
			array(
				'bonus_product_id' => 'easybox-bw',
				'bonus_section_key' => 'bw-2',
				'bonus_title' => '2. Choisissez votre pack d accessoires indispensables',
				'bonus_paragraphs' => 'Pour agrementer vos photos, nous vous proposons un choix de 3 packs d accessoires.',
				'bonus_price' => 'A partir de 29.- CHF',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-cadre-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-props-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-pancarte-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-premium-contour.jpg",
				'bonus_image_labels' => "Accessoires Cadres\nAccessoires Props\nAccessoires Pancartes\nAccessoires Premium",
			),
			array(
				'bonus_product_id' => 'easybox-bw',
				'bonus_section_key' => 'bw-3',
				'bonus_title' => '3. Choisissez votre template (le petit plus)',
				'bonus_paragraphs' => 'Ajoutez un cadre graphique personnalise pour renforcer votre identite visuelle.',
				'bonus_price' => 'Prix offert',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2019/11/template4.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2019/11/template5.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2019/11/template13.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2019/11/template15.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2019/11/template17.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2019/11/template18.jpg",
			),
			array(
				'bonus_product_id' => 'easybox-bw',
				'bonus_section_key' => 'bw-4',
				'bonus_title' => '4. Choisissez votre toile de fond (la touche finale)',
				'bonus_paragraphs' => 'Selectionnez un fond adapte a l ambiance de votre evenement.',
				'bonus_price' => 'A partir de 149.- CHF',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5472.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5437.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5615.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5555.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5653.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/C-50.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5627.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5655.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5449.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5681.jpg",
			),
			array(
				'bonus_product_id' => 'easybox-bw',
				'bonus_section_key' => 'bw-steps',
				'bonus_title' => 'Comment ca marche ? Un vrai jeu d enfant...',
				'bonus_list_items' => "Preparation|\nValidation|\nPrise de vue|\nImpression|\nPartage|",
				'bonus_cta_text' => 'Obtenir une estimation gratuite',
				'bonus_cta_url' => 'https://www.easyflash.ch/devis-easyflash/?utm_source=EasyEvents',
			),
			array(
				'bonus_product_id' => 'easybox-miroir',
				'bonus_section_key' => 'miroir-1',
				'bonus_title' => '1. Choisissez votre pack d accessoires indispensables',
				'bonus_paragraphs' => 'Pour agrementer vos photos, nous vous proposons un choix de 3 packs d accessoires.',
				'bonus_list_items' => "Pack Standard (cadres, panneaux ou props)\nPack Premium (divers tailles et couleurs de chapeaux & lunettes...)\nPack sur mesure (accessoires selon votre theme)",
				'bonus_price' => 'A partir de 29.- CHF',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-cadre-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-props-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-pancarte-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-premium-contour.jpg",
				'bonus_image_labels' => "Accessoires Cadres\nAccessoires Props\nAccessoires Pancartes\nAccessoires Premium",
			),
			array(
				'bonus_product_id' => 'easybox-miroir',
				'bonus_section_key' => 'miroir-2',
				'bonus_title' => '2. Choisissez votre template (le petit plus)',
				'bonus_paragraphs' => "Avec EasyFlash, rien de plus simple que de personnaliser le contour de vos photos en quelques clics !\nUn choix de plusieurs centaines de templates pour tous les types d evenements.",
				'bonus_price' => 'Prix offert',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/03/template-6.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/template-3.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/template-1-1.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/template-4.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/template-8.png\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/template-5.jpg",
			),
			array(
				'bonus_product_id' => 'easybox-miroir',
				'bonus_section_key' => 'miroir-3',
				'bonus_title' => '3. Choisissez votre toile de fond (la touche finale)',
				'bonus_paragraphs' => 'Nous mettons a votre disposition un large choix de toiles de fond pour tous types d evenements.',
				'bonus_price' => 'A partir de 79.- CHF',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5472.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5437.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5615.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5555.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5653.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/C-50.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5627.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5655.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5449.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/IMG_5681.jpg",
			),
			array(
				'bonus_product_id' => 'easybox-miroir',
				'bonus_section_key' => 'miroir-steps',
				'bonus_title' => 'Comment ca marche ? Facile...',
				'bonus_list_items' => "Positionnement|\nDemarrage|\nPrise de vue|\nImpression|\nPartage|",
				'bonus_cta_text' => 'Obtenir une estimation gratuite',
				'bonus_cta_url' => 'https://www.easyflash.ch/devis-easyflash/?utm_source=EasyEvents',
			),
			array(
				'bonus_product_id' => 'easybox-360',
				'bonus_section_key' => '360-1',
				'bonus_title' => '1. Choisissez votre pack d accessoires indispensables',
				'bonus_paragraphs' => 'Pour agrementer vos videos, nous vous proposons un choix de 3 packs d accessoires.',
				'bonus_list_items' => "Pack Standard (cadres, panneaux ou props)\nPack Premium (divers tailles et couleurs de chapeaux & lunettes...)\nPack sur mesure (accessoires selon votre theme)",
				'bonus_price' => 'A partir de 29.- CHF',
				'bonus_images' => "https://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-cadre-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-props-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-pancarte-contour.jpg\nhttps://www.easyflash.ch/wp-content/uploads/2020/03/accessoires-premium-contour.jpg",
				'bonus_image_labels' => "Accessoires Cadres\nAccessoires Props\nAccessoires Pancartes\nAccessoires Premium",
			),
			array(
				'bonus_product_id' => 'easybox-360',
				'bonus_section_key' => '360-video',
				'bonus_video_url' => 'https://www.easyflash.ch/wp-content/uploads/2020/11/video-photoboth-360-degree.mp4',
			),
		) );
	}
}

/**
 * Parse "Label: Value" textarea into array of ['label'=>...,'value'=>...].
 */
function ee_parse_specs( $text ) {
	$lines = ee_lines_to_array( $text );
	$specs  = array();
	foreach ( $lines as $line ) {
		$parts = explode( ':', $line, 2 );
		if ( count( $parts ) === 2 ) {
			$specs[] = array( 'label' => trim( $parts[0] ), 'value' => trim( $parts[1] ) );
		}
	}
	return $specs;
}

/**
 * Get image URL from CF attachment ID, with fallback.
 */
function ee_cf_image( $id, $fallback = '', $size = 'large' ) {
	if ( empty( $id ) ) return $fallback;
	$url = wp_get_attachment_image_url( $id, $size );
	return $url ? $url : $fallback;
}

/* ── Register fields ─────────────────────────── */
add_action( 'carbon_fields_register_fields', 'easyevents_register_service_content_fields' );

function easyevents_register_service_content_fields() {
	if ( ! class_exists( '\Carbon_Fields\Container' ) ) return;

	$C = '\Carbon_Fields\Container';
	$F = '\Carbon_Fields\Field';

	/* Resolve service page IDs */
	$pages = array();
	foreach ( array( 'easyflair', 'easyflash', 'easychallenge', 'easyrelax', 'easytoilets' ) as $s ) {
		$p = get_page_by_path( 'services/' . $s );
		if ( $p ) $pages[ $s ] = $p->ID;
	}

	/* ═══════════════════════════════════════════
	 * EasyToilets
	 * ═══════════════════════════════════════════ */
	if ( isset( $pages['easytoilets'] ) ) {
		$C::make( 'post_meta', __( 'EasyToilets — Contenu', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easytoilets'] )
			->add_tab( __( 'Notre approche', 'easyevents' ), array(
				$F::make( 'complex', 'et_features', __( 'Arguments', 'easyevents' ) )
					->set_help_text( 'Les 3 arguments de la section « Notre approche ».' )
					->add_fields( array(
						$F::make( 'text', 'feature_icon', __( 'Icône Lucide (leaf, volume-2, shield-check…)', 'easyevents' ) ),
						$F::make( 'text', 'feature_title', __( 'Titre', 'easyevents' ) ),
						$F::make( 'textarea', 'feature_desc', __( 'Description', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Types d\'événements', 'easyevents' ), array(
				$F::make( 'complex', 'et_event_types', __( 'Types', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'event_icon', __( 'Icône Lucide', 'easyevents' ) ),
						$F::make( 'text', 'event_name', __( 'Nom', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Options Premium', 'easyevents' ), array(
				$F::make( 'complex', 'et_options', __( 'Options', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'option_tag', __( 'Tag (ex: Option 01)', 'easyevents' ) ),
						$F::make( 'text', 'option_icon', __( 'Icône Lucide', 'easyevents' ) ),
						$F::make( 'text', 'option_title', __( 'Titre', 'easyevents' ) ),
						$F::make( 'textarea', 'option_desc', __( 'Description', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Défilement', 'easyevents' ), array(
				$F::make( 'text', 'et_keywords', __( 'Mots défilants (séparés par des virgules)', 'easyevents' ) ),
			) );
	}

	/* ═══════════════════════════════════════════
	 * EasyRelax
	 * ═══════════════════════════════════════════ */
	if ( isset( $pages['easyrelax'] ) ) {
		$C::make( 'post_meta', __( 'EasyRelax — Contenu', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyrelax'] )
			->add_tab( __( 'Galerie', 'easyevents' ), array(
				$F::make( 'complex', 'er_gallery', __( 'Images galerie', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'image', 'gallery_image', __( 'Image', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Formules', 'easyevents' ), array(
				$F::make( 'complex', 'er_formulas', __( 'Formules', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'formula_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'textarea', 'formula_desc', __( 'Description', 'easyevents' ) ),
						$F::make( 'textarea', 'formula_includes', __( 'Inclus (1 élément par ligne)', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Défilement', 'easyevents' ), array(
				$F::make( 'text', 'er_keywords', __( 'Mots défilants (virgule)', 'easyevents' ) ),
			) );
	}

	/* ═══════════════════════════════════════════
	 * EasyFlash
	 * ═══════════════════════════════════════════ */
	if ( isset( $pages['easyflash'] ) ) {
		$C::make( 'post_meta', __( 'EasyFlash — Produits', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflash'] )
			->add_fields( array(
				$F::make( 'complex', 'ef_products', __( 'Produits PhotoBooth', 'easyevents' ) )
					->set_help_text( 'Chaque entrée = un onglet produit. L\'ordre affiché = l\'ordre ici.' )
					->add_fields( array(
						$F::make( 'text', 'product_id', __( 'ID technique (easybox-iris, easybox-bw…)', 'easyevents' ) ),
						$F::make( 'text', 'product_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'text', 'product_location_title', __( 'Titre location', 'easyevents' ) ),
						$F::make( 'checkbox', 'product_is_new', __( 'Badge « Nouveau »', 'easyevents' ) ),
						$F::make( 'text', 'product_tag', __( 'Tag (Prestige, Glamour, Best-seller…)', 'easyevents' ) ),
						$F::make( 'text', 'product_tagline', __( 'Tagline', 'easyevents' ) ),
						$F::make( 'textarea', 'product_desc', __( 'Description courte', 'easyevents' ) ),
						$F::make( 'textarea', 'product_long_desc', __( 'Description longue', 'easyevents' ) ),
						$F::make( 'textarea', 'product_precisions', __( 'Précisions (1 par ligne)', 'easyevents' ) ),
						$F::make( 'text', 'product_price', __( 'Prix', 'easyevents' ) ),
						$F::make( 'text', 'product_currency', __( 'Devise', 'easyevents' ) )->set_default_value( 'CHF' ),
						$F::make( 'image', 'product_image', __( 'Image principale', 'easyevents' ) ),
						$F::make( 'text', 'product_image_url', __( 'Image principale (URL)', 'easyevents' ) )
							->set_help_text( 'Optionnel. Utilisé si aucune image uploadée n\'est choisie.' ),
						$F::make( 'textarea', 'product_features', __( 'Fonctionnalités (1 par ligne)', 'easyevents' ) ),
						$F::make( 'textarea', 'product_specs', __( 'Specs — format « Label: Valeur » (1 par ligne)', 'easyevents' ) ),
					) ),
			) );

		$C::make( 'post_meta', __( 'EasyFlash — Valeurs & Marquee', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflash'] )
			->add_fields( array(
				$F::make( 'complex', 'ef_values', __( 'Nos valeurs', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'value_icon', __( 'Icône Lucide', 'easyevents' ) ),
						$F::make( 'text', 'value_title', __( 'Titre', 'easyevents' ) ),
						$F::make( 'textarea', 'value_desc', __( 'Description', 'easyevents' ) ),
					) ),
				$F::make( 'text', 'ef_keywords', __( 'Mots défilants (virgule)', 'easyevents' ) ),
			) );

		$C::make( 'post_meta', __( 'EasyFlash — Bonus (sections détaillées)', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflash'] )
			->add_fields( array(
				$F::make( 'complex', 'ef_bonus_sections', __( 'Sections bonus', 'easyevents' ) )
					->set_help_text( '1 ligne = 1 sous-section bonus (texte, prix, liste, galerie, vidéo). Clé recommandée: iris-1, iris-2, bw-1, bw-2, bw-3, bw-4, miroir-1, miroir-2, miroir-3, 360-1, 360-video.' )
					->add_fields( array(
						$F::make( 'select', 'bonus_product_id', __( 'Produit', 'easyevents' ) )
							->set_options( array(
								'easybox-iris'   => 'EasyBox Iris',
								'easybox-bw'     => 'EasyBox',
								'easybox-miroir' => 'EasyBox Miroir',
								'easybox-360'    => 'EasyBox 360°',
							) ),
						$F::make( 'text', 'bonus_section_key', __( 'Clé section', 'easyevents' ) ),
						$F::make( 'text', 'bonus_title', __( 'Titre section', 'easyevents' ) ),
						$F::make( 'textarea', 'bonus_paragraphs', __( 'Paragraphes (1 par ligne)', 'easyevents' ) ),
						$F::make( 'textarea', 'bonus_list_items', __( 'Liste (1 élément par ligne)', 'easyevents' ) ),
						$F::make( 'text', 'bonus_price', __( 'Prix', 'easyevents' ) ),
						$F::make( 'textarea', 'bonus_images', __( 'Galerie URLs images (1 par ligne)', 'easyevents' ) ),
						$F::make( 'textarea', 'bonus_image_labels', __( 'Labels images (1 par ligne, optionnel)', 'easyevents' ) ),
						$F::make( 'text', 'bonus_video_url', __( 'URL vidéo (optionnel)', 'easyevents' ) ),
						$F::make( 'text', 'bonus_cta_text', __( 'Texte bouton (optionnel)', 'easyevents' ) ),
						$F::make( 'text', 'bonus_cta_url', __( 'URL bouton (optionnel)', 'easyevents' ) ),
					) ),
			) );
	}

	/* ═══════════════════════════════════════════
	 * EasyChallenge
	 * ═══════════════════════════════════════════ */
	if ( isset( $pages['easychallenge'] ) ) {
		$products_select = array(
			'emission-grand' => "L'Émission",
			'emission-petit' => "L'Émission TV",
			'odyssee'        => "L'Odyssée",
		);

		$C::make( 'post_meta', __( 'EasyChallenge — Formules', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easychallenge'] )
			->add_fields( array(
				$F::make( 'complex', 'ec_products', __( 'Formules', 'easyevents' ) )
					->set_help_text( 'Chaque entrée = un onglet formule.' )
					->add_fields( array(
						$F::make( 'text', 'product_id', __( 'ID (emission-grand, emission-petit, odyssee)', 'easyevents' ) ),
						$F::make( 'text', 'product_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'text', 'product_subtitle', __( 'Sous-titre', 'easyevents' ) ),
						$F::make( 'text', 'product_tag', __( 'Tag (Best-seller, Public, Outdoor…)', 'easyevents' ) ),
						$F::make( 'text', 'product_tagline', __( 'Tagline', 'easyevents' ) ),
						$F::make( 'textarea', 'product_desc', __( 'Description courte', 'easyevents' ) ),
						$F::make( 'textarea', 'product_long_desc', __( 'Description longue', 'easyevents' ) ),
						$F::make( 'text', 'product_price', __( 'Prix', 'easyevents' ) ),
						$F::make( 'text', 'product_price_suffix', __( 'Suffixe prix (HT / pers.)', 'easyevents' ) ),
						$F::make( 'text', 'product_currency', __( 'Devise', 'easyevents' ) )->set_default_value( 'CHF' ),
						$F::make( 'image', 'product_image', __( 'Image principale', 'easyevents' ) ),
						$F::make( 'textarea', 'product_features', __( 'Fonctionnalités (1 par ligne)', 'easyevents' ) ),
						$F::make( 'textarea', 'product_specs', __( 'Specs — « Label: Valeur » (1 par ligne)', 'easyevents' ) ),
						$F::make( 'textarea', 'product_video_note', __( 'Note vidéo', 'easyevents' ) ),
						$F::make( 'text', 'product_video_link', __( 'Lien vidéo', 'easyevents' ) ),
						$F::make( 'textarea', 'product_partner_note', __( 'Note partenaire', 'easyevents' ) ),
						$F::make( 'text', 'product_partner_link', __( 'Lien partenaire', 'easyevents' ) ),
						$F::make( 'textarea', 'product_session_note', __( 'Note sessions', 'easyevents' ) ),
					) ),
			) );

		$C::make( 'post_meta', __( 'EasyChallenge — Sessions & Jeux', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easychallenge'] )
			->add_fields( array(
				$F::make( 'complex', 'ec_sessions', __( 'Sessions', 'easyevents' ) )
					->set_help_text( 'Sessions par formule (ex: Session 1, Session 2…).' )
					->add_fields( array(
						$F::make( 'select', 'session_product', __( 'Formule', 'easyevents' ) )
							->set_options( $products_select ),
						$F::make( 'text', 'session_name', __( 'Nom (Session 1…)', 'easyevents' ) ),
						$F::make( 'textarea', 'session_items', __( 'Étapes (1 par ligne)', 'easyevents' ) ),
					) ),
				$F::make( 'complex', 'ec_games', __( 'Jeux / Épreuves', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'select', 'game_product', __( 'Formule', 'easyevents' ) )
							->set_options( $products_select ),
						$F::make( 'text', 'game_name', __( 'Nom du jeu', 'easyevents' ) ),
						$F::make( 'image', 'game_image', __( 'Image', 'easyevents' ) ),
						$F::make( 'textarea', 'game_desc', __( 'Description', 'easyevents' ) ),
					) ),
			) );

		$C::make( 'post_meta', __( 'EasyChallenge — Contenu', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easychallenge'] )
			->add_fields( array(
				$F::make( 'complex', 'ec_values', __( 'Valeurs / Les + de l\'Émission', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'value_icon', __( 'Icône Lucide', 'easyevents' ) ),
						$F::make( 'text', 'value_title', __( 'Titre', 'easyevents' ) ),
						$F::make( 'textarea', 'value_desc', __( 'Description', 'easyevents' ) ),
					) ),
				$F::make( 'textarea', 'ec_reasons', __( 'Pourquoi le Team Building (1 raison par ligne)', 'easyevents' ) ),
				$F::make( 'text', 'ec_keywords', __( 'Mots défilants (virgule)', 'easyevents' ) ),
			) );
	}

	/* ═══════════════════════════════════════════
	 * EasyFlair
	 * ═══════════════════════════════════════════ */
	if ( isset( $pages['easyflair'] ) ) {
		$C::make( 'post_meta', __( 'EasyFlair — Prestations', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflair'] )
			->add_tab( __( 'Pick & Drinks', 'easyevents' ), array(
				$F::make( 'text', 'efr_pd_name', __( 'Nom', 'easyevents' ) ),
				$F::make( 'text', 'efr_pd_subtitle', __( 'Sous-titre', 'easyevents' ) ),
				$F::make( 'image', 'efr_pd_banner', __( 'Bannière', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_pd_desc', __( 'Paragraphes (1 par ligne)', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_pd_formula_details', __( 'Détails formule (1 par ligne)', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_pd_formula_info', __( 'Info complémentaire formule', 'easyevents' ) ),
				$F::make( 'complex', 'efr_pd_images', __( 'Images galerie', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'image', 'pd_image', __( 'Image', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Barman Service', 'easyevents' ), array(
				$F::make( 'text', 'efr_bs_name', __( 'Nom', 'easyevents' ) ),
				$F::make( 'text', 'efr_bs_subtitle', __( 'Sous-titre', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_bs_desc', __( 'Paragraphes (1 par ligne)', 'easyevents' ) ),
				$F::make( 'complex', 'efr_bs_formulas', __( 'Formules', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'formula_name', __( 'Nom (Formule 2h…)', 'easyevents' ) ),
						$F::make( 'textarea', 'formula_details', __( 'Détails (1 par ligne)', 'easyevents' ) ),
						$F::make( 'image', 'formula_image_1', __( 'Image 1', 'easyevents' ) ),
						$F::make( 'image', 'formula_image_2', __( 'Image 2', 'easyevents' ) ),
						$F::make( 'image', 'formula_image_3', __( 'Image 3', 'easyevents' ) ),
						$F::make( 'image', 'formula_image_4', __( 'Image 4', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Barman Jongleur', 'easyevents' ), array(
				$F::make( 'text', 'efr_bj_name', __( 'Nom', 'easyevents' ) ),
				$F::make( 'text', 'efr_bj_subtitle', __( 'Sous-titre', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_bj_desc', __( 'Paragraphes (1 par ligne)', 'easyevents' ) ),
				$F::make( 'complex', 'efr_bj_formulas', __( 'Formules', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'formula_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'image', 'formula_image', __( 'Image', 'easyevents' ) ),
					) ),
			) );

		$C::make( 'post_meta', __( 'EasyFlair — Cocktails Truck', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflair'] )
			->add_fields( array(
				$F::make( 'image', 'efr_truck_banner', __( 'Bannière Truck', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_truck_features', __( 'Points forts (1 par ligne)', 'easyevents' ) ),
			) );

		$C::make( 'post_meta', __( 'EasyFlair — Ateliers & Masters', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflair'] )
			->add_tab( __( 'Ateliers Cocktails', 'easyevents' ), array(
				$F::make( 'text', 'efr_ac_title', __( 'Titre section', 'easyevents' ) ),
				$F::make( 'complex', 'efr_ac_items', __( 'Ateliers', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'item_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'text', 'item_subtitle', __( 'Sous-titre', 'easyevents' ) ),
						$F::make( 'text', 'item_formula', __( 'Nom formule', 'easyevents' ) ),
						$F::make( 'text', 'item_duration', __( 'Durée', 'easyevents' ) ),
						$F::make( 'text', 'item_min_persons', __( 'Min. personnes', 'easyevents' ) ),
						$F::make( 'text', 'item_price', __( 'Prix', 'easyevents' ) ),
						$F::make( 'text', 'item_price_suffix', __( 'Suffixe prix', 'easyevents' ) ),
						$F::make( 'textarea', 'item_desc', __( 'Description', 'easyevents' ) ),
						$F::make( 'image', 'item_image', __( 'Image', 'easyevents' ) ),
						$F::make( 'textarea', 'item_includes', __( 'Inclus (1 par ligne)', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Ateliers Café-Barista', 'easyevents' ), array(
				$F::make( 'text', 'efr_acf_title', __( 'Titre section', 'easyevents' ) ),
				$F::make( 'complex', 'efr_acf_items', __( 'Ateliers', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'item_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'text', 'item_subtitle', __( 'Sous-titre', 'easyevents' ) ),
						$F::make( 'text', 'item_formula', __( 'Nom formule', 'easyevents' ) ),
						$F::make( 'text', 'item_duration', __( 'Durée', 'easyevents' ) ),
						$F::make( 'text', 'item_min_persons', __( 'Min. personnes', 'easyevents' ) ),
						$F::make( 'text', 'item_price', __( 'Prix', 'easyevents' ) ),
						$F::make( 'text', 'item_price_suffix', __( 'Suffixe prix', 'easyevents' ) ),
						$F::make( 'textarea', 'item_desc', __( 'Description', 'easyevents' ) ),
						$F::make( 'image', 'item_image', __( 'Image', 'easyevents' ) ),
						$F::make( 'textarea', 'item_includes', __( 'Inclus (1 par ligne)', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Restaurants partenaires', 'easyevents' ), array(
				$F::make( 'complex', 'efr_restaurants', __( 'Restaurants', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'restaurant_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'textarea', 'restaurant_desc', __( 'Description', 'easyevents' ) ),
						$F::make( 'image', 'restaurant_image_1', __( 'Image 1', 'easyevents' ) ),
						$F::make( 'image', 'restaurant_image_2', __( 'Image 2', 'easyevents' ) ),
					) ),
			) );

		$C::make( 'post_meta', __( 'EasyFlair — Animations', 'easyevents' ) )
			->where( 'post_id', '=', $pages['easyflair'] )
			->add_tab( __( 'Station Bar', 'easyevents' ), array(
				$F::make( 'text', 'efr_sb_title', __( 'Titre', 'easyevents' ) ),
				$F::make( 'textarea', 'efr_sb_desc', __( 'Paragraphes (1 par ligne)', 'easyevents' ) ),
				$F::make( 'image', 'efr_sb_image_1', __( 'Image 1', 'easyevents' ) ),
				$F::make( 'image', 'efr_sb_image_2', __( 'Image 2', 'easyevents' ) ),
				$F::make( 'image', 'efr_sb_image_3', __( 'Image 3', 'easyevents' ) ),
				$F::make( 'complex', 'efr_sb_pricing', __( 'Tarification', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'pricing_label', __( 'Label', 'easyevents' ) ),
						$F::make( 'text', 'pricing_price', __( 'Prix', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Animations', 'easyevents' ), array(
				$F::make( 'complex', 'efr_anim_items', __( 'Animations', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'anim_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'image', 'anim_image', __( 'Image', 'easyevents' ) ),
						$F::make( 'textarea', 'anim_desc', __( 'Description (1 paragraphe par ligne)', 'easyevents' ) ),
						$F::make( 'text', 'anim_price', __( 'Prix (vide si aucun)', 'easyevents' ) ),
						$F::make( 'text', 'anim_detail_label', __( 'Label détail prix', 'easyevents' ) ),
						$F::make( 'text', 'anim_ext_label', __( 'Label lien externe', 'easyevents' ) ),
						$F::make( 'text', 'anim_ext_url', __( 'URL lien externe', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Partenaires', 'easyevents' ), array(
				$F::make( 'complex', 'efr_anim_partners', __( 'Partenaires animations', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'partner_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'textarea', 'partner_desc', __( 'Description', 'easyevents' ) ),
						$F::make( 'image', 'partner_image_1', __( 'Image 1', 'easyevents' ) ),
						$F::make( 'image', 'partner_image_2', __( 'Image 2', 'easyevents' ) ),
						$F::make( 'image', 'partner_image_3', __( 'Image 3', 'easyevents' ) ),
						$F::make( 'text', 'partner_link', __( 'URL site web', 'easyevents' ) ),
					) ),
				$F::make( 'complex', 'efr_bar_partners', __( 'Partenaires bars', 'easyevents' ) )
					->add_fields( array(
						$F::make( 'text', 'partner_name', __( 'Nom', 'easyevents' ) ),
						$F::make( 'textarea', 'partner_desc', __( 'Description', 'easyevents' ) ),
						$F::make( 'image', 'partner_image', __( 'Image', 'easyevents' ) ),
						$F::make( 'text', 'partner_link', __( 'URL site web', 'easyevents' ) ),
					) ),
			) )
			->add_tab( __( 'Défilement', 'easyevents' ), array(
				$F::make( 'text', 'efr_keywords', __( 'Mots défilants (virgule)', 'easyevents' ) ),
			) );
	}
}
