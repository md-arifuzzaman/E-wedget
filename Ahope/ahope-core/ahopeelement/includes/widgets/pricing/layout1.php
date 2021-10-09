<?php
echo '<!-- Start Packege-Pricing Section -->
    <section class="packege_pricing_area_11">
            <div class="row">
                    <div class="col-md-6 offset-md-3 d-flex justify-content-center">
                        <div class="wrapper">
							<div class="toggle_radio">
								<input type="radio" class="toggle_option" id="first_toggle" name="toggle_option" checked>
								<label for="first_toggle">Monthly</label>
								<input type="radio" class="toggle_option" id="second_toggle" name="toggle_option">
								<label for="second_toggle">Yearly</label>
								<div class="toggle_option_slider">
								</div>
							</div>
                    	</div>
                    </div>
                </div>
                <div class="tab_wrapper">
            <div class="row tab_1 justify-content-center">';

if ($settings['price_list']) {

    foreach ($settings['price_list'] as $monthly) {

        echo '<div class="col-md-6 col-lg-4">
                    <div class="single_pakege_11">
                        <p class="sticker">' . $monthly['title'] . '</p>
                        <div class="pakege_icon">
                            '.get_that_image($monthly['photo']).'
                        </div>
                        <ul class="pakege_service_list">';
        ahope_list_control($monthly['features'], '<i class="fas fa-check-circle"></i>');
        echo'</ul>
                        <h2>' . $monthly['price'] . '</h2>
                        <p>' . $monthly['sub'] . '</p>
                        <a ' . get_that_link($monthly['link']) . '  class="boxed_btn"><span>' . $monthly['button'] . '</span></a>
                    </div>
                </div>';

    }
}
echo '</div>
     
                <div class="row tab_2 justify-content-center">';

if ($settings['y_price_list']) {

    foreach ($settings['y_price_list'] as $yearly) {

        echo '<div class="col-md-6 col-lg-4">
                    <div class="single_pakege_11">
                        <p class="sticker">' . $yearly['y_title'] . '</p>
                        <div class="pakege_icon">
                            '.get_that_image($yearly['y_photo']).'
                        </div>
                        <ul class="pakege_service_list">';
        ahope_list_control($yearly['y_features'], '<i class="fas fa-check-circle"></i>');
        echo'</ul>
                        <h2>' . $yearly['y_price'] . '</h2>
                        <p>' . $yearly['y_sub'] . '</p>
                        <a ' . get_that_link($yearly['y_link']) . '  class="boxed_btn"><span>' . $yearly['y_button'] . '</span></a>
                    </div>
                </div>';

                    }
                }
                echo '</div>
</div>
    </section>
    <!-- End packege-Pricing Section -->

        ';