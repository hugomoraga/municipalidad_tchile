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
	<nav class="navbar navbar-expand-lg pt-3 bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="d-inline-flex fw-bold">
				<li class="nav-item">
					<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<?php
						$categoria = ""; $param = "?cat="; $cont = 0;
						foreach((get_the_category()) as $category) {
						if($cont==0) {
							$categoria = $categoria . $category->cat_name . ' ';
							$param = $param . $category->slug;
						  } $cont++;
						} if($categoria=="") $categoria=get_post_type();
					?>
					<a class="nav-brand" href="<?php echo home_url()."/".get_post_type()."" ?>">
				<?php	$post_type = get_post_type_object( get_post_type($post) );
						echo $post_type->label; ?>


					</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<span class="nav-brand fs-bold"><?php echo get_the_title(); ?></span>
				</li>
			</ul>
		</div>
	</nav>
<?php endif;?>
