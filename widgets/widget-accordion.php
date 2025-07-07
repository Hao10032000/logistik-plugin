<?php

class TFAccordion_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tfaccordion';

    }

    

    public function get_title() {

        return esc_html__( 'TF Accordion', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-accordion';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



    public function get_style_depends() {

		return [ 'tf-accordion' ];

	}



    public function get_script_depends() {

		return [ 'tf-accordion' ];

	}



	protected function _register_controls() {

        // Start Accordion        

			$this->start_controls_section( 

				'section_accordion',

	            [

	                'label' => esc_html__('Accordion', 'themesflat-core'),

	            ]

	        );	



	    	$this->add_control( 'heading_icon',

				[

					'label' => esc_html__( 'Icon', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);



			$this->add_control( 'icon_style',

				[

					'label' => esc_html__( 'Icon Style', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::CHOOSE,

					'options' => [

						'none' => [

							'title' => esc_html__( 'None', 'themesflat-core' ),

							'icon' => 'fa fa-ban',

						],

						'icon' => [

							'title' => esc_html__( 'Icon', 'themesflat-core' ),

							'icon' => 'eicon-favorite',

						],

						'image' => [

							'title' => esc_html__( 'Image', 'themesflat-core' ),

							'icon' => 'eicon-image',

						],

					],

					'default' => 'icon',

				]

			);	



			$this->add_control( 

				'icon_position',

				[

					'label' => esc_html__( 'Icon Position', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'icon_after',

					'options' => [

						'icon_before'  => esc_html__( 'Left', 'themesflat-core' ),

						'icon_after' => esc_html__( 'Right', 'themesflat-core' ),

						'icon_before_after' => esc_html__( 'Both side', 'themesflat-core' ),

					],

					'condition' => [

						'icon_style!' => 'none',

					],

				]

			);



			$this->add_control( 'icon_accodion',

				[

					'label' => esc_html__( 'Left Icon', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::ICONS,

					'fa4compatibility' => 'icon-atu-logistik-up',

					'default' => [

						'value' => 'fas fa-plus',

						'library' => 'fa-solid',

					],

					'condition' => [

	                    'icon_style' => 'icon',

	                    'icon_position' => ['icon_before', 'icon_before_after'],

	                ],

				]

			);



			$this->add_control( 'image_accodion',

				[

					'label' => esc_html__( 'Left Icon Image', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::MEDIA,

					'default' => [

						'url' => \Elementor\Utils::get_placeholder_image_src(),

					],

					'condition' => [

	                    'icon_style' => 'image',

	                    'icon_position' => ['icon_before', 'icon_before_after'],

	                ],

				]

			);



			$this->add_control( 'icon_accodion_active',

				[

					'label' => esc_html__( 'Left Icon Active', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::ICONS,

					'fa4compatibility' => 'icon-atu-logistik-up',

					'default' => [

						'value' => 'fas fa-minus',

						'library' => 'fa-solid',

					],

					'condition' => [

	                    'icon_style' => 'icon',

	                    'icon_position' => ['icon_before', 'icon_before_after'],

	                ],

				]

			);



			$this->add_control( 'image_accodion_active',

				[

					'label' => esc_html__( 'Left Icon Image Active', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::MEDIA,

					'default' => [

						'url' => \Elementor\Utils::get_placeholder_image_src(),

					],

					'condition' => [

	                    'icon_style' => 'image',

	                    'icon_position' => ['icon_before', 'icon_before_after'],

	                ],

				]

			);





			$this->add_control( 'icon_accodion_right',

				[

					'label' => esc_html__( 'Right Icon', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::ICONS,

					'fa4compatibility' => 'icon-atu-logistik-up',

					'default' => [

						'value' => 'icon-atu-logistik-up',

						'library' => 'fa-solid',

					],

					'condition' => [

	                    'icon_style' => 'icon',

	                    'icon_position' => ['icon_after', 'icon_before_after'],

	                ],

				]

			);



			$this->add_control( 'image_accodion_right',

				[

					'label' => esc_html__( 'Right Icon Image', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::MEDIA,

					'default' => [

						'url' => \Elementor\Utils::get_placeholder_image_src(),

					],

					'condition' => [

	                    'icon_style' => 'image',

	                    'icon_position' => ['icon_after', 'icon_before_after'],

	                ],

				]

			);



			$this->add_control( 'icon_accodion_right_active',

				[

					'label' => esc_html__( 'Right Icon Active', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::ICONS,

					'fa4compatibility' => 'icon-atu-logistik-up',

					'default' => [

						'value' => 'icon-atu-logistik-up',

						'library' => 'fa-solid',

					],

					'condition' => [

	                    'icon_style' => 'icon',

	                    'icon_position' => ['icon_after', 'icon_before_after'],

	                ],

				]

			);



			$this->add_control( 'image_accodion_right_active',

				[

					'label' => esc_html__( 'Right Icon Image Active', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::MEDIA,

					'default' => [

						'url' => \Elementor\Utils::get_placeholder_image_src(),

					],

					'condition' => [

	                    'icon_style' => 'image',

	                    'icon_position' => ['icon_after', 'icon_before_after'],

	                ],

				]

			);



	        $repeater = new \Elementor\Repeater();

	        	$repeater->add_control( 'set_active',

					[

						'label' => esc_html__( 'Set Active Item', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Yes', 'themesflat-core' ),

						'label_off' => esc_html__( 'No', 'themesflat-core' ),

						'return_value' => 'active',

						'default' => 'inactive',

					]

				);		        

		        $repeater->add_control( 'list_title', [

						'label' => esc_html__( 'Nav text', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::TEXT,

						'default' => esc_html__( 'Accordion' , 'themesflat-core' ),

						'label_block' => true,

					]

				);

				$repeater->add_control( 'heading_content',

					[

						'label' => esc_html__( 'Content', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::HEADING,

						'separator' => 'before',

					]

				);

				$repeater->add_control( 'list_content', [

						'label' => esc_html__( 'Content text', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::WYSIWYG,

						'default' => esc_html__( 'Good strategy is the antidote to competition. Strategic thinking is the process of developing a strategy that defines your value proposition and your unique value chain. This process includes market and competitive research as well as an assessment of the company’s capabilities and the industry forces impacting it.' , 'themesflat-core' ),

						'label_block' => true,

					]

				);

		        $this->add_control( 'accordion_list',

					[					

						'type' => \Elementor\Controls_Manager::REPEATER,

						'fields' => $repeater->get_controls(),

						'default' => [

							[	

								'set_active' => 'active',

								'list_title' => esc_html__( 'Welche Umzugsleistungen bietet ATU?', 'themesflat-core' ),

								'list_content' => esc_html__( "Herzlich willkommen bei ATU Logistik, Ihrem professionellen Umzugsunternehmen in München. Ob Privatumzug, Büroumzug, Spezialtransport oder Möbeleinlagerung – wir bieten Ihnen einen kompetenten Rundum-Service. Selbstverständlich ohne versteckte Kosten. Holen Sie jetzt Ihr unverbindliches Angebot ein." ),

							],

							[

								'set_active' => 'inactive',

								'list_title' => esc_html__( 'Ihr Umzugsunternehmen München', 'themesflat-core' ),

								'list_content' => esc_html__( "Herzlich willkommen bei ATU Logistik, Ihrem professionellen Umzugsunternehmen in München. Ob Privatumzug, Büroumzug, Spezialtransport oder Möbeleinlagerung – wir bieten Ihnen einen kompetenten Rundum-Service. Selbstverständlich ohne versteckte Kosten. Holen Sie jetzt Ihr unverbindliches Angebot ein." ),

							],

							[

								'set_active' => 'inactive',

								'list_title' => esc_html__( 'Garantiert günstige Umzugsfirma in München', 'themesflat-core' ),

								'list_content' => esc_html__( "Herzlich willkommen bei ATU Logistik, Ihrem professionellen Umzugsunternehmen in München. Ob Privatumzug, Büroumzug, Spezialtransport oder Möbeleinlagerung – wir bieten Ihnen einen kompetenten Rundum-Service. Selbstverständlich ohne versteckte Kosten. Holen Sie jetzt Ihr unverbindliches Angebot ein." ),

							],

							[

								'set_active' => 'inactive',

								'list_title' => esc_html__( 'Kosten für Umzüge in München', 'themesflat-core' ),

								'list_content' => esc_html__( "Herzlich willkommen bei ATU Logistik, Ihrem professionellen Umzugsunternehmen in München. Ob Privatumzug, Büroumzug, Spezialtransport oder Möbeleinlagerung – wir bieten Ihnen einen kompetenten Rundum-Service. Selbstverständlich ohne versteckte Kosten. Holen Sie jetzt Ihr unverbindliches Angebot ein." ),

							],

							[

								'set_active' => 'inactive',

								'list_title' => esc_html__( 'Planen Sie einen Umzug von oder nach München?', 'themesflat-core' ),

								'list_content' => esc_html__( "Herzlich willkommen bei ATU Logistik, Ihrem professionellen Umzugsunternehmen in München. Ob Privatumzug, Büroumzug, Spezialtransport oder Möbeleinlagerung – wir bieten Ihnen einen kompetenten Rundum-Service. Selbstverständlich ohne versteckte Kosten. Holen Sie jetzt Ihr unverbindliches Angebot ein." ),

							],

						],

						'title_field' => '{{{ list_title }}}',

					]

				);



			$this->end_controls_section();

        // /.End Accordion		



		// Start General Style 

	        $this->start_controls_section( 

	        	'section_style_general',

	            [

	                'label' => esc_html__( 'General', 'themesflat-core' ),

	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

	            ]

	        );



	         $this->add_control(

				'wrap_align',

				[

					'label' => esc_html__( 'Alignment', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::CHOOSE,

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

						],

						'justify' => [

							'title' => esc_html__( 'Justified', 'themesflat-core' ),

							'icon' => 'eicon-text-align-justify',

						],

					],

					'default' => 'left',

					'selectors' => [

						'{{WRAPPER}} .tf-accordion' => 'text-align: {{VALUE}}',

					],

				]

			);

	        

	        $this->end_controls_section();    

	    // /.End General Style



	    // Start Item Style 

	        $this->start_controls_section( 

	        	'section_style_item',

	            [

	                'label' => esc_html__( 'Item', 'themesflat-core' ),

	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

	            ]

	        );



	        $this->add_responsive_control( 

				'item_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'default' => [

						'top' => '0',

						'right' => '0',

						'bottom' => '0',

						'left' => '0',

						'unit' => 'px',

						'isLinked' => false,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_responsive_control( 

				'item_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'default' => [

						'top' => '0',

						'right' => '0',

						'bottom' => '5',

						'left' => '0',

						'unit' => 'px',

						'isLinked' => false,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



			$this->add_control( 'item_background',

				[

					'label' => esc_html__( 'Background Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'background-color: {{VALUE}}',

					],

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Box_Shadow::get_type(),

				[

					'name' => 'item_box_shadow',

					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-accordion .tf-accordion-item',

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Border::get_type(),

				[

					'name' => 'item_border',

					'label' => esc_html__( 'Border', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-accordion .tf-accordion-item',

				]

			);



			$this->add_control( 

				'item_border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px' , 'em' , '%' ],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .tf-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			); 

	        

	        $this->end_controls_section();    

	    // /.End Item Style



        // Start Icon Style 

	        $this->start_controls_section( 

	        	'section_style_icon',

	            [

	                'label' => esc_html__( 'Icon', 'themesflat-core' ),

	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

	            ]

	        );



	        $this->add_responsive_control(

				'icon_size_w',

				[

					'label' => esc_html__( 'Icon Size Width', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 200,

							'step' => 1,

						],

						'%' => [

							'min' => 0,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => 58,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',

						'{{WRAPPER}} .tf-accordion .accordion-title .title-text' => 'width: calc(100% - {{SIZE}}{{UNIT}});',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .title-text' => 'width: calc(100% - 2 * {{SIZE}}{{UNIT}});',

					],

				]

			);



			$this->add_responsive_control(

				'icon_size_h',

				[

					'label' => esc_html__( 'Icon Size Height', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px', '%' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 200,

							'step' => 1,

						],

						'%' => [

							'min' => 0,

							'max' => 100,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => 52,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',

					],

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Border::get_type(),

				[

					'name' => 'icon_border',

					'label' => esc_html__( 'Border', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon',

				]

			);



			$this->add_control( 

				'icon_border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px' , 'em' , '%' ],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			); 



	        $this->add_control(

				'heading_icon_left',

				[

					'label' => esc_html__( 'Icon Left', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

					'condition' => [

	                    'icon_position' => ['icon_before', 'icon_before_after'],

	                ],

				]

			);			



			$this->add_responsive_control(

				'icon_font_size',

				[

					'label' => esc_html__( 'Icon Font Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 100,

							'step' => 1,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => 16,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left' => 'font-size: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'width: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left' => 'font-size: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'width: {{SIZE}}{{UNIT}};',

					],

					'condition' => [

	                    'icon_position' => ['icon_before', 'icon_before_after'],

	                ],

				]

			);			



			$this->start_controls_tabs( 

				'icon_style_accordion', [

						'condition' => [

			                    'icon_position' => ['icon_before', 'icon_before_after'],

		                ], 

	                ]

				);



	        	$this->start_controls_tab( 

	        		'icon_style_normal_accordion',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] );	



	        		$this->add_control( 

						'icon_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#4F5955',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'fill: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'fill: {{VALUE}}',

							]

						]

					); 



					$this->add_control( 

						'icon_background_color',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',

							]

						]

					); 

					

				$this->end_controls_tab();



				$this->start_controls_tab( 

					'icon_style_hover_accordion',

					[

						'label' => esc_html__( 'Active', 'themesflat-core' ),

					] );



					$this->add_control( 

						'icon_color_hover',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#fff',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'fill: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left svg' => 'fill: {{VALUE}}',

							]

						]

					); 



					$this->add_control( 

						'icon_background_color_hover',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',

							]

						]

					);	

										

				$this->end_controls_tab();



			$this->end_controls_tabs();



			$this->add_control(

				'heading_icon_right',

				[

					'label' => esc_html__( 'Icon Right', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

					'condition' => [

	                    'icon_position' => ['icon_after', 'icon_before_after'],

	                ],

				]

			);



			$this->add_responsive_control(

				'icon_font_size_right',

				[

					'label' => esc_html__( 'Icon Font Size', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SLIDER,

					'size_units' => [ 'px' ],

					'range' => [

						'px' => [

							'min' => 0,

							'max' => 100,

							'step' => 1,

						],

					],

					'default' => [

						'unit' => 'px',

						'size' => 16,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'font-size: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'width: {{SIZE}}{{UNIT}};',

					],

					'condition' => [

	                    'icon_position' => ['icon_after', 'icon_before_after'],

	                ],

				]

			);



			$this->start_controls_tabs( 

				'icon_style_right_accordion', [

						'condition' => [

		                    'icon_position' => ['icon_after', 'icon_before_after'],

		                ],

		            ]

				);



	        	$this->start_controls_tab( 

	        		'icon_style_right_normal_accordion',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] );	



	        		$this->add_control( 

						'icon_right_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#4F5955',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'fill: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'fill: {{VALUE}}',

							]

						]

					); 



					$this->add_control( 

						'icon_right_background_color',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',

							]

						]

					); 

					

				$this->end_controls_tab();



				$this->start_controls_tab( 

					'icon_style_right_hover_accordion',

					[

						'label' => esc_html__( 'Active', 'themesflat-core' ),

					] );



					$this->add_control( 

						'icon_right_color_hover',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#fff',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'fill: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right svg' => 'fill: {{VALUE}}',

							]

						]

					); 



					$this->add_control( 

						'icon_right_background_color_hover',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',

								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',

							]

						]

					);	

										

				$this->end_controls_tab();



			$this->end_controls_tabs();

	        

	        $this->end_controls_section();    

	    // /.End Icon Style



	    // Start Title Style 

	        $this->start_controls_section( 

	        	'section_style_title',

	            [

	                'label' => esc_html__( 'Title', 'themesflat-core' ),

	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

	            ]

	        );



			$this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'title_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-accordion .tf-accordion-item .title-text',

				]

			);			 



			$this->add_responsive_control( 

				'title_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'default' => [

						'top' => '16',

						'right' => '20',

						'bottom' => '16',

						'left' => '24',

						'unit' => 'px',

						'isLinked' => false,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title .title-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_responsive_control( 

				'title_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'default' => [

						'top' => '0',

						'right' => '0',

						'bottom' => '0',

						'left' => '0',

						'unit' => 'px',

						'isLinked' => false,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->start_controls_tabs( 

				'title_style_accordion' 

				);



	        	$this->start_controls_tab( 

	        		'title_style_normal_accordion',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] );



					$this->add_control( 'title_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#201630',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title' => 'color: {{VALUE}}',

							],

						]

					);	        		

	        		

					$this->add_control( 'title_background',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title' => 'background-color: {{VALUE}}',

							],

						]

					);



					$this->add_group_control(

						\Elementor\Group_Control_Box_Shadow::get_type(),

						[

							'name' => 'title_box_shadow',

							'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),

							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',

						]

					);



					$this->add_group_control(

						\Elementor\Group_Control_Border::get_type(),

						[

							'name' => 'title_border',

							'label' => esc_html__( 'Border', 'themesflat-core' ),

							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',

						]

					);



					$this->add_control( 

						'title_border_radius',

						[

							'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::DIMENSIONS,

							'size_units' => [ 'px' , 'em' , '%' ],

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

							],

						]

					);	

					

				$this->end_controls_tab();



				$this->start_controls_tab( 

					'title_style_hover_accordion',

					[

						'label' => esc_html__( 'Active', 'themesflat-core' ),

					] );



					$this->add_control( 'title_color_active',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#fff',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'color: {{VALUE}}',

							],

						]

					);	        		

	        		

					$this->add_control( 'title_background_active',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '#34CCFF',

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'background-color: {{VALUE}}',

							],

						]

					);	



					$this->add_group_control(

						\Elementor\Group_Control_Box_Shadow::get_type(),

						[

							'name' => 'title_box_shadow_active',

							'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),

							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title.active',

						]

					);



					$this->add_group_control(

						\Elementor\Group_Control_Border::get_type(),

						[

							'name' => 'title_border_active',

							'label' => esc_html__( 'Border', 'themesflat-core' ),

							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title.active',

						]

					);



					$this->add_control( 

						'title_border_radius_active',

						[

							'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::DIMENSIONS,

							'size_units' => [ 'px' , 'em' , '%' ],

							'selectors' => [

								'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

							],

						]

					);

										

				$this->end_controls_tab();



			$this->end_controls_tabs();

	        

	        $this->end_controls_section();    

	    // /.End Title Style



	    // Start Content Style 

	        $this->start_controls_section( 

	        	'section_style_content',

	            [

	                'label' => esc_html__( 'Content', 'themesflat-core' ),

	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

	            ]

	        );



	        $this->add_control( 'content_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '#777777',

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-content p' => 'color: {{VALUE}}',

					],

				]

			);	        		

    		

			$this->add_control( 'content_background',

				[

					'label' => esc_html__( 'Background Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '#FAFAFA',

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-content' => 'background-color: {{VALUE}}',

					],

				]

			);



	        $this->add_group_control(

				\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'content_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-content p',


				]

			);
	



			$this->add_group_control(

				\Elementor\Group_Control_Box_Shadow::get_type(),

				[

					'name' => 'content_box_shadow',

					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',

				]

			);



			$this->add_group_control(

				\Elementor\Group_Control_Border::get_type(),

				[

					'name' => 'content_border',

					'label' => esc_html__( 'Border', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',

				]

			);



			$this->add_control( 

				'content_border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px' , 'em' , '%' ],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			); 



			$this->add_responsive_control( 

				'content_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'default' => [

						'top' => '24',

						'right' => '24',

						'bottom' => '24',

						'left' => '24',

						'unit' => 'px',

						'isLinked' => false,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->add_responsive_control( 

				'content_margin',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', 'em' ],

					'default' => [

						'top' => '8',

						'right' => '0',

						'bottom' => '0',

						'left' => '0',

						'unit' => 'px',

						'isLinked' => false,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-accordion .accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



	     	$this->end_controls_section(); 

	    // /.End Content Style 

	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();

		

		$accordion_item = $html_title = $icon_title = $icon_accodion_close = $icon_accodion_open = $icon_accodion_right_close = $icon_accodion_right_open = $html_content = $set_active = '';		



		foreach ($settings['accordion_list'] as $key => $value) {





			if ( $settings['icon_style'] == 'icon' ) {

				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_close =  \Elementor\Addon_Elementor_Icon_manager_atu::render_icon( $settings['icon_accodion'] );

				}

				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_right_close =  \Elementor\Addon_Elementor_Icon_manager_atu::render_icon( $settings['icon_accodion_right'] );

				}



				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_open =  \Elementor\Addon_Elementor_Icon_manager_atu::render_icon( $settings['icon_accodion_active'] );

				}

				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_right_open =  \Elementor\Addon_Elementor_Icon_manager_atu::render_icon( $settings['icon_accodion_right_active'] );

				}



			} else if( $settings['icon_style'] == 'image' ) {

				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_close = sprintf( '<img src="%1$s" class="lazyload" alt=""/>', $settings['image_accodion']['url'] ); 

				}

				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_right_close = sprintf( '<img src="%1$s" class="lazyload" alt=""/>', $settings['image_accodion_right']['url'] );

				}



				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_open = sprintf( '<img src="%1$s" class="lazyload" alt=""/>', $settings['image_accodion_active']['url'] ); 

				} 

				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {

					$icon_accodion_right_open = sprintf( '<img src="%1$s" class="lazyload" alt=""/>', $settings['image_accodion_right_active']['url'] );

				}

			}



			if ( $settings['icon_style'] != 'none' ) {

				$icon_title = sprintf('		

				<span class="wrap-accordion-icon wrap-accordion-icon-left">		

				<span class="accordion-icon accordion-icon-close">%1$s</span>

				<span class="accordion-icon accordion-icon-open">%2$s</span>

				</span>'

				, $icon_accodion_close, $icon_accodion_open );



				$icon_title_right = sprintf('		

				<span class="wrap-accordion-icon wrap-accordion-icon-right">		

				<span class="accordion-icon accordion-icon-close">%1$s</span>

				<span class="accordion-icon accordion-icon-open">%2$s</span>

				</span>'

				, $icon_accodion_right_close, $icon_accodion_right_open );

			}



			if ($value['list_title'] != '') {

				if ($settings['icon_position'] == 'icon_before_after') {

					$html_title = sprintf('<div class="accordion-title %4$s %5$s">%2$s <span class="title-text">%1$s</span> %3$s</div>', $value['list_title'], $icon_title, $icon_title_right, $settings['icon_position'], $value['set_active']);

				}else if ($settings['icon_position'] == 'icon_before') {

					$html_title = sprintf('<div class="accordion-title %3$s %4$s">%2$s <span class="title-text">%1$s</span></div>', $value['list_title'], $icon_title, $settings['icon_position'], $value['set_active']);

				}else{

					$html_title = sprintf('<div class="accordion-title %3$s %4$s"><span class="title-text">%1$s</span> %2$s</div>', $value['list_title'], $icon_title_right, $settings['icon_position'], $value['set_active']);

				}

				

			}





			

			$html_content = sprintf('<div class="accordion-content">%1$s</div>', do_shortcode( $value['list_content'] ));



			$accordion_item .= sprintf('<div class="tf-accordion-item %3$s">%1$s %2$s</div>', $html_title, $html_content, $value['set_active']);

		}





		echo sprintf ( 

			'<div class="tf-accordion"> 

				%1$s

            </div>',

            $accordion_item

        );

	}	



}