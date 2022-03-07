<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package municipalidad_tchile
 */

get_header('principal');
?>


<main id="primary" class="site-main single">


    <div class="container-lg p-0">
        <?php get_template_part( 'components/breadcrumb', 'informacion' );
        if ( is_singular() ) : ?>

        <?php endif;?>
    </div>
    <div class="container-lg bg-white pt-3">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header text-center">
                <?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
            </header><!-- .entry-header -->


            <div class="entry-content">
                <?php
                    the_content(sprintf(wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continuar Leyendo<span class="screen-reader-text"> "%s"</span>', 'municipalidad_tchile' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'municipalidad_tchile' ),
					'after'  => '</div>',
				)
			);
			?>
            </div><!-- .entry-content -->

        </article><!-- #post-<?php //the_ID(); ?> -->


</main>

<?php

get_footer('principal');
