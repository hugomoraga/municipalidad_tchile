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



<main id="primary" class="site-main">
    <?php get_template_part( 'components/breadcrumb', 'archive' ); ?>

    <div class="container bg-white shadow-sm">

        <?php if ( have_posts() ) : ?>
        <div class="container">


            <header class="page-header">
                <?php
				echo '<h1 class="page-title">'.single_cat_title( '', false ).'</h1>';
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
            </header><!-- .page-header -->


            <?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
			?>

            <hr />
            <div class="row p-3">
                <div class="col">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" class="img-fluid p-4">
                        <?php else: ?>
                        <img src="/wp-content/uploads/2022/03/arrow-v1.png" class="img-fluid p-4">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-9">
                    <a class="fs-4" href="<?php the_permalink(); ?>)"><?php the_title(); ?></a>
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

			

			get_template_part( 'template-parts/content', 'category' );


		endif;
		?>
            </br></br>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer('principal');