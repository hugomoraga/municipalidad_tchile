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
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$custom_query = new WP_query(array(
'posts_per_page' => get_option('posts_per_page'),
'post_type' => 'post',
'orderby' => 'post_date',
'posts_per_page' => 12,  

'paged' => $paged,
));
?>

	<main id="primary" class="site-main">
        <div class="container-lg bg-white">
            <header class="entry-header">
		        <?php the_title( '<h1 class="entry-title text-center pt-3">', '</h1>' ); ?>
	        </header><!-- .entry-header -->
        <div class="entry-content pt-1">
            <div class="row justify-content-start pb-5">

                <?php if ($custom_query -> have_posts() ) : ?>
                <?php while ($custom_query -> have_posts() ) : $custom_query -> the_post(); ?>
                
                <div class="col-md-4">
                    <div class="single-card card-style-one">
                        <div class="card-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <img src="<?php echo $image[0]; ?>" class="img-fluid"
                                    style="width: 400px; height: 220px; object-fit: cover;">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="card-content" style="height: 230px;">
                            <h4 class="card-title fs-6">
                                <a href="<?php the_permalink(); ?>)"><?php the_title(); ?></a>
                            </h4>
                                <?php //Filtro para 20 palabras -Valeria
                                    add_filter( 'excerpt_length', function($length) {
                                    return 20;
                                }, PHP_INT_MAX );

                                the_excerpt(); ?>




                        </div>
                        
                        <div class="card-footer d-flex flex-row-reverse">
                                <div class="p-0 text-primary px-3"> <strong><?php echo get_the_date( 'l F j, Y' );?> </strong></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php if ($custom_query->max_num_pages > 1) : // custom pagination  ?>
        <?php
        $orig_query = $wp_query; // fix for pagination to work
        $wp_query = $custom_query;
        ?>
        <nav class="prev-next-posts row p-4 d-flex justify-content-center">
        <div class="next-posts-link text-start col-6">
                <?php echo get_previous_posts_link( ' ⏪  Noticias Siguientes  ' ); ?>
            </div>
            <div class="prev-posts-link text-end col-6">
                <?php echo get_next_posts_link( ' Noticias Previas ⏩ ', $custom_query->max_num_pages ); ?>
            </div>
         
        </nav>
        <?php
        $wp_query = $orig_query; // fix for pagination to work
        ?>
    <?php endif; ?>
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
