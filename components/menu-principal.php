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

<div class="navbar navbar-expand-md shadow-sm" style="background-color:#74ccd4">
    <div class="row w-100">
        <div class="col-md-12 d-flex align-items-center justify-content-around">
            <section class="navbar-area navbar-one">
                <div class="container-fluid ">
                    <div class="inner-header row">
                        <div class="col-lg-3">
                            <div class="navbar-brand"><?php the_custom_logo(); ?>
                            </div>
                        </div>

                        <div class="col-lg-9 d-flex align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-list text-primary" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
                            </button>
                            <div class=" collapse navbar-collapse " id="main-menu">
                                <?php echo $menu_principal ?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
