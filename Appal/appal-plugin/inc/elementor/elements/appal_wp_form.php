<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class appalWPFormWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-wp-form';
    }

    public function get_icon()
    {

        return 'eicon-form-horizontal';
    }

    public function get_title()
    {
        return esc_html__('Appal WP Form', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_wp_form_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_wp_form_type',
            [
                'label' => esc_html__('Form Type', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Register', 'appal'),
                    '2' => esc_html__('Login', 'appal'),
                    '3' => esc_html__('Forget Password', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'appal_wp_form_logo',
            [
                'label' => esc_html__('Logo ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'appal_wp_form_sec_img',
            [
                'label' => esc_html__('Section Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'appal_wp_form_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'We are Appal',
            ]
        );

        $this->add_control(
            'appal_wp_form_dec',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Welcome Back ! Please Login to your Account ',
            ]
        );

        $this->add_control(
            'appal_wp_form_termcon_text',
            [
                'label' => esc_html__('Terms and Conditon Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'I Agree with the <a href="#">tearm and conditions</a>',
            ]
        );

        $this->add_control(
            'appal_wp_form_reg_log_text',
            [
                'label' => esc_html__('Register and Login Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Already have an account?',
            ]
        );

        $this->add_control(
            'appal_wp_form_reg_logbtn_text',
            [
                'label' => esc_html__('Register and Login Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Please Login',
            ]
        );

        $this->add_control(
            'appal_wp_form_user_logged_in_text',
            [
                'label' => esc_html__('User Logged In Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'You Already Logged In',
            ]
        );

        $this->add_control(
            'appal_wp_form_reg_logbtn_link',
            [
                'label' => esc_html__('Register and Login Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'appal_wp_form_forget_pas_text',
            [
                'label' => esc_html__('Forget Password Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Forgot Password ?',
            ]
        );

        $this->add_control(
            'appal_wp_form_forget_pas_link',
            [
                'label' => esc_html__('Forget Password Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'appal_wp_form_social_text',
            [
                'label' => esc_html__('Social Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'follow us:',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'appal_wp_form_social_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'appal_wp_form_social_link',
            [
                'label' => esc_html__('Link ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'appal_wp_form_social_list',
            [
                'label' => esc_html__
                ('Socail List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'appal_wp_form_social_icon' => esc_html__('fab fa-facebook-f', 'appal'),
                        'appal_wp_form_social_link' => esc_html__('#', 'appal'),

                    ],

                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_wp_form_type = $this->get_settings_for_display('sec_wp_form_type');
        $appal_wp_form_logo = $this->get_settings_for_display('appal_wp_form_logo');
        $appal_wp_form_sec_img = $this->get_settings_for_display('appal_wp_form_sec_img');
        $appal_wp_form_title = $this->get_settings_for_display('appal_wp_form_title');
        $appal_wp_form_dec = $this->get_settings_for_display('appal_wp_form_dec');
        $appal_wp_form_termcon_text = $this->get_settings_for_display('appal_wp_form_termcon_text');
        $appal_wp_form_reg_logbtn_link = $this->get_settings_for_display('appal_wp_form_reg_logbtn_link');
        $appal_wp_form_user_logged_in_text = $this->get_settings_for_display('appal_wp_form_user_logged_in_text');
        $appal_wp_form_reg_log_text = $this->get_settings_for_display('appal_wp_form_reg_log_text');
        $appal_wp_form_reg_logbtn_text = $this->get_settings_for_display('appal_wp_form_reg_logbtn_text');
        $appal_wp_form_social_text = $this->get_settings_for_display('appal_wp_form_social_text');
        $appal_wp_form_social_list = $this->get_settings_for_display('appal_wp_form_social_list');
        $appal_wp_form_forget_pas_text = $this->get_settings_for_display('appal_wp_form_forget_pas_text');
        $appal_wp_form_forget_pas_link = $this->get_settings_for_display('appal_wp_form_forget_pas_link');
        ?>

        <div class="common-page">
            <!-- useless thing - start -->
            <span class="scene d-none">
				<small class="d-none" data-depth="0.2"></small>
			</span>
            <!-- useless thing - end -->

            <!-- brand-logo - start
            ================================================== -->

            <div class="brand-logo">
                <?php
                echo '
				<a href="' . esc_url(home_url('/')) . '" class="brand-link">				
					<img src="' . esc_url($appal_wp_form_logo['url']) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '">
				</a>
				';
                ?>
            </div>
            <!-- brand-logo - end
            ================================================== -->

            <!-- register-section - start
            ================================================== -->
            <section id="register-section" class="register-section clearfix">
                <div class="common-container">
                    <div class="image-container">
                        <?php
                        echo '<img src="' . esc_url($appal_wp_form_sec_img['url']) . '" alt="co">';
                        ?>

                    </div>
                </div>
                <div class="common-container bg-default-blue">
                    <div class="item-content">
                        <?php
                        echo '<h2 class="title-text mb-30">' . esc_html($appal_wp_form_title) . '</h2>';
                        if (is_user_logged_in()) {
                            echo '<p class="mb-60">' . esc_html($appal_wp_form_user_logged_in_text) . '</p>';
                        } else {
                            echo '<p class="mb-60">' . esc_html($appal_wp_form_dec) . '</p>';
                        }

                        if ($sec_wp_form_type == '1') {
                            if (!is_user_logged_in()) { ?>
                                <div class="register-form">
                                    <form action="<?php echo esc_url(home_url()); ?>/wp-login.php?action=register"
                                          method="post">
                                        <div class="form-item">
                                            <input id="reg-user" type="text" name="user_login">
                                            <label for="reg-user"><?php echo esc_html__('Username', 'appal'); ?></label>
                                        </div>

                                        <div class="form-item">
                                            <input id="reg-email" type="email" name="user_email">
                                            <label for="reg-email"><?php echo esc_html__('email address', 'appal'); ?></label>
                                        </div>

                                        <div class="tearm-condition mb-45">
                                            <input id="reg-check" type="checkbox">
                                            <label for="reg-check"><?php echo appal_wp_kses($appal_wp_form_termcon_text); ?></label>
                                        </div>
                                        <button type="submit" class="custom-btn mb-30"
                                                name="wp-submit"><?php echo esc_html__('register now', 'appal'); ?></button>
                                        <p class="mb-0"><?php echo esc_html($appal_wp_form_reg_log_text); ?> <a
                                                    href="<?php echo esc_url($appal_wp_form_reg_logbtn_link); ?>"><u><?php echo esc_html($appal_wp_form_reg_logbtn_text); ?></u></a>
                                        </p>
                                    </form>
                                </div>
                            <?php }
                        } elseif ($sec_wp_form_type == '2') {
                            if (!is_user_logged_in()) {
                                ?>
                                <div class="register-form">
                                    <form action="<?php echo esc_url(home_url()); ?>/wp-login.php" method="post">
                                        <div class="form-item">
                                            <input id="reg-email" type="text" name="log">
                                            <label for="reg-email"><?php echo esc_html__('Username', 'appal'); ?></label>
                                        </div>
                                        <div class="form-item">
                                            <input id="reg-password" type="password" name="pwd">
                                            <label for="reg-password"><?php echo esc_html__('password*', 'appal'); ?></label>
                                        </div>
                                        <div class="forgot-password text-right mb-45">
                                            <a href="<?php echo esc_url($appal_wp_form_forget_pas_link); ?>"><u><?php echo esc_html($appal_wp_form_forget_pas_text); ?></u></a>
                                        </div>
                                        <button type="submit" class="custom-btn mb-30"
                                                name="wp-submit"><?php echo esc_html__('Login', 'appal'); ?></button>
                                        <p class="mb-0"><?php echo esc_html($appal_wp_form_reg_log_text); ?> <a
                                                    href="<?php echo esc_url($appal_wp_form_reg_logbtn_link); ?>"><u><?php echo esc_html($appal_wp_form_reg_logbtn_text); ?></u></a>
                                        </p>
                                    </form>
                                </div>
                                <?php
                            }
                        } elseif ($sec_wp_form_type == '3') {
                            if (!is_user_logged_in()) {
                                ?>
                                <div class="register-form">
                                    <form action="<?php echo esc_url(home_url()); ?>/wp-login.php?action=lostpassword"
                                          method="post">
                                        <div class="form-item">
                                            <input id="reg-email" type="email" name="user_login">
                                            <label for="reg-email"><?php echo esc_html__('email address', 'appal'); ?></label>
                                        </div>

                                        <button type="submit" class="custom-btn mb-30"
                                                name="wp-submit"><?php echo esc_html__('send reset link', 'appal'); ?></button>

                                    </form>
                                </div>

                            <?php }
                        } ?>

                    </div>
                    <small class="shape-1"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                                alt="Shape Image"></small>
                    <small class="shape-2"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-1.png"
                                alt="Shape Image"></small>
                    <small class="shape-3"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                                alt="Shape Image"></small>
                    <small class="shape-4"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                                alt="Shape Image"></small>
                    <small class="shape-5"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                                alt="Shape Image"></small>
                    <small class="shape-6"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                                alt="Shape Image"></small>
                    <small class="shape-7"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-2.png"
                                alt="Shape Image"></small>
                    <small class="shape-8"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle.png"
                                alt="Shape Image"></small>
                    <small class="shape-9"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                                alt="Shape Image"></small>
                </div>
            </section>
            <!-- register-section - end
            ================================================== -->

            <!-- social-links - start
            ================================================== -->
            <div class="social-links ul-li clearfix">
                <?php echo '<h3 class="title-text mb-30">' . esc_html($appal_wp_form_social_text) . '</h3>'; ?>
                <ul class="clearfix">
                    <?php

                    foreach ($appal_wp_form_social_list as $item) {
                        echo '<li><a href="' . esc_url($item['appal_wp_form_social_link']) . '"><i class="' . esc_attr($item['appal_wp_form_social_icon']) . '"></i></a></li>';

                    } ?>
                </ul>

            </div>
            <!-- social-links - end
            ================================================== -->

        </div>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalWPFormWidget);
