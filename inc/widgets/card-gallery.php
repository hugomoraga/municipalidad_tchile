<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WPC\Utils;



if (!defined('ABSPATH')) exit; // Exit if accessed directly


class CardGallery extends Widget_Base{


  public function get_name(){
    return 'card_gallery';
  }

  public function get_title(){
    return 'Listado galerias';
  }

  public function get_icon(){
    return 'fa fa-camera';
  }

  public function get_categories(){
    return ['municipalidad'];
  }

  public function get_keywords() {
		return ['tarjetas', 'listado', 'galerias'];
	}
  
  protected function register_controls(){
     $this->start_controls_section(
      'query',
      [
        'label' => 'Galerias',
        'tab'   => Controls_Manager::TAB_CONTENT,
      ]
    );
    $this->add_control(
      'post_type',
      [
        'label' => 'Tipo galeria',
        'type' => Controls_Manager::SELECT,
		'options' => ['post' => 'Noticias (Default)',
                      'foogallery' => 'foogallery'],
        'default' => 'foogallery'
      ]
    );
    $this->add_control(
      'seccion',
      [
        'label' => 'Sección',
        'type' => \Elementor\Controls_Manager::SELECT2,
        'options' => $this->list_sections(),
        'condition' => ['post_type' => 'post']
        ]
    );

    $this->add_control(
      'quantity',
      [
        'label' => 'Resultados por página',
        'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 30,
				'min' => 1
      ]
    );

    $this->end_controls_section();
    $this->start_controls_section(
      'cards',
      [
        'label' => 'tarjetas',
        'tab'   => Controls_Manager::TAB_CONTENT,
      ]
    );
    $this->add_control(
      'bg_class',
      [
        'label' => 'Estilo tarjeta',
        'type' => Controls_Manager::SELECT,
				'options' => Utils::get_bg_classes(),
				'default' => ''
      ]
    );
    $this->add_control(
      'thum_height',
      [
        'label'   => 'Altura tarjeta',
        'type'    => Controls_Manager::NUMBER,
        'default' => '250'
      ]
    );
    $this->add_control(
        'hover_effect',
        [
          'label'   => 'Efecto mouse',
          'type' => Controls_Manager::SELECT,
          'options'    => Utils::get_elementor_hover_effects(),
          'default' => ''

        ]
	);
    $this->add_control(
      'show_thumnail',
      [
        'label' => 'Dibujar imagen',
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => "Si",
		'label_off' => "No",
        'return_value' => true,
				'default' => true,

      ]
    );
    $this->add_control(
      'row_cols',
      [
        'label' => 'Tarjetas por fila',
        'type' => Controls_Manager::SELECT,
				'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4 ,5 => 5 ,6 =>6],
				'default' => 4
      ]
    );
    $this->add_control(
      'row_cols_gap',
      [
        'label' => 'Espaciado entre tarjetas',
        'type' => Controls_Manager::SELECT,
				'options' => [0, 1, 2, 3, 4 ,5 ,6],
				'default' => 4
      ]
    );
    $this->end_controls_section();
  }
  private function list_sections(){
    $terms = get_terms( array(
              'taxonomy' => 'secciones',
              'hide_empty' => false,
            ));
    $data = [];
    $data[0] = "Todas";
    foreach($terms as $term){
        $data[$term->term_id] = $term->name;
    }
    return $data;
  }
  
  private function get_news_query(){
      $settings     = $this->get_settings_for_display();
      $qty          = $settings['quantity'];
      $post_type    = $settings['post_type'];
      $news_section = $settings['seccion'];

      $args = array('post_type' => $post_type,
                    'posts_per_page' => $qty,
                    'order' => 'DESC',
                    'public'   => true,
      );
    if ($post_type == 'post'){
        $filter = array();        
        array_push($filter, array( 
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => 'galeria',
                    'operator' => 'IN',
        ));

        if ($news_section > 0){
            array_push($filter, array( 
                    'taxonomy' => 'secciones',
                    'field' => 'term_id',
                    'terms' => $news_section,
                    'operator' => 'IN',
            ));
        }
        $args['tax_query'] = $filter;
    }
    return new \WP_Query($args);
  }

  private function get_thumbnail_url(){
    if (has_post_thumbnail(get_the_ID()) ){
      $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      if (strlen($thumbnail) > 1){
        return $thumbnail;
      }
    }
    return \Elementor\Utils::get_placeholder_image_src();
  }
  
  protected function render(){
    $settings     = $this->get_settings_for_display();
    $query        = $this->get_news_query();
    $bg_class     = $settings['bg_class'];
    $row_cols_gap = $settings['row_cols_gap'];
    $row_cols     = $settings['row_cols'];
    $hover_effect = $settings['hover_effect'];
    $img_height   = $settings['thum_height'].'px';
    $show_thumnail= $settings['show_thumnail'];
    $filter_type  = $settings['filter_type'];
    $cid = rand(9999999, 999999999);

    ?>
    <style>
      .card-body {
        padding: 5px 16px 0px 16px;
      }
    </style>

    <div class="container p-0">
      <div class="row row-cols-1 row cols-sm-2 row-cols-md-<?= $row_cols ?> g-<?= $row_cols_gap;?>" id="cards_to_filter<?php echo $cid; ?>">
        <?php 
        if ( $query->have_posts() ) :
          $i = 0;
          while ( $query->have_posts() ) :
            $query->the_post();
            $thumbnail   = $this->get_thumbnail_url();
        ?>

        <div class="col col-card">
          <div class="card card-album <?= $bg_class; ?> border-0 h-100  <?= $hover_effect;?>">
            <img src="<?= $thumbnail ?>" class="card-img " style="height: <?= $img_height; ?>; object-fit: cover; border-radius: 5px 5px 0 0;">
            <div class="overlay-shadow" style=""></div>
            <div class="card-body <?= $bg_class; ?>" style="text-align:center">
              <a href="<?=get_the_permalink(get_the_id())?>" class="text-white stretched-link"  aria-disabled="true">
                <h5 class="card-title text-center fw-bold py-2"> <?= get_the_title(); ?></h5>
              </a>
            </div>
          </div>
        </div>          



          <?php 
          endwhile; 
        endif;
        ?>
        
      </div>
    </div>

    <?php
  }
  
}
