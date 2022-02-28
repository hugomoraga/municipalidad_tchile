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
		/*the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'municipalidad_tchile' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'municipalidad_tchile' ) . '</span> <span class="nav-title">%title</span>',
			)
		);*/
        ?>
        <div class="container bg-white pt-3">
        <?php
        if( have_rows('adjuntar_archivos') ):
            while ( have_rows('adjuntar_archivos') ) : the_row();
                for ($x = 1; $x <=3; $x++) {
                    $value = get_sub_field('archivo_'.$x);
                    if( $value ): ?>
                    <iframe src='<?php echo $value; ?>' width="100%" height="800"></iframe>
                    <?php endif;
                }
                

            endwhile;
        else :
            // no rows found
        endif;
        ?>
        </div>
        
    <?php endwhile; // End of the loop.
	?>
    
</main><!-- #main -->

<?php

get_footer('principal');

?>
