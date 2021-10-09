<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalContactInfoTwoWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-contact-info-two';
    }

    public function get_icon()
    {

        return 'eicon-pencil';
    }

    public function get_title()
    {
        return esc_html__('Contact Info Two', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_contact_info_two_content',
            [
                'label' => esc_html__('Contact Info Two', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_contact_info_style',
            [
                'label' => esc_html__('Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                    '3' => esc_html__('3', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_bg_icon',
            [
                'label' => esc_html__('Background Icon ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );


        $this->add_control(
            'sec_con_icon',
            [
                'label' => esc_html__('Icon', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'uil uil-phone-pause',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Contact Info', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '+44 545 989 62698 <br> +880 545 989 622698',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_contact_info_style = $this->get_settings_for_display('sec_contact_info_style');
        $sec_bg_icon = $this->get_settings_for_display('sec_bg_icon');
        $sec_con_icon = $this->get_settings_for_display('sec_con_icon');
        $sec_content = $this->get_settings_for_display('sec_content');

        ?>

        <div class="contact-info-item <?php if ($sec_contact_info_style == '2') {
            echo esc_attr('address');
        } elseif ($sec_contact_info_style == '3') {
            echo esc_attr('email');
        } else {
            echo esc_attr('phone');
        } ?>-item text-center ul-li-block">
			<span class="item-icon" style="background-image: url(<?php echo esc_url($sec_bg_icon['url']); ?>);">
				<i class='<?php echo esc_attr($sec_con_icon); ?>'></i>
			</span>
            <ul class="clearfix">
                <li><?php echo appal_wp_kses($sec_content); ?></li>
            </ul>
        </div>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalContactInfoTwoWidget);
