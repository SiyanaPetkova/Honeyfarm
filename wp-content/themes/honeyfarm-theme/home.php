<?php get_header(); ?>

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <?php
        // Get the slide images dynamically
        $theme_directory_uri = esc_url(get_template_directory_uri());
        $slide_images = array(
            $theme_directory_uri . '/images/banner-01.jpg',
            $theme_directory_uri . '/images/banner-02.jpg',
            $theme_directory_uri . '/images/banner-03.jpg'
        );

        foreach ($slide_images as $image_url) :
        ?>
            <li class="text-center">
                <img src="<?php echo esc_url($image_url); ?>" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong><?php the_title(); ?></strong></h1>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
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
						<img class="img-fluid" src="http://localhost/honeyfarm/wp-content/themes/honeyfarm-theme/images/add-img-01.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="http://localhost/honeyfarm/wp-content/themes/honeyfarm-theme/images/add-img-02.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Fruits & Vegetables</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top featured</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="http://localhost/honeyfarm/wp-content/themes/honeyfarm-theme/images/img-pro-01.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $7.79</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">New</p>
                            </div>
                            <img src="http://localhost/honeyfarm/wp-content/themes/honeyfarm-theme/images/img-pro-02.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $9.79</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="http://localhost/honeyfarm/wp-content/themes/honeyfarm-theme/images/img-pro-03.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $10.79</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="http://localhost/honeyfarm/wp-content/themes/honeyfarm-theme/images/img-pro-04.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $15.79</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->

<!-- Start Blog -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Последни статии</h1>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            // Custom query to get featured posts
            $args = array(
                'post_type'      => 'honeypost',
                'posts_per_page' => 3,
                'meta_key'       => 'is_featured', // Adjust the meta key
                'meta_value'     => '1', // '1' means the post is featured
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $featured_query = new WP_Query($args);   
            
            while ($featured_query->have_posts()) : $featured_query->the_post();
                ?>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                        <a href="<?php the_permalink(); ?>" target="_blank">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', array('class' => 'img-fluid')); 
                            } else {
                                $post_id = $post->ID;
                                $post_content = get_post_field('post_content', $post_id);

                                preg_match('/<img[^>]+>/i', $post_content, $matches);

                                if (!empty($matches[0])) {
                                    echo $matches[0]; //
                                } else {
                                    // If no images are attached or found, use a default image
                                    $default_image = '<img class="img-fluid" src="' . 'C:/xampp/htdocs/honeyfarm/wp-content/themes/honeyfarm-theme/images/default-image.jpg' . '" alt="Default Image">';
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
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
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
    <!-- Start Gallery Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <?php
            // Query to get the last 10 images from the gallery
            $args = array(
                'post_type'      => 'attachment',
                'post_mime_type' => 'image',
                'posts_per_page' => 10,
                'order'          => 'DESC',
                'orderby'        => 'date',
            );

            $attachments = get_posts($args);

            foreach ($attachments as $attachment) {
                $image_url = wp_get_attachment_image_src($attachment->ID, 'full')[0];

                if ($image_url) {
                    echo '<div class="item">';
                    echo '<div class="ins-inner-box">';
                    echo '<img src="' . esc_url($image_url) . '" alt="" />';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <!-- End Gallery Feed  -->

    <?php get_footer(); ?>



 

                                

    