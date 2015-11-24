<?php

class register_assets{
    protected $assets_dir;
    protected $assets_url;
    
    public function __construct() {
        
        $this->assets_dir = trailingslashit(dirname(__FILE__)) . 'assets';
        $this->assets_url = esc_url(trailingslashit(plugins_url('assets', __FILE__)));
        
        var_dump($this->assets_url);
    }
}

$register_assets = new register_assets;