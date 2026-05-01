<?php
/**
 * Single post template — Blog article detail
 *
 * @package EasyEvents
 */

get_header();

while ( have_posts() ) :
	the_post();

	$post_id       = get_the_ID();
	$author_name   = get_the_author();
	$author_initial= mb_strtoupper( mb_substr( $author_name, 0, 1 ) );
	$post_cats     = get_the_category();
	$primary_cat   = ! empty( $post_cats ) ? $post_cats[0] : null;
	$post_tags     = get_the_tags();
	$has_thumb     = has_post_thumbnail();

	/* ── Reading time ─────────────────────────── */
	$content    = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	$read_time  = max( 1, ceil( $word_count / 200 ) );

	/* ── Category color ───────────────────────── */
	$cat_colors = array(
		'easyflair'     => array( 'bg' => 'rgba(184,150,62,.2)',  'color' => '#b8963e' ),
		'easyflash'     => array( 'bg' => 'rgba(124,92,252,.2)',  'color' => '#7c5cfc' ),
		'easychallenge' => array( 'bg' => 'rgba(232,124,26,.2)',  'color' => '#e87c1a' ),
		'easyrelax'     => array( 'bg' => 'rgba(90,127,80,.2)',   'color' => '#5a7f50' ),
		'easytoilets'   => array( 'bg' => 'rgba(240,65,88,.2)',   'color' => '#f04158' ),
	);
	$cat_slug  = $primary_cat ? $primary_cat->slug : '';
	$cat_c     = isset( $cat_colors[ $cat_slug ] ) ? $cat_colors[ $cat_slug ] : array( 'bg' => 'rgba(124,92,252,.2)', 'color' => '#7c5cfc' );

	/* ── Share URL ────────────────────────────── */
	$share_url   = urlencode( get_permalink() );
	$share_title = urlencode( get_the_title() );
?>

<main id="main" class="site-main">

  <!-- ═══ HERO ═══════════════════════════════════ -->
  <?php if ( $has_thumb ) : ?>
    <section class="blog-detail-hero">
      <div class="blog-detail-hero__bg">
        <?php the_post_thumbnail( 'full', array( 'class' => 'blog-detail-hero__img' ) ); ?>
        <div class="blog-detail-hero__overlay"></div>
      </div>
      <div class="blog-detail-hero__content">
        <div class="container">
          <!-- Breadcrumb -->
          <nav class="blog-detail-hero__breadcrumb" aria-label="Fil d'Ariane">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a>
            <span><?php echo easyevents_icon( 'chevron-right', 12 ); ?></span>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
            <?php if ( $primary_cat ) : ?>
              <span><?php echo easyevents_icon( 'chevron-right', 12 ); ?></span>
              <a href="<?php echo esc_url( add_query_arg( 'cat', $primary_cat->term_id, home_url( '/blog/' ) ) ); ?>"><?php echo esc_html( $primary_cat->name ); ?></a>
            <?php endif; ?>
            <span><?php echo easyevents_icon( 'chevron-right', 12 ); ?></span>
            <span class="current"><?php the_title(); ?></span>
          </nav>

          <!-- Category badge -->
          <?php if ( $primary_cat ) : ?>
            <span class="blog-detail-hero__cat" style="background:<?php echo esc_attr( $cat_c['bg'] ); ?>;color:<?php echo esc_attr( $cat_c['color'] ); ?>">
              <?php echo easyevents_icon( 'tag', 10 ); ?>
              <?php echo esc_html( $primary_cat->name ); ?>
            </span>
          <?php endif; ?>

          <!-- Title -->
          <h1 class="blog-detail-hero__title font-heading"><?php the_title(); ?></h1>

          <!-- Meta -->
          <div class="blog-detail-hero__meta">
            <span class="blog-detail-hero__meta-item">
              <span class="blog-detail-hero__author-avatar"><?php echo esc_html( $author_initial ); ?></span>
              <?php echo esc_html( $author_name ); ?>
            </span>
            <span class="blog-detail-hero__meta-dot"></span>
            <span class="blog-detail-hero__meta-item">
              <?php echo easyevents_icon( 'clock', 13 ); ?>
              <?php echo esc_html( $read_time ); ?> min de lecture
            </span>
            <span class="blog-detail-hero__meta-dot"></span>
            <span class="blog-detail-hero__meta-item">
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
              </time>
            </span>
          </div>
        </div>
      </div>
    </section>

  <?php else : ?>
    <!-- No featured image variant -->
    <section class="blog-detail-hero blog-detail-hero--no-image">
      <div class="blog-detail-hero__content" style="padding:10rem 0 3.5rem">
        <div class="container">
          <nav class="blog-detail-hero__breadcrumb" aria-label="Fil d'Ariane">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a>
            <span><?php echo easyevents_icon( 'chevron-right', 12 ); ?></span>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
            <?php if ( $primary_cat ) : ?>
              <span><?php echo easyevents_icon( 'chevron-right', 12 ); ?></span>
              <a href="<?php echo esc_url( add_query_arg( 'cat', $primary_cat->term_id, home_url( '/blog/' ) ) ); ?>"><?php echo esc_html( $primary_cat->name ); ?></a>
            <?php endif; ?>
            <span><?php echo easyevents_icon( 'chevron-right', 12 ); ?></span>
            <span class="current"><?php the_title(); ?></span>
          </nav>

          <?php if ( $primary_cat ) : ?>
            <span class="blog-detail-hero__cat" style="background:<?php echo esc_attr( $cat_c['bg'] ); ?>;color:<?php echo esc_attr( $cat_c['color'] ); ?>">
              <?php echo easyevents_icon( 'tag', 10 ); ?>
              <?php echo esc_html( $primary_cat->name ); ?>
            </span>
          <?php endif; ?>

          <h1 class="blog-detail-hero__title font-heading"><?php the_title(); ?></h1>

          <div class="blog-detail-hero__meta">
            <span class="blog-detail-hero__meta-item">
              <span class="blog-detail-hero__author-avatar"><?php echo esc_html( $author_initial ); ?></span>
              <?php echo esc_html( $author_name ); ?>
            </span>
            <span class="blog-detail-hero__meta-dot"></span>
            <span class="blog-detail-hero__meta-item">
              <?php echo easyevents_icon( 'clock', 13 ); ?>
              <?php echo esc_html( $read_time ); ?> min de lecture
            </span>
            <span class="blog-detail-hero__meta-dot"></span>
            <span class="blog-detail-hero__meta-item">
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
              </time>
            </span>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>


  <!-- ═══ ARTICLE BODY ═══════════════════════════ -->
  <div class="blog-detail-layout">

    <!-- Empty left column on desktop (for grid centering) -->
    <div></div>

    <!-- Content -->
    <div class="blog-detail-content">

      <!-- Mobile share bar -->
      <div class="blog-detail-share-mobile">
        <span class="blog-detail-share-mobile__label">Partager</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Partager sur Facebook">
          <?php echo easyevents_icon( 'facebook', 16 ); ?>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Partager sur LinkedIn">
          <?php echo easyevents_icon( 'linkedin', 16 ); ?>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Partager sur X">
          <?php echo easyevents_icon( 'message', 16 ); ?>
        </a>
        <button class="blog-detail-share__btn" aria-label="Copier le lien" onclick="eeBlogCopyLink()">
          <?php echo easyevents_icon( 'copy', 16 ); ?>
        </button>
      </div>

      <!-- Article content -->
      <article>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <!-- Tags -->
        <?php if ( ! empty( $post_tags ) ) : ?>
          <div class="blog-detail-tags">
            <?php foreach ( $post_tags as $tag ) : ?>
              <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="blog-detail-tag">
                # <?php echo esc_html( $tag->name ); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <!-- Post navigation -->
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        if ( $prev_post || $next_post ) :
        ?>
          <nav class="blog-post-nav" aria-label="Navigation articles">
            <?php if ( $prev_post ) : ?>
              <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="blog-post-nav__item">
                <span class="blog-post-nav__icon">
                  <?php echo easyevents_icon( 'arrow-left', 16 ); ?>
                </span>
                <div>
                  <span class="blog-post-nav__label">Article précédent</span>
                  <span class="blog-post-nav__title"><?php echo esc_html( $prev_post->post_title ); ?></span>
                </div>
              </a>
            <?php else : ?>
              <div></div>
            <?php endif; ?>

            <?php if ( $next_post ) : ?>
              <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="blog-post-nav__item blog-post-nav__item--next">
                <span class="blog-post-nav__icon">
                  <?php echo easyevents_icon( 'arrow-right', 16 ); ?>
                </span>
                <div>
                  <span class="blog-post-nav__label">Article suivant</span>
                  <span class="blog-post-nav__title"><?php echo esc_html( $next_post->post_title ); ?></span>
                </div>
              </a>
            <?php endif; ?>
          </nav>
        <?php endif; ?>
      </article>
    </div>

    <!-- Floating share sidebar (desktop) -->
    <aside class="blog-detail-share" aria-label="Partager">
      <span class="blog-detail-share__label">Partager</span>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Partager sur Facebook">
        <?php echo easyevents_icon( 'facebook', 16 ); ?>
      </a>
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Partager sur LinkedIn">
        <?php echo easyevents_icon( 'linkedin', 16 ); ?>
      </a>
      <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Partager sur X">
        <?php echo easyevents_icon( 'message', 16 ); ?>
      </a>
      <button class="blog-detail-share__btn" aria-label="Copier le lien" onclick="eeBlogCopyLink()">
        <?php echo easyevents_icon( 'copy', 16 ); ?>
      </button>
    </aside>
  </div>


  <!-- ═══ RELATED ARTICLES ═══════════════════════ -->
  <?php
  $related_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => array( $post_id ),
  );
  if ( $primary_cat ) {
    $related_args['cat'] = $primary_cat->term_id;
  }
  $related_query = new WP_Query( $related_args );

  if ( $related_query->have_posts() ) :
  ?>
    <section class="blog-related">
      <div class="container" style="position:relative;z-index:1">
        <div class="section-header">
          <span class="section-label">À lire aussi</span>
          <h2 class="section-title">Articles similaires</h2>
        </div>

        <div class="blog-grid" style="max-width:64rem;margin:0 auto">
          <?php while ( $related_query->have_posts() ) : $related_query->the_post();
            $r_cats    = get_the_category();
            $r_cat     = ! empty( $r_cats ) ? $r_cats[0] : null;
            $r_slug    = $r_cat ? $r_cat->slug : '';
            $r_name    = $r_cat ? $r_cat->name : '';
            $r_c       = isset( $cat_colors[ $r_slug ] ) ? $cat_colors[ $r_slug ] : array( 'bg' => 'rgba(124,92,252,.15)', 'color' => '#7c5cfc' );
            $r_author  = get_the_author();
            $r_initial = mb_strtoupper( mb_substr( $r_author, 0, 1 ) );
            $r_content = get_post_field( 'post_content', get_the_ID() );
            $r_time    = max( 1, ceil( str_word_count( wp_strip_all_tags( $r_content ) ) / 200 ) );
          ?>
            <article class="blog-archive-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="blog-archive-card__img-wrap" aria-label="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail( 'medium_large', array( 'class' => 'blog-archive-card__img', 'loading' => 'lazy' ) ); ?>
                  <?php if ( $r_name ) : ?>
                    <span class="blog-archive-card__cat-badge" style="background:<?php echo esc_attr( $r_c['bg'] ); ?>;color:<?php echo esc_attr( $r_c['color'] ); ?>">
                      <?php echo easyevents_icon( 'tag', 9 ); ?>
                      <?php echo esc_html( $r_name ); ?>
                    </span>
                  <?php endif; ?>
                </a>
              <?php endif; ?>
              <div class="blog-archive-card__body">
                <h3 class="blog-archive-card__title">
                  <a href="<?php the_permalink(); ?>" style="color:inherit"><?php the_title(); ?></a>
                </h3>
                <p class="blog-archive-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
                <div class="blog-archive-card__meta">
                  <span class="blog-archive-card__author-avatar" style="background:<?php echo esc_attr( $r_c['color'] ); ?>">
                    <?php echo esc_html( $r_initial ); ?>
                  </span>
                  <span class="blog-archive-card__meta-item"><?php echo esc_html( $r_author ); ?></span>
                  <span class="blog-archive-card__meta-item" style="opacity:.5">·</span>
                  <span class="blog-archive-card__meta-item">
                    <?php echo easyevents_icon( 'clock', 11 ); ?>
                    <?php echo esc_html( $r_time ); ?> min
                  </span>
                  <a href="<?php the_permalink(); ?>" class="blog-archive-card__read-more">
                    Lire <?php echo easyevents_icon( 'arrow-right', 12 ); ?>
                  </a>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

</main>

<!-- Copy link toast + script -->
<div class="copy-toast" id="copyToast">Lien copié !</div>
<script>
function eeBlogCopyLink(){
  navigator.clipboard.writeText(window.location.href).then(function(){
    var t=document.getElementById('copyToast');
    t.classList.add('copy-toast--visible');
    setTimeout(function(){t.classList.remove('copy-toast--visible')},2000);
  });
}
</script>

<?php endwhile; ?>

<?php
get_footer();
