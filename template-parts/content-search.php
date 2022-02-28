<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>
	<div class="col-4 p-3">
	<div class="card mb-3" style="height:100%">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="" style="height:150px">
        <?php endif; ?>
		<div class="card-body" style="padding:25px">
			<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<p class="card-text">
			<?php
				$excerpt = get_the_excerpt();
				$excerpt = substr($excerpt, 0, 107);
				$result = substr($excerpt, 0, strrpos($excerpt, ' '));
				echo $result.' [...]';
              	/*add_filter( 'excerpt_length', function($length) {
              	    return 10; // Cantidad de palabras
              	}, PHP_INT_MAX );
              	the_excerpt();*/
				?>
			</p>
			<h5 class="card-title"><a href="<?php the_permalink(); ?>">Ver más >></a></h5>
		</div>
		<div class="card-footer bg-transparent">
			<p class="card-text"><small class="text-muted"><?php the_date(); ?></small></p>
		</div>
	</div>
	</div>

<!--<article id="post-<?php //the_ID(); ?>" <?php //post_class(); ?>>
	<header class="entry-header">
		<?php //the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php //if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			//municipalidad_tchile_posted_on();
			//municipalidad_tchile_posted_by();
			?>
		<!--</div> .entry-meta -->
		<?php //endif; ?>
	<!--</header> .entry-header -->

	

	<!--<div class="entry-summary">
		<?php //the_excerpt(); ?>
	</div> .entry-summary -->

	<!--<footer class="entry-footer">
		<?php //municipalidad_tchile_entry_footer(); ?>
	</footer> .entry-footer
</article> #post-<?php //the_ID(); ?> -->
