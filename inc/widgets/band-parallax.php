<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Band_parallax extends Widget_Base
{

    public function get_name()
    {
        return 'Banda Parallax';
    }

    public function get_title()
    {
        return 'Banda Parallax';
    }

    public function get_icon()
    {
        return '';
    }

    public function get_categories()
    {
        return ['municipalidad'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'image_bg_content',
            [
                'label' => 'Imagen Background',
            ]
        );
        $this->add_control(
            'image_bg',
            [
                'label' => 'Imagen Background',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'box_content',
            [
                'label' => 'Contenedor',
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => 'Color texto',
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => 'Titulo',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Titulo'
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => 'SubTitulo',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'SubTitulo'
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'button_content',
            [
                'label' => 'Boton',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => 'texto_boton',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ver Más'
            ]
        );

        $this->add_control(
            'btn_border_color',
            [
                'label' => 'Color Borde',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFF'
            ]
        );
        $this->add_control(
            'btn_border',
            [
                'label' => 'Ancho Borde',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <div class="p-5 bg-dark band-image bg-fixed bg_attach_center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $settings['image']['url'] ?>'); background-attachment: fixed;">
            <div class="container text-xs-center text-md-start" style="color:<?php echo $settings['text_color']; ?>">

                <div class="col-md-6 px-0 py-5 col-sm-12">
                    <p class="display-5 "><?php echo $settings['title']; ?></p>
                    <p class="display-5 fw-bold"><?php echo $settings['subtitle']; ?></p>
                    <button type="button" class="btn btn-sm btn-dark rounded-pill align-self-end px-4  border-<?php echo $settings['btn_border']; ?> "><?php echo $settings['btn_text'] ?> <i class="fas fa-chevron-right float"></i></button>

                </div>

            </div>
        </div>
<?php
    }
}
