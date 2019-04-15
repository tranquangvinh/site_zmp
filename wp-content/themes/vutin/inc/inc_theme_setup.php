<?php

class theme_setupt_theme {
    public static function enqueue_scripts() {
        foreach (config::$css as $name => $css) {
            wp_enqueue_style( $name, THEME_URL . $css,'' , VERSION_ASSET );
        }

        foreach (config::$js as $name => $js) {
            wp_enqueue_script( $name, THEME_URL . $js, array('jquery') , VERSION_ASSET, true );
        }
    }

    public static function admin_enqueue_scripts() {
        foreach (config::$jsAdmin as $name => $js) {
            wp_enqueue_script( $name, THEME_URL . $js, array('jquery') , VERSION_ASSET, true );
        }

        foreach (config::$cssAdmin as $name => $css) {
            wp_enqueue_style( $name, THEME_URL . $css, array() , VERSION_ASSET, 'all' );
        }

    }

    public static function after_setup_theme() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support('woocommerce');

        register_nav_menus( config::$menus );

        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        add_editor_style( array(
            THEME_URL . 'assets/css/editor-style.css',
        ));
    }

    public static function widgets_init() {
        foreach (config::$widgets as $widget) {
            register_sidebar( $widget );
        }
    }
}