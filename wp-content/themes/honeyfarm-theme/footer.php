<!-- Start Footer -->
<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="footer-top-box">
                    <h3>Работно време</h3>
                    <ul class="list-time">
                        <?php
                        $days_of_week = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );

                        foreach ( $days_of_week as $day ) {
                            $is_closed = get_theme_mod( 'working_hours_' . $day . '_closed_setting', false );

                            if ($is_closed) {
                                echo '<li>' . ucfirst( $day ) . ': Closed</li>';
                            } else {
                                $start_time = get_theme_mod( 'working_hours_' . $day . '_start_setting', '09:00' );
                                $end_time   = get_theme_mod( 'working_hours_' . $day . '_end_setting', '17:00' );

                                echo '<li>' . ucfirst( $day ) . ': ' . esc_html( $start_time ) . ' to ' . esc_html( $end_time ) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Contact us</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: <?php echo get_theme_mod( 'address_setting' ); ?></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone number: <a href="tel:<?php echo get_theme_mod( 'phone_setting' ); ?>"><?php echo get_theme_mod('phone_setting'); ?></a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:<?php echo get_theme_mod( 'email_setting' ); ?>"><?php echo get_theme_mod('email_setting'); ?></a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... Footer Copyright -->
    <div class="footer-copyright">
        <p class="footer-company">
            <?php echo esc_html__( 'All Rights Reserved. &copy;', 'honeyfarm' ); ?> 
            <?php echo date( 'Y' ); ?> 
            <a href="#"><?php echo get_bloginfo( 'name' ); ?></a> 
            <?php esc_html_e( 'Design By :', 'honeyfarm' ); ?>
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

</footer>

</body>

</html>