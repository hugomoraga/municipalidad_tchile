<?php
$the_loop = new WP_query(array(
'posts_per_page' => 2,  
'post_type' => 'attachment',
));
?>

<style>
.no-notic {
    padding-top: 10px;
    font-size: 21px;
    text-align: right;
    color: black;
}
rs-module {
    border-radius: 9px; 
}
.rs-layer {
    vertical-align: text-bottom;
}
.destacada {
    line-height: 42px;
}

</style>


<section class="noticias p-5">
        <div class="text-secondary"> <span class="border-start  border-5  border-primary px-3 display-6 fw-bold text-uppercase">Noticias</span> </div>

        <!--<figure class="wp-block-gallery alignwide columns-3 is-cropped">
            <ul class="blocks-gallery-grid">
                <li class="blocks-gallery-item"><figure>
                    <img loading="lazy" src="http://sernatur.tchile.com/hostal6/wp-content/uploads/2022/01/322300564-1.jpg" alt="" data-id="1161" class="wp-image-1161" ></figure>
                </li>
                <li class="blocks-gallery-item"><figure>
                    <img loading="lazy" src="http://sernatur.tchile.com/hostal6/wp-content/uploads/2022/01/salacafe1.png" alt="" data-id="1182" class="wp-image-1182" sizes="(max-width: 949px) 100vw, 949px">
                </figure></li>
                <li class="blocks-gallery-item"><figure>
                    <img loading="lazy" src="http://sernatur.tchile.com/hostal6/wp-content/uploads/2022/01/images-1-1.jpg" alt="" data-id="1180" class="wp-image-1180">
                </figure></li>
                <li class="blocks-gallery-item"><figure>
                    <img loading="lazy" src="http://sernatur.tchile.com/hostal6/wp-content/uploads/2022/01/images-1.jpg" alt="" data-id="1162" class="wp-image-1162">
                </figure></li>
            </ul>
        </figure> -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <?php add_revslider('destacada','homepage'); ?>

            </div>
        </div>

        <div class="row">
            <div class="col-6 destacada">
                <?php add_revslider('destacada','homepage'); ?>
            </div>
            <div class="col-6">
                <div class="row justify-content-center p-3">

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