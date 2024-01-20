<?php get_header(); ?>

    <div class="about-box-main">

        <?php if ( have_posts() ) : ?>
            
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'partials/content', 'post' ); ?>

        <?php endwhile; ?>    
        
        <div style="text-align:center;">
            <?php
            the_posts_pagination( array(
                 'mid_size'  => 1,
                 'prev_text' => __( 'Previous', 'honeyfarm' ),
                 'next_text' => __( 'Next', 'honeyfarm' ),
            ) );
            ?>
        </div>

        <?php endif; ?>

    </div>

<?php get_footer(); ?>