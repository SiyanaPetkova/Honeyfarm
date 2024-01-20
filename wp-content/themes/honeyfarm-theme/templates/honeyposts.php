<?php
/*
Template Name: Honeyposts Page
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        $args = array(
            'post_type' => 'honeypost', // Replace with your custom post type name
            'posts_per_page' => -1, // Display all posts
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Your loop content goes here
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="noo-sh-title-top"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p>No honeyposts found.</p>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>