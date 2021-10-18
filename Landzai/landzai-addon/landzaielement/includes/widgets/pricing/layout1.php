<?php
    echo '    <!-- price-table-area  start here  -->
    <section class="price-table-area section" id="price">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">'.$settings['stitle'].'</h2>
                        <p class="sub-title">'.$settings['sinfo'].'</p>
                       </div>
                </div>
            </div>
            <div class="price-table-list m-b-30">
                <div class="primary-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="true">Billed Monthly</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="annually-tab" data-toggle="tab" href="#annually" role="tab" aria-controls="annually" aria-selected="false">Billed Annually</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">';
                    if ($settings['price_list']) {
                        foreach ($settings['price_list'] as $monthly) {
                            echo '<div class="col-lg-4 col-md-6">
                                    <div class="single-price ' . $monthly['active'] . '">
                                        <div class="price-header">
                                            <h2 class="price">' . $monthly['price'] . '</h2>
                                            <h3 class="package-name">' . $monthly['title'] . ' </h3>
                                            <p class="package-desc">' . $monthly['sub'] . '</p>
                                        </div>
                                        <div class="price-body">
                                            <ul class="feature-lsit">';
                                              landzai_list_control($monthly['features'], '');
                                            echo '</ul>
                                        </div>
                                        <div class="price-footer">
                                            <a ' . get_that_link($monthly['link']) . ' class="primary-btn">' . $monthly['button'] . ' <i class="icon fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                    echo '</div>
                        </div>
                        <div class="tab-pane fade" id="annually" role="tabpanel" aria-labelledby="annually-tab">
                            <div class="row">';

                    if ($settings['y_price_list']) {

                        foreach ($settings['y_price_list'] as $yearly) {

                            echo '<div class="col-lg-4 col-md-6">
                                    <div class="single-price ' . $monthly['y_active'] . '">
                                        <div class="price-header">
                                            <h2 class="price">' . $yearly['y_price'] . '</h2>
                                            <h3 class="package-name">' . $yearly['y_title'] . '</h3>
                                            <p class="package-desc">' . $yearly['y_sub'] . '</p>
                                        </div>
                                        <div class="price-body">
                                            <ul class="feature-lsit">';
                                               landzai_list_control($yearly['y_features'], '');
                                            echo '</ul>
                                        </div>
                                        <div class="price-footer">
                                            <a ' . get_that_link($yearly['y_link']) . ' class="primary-btn">' . $yearly['y_button'] . ' <i class="icon fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>';

                            }
                        }
                        echo '</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- price-table-area  end here  -->';