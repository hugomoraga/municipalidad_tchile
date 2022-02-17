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

<div class="container p-0">
	<nav class="navbar navbar-expand-lg pt-3 bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="d-inline-flex fw-bold">
				<li class="nav-item">
					<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<span class="nav-brand"><?php echo get_post_type(); ?></span>
				</li>
			</ul>
		</div>
	</nav>
</div>

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
