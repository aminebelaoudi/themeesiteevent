<?php
/**
 * Auto-create pages on theme activation
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'easyevents_activate' );

function easyevents_activate() {
	/* ── Front-page ─────────────────────────────── */
	$front = get_page_by_path( 'accueil' );
	if ( ! $front ) {
		$front_id = wp_insert_post( array(
			'post_title'   => 'Accueil',
			'post_name'    => 'accueil',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'page_template'=> 'front-page.php',
			'post_content' => '',
		) );
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_id );
	}

	/* ── Service pages ──────────────────────────── */
	$services = array(
		'easyflair' => array(
			'title'    => 'EasyFlair — Bars Mobiles & Mixologie',
			'template' => 'page-service.php',
		),
		'easyflash' => array(
			'title'    => 'EasyFlash — Location de PhotoBooth',
			'template' => 'page-service.php',
		),
		'easychallenge' => array(
			'title'    => 'EasyChallenge — Team Building & Animations',
			'template' => 'page-service.php',
		),
		'easyrelax' => array(
			'title'    => 'EasyRelax — Fauteuils Massants & Bien-être',
			'template' => 'page-service.php',
		),
		'easytoilets' => array(
			'title'    => 'EasyToilets — Sanitaires Premium',
			'template' => 'page-service.php',
		),
	);

	foreach ( $services as $slug => $data ) {
		$page_slug = 'services/' . $slug;
		$existing  = get_page_by_path( $page_slug );
		if ( ! $existing ) {
			/* Ensure parent "Services" page exists */
			$parent = get_page_by_path( 'services' );
			if ( ! $parent ) {
				$parent_id = wp_insert_post( array(
					'post_title'  => 'Services',
					'post_name'   => 'services',
					'post_status' => 'publish',
					'post_type'   => 'page',
					'post_content'=> '',
				) );
			} else {
				$parent_id = $parent->ID;
			}

			wp_insert_post( array(
				'post_title'   => $data['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_parent'  => $parent_id,
				'page_template'=> $data['template'],
				'post_content' => '',
			) );
		}
	}

	/* ── Flush rewrite rules ────────────────────── */
	flush_rewrite_rules();
}

/* ─────────────────────────────────────────────────
 * Pre-populate ALL Carbon Fields on the homepage
 * so the admin sees every section filled, not empty.
 * Runs once after Carbon Fields is ready.
 * ───────────────────────────────────────────────── */
add_action( 'carbon_fields_fields_registered', 'easyevents_populate_homepage_defaults' );

function easyevents_populate_homepage_defaults() {
	$front_id = absint( get_option( 'page_on_front' ) );
	if ( ! $front_id || ! function_exists( 'carbon_set_post_meta' ) ) {
		return;
	}

	// Only run once
	if ( get_post_meta( $front_id, '_ee_defaults_populated', true ) ) {
		return;
	}

	/* ── Hero ───────────────────────────────────── */
	carbon_set_post_meta( $front_id, 'hero_badge', 'Toute la Suisse · Frontière française' );
	carbon_set_post_meta( $front_id, 'hero_title', 'Votre partenaire événementiel haut de gamme' );
	carbon_set_post_meta( $front_id, 'hero_highlight', 'événementiel' );
	carbon_set_post_meta( $front_id, 'hero_subtitle', 'Groupe composé de cinq sociétés complémentaires, collaborant avec des agences événementielles.' );
	carbon_set_post_meta( $front_id, 'hero_cta_text', 'Découvrir nos services' );
	carbon_set_post_meta( $front_id, 'hero_cta_link', '#services' );

	/* ── Services ───────────────────────────────── */
	carbon_set_post_meta( $front_id, 'services_label', 'Nos services' );
	carbon_set_post_meta( $front_id, 'services_title', 'Cinq expertises, un seul groupe' );
	carbon_set_post_meta( $front_id, 'services_highlight', 'un seul groupe' );
	carbon_set_post_meta( $front_id, 'services_desc', 'Des spécialistes complémentaires pour couvrir chaque aspect de votre événement.' );
	carbon_set_post_meta( $front_id, 'services_cards', array(
		array(
			'service_slug'  => 'easyflair',
			'service_title' => 'Bars mobiles & Mixologie',
			'service_desc'  => 'Barmans jongleurs et mixologues, nous élaborons des cocktails raffinés à base de produits locaux et concevons des ateliers sur mesure, avec plus de 15 ans d’expertise',
		),
		array(
			'service_slug'  => 'easyflash',
			'service_title' => 'Photobooths & Expériences photo',
			'service_desc'  => 'Photobooth 360°, miroir magique et EasyBox pour des souvenirs personnalisés et instantanés.',
		),
		array(
			'service_slug'  => 'easychallenge',
			'service_title' => 'Team Building & Animations',
			'service_desc'  => 'Défis ludiques, émissions et jeux indoor/outdoor pour renforcer la cohésion de vos équipes.',
		),
		array(
			'service_slug'  => 'easyrelax',
			'service_title' => 'Fauteuils Massants & Bien-être',
			'service_desc'  => 'Fauteuils massants premium pour offrir détente et bien-être à vos invités lors de vos événements.',
		),
		array(
			'service_slug'  => 'easytoilets',
			'service_title' => 'Sanitaires Premium',
			'service_desc'  => 'Unités sanitaires mobiles haut de gamme, élégantes pour accueillir vos invités avec soin.',
		),
	) );

	/* ── Why Us ─────────────────────────────────── */
	carbon_set_post_meta( $front_id, 'whyus_label', 'Pourquoi nous ?' );
	carbon_set_post_meta( $front_id, 'whyus_title', 'Pourquoi choisir EasyEvents Group ?' );
	carbon_set_post_meta( $front_id, 'whyus_highlight', 'EasyEvents Group' );
	carbon_set_post_meta( $front_id, 'whyus_items', array(
		array( 'whyus_icon' => 'map-pin',  'whyus_text' => 'Actifs dans toute la Suisse et à la frontière française',  'whyus_slug' => 'easyflash' ),
		array( 'whyus_icon' => 'clock',    'whyus_text' => 'Plus de 10 ans d\'expérience événementielle',              'whyus_slug' => 'easyflair' ),
		array( 'whyus_icon' => 'users',    'whyus_text' => 'Un groupe de spécialistes, un interlocuteur unique',       'whyus_slug' => 'easychallenge' ),
		array( 'whyus_icon' => 'sparkles', 'whyus_text' => 'Solutions sur mesure pour chaque événement',               'whyus_slug' => 'easyrelax' ),
	) );

	/* ── Showcase / Réalisations ─────────────────── */
	carbon_set_post_meta( $front_id, 'showcase_label', 'Réalisations' );
	carbon_set_post_meta( $front_id, 'showcase_title', 'Nos derniers événements' );
	carbon_set_post_meta( $front_id, 'showcase_cta_text', 'Voir tous les événements' );
	carbon_set_post_meta( $front_id, 'showcase_cta_link', '#' );
	carbon_set_post_meta( $front_id, 'showcase_items', array(
		array( 'showcase_title' => 'Cocktail d\'entreprise à Genève',  'showcase_service' => 'EasyFlair + EasyFlash',                'showcase_category' => 'Corporate' ),
		array( 'showcase_title' => 'Soirée de gala — Vidéo 360°',     'showcase_service' => 'EasyFlash',                             'showcase_category' => 'Corporate' ),
		array( 'showcase_title' => 'Team building outdoor — Lausanne', 'showcase_service' => 'EasyChallenge',                        'showcase_category' => 'Team Building' ),
		array( 'showcase_title' => 'Mariage premium — Lac Léman',     'showcase_service' => 'EasyFlair + EasyFlash + EasyRelax',     'showcase_category' => 'Mariage' ),
		array( 'showcase_title' => 'Festival d\'été — Nyon',           'showcase_service' => 'EasyFlair + EasyToilets',               'showcase_category' => 'Festival' ),
		array( 'showcase_title' => 'Séminaire immersif — Montreux',   'showcase_service' => 'EasyChallenge + EasyRelax',             'showcase_category' => 'Corporate' ),
	) );

	/* ── Testimonials ───────────────────────────── */
	carbon_set_post_meta( $front_id, 'testimonials_label', 'Témoignages' );
	carbon_set_post_meta( $front_id, 'testimonials_title', 'Avis clients' );
	carbon_set_post_meta( $front_id, 'testimonials_highlight', 'clients' );
	carbon_set_post_meta( $front_id, 'testimonials', array(
		array(
			'testimonial_text'     => 'EasyEvents a transformé notre soirée d\'entreprise en un moment absolument inoubliable. Les barmans jongleurs d\'EasyFlair ont épaté toute notre équipe, et le photobooth 360° était la star de la soirée. Service impeccable du début à la fin.',
			'testimonial_name'     => 'Marie L.',
			'testimonial_role'     => 'Directrice RH',
			'testimonial_company'  => 'Banque Privée',
			'testimonial_location' => 'Genève',
			'testimonial_event'    => 'Soirée d\'entreprise',
			'testimonial_rating'   => '5',
			'testimonial_featured' => true,
		),
		array(
			'testimonial_text'     => 'En tant qu\'agence, nous avons besoin de partenaires fiables. EasyEvents Group est devenu notre référence. Professionnalisme, créativité et réactivité à chaque mission.',
			'testimonial_name'     => 'Pierre D.',
			'testimonial_role'     => 'Chef de projet',
			'testimonial_company'  => 'Agence Prime Events',
			'testimonial_location' => 'Lausanne',
			'testimonial_event'    => 'Mariage – Lac Léman',
			'testimonial_rating'   => '5',
			'testimonial_featured' => false,
		),
		array(
			'testimonial_text'     => 'Le team building EasyChallenge a dépassé toutes nos attentes. Nos collaborateurs parlent encore de cette journée trois mois plus tard !',
			'testimonial_name'     => 'Sophie M.',
			'testimonial_role'     => 'Responsable Marketing',
			'testimonial_company'  => 'Tech Company',
			'testimonial_location' => 'Lausanne',
			'testimonial_event'    => 'Lancement de produit',
			'testimonial_rating'   => '5',
			'testimonial_featured' => false,
		),
		array(
			'testimonial_text'     => 'EasyRelax a créé un espace lounge d\'exception pour notre festival. L\'ambiance était exactement ce que nous recherchions — élégante, festive, mémorable.',
			'testimonial_name'     => 'Laurent B.',
			'testimonial_role'     => 'Directeur Général',
			'testimonial_company'  => 'Groupe Hôtelier',
			'testimonial_location' => 'Nyon',
			'testimonial_event'    => 'Festival d\'été',
			'testimonial_rating'   => '5',
			'testimonial_featured' => false,
		),
	) );

	/* ── Social ─────────────────────────────────── */
	carbon_set_post_meta( $front_id, 'social_label', 'Réseaux sociaux' );
	carbon_set_post_meta( $front_id, 'social_title', 'Suivez l\'action en direct' );
	carbon_set_post_meta( $front_id, 'social_subtitle', 'Coulisses, moments forts et inspirations événementielles — rejoignez notre communauté.' );
	carbon_set_post_meta( $front_id, 'social_links', array(
		array( 'social_icon' => 'instagram', 'social_label' => 'Instagram', 'social_handle' => '@easyevents_group', 'social_href' => '#' ),
		array( 'social_icon' => 'facebook',  'social_label' => 'Facebook',  'social_handle' => 'EasyEvents Group',  'social_href' => '#' ),
		array( 'social_icon' => 'linkedin',  'social_label' => 'LinkedIn',  'social_handle' => 'EasyEvents Group',  'social_href' => '#' ),
	) );
	carbon_set_post_meta( $front_id, 'social_feed', array(
		array( 'social_caption' => 'Une soirée cocktail mémorable ✨' ),
		array( 'social_caption' => 'Le photobooth 360° fait fureur 📸' ),
		array( 'social_caption' => 'Team building en pleine nature 🏆' ),
		array( 'social_caption' => 'Gala d\'entreprise à Genève 🎊' ),
		array( 'social_caption' => 'Nos barmans en action 🍹' ),
		array( 'social_caption' => 'Défis & sourires garantis 🎯' ),
	) );

	/* ── Blog ───────────────────────────────────── */
	carbon_set_post_meta( $front_id, 'blog_label', 'Blog & Inspirations' );
	carbon_set_post_meta( $front_id, 'blog_title', 'Idées, tendances & coulisses' );
	carbon_set_post_meta( $front_id, 'blog_subtitle', 'Conseils événementiels, retours d\'expérience et inspirations pour créer des moments qui marquent.' );
	carbon_set_post_meta( $front_id, 'blog_cta_text', 'Tous les articles' );
	carbon_set_post_meta( $front_id, 'blog_cta_link', '/blog' );
	carbon_set_post_meta( $front_id, 'blog_posts', array(
		array(
			'blog_category'      => 'Corporate',
			'blog_category_slug' => 'easyflash',
			'blog_date'          => '12 mars 2026',
			'blog_read_time'     => '4 min',
			'blog_title'         => '5 idées pour transformer votre soirée d\'entreprise en expérience inoubliable',
			'blog_excerpt'       => 'De la mixologie en live aux photobooths immersifs, découvrez comment surprendre vos collaborateurs et marquer les esprits lors de votre prochain événement corporate.',
		),
		array(
			'blog_category'      => 'Mariage',
			'blog_category_slug' => 'easyflair',
			'blog_date'          => '28 fév. 2026',
			'blog_read_time'     => '3 min',
			'blog_title'         => 'Photobooth mariage : le must-have pour une réception moderne',
			'blog_excerpt'       => 'Le photobooth 360° s\'impose comme l\'animation phare des mariages contemporains. Conseils et inspirations pour l\'intégrer parfaitement à votre grand jour.',
		),
		array(
			'blog_category'      => 'Team Building',
			'blog_category_slug' => 'easychallenge',
			'blog_date'          => '10 fév. 2026',
			'blog_read_time'     => '5 min',
			'blog_title'         => 'Team building : comment renforcer la cohésion d\'équipe en 2026',
			'blog_excerpt'       => 'Jeux collaboratifs, défis outdoor ou animations immersives — les nouvelles tendances du team building qui font la différence dans les entreprises romandes.',
		),
		array(
			'blog_category'      => 'Festival',
			'blog_category_slug' => 'easyrelax',
			'blog_date'          => '3 jan. 2026',
			'blog_read_time'     => '4 min',
			'blog_title'         => 'Organiser un festival en Suisse romande : les clés du succès',
			'blog_excerpt'       => 'De la logistique sanitaire aux espaces lounge, retour sur les éléments indispensables pour un festival réussi et une expérience participant au top.',
		),
		array(
			'blog_category'      => 'Tendances',
			'blog_category_slug' => 'secondary',
			'blog_date'          => '18 déc. 2025',
			'blog_read_time'     => '6 min',
			'blog_title'         => 'Les grandes tendances événementielles pour l\'année 2026',
			'blog_excerpt'       => 'Durabilité, immersion sensorielle, expériences hybrides… voici ce qui va façonner les événements professionnels et privés en Suisse cette année.',
		),
	) );

	/* ── Contact ────────────────────────────────── */
	carbon_set_post_meta( $front_id, 'contact_label', 'Contact' );
	carbon_set_post_meta( $front_id, 'contact_title', 'Parlons de votre événement' );
	carbon_set_post_meta( $front_id, 'contact_highlight', 'votre événement' );
	carbon_set_post_meta( $front_id, 'contact_subtitle', 'Notre équipe vous répond sous 24h pour construire ensemble votre projet.' );
	carbon_set_post_meta( $front_id, 'contact_brand_name', 'EasyEvents Group' );
	carbon_set_post_meta( $front_id, 'contact_brand_tagline', 'Votre partenaire événementiel en Suisse et à la frontière française' );

	/* ── Mark as populated ──────────────────────── */
	update_post_meta( $front_id, '_ee_defaults_populated', '1' );
}
