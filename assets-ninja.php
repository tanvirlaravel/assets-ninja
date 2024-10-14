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

 define("ASN_ASSETS_DIR", plugin_dir_url(__FILE__) . "/assets/" );
 define("ASN_ASSETS_PUBLIC_DIR", plugin_dir_url(__FILE__) . "/assets/public" );
 define("ASN_ASSETS_ADMIN_DIR", plugin_dir_url(__FILE__) . "/assets/admin" );
 define("ASN_VERSION", time() );

 class AssetsNinja {

    private $version;
    function __construct(){
        // for cast busting
        $this->version = time();
        add_action( 'plugin_loaded', [$this, "load_text_domain"]);
        add_action( 'wp_enqueue_scripts', [$this, "load_front_assets"] );
    }

    public function load_text_domain(){
        load_plugin_textdomain( "assetsninja", false, plugin_dir_url( __FILE__ ) . "/languages" );
    }

    public function load_front_assets(){
        wp_enqueue_script( "assetsninja-main", ASN_ASSETS_PUBLIC_DIR . "/js/main.js", array('jquery'), $this->version, true);
        wp_enqueue_script( "assetsninja-more", ASN_ASSETS_PUBLIC_DIR . "/js/more.js", array('jquery'), $this->version, true);
    }
 }

 new AssetsNinja();