<?php

/**
 * 
 * Author: Le Duong Khang
 * Tabbed Settings Page
 * 
 */
class omw_theme_settings {

    private $page_slug = 'my-theme-settings';
    private $option_name = 'my_theme_option';
    public $settings;
    public $setting_fields;
    public $assets_url;
    public $tabs;

    public function __construct() {
        add_action('admin_menu', array($this, 'omw_settings_page_init'));
        //
        $this->assets_url = get_template_directory_uri() . '/includes/assets/';
        //
        $this->setting_fields = $this->omw_init_setting_fields();
    }

    public function omw_settings_assets() {
        wp_register_style('omw-admin-style', $this->assets_url . 'css/style.css');
        wp_enqueue_style('omw-admin-style');
        //
        wp_enqueue_style('farbtastic');
        wp_enqueue_script('farbtastic');
        //
        wp_enqueue_media();
        wp_register_script('wpt-admin-js', $this->assets_url . 'js/settings.js', array('farbtastic', 'jquery'), '1.0.0');
        wp_enqueue_script('wpt-admin-js');
    }

    public function omw_get_tab() {
        global $pagenow;
        $tab = 'homepage';  // default
        //
        if ($pagenow == 'themes.php' && $_GET['page'] == $this->page_slug) {
            if (isset($_GET['tab']))
                $tab = $_GET['tab'];
        }
        return $tab;
    }

    /**
     * 
     * @return type'tab name' => array('fields name' => array());
     */
    public function omw_init_setting_fields() {
        $this->tabs = array(
            'company-info' => 'Compnay Infomation',
            'general' => 'General',
            'footer' => 'Footer'
        );
        //
        $tab_data = array();
        foreach ($this->tabs as $tab_id => $tab) {
            switch ($tab_id) {
                case 'general':
                    $tab_data[$tab_id] = array(
                        'ct_use_css' => array(
                            'id' => 'ct_use_css',
                            'label' => 'Use Custom CSS',
                            'description' => 'Enable/Disable custom CSS',
                            'type' => 'checkbox',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_custom_css' => array(
                            'id' => 'ct_custom_css',
                            'label' => 'CSS Code',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_use_script' => array(
                            'id' => 'ct_use_script',
                            'label' => 'Use Custom Script',
                            'description' => 'Enable/Disable custom SCRIPT',
                            'type' => 'checkbox',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_custom_script' => array(
                            'id' => 'ct_custom_script',
                            'label' => 'Javascript Code',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                    );
                    break;
                case 'company-info':
                    $tab_data[$tab_id] = array(
                        'ct_company_name' => array(
                            'id' => 'ct_company_name',
                            'label' => 'Company Name',
                            'description' => '',
                            'type' => 'text',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_company_address' => array(
                            'id' => 'ct_company_address',
                            'label' => 'Address',
                            'description' => '',
                            'type' => 'text',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_company_telephone' => array(
                            'id' => 'ct_company_telephone',
                            'label' => 'Phone Number',
                            'description' => '',
                            'type' => 'text',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_company_email' => array(
                            'id' => 'ct_company_email',
                            'label' => 'Email',
                            'description' => '',
                            'type' => 'text',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_company_google_map' => array(
                            'id' => 'ct_company_google_map',
                            'label' => 'Google Map Embed',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                    );
                    break;
                case 'footer':
                    $tab_data[$tab_id] = array(
                        'ct_google_analytics' => array(
                            'id' => 'ct_google_analytics',
                            'label' => 'Google Analytics Code',
                            'description' => 'Enter your Google Analytics tracking code',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_google_tag_manager' => array(
                            'id' => 'ct_google_tag_manager',
                            'label' => 'Google Tag Manager Code',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_facebook_script' => array(
                            'id' => 'ct_facebook_script',
                            'label' => 'Facebook Script',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_google_plus_script' => array(
                            'id' => 'ct_google_plus_script',
                            'label' => 'Google Plus Script',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                        'ct_twitter_script' => array(
                            'id' => 'ct_twitter_script',
                            'label' => 'Twitter Script',
                            'description' => '',
                            'type' => 'textarea',
                            'default' => '',
                            'placeholder' => '',
                        ),
                    );
                    break;
            }
        }
        //
        return array_merge($tab_data);
    }

    public function omw_settings_page_init() {
        $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
        $settings_page = add_theme_page($theme_data['Name'] . ' Theme Settings', $theme_data['Name'] . ' Theme Settings', 'edit_theme_options', $this->page_slug, array($this, 'omw_settings_page'));
        add_action("load-{$settings_page}", array($this, 'omw_settings_assets'));
        add_action("load-{$settings_page}", array($this, 'omw_load_settings_page'));
    }

    public function omw_load_settings_page() {
        if ($_POST["omw-settings-submit"] == 'Y') {
            check_admin_referer("omw-settings-page");
            $this->omw_save_theme_settings();
            $url_parameters = isset($_GET['tab']) ? 'updated=true&tab=' . $_GET['tab'] : 'updated=true';
            wp_redirect(admin_url('themes.php?page=' . $this->page_slug . '&' . $url_parameters));
            exit;
        }
    }

    public function omw_save_theme_settings() {
        $this->settings = get_option($this->option_name);
        //
        $tab = $this->omw_get_tab();
        //
        foreach ($this->setting_fields as $s_tab => $tab_data) {
            foreach ($tab_data as $field => $data) {
                $id = $data['id'];
                $this->settings[$id] = $_POST[$id];
            }
        }
//    if (!current_user_can('unfiltered_html')) {
//        if ($this->settings['ct_google_analytics'])
//            $this->settings['ct_google_analytics'] = stripslashes(esc_textarea(wp_filter_post_kses($this->settings['ct_google_analytics'])));
//        if ($this->settings['ct_google_tag_manager'])
//            $this->settings['ct_google_tag_manager'] = stripslashes(esc_textarea(wp_filter_post_kses($this->settings['ct_google_tag_manager'])));
        $updated = update_option($this->option_name, $this->settings);
    }

    public function omw_admin_tabs($current = 'homepage') {
        $links = array();
        echo '<div id="icon-themes" class="icon32"><br></div>';
        echo '<h2 class="nav-tab-wrapper">';
        foreach ($this->tabs as $tab => $name) {
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page={$this->page_slug}&tab=$tab'>$name</a>";
        }
        echo '</h2>';
    }

    public function omw_settings_page() {
        $settings = get_option($this->option_name);
        $theme_data = wp_get_theme();
        ?>
        <div class="wrap">
            <h2><?php echo $theme_data['Name']; ?> Theme Settings</h2>

            <?php
            if ('true' == esc_attr($_GET['updated']))
                echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
            if (isset($_GET['tab']))
                $this->omw_admin_tabs($_GET['tab']);
            else
                $this->omw_admin_tabs('homepage');
            ?>

            <div id="poststuff">
                <form method="post" action="<?php admin_url('themes.php?page=' . $this->page_slug); ?>">
                    <?php
                    wp_nonce_field("omw-settings-page");
                    //
                    $tab = $this->omw_get_tab();
                    echo '<table class="form-table">';
                    //
                    foreach ($this->setting_fields as $s_tab => $tab_data) {
                        foreach ($tab_data as $field => $data) {
                            $id = $data['id'];
                            switch ($tab) {
                                case $s_tab:
                                    switch ($data['type']) {
                                        case 'text':
                                            ?>
                                            <tr>
                                                <th><label for="<?php echo $id ?>"><?php echo $data['label'] ?></label></th>
                                                <td>
                                                    <input class="form-control" id="<?php echo $id ?>" name="<?php echo $id ?>" type="text" value="<?php echo isset($settings[$id]) ? esc_html(stripslashes($settings[$id])) : '' ?>" /><br/>
                                                    <span class="description"><?php echo $data['description'] ?></span>
                                                </td>
                                            </tr>
                                            <?php
                                            break;
                                        case 'textarea':
                                            ?>
                                            <tr>
                                                <th><label for="<?php echo $id ?>"><?php echo $data['label'] ?></label></th>
                                                <td>
                                                    <textarea class="form-control" id="<?php echo $id ?>" name="<?php echo $id ?>" cols="60" rows="5"><?php echo isset($settings[$id]) ? esc_html(stripslashes($settings[$id])) : '' ?></textarea><br/>
                                                    <span class="description"><?php echo $data['description'] ?></span>
                                                </td>
                                            </tr>
                                            <?php
                                            break;
                                        case 'checkbox':
                                            ?>
                                            <tr>
                                                <th><label for="<?php echo $id ?>"><?php echo $data['label'] ?></label></th>
                                                <td>
                                                    <label for="<?php echo $id ?>"><input id="<?php echo $id ?>" name="<?php echo $id ?>" type="checkbox" <?php if ($settings[$id]) echo 'checked="checked"'; ?> />
                                                        <span class="description"><?php echo $data['description'] ?></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <?php
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                            }
                        }
                    }
                    echo '</table>';
                    ?>
                    <p class="submit" style="clear: both;">
                        <input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
                        <input type="hidden" name="omw-settings-submit" value="Y" />
                    </p>
                </form>

                <p><?php echo $theme_data['Name'] ?> theme by <?php echo $theme_data['Author'] ?> (<?php echo $theme_data['Version'] ?>)</p>
            </div>

        </div>
        <?php
    }

}

new omw_theme_settings();

