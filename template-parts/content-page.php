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
		<?php		$categories = get_the_category();
foreach ($categories as $cat) {
   $category_link = get_category_link($cat->cat_ID);
   echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'"> &nbsp'.$cat->name.'</a>';
} ?>
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
		<?php the_title( '<h1 class="entry-title p-3 text-center">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php municipalidad_tchile_post_thumbnail( 'medium_large'); ?>

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