<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

get_header('principal');

?>


<div class="container p-0">
	<nav class="navbar navbar-expand-lg pt-3 bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="d-inline-flex fw-bold">
				<li class="nav-item">
					<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
				</li>
				<li class="nav-item">/</li>
				<li class="nav-item">
					<span class="nav-brand"><?php echo post_type_archive_title(); ?></span>
				</li>
			</ul>
		</div>
	</nav>
</div>

<main id="primary" class="site-main">
    <div class="container bg-white text-center">
    <h1 class="entry-title">
    <?php echo post_type_archive_title(); ?>
	</h1>
    
    <?php if ( have_posts() ) : ?>
            
		<div class="container">

        <ol class="list-group list-group-numbered">
			<?php
			while ( have_posts() ) : the_post();
			?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto"> 
                      <div class="fw-bold"> &nbsp;<?php the_title(); ?> </div>
                    </div>
                <?php
                if( have_rows('adjuntar_archivos') ):
                while ( have_rows('adjuntar_archivos') ) : the_row();
                    for ($x = 1; $x <=3; $x++) {
                        $value = get_sub_field('archivo_'.$x);
                        if( $value ): ?> &nbsp;
                            <a href="<?php echo $value; ?>">
                            <span class="badge bg-primary rounded-pill" style="padding-top:7px;padding-bottom:7px;">
                            <?php echo $x.'°'; ?> <i class="fas fa-download"></i>
                            </span></a>
                        <?php endif;
                    }
                endwhile;
                endif;
                ?>
                </li>
        </ol>

		<?php

		endwhile;

		the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
            
		endif;
	?>
	</br></br>
    </div>
	</div>
</main><!-- #main -->

<?php

get_footer('principal');
