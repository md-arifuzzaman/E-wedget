<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalFAQWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-faq';
    }

    public function get_icon()
    {

        return 'eicon-help';
    }

    public function get_title()
    {
        return esc_html__('FAQ', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_faq',
            [
                'label' => esc_html__('FAQ Content ', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '1. How to Purchase your product ?',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' We are promisess to their customer to make sure bes services transaction is a transfer of value between Bitcoin wallets that gets included in block chain. Bitcoin wallets keep a secret piece of data called a private key or seed. ',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'FAQ',
            [
                'label' => esc_html__('FAQ Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .queistions-item .item-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .queistions-item .item-title',
            ]
        );
        $this->add_control(
            'titlee_color',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .queistions-item > p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titleee_fonts',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .queistions-item > p',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        ?>

        <div class="queistions-item" data-aos="fade-up" data-aos-duration="450" data-aos-delay="200">
            <h3 class="item-title mb-15"><?php echo esc_html($sec_title); ?></h3>
            <p class="mb-0">
                <?php echo appal_wp_kses($sec_content); ?>
            </p>
        </div>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalFAQWidget);
