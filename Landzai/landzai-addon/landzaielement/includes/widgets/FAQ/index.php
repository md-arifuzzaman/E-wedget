<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class landzai_faq extends Widget_Base
{

    public function get_name()
    {
        return 'landzai-faq';
    }

    public function get_title()
    {
        return __('FAQ', 'landzai');
    }

    public function get_categories()
    {
        return ['landzaielement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'landzai'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('FAQ Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('How It Works', 'landzai'),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('FAQ Info', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Amet, dui, lacus in non massa id tellus amet tincidunt. Lacus ut integer
                 blandit diam nibh pulvinar. Ultrices phasellus', 'landzai'),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'faq_title',
            [
                'label' => __( 'FAQ Tab Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Task Management', 'landzai' ),
            ]
        );
        $repeater->add_control(
            'faq_info',
            [
                'label' => __( 'FAQ Tab Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                 invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'landzai' ),
            ]
        );
        $this->add_control(
            'faq_list',
            [
                'label' => __( 'FAQ List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'faq_tab_title' => __( 'Build with Time Balanceing', 'landzai' ),
                    ],
                    [
                        'faq_tab_title' => __( 'Build with Time Balanceing', 'landzai' ),
                    ],
                    [
                        'faq_tab_title' => __( 'Build with Time Balanceing', 'landzai' ),
                    ],
                    [
                        'faq_tab_title' => __( 'Build with Time Balanceing', 'landzai' ),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'landzai'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'landzai'),
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
                'label' => __('Title Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .accordion .acc-btn p',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Content Color', 'landzai'),
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
                'label' => __('Content Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .accordion-box .accordion .acc-content p',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __('Box BG', 'landzai'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bg',
                'label' => __('Team Social BG', 'landzai'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .accordion .acc-btn.collapsed .toggle-icon',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        echo'<!-- work area start here  -->
        <section class="work-area section" id="about" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <p class="sub-title">'.$settings['info'].'</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 align-self-center">
                        <div class="work-img">
                        '.get_that_image($settings['image']).'
                        </div>
                    </div>

                    <div class="col-lg-6 offset-lg-1 ">
                            <div class="work-lsit work-slide">';
                            if ($settings['faq_list']) {
                                foreach ($settings['faq_list'] as $faq) {
                                    echo '<div class="single-work">
                                    <h3>'.$faq['faq_title'].'</h3>
                                    <p>'.$faq['faq_info'].'</p>
                                </div>
                                ';
                        }
                    }
                    echo'</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- work area end here  -->';

        echo'<!-- faq area start here  -->
        <section class="faq-area section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <p class="sub-title">'.$settings['info'].'</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="faq-list">
                            <div class="accordion" id="accordionExample">
                                <div class="card">';

                                if ($settings['faq_list']) {
                                    $loop = 0;
                                    foreach ($settings['faq_list'] as $faq) {
                                        $loop++;
                                        if($loop == 1){
                                            $show = 'show';
                                            $collapsed = '';
                                        } else {
                                            $show = '';
                                            $collapsed = 'collapsed';
                                        }
                                        echo '
                                    <div class="card-header" id="heading'.$faq['_id'].'">
                                        <button type="button" class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#collapse'.$faq['_id'].'">'.$faq['faq_title'].'</button>
                                    </div>
                                    <div id="collapse'.$faq['_id'].'" class="collapse '.$show.'" aria-labelledby="heading'.$faq['_id'].'" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>'.$faq['faq_info'].'</p>
                                        </div>
                                    </div>';
                                    }
                                }
                            echo'
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="faq-img">
                        '.get_that_image($settings['image']).'
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end here  -->';
    
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new landzai_faq());
?>