<?php
/**
 * Generic page template
 *
 * @package EasyEvents
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container" style="padding-top:7rem;padding-bottom:4rem">
    <?php while ( have_posts() ) : the_post(); ?>
      <h1 class="font-heading" style="font-size:clamp(1.75rem,4vw,2.75rem);font-weight:800;margin-bottom:1.5rem;color:var(--foreground)"><?php the_title(); ?></h1>
      <div class="entry-content" style="max-width:48rem;color:var(--muted-foreground);line-height:1.8">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php
get_footer();
