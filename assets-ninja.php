<?php 
/**
 * Plugin Name: Assets Ninja
 * Plugin URI: https://tanvir-assets-ninja.com
 * Description: Assets management in depth
 * Version: 1.0.0
 * Author: Md Tanvirul Islam
 * Author URI: tnavir.github
 * License: GPLv2 or later 
 * Text Domain: assetsninja
 * Domain Path: /languages/
 */

 class AssetsNinja {
    function __construct(){
        add_action( 'plugin_loaded', [$this, "assets"]);
    }

    public function assets(){
        load_plugin_textdomain( "assetsninja", false, plugin_dir_url( __FILE__ ) . "/languages" );
    }
 }

 new AssetsNinja();