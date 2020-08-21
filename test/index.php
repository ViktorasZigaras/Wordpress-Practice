<?php

/**
* Plugin Name: Very First Plugin
* Plugin URI: https://www.yourwebsiteurl.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Your Name Here
* Author URI: http://yourwebsiteurl.com/
**/

add_action( 'admin_menu', function(){
    add_menu_page('event_title', 'event_menu', 'manage_options', 'event_slug', 'render_event_function');
    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null );
    // add_submenu_page('bebras', 'Page title 2', 'Menu title 2', 'manage_options', 'bebras2', 'bebro_funkcija2');
    // add_submenu_page('bebras', 'Edit', null, 'manage_options', 'bebras3', 'bebro_funkcija3');
});

function your_login_function()
{
    if (isset($_POST['event'])) {
        $post = [
            'post_title'   => $_POST['title'],
            'post_content' => 'post_content',
            'post_status'  => 'publish',
            'post_author'  => 1, //get_current_user_id()
            'post_type'     => 'Event',
            // categories 8 + 29? pages don't show!
            'meta_input'   => [
                'text' => $_POST['text'],
                'data' => $_POST['date']
            ],
        ];
        wp_insert_post($post);
        // exit;
        // $_POST['event'] = null;
    }
}
add_action('init', 'your_login_function');

function render_event_function()
{
    echo count(get_posts()) . ' count <br><br>';

    $posts = get_posts([
        'post_type' => 'Event',
        'post_status' => 'publish',
        'numberposts' => -1
        // 'order'    => 'ASC'
    ]);

    foreach ($posts as $post) {
        echo '<br><br>';
        echo 'ID: ' . $post->ID . '<br>';
        echo 'post_type: ' . $post->post_type . '<br>';
        echo 'post_title: ' . $post->post_title . '<br>';
        echo 'post_name: ' . $post->post_name . '<br>';

        echo 'post_author: ' . $post->post_author . '<br>';
        echo 'post_date: ' . $post->post_date . '<br>';
        echo 'post_modified: ' . $post->post_modified . '<br>';

        echo 'guid: <a href="' . $post->guid . '">' . $post->guid . '</a><br>';
        
        echo 'post_content: ' . $post->post_content . '<br>';
        // print_r($post);
        echo '<br><br>';
        
        // WP_Post Object ( [ID] => 7 [post_author] => 1 [post_date] => 2020-08-21 13:46:27 [post_date_gmt] => 2020-08-21 13:46:27 [post_content] => post_content [post_title] => testing [post_excerpt] => [post_status] => publish [comment_status] => closed [ping_status] => closed [post_password] => [post_name] => testing [to_ping] => [pinged] => [post_modified] => 2020-08-21 13:46:27 [post_modified_gmt] => 2020-08-21 13:46:27 [post_content_filtered] => [post_parent] => 0 [guid] => http://localhost/wordpress/event/testing/ [menu_order] => 0 [post_type] => event [post_mime_type] => [comment_count] => 0 [filter] => raw )
    }

    echo '<br>
        <form method="POST" action="">
            <input type="hidden" name="event" value="new event">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="title" class="">
            </div>
            <div class="form-group">
                <label>Text</label>
                <input type="text" name="text" value="text" class="">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" name="date" value="date" class="">
            </div>
            <button type="submit" class="">ADD</button>
        </form>
    <br>';
}

add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/css/admin.css');
    // wp_enqueue_style( 'admin_css_bar', get_template_directory_uri() . '/admin-style-bar.css', false, '1.0.0' );
    //   echo '<style>
    //   .red {
    //     color: red;
    // }
    //   </style>';
    // include('css/admin.css');
}  

// add_action('admin_head', 'my_custom_fonts');
 
add_action('init', 'create_event_post_type');
function create_event_post_type() {
    $labels = [
        'name'               => 'Event',
        'singular_name'      => 'Event',
        'add_new'            => 'new Event',
        'add_new_item'       => __( 'Add New Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'new_item'           => __( 'New Event' ),
        'all_items'          => __( 'All Events' ),
        'view_item'          => __( 'View Event' ),
        'search_items'       => __( 'Search Events' ),
        'not_found'          => __( 'No Events found' ),
        'not_found_in_trash' => __( 'No Events found in the Trash' ), 
        'menu_name'          => 'Events'
    ];
    $args = [
        'labels'        => $labels,
        'description'   => 'Event Type Posts',
        'public'        => true,
        'menu_position' => 15,
        'supports'      => [],
        'has_archive'   => true,
    ];
    register_post_type('event', $args); 
}