<?php

add_shortcode('mbn_product_by_tag', function($atts){
    $limit = isset($atts['limit']) ? $atts['limit'] : 8;
    $tag = isset($atts['tag']) ? $atts['tag'] : '';
    return do_shortcode('[products limit="'. $limit .'" tag="'. $tag .'"]');
});

