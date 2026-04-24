<?php
/**
 * Template Name: Front Page
 *
 * Homepage template — calls all homepage sections in order.
 *
 * @package EasyEvents
 */

get_header();
?>

<main id="main" class="site-main">

  <?php get_template_part( 'template-parts/sections/hero' ); ?>

  <?php get_template_part( 'template-parts/sections/services' ); ?>

  <?php get_template_part( 'template-parts/sections/why-us' ); ?>

  <?php // get_template_part( 'template-parts/sections/showcase' ); // Section Réalisations — désactivée temporairement ?>

  <?php get_template_part( 'template-parts/sections/testimonials' ); ?>

  <?php get_template_part( 'template-parts/sections/social' ); ?>

  <?php get_template_part( 'template-parts/sections/blog' ); ?>

  <?php get_template_part( 'template-parts/sections/contact' ); ?>

</main>

<?php
get_footer();
