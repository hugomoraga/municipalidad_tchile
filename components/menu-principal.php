<?php
$menu_principal = wp_nav_menu(array(
'theme_location' => 'main-menu',
'echo' => false,
'container' => false,
'menu_class' => '',
'fallback_cb' => '__return_false',
'items_wrap' => '<ul id="%1$s" class="w-100 d-flex justify-content-center navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
'depth' => 2,
'walker' => new bootstrap_5_wp_nav_menu_walker()
));
?>

<style>
.custom-logo-link>img {
    width: 230px;
    height: auto;
}
</style>

<div class="navbar navbar-expand-md fs-6 shadow-sm" style="background-color:#F5F5F5;">
    <div class="row w-100">
        <div class="col-md-12 d-flex align-items-center justify-content-around">
            <section class="navbar-area navbar-eight">
                <div class="container-fluid ">
                    <div class="inner-header">
                        <div class="col-lg-12">

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class=" collapse navbar-collapse " id="main-menu">
                                <div class="navbar-brand"><?php the_custom_logo(); ?>
                                </div>

                                <?php echo $menu_principal ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
  

    </div>
</div>