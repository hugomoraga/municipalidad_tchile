<?php
/**
 * The template for displaying single concurso publico post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package municipalidad_tchile
 */

get_header('principal');

?>

<main id="primary" class="site-main single">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );

        ?>
        <div class="container-lg bg-white pt-3">
        <?php
            $value = get_field('url');
            if( $value ): ?>
            <iframe src='<?php echo $value; ?>' width="100%" height="800"></iframe>
            <?php endif;
        ?>
        </div>
        
    <?php endwhile; // End of the loop.
	?>
    
</main><!-- #main -->

<?php

get_footer('principal');

?>
