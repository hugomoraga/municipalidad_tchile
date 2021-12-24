<?php
/**
 * Template part for displaying page content in page.php
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

<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php municipalidad_tchile_post_thumbnail(); ?>

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