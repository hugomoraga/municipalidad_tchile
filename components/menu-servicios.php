<?php
$menu_servicios = wp_nav_menu(array(
'theme_location' => 'menu_servicios',
'echo' => false,
'container' => false,
'menu_class' => '',
'fallback_cb' => '__return_false',
'items_wrap' => '<ul id="%1$s" class=" row d-flex justify-content-center me-auto %2$s px-3 align-items-center">%3$s</ul>',
'depth' => 2,
'add_li_class' => 'elementor-animation-shrink col-sm-6 col-md-6 col-lg-3 py-3 border border-3 shadow-sm  btn text-white  rounded rounded-pill bg-primary d-flex justify-content-center'
));
?>

<style>
    #menu-servicios > li > a { 
        color: white;
        font-size: 0.9rem;      
    }
    #menu-servicios > li > a:hover { 
        color: #c5c6c6;
    }
  
    #menu-servicios .menu-item  {
        height: 70px !important;
        align-items: center;
        display: flex;
        justify-content: center;
    }

</style>

<div class="px-4 pt-4">

<?php echo $menu_servicios ?> 

</div>
