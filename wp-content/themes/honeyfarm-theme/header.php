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

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item <?php echo is_front_page() ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo esc_url(home_url('/')); ?>">Начало</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/about' ) ); ?>">За нас</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/shop' ) ); ?>">Магазин</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/gallery' ) ); ?>">Галерия</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Контакти</a></li>
                    </ul>
                </div>
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