<?php

function omw_theme_customize_register($wp_customize) {
    /* HOME PAGE SECTION */
    $wp_customize->add_section('health', array(
        'title' => __('HEALTH PAGE'),
        'priority' => 20,
    ));
    $wp_customize->add_setting('health_top_image', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'health_top_image_c', array(
        'label' => __('Top Image'),
        'section' => 'health',
        'settings' => 'health_top_image',
        'priority' => 1,
    )));
}

add_action('customize_register', 'omw_theme_customize_register');

//css generate
function omw_theme_generate_css() {
    ?>
    <style>
        .header-sta-health{
            background: url('<?php echo omw_get_health_top_image() ?>') !important;
        }
    </style>
    <?php

}

function omw_get_health_top_image() {
    return esc_url(get_theme_mod('health_top_image'));
}
