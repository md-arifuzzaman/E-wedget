<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor image widget.
 *
 * Elementor widget that displays an image into the page.
 *
 * @since 1.0.0
 */
class Ahope_domain_search extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ahope-domain-search';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Ahope Domain Search', 'ahope' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-search';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the image widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ahopeelement-addons' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'domain' ];
	}


    /**
     * Whether the reload preview is required or not.
     *
     * Used to determine whether the reload preview is required.
     *
     * @since 1.0.0
     * @access public
     *
     * @return bool Whether the reload preview is required.
     */
    public function is_reload_preview_required() {
        return true;
    }

    /**
	 * Register image widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Ahope Domain Checker', 'ahope' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);
        $this->add_control(
            'btn',
            [
                'label' => __( 'Button', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Search', 'ahope'),
            ]
        );
        $this->add_control(
            'allow_domain',
            [
                'label' => __( 'Allow Domain', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('com,net,org', 'ahope'),
                'placeholder' => __('com,net,org', 'ahope'),
            ]
        );
        $this->add_responsive_control(
            'width',
            [
                'label' => esc_html__( 'Width', 'ahope' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1500,
                    ],
                ],
            ]
        );
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'ahope' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ahope' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ahope' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ahope' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ahope-domain-checker-wrapper' => 'text-align: -webkit-{{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'domain_style',
            [
                'label' => esc_html__( 'Domain Checker Style', 'ahope' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btnttt',
                'label' => __( 'Button Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .ahope-domain-checker-wrapper #wdc-style button#Submit',
            ]
        );
        $this->add_control(
            'btn_c',
            [
                'label' => __( 'Button Text Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ahope-domain-checker-wrapper #wdc-style button#Submit' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'btn_ch',
            [
                'label' => __( 'Hover Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ahope-domain-checker-wrapper #wdc-style button#Submit:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'btn_cb',
            [
                'label' => __( 'Button Background Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ahope-domain-checker-wrapper #wdc-style button#Submit' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'btn_cbh',
            [
                'label' => __( 'Hover Background Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ahope-domain-checker-wrapper #wdc-style button#Submit:hover' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'input',
            [
                'label' => __( 'Input Background Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ahope-domain-checker-wrapper #wdc-style #Search' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'ahope' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    '1' => [
                        'title' => esc_html__( 'Layout 1', 'ahope' ),
                        'icon' => 'eicon-call-to-action',
                    ],
                    '2' => [
                        'title' => esc_html__( 'Layout 2', 'ahope' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                ],
            ]
        );
        $this->end_controls_section();

    }


	/**
	 * Render image widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$btn = $settings['btn'];
        $button_text = !empty($settings['btn']) ? "button='$btn'" : '';

        $wid = $settings['width']['size'];
        $width = !empty($settings['width']['size']) ? "width='$wid'" : '';

        $allow = $settings['allow_domain'];
        $allow_domain = !empty($settings['allow_domain']) ? "allowed_tld='$allow'" : '';

        $layout = $settings['layout'];
        $style = !empty($settings['layout']) ? "style='$layout'" : '';
        ?>
        <!-- Start of bredcrumb  section
	    ============================================= -->
        <!-- BreadCrumb Area -->
            <div class="ahope-domain-checker-wrapper">
                    <?php echo do_shortcode("[wpdomainchecker $button_text $width $allow_domain $style]")?>
            </div>
        <!-- End of breadcrumb section
            ============================================= -->
        <?php

	}

	/**
	 * Render image widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */
	protected function content_template() {	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Ahope_domain_search() );