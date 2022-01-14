<?php
$the_loop = new WP_query(array(
'posts_per_page' => 3,  
'post_type' => 'post',
));
?>

<style>
.no-notic {
    padding-top: 10px;
    font-size: 21px;
    text-align: right;
    color: black;
}
</style>


<section class="noticias p-5">
        <div class="text-secondary"> <span class="border-start  border-5  border-primary px-3 display-6 fw-bold text-uppercase">Noticias</span> </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?php add_revslider('destacada','homepage'); ?>

            </div>
        </div>

        <div class="row">
            <div class="col-4"> NOTICIA SLIDER DESTACADA
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="..." alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="..." alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="..." alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <div class="col-8">
                <div class="row justify-content-center pb-5">

                    <?php if ($the_loop -> have_posts() ) : ?>
                    <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>

                    <div class="col">
                        <div class="single-card card-style-one">
                            <div class="card-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" class="img-fluid"
                                        style="max-width: 100%; height: 220px; object-fit: cover;">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="card-content" style="height: 230px;">
                                <h4 class="card-title fs-6">
                                    <a href="<?php the_permalink(); ?>)"><?php the_title(); ?></a>
                                </h4>
                                <p class="text">
                                    <?php //Filtro para 20 palabras -Valeria
    add_filter( 'excerpt_length', function($length) {
        return 20;
    }, PHP_INT_MAX );
    
    the_excerpt();
  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else: ?>
                    <div class="no-notic">
                        <?php echo "Sin noticias . . ."; ?>
                    </div>
                    <?php //echo "sin noticias"; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>


        <!-- row -->
    <!-- container -->
</section>