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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'municipalidad_tchile' ); ?></a>

        <header id="masthead" class="site-header">
            <div class="" style="background-color:#0082B6">
                <div class="container p-2">
                    <ul class=" list-group list-group-horizontal d-flex justify-content-end ">
                        <li class="list-group-item bg-transparent border-0  "><a href="#"><i
                                    class="fas fa-arrow-circle-right"> </i> Acceso Ley Lobby</a></li>
                        <li class="list-group-item bg-transparent border-0"><a href="#"><i
                                    class="fas fa-arrow-circle-right"></i> Ley de transparencia: Solicitar
                                Informacion</a></li>
                        <li class="list-group-item bg-transparent border-0"><a href="#"><i
                                    class="fas fa-arrow-circle-right"></i> Ley de transparencia: Transparencia
                                Activa</a></li>

                    </ul>
                </div>
            </div>


          <?php get_template_part( 'components/menu-principal');?>


        </header><!-- #masthead -->