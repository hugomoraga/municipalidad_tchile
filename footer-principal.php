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
    footer .container-lg{
        background-image: linear-gradient(to bottom right, #090815, #211C4C);
    }
</style>
<footer>
    <div class="container-lg bg-primary shadow-sm">
        <div class="row d-flex justify-content-start">
            <div class="col-md-6">
                <div class="row d-flex justify-content-center p-i">
                    <div class="col-12 text-center text-md-end px-4">
                        <a href="https://lacalera.com">
                            <img width="250"
                                src="/wp-content/uploads/2022/03/white-logo.png"
                                class="attachment-full size-full" alt="" loading="lazy"
                                srcset="/wp-content/uploads/2022/03/white-logo.png 2048w"
                                sizes="(max-width: 2697px) 100vw, 2697px"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6  text-start">
                <div class="px-5 py-3">
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