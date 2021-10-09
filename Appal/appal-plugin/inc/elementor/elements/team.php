<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalTeamWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-team';
    }

    public function get_icon()
    {

        return 'eicon-person';
    }

    public function get_title()
    {
        return esc_html__('Team', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(

            'appal_team_content',
            [
                'label' => esc_html__('Team Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_team_style',
            [
                'label' => esc_html__('Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Meet with our Team Member',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' We would like to take the opportunity to introduce to you our company and <br> services. Our Company has an experience of almost 10 years ',
            ]
        );

        $this->add_control(
            'sec_number_of_post',
            [
                'label' => esc_html__('Number of Post', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '4',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'Team',
            [
                'label' => esc_html__('Team Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_colorr',
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
                'name' => 'title_fontss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );
        $this->add_control(
            'title_colorrr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .paragraph-text',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_team_style = $this->get_settings_for_display('sec_team_style');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_number_of_post = $this->get_settings_for_display('sec_number_of_post');
        ?>


        <!-- team-section - start
        ================================================== -->
        <section id="team-section" class="team-section sec-ptb-160 pt-0 clearfix">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10 col-sm-12">
                        <div class="section-title text-center mb-100">
                            <h2 class="title-text mb-30"><?php echo appal_wp_kses($sec_title); ?></h2>
                            <p class="paragraph-text mb-0">
                                <?php echo appal_wp_kses($sec_content); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type' => array('team'),
                        'posts_per_page' => $sec_number_of_post,
                    );

                    // The Query
                    $appal_team_query = new WP_Query($args);

                    // The Loop
                    if ($appal_team_query->have_posts()) {
                        while ($appal_team_query->have_posts()) {
                            $appal_team_query->the_post();
                            $appal_team_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_572_859');
                            $appal_team_designation = get_post_meta(get_the_ID(), '_appal_team_designation', true);
                            $appal_team_social_option = get_post_meta(get_the_ID(), '_appal_team_social_option', true);
                            ?>
                            <?php if ($sec_team_style == '2') { ?>

                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="team-member-grid text-center">
                                        <div class="member-image image-container clearfix">
                                            <img src="<?php echo esc_url($appal_team_image['0']); ?>"
                                                 alt="<?php echo esc_attr(get_the_title()); ?>">
                                            <ul class="member-social-links clearfix">
                                                <?php
                                                foreach ((array)$appal_team_social_option as $key => $team_entry) {

                                                    $icon = $link = '';

                                                    if (isset($team_entry['_appal_team_social_icon']))
                                                        $icon = $team_entry['_appal_team_social_icon'];

                                                    if (isset($team_entry['_appal_team_social_link']))
                                                        $link = $team_entry['_appal_team_social_link'];

                                                    ?>

                                                    <li><a href="<?php echo esc_url($link); ?>"><i
                                                                    class="<?php echo esc_attr($icon); ?>"></i></a></li>

                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="member-info">
                                            <h3 class="member-name"><?php the_title(); ?></h3>
                                            <span class="member-title"><?php echo esc_html($appal_team_designation); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>

                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="team-member-bordered text-center">
                                        <div class="member-image mb-30 clearfix">
                                            <div class="image-container">
                                                <img src="<?php echo esc_url($appal_team_image['0']); ?>"
                                                     alt="<?php echo esc_attr(get_the_title()); ?>">
                                                <ul class="member-social-links clearfix">
                                                    <?php
                                                    foreach ((array)$appal_team_social_option as $key => $team_entry) {

                                                        $icon = $link = '';

                                                        if (isset($team_entry['_appal_team_social_icon']))
                                                            $icon = $team_entry['_appal_team_social_icon'];

                                                        if (isset($team_entry['_appal_team_social_link']))
                                                            $link = $team_entry['_appal_team_social_link'];

                                                        ?>

                                                        <li><a href="<?php echo esc_url($link); ?>"><i
                                                                        class="<?php echo esc_attr($icon); ?>"></i></a>
                                                        </li>

                                                    <?php } ?>


                                                </ul>
                                            </div>
                                            <small class="animate-item-1 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/cross.png"
                                                     alt="image_not_found">
                                            </small>
                                            <small class="animate-item-2 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/circle.png"
                                                     alt="image_not_found">
                                            </small>
                                            <small class="animate-item-3 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/circle-half.png"
                                                     alt="image_not_found">
                                            </small>
                                            <small class="animate-item-4 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/cross.png"
                                                     alt="image_not_found">
                                            </small>
                                            <small class="animate-item-5 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/box.png"
                                                     alt="image_not_found">
                                            </small>
                                            <small class="animate-item-6 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/circle-half.png"
                                                     alt="image_not_found">
                                            </small>
                                            <small class="animate-item-7 animate-item">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/team/shapes/flow.png"
                                                     alt="image_not_found">
                                            </small>
                                        </div>
                                        <h3 class="member-name"><?php the_title(); ?></h3>
                                        <span class="member-title"><?php echo esc_html($appal_team_designation); ?></span>
                                    </div>
                                </div>
                            <?php } ?>

                        <?php }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
        </section>
        <!-- team-section - end
        ================================================== -->


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalTeamWidget);
