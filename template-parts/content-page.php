<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>


<div class="container-lg p-0 shadow-sm bg-white">

<?php get_template_part( 'components/breadcrumb', 'page' );
	if ( is_singular() ) : ?>

<?php endif;?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header pb-2">
		<?php the_title( '<h1 class="entry-title p-3 text-center">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php municipalidad_tchile_post_thumbnail( 'medium_large'); ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'municipalidad_tchile' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
</div>