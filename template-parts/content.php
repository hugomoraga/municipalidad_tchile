<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>

<div class="container p-0">


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
					<?php
						$categoria = ""; $param = "?cat="; $cont = 0;
						foreach((get_the_category()) as $category) {
						if($cont==0) {
							$categoria = $categoria . $category->cat_name . ' ';
							$param = $param . $category->slug;
						  } $cont++;
						} if($categoria=="") $categoria=get_post_type();
					?>
					<a class="nav-brand" href="<?php echo home_url()."/".get_post_type()."" ?>">
				<?php	$post_type = get_post_type_object( get_post_type($post) );
						echo $post_type->label; ?>


					</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<span class="nav-brand fs-bold"><?php echo get_the_title(); ?></span>
				</li>
			</ul>
		</div>
	</nav>

<?php endif;?>
</div>
<div class="container bg-white pt-3">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->

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

