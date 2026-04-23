<?php
/**
 * 404 page template
 *
 * @package EasyEvents
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container" style="padding-top:12rem;padding-bottom:8rem;text-align:center">
    <p class="font-heading" style="font-size:6rem;font-weight:900;line-height:1;color:var(--secondary);opacity:.2;margin-bottom:1rem">404</p>
    <h1 class="font-heading" style="font-size:2rem;font-weight:800;color:var(--foreground);margin-bottom:1rem">Page introuvable</h1>
    <p style="color:var(--muted-foreground);max-width:24rem;margin:0 auto 2rem;line-height:1.7">
      La page que vous recherchez n'existe pas ou a été déplacée.
    </p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
      Retour à l'accueil
    </a>
  </div>
</main>

<?php
get_footer();
