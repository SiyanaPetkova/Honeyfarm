<?php
/*
Template Name: Honeyposts Page
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        $args = array(
            'post_type'      => 'honeypost',
            'posts_per_page' => 2,
            'paged'          => get_query_var('paged'),
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                ?>
                <div class="container-honeypost">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="noo-sh-title-top"><?php the_title(); ?></h2>
                            
                            <?php
                            if (has_post_thumbnail() ) {
                                the_post_thumbnail( 'custom-thumbnail-size' );
                            }
                            ?>

                            <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more-button">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <div class="pagination-container">
                <?php
                $GLOBALS['wp_query'] = $query;
                the_posts_pagination(array(
                    'mid_size'           => 2,
                    'prev_text'          => '<i class="fa fa-chevron-left"></i> ' . __( 'Previous', 'honeyfarm' ),
                    'next_text'          => __( 'Next', 'honeyfarm' ) . ' <i class="fa fa-chevron-right"></i>',
                    'screen_reader_text' => __( ' ' ),
                ));
                ?>
            </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </main>
</div>

<?php get_footer(); ?>