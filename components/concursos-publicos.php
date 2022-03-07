<?php
$the_loop = new WP_query(array(
'post_type' => 'concurso_publico'
));
?>


<main>
    <div class="container bg-white pt-3 text-center">

	<?php if ($the_loop -> have_posts() ) : ?>
            <?php while ($the_loop -> have_posts() ) : $the_loop -> the_post(); ?>
        <br>
        <h3><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a></h3>
                    
        <?php
        if( have_rows('adjuntar_archivos') ):
        while ( have_rows('adjuntar_archivos') ) : the_row();
            for ($x = 1; $x <=3; $x++) {
                $value = get_sub_field('archivo_'.$x);
                if( $value ): ?> <br>
                    <iframe src="<?php echo $value; ?>" width="100%" height="800" style="max-width:840px"></iframe>
                <?php endif;
            }
        endwhile;
        endif;
        ?>
        
        <?php endwhile; endif;?>

        <?php wp_reset_postdata(); ?>

    <br></div>
    
    
</main><!-- #main -->

