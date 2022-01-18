<?php
$the_loop = new WP_query(array(
'posts_per_page' => 2,  
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
rs-module {
    border-radius: 9px; 
}
.rs-layer {
    vertical-align: text-bottom;
}
.destacada {
    line-height: 42px;
}

/*.noticias .btn-primary {
    margin: 20px 0 0 7px;
    padding: 5px 7px 5px 15px;
    font-size: 17px;
    font-weight: 600;
    color: #fff;
    border-radius: 20px;
}
.noticias .btn-primary:hover, .noticias .btn-primary:active{
    color: #fff;
}*/

</style>


<section class="noticias p-5">
    <div class="text-secondary"> <span class="border-start  border-5  border-primary px-3 display-6 fw-bold text-uppercase">Noticias</span> </div>
        <div class="row">
            <div class="col-6 destacada mt-2">
                <?php add_revslider('destacada','homepage'); ?>
            </div>
            <div class="col-6 mt-2">
                <div class="row justify-content-center">
                    <?php if ($the_loop -> have_posts() ) : ?>
                        <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
                            <div class="col-6">
                                <div class="single-card card-style-one mt-0">
                                    <div class=""  style="height: 180px;" >
                                    <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                            <img src="<?php echo $image[0]; ?>" class="icard-img-top"
                                                style="object-fit: cover; height:180px; width: 300px;">
                                            <?php endif; ?>
                                        </a>
                                        
                                    </div>
                              
                                    <div class="card-content" style="height: 240px;">
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

            <div class="col-12 mt-3 text-center">
                <a href="<?php echo home_url()."/noticias"; ?>" class="btn btn-primary rounded-pill text-white">
                    Ver más <i class="fas fa-chevron-circle-right fa-lg " style="vertical-align: -0.1em; margin-left:1px"></i>
                </a>
             </div>
        </div>


        <!-- row -->
    <!-- container -->
</section>