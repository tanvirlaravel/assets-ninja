<?php 
/**
 * Plugin Name: Assets Ninja
 * Plugin URI: https://tanvir-assets-ninja.com
 * Description: Assets management in depth
 * Version: 1.0.0
 * Author: Md Tanvirul Islam
 * Author URI: tnavir.github
 * License: GPLv2 or later 
 * Text Domain: assets-ninja
 * Domain Path: /languages/
 */

 define("ASN_ASSETS_DIR", plugin_dir_url(__FILE__) . "/assets/" );
 define("ASN_ASSETS_PUBLIC_DIR", plugin_dir_url(__FILE__) . "/assets/public" );
 define("ASN_ASSETS_ADMIN_DIR", plugin_dir_url(__FILE__) . "/assets/admin" );
 define("ASN_VERSION", time() );

 class AssetsNinja {

    private $version;
    function __construct(){       
        $this->version = time();
        add_action( 'plugin_loaded', [$this, "load_text_domain"]);
        add_action( 'wp_enqueue_scripts', [$this, "load_front_assets"] );
    }

    public function load_text_domain(){
        load_plugin_textdomain( "assets-ninja", false, plugin_dir_url( __FILE__ ) . "/languages" );
    }

    public function load_front_assets(){
        // load css
        wp_enqueue_style("asn-main", ASN_ASSETS_PUBLIC_DIR . "/css/main.css", null, $this->version);

        // load js
        wp_enqueue_script( "asn-main", ASN_ASSETS_PUBLIC_DIR . "/js/main.js", array('jquery'), $this->version, true);

        $data = array(
            'name'  => 'Tanvir',
            'url'   => 'www.tanvir.com'
        );
        $moredata = array(
            'name'  => 'SAjib',
            'url'   => 'www.sajib.com'
        );
        $translated_string = array(
            'greetings'  => __('Hello World', 'assets-ninja')
        );
        wp_localize_script('asn-main', 'sitedata', $data);
        wp_localize_script('asn-main', 'moredata', $moredata);
        wp_localize_script('asn-main', 'trasnlation', $translated_string);
       
    }
 }

 new AssetsNinja();