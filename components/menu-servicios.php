<?php
$menu_servicios = wp_nav_menu(array(
'theme_location' => 'menu_servicios',
'echo' => false,
'container' => false,
'menu_class' => '',
'fallback_cb' => '__return_false',
'items_wrap' => '<ul id="%1$s" class="w-100 d-flex justify-content-center me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
'depth' => 2,
'add_li_class' => 'col-md-3 p-3 border boder-3 shadow-sm d-flex justify-content-center text-white m-2 fw-bold rounded'
));
?>

<style>
    #menu-menu-servicios > li > a { 
        color: white;
        font-size: 1.25rem;
}
    #menu-menu-servicios > li > a:hover { 
        color: #c5c6c6;
}
</style>


<div class="container p-2">
    <?php echo $menu_servicios ?> 
</div>