<?php

class register_assets {

    protected $assets_dir;
    protected $assets_url;

    public function __construct() {

        $this->assets_dir = trailingslashit(dirname(__FILE__)) . 'assets';
        $this->assets_url = esc_url(trailingslashit(plugins_url('assets', __FILE__)));

//         Load frontend JS & CSS
        add_action('wp_enqueue_scripts', array($this, 'register_styles'), 10);
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 10);
    }

    /**
     * Load frontend CSS.
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function register_styles() {
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
    }

}

//$register_assets = new register_assets;

/* ---------------------------------------------------------------------------- */

global $product_list;

function omw_load_data() {

    if ((is_front_page() || !is_admin()) && is_page('order')) {
        global $product_list;
        // Google Map Data
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
        );
        $loop = new WP_Query($args);
        //
        if ($loop->have_posts()):
            while ($loop->have_posts()): $loop->the_post();
                if (have_rows('images')) {
                    while (have_rows('images')): the_row();
                        $image = get_sub_field('image');
                        // thumbnail
                        $size = 'thumbnail';
                        $thumb = $image['sizes'][$size];
                        break;
                    endwhile;
                }
                //
                $product_list[] = array(
                    'id' => get_the_ID(),
                    'permalink' => get_permalink(),
                    'slug' => basename(get_permalink()),
                    'title' => get_the_title(),
                    'image' => $thumb,
                );
            endwhile;
            $product_list = json_encode($product_list);
        endif;
        wp_reset_postdata();
    }
}

add_action('wp_print_scripts', 'onw_scripts');

function onw_scripts() {

    if ((is_front_page() || !is_admin()) && is_page('order')) {
        //
        global $product_list;
        //
        wp_register_script('js-angular', get_template_directory_uri() . '/js/angular.min.js', array(), '1.0', TRUE);
        wp_enqueue_script('js-angular');
        //
        wp_enqueue_script('js-controller', get_template_directory_uri() . '/js/controller.js', array('js-angular'), '1.0', TRUE);
        $dataToBePassed = array(
            'home_url' => home_url(),
            'template_url' => get_template_directory_uri(),
            'product_list' => $product_list,
        );

        wp_localize_script('js-controller', 'vars', $dataToBePassed);
        wp_enqueue_script('js-controller');
    }
}
