<?php
/**
 * Plugin Name: Image Carousel Beaver Builder Add-on
 * Plugin URI: http://themeofy.net/
 * Description: Create carousel sliders easily. 
 * Version: 1.0
 * Author: Jimish Soni
 * Author URI: http://themeofy.net/
 */

define( 'IC_DIR', plugin_dir_path( __FILE__ ) );
define( 'IC_URL', plugins_url( '/', __FILE__ ) );

function IC_load_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'ic-module/ic-module.php';
    }
}
add_action( 'init', 'IC_load_module' );