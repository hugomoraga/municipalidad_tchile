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
        <div class="row">
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
                        <div class="col-6">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer_menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'link_class' => 'nav-link',
                                    'before' => '<i class="fas fa-caret-right text-info pe-2"></i>',
                                ));
                                ?>
                                
                        </div>
                        <div class="col-6">

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <h4 class="fw-bold fs-3 pt-3">Contactos</h4>
                </div>
            </div>
        </div>
    </div>


</footer>



</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>