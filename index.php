<?php
/**
 * Index fallback template
 *
 * @package EasyEvents
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container" style="padding-top:7rem;padding-bottom:4rem">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article style="margin-bottom:2rem">
          <h2 class="font-heading" style="font-size:1.25rem;font-weight:700;margin-bottom:.5rem">
            <a href="<?php the_permalink(); ?>" style="color:var(--foreground)"><?php the_title(); ?></a>
          </h2>
          <p style="color:var(--muted-foreground);font-size:.875rem"><?php echo esc_html( get_the_excerpt() ); ?></p>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
