<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

get_header('principal');
?>
<?php
$the_loop = new WP_query(array(
'posts_per_page' => 50,  
'post_type' => 'post',
));
?>
<style>
	.site-main header {
		text-align:center;
		padding: 0px 0px 13px 0px;
	}
	.site-main p {
		padding: 0px 0px 8px 0px;
	}
</style>

	<main id="primary" class="site-main">
        <div class="container">
        <div class="entry-content">
            <div class="row justify-content-start pb-5">

                <?php if ($the_loop -> have_posts() ) : ?>
                <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
                
                <div class="col-md-3">
                    <div class="single-card card-style-one">
                        <div class="card-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <img src="<?php echo $image[0]; ?>" class="img-fluid"
                                    style="max-width: 100%; height: 220px; object-fit: cover;">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="card-content" style="height: 230px;">
                            <h4 class="card-title fs-6">
                                <a href="<?php the_permalink(); ?>)"><?php the_title(); ?></a>
                            </h4>
                            <p class="text">
                                <?php //Filtro para 20 palabras -Valeria
                                    add_filter( 'excerpt_length', function($length) {
                                    return 20;
                                }, PHP_INT_MAX );

                                the_excerpt(); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

                <?php else: ?>
                <div class="no-notic">
                    <?php echo "Sin noticias . . ."; ?>
                </div>
                <?php //echo "sin noticias"; ?>
                
                <?php endif; ?>
                </div>
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
    </div>
	</main><!-- #main -->

<?php
	get_footer('principal');
?>
