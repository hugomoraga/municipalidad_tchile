<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>
<style>
	.container {
		text-align: center;
	}
	.post-thumbnail img {
		margin-top: 30px;
	}
	.entry-header {
		margin-top: 30px;
	}
	.entry-content {
		padding: 40px 14% 50px 14%;
		text-align: justify;
	}
	.navbar {
		box-shadow:none;
	}
	.navbar li {
		margin-left:6px;
		letter-spacing: 1px;
	}
	.navbar li, .navbar a {
		color:#7C7C7D;
	}
	.navbar a:hover {
		color:#1F1F1F;
	}
</style>

<?php
	if ( is_singular() ) : ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-brand" href="#Primary">Inicio</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<a class="nav-brand" href="#">
					<?php
						foreach((get_the_category()) as $category) {
						echo $category->cat_name . ' ';
					} ?>
					</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<a class="nav-brand" href="#"><?php echo get_the_title(); ?></a>
				</li>
			</ul>
		</div>
	</nav>

<?php endif;?>

<div class="container">
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

