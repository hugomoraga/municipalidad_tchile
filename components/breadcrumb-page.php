<?php
/**
 * Template part for displaying breadcrumb 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package municipalidad_tchile
 */

?>
<?php if ( is_singular() ) : ?>

<nav class="navbar navbar-expand-lg  bg-light">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="d-inline-flex fw-bold">
            <li class="nav-item">
                <a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
            </li>
            <li class="nav-item text-primary">/</li>
            <li class="nav-item">
                <?php
                $categories = get_the_category();
                foreach ($categories as $cat) 
                {
                    $category_link = get_category_link($cat->cat_ID);
                    echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'"> &nbsp'.$cat->name.'</a>';
                    } 
                ?>
            </li>

            <li class="nav-item text-primary">/&nbsp</li>

            <li class="nav-item ">
                <a class="nav-brand" href="#"><?php echo get_the_title(); ?></a>
            </li>
        </ul>
    </div>
</nav>

<?php endif;?>