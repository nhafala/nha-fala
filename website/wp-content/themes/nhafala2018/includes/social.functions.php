<?php

function nhafala_social_likes($id = null)
{
  if (!$id) {
    $id = get_the_ID();
  }
  $post = get_post($id);
  if (isset($post->post_type) && $post->post_type) {
    ?>
<!--    <div class="social-likes " data-counters="no" data-url="--><?php //print get_permalink($id) ?><!--" data-title="--><?php //print get_the_title($id) ?><!--">-->
<!--      <div class="facebook" title="Share link on Facebook">Share</div>-->
<!--      <div class="twitter" title="Share link on Twitter">Tweet</div>-->
      <!-- <div class="plusone" title="Share link on Google+">Google+</div> -->
<!--      <div class="pinterest" title="Share image on Pinterest" data-media="">Pin</div>-->
<!--      -->
<!--    </div>-->
      <?php echo do_shortcode('[TheChamp-Sharing]') ?>
    <?php

  }
}