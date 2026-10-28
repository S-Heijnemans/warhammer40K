
<?php

function warhammer_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'warhammer_theme_setup');


function warhammer_theme_styles() {
    wp_enqueue_style(
        'warhammer-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'warhammer_theme_styles');


function warhammer_get_gallery_images($limit = 8) {
    return get_posts(array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_status'    => 'inherit',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));
}
