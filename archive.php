<?php
/**
 * Archive / Blog index template
 *
 * @package EasyEvents
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container" style="padding-top:7rem;padding-bottom:4rem">
    <div class="section-header">
      <span class="section-label">Blog</span>
      <h1 class="section-title">
        <?php
        if ( is_category() ) {
          single_cat_title();
        } elseif ( is_tag() ) {
          single_tag_title();
        } else {
          echo 'Blog & Inspirations';
        }
        ?>
      </h1>
    </div>

    <?php if ( have_posts() ) : ?>
      <div class="showcase-grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="card" style="overflow:hidden">
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>" style="display:block;aspect-ratio:16/9;overflow:hidden">
                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:100%;object-fit:cover;transition:transform .5s', 'class' => '' ) ); ?>
              </a>
            <?php endif; ?>
            <div style="padding:1.5rem">
              <h2 class="font-heading" style="font-size:1.125rem;font-weight:700;margin-bottom:.5rem;line-height:1.3">
                <a href="<?php the_permalink(); ?>" style="color:var(--foreground);transition:color .2s"><?php the_title(); ?></a>
              </h2>
              <p style="color:var(--muted-foreground);font-size:.875rem;line-height:1.6;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden">
                <?php echo esc_html( get_the_excerpt() ); ?>
              </p>
              <div style="margin-top:1rem;color:var(--muted-foreground);font-size:.75rem">
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <div style="margin-top:3rem;text-align:center">
        <?php
        the_posts_pagination( array(
          'prev_text' => '&laquo; Précédent',
          'next_text' => 'Suivant &raquo;',
        ) );
        ?>
      </div>
    <?php else : ?>
      <p style="text-align:center;color:var(--muted-foreground)">Aucun article pour le moment.</p>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
