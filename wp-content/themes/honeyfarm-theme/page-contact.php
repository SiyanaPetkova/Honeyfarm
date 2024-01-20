<?php get_header(); ?>

<!-- Start Contact Us  -->
<div class="contact-box-main">

    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Адрес: <?php echo get_theme_mod( 'address_setting' ); ?></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Телефон: <a href="tel:<?php echo get_theme_mod( 'phone_setting' ); ?>"><?php echo get_theme_mod('phone_setting'); ?></a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:<?php echo get_theme_mod( 'email_setting' ); ?>"><?php echo get_theme_mod('email_setting'); ?></a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; else : ?>

    <?php endif; ?>

</div>
<!-- End Contact Us -->

<?php get_footer(); ?>