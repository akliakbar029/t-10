<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'cricket_tournament_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'cricket_tournament_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/fixtures' ); ?>
	<?php do_action( 'cricket_tournament_after_fixtures' ); ?>

	<?php get_template_part( 'template-parts/home/cricblog' ); ?>
	<?php do_action( 'cricket_tournament_after_cricblog' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'cricket_tournament_after_home_content' ); ?>
</main>

<?php get_footer();
