<?php

class TFbutton_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-button';

    }

    

    public function get_title() {

        return esc_html__( 'TF Button', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-button';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }

	 public function get_style_depends() {
		return ['tf-button'];
	}




	protected function register_controls() {

		// Start List Setting        

			$this->start_controls_section( 'section_setting',

	            [

	                'label' => esc_html__('Setting', 'themesflat-core'),

	            ]

	        );



			$this->add_control( 

                'button_text',

                [

                    'label' => esc_html__( 'Button Text', 'micare' ),

                    'type' => \Elementor\Controls_Manager::TEXT,

                    'default' => esc_html__( 'Unverbindliches Angebot', 'micare' ),

                ]

            );	

            

            $this->add_control(

                'post_icon_readmore',

                [

                    'label' => esc_html__( 'Post Icon ', 'micare' ),

                    'type' => \Elementor\Controls_Manager::ICONS,

                    'default' => [

                        'value' => 'icon-atu-logistik-icon-right1',

                        'library' => 'theme_icon',

                    ],

                ]

            );	

	        

            $this->add_control(

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

	        

			$this->end_controls_section();

        // /.End List Setting  



	    // Start Style Style

			$this->start_controls_section(

				'section_style',

				[

					'label' => esc_html__( 'Style', 'themesflat-core' ),

					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);

			$this->add_control(

				'h_general',

				[

					'label' => esc_html__( 'General', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_responsive_control(

				'align_btn',

				[

					'label' => esc_html__( 'Alignment', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::CHOOSE,

					'default' => 'left',

					'options' => [

						'left'    => [

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

						]

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-tf-button' => 'text-align: {{VALUE}}',

					],

				]

			);

			$this->add_responsive_control( 'padding',

	            [

	                'label' => esc_html__( 'Padding', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::DIMENSIONS,

	                'size_units' => ['px', 'em', '%'],

	                'selectors' => [

	                    '{{WRAPPER}} .tf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

	                ],

	            ]

	        );		

			

			$this->add_responsive_control( 

				'margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'label' => esc_html__( 'Typo Button', 'themesflat-core' ),

					'name' => 'typography_number_df',

					'selector' => '{{WRAPPER}} .tf-btn span',

				]

			);



			$this->add_control( 

	        	'icon_size',

				[

					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 300,

							'step' => 1,

						],

					],

					'selectors' => [

						'{{WRAPPER}} .tf-btn i' => 'font-size: {{SIZE}}{{UNIT}};',

					],

				]

			);


			$this->add_group_control( 

				\Elementor\Group_Control_Border::get_type(),

				[

					'name' => 'border',

					'label' => esc_html__( 'Border', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-btn',

				]

			);

			$this->add_responsive_control( 

				'border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px' , '%' ],

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);





            $this->add_control( 

				'color_content',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'color: {{VALUE}}',

					],

				]

			);



			$this->add_control( 

				'bg_content',

				[

					'label' => esc_html__( 'Background', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'background: {{VALUE}}',

					],

				]

			);





            $this->add_control( 

				'color_content_hover',

				[

					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tf-btn:hover' => 'color: {{VALUE}}',

					],

				]

			);



			$this->add_control( 

				'bg_content_hover',

				[

					'label' => esc_html__( 'Background Hover', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tf-btn:hover, {{WRAPPER}} .tf-btn:hover::after' => 'background: {{VALUE}}',

					],

				]

			);

			$this->end_controls_section();

		// /.End Style 

	}	



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();		



		$this->add_render_attribute( 'wrap_tf_button', ['id' => "tf-step-{$this->get_id()}", 'class' => ['wrap-tf-button'], 'data-tabid' => $this->get_id() ] );

		

        ?>

<div <?php echo $this->get_render_attribute_string('wrap_tf_button') ?>>

    <div class="wrap-tf-btn">
        <!-- From Uiverse.io by satyamchaudharydev -->
        <a href="<?php echo esc_url( $settings['link']['url'] ) ?>" class="tf-btn ">
            <?php echo esc_html( $settings['button_text'] ); ?>
                <?php
        if ( ! empty( $settings['post_icon_readmore']['value'] ) ) {
            $icon_value = $settings['post_icon_readmore']['value'];
            if ( is_string( $icon_value ) ) {
                echo '<i class="' . esc_attr( $icon_value ) . '" aria-hidden="true"></i>';
            } else {
                \Elementor\Icons_Manager::render_icon(
                    $settings['post_icon_readmore'],
                    [ 'aria-hidden' => 'true' ]
                );
            }
        }
    ?>
        </a>
    </div>

</div>

<?php 		

	}



}