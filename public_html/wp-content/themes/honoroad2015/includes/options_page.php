<?php

//function register_my_menus() {
//    register_nav_menus(
//            array(
//                'header-menu', __('Header Menu'),
//                'sales-menu' => __('Sales Menu'),
//    ));
//}
//
//add_action('init', 'register_my_menus');
//
//
//unregister_nav_menu('header-menu');

/* ----------- Change Admin Default Logo & Url -------------------------------- */

function my_login_logo() {
    ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo.png);
            width: 326px;
            height: 56px;
            background-size: auto;
        }
    </style>
    <?php
}

add_action('login_enqueue_scripts', 'my_login_logo');

function my_login_logo_url() {
    return home_url();
}

add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title() {
    return 'Power by <a href="http://onmyway.vn">On My Way Solutions</a>';
}

add_filter('login_headertitle', 'my_login_logo_url_title');

/* ----------------------------------------------------------------------- Menu */

//function remove_menus_from_plugins() {
//    remove_menu_page('cptui_main_menu');          // CPT
//}
//add_action('admin_init', 'remove_menus_from_plugins');

function remove_menus() {

    global $user_ID;

    $user = new WP_User($user_ID);
    $roles = $user->roles;
    $role = $roles[0];
    $arr_roles = array('administrator');

    if (in_array($role, $arr_roles)) {
        remove_menu_page('edit.php?post_type=acf');     // ACF
        remove_menu_page('cptui_main_menu');          // CPT
        remove_menu_page('index.php');                  //Dashboard
        remove_menu_page('edit.php');                   //Posts
//        remove_menu_page('upload.php');                 //Media
        remove_menu_page('edit-comments.php');          //Comments
//        remove_menu_page('plugins.php');                //Plugins
//        remove_menu_page('users.php');                  //Users
        remove_menu_page('tools.php');                  //Tools
//        remove_menu_page('options-general.php');        //Settings
    } else {
        remove_menu_page('index.php');                  //Dashboard
        remove_menu_page('edit.php');                   //Posts
        remove_menu_page('upload.php');                 //Media
        remove_menu_page('edit.php?post_type=page');    //Pages
        remove_menu_page('edit-comments.php');          //Comments
        remove_menu_page('themes.php');                 //Appearance
        remove_menu_page('plugins.php');                //Plugins
        remove_menu_page('users.php');                  //Users
        remove_menu_page('tools.php');                  //Tools
        remove_menu_page('options-general.php');        //Settings
    }
}

//add_action('admin_menu', 'remove_menus');

/* ---------------------------------------------------------------------------- */

/**
 * 
 * @param type $post_ID
 * @return string
 * 
 * Reference http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/#
 * 
 */
function getPostViews($post_ID, $count_key = '') {
    if ($count_key == '') {
        $count_key = 'post_views_count';
    }
    //
    $count = get_post_meta($post_ID, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, '0');
        return "0";
    }
    return $count;
}

/**
 * 
 * @param type $post_ID
 * 
 * Reference http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/#
 * 
 */
function setPostViews($post_ID, $count_key = '') {
    if ($count_key == '') {
        $count_key = 'post_views_count';
    }
    //
    $current_date = date('Y-m-d H:i:s');
    //
    $count = get_post_meta($post_ID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, '1');
        add_post_meta($post_ID, $count_key . '_date', $current_date);
    } else {
        $current = strtotime($current_date);
        $timestamp = strtotime(get_post_meta($post_ID, $count_key . '_date', true));
        if (($current - $timestamp) < 10) {
            // do nothing
        } else {
            $count++;
            update_post_meta($post_ID, $count_key, $count);
            update_post_meta($post_ID, $count_key . '_date', $current_date);
        }
    }
}

// Remove issues with prefetching adding extra views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
