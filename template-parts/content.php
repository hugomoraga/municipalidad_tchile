<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>


<div class="container-lg bg-white p-0">

<?php get_template_part( 'components/breadcrumb', 'post' );
	if ( is_singular() ) : ?>

<?php endif;?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header text-center">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title pt-3">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title pt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->
		<div class="d-flex flex-row-reverse">
			<div class="p-0 bg-light text-primary px-3">Publicado el : <strong><?php echo get_the_date( 'l F j, Y' );?> </strong></div>
		</div>
		

		<?php municipalidad_tchile_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'municipalidad_tchile' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'municipalidad_tchile' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php //the_ID(); ?> -->

</div>

