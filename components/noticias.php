<?php
$the_loop = new WP_query(array(
'posts_per_page' => 2,  
'post_type' => 'post',
));
?>


<section class="noticias p-5">
    <div class="text-secondary text-start"> <span class="border-start  border-5  border-primary px-3 display-6 fw-bold text-uppercase">Noticias</span> </div>
        <div class="row">
            <div class="col-md-6 destacada mt-2 col-12">
                <?php add_revslider('destacada','homepage'); ?>
            </div>
            <div class="col-md-6 col-12 mt-2">
                <div class="row justify-content-center">
                    <?php if ($the_loop -> have_posts() ) : ?>
                        <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
                            <div class="col-12 col-md-6 ">
                                <div class="single-card card-style-one mt-0 m-3 m-sm-0">
                                    <div class="img-card"  style="height: 180px;" >
                                    <a href="<?php the_permalink(); ?>" style="width:100%">
                                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                            <img src="<?php echo $image[0]; ?>" class="icard-img-top"
                                                style="object-fit: cover; height:180px; width: 100%;">
                                            <?php endif; ?>
                                        </a>
                                        
                                    </div>
                              
                                    <div class="card-content" style="height: 240px;">
                                        <h4 class="card-title fs-6">
                                            <a href="<?php the_permalink(); ?>">
                                            <?php if (strlen($post->post_title) > 60) { echo substr(the_title($before = '', $after = '', FALSE), 0, 60) . '...'; } else { the_title(); } ?>
                                            </a>
                                        </h4>
                                            <?php //Filtro para 20 palabras -Valeria
                                            add_filter( 'excerpt_length', function($length) {
                                                return 20;
                                            }, PHP_INT_MAX );
                                            the_excerpt();
                                            ?>
                                    </div>
                                    <div class="card-footer d-flex flex-row-reverse">
                                <div class="p-0 text-primary px-3"> <strong><?php echo get_the_date( 'l F j, Y' );?> </strong></div>
                        </div>
                                </div>
                            </div>
                        <?php endwhile; 
                        ?>
                    <?php wp_reset_postdata(); ?>

                    <?php else: ?>
                        <div class="no-notic">
                            <?php echo "Sin noticias . . ."; ?>
                        </div>
                    <?php //echo "sin noticias"; ?>

                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 mt-3 d-flex flex-row-reverse">
                <a href="<?php echo home_url()."/noticias"; ?>" class="btn btn-primary rounded-pill text-white">
                    Ver m??s <i class="fas fa-chevron-circle-right fa-lg " style="vertical-align: -0.1em; margin-left:1px"></i>
                </a>
             </div>
        </div>


        <!-- row -->
    <!-- container -->
</section>