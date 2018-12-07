<?php

/*** Child Theme Function  ***/

function newsroom_elated_child_theme_enqueue_scripts() {

    $parent_style = 'newsroom_elated_default_style';

    wp_enqueue_style('newsroom_elated_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

define( 'MEDIA_TRASH', true );

add_action( 'wp_enqueue_scripts', 'newsroom_elated_child_theme_enqueue_scripts' );

/* Disable WordPress Admin Bar for all users but admins. */
  show_admin_bar(true);

/* remove unwanted html tags like <p> and </br> in posts */
remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );


add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
