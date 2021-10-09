<?php

namespace Elementor;

use AhopeElement_Elementor_Addons;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ahope_knowledge extends Widget_Base
{

    public function get_name()
    {
        return 'ahope-knowledge';
    }

    public function get_title()
    {
        return __('Knowledge', 'ahope');
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
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'ahope'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Account Settings', 'ahope'),
            ]
        );
        $this->add_control(
            'button',
            [
                'label' => __('Button', 'ahope'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Get Started', 'ahope'),
            ]
        );
        $this->add_control(
            'link', [
                'label' => __('Link', 'ahope'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'list',
            [
                'label' => __('List Title', 'ahope'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('How to find topics?', 'ahope'),
            ]
        );
        $repeater->add_control(
            'l_link', [
                'label' => __('Link', 'ahope'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'know_list',
            [
                'label' => __('Topics List', 'ahope'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list' => __('How to find topics?', 'ahope'),
                    ],
                    [
                        'list' => __('How to find topics?', 'ahope'),
                    ],
                    [
                        'list' => __('How to find topics?', 'ahope'),
                    ],
                    [
                        'list' => __('How to find topics?', 'ahope'),
                    ],
                    [
                        'list' => __('How to find topics?', 'ahope'),
                    ],
                ],
                'title_field' => '{{{ list }}}',
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
        echo '<!-- Start product Section -->
    <div class="knowledge_area">
    <div class="card ">
                        <div class="card-header"><a ' . get_that_link($settings['link']) . '><i class="ti-info-alt"></i>' . $settings['title'] . '</a></div>
                        <div class="card-body">
                            <ul class="knowledge_list">';
            if ($settings['know_list']) {
                foreach ($settings['know_list'] as $know) {
                echo '<li><i class="ti-receipt"></i><a  ' . get_that_link($know['l_link']) . '>' . $know['list'] . '</a></li>';
            }
        }
        echo '    
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a ' . get_that_link($settings['link']) . '>' . $settings['button'] . '</a>
                        </div>
                    </div>
                
    </div>
    <!-- End product Section -->

    ';
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new ahope_knowledge());
?>