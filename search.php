<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package municipalidad_tchile
 */

?>

<head>

    <?php wp_head(); ?>

</head>
		<div class="container p-0 shadow">
        	<?php get_template_part( 'components/menu-principal');?>
       	</div>

<main id="primary" class="site-main">

	<div class="container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados para: %s', 'municipalidad_tchile' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;?>
			</div>
			<?php
			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>

</main><!-- #main -->

<?php

get_footer('principal');
