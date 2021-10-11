<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class landzai_counter_step extends Widget_Base {

    public function get_name() {
        return 'landzai-counter-step';
    }
 
    public function get_title() {
        return __('Counter Step', 'landzai');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['landzaielement-addons'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'counter_step',
            [
                'label' => __( 'Content', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Built The App That Everyone Will Love.', 'landzai'),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'counter_number',
            [
                'label' => __( 'Counter Number', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '25', 'landzai' ),
            ]
        );
        $repeater->add_control(
            'counter_title',
            [
                'label' => __( 'Counter Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Landzai', 'landzai' ),
            ]
        );
        $this->add_control(
            'counter_list',
            [
                'label' => __( 'Counter List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                ],
                'title_field' => '{{{ counter_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'bottom_sec',
            [
                'label' => __( 'Bottom Content', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control(
            'conten_title',
            [
                'label' => __('Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Customized Registration', 'landzai'),
            ]
        );
        $repeater2->add_control(
            'conten_info',
            [
                'label' => __('Info', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lacus lorem accu bmsan, placerat nisi magna duis enim. In morbi scelerisque lobortis viverra accu mdsan. Eleifend vel, eu praesent amet orcid amet lectus et rutrum. Enim mauris nisl lacus vitae leo. Varius aliquam adip eseriscing euismod congue orci ante. Viverra sit non nulla turpis. Vulputate tellus euismod sit a placerat aliquam dignissim suscipit. Edst eget proin proin neque iaculis. Ultricdbes viverra nulla imperdiet id scele bsrisque', 'landzai'),
            ]
        );
        $this->add_control(
            'conten_list',
            [
                'label' => __( 'Bottom Content', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                ],
                'title_field' => '{{{ conten_title }}}',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __( 'General', 'landzai' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'slider_number',
            [
                'label' => __('Slider Number', 'landzai'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __( 'Title Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_titlea_color',
            [
                'label' => __( 'Title Active Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box h4' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .overlay-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .overlay-box p',
            ]
        );
        $this->add_control(
            'hh_caa',
            [
                'label' => __( 'Button Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box .read-more' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaaccc',
                'label' => __( 'Button Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box .read-more',
            ]
        );
        $this->add_control(
            'icon_cb',
            [
                'label' => __( 'Overlay BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box, 
                    {{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();


        echo'<!-- feedback area start here  -->
        <section class="feedback-area section pb-90 section-bg">
            <div class="container">
                <div class="feedback-top">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title-two mb-0">
                                <h2 class="title">'.$settings['title'].'</h2>
                                <span class="section-divider"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="counter-list">';
                            if ($settings['counter_list']) {
                                foreach ($settings['counter_list'] as $counter) {
                                    echo '<div class="single-counter text-center">
                                    <div class="counter-number">
                                        <span class="counter">'.$counter['counter_number'].'</span><span>K</span>
                                    </div>
                                    <h4 class="counter-title">'.$counter['counter_title'].'</h4>
                                </div>';
                            }
                        }
                                echo '</div>
                        </div>
                    </div>
                </div>
                <div class="feedback-list">
                    <div class="row">';
                        $loop=0;
                    if ($settings['conten_list']) {
                        foreach ($settings['conten_list'] as $conten) {
                            $loop++;
                            if($loop==2){
                                $bg='bg-one';
                            }else {
                                $bg='';
                            }
                            echo '<div class="col-lg-4 col-md-6">
                            <div class="single-feedback">
                                <h3 class="feedback-title">
                                    <span class="feedback-number '.$bg.'">0'.$loop.'</span> 
                                    '.$conten['conten_title'].'
                                </h3>
                                <div class="feedback-content">
                                    <p>'.$conten['conten_info'].'</p>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                }
                        echo '</div>
            </div>
        </section>
        <!-- feedback area end here  -->';
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new landzai_counter_step() );