<?php get_header(); ?>

    <div class="about-box-main">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="container">
                    <div class="row">                      
                        <div class="col-lg-9">
                            <h2 class="noo-sh-title-top"><?php the_title(); ?></h2>
                            <div class="published-date">
                                <?php
                                    $display_date = get_field( 'show_publishdate' ); 

                                    if ( $display_date ) {
                                        echo 'Дата: ' . get_the_date();
                                    }
                                ?>
                            </div>
                            <p><?php the_content(); ?></p>                            
                        </div>
                        <div class="col-lg-3">                            
                            <?php
                                if ( is_active_sidebar( 'recent-posts' ) ) {
                                    get_sidebar( 'recent-posts' );
                                }
                            ?>                             
                        </div>                       
                    </div>                           
                 </div>
            <?php endwhile; else : ?>

        <?php endif; ?>

    </div>

<?php get_footer(); ?>