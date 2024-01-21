<?php
/*
Template Name: All Posts Page
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container">
            <div class="row">

                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 5,
                    'paged'          => get_query_var( 'paged' )
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="col-md-3 mb-4">
                            <div class="card custom-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text small"><?php echo wp_trim_words( get_the_excerpt(), 5 ); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-warning">Повече</a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pagination-container">
                        <?php
                        $GLOBALS['wp_query'] = $query;
                        the_posts_pagination( array (
                                'mid_size'  => 2,
                                'prev_text' => '<i class="fa fa-chevron-left"></i> ' . __('Предишна', 'honeyfarm'),
                                'next_text' => __('Следваща', 'honeyfarm') . ' <i class="fa fa-chevron-right"></i>',
                                'screen_reader_text' => __(' '),
                            ));
                            ?>
                        </div>
                    </div>
                </div>

                <?php wp_reset_postdata(); ?>

                <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>