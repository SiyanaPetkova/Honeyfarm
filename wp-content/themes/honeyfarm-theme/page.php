<?php get_header(); ?>

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