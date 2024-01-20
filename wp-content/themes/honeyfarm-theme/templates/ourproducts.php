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
                    'posts_per_page' => -1,
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
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p>No posts found.</p>
                <?php endif; ?>

            </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>