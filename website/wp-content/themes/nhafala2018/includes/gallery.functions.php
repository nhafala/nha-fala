<?php

remove_shortcode('gallery');

add_shortcode('gallery', 'sneaker_parse_gallery_shortcode');

function sneaker_parse_gallery_shortcode($atts)
{
    global $post;

    if (!empty($atts['ids'])) {
        if (empty($atts['orderby'])) {
            $atts['orderby'] = 'post__in';
        }
        $atts['include'] = $atts['ids'];
    }

    extract(
        shortcode_atts(
            array(
            'orderby' => 'menu_order ASC, ID ASC',
            'include' => '',
            'id' => $post->ID,
            'itemtag' => 'dl',
            'icontag' => 'dt',
            'captiontag' => 'dd',
            'columns' => 3,
            'size' => 'medium',
            'link' => 'file',
            ),
            $atts
        )
    );

    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image',
        'orderby' => $orderby,
    );

    if (!empty($include)) {
        $args['include'] = $include;
    } else {
        $args['post_parent'] = $id;
        $args['numberposts'] = -1;
    }

    $images = get_posts($args);

    $out = '';

    if (count($images)) :
        $out .= "<div class='gallery sneaker-gallery gallery-columns-{$atts['columns']}'>";
        foreach ($images as $image) {
            $fullSize = wp_get_attachment_image_src($image->ID, 'nhafala-gallery-full');

            $smallSize = wp_get_attachment_image_src($image->ID, 'thumbnail');

            $out .= "
            <figure class='gallery-item'>
              <div class='gallery-icon'>
              <a href='{$fullSize[0]}' rel='gallery-{$post->ID}' class='swipebox'>
                <img src='{$smallSize[0]}' alt='{$image->post_title}' width='{$smallSize[1]}' height='{$smallSize[2]}' class='gallery-thumbnail'>
              </a>
              </div>
            </figure>";
        }
        $out .= '</div>';
    endif;

    return $out;
}
