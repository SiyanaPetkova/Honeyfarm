<?php get_header(); ?>

<div class="about-box-main">    
    <div class="container">
        <div class="row">                      
            <div class="col-lg-12">
                <h2 class="noo-sh-title-top">May be you are lost?</h2>
                <h3>404 - Page not found.</h3>

                <?php
                    $image_url = get_template_directory_uri() . '/images/not-found-404.gif';
                ?>

                <img src="<?php echo esc_url( $image_url ); ?>" alt="Not Found" style="max-width: 100%; height: auto;">
            </div>
        </div>          
    </div> 
</div>

<?php get_footer(); ?>