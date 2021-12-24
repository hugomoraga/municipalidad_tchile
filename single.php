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
		width: 100%;
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

			/*the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'municipalidad_tchile' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'municipalidad_tchile' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php

get_footer('principal');

?>
