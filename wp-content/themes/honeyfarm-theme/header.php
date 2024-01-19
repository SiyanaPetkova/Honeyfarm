<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php if ( is_singular() && get_option( 'thread_comments' )) wp_enqueue_script( 'comment-reply' ); ?>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
</head>

<body <?php body_class(); ?>>

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url( home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="logo" alt="">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- WordPress navigation menu -->
                <?php
                    wp_nav_menu( array(
                        'menu'           => 'primary-menu',
                        'menu_class'     => 'nav navbar-nav ml-auto',
                        'theme_location' => 'primary_menu',                        
                        'container_class'=> 'collapse navbar-collapse',
                        'container_id'   => 'navbar-menu',
                    ));
                ?>                  
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <!-- Cart items go here -->
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
</body>
</html>