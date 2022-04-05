<?php

/*
Template Name: Home
*/

get_header('principal');
?>


<main class="container-fluid p-0 " style="min-height: 50vh; background-color: #f0f2f5">
<div class="bg-white container-lg p-0">

    <!--  SECCION SLIDER -->

            <div class="col-md-12 px-0" style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);">
                <?php add_revslider('principal','homepage'); ?>
            </div>

    <div class="container-lg shadow p-0">

    <!--  SECCION MENU SERVICIOS -->
    <?php get_template_part( 'components/menu-servicios');?>


    <!--  SECCION NOTICIAS -->
    <?php get_template_part( 'components/noticias');?>

    
    <!--  SECCION REDES SOCIALES -->
    <?php get_template_part( 'components/redes-sociales');?>

    <!--  SECCION INFORMACIONES -->
    <?php get_template_part( 'components/detuinteres');?>

    <!--  SECCION ELEMENTOR -->
    <?php the_content();?>


    <?php get_template_part( 'components/youtubevideo');?>


    </div>
</div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v12.0&appId=213640426359512&autoLogAppEvents=1" nonce="GeKzkFHM"></script>

</main>
<?php
get_footer('principal');