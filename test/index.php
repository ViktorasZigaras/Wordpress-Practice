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
    add_menu_page('page_title', 'menu_title', 'manage_options', 'menu_slug', 'render_function');
});
 
// function bebro_funkcija()
// {
//     echo '<h1>Aš Esu Bebras</h1>';
// }
// add_menu_page('page_title', 'menu_title', 'manage_options', 'menu_slug', 'render_function');
// add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null );

function render_function()
{
    echo 'rendering';
}

// <?php
// /**
// * Plugin Name: Bebro pluginas
// * Plugin URI: https://www.bebbr.com/
// * Description: This is the very first plugin I ever created.
// * Version: 1.0
// * Author: Your Name Here
// * Author URI: http://bebbr.com/
// **/
 
// add_action( 'admin_menu', function(){
//     add_menu_page('Bebro Puslapis', 'Bebras', 'manage_options', 'bebras', 'bebro_funkcija');
 
// add_submenu_page('bebras', 'Page title 2', 'Menu title 2',
//     'manage_options', 'bebras2', 'bebro_funkcija2');


 
// add_submenu_page('bebras', 'Edit', null,
//     'manage_options', 'bebras3', 'bebro_funkcija3');
 
// });
 
// add_action( 'init', function() {
//     $labels = [
//       'name'               => 'Calendar',
//       'singular_name'      => 'Calendar',
//       'add_new'            => 'new Calendar',
//       'add_new_item'       => __( 'Add New Product' ),
//       'edit_item'          => __( 'Edit Product' ),
//       'new_item'           => __( 'New Product' ),
//       'all_items'          => __( 'All Products' ),
//       'view_item'          => __( 'View Product' ),
//       'search_items'       => __( 'Search Products' ),
//       'not_found'          => __( 'No products found' ),
//       'not_found_in_trash' => __( 'No products found in the Trash' ), 
//       'menu_name'          => 'Products'
//     ];
//     $args = [
//       'labels'        => $labels,
//       'description'   => 'Holds our products and product specific data',
//       'public'        => true,
//       'menu_position' => 5,
//       'supports'      => [],
//       'has_archive'   => true,
//     ];
// register_post_type('event', $args ); 
// });
 
// function bebro_funkcija()
// {
//     echo '<h1>Aš Esu Bebras</h1>';
 
//     $post = [
//         'post_title'   => 'Test post-----------',
//         'post_content' => '',
//         'post_status'  => 'publish',
//         'post_author'  => 1,
//         'meta_input'   => [
//             'text' => 'ivykio tekstas---------',
//             // 'data' => $_POST['event_date']
//         ],
//     ];
    
// }
 
// function bebro_funkcija2()
// {
//     echo '<h1>Aš Esu Bebras Nr 2</h1>';
// }
 
// function bebro_funkcija3()
// {
//     echo '<h1>Aš Esu Bebras Nr 3</h1>';
// }