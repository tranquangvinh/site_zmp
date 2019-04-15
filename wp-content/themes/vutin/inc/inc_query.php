<?php


function getPostsCached($args)
{
    $cacheName = "vutin_posts_" . md5(serialize($args));
    $posts = get_transient($cacheName);
    $debug = @$_GET['cache'];
    if (is_customize_preview() || $debug == 2) {
        $posts = false;
        delete_transient($cacheName);
    }

    if (current_user_can('editor') || current_user_can('administrator') ) {
        $posts = false;
        delete_transient($cacheName);
    }

    if (!$posts) {
        $posts = new WP_Query($args);
        if ($posts->have_posts()) {
            set_transient($cacheName, $posts);
        }
    } else {

    }

    return $posts;
}