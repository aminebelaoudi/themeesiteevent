<?php
/**
 * Section: Testimonials
 *
 * @package EasyEvents
 */

// Default testimonials
$testimonials = array(
  array(
    'name'     => 'Marie L.',
    'role'     => 'Directrice RH',
    'company'  => 'Banque Privée',
    'location' => 'Genève',
    'event'    => 'Soirée d\'entreprise',
    'avatar'   => 'ML',
    'rating'   => 5,
    'text'     => 'EasyEvents a transformé notre soirée d\'entreprise en un moment absolument inoubliable. Les barmans jongleurs d\'EasyFlair ont épaté toute notre équipe, et le photobooth 360° était la star de la soirée. Service impeccable du début à la fin.',
    'featured' => true,
  ),
  array(
    'name'     => 'Pierre D.',
    'role'     => 'Chef de projet',
    'company'  => 'Agence Prime Events',
    'location' => 'Lausanne',
    'event'    => 'Mariage – Lac Léman',
    'avatar'   => 'PD',
    'rating'   => 5,
    'text'     => 'En tant qu\'agence, nous avons besoin de partenaires fiables. EasyEvents Group est devenu notre référence. Professionnalisme, créativité et réactivité à chaque mission.',
    'featured' => false,
  ),
  array(
    'name'     => 'Sophie M.',
    'role'     => 'Responsable Marketing',
    'company'  => 'Tech Company',
    'location' => 'Lausanne',
    'event'    => 'Lancement de produit',
    'avatar'   => 'SM',
    'rating'   => 5,
    'text'     => 'Le team building EasyChallenge a dépassé toutes nos attentes. Nos collaborateurs parlent encore de cette journée trois mois plus tard !',
    'featured' => false,
  ),
  array(
    'name'     => 'Laurent B.',
    'role'     => 'Directeur Général',
    'company'  => 'Groupe Hôtelier',
    'location' => 'Nyon',
    'event'    => 'Festival d\'été',
    'avatar'   => 'LB',
    'rating'   => 5,
    'text'     => 'EasyRelax a créé un espace lounge d\'exception pour notre festival. L\'ambiance était exactement ce que nous recherchions — élégante, festive, mémorable.',
    'featured' => false,
  ),
);

// Override with Carbon Fields data if available (safe if plugin not active)
$cf_testimonials = function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'testimonials' ) : null;
if ( ! empty( $cf_testimonials ) && is_array( $cf_testimonials ) ) {
  $testimonials = array();
  foreach ( $cf_testimonials as $t ) {
    $name = $t['testimonial_name'] ?? ( $t['name'] ?? '' );
    $testimonials[] = array(
      'name'     => $name,
      'role'     => $t['testimonial_role'] ?? ( $t['role'] ?? '' ),
      'company'  => $t['testimonial_company'] ?? ( $t['company'] ?? '' ),
      'location' => $t['testimonial_location'] ?? ( $t['location'] ?? '' ),
      'event'    => $t['testimonial_event'] ?? ( $t['event'] ?? '' ),
      'avatar'   => strtoupper( substr( $name, 0, 1 ) . substr( strrchr( $name, ' ' ), 1, 1 ) ),
      'rating'   => intval( $t['testimonial_rating'] ?? ( $t['rating'] ?? 5 ) ),
      'text'     => $t['testimonial_text'] ?? ( $t['text'] ?? '' ),
      'featured' => ! empty( $t['testimonial_featured'] ?? $t['featured'] ?? false ),
    );
  }
}

// Stars helper
function easyevents_stars( $count = 5 ) {
  $stars = '';
  for ( $i = 0; $i < $count; $i++ ) {
    $stars .= '<svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
  }
  return '<div class="testimonial-stars">' . $stars . '</div>';
}

$display_testimonials = array_slice( $testimonials, 0, 3 );
$testimonials_label = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'testimonials_label' ) : '' ) ?: 'Témoignages';
$testimonials_title = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'testimonials_title' ) : '' ) ?: 'Avis clients';
$testimonials_highlight = ( function_exists( 'carbon_get_the_post_meta' ) ? carbon_get_the_post_meta( 'testimonials_highlight' ) : '' ) ?: 'clients';

$testimonials_title_html = esc_html( $testimonials_title );
if ( ! empty( $testimonials_highlight ) && false !== strpos( $testimonials_title, $testimonials_highlight ) ) {
  $testimonials_title_html = str_replace(
    esc_html( $testimonials_highlight ),
    '<span class="italic" style="color:var(--secondary)">' . esc_html( $testimonials_highlight ) . '</span>',
    esc_html( $testimonials_title )
  );
}
?>

<section class="section" style="background:var(--easyflash-light)">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:var(--secondary)"><span class="svc-label__line" style="background:var(--secondary)"></span><?php echo esc_html( $testimonials_label ); ?><span class="svc-label__line" style="background:var(--secondary)"></span></span>
      <h2 class="svc-title" style="color:var(--foreground)"><?php echo wp_kses_post( $testimonials_title_html ); ?></h2>
    </div>

    <div class="home-testimonials-grid animate-on-scroll">
      <?php foreach ( $display_testimonials as $t ) : ?>
        <div class="home-testimonial-card">
          <?php echo easyevents_stars( intval( $t['rating'] ) ); ?>
          <p class="home-testimonial-text">"<?php echo esc_html( $t['text'] ); ?>"</p>
          <div class="home-testimonial-author">
            <div class="home-testimonial-avatar"><?php echo esc_html( ! empty( $t['avatar'] ) ? $t['avatar'] : substr( $t['name'], 0, 1 ) ); ?></div>
            <div>
              <p class="home-testimonial-name"><?php echo esc_html( $t['event'] ? $t['event'] : $t['name'] ); ?></p>
              <p class="home-testimonial-role"><?php echo esc_html( $t['company'] ); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
