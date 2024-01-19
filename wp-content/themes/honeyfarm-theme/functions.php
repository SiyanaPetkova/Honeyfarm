<?php 

    add_theme_support( 'post-thumbnails');

    /**
     * This function get all paths to the css and js files.
     * 
     */
    function honeyshop_assets( $hook ){        
        $args = array(
            'in-footer' => true,
            'Strategy' => 'defer'
        );  

        wp_enqueue_script( 'jquery' );   

        wp_enqueue_script( 'popper.min', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', $args );
        
        wp_enqueue_script( 'jquery.superslides.min', get_template_directory_uri() . '/js/jquery.superslides.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'jquery-ui.min', get_template_directory_uri() . '/js/jquery-ui.js', array(), '1.0.0', $args );

        wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'inewsticker', get_template_directory_uri() . '/js/inewsticker.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'bootsnav', get_template_directory_uri() . '/js/bootsnav.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'images-loded.min', get_template_directory_uri() . '/js/images-loded.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'isotope.min', get_template_directory_uri() . '/js/isotope.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'baguetteBox.min', get_template_directory_uri() . '/js/baguetteBox.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'form-validator.min', get_template_directory_uri() . '/js/form-validator.min.js', array(), '1.0.0', $args );
        wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.1', $args );
       
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', false, '1.0.0' );
        wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.0.0' );
        wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', false, '1.0.0' );
        wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', false, '1.0.0' );       
    }

    add_action( 'wp_enqueue_scripts', 'honeyshop_assets' );   
    
    /**
     * This function add customize site identity WP Dashboard to change dynamicly address, phone, email and working days.
     */
    function custom_theme_customize_register( $wp_customize ) {
        // Address Setting
        $wp_customize->add_setting( 'address_setting', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
        $wp_customize->add_control( 'address_setting', array(
            'label'    => esc_html__( 'Address', 'honeyfarm' ),
            'section'  => 'title_tagline',
            'priority' => 10,
        ) );
    
        // Phone Setting
        $wp_customize->add_setting( 'phone_setting', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
        $wp_customize->add_control( 'phone_setting', array(
            'label'    => esc_html__( 'Phone', 'honeyfarm' ),
            'section'  => 'title_tagline',
            'priority' => 20,
        ) );
    
        // Email Setting
        $wp_customize->add_setting( 'email_setting', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
        ) );
    
        $wp_customize->add_control( 'email_setting', array(
            'label'    => esc_html__( 'Email', 'honeyfarm' ),
            'section'  => 'title_tagline',
            'priority' => 30,
        ) );    

        // Register settings for each day of the week
        $days_of_week = array( 'Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота', 'Неделя' );

        foreach ($days_of_week as $day) {
            $wp_customize->add_setting( 'working_hours_' . $day . '_closed_setting', array(
                'default'           => false,
                'sanitize_callback' => 'sanitize_checkbox',
            ));

            $wp_customize->add_setting( 'working_hours_' . $day . '_start_setting', array(
                'default'           => '09:00',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_setting( 'working_hours_' . $day . '_end_setting', array(
                'default'           => '17:00', 
                'sanitize_callback' => 'sanitize_text_field',
            ));

            // Adding control for the checkbox to mark the day as closed
            $wp_customize->add_control( 'working_hours_' . $day . '_closed_setting', array(
                'label'    => esc_html__('Closed (' . ucfirst($day) . ')', 'honeyfarm'),
                'section'  => 'title_tagline',
                'type'     => 'checkbox',
                'priority' => 32, 
            ));

            // Adding control for the starting time dropdown, only if the day is not marked as closed
            if (get_theme_mod( 'working_hours_' . $day . '_closed_setting' ) !== true) {
                $wp_customize->add_control('working_hours_' . $day . '_start_setting', array(
                    'label'    => esc_html__( 'Start Time (' . ucfirst($day) . ')', 'honeyfarm' ),
                    'section'  => 'title_tagline',
                    'type'     => 'select',
                    'choices'  => generate_24_hour_options(),
                    'priority' => 33,
                ));

                // Adding control for the ending time dropdown, only if the day is not marked as closed
                $wp_customize->add_control( 'working_hours_' . $day . '_end_setting', array(
                    'label'    => esc_html__( 'End Time (' . ucfirst($day) . ')', 'honeyfarm' ),
                    'section'  => 'title_tagline',
                    'type'     => 'select',
                    'choices'  => generate_24_hour_options(),
                    'priority' => 34, 
                ));
            }
        }
    }

     /**
     * Function to generate 24-hour options in the working hours function
     */
     // 
     function generate_24_hour_options() {
        $options = array();
        for ($hour = 0; $hour < 24; $hour++) {
            $formatted_hour = sprintf('%02d:00', $hour);
            $options[$formatted_hour] = esc_html($formatted_hour);
        }
        return $options;
    }

     /**
     * Sanitize checkbox value
     */
     //    
    function sanitize_checkbox( $input ) {
        return ( isset( $input ) && true == $input ) ? true : false;
    }   
    
    add_action( 'customize_register', 'custom_theme_customize_register' );

    