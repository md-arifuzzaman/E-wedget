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
class Widget_Appal_breadcrumb extends Widget_Base {

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
		return 'appal-breadcrumb-two';
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
		return esc_html__( 'Appal Breadcrumb', 'appal' );
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
		return 'eicon-image';
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
		return [ 'appal-category' ];
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
		return [ 'breadcrumb' ];
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
				'label' => esc_html__( 'Site breadcrumb', 'appal' ),
			]
		);

        $this->add_control(
            'custom_breadcrumb_upload',
            [
                'label' => __( 'Choose Custom breadcrumb', 'appal' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'appal' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'appal' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'appal' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'appal' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
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

        if (is_home() && get_option('page_for_posts') ) {
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
            $url = $img[0];
        } else {
            if ( $settings['custom_breadcrumb_upload']['id'] ) {
                $url = $settings['custom_breadcrumb_upload']['url'];
            } else {
                $url = get_the_post_thumbnail_url();
            }
        }
        $arg = [
            'cat' => '<span class="niotitle">'.esc_html__('Category','appal').'</span>',
            'tag' => '<span  class="niotitle">'.esc_html__('Tag','appal').'</span>',
            'author' => '<span  class="niotitle">'.esc_html__('Author','appal').'</span>',
            'year' => '<span  class="niotitle">'.esc_html__('Year','appal').'</span>',
            'notfound' => '<span  class="niotitle">'.esc_html__('Not found','appal').'</span>',
            'search' => '<span  class="niotitle">'.esc_html__('Search for','appal').'</span>',
            'marchive' => '<span  class="niotitle">'.esc_html__('Monthly archive','appal').'</span>',
            'yarchive' => '<span  class="niotitle">'.esc_html__('Yearly archive','appal').'</span>',
        ];

        if (is_home() && get_option('page_for_posts')  ) {
            $title = 'Blog';
        } elseif (is_front_page()){
            $title = 'Front Page';
        }else {
            $title = get_the_title();
        }
        ?>
        <!-- breadcrumb-section - start
      ================================================== -->
        <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
                 style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">
            <?php appal_banner_images(); ?>

            <div class="container">
                <div class="row justify-content-lg-start justify-content-md-center">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="breadcrumb-content">

                            <div class="section-title">
                                <h2 class="title-text mb-15">
                                    <?php echo esc_html($title); ?>
                                </h2>
                            </div>

                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <?php appal_unit_breadcumb();?>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>

            <?php appal_banner_shape(); ?>

        </section>
        <!-- breadcrumb-section - end
        ================================================== -->

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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Appal_breadcrumb() );