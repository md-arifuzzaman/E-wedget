<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalWork_ProcessWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-work-process';
    }

    public function get_icon()
    {

        return 'eicon-navigator';
    }

    public function get_title()
    {
        return esc_html__('Work Process', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_work_process_content',
            [
                'label' => esc_html__('Work Process Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'How Does Appal Work',
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
            'sec_wprocess_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'sec_wprocess_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'work_process_list',
            [
                'label' => esc_html__
                ('Work Process List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sec_wprocess_title' => esc_html__('install & login', 'appal'),
                    ],

                ],
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_title_content = $this->get_settings_for_display('sec_title_content');
        $work_process_list = $this->get_settings_for_display('work_process_list');

        ?>


        <!-- working-process-section - start
        ================================================== -->
        <section id="working-process-section" class="working-process-section sec-ptb-160 clearfix">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="section-title text-center mb-100">
                            <h2 class="title-text mb-30"><?php echo esc_html($sec_title); ?></h2>
                            <p class="paragraph-text mb-0">
                                <?php echo appal_wp_kses($sec_title_content); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="process-steps-list ul-li">
                    <ul class="clearfix">
                        <?php
                        foreach ($work_process_list as $item) { ?>

                            <li>
								<span class="item-icon">
									<img src="<?php echo esc_url($item['sec_wprocess_icon']['url']); ?>"
                                         alt="<?php echo esc_attr($item['sec_wprocess_title']); ?>">
								</span>
                                <h3 class="item-title mb-0"><?php echo appal_wp_kses($item['sec_wprocess_title']); ?></h3>

                            </li>
                        <?php } ?>


                    </ul>
                </div>
            </div>
        </section>
        <!-- working-process-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalWork_ProcessWidget);
