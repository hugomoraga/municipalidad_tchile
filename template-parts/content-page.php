<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>


<div class="container p-0 shadow-sm mb-3">

<?php
	if ( is_singular() ) : ?>
	<nav class="navbar navbar-expand-lg pt-3 bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="d-inline-flex fw-bold">
				<li class="nav-item">
					<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<a class="nav-brand" href="#"><?php echo get_the_title(); ?></a>
				</li>
			</ul>
		</div>
	</nav>

<?php endif;?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header pb-2">
		<?php the_title( '<h1 class="entry-title pb-1">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php municipalidad_tchile_post_thumbnail( 'medium_large'); ?>

	<div class="entry-content pt-3 mt-4">
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