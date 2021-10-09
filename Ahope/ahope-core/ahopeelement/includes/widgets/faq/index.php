<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ahope_fq extends Widget_Base
{

    public function get_name()
    {
        return 'ahope-fq';
    }

    public function get_title()
    {
        return __('Faq', 'ahope');
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
            'title',
            [
                'label' => __('Title', 'ahope'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Why Should We Press Get A Quote Button?', 'ahope'),
            ]
        );
        $repeater->add_control(
            'info',
            [
                'label' => __('Content', 'ahope'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore Ut enim ad minim veniam.', 'ahope'),
            ]
        );
        $this->add_control(
            'faq_list',
            [
                'label' => __('Faq List', 'ahope'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Why Should We Press Get A Quote Button?', 'ahope'),
                    ],
                    [
                        'title' => __('Why Should We Press Get A Quote Button?', 'ahope'),
                    ],
                    [
                        'title' => __('Why Should We Press Get A Quote Button?', 'ahope'),
                    ],
                    [
                        'title' => __('Why Should We Press Get A Quote Button?', 'ahope'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
        $uid = uniqid('accordion');
        echo '<!-- Start Sign-In Section -->
    <section class="faq_area">
           <div class="accordion_wrapper_2">
                <div class="accordion" id="' . $uid . '">';
            if ($settings['faq_list']) {
                $index = 0;
                foreach ($settings['faq_list'] as $faq) {
                    $index++;
                    if ($index == 1) {
                        $class = 'show';
                        $class2 = '';
                        $class3 = 'shadow';
                    } else {
                        $class = '';
                        $class2 = 'collapsed';
                        $class3 = '';
                    }
                echo '<div class="card ' . $class3 . '">
                        <div class="card-header" id="heading' . $faq['_id'] . '">
                            <button class="btn btn-link ' . $class2 . '" type="button" data-toggle="collapse"
                                data-target="#collapse' . $faq['_id'] . '" aria-expanded="true" aria-controls="collapse' . $faq['_id'] . '">
                                ' . $faq['title'] . '
                            </button>
                        </div>
                        <div id="collapse' . $faq['_id'] . '" class="collapse ' . $class . '" aria-labelledby="heading' . $faq['_id'] . '"
                            data-parent="#' . $uid . '">
                            <div class="card-body">
                                ' . $faq['info'] . '
                            </div>
                        </div>
                    </div>';
            }
        }
        echo '</div>
            </div>
    </section>
    <!-- End Sign-In Section -->';
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new ahope_fq());
?>