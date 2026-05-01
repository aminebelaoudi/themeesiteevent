<?php
/**
 * Enqueue scripts & styles
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'easyevents_enqueue' );

function easyevents_enqueue() {
	$main_css_path          = EASYEVENTS_DIR . '/assets/css/main.css';
	$services_css_path      = EASYEVENTS_DIR . '/assets/css/services.css';
	$service_detail_css_path= EASYEVENTS_DIR . '/assets/css/service-detail.css';
	$blog_css_path          = EASYEVENTS_DIR . '/assets/css/blog.css';
	$main_js_path           = EASYEVENTS_DIR . '/assets/js/main.js';

	$main_css_ver           = file_exists( $main_css_path ) ? filemtime( $main_css_path ) : EASYEVENTS_VERSION;
	$services_css_ver       = file_exists( $services_css_path ) ? filemtime( $services_css_path ) : EASYEVENTS_VERSION;
	$service_detail_css_ver = file_exists( $service_detail_css_path ) ? filemtime( $service_detail_css_path ) : EASYEVENTS_VERSION;
	$blog_css_ver           = file_exists( $blog_css_path ) ? filemtime( $blog_css_path ) : EASYEVENTS_VERSION;
	$main_js_ver            = file_exists( $main_js_path ) ? filemtime( $main_js_path ) : EASYEVENTS_VERSION;

	/* ── Google Fonts ─────────────────────────────── */
	wp_enqueue_style(
		'easyevents-fonts',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	/* ── Main Stylesheet ──────────────────────────── */
	wp_enqueue_style(
		'easyevents-style',
		EASYEVENTS_URI . '/assets/css/main.css',
		array( 'easyevents-fonts' ),
		$main_css_ver
	);

	/* ── Service Overrides ────────────────────────── */
	wp_enqueue_style(
		'easyevents-services',
		EASYEVENTS_URI . '/assets/css/services.css',
		array( 'easyevents-style' ),
		$services_css_ver
	);

	/* ── Service Detail Pages ─────────────────────── */
	if ( is_page_template( 'page-service.php' ) || is_page() ) {
		wp_enqueue_style(
			'easyevents-service-detail',
			EASYEVENTS_URI . '/assets/css/service-detail.css',
			array( 'easyevents-style' ),
			$service_detail_css_ver
		);
	}

	/* ── Blog Pages ──────────────────────────────── */
	if ( is_page_template( 'page-blog.php' ) || is_singular( 'post' ) || is_home() || is_category() || is_tag() || is_date() ) {
		wp_enqueue_style(
			'easyevents-blog',
			EASYEVENTS_URI . '/assets/css/blog.css',
			array( 'easyevents-style' ),
			$blog_css_ver
		);
	}

	/* ── Main JS ──────────────────────────────────── */
	wp_enqueue_script(
		'easyevents-main',
		EASYEVENTS_URI . '/assets/js/main.js',
		array(),
		$main_js_ver,
		array( 'strategy' => 'defer', 'in_footer' => true )
	);
}
