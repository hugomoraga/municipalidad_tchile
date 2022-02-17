<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package municipalidad_tchile
 */

get_header('principal');
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h5>404</h5>
				<h2 class="page-title"><?php esc_html_e( 'Artículo no encontrado', 'municipalidad_tchile' ); ?></h2>
				<h2 class="page-title"><?php esc_html_e( '', 'municipalidad_tchile' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'La pagina que buscabas no existe o esta mal escrita la URL, Revisa la url o puedes ', 'municipalidad_tchile' ); ?>
					<a href="<?php echo home_url(); ?>">Volver al inicio.</a>
				</p>
				
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer('principal');
