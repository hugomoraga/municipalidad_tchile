<?php

/*
Template Name: Home
*/

get_header('principal');
?>
<main class="container-fluid p-0 " style="min-height: 50vh; background-color: #f0f2f5">

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v12.0&appId=213640426359512&autoLogAppEvents=1" nonce="GeKzkFHM"></script>

    <!--  SECCION SLIDER -->

    <div class="bg-slider-section container shadow ">
        <div class="row ">
            <div class="col-md-12 px-0">
                <?php add_revslider('principal','homepage'); ?>
            </div>
        </div>
    </div>
 
    <div class="container shadow p-0">

    <!--  SECCION MENU SERVICIOS -->
    <?php get_template_part( 'components/menu-servicios');?>


    <!--  SECCION NOTICIAS -->
    <?php get_template_part( 'components/noticias');?>

    <!--  SECCION INFORMACIONES -->
    <?php get_template_part( 'components/decretos');?>

    <!--  SECCION ELEMENTOR -->
    <?php the_content();?>

    </div>


</main>
<?php
get_footer('principal');