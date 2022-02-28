<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

get_header('principal');
?>

<div class="container-lg p-0">

<?php
    if ( is_singular() ) :
    get_template_part( 'components/breadcrumb', 'single' );

    endif;
?>

</div>
<div class="container bg-white pt-3">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header text-center">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header>

		<?php municipalidad_tchile_post_thumbnail(); ?>

        </article>

</div>

<main id="primary" class="site-main single">
    <div class="container bg-white pt-3">
    <ol class="list-group list-group-numbered">

	<?php foreach  (get_posts('showpost=-1') as $mypost) :
        //echo $mypost->post_content;?>

        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto"> 
                <div class="fw-bold"> &nbsp;
                    <a href="<?php echo get_permalink($mypost->ID); ?>">
                    <?php echo $mypost->post_title; ?>
                    </a>
                </div>
            </div>
        <?php
        if( have_rows('adjuntar_archivos') ):
        while ( have_rows('adjuntar_archivos') ) : the_row();
            for ($x = 1; $x <=3; $x++) {
                $value = get_sub_field('archivo_'.$x);
                if( $value ): ?> &nbsp;
                    <a href="<?php echo $value; ?>">
                    <span class="badge bg-primary rounded-pill" style="padding-top:7px;padding-bottom:7px;">
                    <?php echo $x.'°'; ?> <i class="fas fa-download"></i>
                    </span></a>
                <?php endif;
            }
        endwhile;
        endif;
        ?>
        </li>
        
    <?php endforeach; ?>
    </ol>
    </div>
    <?php
	while ( have_posts() ) : the_post();
		//get_template_part( 'template-parts/content', get_post_type() );
            echo the_post();
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
