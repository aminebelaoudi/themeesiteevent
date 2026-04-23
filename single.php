<?php
/**
 * Single post template
 *
 * @package EasyEvents
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container" style="padding-top:7rem;padding-bottom:4rem;max-width:48rem">
    <?php while ( have_posts() ) : the_post(); ?>
      <article>
        <?php if ( has_post_thumbnail() ) : ?>
          <div style="border-radius:var(--radius-xl);overflow:hidden;margin-bottom:2rem">
            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;display:block' ) ); ?>
          </div>
        <?php endif; ?>

        <h1 class="font-heading" style="font-size:clamp(1.75rem,4vw,2.5rem);font-weight:800;margin-bottom:.75rem;color:var(--foreground);line-height:1.15"><?php the_title(); ?></h1>

        <div style="display:flex;align-items:center;gap:1rem;color:var(--muted-foreground);font-size:.875rem;margin-bottom:2rem">
          <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
          <span>·</span>
          <span><?php echo esc_html( get_the_author() ); ?></span>
        </div>

        <div class="entry-content" style="color:var(--muted-foreground);line-height:1.8">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php
get_footer();
