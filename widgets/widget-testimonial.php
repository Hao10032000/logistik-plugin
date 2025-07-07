<?php
class TFTestimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tf-testimonial';
    }

    public function get_title() {
        return esc_html__( 'TF Testimonials', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['swiper-css'];
	}

    public function get_script_depends() {
        return ['swiper-js','tf-testimonial'];
    }

    protected function register_controls() {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'image', [
            'label' => esc_html__( 'Image', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
        ] );

        $repeater->add_control( 'name', [
            'label' => esc_html__( 'Name', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Markus Seefeld', 'themesflat-core' ),
        ] );

        $repeater->add_control( 'position', [
            'label' => esc_html__( 'Position', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Privatumzug | München – Poing', 'themesflat-core' ),
        ] );

        $repeater->add_control( 'description', [
            'label' => esc_html__( 'Description', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__( 'Mein Umzugstag hat super geklappt...', 'themesflat-core' ),
        ] );

        $repeater->add_control( 'rating', [
            'label' => esc_html__( 'Rating', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 5,
            'step' => 0.1,
            'default' => 4.7,
        ] );

        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Testimonials', 'themesflat-core' ),
        ] );

        $this->add_control( 'list', [
            'label' => esc_html__( 'Testimonial Items', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ name }}}',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'style_testimonial', [
        'label' => esc_html__( 'Testimonial', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_control( 'testimonial_bg', [
        'label' => esc_html__( 'Background', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};',
        ],
    ] );

    $this->add_responsive_control( 'testimonial_padding', [
        'label' => esc_html__( 'Padding', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ] );

    $this->add_responsive_control( 'testimonial_radius', [
        'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ] );

    $this->end_controls_section();

    // SECTION: Image
    $this->start_controls_section( 'style_image', [
        'label' => esc_html__( 'Image', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_responsive_control( 'image_width', [
        'label' => esc_html__( 'Width', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [ 'px' => [ 'min' => 10, 'max' => 200 ] ],
        'selectors' => [
            '{{WRAPPER}} .testimonial-avatar img' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ] );

    $this->add_responsive_control( 'image_height', [
        'label' => esc_html__( 'Height', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [ 'px' => [ 'min' => 10, 'max' => 200 ] ],
        'selectors' => [
            '{{WRAPPER}} .testimonial-avatar img' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ] );

    $this->add_control( 'image_radius', [
        'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .testimonial-avatar img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ] );

    $this->end_controls_section();

    // SECTION: Description
    $this->start_controls_section( 'style_description', [
        'label' => esc_html__( 'Description', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
        'name' => 'desc_typo',
        'selector' => '{{WRAPPER}} .testimonial-card .description',
    ] );

    $this->add_control( 'desc_color', [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .description' => 'color: {{VALUE}};',
        ],
    ] );

    $this->add_responsive_control( 'desc_margin', [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ] );

    $this->end_controls_section();

    // SECTION: Name
    $this->start_controls_section( 'style_name', [
        'label' => esc_html__( 'Name', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
        'name' => 'name_typo',
        'selector' => '{{WRAPPER}} .testimonial-card .name',
    ] );

    $this->add_control( 'name_color', [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .name' => 'color: {{VALUE}};',
        ],
    ] );

    $this->add_responsive_control( 'name_margin', [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ] );

    $this->end_controls_section();

    // SECTION: Position
    $this->start_controls_section( 'style_position', [
        'label' => esc_html__( 'Position', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
        'name' => 'position_typo',
        'selector' => '{{WRAPPER}} .testimonial-card .position',
    ] );

    $this->add_control( 'position_color', [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .position' => 'color: {{VALUE}};',
        ],
    ] );

    $this->add_responsive_control( 'position_margin', [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ] );

    $this->end_controls_section();

    // SECTION: Rating
    $this->start_controls_section( 'style_rating', [
        'label' => esc_html__( 'Rating', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_control( 'rating_text_color', [
        'label' => esc_html__( 'Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .rating-box .rating' => 'color: {{VALUE}};',
        ],
    ] );

    $this->add_control( 'rating_bg_color', [
        'label' => esc_html__( 'Background', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .rating-box' => 'background-color: {{VALUE}};',
        ],
    ] );

    $this->add_control( 'rating_icon_color', [
        'label' => esc_html__( 'Star Icon Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .rating-box .star' => 'color: {{VALUE}};',
        ],
    ] );

    $this->end_controls_section();

    // SECTION: Info Box Background
    $this->start_controls_section( 'style_info_box', [
        'label' => esc_html__( 'Background Infor', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ] );

    $this->add_control( 'info_box_bg', [
        'label' => esc_html__( 'Background', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .testimonial-card .info-box,
            {{WRAPPER}} .testimonial-card .info-box::before' => 'background-color: {{VALUE}};',
        ],
    ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $total = count($settings['list']);
        ?>
        <div class="testimonial-slider-section">
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['list'] as $item ) : ?>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <?php if ( ! empty( $item['image']['url'] ) ) : ?>
                                    <div class="testimonial-avatar">
                                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                                    </div>
                                <?php endif; ?>
                                <p class="description"><?php echo esc_html( $item['description'] ); ?></p>
                                <div class="testimonial-footer">
                                    <div class="info-box">
                                        <div class="info-text">
                                            <h5 class="name"><?php echo esc_html( $item['name'] ); ?></h5>
                                            <span class="position"><?php echo esc_html( $item['position'] ); ?></span>
                                        </div>
                                        <div class="rating-box">
                                            <span class="rating"><?php echo esc_html( $item['rating'] ); ?></span>
                                            <span class="star">★</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="testimonial-pagination-bar">
                <span class="page-current">01</span>
                <div class="pagination-lines">
                    <?php for ( $i = 0; $i < $total; $i++ ) : ?>
                        <div class="pagination-line<?php echo $i === 0 ? ' active' : ''; ?>" data-index="<?php echo $i; ?>"></div>
                    <?php endfor; ?>
                </div>
                <span class="page-total"><?php echo str_pad($total, 2, '0', STR_PAD_LEFT); ?></span>
            </div>
        </div>

        <?php
        

    }
}
