<?php
$the_loop = new WP_query(array(
'posts_per_page' => 3,  
'post_type' => 'informacion',
));
$color = 1;
$max_color = 5;
?>

<section class="informaciones pb-5 bg-secondary">
    <div class="container text-start">
        <div class="display-4 text-primary border-bottom border-2 border-light py-3"> Informaciones</div>       
        <div class="row" style="margin:0;width:100%">

        <?php if ($the_loop -> have_posts() ) : ?>
        <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>

            <div class="col-sm">
                <div class="banner-modular p-3">
                    <div class="shadow text-secondary" style="min-width:240px">

                        <a href="<?php the_permalink(); ?>" style="width:100%">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" class="card-img-top rounded-0" style="height: 240px;object-fit: cover;">
                            <?php else: ?>
                                <img src="" class="card-img-top rounded-0" style="height: 240px;object-fit: cover;">
                            <?php endif; ?>
                        </a>

          
                        <a class="caption-ban info-<?php echo $color.""; ?> position-relative w-100 p-3" href="<?php the_permalink() ?>" target="">
                            <span class="row">
                                <span class="col-9 text-white">
                                    <strong><?php the_title(); ?></strong>
                                </span>
                                <span class="col-3 text-center text-secondary">
                                    <i class="fas fa-arrow-right fa-lg" aria-hidden="true"></i>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
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
            <?php echo "Sin informaci??n . . ."; ?>
        </div>

      <?php endif; ?>
        </div>
  
        </div>


    </div>

    </div>
</section>