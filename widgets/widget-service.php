<?php

class TFService_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-service';

    }

    

    public function get_title() {

        return esc_html__( 'TF Service', 'themesflat-addons' );

    }



    public function get_icon() {

        return 'eicon-posts-grid';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



	public function get_style_depends(){

		return ['owl-carousel','tf-service'];

	}



	public function get_script_depends() {

		return ['owl-carousel','tf-service'];

	}



	protected function register_controls() {

        // Start Posts Query        

			$this->start_controls_section( 

				'section_posts_query',

	            [

	                'label' => esc_html__('Query', 'themesflat-addons'),

	            ]

	        );



	        $this->add_control( 

					'posts_per_page',

		            [

		                'label' => esc_html__( 'Posts Per Page', 'themesflat-addons' ),

		                'type' => \Elementor\Controls_Manager::NUMBER,

		                'default' => '6',

		            ]

		        );



		        $this->add_control( 

		        	'order_by',

					[

						'label' => esc_html__( 'Order By', 'themesflat-addons' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'date',

						'options' => [						

				            'date' => 'Date',

				            'ID' => 'Post ID',			            

				            'title' => 'Title',

						],

					]

				);



				$this->add_control( 

					'order',

					[

						'label' => esc_html__( 'Order', 'themesflat-addons' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'desc',

						'options' => [						

				            'desc' => 'Descending',

				            'asc' => 'Ascending',	

						],

					]

				);




				$this->add_control( 

					'exclude',

					[

						'label' => esc_html__( 'Exclude', 'themesflat-addons' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-addons' ),

						'default' => '',

						'label_block' => true,				

					]

				);



				$this->add_control( 

					'sort_by_id',

					[

						'label' => esc_html__( 'Sort By ID', 'themesflat-addons' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-addons' ),

						'default' => '',

						'label_block' => true,				

					]

				);



				$this->add_group_control( 

					\Elementor\Group_Control_Image_Size::get_type(),
					[

						'name' => 'thumbnail',
						'default' => 'service-size',

					]

				);



				$this->add_control( 

		        	'layout',

					[

						'label' => esc_html__( 'Columns', 'themesflat-addons' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'column-4',

						'options' => [

							'column-1' => esc_html__( '1', 'themesflat-addons' ),

							'column-2' => esc_html__( '2', 'themesflat-addons' ),

							'column-3' => esc_html__( '3', 'themesflat-addons' ),

							'column-4' => esc_html__( '4', 'themesflat-addons' ),

						],

					]

				);	
				$this->add_control( 
					'posts_layout_tablet',
					[
						'label' => esc_html__( 'Columns Tablet', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'tablet-column-2',
						'options' => [
							'tablet-column-1' => esc_html__( '1', 'themesflat-addons' ),
							'tablet-column-2' => esc_html__( '2', 'themesflat-addons' ),
							'tablet-column-3' => esc_html__( '3', 'themesflat-addons' ),
						],
						
					]
				);
	
				$this->add_control( 
					'posts_layout_mobile',
					[
						'label' => esc_html__( 'Columns Mobile', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'mobile-column-1',
						'options' => [
							'mobile-column-1' => esc_html__( '1', 'themesflat-addons' ),
							'mobile-column-2' => esc_html__( '2', 'themesflat-addons' ),
						],
						
					]
				);


				$this->add_control( 

					'show_exc',

					[

						'label' => esc_html__( 'Show Description', 'themesflat-addons' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Show', 'themesflat-addons' ),

						'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),

						'return_value' => 'yes',

						'default' => 'yes',

					]

				);

				






				$this->add_control( 

					'show_button',

					[

						'label' => esc_html__( 'Show Button', 'themesflat-addons' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Show', 'themesflat-addons' ),

						'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),

						'return_value' => 'yes',

						'default' => 'yes',

					]

				);



				$this->add_control( 

					'button_text',

					[

						'label' => esc_html__( 'Button Text', 'themesflat-addons' ),

						'type' => \Elementor\Controls_Manager::TEXT,

						'default' => esc_html__( 'mehr erfahren', 'themesflat-addons' ),

						'condition' => [

							'show_button'	=> 'yes',

						],

					]

				);	




			$this->end_controls_section();

        // /.End Posts Query

// Start Carousel        

$this->start_controls_section( 

	'section_posts_carousel',

	[

		'label' => esc_html__('Carousel', 'themesflat-addons'),

		

	]

);	



$this->add_control( 

	'carousel',

	[

		'label' => esc_html__( 'Carousel', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'On', 'themesflat-addons' ),

		'label_off' => esc_html__( 'Off', 'themesflat-addons' ),

		'return_value' => 'yes',

		'default' => 'yes',
	]

);

$this->add_control( 

	'carousel_column_desk',

	[

		'label' => esc_html__( 'Columns Desktop', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '4',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-addons' ),

			'2' => esc_html__( '2', 'themesflat-addons' ),

			'3' => esc_html__( '3', 'themesflat-addons' ),

			'4' => esc_html__( '4', 'themesflat-addons' ),

			'5' => esc_html__( '5', 'themesflat-addons' ),

			'6' => esc_html__( '6', 'themesflat-addons' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);



$this->add_control( 

	'carousel_column_tablet',

	[

		'label' => esc_html__( 'Columns Tablet', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '2',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-addons' ),

			'2' => esc_html__( '2', 'themesflat-addons' ),

			'3' => esc_html__( '3', 'themesflat-addons' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);



$this->add_control( 

	'carousel_column_mobile',

	[

		'label' => esc_html__( 'Columns Mobile', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '1',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-addons' ),

			'2' => esc_html__( '2', 'themesflat-addons' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);	

$this->add_control(

	'carousel_spacer',

	[

		'label' => esc_html__( 'Spacer', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::NUMBER,

		'min' => 0,

		'max' => 100,

		'step' => 1,

		'default' => 48,
		
		'condition' => [

			'carousel' => 'yes',

		],				

	]

);	

$this->add_control( 

	'arrow',

	[

		'label' => esc_html__( 'Arrow', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'On', 'themesflat-addons' ),

		'label_off' => esc_html__( 'Off', 'themesflat-addons' ),

		'return_value' => 'yes',

		'default' => 'no',
		
		'condition' => [

			'carousel' => 'yes',

		],
	]

);

$this->add_control( 

	'bullets',

	[

		'label' => esc_html__( 'Bullets', 'themesflat-addons' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'On', 'themesflat-addons' ),

		'label_off' => esc_html__( 'Off', 'themesflat-addons' ),

		'return_value' => 'yes',

		'default' => 'yes',
		
		'condition' => [

			'carousel' => 'yes',

		],
	]

);

$this->end_controls_section();



// /.End Carousel


		// Start General Style 

			$this->start_controls_section( 

				'section_style_general',

				[

					'label' => esc_html__( 'General', 'themesflat-addons' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_responsive_control( 

				'padding',

				[

					'label' => esc_html__( 'Padding Spacing', 'themesflat-addons' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],		
					
				]

			);	



			$this->add_responsive_control( 

				'margin',

				[

					'label' => esc_html__( 'Margin Spacing', 'themesflat-addons' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'allowed_dimensions' => [ 'right', 'left' ],

					'default' => [

						'right' => '',

						'left' => '',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .tf-services-wrap .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],


				]

			);  




			$this->add_responsive_control( 

				'margin_inner',

				[

					'label' => esc_html__( 'Margin Inner', 'themesflat-addons' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .tf-services-wrap .item .services-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);


		


			$this->end_controls_section();    

		// /.End General Style



		// Start Title Style 

			$this->start_controls_section( 

				'section_style_title',

				[

					'label' => esc_html__( 'Title', 'themesflat-addons' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography',

					'label' => esc_html__( 'Typography', 'themesflat-addons' ),

					'selector' => '{{WRAPPER}} .tf-services-wrap .blog-post .title',

				]

			); 



			$this->add_responsive_control( 

				'margin_title',

				[

					'label' => esc_html__( 'Margin', 'themesflat-addons' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .tf-services-wrap .blog-post .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  	



			$this->start_controls_tabs( 

				'background_title_tabs',

				);

				$this->start_controls_tab( 

					'title_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-addons' ),

					] ); 

					$this->add_control( 

						'title_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-addons' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-services-wrap .services-post .title a,
								 {{WRAPPER}} .tf-services-wrap .title,
								 {{WRAPPER}} .tf-services-wrap .blog-post .title a' => 'color: {{VALUE}}',

							],

							

							

						]

					); 
					$this->add_control( 

						'title_color_cative',

						[

							'label' => esc_html__( 'Color Active', 'themesflat-addons' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-services-wrap .wrap-services-post .item.active .title' => 'color: {{VALUE}}',

							],
							
					'condition' => [

						'style'	=> 'style4',
			
					],

							

							

						]

					);  
 



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'title_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-addons' ),

					] );



					$this->add_control( 

						'title_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-services-wrap  .services-post  .title a:hover,
								{{WRAPPER}} .tf-services-wrap  .services-post  .title:hover,
								{{WRAPPER}} .tf-services-wrap .blog-post .title a:hover' => 'color: {{VALUE}}',

							],

						]

					);   



					

				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			

			$this->end_controls_section();    

		// /.End Title Style



		// Start Description Style 

			$this->start_controls_section( 

				'section_style_desc',

				[

					'label' => esc_html__( 'Description', 'themesflat-addons' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

					'condition' => [

						'style!'	=> 'style1',
			
					],

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_desc',

					'label' => esc_html__( 'Typography', 'themesflat-addons' ),

					'selector' => '{{WRAPPER}} .tf-services-wrap  .services-post .description,
					               {{WRAPPER}} .tf-services-wrap .blog-post .description',

				]

			);



			$this->add_control( 

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-addons' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .tf-services-wrap  .services-post .description,
						 {{WRAPPER}} .tf-services-wrap .blog-post .description' => 'color: {{VALUE}}',

					],

					

				]

			); 



			$this->add_responsive_control( 

				'margin_desc',

				[

					'label' => esc_html__( 'Margin', 'themesflat-addons' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .tf-services-wrap  .services-post .description,
						 {{WRAPPER}} .tf-services-wrap .blog-post .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



		

			

			$this->end_controls_section();    

		// /.End Description Style

		// Start category Style 

		$this->start_controls_section( 

			'section_style_cate',

			[

				'label' => esc_html__( 'Category', 'themesflat-addons' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				
				'condition' => [

					'style'	=> 'style1',
					'style'	=> 'style5',
		
				],

			]

		);	



		$this->add_group_control( 

			\Elementor\Group_Control_Typography::get_type(),

			[

				'name' => 'typography_cate',

				'label' => esc_html__( 'Typography', 'themesflat-addons' ),

				'selector' => '{{WRAPPER}} .tf-services-wrap  .services-post .category-service a,
				               {{WRAPPER}} .tf-services-wrap .blog-post .meta-date',

			]

		);



		$this->add_control( 

			'cate_color',

			[

				'label' => esc_html__( 'Color', 'themesflat-addons' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .tf-services-wrap  .services-post .category-service a,
					{{WRAPPER}} .tf-services-wrap  .services-post .category-service,
					{{WRAPPER}} .tf-services-wrap .blog-post .meta-date,
					{{WRAPPER}} .tf-services-wrap .blog-post .meta-date i' => 'color: {{VALUE}}',

				],

				

			]

		); 



		$this->add_responsive_control( 

			'margin_cate',

			[

				'label' => esc_html__( 'Margin', 'themesflat-addons' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .tf-services-wrap  .services-post .category-service,
					 {{WRAPPER}} .tf-services-wrap .blog-post .meta-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);  



	

		

		$this->end_controls_section();    

	// /.End Description Style



		// Start Button Style 

			$this->start_controls_section( 

				'section_style_btn',

				[

					'label' => esc_html__( 'Button', 'themesflat-addons' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

					'condition' => [

						'style!'	=> 'style1',
			
					],

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_button',

					'label' => esc_html__( 'Typography', 'themesflat-addons' ),

					'selector' => '{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a,
					               {{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a i, 
								   {{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a .read ,

								   {{WRAPPER}} .tf-services-wrap .blog-post .tf-button span,
					               {{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container a i, 
								   {{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container a .read',
								   

				]

			);



			$this->start_controls_tabs( 

				'background_button_tabs',

				);

				$this->start_controls_tab( 

					'button_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-addons' ),

					] ); 

					$this->add_control( 

						'button_color_a',

						[

							'label' => esc_html__( 'Color', 'themesflat-addons' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a , 
								 {{WRAPPER}} .tf-services-wrap .services-post .tf-button-container a i,
								 {{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container a , 
								 {{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container a i' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-services-wrap .blog-post .tf-button span::after,
								{{WRAPPER}} .tf-services-wrap .blog-post .tf-button span::after' => 'background-color: {{VALUE}}',

							],

							

						]

					);  



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'social_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-addons' ),

					] );





					$this->add_control( 

						'button_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [
								'{{WRAPPER}} .tf-services-wrap .services-post .tf-button-container .tf-button:hover span, 
								 {{WRAPPER}}  .tf-services-wrap .services-post .tf-button-container .tf-button:hover i,
								 {{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container .tf-button:hover span, 
								 {{WRAPPER}}  .tf-services-wrap .blog-post .tf-button-container .tf-button:hover i' => 'color: {{VALUE}}',

								'{{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container .tf-button:hover span::after,
								 {{WRAPPER}} .tf-services-wrap .blog-post .tf-button-container .tf-button:hover span::after' => 'background-color: {{VALUE}}',
							],

							

						]

					);   



				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			



			

			$this->end_controls_section();    

		// /.End Button Style

	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();


		$has_carousel = 'no-carousel';

		if ( $settings['carousel'] == 'yes' ) {

			$has_carousel = 'has-carousel';

		}


		$this->add_render_attribute( 'tf_services_wrap', ['class' => ['tf-services-wrap', 'themesflat-services-taxonomy', $has_carousel ], 'data-tabid' => $this->get_id()] );





		if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'service',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );
       

        if ( ! empty( $settings['exclude'] ) ) {				

			if ( ! is_array( $settings['exclude'] ) )

				$exclude = explode( ',', $settings['exclude'] );



			$query_args['post__not_in'] = $exclude;

		}



		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];



		if ( $settings['sort_by_id'] != '' ) {	

			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );

			$query_args['post__in'] = $sort_by_id;

			$query_args['orderby'] = 'post__in';

		}



		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) : ?>

<div <?php echo $this->get_render_attribute_string('tf_services_wrap'); ?>
    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"
    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"
    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"
    data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="icon-cerax-left"
    data-next_icon="icon-cerax-right" data-arrow="<?php echo esc_attr($settings['arrow']);?>" data-bullets="<?php echo esc_attr($settings['bullets']);?>">


    <div class="wrap-services-post service-container row <?php echo esc_attr($settings['layout']); ?> <?php echo esc_attr($settings['posts_layout_tablet']); ?> <?php echo esc_attr($settings['posts_layout_mobile']); ?> ">

        <?php if ( $settings['carousel'] == 'yes' ): ?>
        	<div class="owl-carousel">
        <?php endif; ?>

            <?php $count=1; while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="item">				
                    <div class="services-post">

                    <?php if ( has_post_thumbnail() ): ?>
                        <div class="featured-post">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php 
                            $get_id_post_thumbnail = get_post_thumbnail_id();
                			echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
                            ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    
                        <div class="content"> 
                            <h3 class="title">
                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h3>
                            <?php if ( $settings['show_exc'] == 'yes' ): ?>
                                <p class="description"><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                            <?php if ( $settings['show_button'] == 'yes' ): ?>

							<a href="<?php echo get_the_permalink(); ?>" class="tf-btn-service">
								<?php echo esc_html($settings['button_text']); ?>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM12 20.25C10.3683 20.25 8.77326 19.7661 7.41655 18.8596C6.05984 17.9531 5.00242 16.6646 4.378 15.1571C3.75358 13.6496 3.5902 11.9908 3.90853 10.3905C4.22685 8.79016 5.01259 7.32015 6.16637 6.16637C7.32016 5.01259 8.79017 4.22685 10.3905 3.90852C11.9909 3.59019 13.6497 3.75357 15.1571 4.37799C16.6646 5.00242 17.9531 6.05984 18.8596 7.41655C19.7661 8.77325 20.25 10.3683 20.25 12C20.2475 14.1873 19.3775 16.2843 17.8309 17.8309C16.2843 19.3775 14.1873 20.2475 12 20.25ZM16.2806 11.4694C16.3504 11.539 16.4057 11.6217 16.4434 11.7128C16.4812 11.8038 16.5006 11.9014 16.5006 12C16.5006 12.0986 16.4812 12.1962 16.4434 12.2872C16.4057 12.3783 16.3504 12.461 16.2806 12.5306L13.2806 15.5306C13.1399 15.6714 12.949 15.7504 12.75 15.7504C12.551 15.7504 12.3601 15.6714 12.2194 15.5306C12.0786 15.3899 11.9996 15.199 11.9996 15C11.9996 14.801 12.0786 14.6101 12.2194 14.4694L13.9397 12.75H8.25C8.05109 12.75 7.86033 12.671 7.71967 12.5303C7.57902 12.3897 7.5 12.1989 7.5 12C7.5 11.8011 7.57902 11.6103 7.71967 11.4697C7.86033 11.329 8.05109 11.25 8.25 11.25H13.9397L12.2194 9.53063C12.0786 9.38989 11.9996 9.19902 11.9996 9C11.9996 8.80098 12.0786 8.61011 12.2194 8.46937C12.3601 8.32864 12.551 8.24958 12.75 8.24958C12.949 8.24958 13.1399 8.32864 13.2806 8.46937L16.2806 11.4694Z" fill="currentColor"/>
								</svg>
							</a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            


            <?php $count++; endwhile; ?>
			
        <?php if ( $settings['carousel'] == 'yes' ): ?>

			</div>
			<div class="pagination-wrapper"><div class="owl-dots"></div></div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>


</div>

<?php

		else:

			esc_html_e('No posts found', 'themesflat-addons');

		endif;

			

	}	



}