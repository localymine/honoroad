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

/* ------------------------------------------------------------ theme support */
global $theme_options;
$theme_options = get_option('my_theme_option');
add_action('wp_footer', 'add_custom_script');

function add_custom_script() {
    global $theme_options;
    $script = '';
    //Google Analytics
    if (isset($theme_options['ct_google_analytics'])) {
        $script .= $theme_options['ct_google_analytics'];
    }
    if (isset($theme_options['ct_google_tag_manager'])) {
        $script .= $theme_options['ct_google_tag_manager'];
    }
    // Social Network
    if (isset($theme_options['ct_facebook_script'])) {
        $script .= $theme_options['ct_facebook_script'];
    }
    if (isset($theme_options['ct_google_plus_script'])) {
        $script .= $theme_options['ct_google_plus_script'];
    }
    if (isset($theme_options['ct_twitter_script'])) {
        $script .= $theme_options['ct_twitter_script'];
    }
    // Custom Script
    if (isset($theme_options['ct_custom_script'])) {
        $script .= $theme_options['ct_custom_script'];
    }
    echo stripslashes($script);
}

/* --------------------------------------------------------------------------- */

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

function remove_menus() {

    global $user_ID;

    $user = new WP_User($user_ID);
    $roles = $user->roles;
    $role = $roles[0];
    $arr_roles = array('administrator');

    if (in_array($role, $arr_roles)) {
//        remove_menu_page('cptui_main_menu');          // CPT
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