<?php

define('ACF_LITE', true);

/*
 * This file is custom post type, custom taxonomy and custom fields
 * definition file.
 * 
 * Exported from CPT UI & Advanced Custom Fields
 */

/* ---------------------------------------------------------------------------- */
/* post type definitions */
/* ---------------------------------------------------------------------------- */
add_action('init', 'cptui_register_my_cpts');

function cptui_register_my_cpts() {
    $labels = array(
        "name" => "Product",
        "singular_name" => "Product",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array("slug" => "product", "with_front" => true),
        "query_var" => true,
        "menu_position" => 26,
        "menu_icon" => get_template_directory_uri() . '/images/ad-ico/h1.png',
        "supports" => array("title"),
    );
    register_post_type("product", $args);

    $labels = array(
        "name" => "Top About Info",
        "singular_name" => "Top About Info",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "top-about", "with_front" => true),
        "query_var" => true,
        "menu_position" => 26,
        "menu_icon" => get_template_directory_uri() . '/images/ad-ico/h2.png',
        "supports" => array("title", "editor", "excerpt"),
    );
    register_post_type("top-about", $args);

    $labels = array(
        "name" => "Partner Info",
        "singular_name" => "Partner Info",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "partner-info", "with_front" => true),
        "query_var" => true,
        "menu_position" => 26,
        "menu_icon" => get_template_directory_uri() . '/images/ad-ico/h3.png',
        "supports" => array("title"),
    );
    register_post_type("partner-info", $args);

// End of cptui_register_my_cpts()
}

/* ---------------------------------------------------------------------------- */
/* taxonomy definitions */
/* ---------------------------------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes');

function cptui_register_my_taxes() {

    $labels = array(
        "name" => "Product Line",
        "label" => "Product Line",
    );

    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "label" => "Product Line",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'product-line', 'with_front' => true),
        "show_admin_column" => false,
    );
    register_taxonomy("product-line", array("product"), $args);

// End cptui_register_my_taxes
}

/* ---------------------------------------------------------------------------- */
/* custom fields definitions */
/* ---------------------------------------------------------------------------- */
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_product',
        'title' => 'Product',
        'fields' => array(
            array(
                'key' => 'field_5647657ba2f71',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'wysiwyg',
                'instructions' => 'Mô tả',
                'default_value' => '',
                'toolbar' => 'basic',
                'media_upload' => 'yes',
            ),
            array(
                'key' => 'field_564765d7a2f72',
                'label' => 'Price Plans',
                'name' => 'price_plans',
                'type' => 'repeater',
                'instructions' => 'Giá',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5647752e4802c',
                        'label' => 'Weight',
                        'name' => 'weight',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            '1L' => '1L',
                            '2L' => '2L',
                            '5L' => '5L',
                            '22L' => '22L',
                            '25Kg' => '25Kg',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_564775964802d',
                        'label' => 'Price',
                        'name' => 'price',
                        'type' => 'number',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_5642fb481e434',
                'label' => 'Images',
                'name' => 'images',
                'type' => 'repeater',
                'instructions' => 'Hình sản phẩm',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5642fbe53943a',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_564451009570f',
                'label' => 'Weight',
                'name' => 'weight',
                'type' => 'checkbox',
                'instructions' => 'Trọng lượng',
                'choices' => array(
                    '1L' => '1L',
                    '2L' => '2L',
                    '5L' => '5L',
                    '22L' => '22L',
                    '25KG' => '25KG',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_5642d49fb732a',
                'label' => 'Ingredients',
                'name' => 'ingredients',
                'type' => 'text',
                'instructions' => 'Thành phần',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5642e148b732b',
                'label' => 'Features',
                'name' => 'features',
                'type' => 'text',
                'instructions' => 'Đặc điểm',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5642e204b732c',
                'label' => 'Sensory',
                'name' => 'sensory',
                'type' => 'repeater',
                'instructions' => 'Chỉ tiêu cảm quan',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5642e237b732d',
                        'label' => 'Attribute',
                        'name' => 'attribute',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'Trạng thái' => 'Trạng thái',
                            'Màu sắc' => 'Màu sắc',
                            'Mùi' => 'Mùi',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5642e3d4b732e',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_5642e445b732f',
                'label' => 'Physical and Chemical Indicators',
                'name' => 'physical_and_chemical_indicators',
                'type' => 'repeater',
                'instructions' => 'Chỉ số lý hóa',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5642e5aab7330',
                        'label' => 'Item',
                        'name' => 'item',
                        'type' => 'select',
                        'instructions' => 'Hạng mục',
                        'column_width' => '',
                        'choices' => array(
                            'Hàm lượng axit béo tự do (axit oleic)' => 'Hàm lượng axit béo tự do (axit oleic)',
                            'Hydro hóa' => 'Hydro hóa',
                            'Iốt' => 'Iốt',
                            'Độ ẩm' => 'Độ ẩm',
                            'Tạp chất' => 'Tạp chất',
                            'Độ nóng chảy' => 'Độ nóng chảy',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5642e5b7b7331',
                        'label' => 'Unit',
                        'name' => 'unit',
                        'type' => 'select',
                        'instructions' => 'Đơn vị',
                        'column_width' => '',
                        'choices' => array(
                            '%' => '%',
                            'Meq/kg' => 'Meq/kg',
                            'g/100g' => 'g/100g',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5642e62e6beef',
                        'label' => 'Amount',
                        'name' => 'amount',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_5642ed4c28472',
                'label' => 'Usage',
                'name' => 'usage',
                'type' => 'textarea',
                'instructions' => 'Công dụng',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_5642ed5f28473',
                'label' => 'Target User',
                'name' => 'target_user',
                'type' => 'text',
                'instructions' => 'Đối tượng sử dụng',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5642edca28474',
                'label' => 'Preservation',
                'name' => 'preservation',
                'type' => 'text',
                'instructions' => 'Bảo quản',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5642ee0328475',
                'label' => 'Number of Quality Standard',
                'name' => 'number_of_quality_standard',
                'type' => 'textarea',
                'instructions' => 'Số tiêu chuẩn chất lượng',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array(
                'key' => 'field_5642ee768d0bf',
                'label' => 'Nutritional information',
                'name' => 'nutritional_information',
                'type' => 'repeater',
                'instructions' => 'Thông tin dinh dưỡng',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5642ef578d0c0',
                        'label' => 'Attribute',
                        'name' => 'attribute',
                        'type' => 'select',
                        'column_width' => '',
                        'choices' => array(
                            'Năng lượng' => 'Năng lượng',
                            'Chất đạm' => 'Chất đạm',
                            'Chất béo toàn phần' => 'Chất béo toàn phần',
                            'Hydrat cacbon' => 'Hydrat cacbon',
                            'Cholesterol' => 'Cholesterol',
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_5642f6c48d0c1',
                        'label' => 'Average In 14g',
                        'name' => 'average_in_14g',
                        'type' => 'text',
                        'instructions' => 'Hàm lượng trung bình trong mỗi khẩu phần 14g',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5642f7248d0c2',
                        'label' => 'Average In 100g',
                        'name' => 'average_in_100g',
                        'type' => 'text',
                        'instructions' => 'Hàm lượng trung bình trong 100g',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array(
                'key' => 'field_5642fb0b1e433',
                'label' => 'Usage In Field',
                'name' => 'usage_in_field',
                'type' => 'text',
                'instructions' => 'Dùng trong lĩnh vực',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5642fb9239438',
                'label' => 'Feature Images',
                'name' => 'feature_images',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5642fbbd39439',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_top-info',
        'title' => 'Top Info',
        'fields' => array(
            array(
                'key' => 'field_56454336c93fa',
                'label' => 'Show Button',
                'name' => 'show_button',
                'type' => 'radio',
                'choices' => array(
                    1 => 'Show',
                    0 => 'Hide',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_564542a9c93f9',
                'label' => 'Link To',
                'name' => 'link_to',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'top-about',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));

    register_field_group(array(
        'id' => 'acf_partner-info',
        'title' => 'Partner Info',
        'fields' => array(
            array(
                'key' => 'field_5645ed2229524',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'partner-info',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
}
