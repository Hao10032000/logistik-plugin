<?php
class TFListLogoAnimation_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list-career';
    }
    
    public function get_title() {
        return esc_html__( 'TF List Logo Animation', 'themesflat-core' );
    }

    public function get_icon() {
		return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

			$repeater = new \Elementor\Repeater();

            $repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
				]
			);

	        
			$this->end_controls_section();
        // /.End List Setting              
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
        ?>
        <div class="wrap-list-logo-animation">
            <?php $count = 1;
            foreach ( $settings['list'] as $index => $item ): ?>
                <div class="item-logo box-<?php echo esc_attr($count); ?>">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'image' ); ?>
                </div>
            <?php $count++; endforeach; ?>

        </div>
        
        <?php
}

}