<?php
class TFTitleDescription_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-title-desc';
    }
    
    public function get_title() {
        return esc_html__( 'TF Title Section', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
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
				'heading',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Umzugsservices', 'themesflat-core' ),
					'label_block' => true,
				]
			);

            $this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,					
					'default' => esc_html__( 'ATU Logistik GmbH bietet Ihnen vielfältigste Transportleistungen – vom Komplett-Umzug bis hin zu individuellen Einzelleistungen. Bei uns trifft Sorgfalt auf technisches Know-how. Zudem verfügen wir über spezielle Transporthilfen wie luftgefederte LKWs mit Laderaumheizung und Treppenlifte. Sowohl Kunsttransporte & Antiquitäten als auch Klaviertransporte liegen bei uns in sicheren Händen.', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->end_controls_section();
        // /.End List Setting              

			 // Start Style
			 $this->start_controls_section( 'section_style',
			 [
				 'label' => esc_html__( 'Style', 'themesflat-core' ),
				 'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			 ]
		 );	

		 $this->add_control(
			 'h_title',
			 [
				 'label' => esc_html__( 'Title', 'themesflat-core' ),
				 'type' => \Elementor\Controls_Manager::HEADING,
				 'separator' => 'before',
			 ]
		 );	

		 $this->add_group_control( 
			 \Elementor\Group_Control_Typography::get_type(),
			 [
				 'name' => 'typography_title',
				 'label' => esc_html__( 'Typography', 'themesflat-core' ),
				 'selector' => '{{WRAPPER}} .title-list h3',
			 ]
		 ); 

		 $this->add_control( 
			 'subtitle_color',
			 [
				 'label' => esc_html__( 'Color', 'themesflat-core' ),
				 'type' => \Elementor\Controls_Manager::COLOR,
				 'selectors' => [
					 '{{WRAPPER}} .title-list h3' => 'color: {{VALUE}}',					
					 '{{WRAPPER}} .title-list h3 path' => 'fill: {{VALUE}}',					
				 ],
			 ]
		 );			


         $this->add_control(
            'h_desc',
            [
                'label' => esc_html__( 'Description', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );	

        $this->add_group_control( 
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'label' => esc_html__( 'Typography', 'themesflat-core' ),
                'selector' => '{{WRAPPER}} .title-list .description',
            ]
        ); 

        $this->add_control( 
            'desc_color',
            [
                'label' => esc_html__( 'Color', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-list .description' => 'color: {{VALUE}}',					
                ],
            ]
        );	

        $this->add_responsive_control(
			'desc_list_padding_desc',
			[
				'label' => esc_html__( 'Padding', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .title-list .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
				 
		 $this->end_controls_section();    
	 // /.End Style 

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
        ?>
        <div class="title-list">
            <h3><?php echo $settings['heading']; ?></h3>
            <?php echo sprintf( '<div class="description">%1$s</div>', $settings['description'] ); ?>
        </div>
        
        <?php
}

}