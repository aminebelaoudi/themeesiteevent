<?php
/**
 * EasyEvents Group — functions.php
 *
 * @package EasyEvents
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EASYEVENTS_VERSION', '1.0.0' );
define( 'EASYEVENTS_DIR', get_template_directory() );
define( 'EASYEVENTS_URI', get_template_directory_uri() );

/* ── Module Loader ─────────────────────────────── */
require_once EASYEVENTS_DIR . '/inc/setup.php';
require_once EASYEVENTS_DIR . '/inc/enqueue.php';
require_once EASYEVENTS_DIR . '/inc/helpers.php';
require_once EASYEVENTS_DIR . '/inc/carbon-fields.php';
require_once EASYEVENTS_DIR . '/inc/service-meta-boxes.php';
require_once EASYEVENTS_DIR . '/inc/service-carbon-fields.php';
require_once EASYEVENTS_DIR . '/inc/activation.php';
