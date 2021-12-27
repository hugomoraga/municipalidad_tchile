<?php
require_once get_template_directory() . '/inc/widgets.php';


function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'municipalidad',
		[
			'title' => 'Municipalidad',
			'icon' => 'fa fa-plug',
		]
	);
	

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
