<?php
/**
 * Single post template — Blog article detail
 *
 * Layout: compact hero + 2-column (sidebar left, content right)
 * Image displayed inline at full quality — not as hero background.
 *
 * @package EasyEvents
 */

get_header();

while ( have_posts() ) :
	the_post();

	$post_id       = get_the_ID();
	$post_cats     = get_the_category();
	$primary_cat   = ! empty( $post_cats ) ? $post_cats[0] : null;
	$post_tags     = get_the_tags();

	/* ── Category color ───────────────────────── */
	$cat_colors = array(
		'easyflair'     => array( 'bg' => 'rgba(184,150,62,.15)',  'color' => 'var(--easyflair)' ),
		'easyflash'     => array( 'bg' => 'rgba(124,92,252,.15)',  'color' => 'var(--easyflash)' ),
		'easychallenge' => array( 'bg' => 'rgba(232,124,26,.15)',  'color' => 'var(--easychallenge)' ),
		'easyrelax'     => array( 'bg' => 'rgba(90,127,80,.15)',   'color' => 'var(--easyrelax)' ),
		'easytoilets'   => array( 'bg' => 'rgba(240,65,88,.15)',   'color' => 'var(--easytoilets)' ),
	);
	$cat_slug  = $primary_cat ? $primary_cat->slug : '';
	$cat_c     = isset( $cat_colors[ $cat_slug ] ) ? $cat_colors[ $cat_slug ] : array( 'bg' => 'rgba(124,92,252,.15)', 'color' => 'var(--secondary)' );

	/* ── Share URL ────────────────────────────── */
	$share_url   = urlencode( get_permalink() );
	$share_title = urlencode( get_the_title() );

	/* ── Recent posts for sidebar ─────────────── */
	$recent_posts = new WP_Query( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'post__not_in'   => array( $post_id ),
	) );

	/* ── All categories for sidebar ───────────── */
	$all_cats = get_categories( array(
		'orderby'    => 'count',
		'order'      => 'DESC',
		'hide_empty' => true,
	) );

  /* ── Cross-sell services (same model as service pages) ── */
  $services_raw = easyevents_services();
  $service_order = array( 'easyflair', 'easyflash', 'easychallenge', 'easyrelax', 'easytoilets' );
  $crosssell_services = array();
  foreach ( $service_order as $slug ) {
    if ( isset( $services_raw[ $slug ] ) ) {
      $crosssell_services[] = $services_raw[ $slug ];
    }
  }

  $crosssell_images = array(
    'easyflair'     => get_theme_file_uri( 'assets/images/Formule-barman-02.jpg' ),
    'easyflash'     => get_theme_file_uri( 'assets/images/homepage-banner-box.jpg' ),
    'easychallenge' => get_theme_file_uri( 'assets/images/easychallenge-team.jpg' ),
    'easyrelax'     => get_theme_file_uri( 'assets/images/easyrelax hero.png' ),
    'easytoilets'   => get_theme_file_uri( 'assets/images/easytoilets-banner2.jpg' ),
  );
?>

<main id="main" class="site-main">

  <!-- ═══ COMPACT HERO ═══════════════════════════ -->
  <section class="blog-hero-light" style="padding:9rem 0 3rem">
    <div class="blog-hero-light__orb blog-hero-light__orb--1"></div>
    <div class="blog-hero-light__orb blog-hero-light__orb--2"></div>
    <div class="blog-hero-light__orb blog-hero-light__orb--3"></div>
    <div class="container" style="position:relative;z-index:2">
      <!-- Breadcrumb -->
      <nav class="blog-detail-breadcrumb" aria-label="Fil d'Ariane">
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
      <h1 class="blog-hero-light__title font-heading" style="font-size:clamp(1.75rem,4vw,2.5rem)">Détail de l'article</h1>
    </div>
  </section>


  <!-- ═══ TWO-COLUMN LAYOUT ═════════════════════ -->
  <section class="section" style="padding-top:2.5rem">
    <div class="container">
      <div class="blog-detail-2col">

        <!-- ── SIDEBAR (left) ─────────────────── -->
        <aside class="blog-sidebar">

          <!-- Recent posts -->
          <?php if ( $recent_posts->have_posts() ) : ?>
            <div class="blog-sidebar__block">
              <h3 class="blog-sidebar__title font-heading">Articles récents</h3>
              <div class="blog-sidebar__posts">
                <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                  <a href="<?php the_permalink(); ?>" class="blog-sidebar-post">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <div class="blog-sidebar-post__img">
                        <?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); ?>
                      </div>
                    <?php endif; ?>
                    <div>
                      <span class="blog-sidebar-post__title"><?php the_title(); ?></span>
                      <span class="blog-sidebar-post__date">
                        <?php echo easyevents_icon( 'calendar', 10 ); ?>
                        <?php echo esc_html( get_the_date() ); ?>
                      </span>
                    </div>
                  </a>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Newsletter -->
          <div class="blog-sidebar__block blog-sidebar__newsletter">
            <h3 class="blog-sidebar__title font-heading">Newsletter</h3>
            <p style="font-size:.8125rem;color:var(--muted-foreground);line-height:1.6;margin-bottom:1rem">
              Recevez nos conseils événementiels directement dans votre boîte mail.
            </p>
            <div style="display:flex;gap:.5rem">
              <input type="email" placeholder="Votre email" class="blog-sidebar__input" />
              <button class="btn btn-primary" style="padding:.625rem 1.25rem;font-size:.75rem;white-space:nowrap">
                S'inscrire
              </button>
            </div>
          </div>

          <!-- Categories -->
          <?php if ( ! empty( $all_cats ) ) : ?>
            <div class="blog-sidebar__block">
              <h3 class="blog-sidebar__title font-heading">Catégories</h3>
              <ul class="blog-sidebar__cats">
                <?php foreach ( $all_cats as $cat ) : ?>
                  <li>
                    <a href="<?php echo esc_url( add_query_arg( 'cat', $cat->term_id, home_url( '/blog/' ) ) ); ?>" class="blog-sidebar__cat-link">
                      <span><?php echo esc_html( $cat->name ); ?></span>
                      <span class="blog-sidebar__cat-count">(<?php echo esc_html( $cat->count ); ?>)</span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

        </aside>


        <!-- ── MAIN CONTENT (right) ───────────── -->
        <div class="blog-detail-main">

          <!-- Featured image — full quality, inline -->
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="blog-detail-main__img-wrap">
              <?php the_post_thumbnail( 'full', array(
                'class'   => 'blog-detail-main__img',
                'loading' => 'eager',
              ) ); ?>
            </div>
          <?php endif; ?>

          <!-- Title -->
          <h1 class="blog-detail-main__title font-heading"><?php the_title(); ?></h1>

          <!-- Meta -->
          <div class="blog-detail-main__meta">
            <span class="blog-detail-main__meta-item">
              <?php echo easyevents_icon( 'calendar', 13 ); ?>
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
            </span>
          </div>

          <!-- Article content -->
          <article>
            <div class="entry-content blog-detail-entry">
              <?php the_content(); ?>
            </div>
          </article>

          <!-- Tags + Share row -->
          <div class="blog-detail-footer">
            <!-- Tags -->
            <div class="blog-detail-footer__tags">
              <?php if ( ! empty( $post_tags ) ) : ?>
                <?php foreach ( $post_tags as $tag ) : ?>
                  <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="blog-detail-tag">
                    <?php echo esc_html( $tag->name ); ?>
                  </a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <!-- Share -->
            <div class="blog-detail-footer__share">
              <span class="blog-detail-footer__share-label">Partager</span>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="Facebook">
                <?php echo easyevents_icon( 'facebook', 15 ); ?>
              </a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="LinkedIn">
                <?php echo easyevents_icon( 'linkedin', 15 ); ?>
              </a>
              <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer" class="blog-detail-share__btn" aria-label="X / Twitter">
                <?php echo easyevents_icon( 'message', 15 ); ?>
              </a>
              <button class="blog-detail-share__btn" aria-label="Copier le lien" onclick="eeBlogCopyLink()">
                <?php echo easyevents_icon( 'copy', 15 ); ?>
              </button>
            </div>
          </div>

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

        </div><!-- /.blog-detail-main -->

      </div><!-- /.blog-detail-2col -->
    </div>
  </section>


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
            $r_c       = isset( $cat_colors[ $r_slug ] ) ? $cat_colors[ $r_slug ] : array( 'bg' => 'rgba(124,92,252,.15)', 'color' => 'var(--secondary)' );
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

  <!-- ═══ CROSS-SELL SERVICES ═══════════════════ -->
  <section class="section" style="background:linear-gradient(140deg,#151520 0%,#1c1b2b 50%,#1e3542 100%);padding:5rem 0;position:relative;overflow:hidden">
    <div class="container" style="position:relative;z-index:1">
      <div class="crosssell-header animate-on-scroll">
        <div>
          <span class="svc-label" style="color:rgba(255,255,255,.75)">EasyEvents Group</span>
          <h2 style="color:#fff">Découvrez nos <span style="color:#8db9ff">autres expertises</span></h2>
        </div>
        <div class="crosssell-nav" aria-label="Navigation services">
          <button type="button" data-crosssell-prev class="crosssell-nav__btn" aria-label="Service précédent">
            <?php echo easyevents_icon( 'chevron-left', 16 ); ?>
          </button>
          <button type="button" data-crosssell-next class="crosssell-nav__btn" aria-label="Service suivant">
            <?php echo easyevents_icon( 'chevron-right', 16 ); ?>
          </button>
        </div>
      </div>

      <div class="crosssell-grid crosssell-grid--slider animate-on-scroll" data-crosssell-track>
        <?php foreach ( $crosssell_services as $service ) :
          $service_page = get_page_by_path( 'services/' . $service['slug'] );
          $service_img  = $service_page && has_post_thumbnail( $service_page ) ? get_the_post_thumbnail_url( $service_page, 'medium_large' ) : '';
          if ( empty( $service_img ) && isset( $crosssell_images[ $service['slug'] ] ) ) {
            $service_img = $crosssell_images[ $service['slug'] ];
          }
        ?>
          <a href="<?php echo esc_url( home_url( '/services/' . $service['slug'] . '/' ) ); ?>" class="crosssell-card">
            <?php if ( $service_img ) : ?>
              <img src="<?php echo esc_url( $service_img ); ?>" alt="<?php echo esc_attr( $service['label'] ); ?>" class="crosssell-card__img" loading="lazy">
            <?php endif; ?>
            <div class="crosssell-card__overlay"></div>
            <div class="crosssell-card__content">
              <div class="crosssell-card__icon"><?php echo easyevents_icon( $service['icon'], 15 ); ?></div>
              <h3><?php echo esc_html( $service['label'] ); ?></h3>
              <p><?php echo wp_kses_post( $service['tagline'] ); ?></p>
            </div>
            <div class="crosssell-card__arrow"><?php echo easyevents_icon( 'arrow-right', 12 ); ?></div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/sections/contact' ); ?>

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
