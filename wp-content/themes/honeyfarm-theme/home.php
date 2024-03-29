<?php get_header(); ?>

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <?php
        $theme_directory_uri = esc_url( get_template_directory_uri() );
        $slide_images = array(
            $theme_directory_uri . '/images/banner-01.jpg',
            $theme_directory_uri . '/images/banner-02.jpg',
            $theme_directory_uri . '/images/banner-03.jpg'
        );

        foreach ( $slide_images as $image_url ) :
        ?>
            <li class="text-center">
                <img src="<?php echo esc_url( $image_url ); ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong><?php echo esc_html( get_bloginfo('name') ); ?></strong></h1>                                
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<div class="box-add-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/add-img-01.jpg" class="logo" alt="">					
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/add-img-02.jpg" class="logo" alt="">	
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Blog -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Last bee-news</h1>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            // Custom query to get featured posts
            $args = array(
                'post_type'      => 'honeypost',
                'posts_per_page' => 3,
                'meta_key'       => 'is_featured', 
                'meta_value'     => '1', // '1' means the post is featured
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $featured_query = new WP_Query( $args );   
            
            while ( $featured_query->have_posts() ) : $featured_query->the_post();
                ?>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                        <a href="<?php the_permalink(); ?>" target="_blank">
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'full', array( 'class' => 'img-fluid') ); 
                            } else {
                                $post_id = $post->ID;
                                $post_content = get_post_field( 'post_content', $post_id );

                                preg_match( '/<img[^>]+>/i', $post_content, $matches );

                                if (!empty($matches[0])) {
                                    echo $matches[0]; 
                                } else {                                    
                                    $default_image_path = get_template_directory_uri() . '/images/default-image.jpg';
                                    $default_image = '<img class="img-fluid" src="' . esc_url( $default_image_path ) . '" alt="Default Image">';
                                    echo $default_image;                                                                    
                                }
                            }
                            ?>
                        </a>
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;

            wp_reset_postdata();
            ?>

        </div>
    </div>
</div>
<!-- End Blog -->

<!-- Start Gallery Feed -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <?php
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'posts_per_page' => 10,
            'order'          => 'DESC',
            'orderby'        => 'rand', 
        );

        $attachments = get_posts( $args );

        foreach ( $attachments as $attachment ) {
            $image_url = wp_get_attachment_image_url( $attachment->ID, 'full' );

            $image_dimensions = wp_get_attachment_metadata( $attachment->ID );

            // Check if it's a portrait image (height greater than width)
            if ($image_url && isset( $image_dimensions['width'], $image_dimensions['height']) && $image_dimensions['height'] > $image_dimensions['width'] ) {
                ?>
                <div class="item">
                    <div class="ins-inner-box">
                        <img class="custom-image" src="<?php echo esc_url( $image_url ); ?>" alt="">
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<!-- End Gallery Feed -->

<?php get_footer(); ?>



 

                                

    