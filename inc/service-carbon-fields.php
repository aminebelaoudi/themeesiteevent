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
