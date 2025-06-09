<?php

/**
 * Настройка поддержки features для темы
 */


if (!function_exists( 'safari_theme_setup' ) ) {
    function safari_theme_setup() {
        /**
         * Меню
         */
        register_nav_menus( array(
            'footer' => __( 'Footer Menu' ),
            'main' => __( 'Main Menu' ),
            'side' => __( 'SideBar Menu' ),
            'side2' => __( 'SideBar Menu 2' )
        ) );

        /**
         * Пресеты для работы с картинками
         * @see https://developer.wordpress.org/reference/functions/add_image_size/
         */
        add_image_size( 'safari-220x159', 220, 159, true );
        add_image_size( 'safari-460x270', 460, 270, true );
        add_image_size( 'safari-460x300', 460, 300, true );
        add_image_size( 'safari-540x310', 540, 310, true );
        add_image_size( 'safari-610x300', 610, 300, true );
        add_image_size( 'safari-940x250', 940, 250, true );
        add_image_size( 'safari-1296x345', 1296, 345, true );

        /**
         * Превью для кастомайзерв
         */
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
    }
}

add_action( 'after_setup_theme', 'safari_theme_setup' );

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
