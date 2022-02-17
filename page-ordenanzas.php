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
    'post_type' => 'ordenanza',
    'orderby'   => array(
        'date' =>'ASC',
        'menu_order'=>'ASC',
       )
    ));
    ?>

	<main id="primary" class="site-main ordenanzas">
    <div class="entry-content">
        <div class="container">
            <header class="entry-header">
		        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	        </header><!-- .entry-header -->
	    	<?php the_content(); ?>

            <ol class="list-group list-group-numbered">
                
                <?php if ($the_loop -> have_posts() ) : ?>
                <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto"> 
                          <div class="fw-bold"> &nbsp;<?php the_title(); ?> </div>
                        </div>
                        — &nbsp;<a href="<?php echo get_field('url') ?>"><span class="badge bg-primary rounded-pill"><i class="fas fa-download"></i></span></a>
                    </li>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

                <?php endif; ?>

            </ol>
        </div>
	</div><!-- .entry-content -->

	</main><!-- #main -->

<?php
	get_footer('principal');
?>
