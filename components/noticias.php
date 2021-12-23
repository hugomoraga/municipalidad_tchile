<?php
$the_loop = new WP_query(array(
'posts_per_page' => 3,  
'post_type' => 'post'
));
?>

<section class="card-area pb-5">
    <div class="container">
      <div class="display-4 text-primary border-bottom border-2 border-secondary py-3"> Noticias</div>

      <div class="row justify-content-center">

    <?php if ($the_loop -> have_posts() ) : ?>
      <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>

        <div class="col-lg-4 col-md-7 col-sm-9">
          <div class="single-card card-style-one">
            <div class="card-image">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" class="img-fluid" style="max-width: 100%; height: 300px; object-fit: cover;">
                <?php endif; ?>
              </a>
            </div>
            <div class="card-content">
              <h4 class="card-title">
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
        <?php echo "sin noticias"; ?>

      <?php endif; ?>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
</section>