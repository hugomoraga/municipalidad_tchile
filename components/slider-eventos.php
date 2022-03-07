<?php
$the_loop = new WP_query(array(
'post_type' => 'mec-events',
'orderby' => 'mec_start_date',
'posts_per_page' => 5,
'order' => 'ASC',
'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
    'relation' => 'OR',
    array(
        'key' => 'mec_start_date', // Check the start date field
        'value' => date("Ymd"), // Set today's date (note the similar format)
        'compare' => '>=', // Return the ones greater than or equal to today's date
        'type' => 'DATE' // Let WordPress know we're working with date
        )
    )
)); 
      
$first_s= "active";
?>

<?php if ($the_loop -> have_posts() ) : ?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
        <div class="carousel-item <?php echo $first_s; $first_s="";?>">
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <img src="<?php echo $image[0]; ?>" class="d-block w-100" style=" object-fit: cover; height:330px;"
                alt="...">
            <?php endif; ?>
        </div>
        <?php endwhile; 
                        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>
<?php wp_reset_postdata(); ?>

<?php else: ?>

<img src="<?php echo get_site_url(); ?>/wp-content/themes/municipalidad_tchile/assets/img/sinevento.jpg">


<?php endif; ?>

<?php /*if ($the_loop -> have_posts() ) : ?>
<?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<img src="<?php echo $image[0]; ?>" class="icard-img-top" style="object-fit: cover; height:320px; width: 100%;">
<?php endif; ?>

<?php endwhile; 
                        ?>
<?php wp_reset_postdata(); ?>

<?php else: ?>

<?php echo "Sin eventos . . ."; ?>


<?php endif; */?>