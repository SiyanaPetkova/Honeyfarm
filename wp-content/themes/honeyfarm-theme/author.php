<?php get_header(); ?>

    <div class="about-box-main">

        <?php if ( have_posts() ) : ?>
            
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'partials/content', 'post' ); ?>

        <?php endwhile; ?>    
        
        <div class="pagination-container">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2, 
                'prev_text' => '<i class="fa fa-chevron-left"></i> ' . __('Предишна', 'honeyfarm'),
                'next_text' => __('Следваща', 'honeyfarm') . ' <i class="fa fa-chevron-right"></i>',
                'screen_reader_text' => __(' '),
            ));
            ?>
        </div>

        <?php endif; ?>

    </div>

<?php get_footer(); ?>