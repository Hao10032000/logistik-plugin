<?php
class TFTeam_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-team';
    }
    
    public function get_title() {
        return esc_html__( 'TF Team', 'themesflat-core' );
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

            $this->add_control(
				'image_thumb',
				[
					'label' => esc_html__( 'Choose Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,					
					'default' => esc_html__( 'Renaud Boissac', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,					
					'default' => esc_html__( 'Directeur associé - Cofondateur', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'enable_social',
				[
					'label' => esc_html__( 'Enable Social', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-core' ),
					'label_off' => esc_html__( 'Off', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$repeater = new \Elementor\Repeater();

            $repeater->add_control(
				'icon_social',
				[
					'label' => esc_html__( 'Icon Social', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_',
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
				]
			);

			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'condition' => [
	                    'enable_social'	=> 'yes',
	                ],
				]
			);

            
	        
			$this->end_controls_section();
        // /.End List Setting  
		
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		?>
			<div class="tf-team">
				<div class="features-avatar">
					<?php
					// Display team member image
					echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image_thumb' );
				
					// Display social icons if enabled
					if ( ! empty( $settings['enable_social'] ) && $settings['enable_social'] === 'yes' && ! empty( $settings['list'] ) ) : ?>
						<div class="list-social">
							<?php foreach ( $settings['list'] as $item ) :
								if ( empty( $item['link']['url'] ) || empty( $item['icon_social'] ) ) {
									continue;
								}
								?>
								<a href="<?php echo esc_url( $item['link']['url'] ); ?>" target="_blank" rel="noopener">
									<?php \Elementor\Icons_Manager::render_icon( $item['icon_social'], [ 'aria-hidden' => 'true' ] ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
							
				<div class="content">
					<?php if ( ! empty( $settings['name'] ) ) : ?>
						<h3><?php echo esc_html( $settings['name'] ); ?></h3>
					<?php endif; ?>
					
					<?php if ( ! empty( $settings['position'] ) ) : ?>
						<p class="position"><?php echo esc_html( $settings['position'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>

		<?php
	}
	

}