<?php
class TFSlider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-slider';
    }
    
    public function get_title() {
        return esc_html__( 'TF Slider', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['swiper-css','tf-slider'];
	}

    public function get_script_depends() {
		return ['swiper-js','tf-slider'];
	}

	protected function register_controls() {
    $this->start_controls_section(
        'slider_section',
        [
            'label' => esc_html__( 'Slider Items', 'themesflat-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'background_image',
        [
            'label' => esc_html__( 'Background Image', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $repeater->add_control(
        'slider_title',
        [
            'label' => esc_html__( 'Slider Title', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Default Title', 'themesflat-core' ),
            'label_block' => true,
        ]
    );

    $repeater->add_control(
        'slider_description',
        [
            'label' => esc_html__( 'Description', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__( 'Default description...', 'themesflat-core' ),
            'label_block' => true,
        ]
    );

    $repeater->add_control(
        'slider_button_text',
        [
            'label' => esc_html__( 'Button Text', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Learn More', 'themesflat-core' ),
        ]
    );

    $repeater->add_control(
        'slider_button_link',
        [
            'label' => esc_html__( 'Button Link', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => 'https://your-link.com',
            'default' => [
                'url' => '#',
            ],
        ]
    );

    $repeater->add_control(
        'slider_image_shape',
        [
            'label' => esc_html__( 'Image Shape (Phone, Shape...)', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $repeater->add_control(
    'dot_icon_type',
    [
        'label' => esc_html__( 'Dot Icon Type', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'image' => [
                'title' => esc_html__( 'Image', 'themesflat-core' ),
                'icon' => 'eicon-image-bold',
            ],
            'icon' => [
                'title' => esc_html__( 'Icon', 'themesflat-core' ),
                'icon' => 'eicon-star',
            ],
        ],
        'default' => 'image',
        'toggle' => false,
    ]
);

$repeater->add_control(
    'dot_icon_image',
    [
        'label' => esc_html__( 'Dot Image', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
            'dot_icon_type' => 'image',
        ],
    ]
);

$repeater->add_control(
    'dot_icon_svg',
    [
        'label' => esc_html__( 'Dot Icon', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'fas fa-circle',
            'library' => 'fa-solid',
        ],
        'condition' => [
            'dot_icon_type' => 'icon',
        ],
    ]
);


    $repeater->add_control(
        'dot_title',
        [
            'label' => esc_html__( 'Dot Title', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Slide Title', 'themesflat-core' ),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'slider_items',
        [
            'label' => esc_html__( 'Slides', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'slider_title' => 'Slide 1',
                    'dot_title' => 'Slide 1',
                ],
                [
                    'slider_title' => 'Slide 2',
                    'dot_title' => 'Slide 2',
                ],
            ],
            'title_field' => '{{{ slider_title }}}',
        ]
    );

    $this->end_controls_section();


    $this->start_controls_section(
    'slider_style_section',
    [
        'label' => esc_html__( 'Slider Styling', 'themesflat-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

// 👉 Height
$this->add_responsive_control(
    'slider_height',
    [
        'label' => esc_html__( 'Slider Height', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px', 'vh' ],
        'range' => [
            'px' => [ 'min' => 300, 'max' => 2000 ],
            'vh' => [ 'min' => 20, 'max' => 100 ],
        ],
        'default' => [ 'unit' => 'px', 'size' => 800 ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// 👉 Content Padding
$this->add_responsive_control(
    'slider_content_padding',
    [
        'label' => esc_html__( 'Content Padding', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// 👉 Slider Title
$this->add_control(
    'slider_title_heading',
    [
        'label' => esc_html__( 'Slider Title', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'slider_title_typography',
        'selector' => '{{WRAPPER}} .logistik-slider .slide-text h2',
    ]
);

$this->add_control(
    'slider_title_color',
    [
        'label' => esc_html__( 'Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-text h2' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_title_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-text h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// 👉 Slider Description
$this->add_control(
    'slider_description_heading',
    [
        'label' => esc_html__( 'Slider Description', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'slider_desc_typography',
        'selector' => '{{WRAPPER}} .logistik-slider .slide-text p',
    ]
);

$this->add_control(
    'slider_desc_color',
    [
        'label' => esc_html__( 'Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-text p' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_desc_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// 👉 Slider Button Text
$this->add_control(
    'slider_button_heading',
    [
        'label' => esc_html__( 'Slider Button', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'slider_button_typography',
        'selector' => '{{WRAPPER}} .logistik-slider .logistik-slider .slider-btn',
    ]
);

$this->add_control(
    'slider_button_color',
    [
        'label' => esc_html__( 'Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .logistik-slider .slider-btn' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_button_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .logistik-slider .slider-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_button_padding',
    [
        'label' => esc_html__( 'Padding', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .logistik-slider .slider-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name' => 'slider_button_background',
        'selector' => '{{WRAPPER}} .logistik-slider .logistik-slider .slider-btn',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'slider_button_border',
        'selector' => '{{WRAPPER}} .logistik-slider .slider-btn',
    ]
);

$this->add_responsive_control(
    'slider_button_radius',
    [
        'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slider-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// 👉 Hover Styles
$this->start_controls_tab(
    'slider_button_hover_tab',
    [
        'label' => esc_html__( 'Hover', 'themesflat-core' ),
    ]
);

$this->add_control(
    'slider_button_hover_color',
    [
        'label' => esc_html__( 'Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slider-btn:hover' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name' => 'slider_button_hover_background',
        'selector' => '{{WRAPPER}} .logistik-slider .slider-btn:hover',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'slider_button_hover_border',
        'selector' => '{{WRAPPER}} .logistik-slider .slider-btn:hover',
    ]
);

$this->end_controls_tab();

// 👉 Image Shape
$this->add_control(
    'slider_image_shape_heading',
    [
        'label' => esc_html__( 'Image Shape', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_responsive_control(
    'slider_shape_width',
    [
        'label' => esc_html__( 'Width', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [ 'px' => [ 'min' => 50, 'max' => 1000 ] ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-shape img' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_shape_height',
    [
        'label' => esc_html__( 'Height', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [ 'px' => [ 'min' => 50, 'max' => 1000 ] ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-shape img' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_shape_offset_x',
    [
        'label' => esc_html__( 'Offset X (Right)', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [ 'px' => [ 'min' => -500, 'max' => 500 ] ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-shape' => 'right: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'slider_shape_offset_y',
    [
        'label' => esc_html__( 'Offset Y (Bottom)', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [ 'px' => [ 'min' => -500, 'max' => 500 ] ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .slide-shape' => 'bottom: {{SIZE}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'dot_icon_style_section',
    [
        'label' => esc_html__( 'Dot Icon', 'themesflat-core' ),
       'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

// 👉 Icon Font Size
$this->add_responsive_control(
    'dot_icon_font_size',
    [
        'label' => esc_html__( 'Icon Font Size', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [ 'min' => 10, 'max' => 100 ],
        ],
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .swiper-custom-dot svg, {{WRAPPER}} .logistik-slider .swiper-custom-dot img, {{WRAPPER}} .logistik-slider .swiper-custom-dot i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// 👉 Title Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'dot_title_typography',
        'selector' => '{{WRAPPER}} .logistik-slider .swiper-custom-dot',
    ]
);

// 👉 Title Color (Normal)
$this->add_control(
    'dot_title_color',
    [
        'label' => esc_html__( 'Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .swiper-custom-dot,
             {{WRAPPER}} .logistik-slider .swiper-custom-dot svg,
             {{WRAPPER}} .logistik-slider .swiper-custom-dot i,
             {{WRAPPER}} .logistik-slider .swiper-custom-dot img' => 'color: {{VALUE}};',
        ],
    ]
);

// 👉 Dot Background (Normal)
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name' => 'dot_background',
        'selector' => '{{WRAPPER}} .logistik-slider .swiper-custom-dot',
    ]
);

// 👉 Border (Normal)
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'dot_border',
        'selector' => '{{WRAPPER}} .logistik-slider .swiper-custom-dot',
    ]
);

// 👉 Border Radius
$this->add_responsive_control(
    'dot_border_radius',
    [
        'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .swiper-custom-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// 👉 Active Text Color
$this->add_control(
    'dot_active_title_color',
    [
        'label' => esc_html__( 'Active Text Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .logistik-slider .swiper-custom-dot.active
             {{WRAPPER}} .logistik-slider .swiper-custom-dot.active svg,
             {{WRAPPER}} .logistik-slider .swiper-custom-dot.active i,
             {{WRAPPER}} .logistik-slider .swiper-custom-dot.active img,' => 'color: {{VALUE}};',
        ],
    ]
);

// 👉 Active Background
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name' => 'dot_active_background',
        'selector' => '{{WRAPPER}} .logistik-slider .swiper-custom-dot.active',
    ]
);

// 👉 Active Border
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'dot_active_border',
        'selector' => '{{WRAPPER}} .logistik-slider .swiper-custom-dot.active',
    ]
);

$this->end_controls_section();



}


	protected function render() {
    $settings = $this->get_settings_for_display();

    if ( empty( $settings['slider_items'] ) ) {
        return;
    }
    ?>

<div class="logistik-slider swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ( $settings['slider_items'] as $index => $item ) : ?>
        <div class="swiper-slide">
            <div class="slide-image animate-el">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'background_image' ); ?>
            </div>
            <div class="slide-content">
                <div class="slide-text">
                    <h2 class="slide-title animate-title" data-title="<?php echo esc_attr( $item['slider_title'] ); ?>">
                    </h2>
                    </h2>
                    <p class="slide-desc animate-el"><?php echo esc_html( $item['slider_description'] ); ?></p>
                    <?php if ( ! empty( $item['slider_button_text'] ) ) : ?>
                    <a href="<?php echo esc_url( $item['slider_button_link']['url'] ); ?>" class="slider-btn animate-el"
                        <?php if ( $item['slider_button_link']['is_external'] ) echo 'target="_blank"'; ?>
                        <?php if ( $item['slider_button_link']['nofollow'] ) echo 'rel="nofollow"'; ?>>
                        <?php echo esc_html( $item['slider_button_text'] ); ?>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="slide-shape animate-image">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'slider_image_shape' ); ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Custom Pagination -->
    <div class="swiper-custom-pagination">
        <?php foreach ( $settings['slider_items'] as $index => $item ) : ?>
        <div class="swiper-custom-dot" data-index="<?php echo esc_attr( $index ); ?>">
            <?php
            if ( $item['dot_icon_type'] === 'image' && ! empty( $item['dot_icon_image']['url'] ) ) {
                echo '<img src="' . esc_url( $item['dot_icon_image']['url'] ) . '" alt="dot">';
            } elseif ( $item['dot_icon_type'] === 'icon' && ! empty( $item['dot_icon_svg']['value'] ) ) {
                \Elementor\Icons_Manager::render_icon( $item['dot_icon_svg'], [ 'aria-hidden' => 'true' ] );
            }
            ?>
            <span><?php echo esc_html( $item['dot_title'] ); ?></span>
        </div>
        <?php endforeach; ?>
    </div>

</div>
<?php
}


}