<?php
$menu_principal = wp_nav_menu(array(
'theme_location' => 'main-menu',
'echo' => false,
'container' => false,
'menu_class' => '',
'fallback_cb' => '__return_false',
'items_wrap' => '<ul id="%1$s" class="w-100 d-flex text-uppercase justify-content-center navbar-nav me-auto mb-2 mb-md-0 %2$s" style="background-color: var(--secondary) !important;">%3$s</ul>',
'depth' => 2,
'walker' => new bootstrap_5_wp_nav_menu_walker()
));
?>


<nav id="menu-principal" class="navbar navbar-expand-md shadow-sm w-100 bg-secondary">
    <div class="row container-fluid">
        <div class="col-md-12 d-flex align-items-center justify-content-around">
            <section class=" w-100"">
                <div class="container-fluid ">
                    <div class=" flex-row row g-0 row-cols-2">
                        <div class="col-xl-3 col-12">
                            <div class="row">
                            <div class="col-9 col-md-12">
                                    <div class="navbar-brand text-center"><?php the_custom_logo(); ?>
                                    </div>
                            </div>
                            <div class="col-3 pt-2 pt-md-0">
                                       <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-list text-primary" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                            </div>

                     
                                
                            </div>
 
                        </div>

                        <div class="col-xl-9 col-12 justify-content-end d-flex align-items-center">
                  
                            <div class=" collapse navbar-collapse " id="main-menu">
                                <?php echo $menu_principal ?>
                            </div>

                   
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</nav>


<style>
#menu-principal ul li a {
    font-size: 1em;
    color: white;
    text-transform: capitalize;
}

#menu-principal ul li {
    background-color: transparent !important;
    padding: 4px 0px 4px 0px;
    margin: 5px;
}


#menu-principal ul li a:hover {
    background-color: var(--primary) !important;

}

#menu-principal ul li .sub-menu li a {
    color: white;
}




/* Custom Link Navbar 8*/
#menu-principal .navbar-nav .nav-item a {
    color: #ffffff !important;
    font-size: 1.05rem !important;
    font-weight: 700 !important;
  }

  #menu-principal .inner-header {
    background-color: var(--tertiary);
  }
  
  #menu-principal .navbar-nav /*.nav-item */ {
    background-color: var(--secondary) !important;
    color: var(--secondary) !important;
  }
  #menu-principal .nav-item .sub-menu { /* menu-principal.php */
    background-color: #211c4c !important;;
    padding: 10px;

  }

 

#menu-principal .navbar-nav .nav-item a {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  color: var(--secondary);
  text-transform: capitalize;
  position: relative;
  border-radius: 0.5rem;
  -webkit-transition: all 0.3s ease-out 0s;
  transition: all 0.3s ease-out 0s;
  font-weight: 500;
}

#menu-principal .navbar-nav .nav-item a::before {
  content: "";
  left: 0;
  bottom: 0;
  height: 3px;
  width: 0%;
  background-color: var(--primary);
  -webkit-transition: all 0.3s ease-out 0s;
  transition: all 0.3s ease-out 0s;
}

#menu-principal .dropdown-menu {
border: 2px solid rgba(54, 146, 158, 0.95);
border-radius: 0.5rem;
}
</style>