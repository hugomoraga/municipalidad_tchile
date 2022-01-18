<?php
$the_loop = new WP_query(array(
'posts_per_page' => 5,  
'post_type' => 'informacion',
'category_name' => 'de-tu-interes'
));
$color = 1;
$max_color = 5;
?>
<style>
.no-info {
    padding-top: 10px;
    font-size: 21px;
    text-align: right;
    color: white;
}
</style>


<section class="p-5 bg-secondary">
    <div class="container">
    <div class="text-white"> <span class="border-start  border-5  border-info px-3 display-6 fw-bold text-uppercase">De tu Interes</span> </div>
        <div class="row" style="margin:0;width:100%">
            <?php if ($the_loop -> have_posts() ) : ?>
            <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
            
            <div class="col p-3">
                <div class="single-card card-style-one  elementor-animation-shrink">
                    <div class="d-flex justify-content-center" style=" background-color:#AADAFF;">

                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" class="pt-2 pb-2"
                                style="object-fit: contain; height:100px;">
                            <?php else: ?>
                            <img src="" class="card-img-top rounded-0 p-5" style="object-fit: cover;">
                            <?php endif; ?>
                        </a>
                    </div>

                    <a class=" info-<?php echo $color.""; ?> position-relative w-100 p-3"
                        href="<?php the_permalink() ?>" target="">
                        <span class="row">
                            <span class="col-9 text-white text-uppercase" style="height:60px">
                                <strong><?php the_title(); ?></strong>
                            </span>
                            <span class="col-3 text-center text-secondary">
                                <i class="fas fa-arrow-right fa-lg" aria-hidden="true"></i>
                            </span>
                        </span>
                    </a>

                </div>


            </div>
            <?php
                        if ($color == $max_color ) : $color = 1;
                        else: $color = $color +1;
                        endif; 
                        ?>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else: ?>
            <div class="no-info">
                <?php echo "Sin información . . ."; ?>
            </div>

            <?php endif; ?>
        </div>
    </div>
    
</section>    
