<?php

class My_Shortcode {

    static $add_script;

    static function init() {
        add_shortcode('myshortcode', array(__CLASS__, 'handle_shortcode'));

        add_action('init', array(__CLASS__, 'register_script'));
        add_action('wp_footer', array(__CLASS__, 'print_script'));
    }

    static function handle_shortcode($atts) {
        self::$add_script = true;

        // actual shortcode handling here
    }

    static function register_script() {
        wp_register_script('validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.14.0', true);
    }

    static function print_script() {
        if (!self::$add_script)
            return;

        wp_print_scripts('validate-script');
    }

}

My_Shortcode::init();


add_action('template_redirect', 'add_my_script');

function add_my_script() {
    wp_enqueue_script('validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.14.0', true);
}


add_action('wp_head', 'add_the_script');
 
function add_the_script() { ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.validate.min.js"></script>
<?php }