<?php
$menu_servicios = wp_nav_menu(array(
'theme_location' => 'menu_servicios',
'echo' => false,
'container' => false,
'menu_class' => '',
'fallback_cb' => '__return_false',
'items_wrap' => '<ul id="%1$s" class=" d-flex justify-content-center me-auto %2$s px-4">%3$s</ul>',
'depth' => 2,
'add_li_class' => 'col-md-3 p-2 py-4 border border-3 shadow-sm d-flex justify-content-center text-white m-2 fw-bold rounded rounded-pill bg-primary'
));
?>

<style>
    #menu-servicios > li > a { 
        color: white;
        
}
    #menu-servicios > li > a:hover { 
        color: #c5c6c6;
    }
 
}
</style>

<div class="px-5 pt-4">

<?php echo $menu_servicios ?> 

</div>
