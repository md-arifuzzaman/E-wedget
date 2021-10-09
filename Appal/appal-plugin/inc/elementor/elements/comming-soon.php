<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalCommingSoonWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-comming-soon';
    }

    public function get_icon()
    {

        return 'eicon-warning';
    }

    public function get_title()
    {
        return esc_html__('Comming Soon', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_comming_soon_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'comming_soon_logo',
            [
                'label' => esc_html__('Logo ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'comming_soon_image',
            [
                'label' => esc_html__('Section Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'comming_soon_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'We are very Coming Soon..',
            ]
        );

        $this->add_control(
            'comming_soon_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' We\'re working in our new website, stay tuned! ',
            ]
        );

        $this->add_control(
            'comming_soon_cdown',
            [
                'label' => esc_html__('Count Down', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '2020/10/01',
            ]
        );


        $this->add_control(
            'comming_soon_new_shortcode',
            [
                'label' => esc_html__('Enetr Newsletter Shortcode', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'comming_soon_news_notice',
            [
                'label' => esc_html__('Newsletter Notice', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'We won’t spam you, Pinky Promise !',
            ]
        );

        $this->add_control(
            'comming_soon_social_text',
            [
                'label' => esc_html__('Social Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'follow us:',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'comming_soon_social_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'comming_soon_social_link',
            [
                'label' => esc_html__('Link ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'comming_soon_social_list',
            [
                'label' => esc_html__
                ('Socail List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'comming_soon_social_icon' => esc_html__('fab fa-facebook-f', 'appal'),
                        'comming_soon_social_link' => esc_html__('#', 'appal'),

                    ],

                ],
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $comming_soon_logo = $this->get_settings_for_display('comming_soon_logo');
        $comming_soon_image = $this->get_settings_for_display('comming_soon_image');
        $comming_soon_title = $this->get_settings_for_display('comming_soon_title');
        $comming_soon_content = $this->get_settings_for_display('comming_soon_content');
        $comming_soon_cdown = $this->get_settings_for_display('comming_soon_cdown');
        $comming_soon_new_shortcode = $this->get_settings_for_display('comming_soon_new_shortcode');
        $comming_soon_news_notice = $this->get_settings_for_display('comming_soon_news_notice');
        $comming_soon_social_text = $this->get_settings_for_display('comming_soon_social_text');
        $comming_soon_social_list = $this->get_settings_for_display('comming_soon_social_list');

        ?>

        <div class="common-page">
            <!-- useless thing - start -->
            <span class="scene d-none">
			<small class="d-none" data-depth="0.2"></small>
		</span>
            <!-- useless thing - end -->


            <!-- brand-logo - start
            ================================================== -->
            <div class="brand-logo">
                <?php
                echo '
			<a href="' . esc_url(home_url('/')) . '" class="brand-link">				
				<img src="' . esc_url($comming_soon_logo['url']) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '">
			</a>
			';
                ?>
            </div>
            <!-- brand-logo - end
            ================================================== -->

            <!-- coming-soon-section - start
            ================================================== -->
            <section id="coming-soon-section" class="coming-soon-section clearfix">
                <div class="common-container">
                    <div class="image-container">
                        <?php
                        echo '<img src="' . esc_url($comming_soon_image['url']) . '" alt="co">';
                        ?>
                    </div>
                </div>
                <div class="common-container bg-default-blue">
                    <div class="item-content">
                        <?php
                        echo '<h2 class="title-text mb-30">' . esc_html($comming_soon_title) . '</h2>';
                        echo '<p class="mb-60">' . esc_html($comming_soon_content) . '</p>';
                        ?>

                        <div class="countdown-timer ul-li mb-45 clearfix">
                            <?php echo '<ul class="countdown-list" data-countdown="' . esc_attr($comming_soon_cdown) . '"></ul>'; ?>
                        </div>
                        <div class="email-form">
                            <?php echo do_shortcode($comming_soon_new_shortcode); ?>
                            <?php echo '<p class="mb-0">' . esc_attr($comming_soon_news_notice) . '</p>'; ?>
                        </div>
                    </div>
                    <small class="shape-1"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                                alt="Shape Image"></small>
                    <small class="shape-2"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-1.png"
                                alt="Shape Image"></small>
                    <small class="shape-3"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                                alt="Shape Image"></small>
                    <small class="shape-4"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                                alt="Shape Image"></small>
                    <small class="shape-5"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                                alt="Shape Image"></small>
                    <small class="shape-6"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                                alt="Shape Image"></small>
                    <small class="shape-7"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-2.png"
                                alt="Shape Image"></small>
                    <small class="shape-8"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle.png"
                                alt="Shape Image"></small>
                    <small class="shape-9"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                                alt="Shape Image"></small>
                </div>
            </section>
            <!-- coming-soon-section - end
            ================================================== -->

            <!-- social-links - start
            ================================================== -->
            <div class="social-links ul-li clearfix">
                <?php echo '<h3 class="title-text mb-30">' . esc_html($comming_soon_social_text) . '</h3>'; ?>
                <ul class="clearfix">
                    <?php

                    foreach ($comming_soon_social_list as $item) {
                        echo '<li><a href="' . esc_url($item['comming_soon_social_link']) . '"><i class="' . esc_attr($item['comming_soon_social_icon']) . '"></i></a></li>';

                    } ?>
                </ul>
            </div>
            <!-- social-links - end
            ================================================== -->
        </div>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalCommingSoonWidget);
