<?php
$the_loop = new WP_query(array(
'posts_per_page' => 3,  
'post_type' => 'informacion',
'category_name' => 'decretos'
));
?>
<style>
    .no-info {
        padding-top: 10px;
        font-size: 21px;
        text-align:right;
        color:white;
    }
</style>

<section class="pb-5 bg-secondary">
    <div class="container">
        <div class="display-4 text-primary border-bottom border-2 border-light py-3"> Informaciones</div>
            
        <div class="row">


        <?php if ($the_loop -> have_posts() ) : ?>
      <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>

            <div class="col-md-3">
                <div class="banner-modular p-3">
                    <div class="justify-content-center d-flex shadow text-secondary">

                    <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <img src="<?php echo $image[0]; ?>" class="card-img-top rounded-0" style="height: 240px;object-fit: cover;">
                            <?php endif; ?>
                        </a>

          
                
                        <a class="caption-ban info-1 position-relative w-100 p-3" href="#" target="">
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

            <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

      <?php else: ?>
        <div class="no-info">
            <?php echo "Sin información . . ."; ?>
        </div>

      <?php endif; ?>
      </div>
  
  
        </div>

    </div>
</section>