<?php
echo '<!-- Start Packege-Pricing Section -->
        <section class="packege_pricing_area_2">             
                <div class="row ">
                    <div class="col-md-4 offset-md-4">
                        <div class="select_month_wrapper">
                            <input type="text" id="chose_plan" readonly> 
                            <span class="arrow" ></span>
                            <span class="split" ></span>
                            <ol class="option_list">
                                <li value="1" id="firstItem_plan">Monthly Plan</li>
                                <li value="2">Yearly Plan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            <div class="tab_wrapper">
                <div class="row tab_1 justify-content-center">';

if ($settings['price_list']) {

    foreach ($settings['price_list'] as $monthly) {

        echo '<div class="col-md-6 col-lg-4">
                        <div class="single_pakege_2">
                            <p class="sticker">' . $monthly['title'] . '</p>
                            <h2>' . $monthly['price'] . '</h2>
                            <ul class="pakege_service_list">';
                            ahope_list_control($monthly['features'], '');
                            echo'</ul>
                            <a ' . get_that_link($monthly['link']) . ' class="boxed_btn"><span>' . $monthly['button'] . '</span></a>   
                        </div>
                    </div>';

                    }
                }
                echo '</div>
                
                <div class="row tab_2 justify-content-center">';

if ($settings['y_price_list']) {

    foreach ($settings['y_price_list'] as $yearly) {

        echo '<div class="col-md-6 col-lg-4">
                        <div class="single_pakege_2">
                            <p class="sticker">' . $yearly['y_title'] . '</p>
                            <h2>' . $yearly['y_price'] . '</h2>
                            <ul class="pakege_service_list">';
                            ahope_list_control($yearly['y_features'], '');
                            echo'</ul>
                            <a ' . get_that_link($yearly['y_link']) . ' class="boxed_btn"><span>' . $yearly['y_button'] . '</span></a>   
                        </div>
                    </div>';

                    }
                }
                echo '</div>
        </section>
        <!-- End packege-Pricing Section -->

        ';