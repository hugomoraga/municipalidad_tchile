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


<?php get_template_part( 'components/concursos-publicos', '' ); ?>

<?php get_footer('principal'); ?>
