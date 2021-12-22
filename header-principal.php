<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package municipalidad_tchile
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'municipalidad_tchile' ); ?></a>

	<header id="masthead" class="site-header">
    <div class=""  style="background-color:#0082B6">
<div class="container p-2">
<ul class=" list-group list-group-horizontal d-flex justify-content-end ">
  <li class="list-group-item bg-transparent border-0  "><a href="#"><i class="fas fa-arrow-circle-right"> </i> Acceso Ley Lobby</a></li>
  <li class="list-group-item bg-transparent border-0"><a href="#"><i class="fas fa-arrow-circle-right"></i> Ley de transparencia: Solicitar Informacion</a></li>
  <li class="list-group-item bg-transparent border-0"><a href="#"><i class="fas fa-arrow-circle-right"></i> Ley de transparencia: Transparencia Activa</a></li>

</ul>
</div>
</div>

<style>
  .custom-logo-link > img {
    width: 230px;
    height: auto;
}
</style>
	<nav class="navbar navbar-expand-md navbar-dark fw-bold fs-5" style="background-color:#36929e">
      <div class="row w-100">
        <div class="col-md-2">
        <?php the_custom_logo(); ?>
        </div>
        <div class="col">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class=" collapse navbar-collapse " id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'container' => false,
                'menu_class' => 'px-5 py-3',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="w-100 d-flex justify-content-around navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        
          </div>
        </div>
        <div class="col-md-2">

        </div>
      </div>

  
</nav>

<style>

nav {
  text-align: center;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
  padding: 24px;
}
	nav .nav-link {
  transition: 0.3s ease;
  color: white;
  font-size: 20px;
  text-decoration: none;
  border-top: 4px solid transparent;
  border-bottom: 4px solid transparent;
  padding: 10px 0;
  margin: 0 5px;
  font-size: 17px;
}
nav .nav-link:hover {
  border-top: 4px solid white;
  border-bottom: 4px solid white;
  padding: 6px 0; 
}
</style>

	</header><!-- #masthead -->
