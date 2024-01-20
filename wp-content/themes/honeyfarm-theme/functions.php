<?php 

    add_theme_support( 'post-thumbnails');
    add_theme_support('custom-page-templates');

    /**
     * This function get all paths to the css and js files.
     * 
     */
    function honeyshop_assets( $hook ) {
        $args = array(
            'in-footer' => true,
            'Strategy'   => 'defer'
        );

        // Function to get file modification time as the version
        function get_file_version( $file_path ) {
            return filemtime( $file_path );
        }

        wp_enqueue_script( 'jquery' );

        $js_files = array(
            'popper.min',
            'bootstrap.min',
            'jquery.superslides.min',
            'jquery-ui.min',
            'bootstrap-select',
            'inewsticker',
            'bootsnav',
            'images-loded.min',
            'isotope.min',
            'owl.carousel.min',
            'baguetteBox.min',
            'form-validator.min',
            'custom'
        );

        foreach ( $js_files as $js_file ) {
            $file_path = get_template_directory() . '/js/' . $js_file . '.js';
            $version   = get_file_version( $file_path );

            wp_enqueue_script( $js_file, get_template_directory_uri() . '/js/' . $js_file . '.js', array(), $version, $args );
        }
        
        $css_files = array(
            'style',
            'bootstrap.min',
            'custom',
            'responsive'
        );

        foreach ( $css_files as $css_file ) {
            $file_path = get_template_directory() . '/css/' . $css_file . '.css';
            $version   = get_file_version( $file_path );

            wp_enqueue_style( $css_file, get_template_directory_uri() . '/css/' . $css_file . '.css', false, $version );
        }
    }

    add_action( 'wp_enqueue_scripts', 'honeyshop_assets' );  
    
    /**
     * Register navigation menus
     */
    function honeyfarm_register_nav_menus() {
        register_nav_menus(
            array(
                'primary_menu'      => __( 'Primary Menu', 'honeyfarm-theme' )               
            )
        );
    }
    add_action( 'after_setup_theme', 'honeyfarm_register_nav_menus' );
    
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

    /**
     * Register widget for custom sidebar
     */
     // 
    function register_custom_sidebar() {
        register_sidebar( array(
            'name'          => __( 'recent-posts'),
            'id'            => 'recent-posts',
            'description'   => __( 'Widgets in this area will display recent posts.', 'honeyfarm' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'register_custom_sidebar' );
