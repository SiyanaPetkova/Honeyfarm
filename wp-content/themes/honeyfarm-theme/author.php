<?php get_header(); ?>

    <div class="about-box-main">

        <?php
        // Get author's biographical info
        $author_id = get_query_var( 'author' );
        $author_bio = get_the_author_meta( 'description', $author_id );

        // Display author's biographical info
        if ( $author_bio ) {
            echo '<div class="author-bio-box">';
            echo '<div class="author-bio">' . wpautop( $author_bio ) . '</div>';
            echo '</div>';
        }
        ?>

        <?php if ( have_posts() ) : ?>
            
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'partials/content', 'post' ); ?>

        <?php endwhile; ?>    
        
        <div class="pagination-container">
            <?php
            the_posts_pagination(array(
                'mid_size'           => 2, 
                'prev_text'          => '<i class="fa fa-chevron-left"></i> ' . __( 'Previous', 'honeyfarm' ),
                'next_text'          => __( 'Next', 'honeyfarm' ) . ' <i class="fa fa-chevron-right"></i>',
                'screen_reader_text' => __( ' ' ),
            ));
            ?>
        </div>

        <?php endif; ?>

    </div>

<?php get_footer(); ?>