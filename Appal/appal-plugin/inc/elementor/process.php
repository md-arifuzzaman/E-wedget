<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalProcessWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-process';
    }

    public function get_icon()
    {

        return 'eicon-navigation-vertical';
    }

    public function get_title()
    {
        return esc_html__('Process', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_process_content',
            [
                'label' => esc_html__('Process Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'sec_feature',
            [
                'label' => esc_html__('Feature Item', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1' => esc_html__('Yes', 'appal'),
                    '2' => esc_html__('No', 'appal'),
                ]
            ]
        );
        $this->add_control(
            'sec_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'ti-bag',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Marketing Intelligence',
            ]
        );


        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry.',
            ]
        );

        $this->add_control(
            'sec_btn_text',
            [
                'label' => esc_html__('Button Text ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
            ]
        );

        $this->add_control(
            'sec_btn_link',
            [
                'label' => esc_html__('Button Link ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_feature = $this->get_settings_for_display('sec_feature');
        $sec_icon = $this->get_settings_for_display('sec_icon');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_btn_text = $this->get_settings_for_display('sec_btn_text');
        $sec_btn_link = $this->get_settings_for_display('sec_btn_link');
        ?>

        <div class="single-howitwork <?php if ($sec_feature == '1') {
            echo esc_attr('single-howitwork-bg');
        } ?>">
            <div class="howitwork_icon"><span class="<?php echo esc_attr($sec_icon); ?>"></span></div>
            <h3><?php echo esc_html($sec_title); ?></h3>
            <p><?php echo appal_wp_kses($sec_content); ?></p>
            <?php if ($sec_btn_link) { ?>
                <a href="<?php echo esc_url($sec_btn_link); ?>"><?php echo esc_html($sec_btn_text); ?></a>
            <?php } ?>
        </div>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalProcessWidget);
