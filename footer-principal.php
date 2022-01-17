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
    border-top: 3px solid #FF7A00;
    background: #FF7A00;
    padding: 0px 0px 0px 0px;
}
footer h4 {
    font-size: 18px;
    color: #fff;
}
footer .e-form__buttons {
    background-color: #02D3C9;
}

footer button {
    background-color: transparent !important;
}
footer p, footer span footer a {
    color: #fff;
}
footer p {
    font-size: 12px;
    line-height: 1.2;
    letter-spacing: 0.5px;
}
footer .p-2 {
    padding: 0 5px 0 0 !important;
    text-align:right;
}
footer .p-i {
    padding: 10px 10px 0px 0px !important;
    height: 100%;
    border-right: solid 1px #fff;
}
footer .p-f {
    padding: 20px 0px 17px 5px !important;
    height: 100%;
}
footer .col-md-6 {
    padding-top: 20px;
    padding-bottom: 20px;
}
</style>
<footer>
    <div class="container">
        <div class="row d-flex justify-content-start">
            <div class="col-md-6">
                <div class="row d-flex justify-content-center p-i">
                    <div class="col-12 p-2">
                        <a href="http://lacalera.tchile.com">
                            <img width="250"
                                src="http://lacalera.tchile.com/wp-content/uploads/2022/01/fimage.png"
                                class="attachment-full size-full" alt="" loading="lazy"
                                srcset="http://lacalera.tchile.com/wp-content/uploads/2022/01/fimage.png 2048w"
                                sizes="(max-width: 2697px) 100vw, 2697px"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-f">
                        <p>Ilustre Municipalidad de La Calera</p>
                        <p>Marathon Nº 312, La Calera</p>
                        <p>Telefono: 56 2 234 234</p>
                        <p>Horario de atención: 08:30 a 14:00 horas.</p>
                </div>
            </div>
        </div>
    </div>


</footer>



</div><!-- #page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<?php wp_footer(); ?>

</body>

</html>