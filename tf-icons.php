<?php 
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );

function themesflat_iconpicker_register( $icons = array() ) {
	
	$icons['theme_icon'] = array(
		'name'          => 'theme_icon',
		'label'         => esc_html__( 'Theme Icons', 'themesflat-core' ),
		'labelIcon'     => 'icon-proty-homee',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => URL_THEMESFLAT_THEME . 'css/icon-proty.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/proty_fonts_default.json',
		'ver'           => '1.0.0',
	);

	return $icons;
}