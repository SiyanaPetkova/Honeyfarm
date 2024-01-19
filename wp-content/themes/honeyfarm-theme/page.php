<?php get_header(); ?>

    <!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><?php the_title(); ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Начало</a></li>
                    <li class="breadcrumb-item active"><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <div class="about-box-main">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="noo-sh-title-top"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>          
                 </div>
 
            <?php endwhile; else : ?>

        <?php endif; ?>

    </div>

<?php get_footer(); ?>