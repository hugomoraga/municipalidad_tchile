<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package municipalidad_tchile
 */

get_header('principal');
?>

<style>
	img {
		margin-bottom: 3px;
		margin-top: 30px;
		height: auto;
		min-width:195px;
	}
	.post-thumbnail {
		padding: 0px 14% 0px 14%;
	}
</style>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php

get_footer('principal');

?>
