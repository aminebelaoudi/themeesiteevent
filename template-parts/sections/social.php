<?php
/**
 * Section: Social Media
 *
 * @package EasyEvents
 */

$social_links = array(
  array( 'icon' => 'instagram', 'label' => 'Instagram', 'handle' => '@easyevents_group', 'href' => '#', 'hover' => 'color:#e1306c' ),
  array( 'icon' => 'facebook',  'label' => 'Facebook',  'handle' => 'EasyEvents Group',  'href' => '#', 'hover' => 'color:#1877f2' ),
  array( 'icon' => 'linkedin',  'label' => 'LinkedIn',  'handle' => 'EasyEvents Group',  'href' => '#', 'hover' => 'color:#0a66c2' ),
);

// Override from theme options (safe if plugin not active)
$ig_url = function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_instagram' ) : '';
$fb_url = function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_facebook' ) : '';
$li_url = function_exists( 'carbon_get_theme_option' ) ? carbon_get_theme_option( 'ee_linkedin' ) : '';
if ( $ig_url ) $social_links[0]['href'] = $ig_url;
if ( $fb_url ) $social_links[1]['href'] = $fb_url;
if ( $li_url ) $social_links[2]['href'] = $li_url;

$feed = array(
  array( 'caption' => 'Une soirée cocktail mémorable ✨' ),
  array( 'caption' => 'Le photobooth 360° fait fureur 📸' ),
  array( 'caption' => 'Team building en pleine nature 🏆' ),
  array( 'caption' => 'Gala d\'entreprise à Genève 🎊' ),
  array( 'caption' => 'Nos barmans en action 🍹' ),
  array( 'caption' => 'Défis & sourires garantis 🎯' ),
);

$social_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'social_label' ) : '' ) ?: 'Réseaux sociaux';
$social_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'social_title' ) : '' ) ?: 'Suivez l\'action en direct';
$social_subtitle = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'social_subtitle' ) : '' ) ?: 'Coulisses, moments forts et inspirations événementielles — rejoignez notre communauté.';

$cf_social_links = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'social_links' ) : null;
if ( ! empty( $cf_social_links ) && is_array( $cf_social_links ) ) {
  $social_links = array();
  foreach ( $cf_social_links as $row ) {
    $social_links[] = array(
      'icon' => $row['social_icon'] ?? 'instagram',
      'label' => $row['social_label'] ?? '',
      'handle' => $row['social_handle'] ?? '',
      'href' => $row['social_href'] ?? '#',
      'hover' => '',
    );
  }
}

$cf_social_feed = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'social_feed' ) : null;
if ( ! empty( $cf_social_feed ) && is_array( $cf_social_feed ) ) {
  $feed = array();
  foreach ( $cf_social_feed as $row ) {
    $feed[] = array(
      'caption' => $row['social_caption'] ?? '',
      'image'   => ! empty( $row['social_image'] ) ? wp_get_attachment_image_url( $row['social_image'], 'medium' ) : '',
    );
  }
}
?>

<section class="section">
  <div class="container">
    <!-- Header -->
    <div class="section-header animate-on-scroll">
      <span style="display:inline-block;background:rgba(124,92,252,.1);color:var(--secondary);padding:.375rem 1rem;border-radius:var(--radius-full);font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.18em;margin-bottom:.75rem" class="font-heading">
        <?php echo esc_html( $social_label ); ?>
      </span>
      <h2 class="section-title"><?php echo esc_html( $social_title ); ?></h2>
      <p class="section-desc" style="max-width:28rem">
        <?php echo esc_html( $social_subtitle ); ?>
      </p>
    </div>

    <!-- Social links bar -->
    <div class="social-links animate-on-scroll">
      <?php foreach ( $social_links as $s ) : ?>
        <a href="<?php echo esc_url( $s['href'] ); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
          <?php echo easyevents_icon( $s['icon'], 18 ); ?>
          <span><?php echo esc_html( $s['label'] ); ?></span>
          <span style="font-size:.75rem;color:var(--muted-foreground);opacity:.6"><?php echo esc_html( $s['handle'] ); ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Instagram-style feed grid -->
    <div class="social-grid">
      <?php $i = 0; foreach ( $feed as $item ) : $i++; ?>
        <div class="social-item animate-on-scroll" data-delay="<?php echo esc_attr( $i ); ?>">
          <?php if ( ! empty( $item['image'] ) ) : ?>
            <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['caption'] ); ?>" style="width:100%;height:100%;object-fit:cover" class="social-item__img" loading="lazy">
          <?php else : ?>
            <div style="width:100%;height:100%;background:var(--muted)" class="social-item__img"></div>
          <?php endif; ?>
          <div class="social-item__hover">
            <?php echo easyevents_icon( 'instagram', 20 ); ?>
            <p class="font-heading" style="font-size:.625rem;font-weight:600;line-height:1.3;padding:0 .75rem;text-align:center">
              <?php echo esc_html( $item['caption'] ); ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
