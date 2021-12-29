<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package municipalidad_tchile
 */

?>
<style>
    .elementor-grid-item {
        margin: 0 3px;
    }
footer {
    border-top: 3px solid #02d3c9;
    padding: 55px 0px 55px 0px;
}

footer h4 {
    font-size: 18px;
    color: #02d3c9;
}

footer .e-form__buttons {
    background-color: #02D3C9;
}

footer button {
    background-color: transparent !important;
}
</style>
<footer>
    <div class="container">
        <div class="row d-flex justify-content-start">
            <div class="col-md-4">
                <div class="row d-flex justify-content-center p-3">
                    <div class="col-12 p-2">
                        <a href="http://lacalera.tchile.com">
                            <img width="246"
                                src="http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1.png"
                                class="attachment-full size-full" alt="" loading="lazy"
                                srcset="http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1.png 2697w, http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1-300x115.png 300w, http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1-1024x392.png 1024w, http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1-768x294.png 768w, http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1-1536x588.png 1536w, http://lacalera.tchile.com/wp-content/uploads/2021/12/cropped-ACTUALIZACION-IDENTIDAD-VISUAL_Mesa-de-trabajo-1-2048x784.png 2048w"
                                sizes="(max-width: 2697px) 100vw, 2697px"></a>
                    </div>
                    <div class="col-12 p-2">
                        <p class="p-2">I am text block. Click edit button to change this text. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar
                            dapibus leo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <h4 class="fw-bold fs-3 pt-3">Enlaces</h4>
                    <div class="row">
                        <div class="col-12 pt-2">
                                <?php
                                wp_nav_menu(array(
                                    'menu_class'     => 'navbar-nav flex-row row g-0 row-cols-2',
                                    'theme_location' => 'footer_menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'add_li_class'  => 'nav-item  col',
                                    'before' => '<i class="fas fa-caret-right text-info pe-2"></i>',

                                ));
                                ?>       
                        </div>        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <h4 class="fw-bold fs-3 pt-3">Contactos</h4>

                    <div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-2796472 elementor-shape-circle e-grid-align-right elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="2796472" data-element_type="widget" data-widget_type="social-icons.default">
				            <div class="elementor-widget-container">
					            <div class="elementor-social-icons-wrapper elementor-grid">
							        <span class="elementor-grid-item">
				                    	<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-animation-shrink elementor-repeater-item-46bc525" href="https://www.facebook.com/pages/Municipalidad-de-La-Calera/1481023582148708" target="_blank">
				                    		<span class="elementor-screen-only">Facebook-f</span>
				                    		<i class="fab fa-facebook-f"></i>					</a>
				                    </span>
							        <span class="elementor-grid-item">
				                    	<a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-shrink elementor-repeater-item-4a4ca25" href="https://twitter.com/MuniLaCalera" target="_blank">
				                    		<span class="elementor-screen-only">Twitter</span>
				                    		<i class="fab fa-twitter"></i>					</a>
				                    </span>
							        <span class="elementor-grid-item">
				                    	<a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-animation-shrink elementor-repeater-item-6d4da6c" href="https://www.youtube.com/user/lacaleracomunaviva" target="_blank">
				                    		<span class="elementor-screen-only">Youtube</span>
				                    		<i class="fab fa-youtube"></i>					</a>
				                    </span>
							        <span class="elementor-grid-item">
				                    	<a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-animation-shrink elementor-repeater-item-d57756f" href="https://www.instagram.com/munilacalera/" target="_blank" style="background-color: #6C1175;">
				                    		<span class="elementor-screen-only">Instagram</span>
				                    		<i class="fab fa-instagram"></i>					</a>
				                    </span>
							        <span class="elementor-grid-item">
				                    	<a class="elementor-icon elementor-social-icon elementor-social-icon-phone-alt elementor-animation-shrink elementor-repeater-item-7926254" target="_blank" style="background-color: #1BB434;">
				                    		<span class="elementor-screen-only">Phone-alt</span>
				                    		<i class="fas fa-phone-alt"></i>					</a>
				                    </span>
					            </div>
				            </div>
				        </div>
					</div>

                </div>
            </div>
        </div>
    </div>


</footer>



</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>