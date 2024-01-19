<div class="slider-gallery">
   <?php
   // Query to get attachments (images) from the media library
   $args = array(
      'post_type'      => 'attachment',
      'post_mime_type' => 'image',
      'posts_per_page' => -1,
   );

   $attachments = get_posts($args);

   // Loop through the attachments and display them in the slider
   foreach ($attachments as $attachment) :
      $image_url = wp_get_attachment_url($attachment->ID);
   ?>
      <div class="slide">
         <img src="<?php echo esc_url($image_url); ?>" alt="Slide">
      </div>
   <?php endforeach; ?>
</div>