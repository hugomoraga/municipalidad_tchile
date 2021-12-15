<?php

/*
Template Name: Home
*/

get_header('principal');
?>
<main class="container-fluid p-0" style="min-height: 50vh;">

<div class="bg-slider-section container-fluid">
    <div class="row ">
      <div class="col-lg-9 col-md-12 px-0">
        <?php add_revslider('principal','homepage'); ?>
      </div>
      <div class="col-lg-3 text-white p-3 bg-qn d-none d-lg-block bg-search bg-quenecesitas" style="background-color:#211c4c;">


        <div class="container p-0">
          <div class="pt-2">
            <p class="fs-4 text-center fw-bold text-white">¿Qué Buscas?</p>
            
            <?php get_template_part( 'template-parts/sugerencias-busqueda', null, array("max" => 10));?>

            
            
          </div>
        </div>
      </div>
    </div>
  </div>



<section class="card-area pb-5">
    <div class="container">
      <div class="display-4 text-primary border-bottom border-2 border-secondary py-3"> Noticias</div>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-card card-style-one">
            <div class="card-image">
              <img src="wp-content/themes/municipalidad_tchile/assets/img/card-1.jpg" alt="Image" />
            </div>
            <div class="card-content">
              <h4 class="card-title">
                <a href="javascript:void(0)">Noticias 1</a>
              </h4>
              <p class="text">
                Short description for the ones who look for something new
              </p>
            </div>
          </div>
          <!-- single-card -->
        </div>
        <!-- col -->
        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-card card-style-one">
            <div class="card-image">
              <img src="wp-content/themes/municipalidad_tchile/assets/img/card-2.jpg" alt="Image" />
            </div>
            <div class="card-content">
              <h4 class="card-title">
                <a href="javascript:void(0)">Item title is here</a>
              </h4>
              <p class="text">
                Short description for the ones who look for something new
              </p>
            </div>
          </div>
          <!-- single-card -->
        </div>
        <!-- col -->
        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-card card-style-one">
            <div class="card-image">
              <img src="wp-content/themes/municipalidad_tchile/assets/img/card-3.jpg" alt="Image" />
            </div>
            <div class="card-content">
              <h4 class="card-title">
                <a href="javascript:void(0)">Item title is here</a>
              </h4>
              <p class="text">
                Short description for the ones who look for something new
              </p>
            </div>
          </div>
          <!-- single-card -->
        </div>
        <!-- col -->
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>

  <section class="pb-5 bg-secondary">
    <div class="container">
    <div class="display-4 text-primary border-bottom border-2 border-light py-3"> Informaciones</div>

<div class="row">
  <div class="col-md-3">                  <div class="banner-modular p-3">
      <img src="https://lacalera.cl/wp-content/uploads/2021/12/Expo-Navidad-La-Calera-2021-5.jpg" class="img-fluid center" alt="Banner TV Sidebar"></a>
      <a class="caption-ban info-1 position-relative w-100 p-3" href="#" target="">
        <span class="row">
          <span class="col-9 text-white">
            <strong>Informacion del municipio</strong> </span>
              <span class="col-3 text-center text-secondary">
                            <i class="fas fa-arrow-right fa-lg" aria-hidden="true"></i>
                          </span>
                        </span>
                      </a>
                  </div></div>
  <div class="col-md-3">
                  <div class="banner-modular p-3">
      <img src="https://lacalera.cl/wp-content/uploads/2021/12/Expo-Navidad-La-Calera-2021-5.jpg" class="img-fluid center" alt="Banner TV Sidebar"></a>
      <a class="caption-ban info-2 position-relative w-100 p-3" href="#" target="">
        <span class="row">
          <span class="col-9 text-white">
            <strong>Informacion del municipio</strong> </span>
              <span class="col-3 text-center text-secondary">
                            <i class="fas fa-arrow-right fa-lg" aria-hidden="true"></i>
                          </span>
                        </span>
                      </a>
                  </div></div>
  <div class="col-md-3">                  <div class="banner-modular p-3">
      <img src="https://lacalera.cl/wp-content/uploads/2021/12/Expo-Navidad-La-Calera-2021-5.jpg" class="img-fluid center" alt="Banner TV Sidebar"></a>
      <a class="caption-ban info-3 position-relative w-100 p-3" href="#" target="">
        <span class="row">
          <span class="col-9 text-white">
            <strong>Informacion del municipio</strong> </span>
              <span class="col-3 text-center text-secondary">
                            <i class="fas fa-arrow-right fa-lg" aria-hidden="true"></i>
                          </span>
                        </span>
                      </a>
                  </div>

</div>
  <div class="col-md-3">                  <div class="banner-modular p-3">
      <img src="https://lacalera.cl/wp-content/uploads/2021/12/Expo-Navidad-La-Calera-2021-5.jpg" class="img-fluid center" alt="Banner TV Sidebar"></a>
      <a class="caption-ban info-4 position-relative w-100 p-3" href="#" target="">
        <span class="row">
          <span class="col-9 text-white">
            <strong>Informacion del municipio</strong> </span>
              <span class="col-3 text-center text-secondary">
                            <i class="fas fa-arrow-right fa-lg" aria-hidden="true"></i>
                          </span>
                        </span>
                      </a>
                  </div>

</div>

</div>





 

    </div>
  </section>

<style>


</style>

  <?php the_content();?>


  </main>
<?php

get_footer();
