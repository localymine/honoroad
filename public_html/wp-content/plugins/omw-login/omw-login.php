<?php

/**
  Plugin Name: Front-End Login
  Plugin URI:
  Description: Login into system from Front-End
  Version:     1.0
  Author:      Le Duong Khang
  Author URI:  mailto:leduongkhang@gmail.com
  License: GPL
  License URI:
  Domain Path:
  Text Domain: omw-login
 */
if (!defined('ABSPATH')) {
    die('No script kiddies please!');
}

define('OMW_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once 'includes/class-pw-template-loader.php';

class omw_login extends PW_Template_Loader {

    /**
     * A Unique Identifier
     */
    protected $roles;
    protected $plugin_dir;
    protected $plugin_url;
    protected $assets_dir;
    protected $assets_url;
    //
    protected $theme_template_directory = 'templates';

    /**
     * A reference to an instance of this class.
     */
    private static $instance;

    /**
     * The array of templates that this plugin tracks.
     */
    protected $templates = array();

    /**
     *
     */
    public static function get_instance() {
        if (null == self::$instance) {
            self::$instance = new jobs_management();
        }
        return self::$instance;
    }

    public function __construct() {

        $this->plugin_dir = plugin_dir_path(__FILE__);
        $this->plugin_url = esc_url(trailingslashit(plugins_url(dirname(__FILE__))));
        $this->assets_dir = trailingslashit(dirname(__FILE__)) . 'assets';
        $this->assets_url = esc_url(trailingslashit(plugins_url('assets', __FILE__)));
        //
        // define custom roles - member plugin
        $this->roles = array('sale_staff', 'distribution_staff', 'b2b_customer');

        // Register pages
        add_action('init', array($this, 'register_pages'));
//        add_action('init', array($this, 'register_table'));
        // Load frontend JS & CSS
        add_action('wp_enqueue_scripts', array($this, 'register_styles'), 10);
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 10);

        // Add a filter to the attributes metabox to inject template into the cache.
        add_filter('page_attributes_dropdown_pages_args', array($this, 'register_project_templates'), 10, 1);

        // Add a filter to the save post to inject out template into the page cache
        add_filter('wp_insert_post_data', array($this, 'register_project_templates'), 10, 1);

        // Add a filter to the template include to determine if the page has our 
        // template assigned and return it's path
        add_filter('template_include', array($this, 'view_project_template'), 10, 1);

        // Add your templates to this array.
        $this->templates = array(
            $this->theme_template_directory . '/login.php' => 'Login',
            $this->theme_template_directory . '/profile.php' => 'Profile',
        );

        // Add short code
        add_shortcode('owm-shortcode', array($this, 'print_shortcode'), 10, 1);
        //
        add_action('admin_init', array($this, 'omw_admin_login_init'));
        add_action('template_redirect', array($this, 'omw_login_redirect'));
    }

    /**
     * Adds our template to the pages cache in order to trick WordPress
     * into thinking the template file exists where it doens't really exist.
     *
     * @param   array    $atts    The attributes for the page attributes dropdown
     * @return  array    $atts    The attributes for the page attributes dropdown
     * @verison	1.0.0
     * @since	1.0.0
     */
    public function register_project_templates($atts) {
        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5(get_theme_root() . '/' . get_stylesheet());

        // Retrieve the cache list. 
        // If it doesn't exist, or it's empty prepare an array
        $templates = wp_get_theme()->get_page_templates();
        if (empty($templates)) {
            $templates = array();
        }

        // New cache, therefore remove the old one
        wp_cache_delete($cache_key, 'themes');

        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge($templates, $this->templates);

        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add($cache_key, $templates, 'themes', 1800);

        return $atts;
    }

    /**
     * Checks if the template is assigned to the page
     *
     * @version	1.0.0
     * @since	1.0.0
     */
    public function view_project_template($template) {

        global $post;

        // If no posts found, return to
        // avoid "Trying to get property of non-object" error
        if (!isset($post))
            return $template;

        if (!isset($this->templates[get_post_meta($post->ID, '_wp_page_template', true)])) {

            return $template;
        }

        $file = $this->plugin_dir . get_post_meta($post->ID, '_wp_page_template', true);

        // Just to be safe, we check if the file exist first
        if (file_exists($file)) {
            return $file;
        } else {
            echo $file;
        }

        return $template;
    }

    /**
     * Add Short Code
     *
     * @version	1.0.0
     * @since	1.0.0
     */
    public function print_shortcode($type) {
        extract(shortcode_atts(array(
            'type' => 'type',
                        ), $type));
        //
        ob_start();
        $template = new PW_Template_Loader();

        switch ($type) {
            case 'form-list':
                $template->get_template_part('demo-template');
                break;
        }

        return ob_get_clean();
    }

    /**
     * Create Page if return NULL
     *
     * @version	1.0.0
     * @since	1.0.0
     */
    public function create_page_if_null($post = NULL) {
        if (get_page_by_title($post['post_name']) == NULL) {
            // create_pages_fly($target);
            // insert page and save the id
            $post_id = wp_insert_post($post, false);

            // save the id in the database
            update_option($post['post_name'], $post_id);

            // set the template
            update_post_meta($post_id, '_wp_page_template', $post['page_template']);

            return $post_id;
        }
    }

    /**
     * Register Pages
     *
     * @version	1.0.0
     * @since	1.0.0
     */
    public function register_pages() {

        // Login
        $login_page = array(
            'post_name' => 'login',
            'post_title' => 'Login',
            'post_status' => 'publish',
            'post_type' => 'page',
            'page_template' => $this->theme_template_directory . '/login.php',
        );
        $login_page_id = $this->create_page_if_null($login_page);

        // Profile
        $profile_page = array(
            'post_name' => 'profile',
            'post_title' => 'Profile',
            'post_status' => 'publish',
            'post_type' => 'page',
            'page_template' => $this->theme_template_directory . '/profile.php',
        );
        $profile_page_id = $this->create_page_if_null($profile_page);
    }

    /**
     * Load frontend CSS.
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function register_styles() {
        wp_register_style('css-omw-frontend', $this->assets_url . 'css/style.css', array(), '1.0');
        wp_enqueue_style('css-omw-frontend');
        //
    }

    /**
     * Load frontend Javascript.
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function register_scripts() {
        //
        wp_register_script('js-own-plugin-frontend', $this->assets_url . 'js/settings.js', array('jquery'), '1.0.0', TRUE);
        wp_enqueue_script('js-own-plugin-frontend');
        //
        $dataToBePassed = array(
            'plugin_url' => $this->plugin_url,
        );
        wp_localize_script('js-owm-frontend', 'omw_vars', $dataToBePassed);
    }

    /**
     * 
     */
    public function omw_login_redirect() {
        foreach ($this->roles as $role){
            if (is_page('login') && is_user_logged_in() && !current_user_can($role)) {
                wp_redirect(home_url('/wp-admin'));
                exit();
            }
        }

        foreach ($this->roles as $role){
            if (is_page('login') && is_user_logged_in() && current_user_can($role)) {
                wp_redirect(home_url() . '/profile');
                exit();
            }
        }
        
        if (is_page('profile') && !is_user_logged_in()) {
            wp_redirect(home_url('/login'));
            exit();
        }
    }

    /**
     * Prevent users to access the admin
     */
    public function omw_admin_login_init() {
        foreach ($this->roles as $role) {
            if (current_user_can($role)) {
                wp_redirect(home_url('/profile'));
                exit;
            }
        }
    }

    /**
     * 
     * @global type $wpdb
     */
    public function register_table() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'jobs_management';

        $sql = "CREATE TABLE $table_name (
            id int(12) NOT NULL AUTO_INCREMENT,
            apply_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            fullname varchar(60) DEFAULT '' NOT NULL,
            email varchar(255) DEFAULT '' NOT NULL,
            phone_number varchar(15) DEFAULT '' NOT NULL,
            gender varchar(1) DEFAULT '-',
            attach_file varchar(255) NOT NULL,
            download_link varchar(255) NOT NULL,
            job_id int(12) NULL,
            job_title varchar(255) NULL,
            job_slug varchar(255) NULL,
            job_position varchar(32) NULL,
            job_level varchar(32) NULL,
            job_salary varchar(32) NULL,
            job_location varchar(32) NULL,
            job_expired varchar(32) NULL,
            UNIQUE KEY id (id)
            ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    /**
     * 
     */
    function download_cv() {
        global $wp_query;
        global $wpdb;
        //
        if (isset($wp_query->query['pagename'])) {
            if ($wp_query->query['pagename'] == 'download') {
                if (current_user_can('manage_options')) {
                    //
                    if (isset($_GET['attach'])) {
                        if (is_numeric($_GET['attach'])) {
                            $id = $_GET['attach'];
                            //
                            $table_name = $wpdb->prefix . 'jobs_management';
                            $list_candidates = $wpdb->get_results(
                                    ""
                                    . " SELECT * "
                                    . " FROM  $table_name "
                                    . " WHERE id =  $id "
                            );
                            $post = $list_candidates[0];
                            //
                            $attach_file = $post->attach_file;
                            $ext = substr(strrchr($attach_file, '.'), 1);
                            $clean_name = sanitize_title($post->fullname . '-cv') . '.' . $ext;
                            //
                            $parse = parse_url($attach_file);
                            $attach_file_path = WP_CONTENT_DIR . str_replace('/wp-content', '', $parse['path']);
                            //
                            header('Content-Description: File Transfer');
                            header('Content-Type: application/force-download');
                            header("Content-Disposition: attachment; filename=\"" . $clean_name . "\";");
                            header('Content-Transfer-Encoding: binary');
                            header('Expires: 0');
                            header('Cache-Control: must-revalidate');
                            header('Pragma: public');
                            header('Content-Length: ' . filesize($attach_file_path));
                            ob_clean();
                            flush();
                            readfile($attach_file_path);
                            exit();
                        }
                    }
                }
            }
        }
    }

}

$omw_login = new omw_login();
