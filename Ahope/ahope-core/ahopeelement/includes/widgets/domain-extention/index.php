<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ahope_de extends Widget_Base
{

    public function get_name()
    {
        return 'ahope-de';
    }

    public function get_title()
    {
        return __('Domain Tooltip', 'ahope');
    }

    public function get_categories()
    {
        return ['ahopeelement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'ahope'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'price',
            [
                'label' => __('Price', 'ahope'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('$4.5', 'ahope'),
            ]
        );
        $repeater->add_control(
            'alt',
            [
                'label' => __('Alter Text', 'ahope'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('.com', 'ahope'),
            ]
        );
        $repeater->add_control(
            'photo', [
                'label' => __( 'Photo', 'ahope' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'domain_list',
            [
                'label' => __('Domain List', 'ahope'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'price' => __('$4.5', 'ahope'),
                    ],
                    [
                        'price' => __('$4.5', 'ahope'),
                    ],
                    [
                        'price' => __('$4.5', 'ahope'),
                    ],
                    [
                        'price' => __('$4.5', 'ahope'),
                    ],
                    [
                        'price' => __('$4.5', 'ahope'),
                    ],

                ],
                'title_field' => '{{{ alt }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'ahope'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'ahope'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion .acc-btn p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'ahope'),
                'selector' => '{{WRAPPER}} .accordion .acc-btn p',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Content Color', 'ahope'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .accordion .acc-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __('Content Typography', 'ahope'),
                'selector' => '{{WRAPPER}} .accordion-box .accordion .acc-content p',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __('Box BG', 'ahope'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bg',
                'label' => __('Team Social BG', 'ahope'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .accordion .acc-btn.collapsed .toggle-icon',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        echo '
    <div class="domain_form_2">
        <div class="domain_list">';
            if ($settings['domain_list']) {
                foreach ($settings['domain_list'] as $domain) {
                echo '<img src="' . $domain['photo']['url'] . '" alt="' . $domain['alt'] . '" data-placement="top" data-toggle="tooltip" title="' . $domain['price'] . '">';
            }
        }
        echo '</div>
    </div>
    <!-- End Section -->';
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new ahope_de());
?>