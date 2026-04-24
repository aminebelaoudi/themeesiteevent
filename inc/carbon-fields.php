<?php
/**
 * Carbon Fields configuration
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', 'easyevents_carbon_fields_boot' );

function easyevents_carbon_fields_boot() {
	$autoload = EASYEVENTS_DIR . '/vendor/autoload.php';
	if ( file_exists( $autoload ) ) {
		require_once $autoload;
		\Carbon_Fields\Carbon_Fields::boot();
	}
}

add_action( 'carbon_fields_register_fields', 'easyevents_register_fields' );

function easyevents_register_fields() {
	if ( ! class_exists( '\Carbon_Fields\Container' ) ) {
		return;
	}

	$Container = '\Carbon_Fields\Container';
	$Field     = '\Carbon_Fields\Field';
	$front_page_id = absint( get_option( 'page_on_front' ) );

	/* ── Theme Options (global) ──────────────────── */
	$Container::make( 'theme_options', __( 'EasyEvents Options', 'easyevents' ) )
		->set_icon( 'dashicons-star-filled' )
		->add_tab( __( 'Général', 'easyevents' ), array(
			$Field::make( 'text', 'ee_phone_1', __( 'Téléphone 1', 'easyevents' ) )
				->set_default_value( '+41 22 519 21 66' ),
			$Field::make( 'text', 'ee_phone_2', __( 'Téléphone 2', 'easyevents' ) )
				->set_default_value( '+41 78 948 67 27' ),
			$Field::make( 'text', 'ee_email', __( 'Email', 'easyevents' ) )
				->set_default_value( 'contact@easyevents.ch' ),
			$Field::make( 'textarea', 'ee_address', __( 'Adresse', 'easyevents' ) )
				->set_default_value( "Route des jeunes, 6\n1227 Genève – Suisse" ),
			$Field::make( 'text', 'ee_instagram', __( 'Instagram URL', 'easyevents' ) ),
			$Field::make( 'text', 'ee_facebook', __( 'Facebook URL', 'easyevents' ) ),
			$Field::make( 'text', 'ee_linkedin', __( 'LinkedIn URL', 'easyevents' ) ),
		) )
		->add_tab( __( 'Horaires', 'easyevents' ), array(
			$Field::make( 'text', 'ee_hours_title', __( 'Titre horaires', 'easyevents' ) )
				->set_default_value( 'Disponible du lundi au vendredi' ),
			$Field::make( 'text', 'ee_hours_detail', __( 'Détails', 'easyevents' ) )
				->set_default_value( '9h00 – 18h00 · Réponse sous 24h' ),
		) );

	/* ── Front-page fields ───────────────────────── */
	$home_hero_container = $Container::make( 'post_meta', __( 'Hero Section', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_hero_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_hero_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_hero_container
		->add_fields( array(
			$Field::make( 'image', 'hero_image', __( 'Image Hero', 'easyevents' ) ),
			$Field::make( 'text', 'hero_badge', __( 'Badge (localisation)', 'easyevents' ) )
				->set_default_value( 'Toute la Suisse · Frontière française' ),
			$Field::make( 'text', 'hero_title', __( 'Titre Hero', 'easyevents' ) )
				->set_default_value( 'Votre partenaire événementiel haut de gamme' ),
			$Field::make( 'text', 'hero_highlight', __( 'Mot mis en valeur', 'easyevents' ) )
				->set_default_value( 'événementiel' ),
			$Field::make( 'textarea', 'hero_subtitle', __( 'Sous-titre', 'easyevents' ) )
				->set_default_value( 'Groupe composé de cinq sociétés complémentaires, collaborant avec des agences événementielles.' ),
			$Field::make( 'text', 'hero_cta_text', __( 'Texte CTA', 'easyevents' ) )
				->set_default_value( 'Découvrir nos services' ),
			$Field::make( 'text', 'hero_cta_link', __( 'Lien CTA', 'easyevents' ) )
				->set_default_value( '#services' ),
		) );

	/* ── Showcase / Réalisations ─────────────────── */
	$home_showcase_container = $Container::make( 'post_meta', __( 'Réalisations', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_showcase_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_showcase_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_showcase_container
		->add_fields( array(
			$Field::make( 'text', 'showcase_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Réalisations' ),
			$Field::make( 'text', 'showcase_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Nos derniers événements' ),
			$Field::make( 'text', 'showcase_cta_text', __( 'Texte CTA', 'easyevents' ) )
				->set_default_value( 'Voir tous les événements' ),
			$Field::make( 'text', 'showcase_cta_link', __( 'Lien CTA', 'easyevents' ) )
				->set_default_value( '#' ),
			$Field::make( 'complex', 'showcase_items', __( 'Événements', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'text', 'showcase_title', __( 'Titre', 'easyevents' ) ),
					$Field::make( 'text', 'showcase_service', __( 'Service(s)', 'easyevents' ) ),
					$Field::make( 'text', 'showcase_category', __( 'Catégorie', 'easyevents' ) ),
					$Field::make( 'image', 'showcase_image', __( 'Image', 'easyevents' ) ),
				) ),
		) );

	/* ── Testimonials ────────────────────────────── */
	$home_testimonials_container = $Container::make( 'post_meta', __( 'Témoignages', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_testimonials_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_testimonials_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_testimonials_container
		->add_fields( array(
			$Field::make( 'text', 'testimonials_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Témoignages' ),
			$Field::make( 'text', 'testimonials_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Avis clients' ),
			$Field::make( 'text', 'testimonials_highlight', __( 'Mot en évidence', 'easyevents' ) )
				->set_default_value( 'clients' ),
			$Field::make( 'complex', 'testimonials', __( 'Avis clients', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'textarea', 'testimonial_text', __( 'Texte', 'easyevents' ) ),
					$Field::make( 'text', 'testimonial_name', __( 'Nom', 'easyevents' ) ),
					$Field::make( 'text', 'testimonial_role', __( 'Poste', 'easyevents' ) ),
					$Field::make( 'text', 'testimonial_company', __( 'Entreprise', 'easyevents' ) ),
					$Field::make( 'text', 'testimonial_location', __( 'Lieu', 'easyevents' ) ),
					$Field::make( 'text', 'testimonial_event', __( 'Type d\'événement', 'easyevents' ) ),
					$Field::make( 'select', 'testimonial_rating', __( 'Note', 'easyevents' ) )
						->set_options( array( '5' => '5 étoiles', '4' => '4 étoiles', '3' => '3 étoiles' ) ),
					$Field::make( 'checkbox', 'testimonial_featured', __( 'Mis en avant', 'easyevents' ) ),
				) ),
		) );

	$home_blog_container = $Container::make( 'post_meta', __( 'Blog Home', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_blog_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_blog_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_blog_container
		->add_fields( array(
			$Field::make( 'text', 'blog_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Blog & Inspirations' ),
			$Field::make( 'text', 'blog_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Idées, tendances & coulisses' ),
			$Field::make( 'text', 'blog_subtitle', __( 'Sous-titre section', 'easyevents' ) )
				->set_default_value( 'Conseils événementiels, retours d\'expérience et inspirations pour créer des moments qui marquent.' ),
			$Field::make( 'text', 'blog_cta_text', __( 'Texte lien header', 'easyevents' ) )
				->set_default_value( 'Tous les articles' ),
			$Field::make( 'text', 'blog_cta_link', __( 'Lien header', 'easyevents' ) )
				->set_default_value( '/blog' ),
			$Field::make( 'complex', 'blog_posts', __( 'Articles home', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'text', 'blog_category', __( 'Catégorie', 'easyevents' ) ),
					$Field::make( 'text', 'blog_category_slug', __( 'Slug catégorie (easyflash, easyflair...)', 'easyevents' ) ),
					$Field::make( 'text', 'blog_date', __( 'Date', 'easyevents' ) ),
					$Field::make( 'text', 'blog_read_time', __( 'Temps de lecture', 'easyevents' ) ),
					$Field::make( 'text', 'blog_title', __( 'Titre', 'easyevents' ) ),
					$Field::make( 'textarea', 'blog_excerpt', __( 'Extrait', 'easyevents' ) ),
					$Field::make( 'image', 'blog_image', __( 'Image', 'easyevents' ) ),
				) ),
		) );

	$home_services_container = $Container::make( 'post_meta', __( 'Services Home', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_services_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_services_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_services_container
		->add_fields( array(
			$Field::make( 'text', 'services_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Nos services' ),
			$Field::make( 'text', 'services_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Cinq expertises, un seul groupe' ),
			$Field::make( 'text', 'services_highlight', __( 'Mot en évidence', 'easyevents' ) )
				->set_default_value( 'un seul groupe' ),
			$Field::make( 'textarea', 'services_desc', __( 'Description section', 'easyevents' ) )
				->set_default_value( 'Des spécialistes complémentaires pour couvrir chaque aspect de votre événement.' ),
			$Field::make( 'complex', 'services_cards', __( 'Cartes services', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'text', 'service_slug', __( 'Slug service (easyflair, easyflash...)', 'easyevents' ) ),
					$Field::make( 'text', 'service_title', __( 'Titre carte', 'easyevents' ) ),
					$Field::make( 'textarea', 'service_desc', __( 'Description carte', 'easyevents' ) ),
				) ),
		) );

	$home_whyus_container = $Container::make( 'post_meta', __( 'Pourquoi nous Home', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_whyus_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_whyus_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_whyus_container
		->add_fields( array(
			$Field::make( 'text', 'whyus_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Pourquoi nous ?' ),
			$Field::make( 'text', 'whyus_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Pourquoi choisir EasyEvents Group ?' ),
			$Field::make( 'text', 'whyus_highlight', __( 'Mot en évidence', 'easyevents' ) )
				->set_default_value( 'EasyEvents Group' ),
			$Field::make( 'complex', 'whyus_items', __( 'Arguments', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'text', 'whyus_icon', __( 'Icône (map-pin, clock, users...)', 'easyevents' ) ),
					$Field::make( 'text', 'whyus_text', __( 'Texte', 'easyevents' ) ),
					$Field::make( 'text', 'whyus_slug', __( 'Slug couleur (easyflash...)', 'easyevents' ) ),
				) ),
		) );

	$home_social_container = $Container::make( 'post_meta', __( 'Réseaux sociaux Home', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_social_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_social_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_social_container
		->add_fields( array(
			$Field::make( 'text', 'social_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Réseaux sociaux' ),
			$Field::make( 'text', 'social_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Suivez l\'action en direct' ),
			$Field::make( 'textarea', 'social_subtitle', __( 'Sous-titre section', 'easyevents' ) )
				->set_default_value( 'Coulisses, moments forts et inspirations événementielles — rejoignez notre communauté.' ),
			$Field::make( 'complex', 'social_links', __( 'Liens sociaux', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'text', 'social_icon', __( 'Icône (instagram, facebook, linkedin)', 'easyevents' ) ),
					$Field::make( 'text', 'social_label', __( 'Label', 'easyevents' ) ),
					$Field::make( 'text', 'social_handle', __( 'Handle', 'easyevents' ) ),
					$Field::make( 'text', 'social_href', __( 'Lien', 'easyevents' ) ),
				) ),
			$Field::make( 'complex', 'social_feed', __( 'Cartes feed', 'easyevents' ) )
				->add_fields( array(
					$Field::make( 'image', 'social_image', __( 'Image', 'easyevents' ) ),
					$Field::make( 'text', 'social_caption', __( 'Légende', 'easyevents' ) ),
				) ),
		) );

	$home_contact_container = $Container::make( 'post_meta', __( 'Contact Home', 'easyevents' ) )
		->where( 'post_type', '=', 'page' );
	if ( $front_page_id > 0 ) {
		$home_contact_container->where( 'post_id', '=', $front_page_id );
	} else {
		$home_contact_container->where( 'post_template', '=', 'front-page.php' );
	}
	$home_contact_container
		->add_fields( array(
			$Field::make( 'text', 'contact_label', __( 'Label section', 'easyevents' ) )
				->set_default_value( 'Contact' ),
			$Field::make( 'text', 'contact_title', __( 'Titre section', 'easyevents' ) )
				->set_default_value( 'Parlons de votre événement' ),
			$Field::make( 'text', 'contact_highlight', __( 'Mot en évidence', 'easyevents' ) )
				->set_default_value( 'votre événement' ),
			$Field::make( 'textarea', 'contact_subtitle', __( 'Sous-titre section', 'easyevents' ) )
				->set_default_value( 'Notre équipe vous répond sous 24h pour construire ensemble votre projet.' ),
			$Field::make( 'text', 'contact_brand_name', __( 'Nom bloc marque', 'easyevents' ) )
				->set_default_value( 'EasyEvents Group' ),
			$Field::make( 'text', 'contact_brand_tagline', __( 'Tagline bloc marque', 'easyevents' ) )
				->set_default_value( 'Votre partenaire événementiel en Suisse et à la frontière française' ),
		) );
}
