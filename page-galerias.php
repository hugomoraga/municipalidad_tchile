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
'post_type' => 'attachment',
));
?>


	<main id="primary" class="site-main"> 
        <div class="container bg-white">
            <header class="entry-header">
		        <?php the_title( '<h1 class="entry-title text-center pt-3">', '</h1>' ); ?>
	        </header><!-- .entry-header -->
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
        </div>
	</main><!-- #main -->

<?php
	get_footer('principal');
?>
