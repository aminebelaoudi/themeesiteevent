<?php
/**
 * Theme Footer
 *
 * @package EasyEvents
 */

$services = easyevents_services();
?>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <!-- Brand -->
      <div class="footer-brand">
        <p class="footer-brand__name">Easy<em class="text-gradient-festive">Events</em> Group</p>
        <p class="footer-brand__loc">Toute la Suisse · Frontière française</p>
        <p class="footer-brand__about">Partenaire événementiel B2B depuis plus de 10 ans.</p>
      </div>

      <!-- Columns -->
      <div class="footer-cols">
        <div>
          <p class="footer-col__title">Nos services</p>
          <div class="footer-col__links">
            <?php foreach ( $services as $s ) : ?>
              <a href="<?php echo esc_url( home_url( '/services/' . $s['slug'] . '/' ) ); ?>"><?php echo esc_html( $s['label'] ); ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <div>
          <p class="footer-col__title">Entreprise</p>
          <div class="footer-col__links">
            <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Nos services</a>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom bar -->
    <div class="footer-bottom">
      <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> EasyEvents Group. Tous droits réservés.</p>
      <p>Toute la Suisse, frontière française</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
