<?php

/*
Template Name: Home
*/

get_header('principal');
?>
<main class="container-fluid p-0" style="min-height: 50vh;">

    <!--  SECCION SLIDER -->

    <div class="bg-slider-section container-fluid">
        <div class="row ">
            <div class="col-lg-9 col-md-12 px-0">
                <?php add_revslider('principal','homepage'); ?>
            </div>
            <div class="col-lg-3 text-white p-3 bg-qn d-none d-lg-block bg-search bg-quenecesitas"
                style="background-color:#211c4c;">
                <div class="container p-0">
                    <div class="pt-2">
                        <p class="fs-4 text-center fw-bold text-white">¿Qué Buscas?</p>

                        <?php get_template_part( 'template-parts/sugerencias-busqueda', null, array("max" => 10));?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  SECCION NOTICIAS -->
    <?php get_template_part( 'components/noticias');?>

    <!--  SECCION INFORMACIONES -->
    <?php get_template_part( 'components/decretos');?>

    <!--  SECCION ELEMENTOR -->
    <?php the_content();?>

</main>
<?php
get_footer('principal');