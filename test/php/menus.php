<?php

add_action('admin_menu', function() {
    add_menu_page('Title', 'Menu', 'manage_options', 'Path', 'render_event_function');

    // 'admin' => 'AdminController@index'

    $routes = require 'adminRoute.php';
    foreach ($routes as $path => $route) {
        list($controller, $function) = explode('@', $route, 2);
        add_menu_page(ucfirst($path) . ' Title', ucfirst($path) . ' Menu', 'manage_options', $path, 'render' . $controller . '_' . $function);
    }

    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null );
    // add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null );

    // add_submenu_page('bebras', 'Page title 2', 'Menu title 2', 'manage_options', 'bebras2', 'bebro_funkcija2');
    // add_submenu_page('bebras', 'Edit', null, 'manage_options', 'bebras3', 'bebro_funkcija3');
});

function renderAdminController_index() {
    echo 'Admin';
    // echo '<br>[test something=125]';
}

function renderFrontController_index() {
    echo 'Front';
}

function renderApiController_index() {
    echo 'Api';
}

function shortcodeTest($something) {  
    // echo 'shortcodeTest ' . $something; 
    return 'shortcodeTest ' . $something;
}  
add_action('init', 'register_shortcodes');
function register_shortcodes() {
    add_shortcode('test', 'shortcodeTest'); 
}