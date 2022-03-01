<?php
/**
 * Template part for displaying breadcrumb 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>
<?php if ( is_singular() ) : ?>
	<nav class="navbar navbar-expand-lg bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="d-inline-flex fw-bold">
				<li class="nav-item">
					<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
				</li>
				<li class="nav-item text-primary">&nbsp/</li>
				<li class="nav-item">
					<span class="nav-brand fs-bold"><?php echo get_the_title(); ?></span>
				</li>
			</ul>
		</div>
	</nav>
<?php endif;?>
