<?php
namespace WPC;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Utils{
    private function get(&$var, $default=null) {
        return ;
    }
	public static function get_bg_classes($extra=NULL) {
		$bg_class = [''                  => 'Sin estilo',
                     
                     'bg-primary'        => 'Color Primario',
                     'bg-secondary'      => 'Color Secundario',
                     'bg-tertiary'       => 'Color Terciario',
                     'bg-gray'           => 'Gris',
                     'bg-info'           => 'Info',
                     'bg-danger'         => 'Danger',
                     
                ];
        if ($extra)
                $bg_class = array_merge($bg_class, $extra);
        return $bg_class;
	}
        public static function get_cols_class() {
		return [''         => 'Default',
                'col-xs-12 col-1'  => 'col-1',
                'col-xs-12 col-2'  => 'col-2',
                'col-xs-12 col-3'  => 'col-3',
                'col-xs-12 col-4'  => 'col-4',
                'col-xs-12 col-5'  => 'col-5',
                'col-xs-12 col-6'  => 'col-6',
                'col-xs-12 col-7'  => 'col-7',
                'col-xs-12 col-8'  => 'col-8',
                'col-xs-12 col-9'  => 'col-9',
                'col-xs-12 col-10' => 'col-10',
                'col-xs-12 col-11' => 'col-11',
                'col-xs-12 col-12' => 'col-12'
               ];
	}
        public static function get_elementor_hover_effects() {
                return[
                '' => "Sin efecto",
                'elementor-animation-grow' => 'Grow',
                'elementor-animation-shrink' => 'Shrink',
                'elementor-animation-pulse' => 'Pulse',
                'elementor-animation-pulse-grow' => 'Pulse Grow',
                'elementor-animation-pulse-shrink' => 'Pulse Shrink',
                'elementor-animation-push' => 'Push',
                'elementor-animation-pop' => 'Pop',
                'elementor-animation-bounce-in' => 'Bounce In',
                'elementor-animation-bounce-out' => 'Bounce Out',
                'elementor-animation-rotate' => 'Rotate',
                'elementor-animation-grow-rotate' => 'Grow Rotate',
                'elementor-animation-float' => 'Float',
                'elementor-animation-sink' => 'Sink',
                'elementor-animation-bob' => 'Bob',
                'elementor-animation-hang' => 'Hang',
                'elementor-animation-skew' => 'Skew',
                'elementor-animation-skew-forward' => 'Skew Forward',
                'elementor-animation-skew-backward' => 'Skew Backward',
                'elementor-animation-wobble-vertical' => 'Wobble Vertical',
                'elementor-animation-wobble-horizontal' => 'Wobble Horizontal',
                'elementor-animation-wobble-to-bottom-right' => 'Wobble To Bottom Right',
                'elementor-animation-wobble-to-top-right' => 'Wobble To Top Right',
                'elementor-animation-wobble-top' => 'Wobble Top',
                'elementor-animation-wobble-bottom' => 'Wobble Bottom',
                'elementor-animation-wobble-skew' => 'Wobble Skew',
                'elementor-animation-buzz' => 'Buzz',
                'elementor-animation-buzz-out' => 'Buzz Out',
               ];
	}
        
    public static function add_pagination_options($original_instance){
        $self = $original_instance;
        
        $self->start_controls_section(
        'pager_options', [
            'label' => 'Paginador',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $self->add_control(
            'enable_pager',
                [
                    'label' => 'Agregar paginador',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => "Si",
                    'label_off' => "No",
                    'return_value' => 'Si',
                    'default' => false,
                ]
        );
        $self->add_control(
            'pager_type',
                [
                    'label' => 'Tipo paginador',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'prev_next',
                    'condition' => ['enable_pager' => 'Si'],
                    'options' => ['prev_next' => 'Boton siguente y atras',
                                  'pagination' => 'Numero de página']
                ]
        );
        $self->add_control(
            'pager_align',
                [
                    'label' => 'Alineamiento',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'condition' => ['enable_pager' => 'Si'],
                    'options' => [
                        'start'   => 'Izquierda',
                        'end'     => 'Derecha (Default)',
                        'center'  => 'Al centro',
                        'between' => 'A ambos lados',
                        'around'  => 'Cerca del centro',
                        'evenly'  => 'Mas cerca del centro'
                    ],
                    'default' => 'end'
                ]
        );
        $self->end_controls_section();
    }

    public static function render_pagination($query, $settings){
        // if pager is not enable, exit function
        if ($settings['enable_pager'] != 'Si' )
            return;

        $cur_page = get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1;
        $pager_type = isset($settings['pager_type'])? $settings['pager_type']: 'prev_next';
        $pager_align = $settings['pager_align'];
        echo "<div class='row'>";
        echo "<div class='col d-flex justify-content-$pager_align'>";
        if ($pager_type == 'prev_next'){
            $link_template ='<a class="btn rounded-pill btn-outline-primary m-1 btn-sm" href="%s">%s</a>';
            if ($cur_page == 1)
                echo "<span>&nbsp;</span>";
            if ($cur_page > 1)
                    printf( $link_template, esc_url( get_pagenum_link( $cur_page - 1 ) ), '&laquo; Anterior' );
            if ($cur_page < $query->max_num_pages)
                    printf( $link_template, esc_url( get_pagenum_link( $cur_page - 1 ) ), 'Siguiente &raquo;' );
        } else if ($pager_type == 'pagination'){
            $prev_links = [];

            if ( $cur_page >= 1 )
                    $links[] = $cur_page;
            if ( $cur_page >= 3 ) {
                    $links[] = $cur_page - 1;
                    $links[] = $cur_page - 2;
            }
            
            if ( ( $cur_page + 2 ) <= $query->max_num_pages ) {
                    $links[] = $cur_page + 2;
                    $links[] = $cur_page + 1;
            }
            echo "<nav>";
            echo "\t<ul class='pagination'>";

            /** Previous Post Link */
            if ( get_previous_posts_link() )
                    printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link() );
            
            /** Link to first page, plus ellipses if necessary */
            $btn_template = '<li class="page-item %s"><a href="%s" class="page-link">%s</a></li>';
            if ( ! in_array( 1, $links ) ) {
                    $class = 1 == $cur_page ? 'active' : '';
            
                    printf( $btn_template, $class, esc_url( get_pagenum_link( 1 ) ), '1' );
            
                    if ( ! in_array( 2, $links ) )
                    echo '<li class="page-item disabled" ><a href="#" class="page-link" tabindex="-1" aria-disabled="true">…</a></li>';
            }
            
            /** Link to current page, plus 2 pages in either direction if necessary */
            sort( $links );
            foreach ( (array) $links as $link ) {
                    $class = $cur_page == $link ? ' active' : '';
                    printf( $btn_template, $class, esc_url( get_pagenum_link( $link ) ), $link );
            }
            
            /** Link to last page, plus ellipses if necessary */
            if ( ! in_array( $query->max_num_pages, $links ) ) {
                    if ( ! in_array( $query->max_num_pages - 1, $links ) )
                    echo '<li class="page-item disabled" ><a href="#" class="page-link" tabindex="-1" aria-disabled="true">…</a></li>';
            
                    $class = $cur_page == $query->max_num_pages ? 'active' : '';
                    printf( $btn_template, $class, esc_url( get_pagenum_link( $query->max_num_pages ) ), $query->max_num_pages );
            }
            
            /** Next Post Link */
            if ( get_next_posts_link() )
                    printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link() );

            echo "\t</ul>";
            echo "</nav>";
                
        }
        echo "</div></div>";
            
    }
}

	