<?php
class TFIconBox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tficonbox';
    }
    
    public function get_title() {
        return esc_html__( 'TF Icon Box', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	public function get_style_depends(){
		return ['tf-iconbox'];
	}

	protected function register_controls() {
		$this->start_controls_section(
        'content_section',
        [
            'label' => esc_html__( 'Content', 'themesflat-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    // Control: Icon
    $this->add_control(
        'icon',
        [
            'label' => esc_html__( 'Icon', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-star',
                'library' => 'solid',
            ],
        ]
    );

    // Control: Title
    $this->add_control(
        'title',
        [
            'label' => esc_html__( 'Title', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Internationale Privatumzüge', 'themesflat-core' ),
            'placeholder' => esc_html__( '', 'themesflat-core' ),
        ]
    );
	$this->end_controls_section();
	// --- Section Icon Style ---
    $this->start_controls_section(
        'icon_style_section',
        [
            'label' => esc_html__( 'Icon', 'themesflat-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    // Width
    $this->add_responsive_control(
        'icon_width',
        [
            'label' => esc_html__( 'Width', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [ 'min' => 10, 'max' => 200 ],
                '%'  => [ 'min' => 1, 'max' => 100 ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Height
    $this->add_responsive_control(
        'icon_height',
        [
            'label' => esc_html__( 'Height', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [ 'min' => 10, 'max' => 200 ],
                '%'  => [ 'min' => 1, 'max' => 100 ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Background Color
    $this->add_control(
        'icon_background',
        [
            'label' => esc_html__( 'Background Color', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'background-color: {{VALUE}};',
            ],
        ]
    );

    // Font Size
    $this->add_responsive_control(
        'icon_font_size',
        [
            'label' => esc_html__( 'Icon Size', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [ 'min' => 8, 'max' => 100 ],
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-box i' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .icon-box svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Border Radius
    $this->add_responsive_control(
        'icon_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    // --- Section Title Style ---
    $this->start_controls_section(
        'title_style_section',
        [
            'label' => esc_html__( 'Title', 'themesflat-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

  $this->add_responsive_control(
    'title_font_size',
    [
        'label' => esc_html__( 'Font Size', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', 'em', 'rem' ],
        'range' => [
            'px' => [ 'min' => 10, 'max' => 100 ],
        ],
        'selectors' => [
            '{{WRAPPER}} .title' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
    ]
);

    // Color
    $this->add_control(
        'title_color',
        [
            'label' => esc_html__( 'Text Color', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .title' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Padding
    $this->add_responsive_control(
        'title_padding',
        [
            'label' => esc_html__( 'Padding', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();


	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

   echo '<div class="tf-iconbox">';
        
        // Thêm class icon-box bao quanh icon
        if ( ! empty( $settings['icon']['value'] ) ) {
            echo '<div class="icon-box">';
                \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
            echo '</div>';
        }

        echo '<h3 class="title">' . esc_html( $settings['title'] ) . '</h3>';
        
    echo '</div>';

		
	}	

}