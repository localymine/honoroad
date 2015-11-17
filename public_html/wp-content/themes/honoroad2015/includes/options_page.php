<?php

//function register_my_menu() {
//    register_nav_menu('header-menu', __('Header Menu'));
//}
//
//add_action('init', 'register_my_menu');

function register_my_menus() {
    register_nav_menus(
            array(
                'header-menu', __('Header Menu'),
                'sales-menu' => __('Sales Menu'),
    ));
}

add_action('init', 'register_my_menus');


unregister_nav_menu('header-menu');