<?php
/**
 * Section: Contact
 *
 * @package EasyEvents
 */

// Get from theme options or use defaults
$phone   = ( function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_phone_1' ) : '' ) ?: '+41 22 519 21 66';
$phone2  = ( function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_phone_2' ) : '' ) ?: '+41 78 948 67 27';
$email   = ( function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_email' ) : '' ) ?: 'contact@easyevents.ch';
$addr_raw = ( function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_address' ) : '' ) ?: "Route des jeunes, 6\n1227 Genève – Suisse";
$addr_lines = explode( "\n", $addr_raw );
$address = trim( $addr_lines[0] ?? 'Route des jeunes, 6' );
$city    = trim( $addr_lines[1] ?? '1227 Genève – Suisse' );
$hours   = ( function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_hours_detail' ) : '' ) ?: '9h00 – 18h00 · Réponse sous 24h';

$contact_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'contact_label' ) : '' ) ?: 'Contact';
$contact_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'contact_title' ) : '' ) ?: 'Parlons de votre événement';
$contact_highlight = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'contact_highlight' ) : '' ) ?: 'votre événement';
$contact_subtitle = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'contact_subtitle' ) : '' ) ?: 'Notre équipe vous répond sous 24h pour construire ensemble votre projet.';
$contact_brand_name = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'contact_brand_name' ) : '' ) ?: 'EasyEvents Group';
$contact_brand_tagline = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'contact_brand_tagline' ) : '' ) ?: 'Votre partenaire événementiel en Suisse romande';

$contact_title_html = esc_html( $contact_title );
if ( ! empty( $contact_highlight ) && false !== strpos( $contact_title, $contact_highlight ) ) {
  $contact_title_html = str_replace(
    esc_html( $contact_highlight ),
    '<span class="text-gradient-festive">' . esc_html( $contact_highlight ) . '</span>',
    esc_html( $contact_title )
  );
}

$contact_items = array(
  array(
    'icon'    => 'map-pin',
    'label'   => 'Adresse',
    'lines'   => array( $address, $city ),
    'bg'      => 'hsla(245,80%,64%,.18)',
    'color'   => 'var(--easyflash)',
  ),
  array(
    'icon'    => 'phone',
    'label'   => 'Téléphone',
    'lines'   => array( $phone, $phone2 ),
    'bg'      => 'hsla(155,70%,38%,.18)',
    'color'   => 'var(--easychallenge)',
  ),
  array(
    'icon'    => 'mail',
    'label'   => 'Email',
    'lines'   => array( $email ),
    'bg'      => 'hsla(210,65%,55%,.18)',
    'color'   => 'var(--easytoilets)',
  ),
);
?>

<section id="contact" class="section" style="background:rgba(240,235,248,.4);position:relative;overflow:hidden">
  <!-- Ambient glows -->
  <div style="position:absolute;top:0;right:25%;width:500px;height:400px;background:rgba(124,92,252,.15);border-radius:50%;filter:blur(120px);pointer-events:none"></div>
  <div style="position:absolute;bottom:0;left:25%;width:400px;height:300px;background:rgba(232,124,26,.15);border-radius:50%;filter:blur(100px);pointer-events:none"></div>

  <div class="container" style="position:relative;z-index:1">
    <!-- Header -->
    <div class="section-header animate-on-scroll">
      <span class="section-label"><?php echo esc_html( $contact_label ); ?></span>
      <h2 class="section-title"><?php echo wp_kses_post( $contact_title_html ); ?></h2>
      <p class="section-desc"><?php echo esc_html( $contact_subtitle ); ?></p>
    </div>

    <div style="max-width:32rem;margin:0 auto">
      <!-- Brand block -->
      <div class="contact-block animate-on-scroll">
        <div class="contact-block__watermark">EE</div>

        <div style="margin-bottom:1.5rem">
          <p class="font-heading" style="font-weight:800;font-size:1.25rem;color:#fff;margin-bottom:.25rem"><?php echo esc_html( $contact_brand_name ); ?></p>
          <p style="color:rgba(255,255,255,.4);font-size:.875rem"><?php echo esc_html( $contact_brand_tagline ); ?></p>
        </div>

        <div style="display:flex;flex-direction:column;gap:1.25rem">
          <?php foreach ( $contact_items as $item ) : ?>
            <div class="contact-item">
              <div class="contact-item__icon" style="background:<?php echo esc_attr( $item['bg'] ); ?>;color:<?php echo esc_attr( $item['color'] ); ?>">
                <?php echo easyevents_icon( $item['icon'], 16 ); ?>
              </div>
              <div>
                <p class="contact-item__label"><?php echo esc_html( $item['label'] ); ?></p>
                <?php foreach ( $item['lines'] as $line ) : ?>
                  <p class="contact-item__value"><?php echo esc_html( $line ); ?></p>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Availability badge -->
      <div class="availability-badge animate-on-scroll" style="margin-top:1.5rem">
        <div style="display:flex;align-items:center;gap:.75rem">
          <span class="pulse-dot"></span>
          <div>
            <p class="font-heading" style="font-weight:700;font-size:.875rem;color:var(--foreground)">Disponible du lundi au vendredi</p>
            <p style="color:var(--muted-foreground);font-size:.75rem;margin-top:.125rem"><?php echo esc_html( $hours ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
