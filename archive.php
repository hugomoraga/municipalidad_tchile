<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

get_header('principal');
?>

<style>
	.page-header {
		padding: 20px 0 0 0;
		text-align:center;
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
	.row img {
		text-align:center;
		width:100%;
		max-width: 250px;
		min-width: 155px;
		border-radius: 3px;
		height:auto;
	}
	.row p {
		margin: 4px 0 0 0;
	}
	.row a {
		font-size: 17px;
	}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
			</li>
			<li class="nav-item">/</li>
			<li class="nav-item">
				<a class="nav-brand" href="#"><?php echo single_cat_title( '', false ); ?></a>
			</li>
		</ul>
	</div>
</nav>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				echo '<h1 class="page-title">'.single_cat_title( '', false ).'</h1>';
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="container">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
			?>

				<hr/>
				<div class="row">
					<div class="col">
						<a href="<?php the_permalink(); ?>">
                		<?php if (has_post_thumbnail( $post->ID ) ): ?>
                		    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                		        <img src="<?php echo $image[0]; ?>" class="img-fluid">
                		<?php endif; ?>
              			</a>
					</div>
					<div class="col-9">
						<a href="<?php the_permalink(); ?>)"><?php the_title(); ?></a>
						<p class="text">
              				<?php //Filtro para 20 palabras -Valeria
              				add_filter( 'excerpt_length', function($length) {
              				    return 63; // Cantidad de palabras
              				}, PHP_INT_MAX );
						
              				the_excerpt();
							?>
              			</p>
					</div>
				</div>

				<?php
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_type() );

				
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</br></br>
	</div>
	</main><!-- #main -->

<?php

get_footer('principal');
