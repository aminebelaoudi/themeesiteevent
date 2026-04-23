<?php
/**
 * Theme Header
 *
 * @package EasyEvents
 */

$is_front = is_front_page();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php
  // Service data attribute for service pages
  if ( is_page_template( 'page-service.php' ) ) {
    $slug = get_post_field( 'post_name', get_the_ID() );
    echo 'data-service="' . esc_attr( $slug ) . '"';
  }
?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
  <div class="container site-header__inner">
    <!-- Logo -->
    <?php
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) :
      $logo_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
      $logo_alt = $logo_alt ? $logo_alt : get_bloginfo( 'name' );
    ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo logo--image" aria-label="<?php bloginfo( 'name' ); ?>">
        <?php echo wp_get_attachment_image( $custom_logo_id, 'full', false, array( 'class' => 'logo__img', 'alt' => $logo_alt ) ); ?>
      </a>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php bloginfo( 'name' ); ?>">
        <div class="logo__mark" aria-hidden="true">
          <svg width="34" height="34" viewBox="0 0 34 34" fill="none"><path d="M17 1L33 17L17 33L1 17Z" fill="var(--secondary)"/><rect x="9.5" y="11.5" width="15" height="2.5" rx="1.25" fill="var(--foreground)"/><rect x="9.5" y="15.75" width="10" height="2.5" rx="1.25" fill="var(--foreground)"/><rect x="9.5" y="20" width="15" height="2.5" rx="1.25" fill="var(--foreground)"/></svg>
        </div>
        <div>
          <span class="logo__text">Easy<em>Events</em></span>
          <span class="logo__group">Group</span>
        </div>
      </a>
    <?php endif; ?>

    <!-- Service pills — desktop -->
    <nav class="nav-pills" aria-label="Services">
      <?php
      $services = easyevents_services();
      $icons    = array(
        'easyflair'     => 'wine',
        'easyflash'     => 'camera',
        'easychallenge' => 'trophy',
        'easyrelax'     => 'coffee',
        'easytoilets'   => 'droplets',
      );
      foreach ( $services as $s ) :
        $icon_name = isset( $icons[ $s['slug'] ] ) ? $icons[ $s['slug'] ] : 'star';
      ?>
        <a href="<?php echo esc_url( home_url( '/services/' . $s['slug'] . '/' ) ); ?>" class="nav-pill" data-service="<?php echo esc_attr( $s['slug'] ); ?>">
          <?php echo easyevents_icon( $icon_name, 13 ); ?>
          <span><?php echo esc_html( $s['label'] ); ?></span>
        </a>
      <?php endforeach; ?>
    </nav>

    <!-- Mobile toggle -->
    <button class="mobile-toggle" aria-label="Menu" aria-expanded="false" aria-controls="mobile-menu">
      <?php echo easyevents_icon( 'menu', 22 ); ?>
    </button>
  </div>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="mobile-menu" aria-label="Menu mobile">
    <?php foreach ( $services as $s ) :
      $icon_name = isset( $icons[ $s['slug'] ] ) ? $icons[ $s['slug'] ] : 'star';
    ?>
      <a href="<?php echo esc_url( home_url( '/services/' . $s['slug'] . '/' ) ); ?>" class="nav-pill" data-service="<?php echo esc_attr( $s['slug'] ); ?>">
        <?php echo easyevents_icon( $icon_name, 15 ); ?>
        <span><?php echo esc_html( $s['label'] ); ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</header>
