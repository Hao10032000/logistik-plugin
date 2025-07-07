<?php
class TFCounter_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-counter';
    }
    
    public function get_title() {
        return esc_html__( 'TF Counter', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-counter'];
	}

    public function get_script_depends() {
		return [ 'jquery-waypoint', 'tf-counter' ];
	}

	protected function register_controls() {
		// Start Counter        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Counter', 'themesflat-core'),
	            ]
	        );
    $this->add_control(
        'icon_image_type',
        [
            'label' => __( 'Choose', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'icon' => [
                    'title' => __( 'Icon', 'themesflat-core' ),
                    'icon' => 'eicon-star',
                ],
                'image' => [
                    'title' => __( 'Image', 'themesflat-core' ),
                    'icon' => 'eicon-image',
                ],
            ],
            'default' => 'icon',
            'toggle' => false,
        ]
    );

    // Icon picker
    $this->add_control(
        'icon',
        [
            'label' => __( 'Select Icon', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-star',
                'library' => 'solid',
            ],
            'condition' => [
                'icon_image_type' => 'icon',
            ],
        ]
    );

    // Image uploader
    $this->add_control(
        'image',
        [
            'label' => __( 'Select Image', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => [
                'icon_image_type' => 'image',
            ],
        ]
    );
			

	        $this->add_control(
				'starting_number',
				[
					'label' => esc_html__( 'Starting Number', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 0,
				]
			);

			$this->add_control(
				'ending_number',
				[
					'label' => esc_html__( 'Ending Number', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 32,
				]
			);

			$this->add_control(
				'prefix',
				[
					'label' => esc_html__( 'Number Prefix', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => 1,
				]
			);

			$this->add_control(
				'suffix',
				[
					'label' => esc_html__( 'Number Suffix', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( '+', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'duration',
				[
					'label' => esc_html__( 'Animation Duration', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 2000,
					'min' => 100,
					'step' => 100,
				]
			);

			$this->add_control(
				'thousand_separator_char',
				[
					'label' => esc_html__( 'Separator', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'' => 'Default',
						',' => 'Commas',
						'.' => 'Dot',
						' ' => 'Space',
					],
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Satisfied
					Clients', 'themesflat-core' ),
				]
			);

			$this->end_controls_section();
        // /.End Counter  
		// Start Style Icon
	        $this->start_controls_section( 'section_style_icon',
	            [
	                'label' => esc_html__( 'Icon', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );
			$this->add_responsive_control(
    'icon_image_height',
    [
        'label' => __( 'Height', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%', 'em', 'rem' ],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 300,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .icon-counter svg' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .icon-counter i' => 'height: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .icon-counter img' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'icon_image_width',
    [
        'label' => __( 'Width', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', '%', 'em', 'rem' ],
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 300,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .icon-counter svg' => 'width: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .icon-counter i' => 'width: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .icon-counter img' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'icon_image_color',
    [
        'label' => __( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .icon-counter i,
			 {{WRAPPER}} .icon-counter svg path' => 'stroke: {{VALUE}};',
        ],
        'condition' => [
            'icon_image_type' => 'icon',
        ],
    ]
);

	     
			        
        	$this->end_controls_section();    
	    // /.End Style Title

        // Start Style Number
	        $this->start_controls_section( 'section_style_number',
	            [
	                'label' => esc_html__( 'Number', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_responsive_control(
				'text_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-counter .wrap-counter-inner,
						{{WRAPPER}} .tf-counter .icon-counter' => 'text-align: {{VALUE}};',
					],
				]
			);

	        $this->add_control(
				'number_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'number_color_pf',
				[
					'label' => esc_html__( 'Text Prefix Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-number-wrapper .counter-number-prefix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'number_color_sf',
				[
					'label' => esc_html__( 'Text Suffix Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-number-wrapper .counter-number-suffix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typo Number', 'themesflat-core' ),
					'name' => 'typography_number_df',
					'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper ',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typo Number Suffix', 'themesflat-core' ),
					'name' => 'typography_number_df_sf',
					'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper .counter-number-suffix ',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typo Number Prefix', 'themesflat-core' ),
					'name' => 'typography_number_df_px',
					'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper .counter-number-prefix ',
				]
			);


			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'number_shadow',
					'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
				]
			);	

			$this->add_responsive_control(
				'margin_number',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style Number

        // Start Style Title
	        $this->start_controls_section( 'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
					'selector' => '{{WRAPPER}} .tf-counter .counter-title',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_shadow',
					'selector' => '{{WRAPPER}} .tf-counter .counter-title',
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-counter .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],					
				]
			);	
			        
        	$this->end_controls_section();    
	    // /.End Style Title
		
	}

	protected function render($instance = []) {
    $settings = $this->get_settings_for_display();

    $this->add_render_attribute('tf_counter', [
        'id' => "tf-counter-{$this->get_id()}",
        'class' => ['tf-counter'],
        'data-tabid' => $this->get_id()
    ]);

    $counter_prefix = $counter_suffix = $counter_title = '';

    // Prefix
    if (!empty($settings['prefix'])) {
        $counter_prefix = sprintf('<span class="counter-number-prefix">%1$s</span>', $settings['prefix']);
    }

    // Counter number
    $counter_number = sprintf(
        '<span class="counter-number" data-from_value="%1$s" data-to_value="%2$s" data-duration="%3$s" data-delimiter="%4$s">%1$s</span>',
        $settings['starting_number'],
        $settings['ending_number'],
        $settings['duration'],
        $settings['thousand_separator_char']
    );

    // Suffix
    if (!empty($settings['suffix'])) {
        $counter_suffix = sprintf('<span class="counter-number-suffix">%1$s</span>', $settings['suffix']);
    }

    // Title
    if (!empty($settings['title'])) {
        $counter_title = sprintf('<div class="counter-title">%1$s</div>', $settings['title']);
    }

    // Icon/Image bên trong .icon-counter
    ob_start();
    echo '<div class="icon-counter">';
    if ($settings['icon_image_type'] === 'icon' && !empty($settings['icon']['value'])) {
        \Elementor\Icons_Manager::render_icon($settings['icon'], [
            'aria-hidden' => 'true',
            'class' => 'icon-counter-icon',
        ]);
    } elseif ($settings['icon_image_type'] === 'image' && !empty($settings['image']['url'])) {
        echo '<img class="icon-counter-image" src="' . esc_url($settings['image']['url']) . '" alt="Counter Image">';
    }
    echo '</div>';
    $icon_or_image = ob_get_clean();

    // Tổng nội dung HTML
    $content = sprintf(
        '<div class="wrap-counter">
            <div class="wrap-counter-inner">
                %1$s
                <div class="content">
                    <div class="counter-number-wrapper">
                        %2$s
                        %3$s
                        %4$s
                    </div>
                    %5$s
                </div>
            </div>
        </div>',
        $icon_or_image,
        $counter_prefix,
        $counter_number,
        $counter_suffix,
        $counter_title
    );

    // Xuất HTML ra ngoài
    echo sprintf(
        '<div %1$s>%2$s</div>',
        $this->get_render_attribute_string('tf_counter'),
        $content
    );
}



}