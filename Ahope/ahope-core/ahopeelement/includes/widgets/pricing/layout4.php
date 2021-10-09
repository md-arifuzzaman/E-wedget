<?php
echo '<!-- Start Packege-Pricing Section -->
    <section class="packege_pricing_area_5">         
            <div class="row">
                <div class="col-md-4 offset-md-4 col-lg-3 offset-lg-0 ">
                    <div class="pricing_tabling d-flex flex-column justify-content-center align-items-center">
                        <div class="select_month_wrapper">
                            <input type="text" id="chose_plan" readonly>
                            <span class="arrow"></span>
                            <span class="split"></span>
                            <ol class="option_list">
                                <li value="1" id="firstItem_plan">Monthly Plan</li>
                                <li value="2">Yearly Plan</li>
                            </ol>
                        </div>
                        <h3>Pricing Package</h3>
                    </div>
                </div>
            </div>
        <div class="nogap tab_wrapper">
            <div class="row tab_1">
                
                <div class="col-sm-12 col-md-4 col-lg-3 d-none d-lg-block">
                    <div class="single_pakege_5 item_list">
                        <div class="pricing_top">
                        </div>
                        <ul class="pakege_service_list">
                            <li>Storage</li>
                            <li>Bandwith</li>
                            <li>VPSt</li>
                            <li>SSL</li>
                            <li>24/7 Live Support</li>
                            <li>Domain</li>
                            <li>Free Domain</li>
                            <li>Database</li>
                            <li>cPanel</li>
                            <li>CLI & API</li>
                            <li>DNS</li>
                        </ul>
                        <div class="pricing_footer">
                        </div>
                    </div>
                </div>';

if ($settings['price_list']) {

    foreach ($settings['price_list'] as $monthly) {

        echo '<div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="single_pakege_5 pro">
                        <div class="pricing_top d-flex justify-content-center flex-column align-items-center">
                            <p class="plan_titel">' . $monthly['title'] . '</p>
                            <h2 class="price">' . $monthly['price'] . '</h2>
                        </div>
                        <ul class="pakege_service_list">';
                            ahope_list_control($monthly['features'], '<i class="ti-check"></i>');
                         echo'</ul>
                        <div class="pricing_footer">
                            <a ' . get_that_link($monthly['link']) . ' class="boxed_btn"><span>' . $monthly['button'] . '</span></a>
                        </div>
                    </div>
                </div>';

                }
            }
            echo '</div>
            <div class="row tab_2">
                
                <div class="col-sm-12 col-md-4 col-lg-3 d-none d-lg-block">
                    <div class="single_pakege_5 item_list">
                        <div class="pricing_top">
                        </div>
                        <ul class="pakege_service_list">
                            <li>Storage</li>
                            <li>Bandwith</li>
                            <li>VPSt</li>
                            <li>SSL</li>
                            <li>24/7 Live Support</li>
                            <li>Domain</li>
                            <li>Free Domain</li>
                            <li>Database</li>
                            <li>cPanel</li>
                            <li>CLI & API</li>
                            <li>DNS</li>
                        </ul>
                        <div class="pricing_footer">
                        </div>
                    </div>
                </div>';

if ($settings['y_price_list']) {

    foreach ($settings['y_price_list'] as $yearly) {

        echo '<div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="single_pakege_5 pro">
                        <div class="pricing_top d-flex justify-content-center flex-column align-items-center">
                            <p class="plan_titel">' . $yearly['y_title'] . '</p>
                            <h2 class="price">' . $yearly['y_price'] . '</h2>
                        </div>
                        <ul class="pakege_service_list">';
                            ahope_list_control($yearly['y_features'], '<i class="ti-check"></i>');
                         echo'</ul>
                        <div class="pricing_footer">
                            <a ' . get_that_link($yearly['y_link']) . ' class="boxed_btn"><span>' . $yearly['y_button'] . '</span></a>
                        </div>
                    </div>
                </div>';

                }
            }
            echo '</div>
        </div>
    </section>
    <!-- End packege-Pricing Section -->';