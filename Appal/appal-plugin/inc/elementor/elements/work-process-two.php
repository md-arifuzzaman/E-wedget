<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalWork_ProcessTwoWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-work-process-two';
    }

    public function get_icon()
    {

        return 'eicon-navigator';
    }

    public function get_title()
    {
        return esc_html__('Work Process Two', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_work_process_two_content',
            [
                'label' => esc_html__('Work Process Two Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Manage all data from one place',
            ]
        );

        $this->add_control(
            'sec_title_content',
            [
                'label' => esc_html__('Title Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' We would like to take the opportunity to introduce to you our company and services. Our Company has an experience of almost 10 years ',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sec_active',
            [
                'label' => esc_html__('Active', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Yes', 'appal'),
                    '2' => esc_html__('No', 'appal'),
                ]
            ]
        );
        $repeater->add_control(
            'sec_wprocess_two_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'sec_wprocess_two_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );


        $repeater->add_control(
            'sec_wprocess_two_title_content',
            [
                'label' => esc_html__('Tab Title Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'sec_wprocess_two_content',
            [
                'label' => esc_html__('Tab Content ', 'appal'),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'work_process_two_list',
            [
                'label' => esc_html__
                ('Work Process List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sec_wprocess_two_title' => esc_html__('install the app', 'appal'),
                        'sec_wprocess_two_title_content' => esc_html__('Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound. mistaken you a com plete account.', 'appal'),

                    ],

                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'work_style',
            [
                'label' => esc_html__('Work Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .paragraph-text',
            ]
        );
        $this->add_control(
            'tab_head',
            [
                'label' => __('Tab header', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-nav > .nav > .nav-item > .nav-link h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_head_active',
            [
                'label' => __('Tab header active', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-nav > .nav > .nav-item > .nav-link.active h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_content',
            [
                'label' => __('Tab content', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-nav > .nav > .nav-item > .nav-link p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_content_active',
            [
                'label' => __('Tab content active', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-nav > .nav > .nav-item > .nav-link.active p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tab_Background',
            [
                'label' => __('Tab Normal', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'appal'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .features-nav > .nav > .nav-item > .nav-link',
            ]
        );
        $this->add_control(
            'Tab_Background_active',
            [
                'label' => __('Tab Active', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background-ac',
                'label' => __('Background-ac', 'appal'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .features-nav > .nav > .nav-item > .nav-link.active',
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_title_content = $this->get_settings_for_display('sec_title_content');
        $work_process_two_list = $this->get_settings_for_display('work_process_two_list');

        ?>


        <!-- extra-features-section - start
        ================================================== -->
        <section id="extra-features-section" class="extra-features-section clearfix">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="section-title text-center">
                            <h2 class="title-text mb-30"><?php echo esc_html($sec_title); ?></h2>
                            <p class="paragraph-text mb-0">
                                <?php echo appal_wp_kses($sec_title_content); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- features-nav - start -->
                        <div class="features-nav ul-li-center">
                            <ul class="nav" role="tablist">

                                <?php
                                $number = 1;
                                foreach ($work_process_two_list as $item) {

                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if ($item['sec_active'] == '1') {
                                            echo esc_attr('active');
                                        } ?>" data-toggle="tab" href="#apptab-<?php echo esc_attr($number); ?>">
                                            <span class="item-icon align-middle"><img
                                                        src="<?php echo esc_url($item['sec_wprocess_two_icon']['url']); ?>"
                                                        alt="<?php echo esc_attr($item['sec_wprocess_two_title']); ?>"></span>
                                            <div class="fea-nav-header-content">
                                                <h3><?php echo appal_wp_kses($item['sec_wprocess_two_title']); ?></h3>
                                                <p><?php echo appal_wp_kses($item['sec_wprocess_two_title_content']); ?></p>
                                            </div>
                                        </a>
                                    </li>

                                    <?php
                                    $number++;
                                } ?>


                            </ul>
                        </div>
                        <!-- features-nav - end -->
                    </div>

                    <div class="col-lg-6">
                        <!-- tab-content - start -->
                        <div class="tab-content">
                            <?php
                            $number = 1;
                            foreach ($work_process_two_list as $item) {

                                ?>

                                <div id="apptab-<?php echo esc_attr($number); ?>"
                                     class="tab-pane <?php if ($item['sec_active'] == '1') {
                                         echo esc_attr('active');
                                     } ?>">
                                    <?php echo $item['sec_wprocess_two_content']; ?>
                                </div>

                                <?php
                                $number++;
                            } ?>

                        </div>
                        <!-- tab-content - end -->
                    </div>
                </div><!-- Row -->
            </div>
        </section>
        <!-- extra-features-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalWork_ProcessTwoWidget);
